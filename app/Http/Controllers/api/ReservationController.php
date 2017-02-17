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

    public function getReservation(Request $request)
    {
        $member = Member::where('user_id',$request->user_id)->firstOrFail();
        $reservation = Reservation::where('member_id',$member->id)->get();
        if($reservation->count() > 0){
            $data = [];
            foreach ($reservation as $row){
                $row->label_total = 'Rp. '.number_format($row->total, 0, ',', '.');
                $row->label_status = $row->getStatus();
                $row->checkout = date('d F Y', strtotime("+".$row->duration." days", strtotime($row->checkin)));
                $row->checkin = date('d F Y', strtotime($row->checkin));
                $row->created = date('d F Y', strtotime($row->created_at));
                $row->rumahsakit = $row->hospital->name;
                $row->kamar = $row->room->name;
                $row->thumb = url('images/room/'.$row->room->image);
                array_push($data, $row);
            }
            return response()->json(['status'=>1,'data'=>$data]);
        }else{
            return response()->json(['status'=>0]);
        }
    }
}
