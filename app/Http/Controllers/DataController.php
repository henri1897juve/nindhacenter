<?php

namespace App\Http\Controllers;
use App\Models\Data;
use App\Models\Device;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(){
        $data = Data::latest()->paginate(10);
        $sorted = $data->SortByDesc('tanggal');
        $dev = Device::all();
        $sort = $dev->SortByDesc('name');
        $categories=[];
        $value=[];
        $device=[];
        foreach ($sorted as $cat){
            $categories[]= $cat->tanggal;
            $value[] = $cat->value1;
        }
        foreach ($sort as $s){
            $device []= $s->name;
        }
        return view ('admin.index', compact('data','categories','value','device'));
    }
    public function tambah (){
        $device = Device::all();
        return view ('admin.tambah',compact('device'));
    }
    public function add (Request $request) {
        Data::create([
            'tanggal' => $request ->tanggal,
            'value1' => $request -> value1,
            'value2' => $request -> value2,
            'device_id'=>$request -> device_id
        ]);
        return redirect ('/nindhacenter/data');
    }
    public function edit($id){
        $device = Device::all();
        $data=Data::with('device')->find($id);
        return view ('admin/edit',compact('data','device'));
    }
    public function update (Request $request,$id){
        $data=Data::with('device')->find($id);
        $data->update($request->all());
        return redirect ('/nindhacenter/data');
    }
    public function hapus($id){
        $data=Data::with('device')->find($id);
        $data->destroy($id);
        return redirect ('/nindhacenter/data');
    }
}
