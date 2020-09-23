<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use DB;
use App\Pengaduan;

class PengaduanController extends Controller
{
	/* public function __construct()
    {
        $this->middleware('auth');
    } */
    
    public function index()
    {
    	$pengaduan = Pengaduan::all();
    	return view('admin.pengaduan.index', compact('pengaduan'));
    }

    public function pengaduanAJAX()
    {
        $data  = Pengaduan::all();
        //return $data;
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

    public function verifikasiPengaduan($id_pengaduan, Request $request){
		$this->validate($request, [
		]);
        
        DB::beginTransaction();
        try {
                $pengaduan =  Pengaduan::where('id_pengaduan', '=', $id_pengaduan)->first();
                $pengaduan->status_pengaduan  = $request->status_pengaduan;
                $pengaduan->save();
                DB::commit();

                return redirect('/admin/pengaduan')->with('success','Data telah terverifikasi');
            
        } catch (Exception $e) {
            DB::rollback();

            return redirect('/admin/pengaduan')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
	}
}
