<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Integral as Integ;
use Illuminate\Support\Facades\Validator;


class Integral extends Controller
{
    public function index(){
        return view('admin.integral.index', ['collection' => Integ::all()]);
    } 

    public function create(){
        return view('admin.integral.create');
    }

    public function save(Request $request){
        $rules = [
            'function' => 'required|max:100',
            'interval' => 'required',
            'n' => 'required|numeric|min:1',
            'approximation' => 'required',
            'result' => 'required'
        ];

        $messages = [
            'required' => "Vstupné pole musí byť vyplnené",
            'min' => "Počet intervalov musí byť aspoň :min"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->route('admin.integral.create')
                             ->withErrors($validator)
                             ->withINput();
        }

        $integral = new Integ;
        $integral->function = $request->input('function');
        $integral->interval = $request->input('interval');
        $integral->n = $request->input('n');
        $integral->approximation = $request->input('approximation');
        $integral->result = $request->input('result');
        $integral->save();
        return redirect()->route('admin.integral.index');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $item = Integ::find($id);
        return view('admin.integral.edit', ['item' => $item]);
    }

    public function update(Request $request, $id){
        $rules = [
            'function' => 'required|max:100',
            'interval' => 'required',
            'n' => 'required|min:1',
            'approximation' => 'required',
            'result' => 'required'
        ];

        $messages = [
            'required' => "Vstupné pole musí byť vyplnené",
            'min' => "Počet intervalov musí byť aspoň :min"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->route('admin.integral.edit', ['id' => $id])
                             ->withErrors($validator)
                             ->withINput();
        }

        $integral = Integ::where('id', $id)->update([
            'function' => $request->input('function'),
            'interval' => $request->input('interval'),
            'approximation' => $request->input('approximation'),
            'n' => $request->input('n'),
            'result' => $request->input('result'),
        ]);
    return redirect()->route('admin.integral.index');
    }

    public function delete($id){
        $integral = Integ::find($id);
        $integral->delete();
        return redirect()->route('admin.integral.index');
    }
}
