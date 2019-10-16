<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interaksi extends Model
{
    /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'interaksi';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'interaksi_id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'interaksi_id',
        'interaksi_name',
        'added_by',
        'updated_at',
        'created_at'
    ];
}
