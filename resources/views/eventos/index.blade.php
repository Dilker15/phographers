{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('misStilos/stilos.css') }}">
    <link rel="stylesheet" href="{{ asset('misStilos/normalize.css') }}">
    <title>Document</title>
</head>
<body>
    <section>
        <div>
            <a class="btn-create">crear 1</a>
            <a  class="btn-create"> crea 2</a>
            <a  class="btn-create"> crea 3</a>
        </div>
    </section>
    <div class="second">
        <div class="card">
            hola
        </div>
        <div class="card">
            hola
        </div>
        <div class="card">
            hola
        </div>
        <div class="card">
            hola
        </div>
    </div>

    <div class="sec">
        <div class="card">
        </div>
        <div class="card">
        </div>
        <div class="card">
        </div>
        <div class="card">
        </div>
    </div>
   
   
</body>
</html> --}}


@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Bienvenidos al edit de eventos</p>
    <div class="cont">
        <a class="btn-create"> Boton 1</a>
        <a class="btn-create"> Boton 1</a>
        <a class="btn-create"> Boton 1</a>
    </div>
    <div class=cont2>
        <div class="card-one">

        </div>
        <div class="card-one">

        </div>
        <div class="card-one">

        </div>
        <div class="card-one">

        </div>
        
    </div>
    <div class="cont3">

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .cont{
            background-color: red;
            height:300px;
            padding:20px;
        }

        .card-one{
            background-color: pink;
            height:80px;
            width: 70px;
        }

        .cont2{
            height:100px;
            background-color: blue;
            display:flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .cont3{
        height: 100px;
        background-color:yellow;
        }

        .btn-create{
            padding:10px;
            background-color:yellow;
        }

        
    </style>

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop