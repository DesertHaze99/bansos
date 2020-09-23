<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
     /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'status';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'id_status';

    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'status_perkawinan'
    ];
}
