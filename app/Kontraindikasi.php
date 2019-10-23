<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontraindikasi extends Model
{
    /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'kontraindikasi';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'kontraindikasi_id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kontraindikasi'
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
