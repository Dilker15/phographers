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

    @if($foto->similar=="true")

    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{$foto->url}}" alt="Card image cap">  
      </div>

    @endif
  
   

    @endforeach

    

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

        .card img{
          width:100%;
          height: 250px;
          object-fit:cover;
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop