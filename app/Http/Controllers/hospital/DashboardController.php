<?php

namespace App\Http\Controllers\Hospital;

use App\Models\Hospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Image;

class DashboardController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $hospital = Auth::user()->hospital;
        if($hospital->status == \App\Models\Hospital::STATUS_NOT_COMPLETE){
            return redirect()->route('hospital.finish.index');
        }
        return view('hospital/dashboard/index');
    }

    public function finish()
    {
        return view('hospital/dashboard/finish');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'telp' => 'required|max:255|alpha_num|min:6',
            'address' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|max:3500'
        ]);

        $path = base_path('images/hospital/');
        $file = Image::make($request->file('image'))->resize(800, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');
        $thumb = Image::make($path.$file->basename)->resize(320, 240)->save($path.'thumb_'.$file->basename);

        $hospital = Auth::user()->hospital;
        $hospital->name = $request->name;
        $hospital->telp = $request->telp;
        $hospital->address = $request->address;
        $hospital->description = $request->description;
        $hospital->image = $file->basename;
        $hospital->status = Hospital::STATUS_ACTIVE;
        $hospital->save();

        return redirect()->route('hospital.dashboard');
    }

}
