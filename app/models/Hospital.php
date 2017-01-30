<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $table = 'rumahsakit';
    const STATUS_ACTIVE = 1;
    const STATUS_SUSPEND = 0;
    const STATUS_NOT_COMPLETE = 2;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getStatus()
    {
        $status = [0=>'Suspend', 1=>'Active', 2=>'Not Complete'];
        return $status[$this->status];
    }
}
