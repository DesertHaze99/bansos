<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use URL;
use session;
use App\Obat;
use App\MerkDagang;

class MerkDagangController extends Controller
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
        return view('merkDagang.index');
    }

    //ajax datatable
    public function merekDagangAjax()
    {
        $data = MerkDagang::with('obat')->get();
        
        //return $data;
        return datatables()->of($data)

            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="myform" method="post" action="'.route('merkDagang.destroy',$data->id_merek_dagang).'">
                                '.csrf_field().'
                                <a href="' .URL::to('/merkDagang/' . $data->id_merek_dagang . '/edit'). '" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
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
        // return $obat;
        return view('merkDagang.create',compact('obat'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'merkDagangName' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $merkDagang = new MerkDagang;
            $merkDagang->obat_id = $request->obat;
            $merkDagang->merek_dagang_name = $request->merkDagangName;
            $merkDagang->added_by = Auth::user()->id;
            $merkDagang->save();
            DB::commit();
            return redirect()->route('merkDagang.index')->with('success','Merk dagang berhasil ditambahkan');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('bentukObat.create')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }

    public function edit($id)
    {
        $merkDagang = MerkDagang::findOrFail($id);
        return view('merkDagang.edit',compact('merkDagang'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'merkDagangName' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $merkDagang = MerkDagang::findOrFail($id);
            $merkDagang->obat_id = $request->obat;
            $merkDagang->merek_dagang_name = $request->merkDagangName;
            $merkDagang->save();
            DB::commit();
            return redirect()->route('merkDagang.index')->with('success','Merk dagang berhasil diubah');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('merkDagang.edit',$id)->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }

    public function destroy($id)
    {   
        DB::beginTransaction();
        try {
            $merkDagang = MerkDagang::findOrFail($id);
            $merkDagang->delete();
            DB::commit();
            return redirect()->route('merkDagang.index')->with('success','Merk dagang berhasil dihapus');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('merkDagang.index')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }
}
