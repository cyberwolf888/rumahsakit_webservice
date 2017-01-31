<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    const STATUS_ACTIVE = 1;
    const STATUS_SUSPEND = 0;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getStatus()
    {
        $status = [0=>'Suspend', 1=>'Active'];
        return $status[$this->status];
    }

    public function getGender()
    {
        $gender = ['L'=>'Men', 'P'=>'Women'];
        return $gender[$this->gender];
    }
}
