<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailResep;
use App\Resep;
use App\Obat;
use App\DetailObat;
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

    public function detailResepAjax($id)
    {
        $data = DetailResep::with(['obat' => function($query){
                    $query->with('detailObat');
                }])
                ->where('resep_id',$id)
                ->get();
        // return $data;
        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<form id="myform" method="post" action="'.route('detailResep.destroy',$data->detail_resep_id).'">
                                '.csrf_field().'
                                <a href="'.URL::to('/resep/' . $data->resep_id . '/detailResep/'.$data->detail_resep_id.'/detailObat').'" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Detail</a>
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
        $obat = Obat::with('detailObat')->get();
        $detailResep = DetailResep::where('detail_resep_id',$id)
                        ->with('obat','detailObat')
                        ->first();
        $waktuMinum = [
            '0' => 'sebelum makan',
            '1' => 'saat makan',
            '2' => 'sesudah makan'
        ];
        $keterangan = [
            '0' => 'kondisional',
            '1' => 'harus habis',
            '2' => 'rutin' 
        ];
        // return $detailResep;
        return view('resep.edit',compact('obat','detailResep','waktuMinum','keterangan'));
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
        // return $request->all();
        $this->validate($request,[
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

        // $id = $request->resepId;
        $detailResep = DetailResep::findOrFail($id);
        $resepId = $detailResep->resep_id;
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

        return redirect()->route('detailResep',$resepId)->with('success','resep berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detailResep = DetailResep::findOrFail($id);
        // return $detailResep;
        $detailResep->delete();
        return redirect()->back()->with('success','Obat pada resep berhasil dihapus');
    }

    public function detail($resepId,$detailObatId)
    {
        // return $detailObatId;
        $resep = Resep::with(['detail' => function($query) use ($detailObatId){
                    $query->with(['obat' => function($query){
                            $query->with(['kontraindikasiMapping' => function($query){$query->with('kontraindikasi');},'interaksiMapping'=>function($query){$query->with('interaksi');}]);
                        },'detailObat'])
                        ->where('detail_resep_id',$detailObatId)
                        ->first();
                }])
                ->where('resep_id',$resepId)
                ->first();
        // return $resep;
        return view('resep.detailObat',compact('resep'));
    }

    public function qrcode($id)
    {
        $resep = Resep::with(['detail' => function($query){
            $query->with('detailObat', 'obat');
        },'pasien'])
            ->where('resep_id',$id)
            ->first();

        //return $resep;
        
        \QrCode::size(500)
			  ->format('png')
			  ->generate('resep', public_path('images/qrcode.png'));
	  
	    return view('qrcode')->with(['resep' => $resep]);
    }
}
