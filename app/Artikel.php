<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
     /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'artikel';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'id_artikel';

    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'judul',
        'content',
        'image1',
        'image2',
        'image3',
        'created_at',
        'updated_at'
    ];

    protected $guarded = [];
}
