<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newton as Nwton;
use Illuminate\Support\Facades\Validator;


class Newton extends Controller
{
    public function index(){
        return view('admin.newton.index', ['collection' => Nwton::all()]);
    } 

    public function create(){
        return view('admin.newton.create');
    }

    public function save(Request $request){
        $rules = [
            'function' => 'required',
            'interval' => 'required',
            'iterations' => 'required',
            'result' => 'required'
        ];

        $messages = [
            'required' => "Vstupné pole musí byť vyplnené",
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->route('admin.newton.create')
                             ->withErrors($validator)
                             ->withINput();
        }

        $newton = new Nwton;
        $newton->function = $request->input('function');
        $newton->interval = $request->input('interval');
        $newton->iterations = $request->input('iterations');
        $newton->result = $request->input('result');
        $newton->save();
        return redirect()->route('admin.newton.index');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $item = Nwton::find($id);
        return view('admin.newton.edit', ['item' => $item]);
    }

    public function update(Request $request, $id){
        $rules = [
            'function' => 'required',
            'interval' => 'required',
            'iterations' => 'required',
            'result' => 'required'
        ];

        $messages = [
            'required' => "Vstupné pole musí byť vyplnené",
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->route('admin.newton.edit',['id' => $id])
                             ->withErrors($validator)
                             ->withINput();
        }

        $newton = Nwton::where('id', $id)->update([
            'function' => $request->input('function'),
            'interval' => $request->input('interval'),
            'iterations' => $request->input('iterations'),
            'result' => $request->input('result'),
        ]);
    return redirect()->route('admin.newton.index');
    }

    public function delete($id){
        $newton = Nwton::find($id);
        $newton->delete();
        return redirect()->route('admin.newton.index');
    }
}
