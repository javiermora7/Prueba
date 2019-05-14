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

  <!-- Portfolio Item Heading -->
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
  <h3 class="my-4">Related Projects</h3>

  <div class="row">

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
    </div>

  </div>
  <!-- /.row -->

</div>

   <div class="form-group">
<div class="oscurecer" id="oscurecer"></div>
  <div class="registrar" id="registrar">
    <h1>Registro</h1>
   <section class="container">
    
    
{!! Form::open(['route'=> 'users.store','id'=> 'signupForm', 'enctype'=>'multipart/form-data' , 'class'=>'form-horizontal','method' => 'POST']) !!}

<article class="form-group">
    {!! Form::label('NombreCampeonato', 'Nombre de campeonato')!!}
    {!! Form::text('NombreCampeonato', null, ['class'=>'form-control', 'required', 'placeholder'=>'Nombre de campeonato'])!!}
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
   <select class="form-control" id="regiones"></select>
</article>
<article class="form-group">
  <select class="form-control" id="comunas"></select>
</article>
<article class="form-group">
    {!! Form::label('descripcion', 'descripción')!!}
    {!! Form::textarea('descripcion', null, ['class'=>'form-control', 'required', 'placeholder'=>'Ingrese descripcion'])!!}
</article>
 

<article class="form-group">
    {!! Form::label('file', 'Seleccione una foto')!!}
    {!! Form::file('file', null, ['class'=>'form-control', 'type'=>'file','accept'=>'pdf,.jpg,.png', 'placeholder'=>'Ingrese razon social'])!!}
</article>

<article class="form-group">
    {!! Form::label('categoria', 'Categoria del campeonato')!!}
    {!! Form::select('categoria', [''=>'Seleccione categoria', 'juvenil'=>'juvenil', 'supersenior'=>'super senior'], null, ['class'=>'form-control'])!!}
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
    {!! Form::label('modalidad', 'Modalidad')!!}
    {!! Form::text('modalidad', null, ['class'=>'form-control', 'required', 'placeholder'=>'ingrese modalidad'])!!}
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
