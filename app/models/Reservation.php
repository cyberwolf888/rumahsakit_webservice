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
}
