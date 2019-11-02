<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailObat extends Model
{
     /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'detail_obat';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'detail_obat_id';

    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'detail_obat_id',
        'obat_id',
        'obat_image',
        'bentuk_obat',
        'kesediaan',
        'satuan',
        'efek_samping',
        'pola_makan',
        'penyimpanan',
        'obat_description',
        'makanan',
        'minuman',
        'umur'
    ];

    public function bentukObat()
    {
        return $this->hasOne('App\BentukObat','bentuk_obat_id','bentuk_obat');
    }
}
