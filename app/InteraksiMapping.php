<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InteraksiMapping extends Model
{
     /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'interaksi_mapping';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'interaksi_mapping_id';

    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'interaksi_mapping_id',
        'obat_id',
        'interaksi_id'
    ];

    public function interaksi()
    {
    	return $this->hasOne('App\Interaksi','interaksi_id','interaksi_id');
    }
}
