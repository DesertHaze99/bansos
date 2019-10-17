<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interaksi;
use DB;
use Auth;
use session;
use URL;

class InteraksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('interaksi.index');
    }

    public function interaksiAjax()
    {
        $data = Interaksi::all();

        return datatables()->of($data)
        ->addColumn('action',function($data){
            $button = '';
            $button .= '<form id="myform" method="post" action="'.route('interaksi.destroy',$data->interaksi_id).'">
                            '.csrf_field().'
                            <a href="' .URL::to('/interaksi/' . $data->interaksi_id . '/edit'). '" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
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
        return view('interaksi.create');
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
            'interaksiName' => 'required|string'
        ]);

        DB::beginTransaction();
        try {
            $interaksi = new Interaksi;
            $interaksi->interaksi_name = $request->interaksiName;
            $interaksi->save();
            DB::commit();

            return redirect()->route('interaksi.index')->with('success','interaksi berhasi ditambahkan');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('interaksi.create')->with('error','Ada yang salah dengan sistem, hubungi pengembang');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $interaksi = Interaksi::findOrFail($id);
        return view('interaksi.edit',compact('interaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'interaksiName' => 'required|string'
        ]);

        try {
            $interaksi = Interaksi::findOrFail($id);
            $interaksi->interaksi_name = $request->interaksiName;
            $interaksi->save(); 
            DB::commit();
            return redirect()->route('interaksi.index')->with('success','interaksi berhasi diubah');   
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('interaksi.edit',$id)->with('error','Ada yang salah dengan sistem, hubungi pengembang');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $interaksi = Interaksi::findOrFail($id);
            $interaksi->delete();
            DB::commit();
            return redirect()->route('interaksi.index')->with('success','interaksi berhasi dihapus');   
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('interaksi.index')->with('error','Ada yang salah dengan sistem, hubungi pengembang');
        }
    }
}
