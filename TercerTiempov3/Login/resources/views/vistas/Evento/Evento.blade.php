@extends('vistas.layouts.LayoutsEventos.LayoutEvento')
@section('title')
Perfil
@endsection
@section('content')


<body id="page-top">
  @include('vistas.layouts.NavAdmin')

<div id="wrapper">
    @include('vistas.layouts.LayoutsEventos.SideEvento')
<div class="container">
  <h1 class="my-4">Nombre evento</h1>

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-5">
      <img class="img-fluid" src="http://placehold.it/750x500" alt="">
    </div>

    <div class="col-md-6">
      
      <h3 class="my-3">Información personal</h3>
      <ul>

        <li>Nombre organizador:  </li>
        <li>Tipo de deporte: </li>
        <li>Región:  </li>
        <li>Comuna:  </li>
        <li>Dirección:  </li>
        <li>Correo:</li>

        
      </ul>
    </div> 

  </div>
  <hr style="  border-width: 3px; background-color:  black;">
<div class="cards">

  <div class="card" style="width: 18rem;">
  <img id="xxdd" class="card-img-top" src="https://www.audaxitaliano.cl/wp-content/uploads/2015/06/21-250x250.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Nombre del equipo</h5>
     <p class="card-text">informacion del equipo</p>
    <a href="#" class="btn btn-primary">ver perfil</a>
  </div>
</div>

   <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="http://static.t13.cl/images/sizes/1200x675/1471989033-auno357508.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Nombre del equipo</h5>
    <p class="card-text">informacion del equipo</p>
    <a href="#" class="btn btn-primary">ver perfil</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img id="xxdd" class="card-img-top" src="https://www.audaxitaliano.cl/wp-content/uploads/2015/06/21-250x250.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Nombre del equipo</h5>
     <p class="card-text">informacion del equipo</p>
    <a href="#" class="btn btn-primary">ver perfil</a>
  </div>
</div>

</div>
  
</div>
</body>
@endsection
