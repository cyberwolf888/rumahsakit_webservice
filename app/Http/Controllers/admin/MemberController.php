<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{

    public function index()
    {
        $model = Member::orderBy('id','desc')->get();
        return view('admin/member/manage',[
            'model'=>$model
        ]);
    }

    public function create()
    {
        $model = new Member();
        $user = new User();
        return view('admin/member/form',[
            'model'=>$model,
            'user'=>$user
        ]);
    }

    public function store(Request $request)
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

        return redirect()->route('admin.member.manage');
    }

    public function edit($id)
    {
        $model = Member::findOrFail($id);
        $user = User::findOrFail($model->user_id);
        return view('admin/member/form',[
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
            'password' => 'required|min:6|confirmed',
            'no_id' => 'required|max:255|alpha_num|min:6',
            'telp' => 'required|max:255|alpha_num|min:6',
            'address' => 'required|max:255'
        ]);

        $model = Member::findOrFail($id);
        $user = User::findOrFail($model->user_id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);;
        $user->save();

        $model->name = $request->name;
        $model->telp = $request->telp;
        $model->address = $request->address;
        $model->no_id = $request->no_id;
        $model->status = $request->status;
        $model->save();

        return redirect()->route('admin.member.manage');
    }
}
