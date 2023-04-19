<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

        .log{
            
            width:200px;
            height:200px;
            background-color:red;

        }
    </style>

</head>
<body>
    

    <div class="log">
        @if (Route::has('login'))
        <div>
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Log in</a>
    
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>        
    @endif

    </div>

   

            <form>
                <label>Ingrese su correo:</label>
                <input>
                <label>Ingres su contraseñan</label>
                <input>
            <form>

    
</body>
</html>