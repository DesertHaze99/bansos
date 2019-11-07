<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resep;
use App\Pasien;
use App\Obat;
use App\BentukObat;
use URL;
use Session;
use DB;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('resep.index');
    }

    public function resepAjax()
    {
        return 0;
    }

    public function pasienResepAjax()
    {
        $data = Pasien::all();
        $listKategori ='';
        // return $data;
        return datatables()->of($data)
            ->addColumn('action',function($data){
                $button = '';
                $button .= '<button onClick="modal(\''.$data->no_rm.'\')" class="btn btn-primary">Pilih</button>';
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
        return view('resep.create');
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
        DB::beginTransaction();
        try {
            $resep = new Resep;
            $resep->pasien_id = $request->id;
            $resep->save();
            DB::commit();

            $id = $resep->resep_id;

            return redirect()->route('detailResep',$id)->with('success','resep berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('resep.create')->with('error','ada yang tidak beres silahkan hubungi pengembang');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $pasien= Pasien::where('no_rm',$request->id)->first();
        $body = '';
        $body .= '
                    <input value="'.$request->id.'" type="hidden" name="id"></input>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Nama</label>
                                <input type="text" placeholder="Eugene" value="'.$pasien->nama.'" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Jenis Kelamin</label>
                                <input type="text" placeholder="Eugene" value="'.$pasien->jenis_kelamin.'" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Tanggal lahir</label>
                                <input type="text" placeholder="Eugene" value="'.$pasien->tanggal_lahir.'" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>No telp</label>
                                <input type="text" placeholder="Eugene" value="'.$pasien->no_telp.'" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Alamat</label>
                                <input type="text" placeholder="Eugene" value="'.$pasien->alamat.'" class="form-control" disabled>
                            </div>
                        </div>
                    </div>';

                return $body;
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

    public function detailresep($id)
    {
        $info = Resep::with('pasien')
                ->where('resep_id',$id)
                ->first();
        // return $info;
        $obat = Obat::with('detailObat')->get();
        $bentukObat = BentukObat::all();
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
        // return $info;
        return view('resep.detailResep',compact('info','obat','bentukObat','waktuMinum','keterangan'));
    }

    public function detailObatAjax(Request $request)
    {
        $obat = Obat::with(['detailObat' => function($query){
                    $query->with('bentukObat');
                }])
                ->where('obat_id',$request->id)
                ->first();

        return $obat;
    }
    



}
