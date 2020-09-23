<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpKernel\Exception\HttpException;
use DB;
use URL;
use Auth;
use session;
use Exception;
use App\PenerimaBantuan;
use App\JenisBantuan;
use App\Penduduk;
use App\VektorWilayah;
use App\Status;
use App\Agama;
use App\JenisKelamin;

class PenerimaBantuanController extends Controller
{
	/* public function __construct()
    {
        $this->middleware('auth');
    } */
    
    public function index()
    {
        $propinsi = VektorWilayah::select('KDPROP', 'NMPROP')->groupBy('NMPROP')->get();

        $jenis_bantuan = JenisBantuan::all();
        $status_perkawinan = Status::all();
        $jenis_kelamin = JenisKelamin::all();
        $agama = Agama::all();

        $penerima  = PenerimaBantuan::join('penduduk','penduduk.nik', '=', 'penerima_bantuan.nik')
                                ->join('jenis_bantuan', 'jenis_bantuan.id_bantuan', '=', 'penerima_bantuan.bantuan_id')
                                ->get();
    	
    	return view('admin.penerima_bantuan.index', compact('propinsi', 'status_perkawinan', 'agama', 'jenis_kelamin', 'jenis_bantuan', 'penerima'));
    }

    public function sembako()
    {
        $propinsi = VektorWilayah::select('KDPROP', 'NMPROP')->groupBy('NMPROP')->get();

        $jenis_bantuan = JenisBantuan::all();
        $status_perkawinan = Status::all();
        $jenis_kelamin = JenisKelamin::all();
        $agama = Agama::all();

        $penerima  = PenerimaBantuan::join('penduduk','penduduk.nik', '=', 'penerima_bantuan.nik')
                                ->join('jenis_bantuan', 'jenis_bantuan.id_bantuan', '=', 'penerima_bantuan.bantuan_id')
                                ->get();
    	
    	return view('admin.penerima_bantuan.sembako.index', compact('propinsi', 'status_perkawinan', 'agama', 'jenis_kelamin', 'jenis_bantuan', 'penerima'));
    }

    public function raskin()
    {
        $propinsi = VektorWilayah::select('KDPROP', 'NMPROP')->groupBy('NMPROP')->get();

        $jenis_bantuan = JenisBantuan::all();
        $status_perkawinan = Status::all();
        $jenis_kelamin = JenisKelamin::all();
        $agama = Agama::all();

        $penerima  = PenerimaBantuan::join('penduduk','penduduk.nik', '=', 'penerima_bantuan.nik')
                                ->join('jenis_bantuan', 'jenis_bantuan.id_bantuan', '=', 'penerima_bantuan.bantuan_id')
                                ->get();
    	
    	return view('admin.penerima_bantuan.raskin..index', compact('propinsi', 'status_perkawinan', 'agama', 'jenis_kelamin', 'jenis_bantuan', 'penerima'));
    }

    public function blt()
    {
        $propinsi = VektorWilayah::select('KDPROP', 'NMPROP')->groupBy('NMPROP')->get();

        $jenis_bantuan = JenisBantuan::all();
        $status_perkawinan = Status::all();
        $jenis_kelamin = JenisKelamin::all();
        $agama = Agama::all();

        $penerima  = PenerimaBantuan::join('penduduk','penduduk.nik', '=', 'penerima_bantuan.nik')
                                ->join('jenis_bantuan', 'jenis_bantuan.id_bantuan', '=', 'penerima_bantuan.bantuan_id')
                                ->get();
    	
    	return view('admin.penerima_bantuan.blt.index', compact('propinsi', 'status_perkawinan', 'agama', 'jenis_kelamin', 'jenis_bantuan', 'penerima'));
    }

    public function pnpmm()
    {
        $propinsi = VektorWilayah::select('KDPROP', 'NMPROP')->groupBy('NMPROP')->get();

        $jenis_bantuan = JenisBantuan::all();
        $status_perkawinan = Status::all();
        $jenis_kelamin = JenisKelamin::all();
        $agama = Agama::all();

        $penerima  = PenerimaBantuan::join('penduduk','penduduk.nik', '=', 'penerima_bantuan.nik')
                                ->join('jenis_bantuan', 'jenis_bantuan.id_bantuan', '=', 'penerima_bantuan.bantuan_id')
                                ->get();
    	
    	return view('admin.penerima_bantuan.pnpmm.index', compact('propinsi', 'status_perkawinan', 'agama', 'jenis_kelamin', 'jenis_bantuan', 'penerima'));
    }

