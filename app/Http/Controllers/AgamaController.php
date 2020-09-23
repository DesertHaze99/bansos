<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use DB;
use App\Agama;

class AgamaController extends Controller
{
	/* public function __construct()
    {
        $this->middleware('auth');
    } */
    
    public function index()
    {
    	$agama = Agama::all();
    	return view('admin.parameter.agama.index', compact('agama'));
    }

    public function agamaAJAX()
    {
        $data  = Agama::all();
        //return $data;
        return DataTables()->of($data)
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

    public function editAgama($id_agama, Request $request){
		$this->validate($request, [
		]);
        
        DB::beginTransaction();
        try {
                $agama =  Agama::find($id_agama);
                $agama->agama  = $request->agama;
                $agama->save();
                DB::commit();

                return redirect('/admin/parameter/agama')->with('success','Data berhasil diubah');
            
        } catch (Exception $e) {
            DB::rollback();

            return redirect('/admin/parameter/agama')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }
    
    public function tambahAgama(Request $request){
		$this->validate($request, [
		]);
        
        DB::beginTransaction();
        try {
                $agama =  new Agama;
                $agama->agama  = $request->agama;
                $agama->save();
                DB::commit();

                return redirect('/admin/parameter/agama')->with('success','Data berhasil diubah');
            
        } catch (Exception $e) {
            DB::rollback();

            return redirect('/admin/parameter/agama')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
	}
}
