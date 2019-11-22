<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use URL;
use session;
use App\Pasien;

class PasienController extends Controller
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
        return view('pasien.index');
    }

    //ajax datatable
    public function pasienAjax()
    {
        $data = Pasien::all();
        $listKategori ='';
        // return $data;
        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="myform" method="post" action="'.route('pasien.destroy',$data->no_rm).'">
                                '.csrf_field().'
                                <a href="' .URL::to('/pasien/' . $data->no_rm . '/edit'). '" class="btn btn-sm btn-warning"><i class="fas fa-edit mr-1"></i> Edit</a>
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" ><i class="far fa-trash-alt mr-1"></i> Delete</button>
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
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $pasien = new Pasien;
            $pasien->nama = $request->nama;
            $pasien->jenis_kelamin = $request->jenis_kelamin;
            $pasien->tanggal_lahir = $request->tanggal_lahir;
            $pasien->no_telp = $request->no_telp;
            $pasien->alamat = $request->alamat;
            $pasien->added_by = Auth::user()->id;
            $pasien->save();
            DB::commit();
            return redirect()->route('pasien.index')->with('success','Pasien berhasil ditambahkan');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('pasien.create')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.edit',compact('pasien'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $pasien = Pasien::findOrFail($id);
            $pasien->nama = $request->nama;
            $pasien->jenis_kelamin = $request->jenis_kelamin;
            $pasien->tanggal_lahir = $request->tanggal_lahir;
            $pasien->no_telp = $request->no_telp;
            $pasien->alamat = $request->alamat;
            $pasien->added_by = Auth::user()->id;
            $pasien->save();
            DB::commit();
            return redirect()->route('pasien.index')->with('success','Pasien berhasil diubah');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('pasien.edit',$id)->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $pasien = Pasien::findOrFail($id);
            $pasien->delete();
            DB::commit();
            return redirect()->route('pasien.index')->with('success','Pasien berhasil dihapus');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('pasien.index')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }
}
