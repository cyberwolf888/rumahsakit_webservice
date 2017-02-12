<?php

namespace App\Http\Controllers\Api;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HospitalController extends Controller
{
    public function getRoom(Request $request)
    {
        $hospital_id = $request->hospital_id;
        $room = Room::where('rumahsakit_id',$hospital_id)->orderBy('total','asc')->get();
        $return = [];
        foreach ($room as $row){
            $_return = $row;
            $_return['image'] = url('images/room/'.$row->image);
            $_return['label_price'] = 'Rp. '.number_format($_return['total'], 0, ',', '.');
            array_push($return, $_return);
        }

        return response()->json(['data'=>$return]);
    }

    public function detailRoom(Request $request)
    {
        $room = Room::findOrFail($request->id_room);
        $room->image = url('images/room/'.$room->image);
        $room->label_price = 'Rp. '.number_format($room->total, 0, ',', '.');
        $room->label_akomodasi = 'Rp. '.number_format($room->akomodasi, 0, ',', '.');
        $room->label_perawatan = 'Rp. '.number_format($room->perawatan, 0, ',', '.');
        $room->label_visit_dokter = 'Rp. '.number_format($room->visit_dokter, 0, ',', '.');
        $room->label_administrasi = 'Rp. '.number_format($room->administrasi, 0, ',', '.');
        return response()->json(['data'=>$room]);
    }
}
