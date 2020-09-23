<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use DB;
use App\Golongan;

class GolonganController extends Controller
{
	/* public function __construct()
    {
        $this->middleware('auth');
    } */
    
    public function index()
    {
        $golongan = Golongan::all();
    	
    	return view('admin.parameter.golongan.index', compact('golongan'));
    }

    public function golonganAJAX()
    {
        $data  = Golongan::all();
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

    public function editGolongan($id_golongan, Request $request){
		$this->validate($request, [
		]);
        
        DB::beginTransaction();
        try {
                $golongan =  Golongan::find($id_golongan);
                $golongan->golongan  = $request->golongan;
                $golongan->keterangan  = $request->keterangan;
                $golongan->save();
                DB::commit();

                return redirect('/admin/parameter/golongan')->with('success','Data berhasil diubah');
            
        } catch (Exception $e) {
            DB::rollback();

            return redirect('/admin/parameter/golongan')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }
    
    public function tambahGolongan(Request $request){
		$this->validate($request, [
		]);
        
        DB::beginTransaction();
        try {
                $golongan =  new Golongan;
                $golongan->golongan  = $request->golongan;
                $golongan->keterangan  = $request->keterangan;
                $golongan->save();
                DB::commit();

                return redirect('/admin/parameter/golongan')->with('success','Data berhasil diubah');
            
        } catch (Exception $e) {
            DB::rollback();

            return redirect('/admin/parameter/golongan')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
	}
}
