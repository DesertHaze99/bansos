<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerkDagang extends Model
{
    /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'merek_dagang';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'id_merek_dagang';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'obat_id',
        'merek_dagang_name'
    ];

    public function obat()
    {
        return $this->hasOne('App\obat','obat_id','obat_id');
    }
}
