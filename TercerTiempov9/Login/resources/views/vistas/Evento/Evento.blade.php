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
        <li>Estado: {{$evento->estadoactivo->Estado}}</li>
      </ul>
    </div> 

  </div>
  <hr style="  border-width: 3px; background-color:  black;">

 <button type="button" id="activarRegistro" class="btn btn-primary btn-lg btn-block">Agregar Equipo</button>
  <div class="row">



 @foreach($lista as $listas)
       
<div class="cards">

  <div class="" style="width: 18rem;">
  <img id="xxdd" class="card-img-top" src= "/storage/{{$listas->E_Logo}}">
  <div class="card-body">
    <h5 class="card-title">{{$listas->id}}</h5>
     <p class="card-text">{{$listas->E_Nombre}}</p>
    <a href="#" class="btn btn-primary">ver perfil</a>
  </div>
</div>

 
</div>


    @endforeach
  

</div>

  {!! $lista->render() !!}


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
<input id="" name="prodId" type="hidden" value={{$evento->id}}>

<article class="form-group">
    
    {!! Form::submit('Cancelar', ['class'=>'btn btn-primary', 'id'=>'salir'])!!}
    
     
</article>



{!! Form::close()!!}


</section>



</div>
</body>
@endsection
