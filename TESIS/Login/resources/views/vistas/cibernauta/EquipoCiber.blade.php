<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Tercer Tiempo</title>
    <link rel="shortcut icon"  href="{{asset('/Componentes/assets/images/tercer.png')}}">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('/Home/css/bootstrap.min.css')}}"/>
    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{asset('/Home/css/slick.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('/Home/css/slick-theme.csss')}}"/>
    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{asset('/Home/css/nouislider.min.css')}}"/>
    <!-- Font Awesome Icon -->
    <link type="text/css" rel="stylesheet" href="{{asset('/Home/css/font-awesome.min.css')}}"/>
    <!-- Custom stlylesheet -->
      <link type="text/css" rel="stylesheet" href="{{asset('/Home/css/style.css')}}"/>
      <link rel="stylesheet" type="text/css" href="{{asset('/Home/css/carta.css')}}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- para cargar la info del evento!! -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.3&appId=259367744717308&autoLogAppEvents=1"></script>
<link rel="stylesheet" type="text/css" href="{{asset('/css/TarjetaJugador/tarjeta.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/css/perfil/perfil.css')}}">


    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>
  <body>
    <!-- HEADER -->
    <header>
    
      <!-- /TOP HEADER -->

      <!-- MAIN HEADER -->
      <div id="header">
        <!-- container -->
        <div class="container">
          <!-- row -->
          <div class="row">
            <!-- LOGO -->
            <div class="col-md-3">
              <div class="header-logo">
                <a href="#" class="logo">
                  <img src="{{asset('/Componentes/assets/images/tercer.png')}}" alt="">
                </a>
              </div>
            </div>
            <!-- /LOGO -->

            <!-- SEARCH BAR -->
            
            <!-- /SEARCH BAR -->

            <!-- ACCOUNT -->
            <div class="col-md-3 clearfix">
              <div class="header-ctn">
                <!-- Wishlist -->
              
                

                <!-- Menu Toogle -->
                <div class="menu-toggle">
                  <a href="#">
                    <i class="fa fa-bars"></i>
                    <span>Menu</span>
                  </a>
                </div>
                <!-- /Menu Toogle -->
              </div>
            </div>
            <!-- /ACCOUNT -->
          </div>
          <!-- row -->
        </div>
        <!-- container -->
      </div>
      <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
      <!-- container -->
      <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
          <!-- NAV -->
          <ul class="main-nav nav navbar-nav">
            <li class="active"><a href="{{route('index')}}">Inicio</a></li>
            <li><a href="{{route('entrar')}}">Entrar</a></li>
            <li><a href="{{route('registrar')}}">Registrar</a>
                             
            </li> 

          </ul>
          <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
      </div>
      <!-- /container -->
    </nav>
    <!-- /NAVIGATIONm -->
<div class="container emp-profile">
   @include('flash::message')
    <br>
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('index')}}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$evento->Nombre}}</li>
  </ol>
</nav>
          
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="/storage/{{$lista->E_Logo}}" alt=""/>
                            
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        {{$lista->E_Nombre}}
                                    </h5>
                                    <h6>
                                       Equipo Deportivo
                                    </h6>
                                   {{--  <p class="proile-rating">ligas activas : <span>{{$ligas}}</span></p> --}}
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Información del equipo</a>
                                </li>
                             <li >
                    </li>
              </li>

                            </ul>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                          {{--  <div class="profile-work">
                          <h1>Descripción</h1>
                           <p>{{$evento->Descripcion}}</p>
                        </div> --}}
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                               <div {{-- class="tab-pane fade show active" id="home" role="tabpanel" --}} aria-labelledby="home-tab">            
                                         
                                         <div class="row">
                                            <div class="col-md-6">
                                                <label>Categoria:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$evento->categoria->Categorias}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Modalidad:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$evento->modalidad->Modalidad}}</p>
                                            </div>
                                        </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </form>           
        </div>
