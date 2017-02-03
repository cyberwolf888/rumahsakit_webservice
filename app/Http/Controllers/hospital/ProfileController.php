<?php

namespace App\Http\Controllers\Hospital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Image;

class ProfileController extends Controller
{

    public function index()
    {
        $model = Auth::user()->hospital;
        return view('hospital/profile/form',[
            'model'=>$model
        ]);
    }

    public function profile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'telp' => 'required|max:255|alpha_num|min:6',
            'address' => 'required|max:255',
            'description' => 'required',
            'image' => 'image|max:3500'
        ]);

        $model = Auth::user()->hospital;

        if ($request->hasFile('image')) {
            $path = base_path('images/hospital/');
            if(is_file($path.$model->image)){
                unlink($path.$model->image);
                unlink($path.'thumb_'.$model->image);
            }
            $file = Image::make($request->file('image'))->resize(800, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');
            $thumb = Image::make($path.$file->basename)->resize(320, 240)->save($path.'thumb_'.$file->basename);

            $model->image = $file->basename;
        }

        $model->name = $request->name;
        $model->telp = $request->telp;
        $model->address = $request->address;
        $model->description = $request->description;
        $model->save();

        return redirect()->back();
    }

    public function user(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = Auth::user();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->back();
    }
}
