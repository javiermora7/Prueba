@extends('vistas.layouts.LayoutsCibernauta.LayoutIndex')
@section('title')
Perfil
@endsection
@section('content')


<body id="page-top">
 @include('vistas.layouts.LayoutsCibernauta.LayoutNav')
<div id="wrapper">
    
<div class="container">
  <br>
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('index')}}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$evento->Nombre}}</li>
  </ol>
</nav>
   @include('flash::message')
  <h1 class="my-4">{{$evento->Nombre}}</h1>

  <!-- Portfolio Item Row -->
  <div class="row">


    <div class="col-md-5">
      <img class="img-fluid" src="/storage/{{$evento->Fotografia}}" alt="">
    </div>

    <div class="col-md-6">
      
      <h3 class="my-3">Información del evento</h3>
      <ul>
     
        <li>Nombre organizador: {{$evento->user->Nombres}} </li>
        <li>Región: {{$evento->Region}} </li>
        <li>Comuna: {{$evento->Comuna}} </li>
        <li>Dirección: {{$evento->Direccion}} </li>
        <li>Correo: {{$evento->user->email}}</li>
        <li>Categoria: {{$evento->categoria->Categorias}}</li>
        <li>Modalidad: {{$evento->modalidad->Modalidad}}</li>
        <li>Estado: {{$evento->estadoactivo->Estado}}</li>
      </ul>
    </div> 

  </div>
  <hr style="  border-width: 3px; background-color:  black;">


<div class="row">
  
 @foreach($lista as $listas)
       
<div class="cards">

  <div class="" style="width: 18rem;">
  <img id="xxdd" class="card-img-top" src= "/storage/{{$listas->E_Logo}}">
  <div class="card-body">
    <h5 class="card-title">{{$listas->id}}</h5>
     <p class="card-text">{{$listas->E_Nombre}}</p>
    <a href="{{route('Equipo', array(Crypt::encrypt($listas->id), $evento->id))}}" class="btn btn-primary">ver perfil</a>
  </div>
</div>

 
</div>


    @endforeach
  

</div>

  {!! $lista->render() !!}





</body>
@endsection
