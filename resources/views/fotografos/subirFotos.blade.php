@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Subir Fotos</h1>

@stop

@section('content')

<div class="card-bodys">
    <a href="{{route('fotografos.index')}}" class="btn btn-sm btn-success">Volver</a>
</div>
    
<form action="{{route('fotografos.guar')}}"
     enctype="multipart/form-data"
      method="POST"
      class="dropzone"
      id="my-awesome-dropzone">
      @method('POST')
      @csrf
    
    <input type="text" value="{{$fotografo}}" name="fotografo" id="fotografo" hidden>
    <input type="text" value="{{$evento}}" name="evento" id="evento" hidden>
    
</form>


</div>

  
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js" integrity="sha512-oQq8uth41D+gIH/NJvSJvVB85MFk1eWpMK6glnkg6I7EdMqC1XVkW7RxLheXwmFdG03qScCM7gKS/Cx3FYt7Tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        Dropzone.options.myAwesomeDropzone = {
            headers:{
                'X-CSRF-TOKEN' : "{{csrf_token()}}"
            },
            dictDefaultMessage: "Subir Imagenes Aqui",
            addRemoveLinks: true,
            acceptedFiles: "image/*",
            maxFilesize:6,
            maxFiles: 10,
        };
      </script>
@stop