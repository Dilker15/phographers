@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Invitaciones A Eventos</h1>
@stop

@section('content')

<div class="card-bodys">
    {{-- <a href="{{route('evento.create')}}" class="btn btn-success btn-sm">Crear Evento</a> --}}
</div>
    

 
<div class="grilla">

  
    @foreach($invitaciones as $invitacion)

        <div class="card text-white {{$invitacion->color_card}} mb-3" style="max-width: 18rem;">
            <div class="card-header">invitacion</div>
                <div class="card-body">
                <h5 class="card-title">{{$invitacion->id}}</h5>
                {{-- $invitacion->evento->nombre --}}
                <br>
                <h5 class="card-title">Evento : {{$invitacion->evento_id}}</h5>
                <p class="card-text">Fotografo : {{$invitacion->fotografo_id}}</p>
            </div>
        <form action="{{route('fotografos.aceptar')}}" method="POST" id="formulario">
            @method('POST')
            @csrf
            <input id="respuesta" name="respuesta" value="1" hidden>
            <input id="invitacion_id" name="invitacion_id" value="{{$invitacion->id}}" hidden>
            <input id="evento" name="evento" value="{{$invitacion->evento_id}}" hidden>
            <input id="fotografo" name="fotografo" value="{{$invitacion->fotografo_id}}" hidden>
            <div class="botones"> 
                <input type="submit" value="Aceptar" class="aceptar">
            </div>
        </form>
    </div>

    @endforeach

    
    

</div>

  
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

    <style>
        .aceptar{
            border: none;
            background-color:#3c99dc;
            border-radius:10px;
        }

        .rechazar{
            border:none;
            background-color:#ff0000;
            border-radius:10px;
        }

        .botones{
            display:flex;
            justify-content: space-around;
            margin-bottom:0.4rem;
        }


        .grilla{

            max-width:600px;
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:10px;
            margin:auto;
        }
    </style>
    
@stop

@section('js')
    <script> 
    
        function aceptar(){
            // let respuesta = document.querySelector('#respuesta');
            // respuesta.setAttribute('value',1);
            let form = document.querySelector('#formulario');
            form.submit();
            
        }


        // function rechazar(){
        //     let nueva = document.querySelector('#respuesta');
        //     nueva.setAttribute('value',0);
        //     let form = document.querySelector('#formulario');
        //     form.submit();

        // }
        
    
    
    </script>
@stop