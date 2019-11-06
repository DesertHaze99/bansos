<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailResep;
use Session;
use DB;
use URL;

class DetailResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function detailResepAjax()
    {
        $data = DetailResep::with(['obat' => function($query){
                    $query->with('detailObat');
                }])->get();
        // return $data;
        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="myform" method="post" action="'.route('detailResep.destroy',$data->detail_resep_id).'">
                                '.csrf_field().'
                                <a href="'.URL::to('/detailResep/' . $data->detail_resep_id . '/detail').'" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Detail</a>
                                <a href="' .URL::to('/detailResep/' . $data->detail_resep_id . '/edit'). '" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'resepId' => 'required',
            'namaObat' => 'required|string',
            'dosis' => 'required',
            'aturanPakai' => 'required|string',
            'takaranMinum' => 'required|string',
            'bentukObat' => 'required',
            'waktuMinum' => 'required|string',
            'keterangan' => 'required|string',
            'jumlahObat' => 'required',
            'jumlahKaliMinum' => 'required'
        ]);

        $id = $request->resepId;
        $detailResep = new DetailResep;
        $detailResep->resep_id = $request->resepId;
        $detailResep->obat_id = $request->namaObat;
        $detailResep->dosis = $request->dosis;
        $detailResep->aturan_pakai = $request->aturanPakai;
        $detailResep->takaran_minum = $request->takaranMinum;
        $detailResep->bentuk_obat = $request->bentukObat;
        $detailResep->waktu_minum = $request->waktuMinum;
        $detailResep->keterangan = $request->keterangan;
        $detailResep->jumlah_obat = $request->jumlahObat;
        $detailResep->jumlah_kali_minum = $request->jumlahKaliMinum;
        $detailResep->save();

        return redirect()->route('detailResep',$id)->with('success','resep berhasil ditambahkan');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
