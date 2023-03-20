<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jacobi as Jac;
use Illuminate\Support\Facades\Validator;


class Jacobi extends Controller
{
    public function index(){
        return view('admin.jacobi.index', ['collection' => Jac::all()]);
    } 

    public function create(){
        return view('admin.jacobi.create');
    }

    public function save(Request $request){
        $rules = [
            'inputLeft' => 'required|max:100',
            'inputRight' => 'required',
            'approximation' => 'required',
            'dispersion' => 'required|numeric|min:0',
            'iterations' => 'required',
            'result' => 'required'
        ];

        $messages = [
            'required' => "Vstupné pole musí byť vyplnené",
            'min' => "Zastavovacie kritérium musí byť väčšie ako :min"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->route('admin.jacobi.create')
                             ->withErrors($validator)
                             ->withINput();
        }

        $jacobi = new Jac;
        $jacobi->left = $request->input('inputLeft');
        $jacobi->right = $request->input('inputRight');
        $jacobi->approximation = $request->input('approximation');
        $jacobi->iterations = $request->input('iterations');
        $jacobi->dispersion = $request->input('dispersion');
        $jacobi->result = $request->input('result');
        $jacobi->save();
        return redirect()->route('admin.jacobi.index');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $item = Jac::find($id);
        return view('admin.jacobi.edit', ['item' => $item]);
    }

    public function update(Request $request, $id){
        $rules = [
            'inputLeft' => 'required|max:100',
            'inputRight' => 'required',
            'approximation' => 'required',
            'dispersion' => 'required|numeric|min:0',
            'iterations' => 'required',
            'result' => 'required'
        ];

        $messages = [
            'required' => "Vstupné pole musí byť vyplnené",
            'min' => "Hodnota musí byť väčšia ako :min"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->route('admin.jacobi.edit', ['id' => $id])
                             ->withErrors($validator)
                             ->withINput();
        }

        $jacobi = Jac::where('id', $id)->update([
            'left' => $request->input('inputLeft'),
            'right' => $request->input('inputRight'),
            'approximation' => $request->input('approximation'),
            'iterations' => $request->input('iterations'),
            'dispersion' => $request->input('dispersion'),
            'result' => $request->input('result'),
        ]);
    return redirect()->route('admin.jacobi.index');
    }

    public function delete($id){
        $jacobi = Jac::find($id);
        $jacobi->delete();
        return redirect()->route('admin.jacobi.index');
    }
}
