<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
     /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'golongan';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'id_golongan';

    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'golongan',
        'keterangan',
        'created_at',
        'updated_at'
    ];

    protected $guarded = [];
}
