@extends('templates.base_reports')
@section('header', 'Reporte de ordenes por fecha')
@section('content')
    <section id="results">
        @if(isset($orders) && count($orders) > 0)
            <p><strong>Fecha de leglización desde</strong>{{ $start_date }}</p>
            <p><strong>Fecha de leglización hasta</strong>{{ $end_date }}</p>
            <table id="reportTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha de legalización</th>
                        <th>Dirección</th>
                        <th>Ciudad</th>
                        <th>Causal</th>
                        <th>Observación</th>
                        <th>Fecha de Creación</th>                
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order) 
                        <tr>
                            <td>{{ $order['id'] }}</td>
                            <td>{{ $order['legalization_date'] }}</td>
                            <td>{{ $order['address'] }}</td>
                            <td>{{ $order['city'] }}</td>
                            <td>{{ $order->causal->description }}</td>
                            <td>@if ($order->observation)
                                {{ $order->observation->description }}
                            @endif</td>
                            <td>{{ $order['created_at'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>       
        @else
            <p><strong>No existen resultados en el reporte</strong></p>
        @endif
    </section>

@endsection