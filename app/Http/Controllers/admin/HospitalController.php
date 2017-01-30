<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hospital;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HospitalController extends Controller
{
    public function index()
    {
        $model = Hospital::orderBy('id','desc')->get();
        return view('admin/hospital/manage',[
            'model'=>$model
        ]);
    }

    public function create()
    {
        $model = new Hospital();
        $user = new User();
        return view('admin/hospital/form',[
            'model'=>$model,
            'user'=>$user
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = new User();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request['password']);
        $user->type = 2;
        $user->save();
        $user->attachRole(2);

        $hospital = new Hospital();
        $hospital->user_id = $user->id;
        $hospital->name = $user->name;
        $hospital->status = Hospital::STATUS_NOT_COMPLETE;
        $hospital->save();

        return redirect()->route('admin.hospital.manage');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $model = Hospital::findOrFail($id);
        $user = User::findOrFail($model->user_id);
        return view('admin/hospital/form',[
            'model'=>$model,
            'user'=>$user,
            'update'=>true
        ]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
