<?php

namespace App\Http\Controllers\Hospital;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{

    public function index()
    {
        return view('hospital/report/form');
    }

    public function report(Request $request)
    {
        $start_date = date('Y/m/d', strtotime($request->start_date));
        $end_date = date('Y/m/d', strtotime($request->end_date));
        $model = Reservation::whereRaw('created_at >= "'.$start_date.'"')->whereRaw('created_at <= "'.$end_date.'"')->get();

        return view('hospital/report/view',[
            'model'=>$model
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
