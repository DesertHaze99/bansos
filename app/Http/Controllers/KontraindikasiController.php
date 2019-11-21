<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use URL;
use session;
use App\Kontraindikasi;

class KontraindikasiController extends Controller
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
        return view('kontraindikasi.index');
    }

    //ajax datatable
    public function kontraindikasiAjax()
    {
        $data = Kontraindikasi::all();
        $listKategori ='';
        // return $data;
        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="myform" method="post" action="'.route('kontraindikasi.destroy',$data->kontraindikasi_id).'">
                                '.csrf_field().'
                                <a href="' .URL::to('/kontraindikasi/' . $data->kontraindikasi_id . '/edit'). '" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" ><i class="fa fa-trash-o"></i> Delete</button>
                            </form>';
                return $button;
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
        return view('kontraindikasi.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'kontraindikasi' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $kontraindikasi = new Kontraindikasi;
            $kontraindikasi->kontraindikasi = $request->kontraindikasi;
            $kontraindikasi->added_by = Auth::user()->id;
            $kontraindikasi->save();
            DB::commit();
            return redirect()->route('kontraindikasi.index')->with('success','Merk dagang berhasil ditambahkan');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('pasien.create')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }

    public function edit($id)
    {
        $kontraindikasi = Kontraindikasi::findOrFail($id);
        return view('kontraindikasi.edit',compact('kontraindikasi'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'kontraindikasi' => 'required'
        ]);
        try {
            $kontraindikasi = Kontraindikasi::findOrFail($id);
            $kontraindikasi->kontraindikasi = $request->kontraindikasi;
            $kontraindikasi->save();
            DB::commit();
            return redirect()->route('kontraindikasi.index')->with('success','Merk dagang berhasil diubah');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('kontraindikasi.edit',$id)->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }

    public function destroy($id)
    {
        try {
            $kontraindikasi = Kontraindikasi::findOrFail($id);
            $kontraindikasi->delete();
            DB::commit();
            return redirect()->route('kontraindikasi.index')->with('success','Merk dagang berhasil dihapus');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('kontraindikasi.index')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }
}
