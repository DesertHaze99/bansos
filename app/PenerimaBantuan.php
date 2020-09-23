<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenerimaBantuan extends Model
{
     /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'penerima_bantuan';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'id_mapping';

    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'nik',
        'bantuan_id',
        'tahun_penerimaan',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $guarded = [];
}
