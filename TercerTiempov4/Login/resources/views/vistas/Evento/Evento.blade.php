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
  <h1 class="my-4">{{$producto->Nombre}}</h1>

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-5">
      <img class="img-fluid" src="http://placehold.it/750x500" alt="">
    </div>

    <div class="col-md-6">
      
      <h3 class="my-3">Información personal</h3>
      <ul>

        <li>Nombre organizador: {{$producto->user->Nombres}} </li>
        <li>Región: {{$producto->Region}} </li>
        <li>Comuna: {{$producto->Comuna}} </li>
        <li>Dirección: {{$producto->Direccion}} </li>
        <li>Correo:{{$producto->user->email}}</li>
          <li>Correo:{{$producto->categoria->Categorias}}</li>
 
        
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




   <div class="form-group">
<div class="oscurecer" id="oscurecer"></div>
  <div class="registrar" id="registrar">
    <h1>Registro de equipo</h1>
   <section class="container">
    
    
{!! Form::open(['route'=> 'equipo.store','id'=> 'signupForm', 'enctype'=>'multipart/form-data' , 'class'=>'form-horizontal','method' => 'POST']) !!}

<article class="form-group">
    {!! Form::label('E_Nombre', 'Nombre del equipo')!!}
    {!! Form::text('E_Nombre', null, ['class'=>'form-control', 'required', 'placeholder'=>'ingrese nombre del equipo'])!!}
</article>
<article class="form-group">
    {!! Form::label('E_Logo[]', 'Seleccione logo del equipo')!!}
    {!! Form::file('E_Logo[]', null, ['class'=>'form-control', 'type'=>'file','accept'=>'jpg,.png', 'placeholder'=>''])!!}
</article>

<article class="form-group">
    {!! Form::label('E_puntuacion', 'Puntos obtenidos')!!}
    {!! Form::number('E_puntuacion', null, ['class'=>'form-control', 'required', 'placeholder'=>'ingrese puntuaciòn'])!!}
</article>
<article class="form-group">
    {!! Form::label('E_PartidosJugados', 'Partidos jugados')!!}
    {!! Form::number('E_PartidosJugados', null, ['class'=>'form-control', 'required', 'placeholder'=>'ingrese partidos jugados'])!!}
</article>
<article class="form-group">
    {!! Form::label('E_PartidosGanados', 'Partidos ganados')!!}
    {!! Form::number('E_PartidosGanados', null, ['class'=>'form-control', 'required', 'placeholder'=>'ingrese partidos ganados'])!!}
</article>
<article class="form-group">
    {!! Form::label('E_PartidosPerdidos', 'Partidos perdidos')!!}
    {!! Form::number('E_PartidosPerdidos', null, ['class'=>'form-control', 'required', 'placeholder'=>'ingrese partidos perdidos'])!!}
</article>
<article class="form-group">
    {!! Form::label('E_PartidosEmpatados', 'Partidos empatados')!!}
    {!! Form::number('E_PartidosEmpatados', null, ['class'=>'form-control', 'required', 'placeholder'=>'ingrese partidos empatados'])!!}
</article>
<article class="form-group">
    {!! Form::label('E_GolesRealizados', 'goles realizados')!!}
    {!! Form::number('E_GolesRealizados', null, ['class'=>'form-control', 'required', 'placeholder'=>'ingrese goles realizados'])!!}
</article>
<article class="form-group">
    {!! Form::label('E_GolesContra', 'goles recibidos')!!}
    {!! Form::number('E_GolesContra', null, ['class'=>'form-control', 'required', 'placeholder'=>'ingrese goles recibidos'])!!}
</article>


<article class="form-group">
    
    {!! Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}
    
     
</article>

<article class="form-group">
    
    {!! Form::submit('Cancelar', ['class'=>'btn btn-primary', 'id'=>'salir'])!!}
    
     
</article>



{!! Form::close()!!}


</section>



</div>
</body>
@endsection
