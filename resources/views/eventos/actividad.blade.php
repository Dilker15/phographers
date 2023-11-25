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

{{-- 
    <table id="invitados_table">
      <thead>
        <th>Invitado</th>
        <th>Email Invitado</th>
      </thead>
       <tbody>
        @foreach($invitadosDelEvento as $invitado)
           <tr>{{$invitado}}</tr>
           <tr>{{$invitado}}</tr>
        @endforeach  
       </tbody>
    </table> --}}

    @foreach($fotografos as $fotografo)

    
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="https://placeimg.com/640/480/tech" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$fotografo->nombre}}</h5>
          <h4 class="card-title">{{$fotografo->apellidos}}</h4>
          <p class="card-text">{{$fotografo->email}}</p>
          <p class="card-text">{{$fotografo->telefono}}</p>

          <div class="container2">
            <a href="{{route('evento.fotos',[$fotografo,$evento])}}" class="btn btn-success">Ver Fotos</a>
            
          </div>
         

        </div>
    </div>

    @endforeach
</div>

<div class="listaInvitados">
  <h2 class="title-list">Lista de invitados</h2>
  <table id="miTabla">
    
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Foto</th>
      </tr>
    </thead>
    <tbody>
      @foreach($invitadosDelEvento as $invitado)
      <tr>
        <td>{{explode('-', $invitado)[0]}}</td>
        <td>{{explode('-', $invitado)[1]}}</td>
        <td>
          <img src="{{explode('-', $invitado)[2]}}" alt="foto_invitado" width="80" height="90">
        </td>
      </tr
      @endforeach
     >
    </tbody>
    
  </table>
  <button id="descargar">Descargar Lista</button>


</div>

  
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>

      .listaInvitados{
        margin-left:25%;
      }

table {
      border-collapse: collapse;
      width: 50%;
      margin-bottom: 20px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
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

        .title-list{
          font:2rem;
          color:red;
          margin-left:6rem;
        }
    </style>
@stop

@section('js')
    <script> 
            const des = document.getElementById("descargar");
            des.addEventListener("click",()=>{
              window.print();
            });
    </script>
@stop