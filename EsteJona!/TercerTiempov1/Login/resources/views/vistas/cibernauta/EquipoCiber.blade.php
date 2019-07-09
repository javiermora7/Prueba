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
    <li class="breadcrumb-item"><a href="{{ URL::previous() }}">{{$evento->Nombre}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$lista->E_Nombre}}</li>
  </ol>
</nav>
   @include('flash::message')
  <h1 class="my-4">Liga: {{$evento->user->Nombres}} </h1>
  <!-- Portfolio Item Row -->
   <div class="row">
      <div class="col-md-5">
      <img class="img-fluid" src="/storage/{{$lista->E_Logo}}" alt="">
    </div>
    <div class="col-md-6"> 
      <h3 class="my-3">Información del equipo</h3>
      <ul>
        <li><h3>Equipo: {{$lista->E_Nombre}}</h3> </li>

        <hr>      
       
      </ul>
    </div> 
  </div>  
  <hr style="  border-width: 3px; background-color:  black;">
 <div class="table-responsive-sm">
    <table class="table table-sm " id="tabla" >
<hr style="  border-width: 3px; background-color:  black;">
  <thead class="thead-dark">
    <tr id="mitabla">
      <th scope="col">Fecha</th>
      <th scope="col">Horario</th>
      <th scope="col">Cancha</th>
      <th scope="col">Equipo 1</th>
      <th scope="col">Equipo 2</th>
      <th scope="col">Estado</th>
     

    </tr>
  </thead>
  <tbody>
    
        <tr id="mitabla2">
          <td>Fecha 1</td>
         <td>22/08/2019</td>
         <td>4</td>
        <td>los robles FC</td>
          <td>Pacifico city LR</td>
          <td>pendiente</td>
           
        </tr>
 
   
  </tbody>
</table>
</div>

</body>
@endsection
