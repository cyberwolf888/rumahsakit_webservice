<?php

namespace App\Http\Controllers\Hospital;

use App\Models\Docter;
use App\Models\Hospital;
use App\Models\Member;
use App\Models\Reservation;
use App\Models\Room;
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

        $total_room = Room::where('rumahsakit_id',Auth::user()->hospital->id)->count();
        $total_member = Member::count();
        $total_transaction = Reservation::where('rumahsakit_id',Auth::user()->hospital->id)->count();
        $total_profit = Reservation::where('rumahsakit_id',Auth::user()->hospital->id)->where('status',Reservation::STATUS_FINISH)->sum('total');
        $total_docter = Docter::where('rumahsakit_id',Auth::user()->hospital->id)->count();
        $reservation = Reservation::where('rumahsakit_id',Auth::user()->hospital->id)->orderBy('created_at','desc')->limit(5)->get();
        return view('hospital/dashboard/index',[
            'total_room'=>$total_room,
            'total_member'=>$total_member,
            'total_transaction'=>$total_transaction,
            'total_profit'=>number_format($total_profit, 0, ',', '.'),
            'total_docter'=>$total_docter,
            'reservation'=>$reservation
        ]);
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
