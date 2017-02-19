<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    const STATUS_NEW = 1;
    const STATUS_CONFIRMED = 2;
    const STATUS_FINISH = 3;
    const STATUS_CANCELED = 0;
    protected $table = 'reservation';

    public function getStatus()
    {
        $status = ['1'=>'Waiting Confirmation', '2'=>'Confirmed', '3'=>'Completed','0'=>'Cancelled'];
        return $status[$this->status];
    }

    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital', 'rumahsakit_id');
    }

    public function room()
    {
        return $this->belongsTo('App\Models\Room', 'room_id');
    }

    public function member()
    {
        return $this->belongsTo('App\Models\Member', 'member_id');
    }
}
