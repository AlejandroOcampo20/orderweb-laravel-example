@extends('templates.base')
@section('title', 'Reportes')
@section('header', 'Reportes')
@section('content')
@include('templates.messages')

    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Reporte general de técnicos
                    </h6>
                </div>
                <div class="card-body">
                    <a href="{{ route('reports.technicians') }}" 
                        class="btn btn-danger btn-block btn-lg col-lg-2" title="PDF">
                        <i class="fa-solid fa-file-pdf"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Reporte actividades por técnico
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('reports.activities_technician') }}" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="technician_id">Técnico:</label>
                            </div>
                            <div class="col-lg-2">
                                <select name="technician_id" id="technician_id" class="form-control" required>
                                    @foreach ($technicians as $technician)
                                        <option value="{{ $technician['id'] }}">{{ $technician['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-5">
                                <button type="submit" class="btn btn-danger btn-block col-lg-2" title="PDF">
                                    <i class="fa-solid fa-file-pdf"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

 
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Reporte de órdenes por rango de fechas de legalización
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('reports.orders_by_date_range') }}" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="start_date">Fecha inicial:</label>
                            </div>
                            <div class="col-lg-2">
                                <input type="date" class="form-control" name="start_date" id="start_date" required>
                            </div>
                            <div class="col-lg-2">
                                <label for="end_date">Fecha final:</label>
                            </div>
                            <div class="col-lg-2">
                                <input type="date" class="form-control" name="end_date" id="end_date" required>
                            </div>
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-danger btn-block" title="PDF">
                                    <i class="fa-solid fa-file-pdf"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection