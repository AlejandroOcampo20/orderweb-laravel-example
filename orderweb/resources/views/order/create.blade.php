@extends('templates.base')
@section('title', 'crear orden')
@section('header', 'crear orden')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="" method="POST">
                @csrf
                <div class="row form-gruop">
                    <div class="col-lg-12 mb-4">
                        <label for="date">Fecha</label>
                        <input type="date" class="form-control" name="date" id="date" required>
                    </div>
                    <div class="col-lg-12 mb-4">
                        <label for="city">Ciudad</label>
                        <select name="city_id" id="city_id" class="form-control">
                            <option value="Tuluá">Tuluá</option>
                            <option value="Cali">Cali</option>
                            <option value="Buga">Buga</option>
                            <option value="Palmira">Palmira</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="causal_id">Causal</label>
                        <br>
                        <input type="text" class="form control" name="causal" id="causal" required>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="type_activity_id">Observación</label>
                        <select name="type_activity_id" id="type_activity_id" class="form-control">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{ route('order.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
  
@endsection
