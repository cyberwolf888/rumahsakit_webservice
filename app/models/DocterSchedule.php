<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocterSchedule extends Model
{
    protected $table = 'jadwal_dokter';

    public function docter(){
        return $this->belongsTo('App\Models\Docter', 'dokter_id');
    }
}
