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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
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
        $model = Hospital::findOrFail($id);
        $user = User::findOrFail($model->user_id);
        return view('admin/hospital/detail',[
            'model'=>$model,
            'user'=>$user
        ]);
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
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed'
        ]);

        $hospital = Hospital::findOrFail($id);
        $user = User::findOrFail($hospital->user_id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $hospital->name = $user->name;
        $hospital->status = $request->status;
        $hospital->save();

        return redirect()->route('admin.hospital.manage');
    }

    public function destroy($id)
    {
        $hospital = Hospital::findOrFail($id);
        $user = User::findOrFail($hospital->user_id);

        $hospital->delete();
        $user->delete();

        return redirect()->route('admin.hospital.manage');
    }
}
