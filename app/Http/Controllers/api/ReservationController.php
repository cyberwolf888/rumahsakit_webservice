<?php

namespace App\Http\Controllers\Api;

use App\Models\Hospital;
use App\Models\Member;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function booking(Request $request)
    {
        $room = Room::findOrFail($request->id_room);
        $hospital = Hospital::findOrFail($room->rumahsakit_id);
        $member = Member::where('user_id',$request->user_id)->firstOrFail();
        $reservation = new Reservation();

        $reservation->rumahsakit_id = $hospital->id;
        $reservation->room_id = $room->id;
        $reservation->member_id = $member->id;
        $reservation->checkin = $request->checkin;
        $reservation->duration = $request->duration;
        $reservation->total = $room->total*$reservation->duration;
        $reservation->status = Reservation::STATUS_NEW;
        $reservation->save();

        return response()->json(['status'=>1]);

    }
}
