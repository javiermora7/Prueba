@extends('vistas.layouts.LayoutsFechas.LayoutFecha')
@section('title')
Encuentros
@endsection
@section('content')


<body id="page-top">
  @include('vistas.layouts.LayoutsEventos.NavEvento')

<div id="wrapper">
    @include('vistas.layouts.LayoutsEventos.SideEvento')
<div class="container">

  <h1 class="my-4">{{$evento->Nombre}}</h1>

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-5">
      <img class="img-fluid" src="/storage/{{$evento->Fotografia}}" alt="">
    </div>

    <div class="col-md-6">
      
      <h3 class="my-3">Información personal</h3>
      <ul>

        <li>Nombre organizador: {{$evento->user->Nombres}} </li>
        <li>Región: {{$evento->Region}} </li>
        <li>Comuna: {{$evento->Comuna}} </li>
        <li>Dirección: {{$evento->Direccion}} </li>
        <li>Correo: {{$evento->user->email}}</li>
        <li>Categoria: {{$evento->categoria->Categorias}}</li>
        <li>Modalidad: {{$evento->modalidad->Modalidad}}</li>

        
      </ul>

    </div> 

  </div>

  <hr style="  border-width: 3px; background-color:  black;">
  <div class="table-responsive-sm">
    <table class="table table-sm " id="tabla" >
     <button type="button" id="activarRegistro" class="btn btn-primary btn-lg btn-block">Agregar Fecha</button>

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

<!--modal-->

   <div class="form-group">
<div class="oscurecer" id="oscurecer"></div>
  <div class="registrar" id="registrar">
    <h1>Registro</h1>
   <section class="container">
    
       
{!! Form::open(['route'=> 'users.store','id'=> 'signupForm', 'method' => 'POST']) !!}

       
  <div class="container">
    <div class=" card-register mx-auto mt-5">
      <div class="card-header">Registro Fecha de encuentro</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-row">
              
              <div class="col-md-6">
    <article class="form-group">
    {!! Form::label('fecha', 'Fecha')!!}
    {!! Form::text('fecha', null, ['class'=>'form-control', 'required', 'placeholder'=>'número de fecha'])!!}
     </article>
              </div>

              <div class="col-md-6">
    <article class="form-group">
    {!! Form::label('horario', 'Horario')!!}
    {!! Form::date('horario', null, ['class'=>'form-control', 'required'])!!}
    </article>
              </div>
              </div>
          </div>
               <div class="col-md-10">
    <article class="form-group">
    {!! Form::label('cancha', 'Cancha')!!}
    {!! Form::number('cancha', null, ['class'=>'form-control', 'required', 'placeholder'=>'Número de cancha '])!!}
    </article>
              </div>

              <div class="col-md-10">
    <article class="form-group">
    {!! Form::label('equipo1', 'Equipo 1')!!}
    {!! Form::select('equipo1', [''=>'Seleccione equipo 1', 'juvenil'=>'juvenil', 'supersenior'=>'super senior'], null, ['class'=>'form-control'])!!}
</article>
              </div>

            
  

              <div class="col-md-10">
    <article class="form-group">
    {!! Form::label('equipo2', 'Equipo 2')!!}
    {!! Form::select('equipo2', [''=>'Seleccione equipo 2', 'juvenil'=>'juvenil', 'supersenior'=>'super senior'], null, ['class'=>'form-control'])!!}
</article>
              </div>

              <div class="col-md-10">
   <article class="form-group">
    {!! Form::label('estado', 'Estado')!!}
    {!! Form::select('estado', [''=>'Seleccione estado de la fecha', 'pendiente'=>'pendiente', 'finalizado'=>'finalizado', 'suspendido'=>'suspendido'], null, ['class'=>'form-control'])!!}
</article>
              </div>
               
              


           


              
    <article class="form-group">
    
    {!! Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}
    
     
</article>

<article class="form-group">
    
    {!! Form::submit('Cancelar', ['class'=>'btn btn-primary', 'id'=>'salir'])!!}
    
     
</article>

        </form>
        
      </div>
    </div>
  </div>
        

      

    {!!Form::close()!!}
</section>

  </div>
</div>


</body>
@endsection
