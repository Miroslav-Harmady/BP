<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Cholesky as Chol;
use Illuminate\Support\Facades\Validator;

class Cholesky extends Controller
{
    public function index(){
        return view('admin.cholesky.index', ['collection' => Chol::all()]);
    } 

    public function create(){
        return view('admin.cholesky.create');
    }

    public function save(Request $request){
        $rules = [
            'inputLeft' => 'required|max:100',
            'inputRight' => 'required|max:100',
            'approximation' => 'required',
            'resultL' => 'required',
            'resultX' => 'required',
            'resultY' => 'required'
        ];

        $messages = [
            'required' => "Vstupné pole musí byť vyplnené",
            'max' => "Nesmiete presiahnuť :max znakov"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->route('admin.cholesky.create')
                             ->withErrors($validator)
                             ->withINput();
        }


        $cholesky = new Chol;
        $cholesky->left = $request->input('inputLeft');
        $cholesky->right = $request->input('inputRight');
        $cholesky->approximation = $request->input('approximation');
        $cholesky->resultL = $request->input('resultL');
        $cholesky->resultX = $request->input('resultX');
        $cholesky->resultY = $request->input('resultY');
        $cholesky->save();
        return redirect()->route('admin.cholesky.index');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $item = Chol::find($id);
        return view('admin.cholesky.edit', ['item' => $item]);
    }

    public function update(Request $request, $id){
        $rules = [
            'inputLeft' => 'required|max:100',
            'inputRight' => 'required|max:100',
            'approximation' => 'required',
            'resultL' => 'required',
            'resultX' => 'required',
            'resultY' => 'required'
        ];

        $messages = [
            'required' => "Vstupné pole musí byť vyplnené",
            'max' => "Nesmiete presiahnuť :max znakov"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->route('admin.cholesky.edit',['id' => $id])
                             ->withErrors($validator)
                             ->withINput();
        }


        $cholesky = Chol::where('id', $id)->update([
            'left' => $request->input('inputLeft'),
            'right' => $request->input('inputRight'),
            'approximation' => $request->input('approximation'),
            'resultL' => $request->input('resultL'),
            'resultX' => $request->input('resultX'),
            'resultY' => $request->input('resultY'),
        ]);
    return redirect()->route('admin.cholesky.index');
    }

    public function delete($id){
        $cholesky = Chol::find($id);
        $cholesky->delete();
        return redirect()->route('admin.cholesky.index');
    }
}