<hr class="featurette-divider">

    <!-- SECTION -->
    <section id="team" class="pb-5">
    <div class="container">
        <h5 class="section-title h1">Equipos Registrados</h5>   
    </div>
    <hr class="featurette-divider">
  <div class="row sm-gutter">
    <div class="row">
        @foreach($jugadors as $jugador)
        <div class="mio">
            <div class="col-sm-4 "> 
                
                    <div class="card card-price">
                        <div class="card-img">
                            <a href="#">
                            <img id="xxdd" src="/storage/{{$jugador->Pa_img}}" class="img-responsive">
                            <div class="card-caption">
                                <span class="h2 borde">{!! $jugador->Pa_Nombre !!}</span>
                                <p class="h3 borde">{!! $jugador->Pa_Apellido !!}</p>
                            </div>
                            </a>
                        </div>
                        <div class="card-body">
                            <ul class="details">
                            </ul>
                            <table class="table">
                            <tr>
                              <th></th>
                              <th>Amarillas</th>
                              <th>Rojas</th></tr>
                            <tr>
                            <td>Tarjetas</td>
                            <td class="price">{!! $jugador->Ju_AmarillaActivas !!}</td>
                            <td class="price">{!! $jugador->Ju_RojasActivas !!}</td></tr>
                            <tr><td>Acumuladas</td>
                              <td class="price">{!! $jugador->Ju_AmarillasAcumuladas !!}</td>
                              <td class="price">{!! $jugador->Ju_RojaAcumuladas !!}</td></tr>
                            <tr>
                            <th>Posición</th>
                            <th>Número</th>
                            <th>Goles</th>
                            </tr>
                            <tr><td>{!! $jugador->Ju_Posicion !!}</td><td class="price">{!! $jugador->Ju_Numero !!}</td>
                            <td class="price">{!! $jugador->Ju_CantidadGoles !!}</td></tr>                             
                            <tr>
                            </table>             
                                            
                      </div>
                 </div>
            </div>
        </div>
        @endforeach
  
      </div>

            </div>
                   {!! $jugadors->render() !!}
</section>
<!-- Team -->
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <div class="col-md-12">
            <div class="hot-deal">
              <ul class="hot-deal-countdown">
                <li>
                  <div>
                    <h3>{{$cantidad}}</h3>
                    <span>Campeonatos</span>
                  </div>
                </li>
                <li>
                  <div>
                    <h3>{{$equipos}}</h3>
                    <span>Equipos</span>
                  </div>
                </li>
                <li>
                  <div>
                    <h3>{{$jugadores }}</h3>
                    <span>Jugadores</span>
                  </div>
                </li>
                
              </ul>
              
            
            </div>
          </div>
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->

    <!-- /SECTION -->

    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <div class="col-md-12">
            <div class="newsletter">
              <p>visítanos en nuestras <strong>Redes sociales</strong></p>
              <ul class="newsletter-follow">
                <li>
                  <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-instagram"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-pinterest"></i></a>
                </li>

                <li>
                  {{-- <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Ftercertiempo.club%2FLogin%2Fpublic%2Findex&layout=button_count&size=small&appId=259367744717308&width=91&height=20" width="91" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe> --}}
                  <div class="fb-share-button" data-href="http://tercertiempo.club/Login/public/index" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Ftercertiempo.club%2FLogin%2Fpublic%2Findex&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->
<footer id="footer">
      <!-- top footer -->
      <div class="section">
        <!-- container -->
        <div class="container">
          <!-- row -->
          <div class="row">
            <center >
            <div style= " margin-left: 450px;" class="col-md-3 col-xs-6">
              <div style= " text-align: center;" class="footer">
                <h3 class="footer-title">Acerca de nosotros</h3>
                <p>Somos una plataforma tecnológica desdicada a la administración de eventos deportivos e forma ágil desde cualquier parte del país</p>
                <ul style= " text-align: center;" class="footer-links">
                  <li><a href="#"><i class="fa fa-map-marker"></i>1734 Conchalí</a></li>
                  <li><a href="#"><i class="fa fa-phone"></i>+56961746265</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i>tercertiempopro@gmail.com</a></li>
                </ul>
              </div>
            </div>

          </center>

            <div class="clearfix visible-xs"></div>
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
      </div>
      <!-- /top footer -->

      <!-- bottom footer -->
      <div id="bottom-footer" class="section">
        <div class="container">
          <!-- row -->
          <div class="row">
            <div class="col-md-12 text-center">
              <ul class="footer-payments">
                <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
              </ul>
              <span class="copyright">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i  aria-hidden="true"></i>              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </span>
            </div>
          </div>
            <!-- /row -->
        </div>
        <!-- /container -->
      </div>

      <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
        <script src="{{asset('/Home/js/jquery.min.js')}}"></script>
        <script src="{{asset('/Home/js/bootstrap.min.js')}}"></script>
          <script src="{{asset('/Home/js/slick.min.js')}}"></script>
          <script src="{{asset('/Home/js/nouislider.min.js')}}"></script>
          <script src="{{asset('/Home/js/jquery.zoom.min.js')}}"></script>
          <script src="{{asset('/Home/js/main.js')}}"></script>
          <script src="{{ asset('/js/regioncomuna.js') }}" type="text/javascript"></script>

  
  </body>
</html>
