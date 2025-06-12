<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Order;
use App\Models\Technician;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $technicians = Technician::all();
        return view('reports.index', compact('technicians'));
    }

    /**
     * reporte que genera el listado de todos los tecnicos
     */
    public function export_technicians()
    {
        $technicians = Technician::all();
        $data = array(
            'technicians' =>$technicians
        );

        /**
         * domp version 3.x
         * se debe agregar setOptions
         */
        $pdf = Pdf::loadView('reports.export_technicians', $data)->setPaper('letter', 'portrait')
        ->setOptions(['defaultFont'=>'sans-serif',
                    'isRemoteEnabled'=>true]);//landscape: horizontal
        return $pdf->download('technicians.pdf');
    }
    /**
     * reporte que se genera el listado de actividades de un técnico
     */

    public function export_activities_by_technician(Request $request)
    {
        $activities = Activity::where('technician_id', $request['technician_id'])->get();
        $data = array(
            'activities' =>$activities
        );

        $pdf = Pdf::loadView('reports.export_activities_by_technician', $data)
        ->setPaper('letter', 'portrait')
        ->setOptions([
            'defaultFont'=>'sans-serif',
            'isRemoteEnabled'=>true]);
        return $pdf->download('ActivitiesByTechnician-'.$request['technician_id'].'.pdf');
    }

    public function export_order_by_date(Request $request)
    {
        $orders = Order::whereBetween('legalization_date', [$request['start_date'], $request['end_date']])->get();
        $data = array(
            'orders' => $orders,
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date']
        );

        $pdf = Pdf::loadView('reports.export_order_by_date', $data)
        ->setPaper('letter', 'portrait')
        ->setOptions([
            'defaultFont'=>'sans-serif',
            'isRemoteEnabled'=>true]);
        return $pdf->download('OrderByDate-'.$request['start_date'].'_a_'.$request['end_date'].'.pdf');
    }
}
