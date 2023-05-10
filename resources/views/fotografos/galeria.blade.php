@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mis fotos</h1>
@stop

@section('content')

<div class="card-bodys">
    <a href="{{route('fotografos.subirFotos',[$evento,$fotografo])}}" class="btn btn-sm btn-success">Añadir fotos</a>
</div>
    

 
<div class="grilla">

  
    @foreach($fotos as $foto)

  
    <div class="card" style="width: 18rem;">
       <div class="fotografia"> 
        <img class="card-img-top" src="{{$foto->url}}" alt="Card image cap">
       </div>

       {{-- asset('storage/eventos/'.''.$foto->url) --}}
        
        {{-- <div class="card-body">
         
         

        </div> --}}
    </div>

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

        .card-bodys{
          
        }

        .container2{
          display:flex;
          justify-content:center;
          gap:1rem;
        }


        .fotografia img{
            width:100%;
            height:250px;
            object-fit: cover;
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop