<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'obat';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'obat_id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'obat_id',
        'name',
        'added_by',
        'updated_at',
        'created_at'
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
