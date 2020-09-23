<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model
{
    /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'jenis_kelamin';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'id_jk';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jenis_kelamin',
        'created_at',
        'updated_at'
    ];
}