    public function verifikasi()
    {
        $propinsi = VektorWilayah::select('KDPROP', 'NMPROP')->groupBy('NMPROP')->get();

        $jenis_bantuan = JenisBantuan::all();
        $status_perkawinan = Status::all();
        $jenis_kelamin = JenisKelamin::all();
        $agama = Agama::all();

        $penerima  = PenerimaBantuan::join('penduduk','penduduk.nik', '=', 'penerima_bantuan.nik')
                                ->join('jenis_bantuan', 'jenis_bantuan.id_bantuan', '=', 'penerima_bantuan.bantuan_id')
                                ->get();
    	
    	return view('admin.penerima_bantuan.verifikasi.index', compact('propinsi', 'status_perkawinan', 'agama', 'jenis_kelamin', 'jenis_bantuan', 'penerima'));
    }

    public function penerimaAJAX()
    {
        $data  = PenerimaBantuan::join('penduduk','penduduk.nik', '=', 'penerima_bantuan.nik')
                                ->join('jenis_bantuan', 'jenis_bantuan.id_bantuan', '=', 'penerima_bantuan.bantuan_id')
                                ->select('IDBDT', 'NO_KK', 'nama', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'KDDESA', 'KDKEC', 'KDKAB', 'KDPROP', 'jenis_kelamin', 'agama', 'penerima_bantuan.*', 'jenis_bantuan.*' )
                                ->get();
                                
        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="button" method="post" action="">
                                '.csrf_field().'
                                <a type="button" href="#" class="btn btn-outline-primary border-transparent">
                                    <b><i class="icon-arrow-right8"></i></b>
                                </a>
                            </form>';
                return $button;
            })
            ->removeColumn('updated_at','added_by')
            ->make(true);
    }

    public function penerimaBLTAJAX()
    {
        $data  = PenerimaBantuan::join('penduduk','penduduk.nik', '=', 'penerima_bantuan.nik')
                                ->join('jenis_bantuan', 'jenis_bantuan.id_bantuan', '=', 'penerima_bantuan.bantuan_id')
                                ->where('bantuan_id', '=', 3)
                                ->select('IDBDT', 'NO_KK', 'nama', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'KDDESA', 'KDKEC', 'KDKAB', 'KDPROP', 'jenis_kelamin', 'agama', 'penerima_bantuan.*', 'jenis_bantuan.*' )
                                ->get();
                                
        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="button" method="post" action="">
                                '.csrf_field().'
                                <a type="button" href="#" class="btn btn-outline-primary border-transparent">
                                    <b><i class="icon-arrow-right8"></i></b>
                                </a>
                            </form>';
                return $button;
            })
            ->removeColumn('updated_at','added_by')
            ->make(true);
    }

    public function penerimaPNPMMAJAX()
    {
        $data  = PenerimaBantuan::join('penduduk','penduduk.nik', '=', 'penerima_bantuan.nik')
                                ->join('jenis_bantuan', 'jenis_bantuan.id_bantuan', '=', 'penerima_bantuan.bantuan_id')
                                ->where('bantuan_id', '=', 4)
                                ->select('IDBDT', 'NO_KK', 'nama', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'KDDESA', 'KDKEC', 'KDKAB', 'KDPROP', 'jenis_kelamin', 'agama', 'penerima_bantuan.*', 'jenis_bantuan.*' )
                                ->get();
                                
        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="button" method="post" action="">
                                '.csrf_field().'
                                <a type="button" href="#" class="btn btn-outline-primary border-transparent">
                                    <b><i class="icon-arrow-right8"></i></b>
                                </a>
                            </form>';
                return $button;
            })
            ->removeColumn('updated_at','added_by')
            ->make(true);
    }

    public function penerimaRaskinAJAX()
    {
        $data  = PenerimaBantuan::join('penduduk','penduduk.nik', '=', 'penerima_bantuan.nik')
                                ->join('jenis_bantuan', 'jenis_bantuan.id_bantuan', '=', 'penerima_bantuan.bantuan_id')
                                ->where('bantuan_id', '=', 2)
                                ->select('IDBDT', 'NO_KK', 'nama', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'KDDESA', 'KDKEC', 'KDKAB', 'KDPROP', 'jenis_kelamin', 'agama', 'penerima_bantuan.*', 'jenis_bantuan.*' )
                                ->get();
                                
        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="button" method="post" action="">
                                '.csrf_field().'
                                <a type="button" href="#" class="btn btn-outline-primary border-transparent">
                                    <b><i class="icon-arrow-right8"></i></b>
                                </a>
                            </form>';
                return $button;
            })
            ->removeColumn('updated_at','added_by')
            ->make(true);
    }

    public function penerimaSembakoAJAX()
    {
        $data  = PenerimaBantuan::join('penduduk','penduduk.nik', '=', 'penerima_bantuan.nik')
                                ->join('jenis_bantuan', 'jenis_bantuan.id_bantuan', '=', 'penerima_bantuan.bantuan_id')
                                ->where('bantuan_id', '=', 1)
                                ->select('IDBDT', 'NO_KK', 'nama', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'KDDESA', 'KDKEC', 'KDKAB', 'KDPROP', 'jenis_kelamin', 'agama', 'penerima_bantuan.*', 'jenis_bantuan.*' )
                                ->get();
                                
        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="button" method="post" action="">
                                '.csrf_field().'
                                <a type="button" href="#" class="btn btn-outline-primary border-transparent">
                                    <b><i class="icon-arrow-right8"></i></b>
                                </a>
                            </form>';
                return $button;
            })
            ->removeColumn('updated_at','added_by')
            ->make(true);
    }

    public function verifikasiAJAX()
    {
        $data  = PenerimaBantuan::join('penduduk','penduduk.nik', '=', 'penerima_bantuan.nik')
                                ->join('jenis_bantuan', 'jenis_bantuan.id_bantuan', '=', 'penerima_bantuan.bantuan_id')
                                ->select('IDBDT', 'NO_KK', 'nama', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'KDDESA', 'KDKEC', 'KDKAB', 'KDPROP', 'jenis_kelamin', 'agama', 'penerima_bantuan.*', 'jenis_bantuan.*' )
                                ->get();
                                
        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="button" method="post" action="">
                                '.csrf_field().'
                                <a type="button" href="#" class="btn btn-outline-primary border-transparent">
                                    <b><i class="icon-arrow-right8"></i></b>
                                </a>
                            </form>';
                return $button;
            })
            ->removeColumn('updated_at','added_by')
            ->make(true);
    }

    public function search(Request $request){
        
        if($request->ajax()) {
          
            $data = Penduduk::where('nik', 'LIKE', $request->nik.'%')
                ->get();
           
            $output = '';
           
            if (count($data)>0) {
              
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
              
                foreach ($data as $row){
                   
                    $output .= '<li class="list-group-item">'.$row->nik.'</li>';
                }
              
                $output .= '</ul>';
            }
            else {
             
                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }
           
            return $output;
        }
    }
    
    public function dataAutosearch(Request $request){
        
        if($request->ajax()) {
            
            
            $data = Penduduk::where('nik', '=',$request->nik)->first();
            $wilayah = VektorWilayah::select('KDPROP', 'NMPROP','KDKAB', 'NMKAB','KDKEC', 'NMKEC', 'KDDESA', 'NMDESA')->where('KDGabungan4', '=', $data->KDPROP.$data->KDKAB.$data->KDKEC.$data->KDDESA)->first();
            $lahir = VektorWilayah::select('KDPROP', 'NMPROP','KDKAB', 'NMKAB')->where('KDGabungan2', '=', $data->KDPROP.$data->KDKAB)->groupBY('KDGabungan2')->first();

            return [$data, $wilayah, $lahir];
        }
    }

    public function tambahPenerimaBantuan(Request $request)
    {

        DB::beginTransaction();
        try {
            $check = PenerimaBantuan::where('nik', $request->nik)
                                    ->join('jenis_bantuan', 'jenis_bantuan.id_bantuan', '=', 'penerima_bantuan.bantuan_id')
                                    ->first();
            $penduduk = Penduduk::where('nik', '=', $request->nik)->first();

            if($check){
                return redirect::to('/admin/penerima')->with('error','Pengguna '.$penduduk->nama.' sudah terdaftar pada bantuan '.$check->bantuan);
            } else {
                $penerima = new PenerimaBantuan;
                $penerima->nik = $request->nik;
                $penerima->bantuan_id = $request->bantuan_id;
                $penerima->tahun_penerimaan = $request->tahun_penerimaan;
                $penerima->status = $request->status;
                $penerima->save();
                DB::commit();
            }
            

            return redirect::to('/admin/penerima')->with('success','Data berhasil ditambahkan');
        } catch (Exception $e) {
            DB::rollback();

            return redirect::to('/admin/penerima')->with('error','Ada kesalahan saat menambah data');
        }
    }
    
    public function editBantuan($id, Request $request)
    {

        DB::beginTransaction();
        try {
            $check = PenerimaBantuan::where('nik', $request->nik)
                                    ->where('status','!=',1)
                                    ->join('jenis_bantuan', 'jenis_bantuan.id_bantuan', '=', 'penerima_bantuan.bantuan_id')
                                    ->first();
            $penduduk = Penduduk::where('nik', '=', $request->nik)->first();

            if($check){
                return redirect::to('/admin/penerima')->with('error','NIK '.$penduduk->nik.' sudah terdaftar pada bantuan '.$check->bantuan);
            } else {
                $penerima = PenerimaBantuan::find($id);
                $penerima->bantuan_id = $request->bantuan_id;
                $penerima->tahun_penerimaan = $request->tahun_penerimaan;
                $penerima->status = $request->status;
                $penerima->save();
                DB::commit();
            }
            

            return redirect::to('/admin/penerima')->with('success','Data berhasil ditambahkan');
        } catch (Exception $e) {
            DB::rollback();

            return redirect::to('/admin/penerima')->with('error','Ada kesalahan saat menambah data');
        }
    }
}
