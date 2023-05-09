@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mi Albun Personal</h1>
@stop

@section('content')

<div class="card-bodys">
    <a href="{{route('albun.create',$fotografo)}}" class="btn btn-success btn-sm">Crear Albun</a>
</div>
    

 
<div class="grilla">
    

</div>

  
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .grilla{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(min(250px,100%),1fr));
            gap:20px;
            margin-top:3rem;
            padding:2rem;
            /* background-color:gray; */
        }

        .card-bodys{
          
        }

        .container2{
          display:flex;
          justify-content:center;
          gap:1rem;
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop