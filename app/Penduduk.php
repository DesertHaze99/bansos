<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'penduduk';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'IDBDT';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'NO_KK',
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'KDDESA',
        'KDKEC',
        'KDKAB',
        'KDPROP',
        'status',
        'jenis_kelamin',
        'agama',
        'updated_at',
        'created_at'
    ];
}
