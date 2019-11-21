<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'resep';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'resep_id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'resep_id',
        'pasien_id',
        'created_at',
        'updated_at'
    ];

    public function pasien()
    {
    	return $this->hasOne('App\Pasien','no_rm','pasien_id');
    }

    public function detail()
    {
        return $this->hasMany('App\DetailResep','resep_id','resep_id');
    }
}

