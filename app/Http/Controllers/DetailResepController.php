<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailResep;
use App\Resep;
use App\Obat;
use App\DetailObat;
use Session;
use DB;
use URL;
use response;
use PDF;
use QrCode;
use Carbon\Carbon;

class DetailResepController extends Controller
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
        //
    }

    public function detailResepAjax($id)
    {
        $data = DetailResep::with(['obat' => function($query){
                    $query->with('detailObat');
                }])
                ->where('resep_id',$id)
                ->get();
        // return $data;
        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="myform" method="post" action="'.route('detailResep.destroy',$data->detail_resep_id).'">
                                '.csrf_field().'
                                <a href="'.URL::to('/resep/' . $data->resep_id . '/detailResep/'.$data->detail_resep_id.'/detailObat').'" class="btn btn-sm btn-success"><i class="fas fa-book mr-1"></i> Detail</a>
                                <a href="' .URL::to('/detailResep/' . $data->detail_resep_id . '/edit'). '" class="btn btn-sm btn-warning"><i class="fas fa-edit mr-1"></i> Edit</a>
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" ><i class="far fa-trash-alt mr-1"></i>   Delete</button>
                            </form>';
                return $button;
            })
            ->editColumn('obat_id',function($data){
                return $data->obat->name;
            })
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
        //
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
            'resepId' => 'required',
            'namaObat' => 'required|string',
            'dosis' => 'required',
            'aturanPakai' => 'required|string',
            'takaranMinum' => 'required|string',
            'bentukObat' => 'required',
            'waktuMinum' => 'required|string',
            'keterangan' => 'required|string',
            'jumlahObat' => 'required',
            'jumlahKaliMinum' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $id = $request->resepId;
            $detailResep = new DetailResep;
            $detailResep->resep_id = $request->resepId;
            $detailResep->obat_id = $request->namaObat;
            $detailResep->dosis = $request->dosis;
            $detailResep->aturan_pakai = $request->aturanPakai;
            $detailResep->takaran_minum = $request->takaranMinum;
            $detailResep->bentuk_obat = $request->bentukObat;
            $detailResep->waktu_minum = $request->waktuMinum;
            $detailResep->keterangan = $request->keterangan;
            $detailResep->jumlah_obat = $request->jumlahObat;
            $detailResep->jumlah_kali_minum = $request->jumlahKaliMinum;
            $detailResep->save();
            DB::commit();

            return redirect()->route('detailResep',$id)->with('success','resep berhasil ditambahkan');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('detailResep',$id)->with('error','Ada sesuatu yang tidak beres silahkan hubungi pengembang');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obat = Obat::with('detailObat')->get();
        $detailResep = DetailResep::where('detail_resep_id',$id)
                        ->with('obat','detailObat')
                        ->first();
        $waktuMinum = [
            '0' => 'sebelum makan',
            '1' => 'saat makan',
            '2' => 'sesudah makan'
        ];
        $keterangan = [
            '0' => 'kondisional',
            '1' => 'harus habis',
            '2' => 'rutin' 
        ];
        // return $detailResep;
        return view('resep.edit',compact('obat','detailResep','waktuMinum','keterangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        $this->validate($request,[
            'namaObat' => 'required|string',
            'dosis' => 'required',
            'aturanPakai' => 'required|string',
            'takaranMinum' => 'required|string',
            'bentukObat' => 'required',
            'waktuMinum' => 'required|string',
            'keterangan' => 'required|string',
            'jumlahObat' => 'required',
            'jumlahKaliMinum' => 'required'
        ]);


        DB::beginTransaction();
        try {
            $detailResep = DetailResep::findOrFail($id);
            $resepId = $detailResep->resep_id;
            $detailResep->obat_id = $request->namaObat;
            $detailResep->dosis = $request->dosis;
            $detailResep->aturan_pakai = $request->aturanPakai;
            $detailResep->takaran_minum = $request->takaranMinum;
            $detailResep->bentuk_obat = $request->bentukObat;
            $detailResep->waktu_minum = $request->waktuMinum;
            $detailResep->keterangan = $request->keterangan;
            $detailResep->jumlah_obat = $request->jumlahObat;
            $detailResep->jumlah_kali_minum = $request->jumlahKaliMinum;
            $detailResep->save();
            DB::commit();

            return redirect()->route('detailResep',$resepId)->with('success','resep berhasil diubah');    
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error','Ada sesuatu yang tidak beres silahkan hubungi pengembang');
        }
        // $id = $request->resepId;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $detailResep = DetailResep::findOrFail($id);
            $detailResep->delete();
            DB::commit();
            return redirect()->back()->with('success','Obat pada resep berhasil dihapus');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }

    public function autoCompleteObat(Request $request)
    {
        // return $request->get('param');
        $param = $request->get('term');
        // return $param;
        $data  = Obat::with('detailObat')
                ->where('name','LIKE','%'.$param.'%')
                ->get();

        return response()->json($data);
    }

    public function detail($resepId,$detailObatId)
    {
        // return $detailObatId;
        $resep = Resep::with(['detail' => function($query) use ($detailObatId){
                    $query->with(['obat' => function($query){
                            $query->with(['kontraindikasiMapping' => function($query){$query->with('kontraindikasi');},'interaksiMapping'=>function($query){$query->with('interaksi');}]);
                        },'detailObat'])
                        ->where('detail_resep_id',$detailObatId)
                        ->first();
                }])
                ->where('resep_id',$resepId)
                ->first();
        // return $resep;
        return view('resep.detailObat',compact('resep'));
    }

    public function qrcode($id)
    {
        $resep = Resep::with(['detail' => function($query){
            $query->with('detailObat', 'obat');
        },'pasien'])
            ->where('resep_id',$id)
            ->first();
        
        $pdfname = 'resep_obat_'.$resep->resep_id;
        \QrCode::size(100)
              ->format('png')
              ->generate('<h1> PASIEN :'.$resep->pasien->nama.'</h1> <h1>Link : http://localhost:8000/resep/13/qr </h1>', public_path('images/qrcode/'.$pdfname.'.png'));
        
        $customPaper = array(0,0,180,300);
        $resepPdf = PDF::loadView('mumut',compact('resep','pdfname'))->setPaper($customPaper,'landscape');

        // return view('mumut',compact('resep','pdfname'));
        return $resepPdf->download($pdfname); 
        // return view('qrcode')->with(['resep' => $resep]);
    }
}
