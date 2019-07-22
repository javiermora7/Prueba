@extends('vistas.layouts.LayoutsCibernauta.LayoutIndex')
@section('title')
Perfil
@endsection
@section('content')


<body id="page-top" style="background-color: #CBC8C1;" >
  <main role="main"  >

  @include('vistas.layouts.LayoutsCibernauta.LayoutNav')
  <br>
  <div id="wrapper">
<br>
<div class="container" style="background-color: white;border: 1px solid #FFF;">
<br>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="http://triunfo.lanacion.cl/wp-content/uploads/sites/2/2019/04/f1.jpg" alt="First slide">
  <div class="carousel-caption d-none d-md-block">
   <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etiqueta de la segunda diapositiva</font></font>
   </h5>
   <p><font style="vertical-align: inherit;">
    <font style="vertical-align: inherit;">Lorem ipsum dolor sit amet, consecte adipiscing elit.</font>
   </font></p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://static.puntoticket.com/images/eventos/byn048_md.jpg" alt="Second slide">
       <div class="carousel-caption d-none d-md-block">
   <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etiqueta de la segunda diapositiva</font></font>
   </h5>
   <p><font style="vertical-align: inherit;">
    <font style="vertical-align: inherit;">Lorem ipsum dolor sit amet, consecte adipiscing elit.</font>
   </font></p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://static.puntoticket.com/images/eventos/byn048_md.jpg" alt="Third slide">
       <div class="carousel-caption d-none d-md-block">
   <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etiqueta de la segunda diapositiva</font></font>
   </h5>
   <p><font style="vertical-align: inherit;">
    <font style="vertical-align: inherit;">Lorem ipsum dolor sit amet, consecte adipiscing elit.</font>
   </font></p>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

 <hr class="featurette-divider">


  <div class="row">


  
 @foreach($lista as $listas)
       
<div class="cards">

  <div class="" style="width: 18rem;">
  <img id="xxdd" class="card-img-top" src= "/storage/{{$listas->Fotografia}}">
  <div class="card-body">
    <h5 class="card-title">{{$listas->id}}</h5>
     <p class="card-text">{{$listas->Nombre}}</p>
    <a href="{{route('Campeonato', Crypt::encrypt($listas->id))}}" class="btn btn-primary">ver perfil</a>
  </div>
</div> 
</div>
    @endforeach
</div>
  {!! $lista->render() !!}
<hr class="featurette-divider">

</div>
 

 </div>

</div>

</main>

</body>
@endsection
