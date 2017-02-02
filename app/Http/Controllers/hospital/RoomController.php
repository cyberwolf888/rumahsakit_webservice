<?php

namespace App\Http\Controllers\Hospital;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Image;

class RoomController extends Controller
{

    public function index()
    {
        $model = Room::where('rumahsakit_id',Auth::user()->hospital->id)->orderBy('id','desc')->get();
        return view('hospital/room/manage',[
            'model'=>$model
        ]);
    }

    public function create()
    {
        $model = new Room();
        return view('hospital/room/form',[
            'model'=>$model
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'total_room' => 'required|max:255|alpha_num',
            'description' => 'required|max:255',
            'akomodasi' => 'required',
            'perawatan' => 'required',
            'visit_dokter' => 'required',
            'administrasi' => 'required',
            'image' => 'required|image|max:3500'
        ]);

        $path = base_path('images/room/');
        $file = Image::make($request->file('image'))->resize(800, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');
        $thumb = Image::make($path.$file->basename)->resize(320, 240)->save($path.'thumb_'.$file->basename);

        $model = new Room();
        $model->rumahsakit_id = Auth::user()->hospital->id;
        $model->name = $request->name;
        $model->image = $file->basename;
        $model->description = $request->description;
        $model->total_room = $request->total_room;
        $model->akomodasi = $request->akomodasi;
        $model->perawatan = $request->perawatan;
        $model->visit_dokter = $request->visit_dokter;
        $model->administrasi = $request->administrasi;
        $model->total = $model->akomodasi + $model->perawatan + $model->visit_dokter + $model->administrasi;
        $model->save();

        return redirect()->route('hospital.room.manage');

    }

    public function show($id)
    {
        $model = Room::findOrFail($id);
        return view('hospital/room/detail',[
            'model'=>$model
        ]);
    }

    public function edit($id)
    {
        $model = Room::findOrFail($id);
        return view('hospital/room/form',[
            'model'=>$model,
            'update'=>true
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'total_room' => 'required|max:255|alpha_num',
            'description' => 'required|max:255',
            'akomodasi' => 'required',
            'perawatan' => 'required',
            'visit_dokter' => 'required',
            'administrasi' => 'required',
            'image' => 'image|max:3500'
        ]);

        $model = Room::findOrFail($id);

        if ($request->hasFile('image')) {
            $path = base_path('images/room/');
            if(is_file($path.$model->image)){
                unlink($path.$model->image);
                unlink($path.'thumb_'.$model->image);
            }
            $file = Image::make($request->file('image'))->resize(800, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');
            $thumb = Image::make($path.$file->basename)->resize(320, 240)->save($path.'thumb_'.$file->basename);

            $model->image = $file->basename;
        }

        $model->name = $request->name;
        $model->description = $request->description;
        $model->total_room = $request->total_room;
        $model->akomodasi = $request->akomodasi;
        $model->perawatan = $request->perawatan;
        $model->visit_dokter = $request->visit_dokter;
        $model->administrasi = $request->administrasi;
        $model->total = $model->akomodasi + $model->perawatan + $model->visit_dokter + $model->administrasi;
        $model->save();

        return redirect()->route('hospital.room.manage');
    }

    public function destroy($id)
    {
        $model = Room::findOrFail($id);
        $path = base_path('images/room/');
        if(is_file($path.$model->image)){
            unlink($path.$model->image);
            unlink($path.'thumb_'.$model->image);
        }
        $model->delete();

        return redirect()->route('hospital.room.manage');
    }
}
