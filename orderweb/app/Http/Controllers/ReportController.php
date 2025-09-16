<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Order;
use App\Models\Technician;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index () {
        $technicians = Technician::all();
        return view('reports.index', compact('technicians'));
    }

    /**
     * Reporte que genera el listado de todos los técnicos
     */
    public function export_technicians () {
        $technicians = Technician::all();
        $data = [
            'technicians' => $technicians
        ];

        $pdf = Pdf::loadView('reports.export_technicians', $data)
                ->setPaper('letter', 'portrait')
                ->setOptions(['DefaultFont'=>'sans-serif', 'isRemoteEnabled'=>true
            ]); // Landscape: horizontal

        return $pdf->download('technicians.pdf');
    }



    /**
     * Reporte que genera el listado de un técnico
     */
    public function export_activities_by_technician (Request $request) {
        
        $activities = Activity::where('technician_id', $request['technician_id'])->get();
        
        $data = array(
            'activities' => $activities
        );

        $pdf = Pdf::loadView('reports.export_activities_by_technician', $data)
                ->setPaper('letter', 'portrait')
                ->setOptions(['DefaultFont'=>'sans-serif', 'isRemoteEnabled'=>true
            ]); // Landscape: horizontal

        return $pdf->download('ActivitiesByTechnician-'.$request['technician_id'].'.pdf');
    }

    /**
     * Reporte que genera el listado de órdenes por rango de fechas de legalización
     */
    public function export_orders_by_date_range(Request $request) {
        $orders = Order::with(['causal', 'observation'])  // Carga las relaciones
                   ->whereBetween('legalization_date', [
                       $request->start_date,
                       $request->end_date
                   ])->get();
    
        $data = [
            'orders' => $orders,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ];

        $pdf = Pdf::loadView('reports.export_orders_by_date_range', $data)
            ->setPaper('letter', 'portrait')
            ->setOptions([
                'defaultFont' => 'sans-serif',
                'isRemoteEnabled' => true
            ]);

        return $pdf->download('OrdersByDateRange.pdf');
    }
}