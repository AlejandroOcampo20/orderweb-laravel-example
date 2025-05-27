@extends('templates.base')
@section('title','test 2')
@section('content')
    <h1>Test 2</h1>
    <q>no soy hombre de alegrías, pero si estas en el cielo ayúdame Superman!!!</q>
    <small>Homero J. Simpsons</small> <br>
    <button onclick="show_alert()">Clic!</button>
@endsection
@section('scripts')
    <script src="{{ asset('js/test.js') }}"></script>
@endsection