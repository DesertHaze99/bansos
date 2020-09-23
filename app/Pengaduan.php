<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
     /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'pengaduan';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'id_pengaduan';

    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_pengaduan',
        'email',
        'keterangan',
        'attachment',
        'status_pengaduan',
        'created_at',
        'updated_at'
    ];
}
