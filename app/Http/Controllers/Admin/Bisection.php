<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bisection as Bis;
use Illuminate\Support\Facades\Validator;

class Bisection extends Controller
{
    public function index(){
        return view('admin.bisection.index', ['collection' => Bis::all()]);
    } 

    public function create(){
        return view('admin.bisection.create');
    }

    public function save(Request $request){
        $rules = [
            'function' => 'required',
            'interval' => 'required',
            'dispersion' => 'required',
            'iterations' => 'required',
            'result' => 'required'
        ];

        $messages = [
            'required' => "Vstupné pole musí byť vyplnené"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->route('admin.bisection.create')
                             ->withErrors($validator)
                             ->withINput();
        }

        $bisection = new Bis;
        $bisection->function = $request->input('function');
        $bisection->interval = $request->input('interval');
        $bisection->iterations = $request->input('iterations');
        $bisection->dispersion = $request->input('dispersion');
        $bisection->result = $request->input('result');
        $bisection->save();
        return redirect()->route('admin.bisection.index');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $item = Bis::find($id);
        return view('admin.bisection.edit', ['item' => $item]);
    }

    public function update(Request $request, $id){
        $rules = [
            'function' => 'required',
            'interval' => 'required',
            'dispersion' => 'required',
            'iterations' => 'required',
            'result' => 'required'
        ];

        $messages = [
            'required' => "Vstupné pole musí byť vyplnené"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){    
            return redirect()->route("admin.bisection.edit",['id' => $id])
                             ->withErrors($validator)
                             ->withINput();
        }
        
        $bisection = Bis::where('id', $id)->update([
            'function' => $request->input('function'),
            'interval' => $request->input('interval'),
            'iterations' => $request->input('iterations'),
            'dispersion' => $request->input('dispersion'),
            'result' => $request->input('result'),
        ]);
    return redirect()->route('admin.bisection.index');
    }

    public function delete($id){
        $bisection = Bis::find($id);
        $bisection->delete();
        return redirect()->route('admin.bisection.index');
    }
}
