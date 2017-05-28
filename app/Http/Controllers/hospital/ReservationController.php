<?php

namespace App\Http\Controllers\Hospital;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $model = Reservation::where('rumahsakit_id',Auth::user()->hospital->id)->orderBy('created_at','desc')->get();
        return view('hospital/reservation/manage',[
            'model'=>$model
        ]);
    }

    public function show($id)
    {
        $model = Reservation::findOrFail($id);
        return view('hospital/reservation/detail',[
            'model'=>$model
        ]);
    }

    public function cancel($id)
    {
        $model = Reservation::findOrFail($id);
        $model->status = Reservation::STATUS_CANCELED;
        $model->save();

        $room = Room::findOrFail($model->room_id);
        $room->total_room = $room->total_room+1;
        $room->save();

        return redirect()->back();
    }

    public function confirmed($id)
    {
        $model = Reservation::findOrFail($id);
        $model->status = Reservation::STATUS_CONFIRMED;
        $model->save();

        return redirect()->back();
    }

    public function completed($id)
    {
        $model = Reservation::findOrFail($id);
        $model->status = Reservation::STATUS_FINISH;
        $model->save();

        $room = Room::findOrFail($model->room_id);
        $room->total_room = $room->total_room+1;
        $room->save();

        return redirect()->back();
    }
}
