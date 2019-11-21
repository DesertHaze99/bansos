<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BentukObat extends Model
{
    /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'bentuk_obat';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'bentuk_obat_id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bentuk'
    ];
}
