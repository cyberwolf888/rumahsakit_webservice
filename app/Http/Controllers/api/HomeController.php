<?php

namespace App\Http\Controllers\Api;

use App\Models\Hospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $model = Hospital::where('status',Hospital::STATUS_ACTIVE)->get();
        $return = [];
        foreach ($model as $row){
            $_return = $row;
            $_return['email'] = $row->user->email;
            $_return['thumb_image'] = url('images/hospital/thumb_'.$row->image);
            $_return['image'] = url('images/hospital/'.$row->image);
            $_return['price'] = $row->getPrice();
            $_return['label_price'] = 'Rp. '.number_format($_return['price'], 0, ',', '.');
            array_push($return, $_return);
        }

        return response()->json(['data'=>$return]);
    }
}
