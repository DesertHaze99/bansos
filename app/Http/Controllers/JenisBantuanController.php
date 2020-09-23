<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use DB;
use App\JenisBantuan;

class JenisBantuanController extends Controller
{
	/* public function __construct()
    {
        $this->middleware('auth');
    } */
    
    public function index()
    {
        $jenis_bantuan = JenisBantuan::all();
        
    	return view('admin.parameter.jenis_bantuan.index', compact('jenis_bantuan'));
    }

    public function jenisBantuanAJAX()
    {
        $data  = JenisBantuan::all();
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

    public function editJenisBantuan($id_bantuan, Request $request){
		$this->validate($request, [
		]);
        
        DB::beginTransaction();
        try {
                $jenisBantuan =  JenisBantuan::find($id_bantuan);
                $jenisBantuan->bantuan  = $request->bantuan;
                $jenisBantuan->save();
                DB::commit();

                return redirect('/admin/parameter/jenis_bantuan')->with('success','Data berhasil diubah');
            
        } catch (Exception $e) {
            DB::rollback();

            return redirect('/admin/parameter/jenis_bantuan')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }
    
    public function tambahJenisBantuan(Request $request){
		$this->validate($request, [
		]);
        
        DB::beginTransaction();
        try {
                $jenisBantuan =  new JenisBantuan;
                $jenisBantuan->bantuan  = $request->bantuan;
                $jenisBantuan->save();
                DB::commit();

                return redirect('/admin/parameter/jenis_bantuan')->with('success','Data berhasil diubah');
            
        } catch (Exception $e) {
            DB::rollback();

            return redirect('/admin/parameter/jenis_bantuan')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
	}
}
