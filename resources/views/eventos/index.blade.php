@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<div class="card-bodys">
    <a href="{{route('evento.create')}}" class="btn btn-success btn-sm">Crear Evento</a>
</div>
    

 
<div class="grilla">

  
    @foreach($eventos as $evento)

  
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="https://placeimg.com/640/480/tech" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$evento->nombre}}</h5>
          <p class="card-text">{{$evento->descripcion}}</p>

          <div class="container2">
            {{-- <a href="{{route('evento.show',$evento->id)}}" class="btn btn-primary">Ver</a> --}}
            <a href="{{route('evento.actividad',$evento->id)}}" class="btn btn-primary">Ver Evento</a>
          </div>
         

        </div>
    </div>

    @endforeach

      {{-- <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('descargar1.jpg')}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>

      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('descargar2.jpg')}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>

      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('descargar1.jpg')}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div> --}}
    

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