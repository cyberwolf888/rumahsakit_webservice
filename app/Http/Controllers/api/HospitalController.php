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
}
