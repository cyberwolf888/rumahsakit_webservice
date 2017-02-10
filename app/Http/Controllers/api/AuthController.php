<?php

namespace App\Http\Controllers\Api;

use App\User;
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

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'no_id' => 'required|max:255|alpha_num|min:6',
            'telp' => 'required|max:255|alpha_num|min:6',
            'address' => 'required|max:255'
        ]);

        $model = new Member();
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->type = 3;
        $user->save();
        $user->attachRole(3);

        $model->user_id = $user->id;
        $model->name = $request->name;
        $model->telp = $request->telp;
        $model->address = $request->address;
        $model->no_id = $request->no_id;
        $model->status = Member::STATUS_ACTIVE;
        $model->save();

        return response()->json(['status'=>1]);
    }

    public function test(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'no_id' => 'required|max:255|alpha_num|min:6',
            'telp' => 'required|max:255|alpha_num|min:6',
            'address' => 'required|max:255'
        ]);
        return response()->json(['status'=>1]);
    }
}
