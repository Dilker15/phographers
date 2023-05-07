<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .title{

            color:#39B5E0;
        }

        :root {
  --gradient: linear-gradient(to left top, #DD2476 10%, #FF512F 90%) !important;

}


.card {
  
  border: 1px solid black;
  box-shadow: #222 2px;
  display:flex;
  flex-direction:column;
  gap:0;
}

.btn {
 
 
  text-decoration: none;
  transition: all .4s ease;
}

.card img{
    width:100%;
    height: auto;
   
}

.botones{

    display:flex;
    justify-content: center;

}

.botones a{

    text-decoration:none;
    padding:0.7rem;
    background-color:#FFEA20;
    border-radius:30px;
    margin-bottom:0.4rem;
}

.botones a:hover{
    opacity:0.5;
}

.nombre,.apellido,.telefono{
    text-align:center;
}


body{

    background-image: url('https://image.jimcdn.com/app/cms/image/transf/none/path/sc77e1e58a42c514a/image/i9977c7b3a6db203a/version/1516578954/image.jpg');
    background-position: center;
    background-repeat: no-repeat;
    
}



.main{
    max-width: 900px;
    margin:auto;
    display:grid;
    grid-template-columns:repeat(3,1fr);
}



.header{
    margin:3rem;
    text-align:center;
}




.navegator{
    display:flex;
    justify-content: space-evenly;

}

.container-navegator{
    border-bottom:1px solid gray;
    padding:2rem;
    margin-bottom:2rem;
}



.navegator a{
   
    font-size:1.4rem;
    color:black;
    text-decoration:none;
}

.tit span{
    color:#39B5E0;
}

.tit{
    font-size:3rem;
}

.titl{
    font-size:2rem;
    text-align:center;
}
.titl span{
    color:#39B5E0;

}

.navegator a:hover{
   
  color:#39B5E0;
}

.informacion{
    background-color:#0F6292;
}

.nombre,.apellido,.telefono{
    color:#ffffff;
}

body{
            
            background-image:url('foto5.jpg');
            background-repeat: no-repeat;
            background-size:cover;
            background-position: center;
            

        }

    </style>
</head>
<body>
    <header class="header">
        <h1 class="tit">Star <span>Studios</span></h1>
    </header>

    <div class="container-navegator">
        <nav class="navegator">
            <a href="#">Galeria</a>
            <a href="#">Fotografos</a>
            <a href="#nosotros">Nosotros</a>
            
        </nav>
    </div>
    <h3 class="titl">FOTOGRAFOS Y <span>ESTUDIOS FOTOGRAFICOS</span></h3>
    <div class="main">
       

            @foreach($fotografos as $fotografo)

            <div class="col-md-4">
                <div class="card" style="width: 15rem;">
            <img src="https://th.bing.com/th/id/R.4d66329e5ef53cb1ea96820a17d8480b?rik=4jQMqE550cvehg&riu=http%3a%2f%2ftusimagenesde.com%2fwp-content%2fuploads%2f2014%2f09%2ffotos-de-famosos-2.jpg&ehk=LKjEBBew0sLihnNIM3qrts5WMe%2bBb%2bMQcclRCoJhy7U%3d&risl=&pid=ImgRaw&r=0" class="card-img-top" alt="perfil">
            <div class="informacion">
              <p class="nombre">{{$fotografo->nombre.' '.$fotografo->apellidos}}</p>
              <p class="apellido">Sexo: {{$fotografo->sexo_fotografo}}</p>
              <p class="telefono">Telefono: {{$fotografo->telefono}}</p>
              <div class="botones"> 
                <a href="{{route('catalogos',$fotografo->id)}}"><i class="fas fa-link"></i>Catalogo</a>
              </div>
             
            </div>
            </div>
              </div> 
            @endforeach
    </div>

    <footer>
    </footer>
</body>
</html>