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
						<li><a href="{{route('registrar')}}">Registrar</a></li>					
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
                            <img src="/storage/{{$evento->Fotografia}}" alt=""/>
                            
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        {{$evento->Nombre}}
                                    </h5>
                                    <h6>
                                       Evento Deportivo
                                    </h6>
                                   {{--  <p class="proile-rating">ligas activas : <span>{{$ligas}}</span></p> --}}
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Información del evento</a>
                                </li>
                             <li >
<div class="fb-share-button" data-href="http://tercertiempo.club/Login/public/Campeonato/{{$crip}}"data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Ftercertiempo.club%2FLogin%2Fpublic%2Findex&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
</li>
                </li>

                            </ul>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                               <div {{-- class="tab-pane fade show active" id="home" role="tabpanel" --}} aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nombre organizador:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$evento->user->Nombres}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Región:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$evento->Region}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Comuna:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$evento->Comuna}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Dirección</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$evento->Direccion}}</p>
                                            </div>
                                        </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                                <label>Correo:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$evento->user->email}}</p>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                                <label>Categoria:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$evento->categoria->Categorias}}</p>
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
<div class="form-group row">
	    {!! Form::open(['route'=>['Campeonato', Crypt::encrypt($evento->id)],'class'=> 'form-inline', 'method' => 'GET']) !!}
      
      
      <div class="col-xs-3">
         <input class="w3-input w3-border col-xs-2"  name="E_Nombre" placeholder="Buscar Evento">
      </div>
  	     <button type="submit" class="btn btn-default">Buscar</button>
 {!!Form::close()!!}
                       
</div>
        <div class="row">
            <!-- Team membher -->

@if(count($lista) > 0)
 @foreach($lista as $listas)
 <?php $estado = array($listas) ?>
 <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src= "/storage/{{$listas->E_Logo}}" alt="card image"></p>
                                    <h4 class="card-title">{{$listas->E_Nombre}}</h4>
                                   
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Información:</h4>
                                    <p class="card-text">puntos: {{$listas->E_puntuacion}}</p>
                                   
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                              <a href="{{route('Equipo', array(Crypt::encrypt($listas->id), $evento->id))}}" class="btn btn-primary">ver perfil</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
  
    @else
    <div class="alert alert-warning">
        <strong>Lo siento!</strong> no se ha encontrado campeonatos.
    </div> 

@endif
             

        </div>
         {!! $lista->render() !!}
    </div>
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
										<h3>{{-- {{$cantidad}} --}}</h3>
										<span>Campeonatos</span>
									</div>
								</li>
								<li>
									<div>
										<h3>{{-- s --}}</h3>
										<span>Equipos</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
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
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
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
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">View Cart</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
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
						{{-- 	<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span> --}}
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
