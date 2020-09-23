<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use DB;
use App\Artikel;

class ArtikelController extends Controller
{
	/* public function __construct()
    {
        $this->middleware('auth');
    } */
    
    public function index()
    {
        $artikel = Artikel::all();
    	
    	return view('admin.artikel.index', compact('artikel'));
    }

    public function artikelAJAX()
    {
        $data  = Artikel::all();
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

    public function store(Request $request)
    {


        $this->validate($request, [
            'upload.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required',
            'content' => 'required'
        ]);

        $imgName = ' ';
        if($request->hasFile('upload')) {
            $imageNameArr = [];
            foreach ($request->upload as $file) {
                // you can also use the original name/* 
                $imageName = time().'-'.$file->getClientOriginalName();
                $imageNameArr[] = $imageName;
                // Upload file to public path in images directory
                $file->move(public_path('/upload/image'), $imageName);
                // Database operation
                $imgName = $imgName.'upload/image/'.$imageName.', ';
            }
        }

        DB::beginTransaction();
        try {
                $file= new Artikel();
                $file->judul = $request->judul;
                $file->content = $request->content;
                $file->image= $imgName;
                $file->save();
                DB::commit();

                return redirect('/admin/artikel')->with('success', 'Data telah berhasil ditambahkan');
            
        } catch (Exception $e) {
            DB::rollback();

            return redirect('/admin/artikel')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }

    public function editArtikel($id_artikel, Request $request)
    {


        $this->validate($request, [
            //'upload.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required',
            'content' => 'required'
        ]);

        DB::beginTransaction();
        try {
                $file= Artikel::find($id_artikel);
                $file->judul = $request->judul;
                $file->content = $request->content;
                $file->save();
                DB::commit();

                return redirect('/admin/artikel')->with('success', 'Data telah berhasil ditambahkan');
            
        } catch (Exception $e) {
            DB::rollback();

            return redirect('/admin/artikel')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }

       
    }
}
