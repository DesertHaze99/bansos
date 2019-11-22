<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use URL;
use session;
use App\BentukObat;

class BentukObatController extends Controller
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
        return view('bentukObat.index');
    }

    //ajax datatable
    public function bentukObatAjax()
    {
        $data = BentukObat::all();
        $listKategori ='';
        // return $data;
        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="myform" method="post" action="'.route('bentukObat.destroy',$data->bentuk_obat_id).'">
                                '.csrf_field().'
                                <a href="' .URL::to('/bentukObat/' . $data->bentuk_obat_id . '/edit'). '" class="btn btn-sm btn-warning"><i class="fas fa-edit mr-1"></i> Edit</a>
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
        return view('bentukObat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'bentukObatName' => 'required|string'
        ]);

        DB::beginTransaction();
        try{
          $bentukObat = new BentukObat;
          $bentukObat->bentuk = $request->bentukObatName;
          $bentukObat->save();
          DB::commit();
          return redirect()->route('bentukObat.index')->with('success','Bentuk obat berhasil ditambahkan');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('bentukObat.create')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bentukObat = BentukObat::findOrFail($id);
        return view('bentukObat.edit',compact('bentukObat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request['obatKategori'];
         $this->validate($request,[
            'bentukObatName' => 'required|string'
        ]);

        DB::beginTransaction();
        try{
            $bentukObat = BentukObat::findOrFail($id);
            $bentukObat->bentuk = $request->bentukObatName;
            $bentukObat->save();
            DB::commit();
            return redirect()->route('bentukObat.index')->with('success','bentuk obat berhasil diubah');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('bentukObat.edit',$id)->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try{
          $bentukObat = BentukObat::findOrFail($id);
          $bentukObat->delete();
          DB::commit();
          return redirect()->route('bentukObat.index')->with('success','Bentuk obat deleted successfully');
        }catch(\Exception $e){
          DB::rollback();
          return redirect()->route('bentukObat.index')->with('error','Ada yang tidak beres silahkan hubungi pengembang');
        }
    }
}
