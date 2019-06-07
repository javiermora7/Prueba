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
  <h1 class="my-4">bienvenido {{ $user->Nombres}} </h1>

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-5">
      <img class="img-fluid" src="http://placehold.it/750x500" alt="">
    </div>

    <div class="col-md-6">
      
      <h3 class="my-3">Información personal</h3>
      <ul>

       
        <li>Correo: <label>{{ $user->email}}</label></li>
        <li>Telefono: <label>{{ $user->Telefono}}</label></li>
        <li>tipo: <label>{{ $user->tipousuario->TipoUsuario}}</label></li>
        <li>estado: <label>{{ $user->estadoactivo->Estado}}</label></li>
        
      </ul>
    </div>

   

  </div>
 <hr style="  border-width: 3px; background-color:  black;">

  <!-- Related Projects Row -->
  <h3 class="my-4">Ligas Registradas</h3>

  <div class="row">


 @foreach($campeonato as $campeonatos)
       
<div class="cards">

  <div class="" style="width: 18rem;">
  <img id="xxdd" class="card-img-top" src= "/storage/{{$campeonatos->Fotografia}}">
  <div class="card-body">
    <h5 class="card-title">{{$campeonatos->id}}</h5>
     <p class="card-text">{{$campeonatos->Nombre}}</p>
    <?php $estado = array($campeonatos) ?>
   
    @if($estado[0]->EstadosActivo_id == 2) 
    <a href="{{route('VerificarPerfilEvento', Crypt::encrypt($campeonatos->id))}}" class="btn btn-primary">ver perfil</a>
    @elseif($estado[0]->EstadosActivo_id == 1) 
    <a href="http://127.0.0.1:8000/khipu/{{$campeonatos->id}}" value="{{$campeonatos->id}}" class="btn btn-warning activar">activar</a>
    @elseif($estado[0]->EstadosActivo_id == 3) 
  <a href="http://127.0.0.1:8000/khipu/{{$campeonatos->id}}" value="{{$campeonatos->id}}" class="btn btn-danger pagar">Pagar Eventor</a>
    @endif
  </div>
</div>
</div>


    @endforeach
  
  </div>
    {!! $campeonato->render() !!}
  <!-- /.row j.-->

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
    {!! Form::label('Cupos', 'Cupos de participantes')!!}
    {!! Form::number('Cupos', null, ['class'=>'form-control', 'required', 'placeholder'=>'ingrese cupos'])!!}
</article>

<article class="form-group">
   <select name='Region' class="form-control" id="regiones" required=""></select>
</article>
<article class="form-group">
  <select  name='Comuna' class="form-control" id="comunas" required=""></select>
</article>
<article class="form-group">
    {!! Form::label('Descripcion', 'descripción')!!}
    {!! Form::textarea('Descripcion', null, ['class'=>'form-control', 'required', 'placeholder'=>'Ingrese descripcion'])!!}
</article>
 

<article class="form-group">
    {!! Form::label('Fotografia[]', 'Seleccione una foto')!!}
    {!! Form::file('Fotografia[]', null, ['class'=>'form-control', 'type'=>'file','accept'=>'jpg,.png', 'placeholder'=>''])!!}
</article>

<article class="form-group">
    {!! Form::label('Categorias_id', 'Categoria del campeonato')!!}
    {!! Form::select('Categorias_id', $categoria  ,null, ['class'=>'form-control', 'required', 'placeholder'=>'Seleccione una categoria'])!!}

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
    {!! Form::label('Modalidad_id', 'Modalidad del campeonato')!!}
    {!! Form::select('Modalidad_id', $modalidad  ,null, ['class'=>'form-control', 'required', 'placeholder'=>'Seleccione una modalidad'])!!}

</article>

<input id="" name="users_id" type="hidden" value={{ Auth::user()->id}}>
<input id="" name="EstadosActivo_id" type="hidden" value="2">

<article class="form-group">
    
    {!! Form::submit('Crear', ['class'=>'btn btn-primary btn-lg btn-block crear',])!!}
    
    
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
