@extends('templates.base_reports')
@section('header', 'Reporte actividades por técnicos')
@section('content')
    <section id="results">
        @if (count($activities) != 0)
            <h4>Técnicos</h4>
            <table id="reportTable">
                <thead>
                    <tr>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                        <th>Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $activities[0]->technician->document }}</td>
                        <td>{{ $activities[0]->technician->name }}</td>
                        <td>{{ $activities[0]->technician->especiality }}</td>
                        <td>{{ $activities[0]->technician->phone }}</td>
                    </tr>
                </tbody>
            </table>

            <br><hr>
            
            <table id="reportTable">
                <thead>
                    <th>Id</th>
                    <th>Descripcion</th>
                    <th>Horas</th>
                    <th>Tipo</th>
                </thead>
                <tbody>
                    @foreach ($activities as $activity)
                        <tr>
                            <td>{{ $activity['id'] }}</td>
                            <td>{{ $activity['description'] }}</td>
                            <td>{{ $activity['hours'] }}</td>
                            <td>{{ $activity->type_activity->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p><strong>No existen resultados en el reporte</strong></p>
        @endif
    </section>

@endsection