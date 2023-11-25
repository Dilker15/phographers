<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
    background-color: #f0f0f0;
}



.title{
    font-size: 3rem;
    color: #29ADB2;
    text-align: center;
}

.imagen{
    width:400px;
    height: auto;
    margin: auto;
}


#generate-pdf{
    width:auto;
    height: 35px;
    color: white;
    display: block;
    background-color: red;
    border-radius: 15px;
    margin-left:600px;
}
.btn-volver{
    width:4.8rem;
    height: 30px;
    color: white;
    display: block;
    background-color: #54B435;
    border-radius: 15px;
    margin-left:600px;
    margin-top:1rem;
    text-align: center;
    text-decoration: none;
}
    </style>
</head>
<body>
        <h1 class="title">QR DE INVITACION AL EVENTO</h1>
        <div class="imagen">
            {{$qr}}
        </div>
                     {{-- {{$qr}} --}}
        <button id="generate-pdf">Descargar</button>
        <a href="{{route('evento.index')}}" class="btn-volver">Volver</a>


        <script>
            // Cuando se haga clic en el botón, generará el PDF
            let butt = document.getElementById('generate-pdf');
            butt.addEventListener('click', ()=>{
                butt.style.visibility = "hidden";
                window.print();
              
            });

            
        </script>
</body>
</html>