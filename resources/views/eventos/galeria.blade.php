@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>FOTOGRAFOS DEL EVENTO</h1>
@stop

@section('content')

<div class="card-bodys">
    {{-- <a href="{{route('evento.create')}}" class="btn btn-success btn-sm">Crear Evento</a> --}}
</div>
    

 
<div class="grilla">

  
    @foreach($fotos as $foto)

  
    <div class="card" style="width: 18rem;">
       <a href=""  class="showImage"> <img class="card-img-top" src="{{$foto->url}}" alt="Card image cap"></a>    </div>

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

        .showImage:hover{
          transform:scale(1.3);
          z-index:99999999;
        }

        .container2{
          display:flex;
          justify-content:center;
          gap:1rem;
        }

        .showImage img{
          width: 100%;
          height:auto;
          object-fit: cover;
        }

        .card{
          column:20px;
          border:1xp black solid;
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop