@extends('templates.base')
@section('title', 'Test 2')
@section('content')

    <h1>Test 2</h1>
    <q>En la vida existen 3 tipos de personas, las que saben contar y las que no.</q>
    <small>Homero J. Simpson</small>
    <br><br>
    <button onclick="show_alert()">Clic!!</button>

@endsection

@section('scripts')
    <script src="{{ asset('js/test.js') }}"></script>
@endsection