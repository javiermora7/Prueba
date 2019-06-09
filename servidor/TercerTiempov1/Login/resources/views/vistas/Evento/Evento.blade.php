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

   <section  class="container">
    

    <h1>Registro de equipo</h1>
    
{!! Form::open(['route'=> 'equipo.store','id'=> 'CrearEvento', 'enctype'=>'multipart/form-data' , 'class'=>'form-horizontal','method' => 'POST']) !!}

    <div class="form-group">
                  
              <div class="col-md-9">
      <article class="col-md-6">
      {!! Form::label('E_Nombre', 'Nombre del equipo')!!}
      {!! Form::text('E_Nombre', null, ['class'=>'form-control', 'required', 'placeholder'=>'ingrese nombre del equipo'])!!}
     </article>
              </div>
              <div class="col-md-6">
     <article class="col-md-9">
     {!! Form::label('E_Logo[]', 'Seleccione logo ')!!}
     {!! Form::file('E_Logo[]', null, ['class'=>'form-control', 'type'=>'file','accept'=>'jpg,.png', 'placeholder'=>''])!!}
     </article>
              </div>
         
     </div>
  <input id="Evento_id" name="Evento_id" type="hidden" value={{$evento->id}}>
     <article class="form-group">  
     {!! Form::submit('Crear', ['class'=>'btn btn-primary crear'])!!}     
     </article>

{!! Form::close()!!}
</section>

<div class="row">
  
 @foreach($lista as $listas)
       
<div class="cards">

  <div class="" style="width: 18rem;">
  <img id="xxdd" class="card-img-top" src= "/storage/{{$listas->E_Logo}}">
  <div class="card-body">
    <h5 class="card-title">{{$listas->id}}</h5>
     <p class="card-text">{{$listas->E_Nombre}}</p>
    <a href="{{route('VerificarPerfilEquipo', array(Crypt::encrypt($listas->id), $evento->id))}}" class="btn btn-primary">ver perfil</a>
  </div>
</div>

 
</div>


    @endforeach
  

</div>

  {!! $lista->render() !!}





</body>
@endsection
