<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use URL;
use Auth;
use session;
use App\Obat;
use App\Dosis;

class DosisController extends Controller
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
        return view('dosis.index');
    }

    //ajax datatable
    public function dosisAjax()
    {
        $data = Dosis::with('obat')->get();
        // return $data;
        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="myform" method="post" action="'.route('dosis.destroy',$data->dosis_id).'">
                                '.csrf_field().'
                                <a href="' .URL::to('/dosis/' . $data->dosis_id . '/edit'). '" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" ><i class="fa fa-trash-o"></i> Delete</button>
                            </form>';
                return $button;
            })
            ->editColumn('obat_id',function($data){
                return $data->obat->name;
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
        $obat = Obat::all();
        return view('dosis.create',compact('obat'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'dosisValue' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $dosis = new Dosis;
            $dosis->obat_id = $request->obat;
            $dosis->dosis_value = $request->dosisValue;
            $dosis->save();
            DB::commit();
            return redirect()->route('dosis.index')->with('success','Dosis berhasil ditambahkan');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('dosis.create')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }

    public function edit($id)
    {
        $dosis = Dosis::findOrFail($id);
        return view('dosis.edit',compact('dosis'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'dosisValue' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $dosis = Dosis::findOrFail($id);
            $dosis->obat_id = $request->obat;
            $dosis->dosis_value = $request->dosisValue;
            $dosis->save();
            DB::commit();
            return redirect()->route('dosis.index')->with('success','Dosis berhasil diubah');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('dosis.edit',$id)->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $dosis = Dosis::findOrFail($id);
            $dosis->delete();
            DB::commit();
            return redirect()->route('dosis.index')->with('success','Dosis berhasil dihapus');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('dosis.index')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }
}
