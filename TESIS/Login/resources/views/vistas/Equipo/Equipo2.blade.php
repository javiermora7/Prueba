@extends('vistas.layouts.LayoutsEventos.LayoutEvento')
@section('title')
Perfil
@endsection
@section('content')


<body id="page-top">
  @include('vistas.layouts.LayoutsEventos.NavEvento')

<div id="wrapper">
    @include('vistas.layouts.LayoutsEventos.SideEvento')
<div class="container">
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
      <li><h3>estado 2: {{$lista->EstadosActivo_id}}</h3> </li>
        <hr>      
        <li><a href="{{route('editEquipo', array(Crypt::encrypt($lista->id), $evento->id))}}" class="btn btn-primary btn-sm">Editar equipo</a></li>
        <hr>
        <li><a href="{{route('DeleteEquipo', array(Crypt::encrypt($lista->id), $evento->id))}}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" class="btn btn-danger btn-sm">Eliminar equipo</a></li>
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
      <th scope="col">Editar</th>
      <th scope="col">eliminar</th>
      <th scope="col">agregar resultado</th>

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
            <td><a class="btn btn-warning btn-sm" href="#"  >editar</a></td>
            <td><a class="btn btn-danger btn-sm" href="#" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" >eliminar</a></td>
            <td><a class="btn btn-danger btn-sm" href="#" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" >agregar</a></td>
        </tr>
 
   
  </tbody>
</table>
</div>

</body>
@endsection
