<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hospital;
use App\Models\Member;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index()
    {
        $total_member = Member::count();
        $total_hospital = Hospital::count();
        $total_admin = User::where('type',1)->count();
        $hospital = Hospital::orderBy('created_at','desc')->limit(5)->get();

        return view('admin/dashboard/index',[
            'total_member'=>$total_member,
            'total_hospital'=>$total_hospital,
            'total_admin'=>$total_admin,
            'model'=>$hospital
        ]);
    }

}
