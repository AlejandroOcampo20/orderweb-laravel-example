@extends('templates.base_reports')
@section('header', 'Reporte de órdenes por rango de fechas de legalización')
@section('content')
    <section id="results">
        @if (count($orders) != 0)
            <h4>Período del Reporte</h4>
            <table id="reportTable">
                <thead>
                    <tr>
                        <th>Fecha Inicial</th>
                        <th>Fecha Final</th>
                        <th>Total de Órdenes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $start_date }}</td>
                        <td>{{ $end_date }}</td>
                        <td>{{ count($orders) }}</td>
                    </tr>
                </tbody>
            </table>

            <br><br><hr>

            <h4>Órdenes Encontradas:</h4>
            <table id="reportTable">
                <thead>
                    <tr>
                        <th>ID Orden</th>
                        <th>Fecha Legalización</th>
                        <th>Dirección</th>
                        <th>Ciudad</th>
                        <th>Causal</th>
                        <th>Observación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->legalization_date }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->city }}</td>
                            <td>{{ $order->causal ? $order->causal->description : 'Sin causal' }}</td>
                            <td>{{ $order->observation ? $order->observation->description : 'Sin observación' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p><strong>No existen resultados en el reporte para el rango de fechas seleccionado.</strong></p>
        @endif
    </section>
@endsection