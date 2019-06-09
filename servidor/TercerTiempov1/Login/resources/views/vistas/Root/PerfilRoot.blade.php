@extends('vistas.layouts.LayoutAdmin')
@section('title')
Perfil
@endsection
@section('content')




<body id="page-top">
  @include('vistas.layouts.NavAdmin')

<div id="wrapper">
    @include('vistas.layouts.NavSideBar')

{{--<a href="{{route('categoria')}}" class="btn btn-info" >Agregar Categoria</a>
 </section>--}}
<br>

<div class="container">

   @include('flash::message')
  <h1 class="my-4"> </h1>

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-5">
      <img class="img-fluid" src="http://placehold.it/750x500" alt="">
    </div>

    <div class="col-md-6">
      
      <h3 class="my-3">Información personal</h3>
      <ul>

        <li>Nombre: <label>{{ $user->Nombres}}</label> </li>
        <li>Correo: <label>{{ $user->email}}</label></li>
        <li>Telefono: <label>{{ $user->Telefono}}</label></li>
        <li>tipo: <label>{{ $user->tipousuario->TipoUsuario}}</label></li>
        <li>estado: <label>{{ $user->estadoactivo->Estado}}</label></li>
        
      </ul>
    </div>

  </div>
 <hr style="  border-width: 3px; background-color:  black;">


  <div class="table-responsive-sm">
    <table class="table table-sm " id="tabla" >
    
    <hr style="  border-width: 3px; background-color:  black;">
  <thead class="thead-dark">
    <tr id="mitabla">
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
       <th scope="col">Estado</th>
      <th scope="col">Cant.Campeonatos</th>
      <th scope="col"></th>
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
    
  @foreach($listauser as $listausers)
         <tr id="mitabla2">
            <td>{{$listausers->id}}</td>
            <td>{{$listausers->Nombres}}</td>
            <td>{{$listausers->Apellidos}}</td>
            <td>{{$listausers->estado}}</td>
            <td>{{$listausers->eventos}}</td>
            
            
            <td><a class="btn btn-warning btn-sm" href="#"  >editar</a></td>
            <td><a class="btn btn-danger btn-sm" href="#" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" >eliminar</a></td>
        </tr>

    @endforeach
   
  </tbody>
</table>
</div>




</div>

   

 </div>
{{--{!! $lista->render() !!}--}}

</body>
@endsection
