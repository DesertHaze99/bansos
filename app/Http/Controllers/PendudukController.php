<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use DB;
use App\Penduduk;
use App\VektorWilayah;
use App\Status;
use App\Agama;
use App\JenisKelamin;

class PendudukController extends Controller
{
	/* public function __construct()
    {
        $this->middleware('auth');
    } */
    
    public function index()
    {
        $propinsi = VektorWilayah::select('KDPROP', 'NMPROP')->groupBy('NMPROP')->get();
        $kabupaten = VektorWilayah::select('KDGabungan2','KDKAB', 'NMKAB')->groupBy('NMKAB')->get();
        $kecamatan = VektorWilayah::select('KDGabungan3','KDKEC', 'NMKEC')->groupBy('NMKEC')->get();
        $desa = VektorWilayah::select('KDGabungan4','KDDESA', 'NMDESA')->groupBy('NMDESA')->get();
        $status_perkawinan = Status::all();
        $jenis_kelamin = JenisKelamin::all();
        $agama = Agama::all();
        $penduduk  = Penduduk::all();

    	return view('admin.penduduk.index', compact('propinsi', 'kecamatan', 'desa','status_perkawinan', 'agama', 'kabupaten', 'jenis_kelamin', 'penduduk'));
    }

    public function pendudukAJAX()
    {
        $data  = Penduduk::join('agama', 'penduduk.agama', '=', 'agama.id_agama')
                        ->join('status', 'status.id_status', '=', 'penduduk.status')
                        ->join('jenis_kelamin', 'penduduk.jenis_kelamin', '=', 'jenis_kelamin.id_jk')
                        ->get();
        //return $data;
        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="button'.$data->IDBDT.'" method="post" action="">
                                '.csrf_field().'
                                <button type="button" data-toggle="modal" data-target="#edit/'.$data->IDBDT.'" style="background-color:#6059f6" ><b><i class="icon-arrow-right8"></i></b></button>
                            </form>';
                return $button;
            })
            ->removeColumn('updated_at','added_by')
            ->make(true);
    }

    public function tambahPenduduk(Request $request)
    {
        $this->validate($request,[
        ]);

        DB::beginTransaction();

        try {
            $check = Penduduk::where("nik", $request->nik)->first();

            if(!empty($check)){
                return redirect::to('/admin/penduduk')->with('error','Pengguna sudah ada');
            } else {
                $penduduk = new Penduduk();
                $penduduk->NO_KK  = $request->NO_KK;
                $penduduk->nik  = $request->nik;
                $penduduk->nama  = $request->nama;
                $penduduk->tempat_lahir  = $request->tempat_lahir;
                $penduduk->tanggal_lahir  = $request->tanggal_lahir;
                $penduduk->alamat  = $request->alamat;
                $penduduk->KDPROP  = $request->KDPROP;
                $penduduk->KDKAB  = $request->KDKAB;
                $penduduk->KDKEC  = $request->KDKEC;
                $penduduk->KDDESA  = $request->KDDESA;
                $penduduk->jenis_kelamin  = $request->jenis_kelamin;
                $penduduk->status  = $request->status;
                $penduduk->agama  = $request->agama;
                $penduduk->save();
                DB::commit();
            }
            return redirect::to('/admin/penduduk')->with('success','Data berhasil ditambahkan');
            
        } catch (Exception $e) {
            DB::rollback();

            return redirect::to('/admin/penduduk')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }
    
    public function editPenduduk($IDBDT, Request $request)
    {
        $this->validate($request,[
        ]);

        DB::beginTransaction();

        try {
                $penduduk = Penduduk::find($IDBDT);
                $penduduk->NO_KK  = $request->NO_KK;
                $penduduk->nik  = $request->nik;
                $penduduk->nama  = $request->nama;
                $penduduk->tempat_lahir  = $request->tempat_lahir;
                $penduduk->tanggal_lahir  = $request->tanggal_lahir;
                $penduduk->alamat  = $request->alamat;
                $penduduk->KDPROP  = $request->KDPROP;
                $penduduk->KDKAB  = $request->KDKAB;
                $penduduk->KDKEC  = $request->KDKEC;
                $penduduk->KDDESA  = $request->KDDESA;
                $penduduk->jenis_kelamin  = $request->jenis_kelamin;
                $penduduk->status  = $request->status;
                $penduduk->agama  = $request->agama;
                $penduduk->save();
                DB::commit();

            return redirect::to('/admin/penduduk')->with('success','Data berhasil ditambahkan');
            
        } catch (Exception $e) {
            DB::rollback();

            return redirect::to('/admin/penduduk')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }

    function fetchKabupaten(Request $request){
        if($request->get('query')){
            $query = $request->get('query');
            $data = DB::table('vektorwilayah')
                    ->select('NMKAB')
                    ->where('NMKAB', 'LIKE', "%{$query}%")
                    ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row){
                $output .= '
                <li><a href="#">'.$row->NMKAB.'</a></li>
                ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function dataKAB(Request $request){

        if($request->has('KDPROP')){
            $KDPROP = $request->get('KDPROP');
            $data = VektorWilayah::where('KDPROP',$KDPROP)->select('KDKAB', 'NMKAB')->groupBy('NMKAB')->get();
            return ['success'=>true,'data'=>$data];
        }

    }

    public function dataKEC(Request $request){

        if($request->has('KDKAB')){
            $KDGabungan2 = $request->get('KDKAB');
            $data = VektorWilayah::where('KDGabungan2',$KDGabungan2)->select('KDKEC', 'NMKEC')->groupBy('NMKEC')->get();
            return ['success'=>true,'data'=>$data];
        }

    }

    public function dataDESA(Request $request){

        if($request->has('KDKEC')){
            $KDGabungan3 = $request->get('KDKEC');
            $data = VektorWilayah::where('KDGabungan3',$KDGabungan3)->select('KDDESA', 'NMDESA')->groupBy('NMDESA')->get();
            return ['success'=>true,'data'=>$data];
        }

    }

}
