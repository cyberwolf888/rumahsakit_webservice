<?php

namespace App\Http\Controllers\Hospital;

use App\Models\Docter;
use App\Models\DocterSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DocterController extends Controller
{
    public function index()
    {
        $model = Docter::where('rumahsakit_id',Auth::user()->hospital->id)->orderBy('created_at','desc')->get();
        return view('hospital/docter/manage',[
            'model'=>$model
        ]);
    }

    public function create()
    {
        $model = new Docter();
        return view('hospital/docter/form',[
            'model'=>$model
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'jenis' => 'required|max:50'
        ]);

        $model = new Docter();
        $model->rumahsakit_id = Auth::user()->hospital->id;
        $model->name = $request->name;
        $model->jenis = $request->jenis;
        $model->save();

        return redirect()->route('hospital.docter.manage');
    }

    public function edit($id)
    {
        $model = Docter::findOrFail($id);
        return view('hospital/docter/form',[
            'model'=>$model,
            'update'=>true
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'jenis' => 'required|max:50'
        ]);

        $model = Docter::findOrFail($id);
        $model->name = $request->name;
        $model->jenis = $request->jenis;
        $model->save();

        return redirect()->route('hospital.docter.manage');
    }

    public function destroy($id)
    {
        $model = Docter::findOrFail($id);
        $schedule = DocterSchedule::where('dokter_id',$id);

        $schedule->delete();
        $model->delete();

        return redirect()->route('hospital.docter.manage');
    }
}
