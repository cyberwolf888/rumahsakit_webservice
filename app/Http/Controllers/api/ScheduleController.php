<?php

namespace App\Http\Controllers\Api;

use App\Models\Docter;
use App\Models\DocterSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    public function getDocter(Request $request)
    {
        $docter = Docter::where('rumahsakit_id',$request->rumahsakit_id)->orderBy('jenis','ASC')->get();
        if($docter->count()>0){
            return response()->json(['status'=>1,'data'=>$docter]);
        }else{
            return response()->json(['status'=>0,'data'=>null]);
        }
    }

    public function getSchedule(Request $request)
    {
        $schedule = DocterSchedule::where('dokter_id',$request->dokter_id)->get();
        if($schedule->count()>0){
            return response()->json(['status'=>1,'data'=>$schedule]);
        }else{
            return response()->json(['status'=>0]);
        }
    }
}
