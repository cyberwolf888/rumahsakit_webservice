<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\RoleUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $model = User::where('type',1)->orderBy('id','desc')->get();
        return view('admin/admin/manage',[
            'model'=>$model
        ]);
    }

    public function create()
    {
        $model = new User();
        return view('admin/admin/form',[
            'model'=>$model
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
        $user->type = 1;
        $user->save();
        $user->attachRole(1);

        return redirect()->route('admin.u_admin.manage');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $model = User::findOrfail($id);
        return view('admin/admin/form',[
            'model'=>$model,
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

        $user = User::findOrfail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('admin.u_admin.manage');
    }

    public function destroy($id)
    {
        $user = User::findOrfail($id);

        $user->delete();

        return redirect()->route('admin.u_admin.manage');
    }
}
