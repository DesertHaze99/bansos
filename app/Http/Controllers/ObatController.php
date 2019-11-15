<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use URL;
use session;
use Excel;
use App\BentukObat;
use App\Obat;
use App\Kontraindikasi;
use App\Interaksi;
use App\DetailObat;
use App\KontraindikasiMapping;
use App\InteraksiMapping;
use App\Imports\ObatImport;
use Image;

class ObatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('obat.index');
    }

    //ajax datatable
    public function obatAjax()
    {
        $data = Obat::all();

        $listKategori ='';
        // return $data;
        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="myform" method="post" action="'.route('obat.destroy',$data->obat_id).'">
                                '.csrf_field().'
                                <a href="" onClick="modal(\''.$data->obat_id.'\')" data-toggle="modal" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Detail</a>
                                <a href="' .URL::to('/obat/' . $data->obat_id . '/edit'). '" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" ><i class="fa fa-trash-o"></i> Delete</button>
                            </form>';
                return $button;
            })
            ->removeColumn('updated_at','added_by')
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $satuan = [
            0 => 'ml',
            1 => 'mg',
        ];
        $bentukObat = BentukObat::All();
        // return $bentukObat;
        $kontraindikasi = Kontraindikasi::all();
        // return $kontraindikasi;
        $interaksi = Interaksi::all();
        // return $interaksi;
        return view('obat.create',compact('satuan','bentukObat','interaksi','kontraindikasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
          'nama' => 'required|string',
          'bentuk' => 'required',
          'kesediaan' => 'required',
          'satuan' => 'required|string',
          'kontraindikasi' => 'required|array',
          'interaksi' => 'required|array',
          'efekSamping' => 'required|string',
          'petunjukPenyimpanan' => 'required|string',
          'polaMakan' => 'required',
          'deskripsi' =>'required',
          'gambarObat' => 'required|image|mimes:jpg,png,jpeg'
         ]);

        DB::beginTransaction();
        try {
          $file = $request->file('gambarObat');
          $fileName = time().'_' .uniqid().'.'. $file->getClientOriginalExtension();
          $thumbnailPath = public_path().'/upload/image/';
          $img = Image::make($file)->resize(300,150, function($constraint){
            $constraint->aspectRatio();
          });
          $img->save($thumbnailPath.$fileName);

          $obat = new Obat;
          $obat->name = $request->nama;
          $obat->save();

          $obatId = $obat->obat_id;
          $detailObat = new DetailObat;
          $detailObat->obat_id = $obatId;
          $detailObat->obat_image = 'upload/image/'.$fileName;
          $detailObat->bentuk_obat = $request->bentuk;
          $detailObat->kesediaan = $request->kesediaan;
          $detailObat->satuan = $request->satuan;
          $detailObat->efek_samping = $request->efekSamping;
          $detailObat->pola_makan = $request->polaMakan;
          $detailObat->penyimpanan = $request->petunjukPenyimpanan;
          $detailObat->obat_description = $request->deskripsi;
          $detailObat->save();

          for ($i=0; $i < count($request->kontraindikasi); $i++) { 
            $kontraindikasiMapping = new KontraindikasiMapping;
            $kontraindikasiMapping->obat_id = $obatId;
            $kontraindikasiMapping->kontraindikasi_id = $request['kontraindikasi'][$i];
            $kontraindikasiMapping->save();
          }

          for ($i=0; $i < count($request->interaksi); $i++) { 
            $interaksiMapping = new InteraksiMapping;
            $interaksiMapping->obat_id = $obatId;
            $interaksiMapping->interaksi_id = $request['interaksi'][$i];
            $interaksiMapping->save();
          }

          DB::commit();
          return redirect()->route('obat.index')->with('success','Obat berhasil ditambahkan');
        } catch (Exception $e) {
          DB::rollback();
          return redirect()->route('obat.index')->with('error','Ada sesuatu yang tidak beres silahkan hubungi pengembang');
        }
    }

    public function storeExcel(Request $request)
    {
      $this->validate($request,[
        'file' => 'required|mimes:xlx,xlsx'
      ]);

      if ($request->hasFile('file')) 
      {
        $file = $request->file('file');
        Excel::import(new ObatImport, $file);
        return redirect()->route('obat.index')->with('success','Obat berhasil ditambahkan');
      }else{
        return redirect()->route('obat.index')->with('warning','Silahkan pilih file excel');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataKontraindikasiMapping = KontraindikasiMapping::where('obat_id',$id)->get();
        $dataInteraksiMapping = InteraksiMapping::where('obat_id',$id)->get();
        $kontraindikasiMapping = [];
        $interaksiMapping = [];

        $obat = Obat::with(
                ['detailObat'=>function($query){
                  $query->with('bentukObat');
                },
                  'kontraindikasiMapping' => function($query){
                    $query->with('kontraindikasi');
                  },
                  'interaksiMapping' => function($query){
                    $query->with('interaksi');
                  }
                ])
                ->where('obat_id',$id)
                ->first();
        // return $obat;

        for ($i=0; $i < count($dataKontraindikasiMapping); $i++) { 
          array_push($kontraindikasiMapping,$dataKontraindikasiMapping[$i]->kontraindikasi_id);
        }

        
        for ($i=0; $i < count($dataInteraksiMapping); $i++) { 
          array_push($interaksiMapping,$dataInteraksiMapping[$i]->interaksi_id);
        }
        // return $interaksiMapping;
        
        $kontraindikasi = Kontraindikasi::all();
        // return $kontraindikasi;
        $interaksi = Interaksi::all();
        $bentukObat = BentukObat::all();
        $satuan = [
            0 => 'ml',
            1 => 'mg',
        ];

        // return $obat;
        return view('obat.edit',compact('obat','kontraindikasi','interaksi','bentukObat','satuan','kontraindikasiMapping','interaksiMapping'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        // return $request['obatKategori'];
        $this->validate($request,[
          'nama' => 'required|string',
          'bentuk' => 'required',
          'kesediaan' => 'required',
          'satuan' => 'required|string',
          'kontraindikasi' => 'required|array',
          'interaksi' => 'required|array',
          'efekSamping' => 'required|string',
          'petunjukPenyimpanan' => 'required|string',
          'polaMakan' => 'required',
          'deskripsi' =>'required',
          'gambarObat' => 'file|mimes:jpg,png'
         ]);

        $dataKontraindikasiMapping = KontraindikasiMapping::where('obat_id',$id)->get();
        $kontraindikasiMapping = [];
        for ($i=0; $i < count($dataKontraindikasiMapping) ; $i++) { 
          array_push($kontraindikasiMapping, $dataKontraindikasiMapping[$i]->kontraindikasi_id);
        }

        $dataInteraksiMapping = InteraksiMapping::where('obat_id',$id)->get();
        $interaksiMapping = [];
        for ($i=0; $i < count($dataInteraksiMapping) ; $i++) { 
          array_push($interaksiMapping, $dataInteraksiMapping[$i]->kontraindikasi_id);
        }

        DB::beginTransaction();
        try{
            if ($request->hasFile('gambarObat')) {
              $file = $request->file('gambarObat');
              $fileName = time().'_' .uniqid().'.'. $file->getClientOriginalExtension();
              $thumbnailPath = public_path().'/upload/image/';
              $img = Image::make($file)->resize(300,150, function($constraint){
                $constraint->aspectRatio();
              });
              $img->save($thumbnailPath.$fileName);
            }

            $obat = Obat::findOrFail($id);
            $obat->name = $request->nama;
            $obat->save();

            $detailObat = DetailObat::where('obat_id',$id)->first();
            // $detailObat->obat_image = 'upload/image/'.$fileName;
            $detailObat->bentuk_obat = $request->bentuk;
            $detailObat->kesediaan = $request->kesediaan;
            $detailObat->satuan = $request->satuan;
            $detailObat->efek_samping = $request->efekSamping;
            $detailObat->pola_makan = $request->polaMakan;
            $detailObat->penyimpanan = $request->petunjukPenyimpanan;
            $detailObat->obat_description = $request->deskripsi;
            $detailObat->save();

            for ($i=0; $i < count($request['kontraindikasi']); $i++) { 
              if(!in_array($request['kontraindikasi'][$i],$kontraindikasiMapping)){
                $kontraindikasiMapping = new kontraindikasiMapping;
                $kontraindikasiMapping->obat_id = $id;
                $kontraindikasiMapping->kontraindikasi_id = $request['kontraindikasi'][$i];
                $kontraindikasiMapping->save();
              }
            }

            for ($i=0; $i < count($dataKontraindikasiMapping) ; $i++) { 
              if (!in_array($dataKontraindikasiMapping[$i]->kontraindikasi_id,$request['kontraindikasi'])) {
                $kontraindikasiMapping = kontraindikasiMapping::where('kontraindikasi_id',$dataKontraindikasiMapping[$i]->kontraindikasi_id);
                $kontraindikasiMapping->delete();
              }
            }

            for ($i=0; $i < count($request['interaksi']); $i++) { 
              if (!in_array($request['interaksi'][$i],$interaksiMapping)) {
                $interaksiMapping = new InteraksiMapping;
                $interaksiMapping->obat_id = $id;
                $interaksiMapping->interaksi_id = $request['interaksi'][$i];
                $interaksiMapping->save();
              }
            }

            for ($i=0; $i < count($dataInteraksiMapping) ; $i++) { 
              if (!in_array($dataInteraksiMapping[$i]->interaksi_id,$request['interaksi'])) {
                $interaksiMapping = InteraksiMapping::where('interaksi_id',$dataInteraksiMapping[$i]->interaksi_id);
                $interaksiMapping->delete();
              }
            }

            DB::commit();
            return redirect()->route('obat.index')->with('success','Obat berhasil diubah');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('obat.edit',$id)->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::beginTransaction();
        // try{
          $obat = obat::findOrFail($id);
          $obat->delete();

          $detailObat = DetailObat::where('obat_id',$id);
          $detailObat->delete();

          $interaksiMapping = InteraksiMapping::where('obat_id',$id);
          if (is_array($interaksiMapping)) {
            for ($i=0; $i < count($interaksiMapping) ; $i++) { 
              $interaksiMapping[$i]->delete();
            }

          } else {
            $interaksiMapping->delete();
          }
          
          $kontraindikasiMapping = KontraindikasiMapping::where('obat_id',$id);
          if (is_array($kontraindikasiMapping)) {
            for ($i=0; $i < count($kontraindikasiMapping) ; $i++) { 
              $kontraindikasiMapping[$i]->delete();
            }
          } else {
            $kontraindikasiMapping->delete();
          }
          

          // DB::commit();
          return redirect()->route('obat.index')->with('success','Obat deleted successfully');
        // }catch(\Exception $e){
        //   DB::rollback();
        //   return redirect()->route('obat.index')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        // }
    }

    public function detailObat(Request $request)
    {
        $id = $request->id;
        // return $id;
        $data = Obat::with(['detailObat','bentukObat','interaksiMapping' => function($query){
          $query->with('interaksi');
        },'kontraindikasiMapping' => function($query){
          $query->with('kontraindikasi');
        }])
                ->where('obat_id',$id)
                ->first();
        // return $data;
        $listInteraksi ='';
        for ($i=0; $i < count($data->interaksiMapping) ; $i++) { 
          $listInteraksi .= '<li>'.$data->interaksiMapping[$i]->interaksi->interaksi_name.'</li>';
        }

        $listKontraindikasi ='';
        for ($i=0; $i < count($data->kontraindikasiMapping) ; $i++) { 
          $listKontraindikasi = '<li>'.$data->kontraindikasiMapping[$i]->kontraindikasi->kontraindikasi.'</li>';
        }

        $table = '';
        $table =    '
                <div class="card">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr class="bg-blue">
                          <th>Nama</th>
                          <th>Gambar</th>
                          <th>Bentuk</th>
                          <th>Kesediaan</th>
                          <th>Satuan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>'.$data->name.'</td>
                          <td><img src="'.$data->detailObat->obat_image.'"></td>
                          <td>'.$data->detailObat->bentukObat->bentuk.'</td>
                          <td>'.$data->detailObat->kesediaan.'</td>
                          <td>'.$data->detailObat->satuan.'</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="card">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr class="bg-warning">
                          <th>Efek Samping</th>
                          <th>Pola Makan</th>
                          <th>Penyimpanan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>'.$data->detailObat->efek_samping.'</td>
                          <td>'.$data->detailObat->pola_makan.'x sehari</td>
                          <td>'.$data->detailObat->penyimpanan.'</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="card">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr class="bg-warning">
                          <th>Interaksi</th>
                          <th>Kontraindikasi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><ul>'.$listInteraksi.'</ul></td>
                          <td><ul>'.$listKontraindikasi.'</ul></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="card">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr class="bg-danger">
                          <th>Makanan</th>
                          <th>Minuman</th>
                          <th>umur</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>'.$data->detailObat->makanan.'</td>
                          <td>'.$data->detailObat->minuman.'</td>
                          <td>'.$data->detailObat->umur.'</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                ';
        return $table;
    }
}
