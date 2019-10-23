<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'pasien';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'no_rm';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'no_telp',
        'alamat'
    ];

    // public function detailObat()
    // {
    // 	return $this->hasOne('App\DetailObat','obat_id','obat_id');
    // }

    // public function interaksiObat()
    // {
    //     return $this->hasMany('App\InteraksiObat','obat_id','obat_id');
    // }

    // public function kategoriMapping()
    // {
    //     return $this->hasMany('App\KategoriMapping','obat_id','obat_id');
    // }
}
