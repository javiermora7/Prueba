@extends('vistas.layouts.LayoutAdmin')
@section('title')
Perfil
@endsection
@section('content')

{{--<section class="chapa">
  Nombre: <label>{{ $prueba->name}}</label> jona aca recibo el parametro prueba y llamo lo que quiera, en este aso la el nombre de la sesion
<hr>
   tipo: <label>{{ $prueba->tipousuario->TipoUsuario}}</label><!aca hago la relacion con
   la tabla TipoUsuario, rescato el nombre y no la id, $prueba es el parametro que mande con el return, tipousuario el parametro que cree antes de mandar($user ->tipousuario()) y TipoUsuario es el nombre de la columna en la tabla de tipo de usuario

  <hr>
 Correo: <label>{{ $prueba->email}}</label>

   <hr>
Telefono: <label>{{ $prueba->Telefono}}</label><br>
<hr>--}}
<!--de aca empieza el formulario obviamente hay que listar cuando hayan eventos registrados -->

<body id="page-top">
  @include('vistas.layouts.NavAdmin')

<div id="wrapper">
    @include('vistas.layouts.NavSideBar')

{{--<a href="{{route('categoria')}}" class="btn btn-info" >Agregar Categoria</a>
 </section>--}}
<br>

<div class="container">

   @include('flash::message')
  <h1 class="my-4">Nombre del </h1>

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-5">
      <img class="img-fluid" src="http://placehold.it/750x500" alt="">
    </div>

    <div class="col-md-6">
      
      <h3 class="my-3">Información personal</h3>
      <ul>

        <li>Nombre: <label>{{ $prueba->Nombres}}</label> </li>
        <li>Correo: <label>{{ $prueba->email}}</label></li>
        <li>Telefono: <label>{{ $prueba->Telefono}}</label></li>
        <li>tipo: <label>{{ $prueba->tipousuario->TipoUsuario}}</label></li>
        <li>tipo: <label>{{ $prueba->estadoactivo->Estado}}</label></li>
        
      </ul>
    </div>

    

  </div>
  <!-- /.row -->

  <!-- Related Projects Row -->
  <h3 class="my-4">Ligas Registradas</h3>

  <div class="row">


 @foreach($lista as $lista)
       
<div class="cards">

  <div class="" style="width: 18rem;">
  <img id="xxdd" class="card-img-top" src= "/storage/{{$lista->Fotografia}}">
  <div class="card-body">
    <h5 class="card-title">{{$lista->id}}</h5>
     <p class="card-text">{{$lista->Nombre}}</p>
    <a href="{{route('VerificarPerfilEvento', Crypt::encrypt($lista->id))}}" class="btn btn-primary">ver perfil</a>
  </div>
</div>

 
</div>


    @endforeach
  
  </div>
  <!-- /.row j-->

</div>

   <div class="form-group">
<div class="oscurecer" id="oscurecer"></div>
  <div class="registrar" id="registrar">
    <h1>Registro</h1>
   <section class="container">
    
    
{!! Form::open(['route'=> 'campeonato.store','id'=> 'signupForm', 'enctype'=>'multipart/form-data' , 'class'=>'form-horizontal','method' => 'POST']) !!}

<article class="form-group">
    {!! Form::label('Nombre', 'Nombre de campeonato')!!}
    {!! Form::text('Nombre', null, ['class'=>'form-control', 'required', 'placeholder'=>'Nombre de campeonato'])!!}
</article>

<article class="form-group">
    {!! Form::label('Direccion', 'Direccion')!!}
    {!! Form::text('Direccion', null, ['class'=>'form-control', 'required', 'placeholder'=>'Direccion'])!!}
</article>

<article class="form-group">
    {!! Form::label('FechaInicio', 'Fecha de Inicio de campeonato')!!}
    {!! Form::date('FechaInicio', null, ['class'=>'form-control', 'required', 'placeholder'=>'**/**/****'])!!}
</article>


<article class="form-group">
    {!! Form::label('Cupo', 'Cupos de participantes')!!}
    {!! Form::number('Cupo', null, ['class'=>'form-control', 'required', 'placeholder'=>'ingrese cupos'])!!}
</article>

<article class="form-group">
   <select name='Region' class="form-control" id="regiones" required=""></select>
</article>
<article class="form-group">
  <select  name='Comuna' class="form-control" id="comunas" required=""></select>
</article>
<article class="form-group">
    {!! Form::label('descripcion', 'descripción')!!}
    {!! Form::textarea('descripcion', null, ['class'=>'form-control', 'required', 'placeholder'=>'Ingrese descripcion'])!!}
</article>
 

<article class="form-group">
    {!! Form::label('Fotografia[]', 'Seleccione una foto')!!}
    {!! Form::file('Fotografia[]', null, ['class'=>'form-control', 'type'=>'file','accept'=>'jpg,.png', 'placeholder'=>''])!!}
</article>

<article class="form-group">
    {!! Form::label('categoria', 'Categoria del campeonato')!!}
    {!! Form::select('categoria', $categoria  ,null, ['class'=>'form-control', 'required', 'placeholder'=>'Seleccione una categoria'])!!}

</article>

<article class="form-group">
    {!! Form::label('RangoEdadMin', 'Edad mínima')!!}
    {!! Form::number('RangoEdadMin', null, ['class'=>'form-control', 'required', 'placeholder'=>'ingrese la edad minima para participar'])!!}
</article>

<article class="form-group">
    {!! Form::label('RangoEdadMax', 'Edad máxima')!!}
    {!! Form::number('RangoEdadMax', null, ['class'=>'form-control', 'required', 'placeholder'=>'ingrese la edad máxima para participar'])!!}
</article>


<article class="form-group">
    {!! Form::label('modalida', 'Modalidad del campeonato')!!}
    {!! Form::select('modalida', $modalidad  ,null, ['class'=>'form-control', 'required', 'placeholder'=>'Seleccione una modalidad'])!!}

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
</div>

 </div>
{{--{!! $lista->render() !!}--}}

</body>
@endsection
