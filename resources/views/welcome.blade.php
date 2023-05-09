<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}

            /* Underline Effect*/
        </style>

        <style>
            body{
            
            background-image:url('foto2.jpg');
            background-repeat: no-repeat;
            background-size:cover;
            background-position:center;
            

        }
            .title-register{
              text-align:center;
              font-size:2rem;
            }

            .todo{
             
              height:40px;
              
            }

            .title span{
              color:#39B5E0;
            }
            .title{
              text-align:center;
              font-size:3rem;
            }
            

            .imagen img{
              width: 100%;
              height: 250px;
              object-fit: cover;
            }


            .container-fotos{
              max-width:1000px;
              display:grid;
              grid-template-columns:repeat(3,1fr);
              margin:auto;
              gap:10px;
            }


            .navegator{
              display:flex;
              justify-content:space-evenly;
            }

            .navegator a{
              text-decoration:none;
              font-size:1.4rem;
              color:black;

            }

            .navegator a:hover{
              color:#39B5E0;
            }

            .container-navegator{
              margin-bottom:20px;
              padding:15px;
              border-bottom:1px solid gray;
              margin-bottom:2rem;
            }
            
            .registros{
              max-width:1000px;
              margin:auto;
              display:grid;
              gap:2rem;
              grid-template-columns:repeat(2,1fr);
              margin-top:3rem;
              margin-bottom:4rem;

              
            }


            .reg-title{
              text-align:center;
              font-size:1.4rem;
            }

            .reg-desc{
              text-align:center;
              
            }

            .invitado{
              height: 15rem;
              background-color:#FFD95A;

            }

            .fotografo{
              height: 15rem;
              background-color:#39B5E0;
            }

            .card-reg{
              border-radius:20px;
            }

            

            .btn-invitado{
              background-color:#39B5E0;
              padding:0.8rem;
              font-size:1rem;
              border-radius:10px;
            
            }
            
            .btn-fotografo{
              background-color:#FFD95A;
              padding:0.8rem;
              font-size:1rem;
              border-radius:10px;
              
              
            }


            .botones-registros{
              display:flex;
              justify-content: center;
            }

            .botones-registros a:hover{
              opacity:0.6;
            }


           .loguearse
           {
            color:#39B5E0;
            font-size:1.5rem;
            text-decoration:none;
           }


           
        </style>
    </head>
    <body>
      <header>
        <div class="todo">
          @if (Route::has('login'))
          <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
              @auth
                  <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
              @else
                  <a href="{{ route('login') }}" class="text-sm text-gray-700 underline loguearse">Ingresar</a>

                  {{-- @if (Route::has('register'))
                      <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                  @endif --}}
              @endauth
          </div>
      @endif
      </div>
        <h1 class="title">Star <span>Studios</span></h1>
      </header>
      
       
      <div class="container-navegator">
          <nav class="navegator">
            <a href="#">Galeria</a>
            <a href="{{route('princ')}}">Fotografos</a>
            <a href="#registrate">Registrate</a>
          </nav>
      </div>

        <div class="container-fotos">

            <div class="imagen">
                <div class="foto">
                  <img src="https://cdn.holidayguru.es/wp-content/uploads/2015/07/Lofoten-Islands-Norwegen-shutterstock_209912014.jpg" alt="foto">
                </div>
                <div class="texto">

                </div>
            </div>

            

            <div class="imagen">
              <div class="foto">
                <img src="https://th.bing.com/th/id/R.41cecf1c8e020382aa4ec756c360ce0b?rik=LqeDm9lMAH74Rw&pid=ImgRaw&r=0" alt=foto>
              </div>
              <div class="texto">
              </div>
            </div>

          
            <div class="imagen">
              <div class="foto">
                <img src="https://th.bing.com/th/id/R.8cad920cb3079f1dcde9415831e1ec4f?rik=BYklmbai%2bvQl3w&riu=http%3a%2f%2fwww.importancia.org%2fwp-content%2fuploads%2fecologia-de-la%2fNaturaleza-3.jpg&ehk=0aBUgwzLNGscABb1xUl%2b2ShxIdcqmUh3avirwk69cFE%3d&risl=&pid=ImgRaw&r=0" alt="foto">
              </div>
              <div class="texto">

              </div>
            </div>


            <div class="imagen">
              <div class="foto">
                <img src="https://imosa.blogs.uv.es/files/2020/04/el-mejor-fotografo-de-bodas.jpg" alt="foto">
              </div>
              <div class="texto">

              </div>
            </div>

            <div class="imagen">
              <div class="foto">
                <img src="https://th.bing.com/th/id/R.c07d4bade74f421ea0ba1942dc9f173d?rik=y2z4mu0b5biTng&pid=ImgRaw&r=0" alt="foto">
              </div>
              <div class="texto">

              </div>
            </div>


            <div class="imagen">
              <div class="foto">
                <img src="https://th.bing.com/th/id/R.1075572e8917eaf601475def3220d23d?rik=yd%2ftQ08xOmkuIQ&riu=http%3a%2f%2fideasproducciones.com%2fimages%2fgallery%2feventos-especiales%2f09.jpg&ehk=r8DFk0bQaiEhfgrc7JiXBenSZBXDJRMU1Y8NGRitka0%3d&risl=&pid=ImgRaw&r=0" alt="foto">
              </div>
              <div class="texto">

              </div>
            </div>


            <div class="imagen">
              <div class="foto">
                <img src="https://th.bing.com/th/id/OIP.d7WMK6I50Dmdwyab3dD-_QHaE8?pid=ImgDet&rs=1" alt="foto">
              </div>
              <div class="texto">

              </div>
            </div>


            <div class="imagen">
              <div class="foto">
                <img src="https://th.bing.com/th/id/OIP.uuAfYbHbWMNrUc2FxuLZQQHaEo?pid=ImgDet&rs=1" alt="foto">
              </div>
              <div class="texto">

              </div>
            </div>


            <div class="imagen">
              <div class="foto">
                <img src="https://d1zv66c6p7f9ox.cloudfront.net/fotoweb/fotonoticia_20161027114002_800.jpg" alt="foto">
              </div>
              <div class="texto">

              </div>
            </div>


            <div class="imagen">
              <div class="foto">
                <img src="https://tufiestaencasa.com.mx/wp-content/uploads/2019/02/eventos1.png" alt="foto">
              </div>
              <div class="texto">

              </div>
            </div>


            {{--  --}}
            <div class="imagen">
              <div class="foto">
                <img src="https://th.bing.com/th/id/OIP.vfvBL3wA35iZFLYsKOZlLwHaE8?pid=ImgDet&rs=1" alt="foto">
              </div>
              <div class="texto">

              </div>
            </div>

            <div class="imagen">
              <div class="foto">
                <img src="https://grandluxorhotels.com/wp-content/uploads/2020/08/famosos-para-tu-evento.jpg" alt="foto">
              </div>
              <div class="texto">

              </div>
            </div>


            <div class="imagen">
              <div class="foto">
                <img src="https://th.bing.com/th/id/R.1c2951a7235e7464912422ad1271860d?rik=vWAaOoZ%2bNdwxCg&riu=http%3a%2f%2fwww.musiquetes.cat%2fwp-content%2fuploads%2f2015%2f07%2fartistas-para-eventos.jpg&ehk=Ddf9sqa0VRrlmh%2fyR2HJpnhKyvOYDysxUqQM2GngSO4%3d&risl=&pid=ImgRaw&r=0" alt="foto">
              </div>
              <div class="texto">

              </div>
            </div>


            <div class="imagen">
              <div class="foto">
                <img src="https://i.pinimg.com/736x/b8/fd/92/b8fd92ab1a4abfbfdc0e1926087dfb40.jpg" alt="foto">
              </div>
              <div class="texto">

              </div>
            </div>



            <div class="imagen">
              <div class="foto">
                <img src="https://th.bing.com/th/id/OIP.d7WMK6I50Dmdwyab3dD-_QHaE8?pid=ImgDet&rs=1" alt="foto">
              </div>
              <div class="texto">

              </div>
            </div>

      
        </div>
        <h3 class="title-register">Registrate</h3>
        <div id="registrate" class="registros">
          <div class="fotografo card-reg">
            <div class="reg-title">
              <p>¿Eres Fotografo?</p>
             </div>
             <div class="reg-desc">
              <p>Unete al servicio de fotografias y almacenamiento de fotos mas grande en la web</p>
             </div>
             <div class="botones-registros"> 
              <a href="{{route('crearFotografo')}}" class="btn-fotografo">Registrarme</a>
            </div>
            
          </div>
          <div class="invitado card-reg">
              <div class="reg-title"> 
                <p>Invitado</p>
              </div>
              <div  class="reg-desc">
                <p>Accede a todos tus eventos y fotos desde cualquier luagar del mundo</p>
              </div>
              <div class="botones-registros"> 
                <a href="{{route('crearInvitado')}}" class="btn-invitado">Registrarme</a>
              </div>

             
          </div>
      </div>
      
      <footer>
      </footer>

     
        
    </body>
</html>
