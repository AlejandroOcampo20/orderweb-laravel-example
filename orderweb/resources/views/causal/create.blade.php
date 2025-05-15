@extends('templates.base')
@section('title', 'crear causal')
@section('header', 'crear causal')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="" method="POST">
                @csrf
                <div class="row form-gruop">
                    <div class="col-lg-12 mb-4">
                        <label for="description">Descripción</label>
                        <input type="text" class="form-control" name="description" id="description" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-primary btn-block">Guradar</button>
                    </div>
                    <div class="col-lg-6">
                        <a href="#" class="btn btn-secondary btn-block">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
  
@endsection
