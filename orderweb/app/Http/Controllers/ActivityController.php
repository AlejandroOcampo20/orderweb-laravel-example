<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Technician;
use App\Models\TypeActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivityController extends Controller
{
    private $rules = [
        'description' => 'required|string|min:3|max:100',
        'hours' => 'required|numeric|min:1|max:999999999',
        'technician_id' => 'required|numeric|min:1|max:99999999999999999999',
        'type_activity_id' => 'required|numeric|min:1|max:99999999999999999999'
    ];

    private $traduccionAttributes = [
        'description' => 'descripción',
        'hours' => 'horas',
        'technician_id' => 'técnico',
        'type_activity_id' => 'tipo de actividad'
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::all();
        return view('activity.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technicians = Technician::all();
        $types = TypeActivity::All();
        return view('activity.create', compact('technicians', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames(($this->traduccionAttributes));
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('activity.create')->withInput()->withErrors($errors);
        }
        $activity = Activity::create($request->all());
        session()->flash('message', 'Actividad creada exitosamente');
        return redirect()->route('activity.index');
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
        $activity = Activity::find($id);
        if($activity) //si existe
        {
            $technicians = Technician::all();
            $types = TypeActivity::All();
            return view('activity.edit', compact('activity', 'technicians', 'types'));
        }
        else
        {
            session()->flash('warning', 'No se encuentra la actividad solicitado');
            return redirect()->route('activity.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames(($this->traduccionAttributes));
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('activity.edit')->withInput()->withErrors($errors);
        }
        $activity = Activity::find($id);
        if($activity) //si existe
        {
            $activity->update($request->all());
            session()->flash('message', 'Actividad actualizada exitosamente');
        }
        else
        {
            session()->flash('warning', 'No se encuentra la actividad solicitado');
            return redirect()->route('activity.index');
        }

        return redirect()->route('activity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activity = Activity::find($id);
        if($activity) //si existe
        {
            $activity->delete();
            session()->flash('message', 'Registro eliminado exitosamente');
        }
        else
        {
            session()->flash('warning', 'No se encuentra el registro solicitado');
            return redirect()->route('activity.index');
        }
        
        return redirect()->route('activity.index');
    }
}