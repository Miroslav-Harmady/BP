<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LURozklad as LUR;
use Illuminate\Support\Facades\Validator;


class LURozklad extends Controller
{
    public function index(){
        return view('admin.LURozklad.index', ['collection' => LUR::all()]);
    } 

    public function create(){
        return view('admin.LURozklad.create');
    }

    public function save(Request $request){
        $rules = [
            'matrix' => 'required|max:100',
            'resultL' => 'required',
            'resultU' => 'required',
            'resultX' => 'required',
            'resultY' => 'required'
        ];

        $messages = [
            'required' => "Vstupné pole musí byť vyplnené",
            'max' => "Nesmiete presiahnuť :max znakov"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->route('admin.LU.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        $item = new LUR;
        $item->matrix = $request->input('matrix');
        $item->resultL = $request->input('resultL');
        $item->resultU = $request->input('resultU');
        $item->resultX = $request->input('resultX');
        $item->resultY = $request->input('resultY');
        $item->save();
        return redirect()->route('admin.LU.index');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $item = LUR::find($id);
        return view('admin.LURozklad.edit', ['item' => $item]);
    }

    public function update(Request $request, $id){
        $rules = [
            'matrix' => 'required|max:300',
            'resultL' => 'required',
            'resultU' => 'required',
            'resultX' => 'required',
            'resultY' => 'required'
        ];

        $messages = [
            'required' => "Vstupné pole musí byť vyplnené",
            'max' => "Nesmiete presiahnuť :max znakov"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->route('admin.LU.edit', ['id' => $id])
                             ->withErrors($validator)
                             ->withInput();
        }

        $item = LUR::where('id', $id)->update([
            'matrix' => $request->input('matrix'),
            'resultL' => $request->input('resultL'),
            'resultX' => $request->input('resultX'),
            'resultY' => $request->input('resultY'),
        ]);
    return redirect()->route('admin.LU.index');
    }

    public function delete($id){
        $item = LUR::find($id);
        $item->delete();
        return redirect()->route('admin.LU.index');
    }
}
