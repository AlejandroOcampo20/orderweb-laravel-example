<?php

namespace App\Http\Controllers;

use App\Models\TypeActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeActivityController extends Controller
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
    public function index()
    {
        $typeActivities = TypeActivity::all();
        return view('typeactivity.index',compact('typeActivities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('typeactivity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('type_activity.create')->withInput()->withErrors($errors);
        }
        $typeActivity = TypeActivity::create($request->all());
        session()->flash('message','El tipo de actividad se ha creado exitosamente...');
        return redirect()->route('typeactivity.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $typeActivity = TypeActivity::find($id);
        if($typeActivity){
            return view('typeactivity.edit',compact('typeActivity'));
        }
        else {
            session()->flash('error','No se encontró el tipo de actividad');
            return redirect()->route('typeactivity.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('type_activity.edit', $id)->withInput()->withErrors($errors);
        }
        $typeActivity = TypeActivity::find($id);
        if($typeActivity){
            $typeActivity->update($request->all());
            session()->flash('message','El tipo de actividad se actualizo correctamente...');
        }
        else {
            session()->flash('error','Ha ocurrido un problema al actualizar el tipo de actividad');
        }
        return redirect()->route('typeactivity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $typeActivity = TypeActivity::find($id);
        if($typeActivity){
            $typeActivity->delete();
            session()->flash('message','El tipo de actividad se elimino correctamente...');
        }
        else {
            session()->flash('error','Ha ocurrido un problema al eliminar el tipo de actividad');
        }
        return redirect()->route('typeactivity.index');
    }
}
