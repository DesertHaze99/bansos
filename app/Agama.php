<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'agama';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'id_agama';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'agama', 'created_at', 'updated_at'
    ];
}
