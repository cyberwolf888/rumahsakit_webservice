<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docter extends Model
{
    protected $table = 'dokter';

    public function schedule(){
        return $this->hasMany('App\Models\DocterSchedule', 'dokter_id');
    }
}
