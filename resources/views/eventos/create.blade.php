@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Bienvenidos al create de eventos</p>

    <form action="{{route('evento.store')}}" method="POST" id="formulario">
        @method('post')
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="nombre">Nombre Evento</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
          </div>
          <div class="form-group col-md-3">
            <label for="fecha">Fecha Del Evento</label>
            <input type="date" class="form-control" id="fecha" name="fecha" placeholder="fecha">
          </div>
          <div class="form-group col-md-3">
            <label for="hora">Hora</label>
            <input type="time" class="form-control" id="hora" name="hora" placeholder="fecha">
          </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
          <label for="descripcion">Decripcion del evento</label>
           <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion">
          </textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="direccion">Direccion Evento</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion">
          </div>
        </div>
        
        
        <input id="id_administrador" name="id_administrador" hidden>
    <div class="form-row">
        <div class="form-group col-md-10 photo">
            <label for="fotografo" class="photo2">Fotografos - Estudios</label>
        <select name="fotografos[]" id="fotografos" multiple>
            @foreach($fotografos as $fotografo)
              <option value={{$fotografo->id}}>{{$fotografo->nombre.' '.$fotografo->apellidos}}</option>
            @endforeach
        </select>
    <div class="form-group centro">
            <button type="submit" class="btn-enviar">Crear</button>
    </div> 
        
      </form>
    


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
      <style>
          .centro{
              display:flex;
              justify-content: center;
              margin:2rem;
          }

          .btn-enviar{
              background-color:#82CD47;
              padding:0.56em;
              border-radius:20px;
              width:10rem;
          }

          .photo{
            margin:auto;
          }


          .photo2{
            text-align:center;
            margin:auto;
          }
      </style>
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('fotografos')  // id
        new MultiSelectTag('invitados') 

        function init() {
  var inputFile = document.getElementById('inputFile1');
  inputFile.addEventListener('change', mostrarImagen, false);
}

function mostrarImagen(event) {
  var file = event.target.files[0];
  var reader = new FileReader();
  reader.onload = function(event) {
    var img = document.getElementById('img1');
    img.src= event.target.result;
  }
  reader.readAsDataURL(file);
}

window.addEventListener('load', init, false);



    </script>
@stop