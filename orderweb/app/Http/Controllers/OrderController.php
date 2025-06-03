<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Causal;
use App\Models\Observation;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    private $rules = [
        'legalization_date' => 'required|date|date_format:Y-m-d',
        'address' => 'required|string|min:3|max:50',
        'city' => 'string|min:3|max:80',
        'causal_id' => 'numeric|min:1|max:30',
        'observation_id' => 'max:99999999999999999999'
    ];

    private $traductionAttributes = [
        'legalization_date' => 'fecha de legalizacion',
        'address' => 'direccion',
        'city' => 'ciudad',
        'causal_id' => 'causal',
        'observation_id' => 'observacion'

    ];

    private $cities = [
                ['name' => 'TULUA', 'value' => 'TULUA'],
                ['name' => 'CALI', 'value' => 'CALI'],
                ['name' => 'BUGA', 'value' => 'BUGA'],
                ['name' => 'PALMIRA', 'value' => 'PALMIRA']
            ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('order.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $causals = Causal::all();
        $observations = Observation::all();
        $cities = $this->cities;
        return view('order.create', compact('causals','observations','cities'));
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
            return redirect()->route('order.create')->withInput()->withErrors($errors);
        }
        $order = Order::create($request->all());
        session()->flash('message','La order fue creada exitosamente');
        return redirect()->route('order.index');
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
        $order = Order::find($id);
        if($order){
            $causals = Causal::all();
            $observations = Observation::all();
            $cities = $this->cities;

            $query = DB::select("SELECT * FROM activity WHERE activity.id NOT IN (
                                SELECT order_activity.activity_id FROM order_activity 
                                WHERE order_activity.order_id = ?)", [$id]);

            $avialableActivities = Collection::make($query);
            //Consultar actividades agrupadas a la orden
            $addedActivities = $order->activities;

            return view('order.edit',compact('order','causals','observations','cities',
                        'avialableActivities', 'addedActivities', 'cities'));
        }
        else {
            session()->flash('error','No se encontró la orden...');
            return redirect()->route('order.index');
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
            return redirect()->route('order.edit')->withInput()->withErrors($errors);
        }
        $order = Order::find($id);
        if($order){
            $order->update($request->all());
            session()-> flash('message', 'La orden se actualizo correctamente...');
        }
        else{
            session()->flash('error','Ha ocurrido un problema al actualizar la orden');
        }
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        if($order){
            $order->delete();
            session()-> flash('message', 'La orden se elimino correctamente...');
        }
        else{
            session()->flash('error','Ha ocurrido un problema al eliminar la orden');
        }
        return redirect()->route('order.index');
    }

    /**
     * agrega una actividad a una orden
     */
    public function add_activity(string $order_id, string $activity_id)
    {
        $order = Order::find($order_id);
        if(!$order)
        {
            session()->flash('error', 'No se encuentra la orden');
            return redirect()->route('order.edit', $order_id)->withInput();
        }
        $activity = Activity::find($activity_id);
        if(!$activity)
        {
            session()->flash('error', 'No se encuentra la actividad');
            return redirect()->route('order.edit', $order_id)->withInput();
        }
        //guardar la actividad en order_activity
        $order->activities()->attach($activity_id);
        session()->flash('message', 'Actividad agregada exitosamente');
        return redirect()->route('order.edit', $order_id);

    }

    /**
     * retira una actividad a una orden
     */
    public function remove_activity(string $order_id, string $activity_id)
    {
        $order = Order::find($order_id);
        if(!$order)
        {
            session()->flash('error', 'No se encuentra la orden');
            return redirect()->route('order.edit', $order_id)->withInput();
        }
        $activity = Activity::find($activity_id);
        if(!$activity)
        {
            session()->flash('error', 'No se encuentra la actividad');
            return redirect()->route('order.edit', $order_id)->withInput();
        }
        //elimina la actividad en order_activity
        $order->activities()->detach($activity_id);
        session()->flash('message', 'Actividad removida exitosamente');
        return redirect()->route('order.edit', $order_id);

    }
}
