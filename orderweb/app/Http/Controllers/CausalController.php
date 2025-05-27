<?php

namespace App\Http\Controllers;

use App\Models\Causal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CausalController extends Controller
{

    private $rules = [
        'description' => 'required|string|min:3|max:100'
    ];

    private $traductionAttributes = [
        'description' => 'descripcion'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index(){
        $causals = Causal::all();
        return view('causal.index', compact('causals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('causal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        //dd($request); sirve para depurar errores
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('causal.create')->withInput()->withErrors($errors);
        }
        $causal = Causal::create($request->all());
        session()->flash('message', 'El registro se creo correctamente');
        return redirect()->route('causal.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $causal = Causal::find($id);
        if($causal) {
            return view('causal.edit', compact('causal'));
        }
        else {
            session()->flash('error', 'No se encontró el registro');
            return redirect()->route('causal.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('causal.edit', $id)->withInput()->withErrors($errors);
        }
        $causal = Causal::find($id);
        if($causal) {
            $causal->update($request->all());
            session()->flash('message', 'El registro se actualizo correctamente');
        }
        else {
            session()->flash('error', 'Ha ocurrido un problema al actualizar la causal');
        }
        return redirect()->route('causal.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $causal = Causal::find($id);
        if($causal) {
            $causal->delete();
            session()->flash('message', 'El registro se elimino correctamente');
        }
        else {
            session()->flash('error', 'Ha ocurrido un problema al eliminar la causal');
        }
        return redirect()->route('causal.index');
    }
}
