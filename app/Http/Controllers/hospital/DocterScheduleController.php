<?php

namespace App\Http\Controllers\Hospital;

use App\Models\Docter;
use App\Models\DocterSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;

class DocterScheduleController extends Controller
{
    public function index()
    {
        $model = DocterSchedule::where('rumahsakit_id',Auth::user()->hospital->id)->groupBy('dokter_id')->get();
        return view('hospital/shcedule/manage',[
            'model'=>$model
        ]);
    }

    public function create()
    {
        $docter = DB::table('dokter')
            ->select(DB::Raw('dokter.name,dokter.id as d_id,jadwal_dokter.*'))
            ->leftJoin('jadwal_dokter', 'dokter.id', '=', 'jadwal_dokter.dokter_id')
            ->whereRaw('jadwal_dokter.hari IS NULL')
            ->pluck('name', 'd_id');
        $model = new DocterSchedule();
        return view('hospital/shcedule/form',[
            'docter'=>$docter,
            'model'=>$model
        ]);
    }

    public function store(Request $request)
    {
        foreach ($request->detail as $row=>$value){
            $model = new DocterSchedule();
            $model->rumahsakit_id = Auth::user()->hospital->id;
            $model->dokter_id = $request->dokter_id;
            $model->hari = $value;
            $model->waktu = $request->time1[$row] == '-' ? 'closed' : str_replace("-","",$request->time1[$row]).' WITA '.' - '.str_replace("-","",$request->time2[$row]).' WITA';
            $model->save();
        }

        return redirect()->route('hospital.schedule.manage');
    }

    public function destroy($id)
    {
        $model = DocterSchedule::where('dokter_id',$id);
        $model->delete();
        return redirect()->route('hospital.schedule.manage');
    }
}
