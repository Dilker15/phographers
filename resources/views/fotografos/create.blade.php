<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>

    <style>
        body{
            
            background-image:url('foto3.jpg');
            background-repeat: no-repeat;
            background-size:cover;
            background-position: center;
            

        }

        #formulario{
            max-width: 800px;
            margin:10% auto;
            display:grid;
            grid-template-columns:repeat(2,1fr);
            gap:0.1rem;
          
        }

        .imagen-cont img{
            width:100%;
            height:100%;
            object-fit:cover;
        }

        .form-control{
            color:#000000;
            font-style:bold;
        }

        .form-control:hover{
            border:1px solid #000000;
            
        }
     
        .registro input:hover{
            background-color:#0028FF;
        }

    </style>
    <script> 
        function mostrar(){
            var archivo = document.getElementById("imagen").files[0];
            var reader = new FileReader();
            if (imagen) {
                reader.readAsDataURL(archivo );
                reader.onloadend = function () {
                document.getElementById("img").src = reader.result;
                }
            }
            }

    
    </script>
</head>
<body>

    <div id="formulario">
        <div class="imagen-cont">
            <img id="img">
        </div>
        <div class="imagen"> 
            <form action="{{route('storeFotografo')}}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf

                <div class="form-group">
                  <label for="nombre"><strong>Nombre:</strong></label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre" required>
                </div>
                <div class="form-group">
                  <label for="apellidos"><strong>Apellidos:</strong></label>
                  <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Ingrese sus apellidos" required>
                </div>
                <div class="form-group">
                    <label for="email"><strong>Email:</strong></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
                  </div>
                  <div class="form-group">
                    <label for="password"><strong>Contraseña:</strong></label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="contraseña" required>
                  </div>
                <div class="form-group">
                  <label for="telefono"><strong>Telefono:</strong></label>
                  <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Telefono" required>
                  
                </div>
                <div class="form-group">
                  <label for="sexo"><strong>Sexo:</strong></label>
                  <select class="form-control" id="sexo" name="sexo">
                    <option value="0">Femenino</option>
                    <option value="1">Masculino</option>

                  </select>
                 
                </div>

                <div class="form-group">
                    <label for="file"><strong>Foto Perfil:</strong></label>
                    <input type="file" id="imagen" name="imagen" class="form-control" onchange="mostrar()">
                </div>


                <div class="form-group registro">
                    <input type="submit" class="form-control btn-sm btn-warning mt-4">
                </div>

                
                
              </form>
        </div>
        

    </div>
   

    
</body>
</html>