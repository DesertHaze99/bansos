<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KontraindikasiMapping extends Model
{
     /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'kontraindikasi_mapping';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'kontraindikasi_mapping_id';

    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'kontraindikasi_mapping_id',
        'obat_id',
        'kontraindikasi_id'
    ];

    public function kontraindikasi()
    {
    	return $this->hasOne('App\Kontraindikasi','kontraindikasi_id','kontraindikasi_id');
    }
}
