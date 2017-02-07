<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Member;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'type'=>3])){
            $model = Auth::user();
            $member = Member::where('user_id',$model->id)->first();
            return response()->json(['status'=>1,'data'=>$member->toArray()]);
        }else{
            return response()->json(['status'=>0]);
        }
    }
}
