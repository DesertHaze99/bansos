<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use URL;
use session;
use App\Obat;

class ObatController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
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
        		// with(['detailObat','kategoriMapping' => function($query){
          //         $query->with('kategori');
          //       }])
          //       ->orderBy('obat_id','desc')
          //       ->get();
        // return $data[0]->kategoriMapping[0]->kategori_name;
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
            // ->addColumn('kategori',function($data) use($listKategori){
            //   for ($i=0; $i <count($data->kategoriMapping) ; $i++) { 
            //       $listKategori .= '<li>'.$data->kategoriMapping[$i]->kategori->kategori_name.'</li>';
            //   }
            //   $list = '<ul>'.$listKategori.'</ul>';
            //   return $list;
            // })
            // ->addColumn('kadaluarsa',function($data){
            //     return $data->detailObat->kadaluarsa;
            // })
            // ->addColumn('efek_samping',function($data){
            //     return $data->detailObat->efek_samping;
            // })
            // ->addColumn('pola_makan',function($data){
            //     return$data->detailObat->pola_makan;
            // })
            // ->editColumn('obat_image',function($data){
            //     return '<img src="'.$data->detailObat->obat_image.'" >';
            // })
            // ->rawColumns(['action','obat_image','kategori'])
            ->removeColumn('updated_at')
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('obat.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return dd($request->all());
        // return $request->all();
        $this->validate($request,[
            'obatName' => 'required',
            'obatImage' => 'required|file',
            'kadaluarsa' => 'required',
            'efekSamping' => 'required',
            'polaMakan' => 'required',
            'penyimpanan' => 'required',
            'obatKategori' => 'required',
        ]);

        // return $request['obatKategori'][1];

        DB::beginTransaction();
        try{
            $originalImage = $request['obatImage'];
            $fileName =time().'_'.uniqid().'_'.$originalImage->getClientOriginalName();
            $image  = Image::make($originalImage);
            $path = public_path().'/upload/img/';
            $image->resize(150,150);
            $image->save($path.$fileName);

            $obat = new obat;
            $obat->name = $request['obatName'];
            $obat->added_by = Auth::user()->id;
            $obat->save();
            $obatId = $obat->obat_id;

            $detailObat = new DetailObat;
            $detailObat->obat_id = $obatId;
            $detailObat->kadaluarsa = $request['kadaluarsa'];
            $detailObat->obat_image = '/upload/img/'.$fileName;
            $detailObat->efek_samping = $request['efekSamping'];
            $detailObat->pola_makan = $request['polaMakan'];
            $detailObat->penyimpanan = $request['penyimpanan'];
            $detailObat->obat_description = $request['obatDeskripsi'];
            $detailObat->save();

            for ($i=0; $i < count($request['obatKategori']); $i++) { 
              $KategoriMapping = new KategoriMapping;
              $KategoriMapping->obat_id = $obatId;
              $KategoriMapping->kategori_id = $request['obatKategori'][$i];
              $KategoriMapping->save();
            }

            DB::commit();
            return redirect()->route('obat.index')->with('success','Obat berhasil ditambahkan');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('obat.create')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
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
        $obat = Obat::with('detailObat','kategoriMapping')
                ->where('obat_id',$id)
                ->first();
        $dataKategoriMapping = KategoriMapping::with('kategori')
                          ->where('obat_id',$id)->get();
        $kategoriMapping = [];
        for ($i=0; $i < count($dataKategoriMapping) ; $i++) { 
          array_push($kategoriMapping, $dataKategoriMapping[$i]->kategori_id);
        }
        $kategori = Kategori::all();

        // return $obat;
        return view('obat.edit',compact('obat','kategoriMapping','kategori'));
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
        // return $request['obatKategori'];
         $this->validate($request,[
            'obatName' => 'required',
            'obatImage' => 'required|file',
            'obatKategori' => 'required',
            'kadaluarsa' => 'required',
            'efekSamping' => 'required',
            'polaMakan' => 'required',
            'penyimpanan' => 'required'
        ]);

        $dataKategoriMapping = KategoriMapping::where('obat_id',$id)->get();

// return $dataKategoriMapping[1]->kategori_id;
        $kategoriMapping = [];
        for ($i=0; $i < count($dataKategoriMapping) ; $i++) { 
          array_push($kategoriMapping, $dataKategoriMapping[$i]->kategori_id);
        }

        DB::beginTransaction();
        try{
            $data = DetailObat::where('obat_id',$id)->first();
            $img = $data->obat_image;
            File::delete($img);

            $originalImage = $request['obatImage'];
            $fileName =time().'_'.uniqid().'_'.$originalImage->getClientOriginalName();
            $image  = Image::make($originalImage);
            $path = public_path().'/upload/img/';
            $image->resize(150,150);
            $image->save($path.$fileName);

            $obat = Obat::where('obat_id',$id)->first();
            $obat->name = $request['obatName'];
            $obat->save();
            $obatId = $obat->obat_id;

            $detailObat = DetailObat::where('obat_id',$id)->first();
            $detailObat->obat_id = $obatId;
            $detailObat->obat_image = '/upload/img/'.$fileName;
            $detailObat->kadaluarsa = $request['kadaluarsa'];
            $detailObat->efek_samping = $request['efekSamping'];
            $detailObat->pola_makan = $request['polaMakan'];
            $detailObat->penyimpanan = $request['penyimpanan'];
            $detailObat->save();

            for ($i=0; $i < count($request['obatKategori']); $i++) { 
              if(!in_array($request['obatKategori'][$i],$kategoriMapping)){
                $mappingKategori = new KategoriMapping;
                $mappingKategori->obat_id = $obatId;
                $mappingKategori->kategori_id = $request['obatKategori'][$i];
                $mappingKategori->save();
              }
            }

            for ($i=0; $i < count($dataKategoriMapping) ; $i++) { 
              if (!in_array($dataKategoriMapping[$i]->kategori_id,$request['obatKategori'])) {
                $mappingKategori = KategoriMapping::where('kategori_id',$dataKategoriMapping[$i]->kategori_id);
                $mappingKategori->delete();
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
        DB::beginTransaction();
        try{
          $obat = obat::where('obat_id',$id);
          $obat->delete();

          $detailObat = DetailObat::where('obat_id',$id);
          $detailObat->delete();

          $interaksiObat = InteraksiObat::where('obat_id',$id)->get();
          for ($i=0; $i < count($interaksiObat) ; $i++) { 
              $interaksiObat[$i]->delete();
          }

          DB::commit();
          return redirect()->route('obat.index')->with('success','Obat deleted successfully');
        }catch(\Exception $e){
          DB::rollback();
          return redirect()->route('obat.index')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }

    public function modalDetail(Request $request)
    {
        $id = $request['id'];
        $data = Obat::with('detailObat')
                ->where('obat_id',$id)
                ->first();

        $table = '';
        $table =    '<table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Nama Obat</th>
                          <th scope="col">Kadaluarsa</th>
                          <th scope="col">Efek samping</th>
                          <th scope="col">Pola makan</th>
                          <th scope="col">Penyimpanan</th>
                          <th scope="col">Deskripsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>'.$data->name.'</th>
                          <td>'.$data->detailObat->kadaluarsa.'</td>
                          <td>'.$data->detailObat->efek_samping.'</td>
                          <td>'.$data->detailObat->pola_makan.'x sehari</td>
                          <td>'.$data->detailObat->penyimpanan.'</td>
                          <td>'.$data->detailObat->obat_description.'</td>
                        </tr>
                      </tbody>
                    </table>';
        return $table;
    }
}
