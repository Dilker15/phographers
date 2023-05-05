@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Subir Fotos</h1>

@stop

@section('content')

<div class="card-bodys">
    <a href="{{route('fotografos.index')}}" class="btn btn-sm btn-success">Volver</a>
</div>
    


</div>

  
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop