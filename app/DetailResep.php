<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailResep extends Model
{
     /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'detail_resep';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'detail_resep_id';

    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'detail_resep_id',
        'resep_id',
        'obat_id',
        'dosis',
        'aturan_pakai',
        'bentuk_obat',
        'takaran_minum',
        'waktu_minum',
        'keterangan',
        'jumlah_obat',
        'jumlah_kali_minum'
    ];

    public function obat()
    {
    	return $this->hasOne('App\Obat','obat_id','obat_id');
    }

    public function detailObat()
    {
    	return $this->hasOne('App\DetailObat','obat_id','obat_id');
    }
}
