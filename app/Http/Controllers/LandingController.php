<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use DB;
use App\Pengaduan;
use App\Artikel;

class LandingController extends Controller
{
	/* public function __construct()
    {
        $this->middleware('auth');
    } */
    
    public function index()
    {   
        $artikel = Artikel::limit(3)->get();
    	
    	return view('user.index', compact('artikel'));
    }

    public function tambahPengaduan(Request $request){
		$this->validate($request, [
            'email' => 'required',
			'attachment' => 'required',
			'keterangan' => 'required',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('attachment');
		$tujuan_upload = 'upload/dataPengaduan';
        $file->move($tujuan_upload,$file->getClientOriginalName());
        
        DB::beginTransaction();
        try {
                $pengaduan = new Pengaduan();
                $pengaduan->email  = $request->email;
                $pengaduan->keterangan  = $request->keterangan;
                $pengaduan->attachment  = $tujuan_upload.'/'.$file->getClientOriginalName();
                $pengaduan->save();
                DB::commit();
            return redirect::to('/')->with('success','Data berhasil ditambahkan');
            
        } catch (Exception $e) {
            DB::rollback();

            return redirect::to('/')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
	}
}
