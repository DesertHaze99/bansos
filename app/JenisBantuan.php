<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisBantuan extends Model
{
     /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'jenis_bantuan';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'id_bantuan';

    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'bantuan',
        'created_at',
        'updated_at'
    ];
}
