@extends('vistas.layouts.LayoutsEventos.LayoutEvento')
@section('title')
Editar
@endsection
@section('content')


<body id="page-top">
  @include('vistas.layouts.LayoutsEventos.NavEvento')

<div id="wrapper">
    @include('vistas.layouts.LayoutsEventos.SideEvento')
<div class="container">


   
    <h1>Editar Evento</h1>
   <section class="container">
    
    
{!! Form::open(['route'=>['campeonato.update',$evento, Crypt::encrypt($evento->id)],'id'=> 'signupForm', 'enctype'=>'multipart/form-data' , 'class'=>'form-horizontal','method' => 'PUT']) !!}

<article class="form-group">
    {!! Form::label('Nombre', 'Nombre de campeonato')!!}
    {!! Form::text('Nombre', $evento->Nombre, ['class'=>'form-control', 'required', 'placeholder'=>'Nombre de campeonato'])!!}
</article>

<article class="form-group">
    {!! Form::label('Direccion', 'Direccion')!!}
    {!! Form::text('Direccion', $evento->Direccion, ['class'=>'form-control', 'required', 'placeholder'=>'Direccion'])!!}
</article>

<article class="form-group">
    {!! Form::label('FechaInicio', 'Fecha de Inicio de campeonato')!!}
    {!! Form::date('FechaInicio', $evento->FechaInicio, ['class'=>'form-control', 'required', 'placeholder'=>'**/**/****'])!!}
</article>


<article class="form-group">
    {!! Form::label('Cupo', 'Cupos de participantes')!!}
    {!! Form::number('Cupo', $evento->Cupos, ['class'=>'form-control', 'required', 'placeholder'=>'ingrese cupos'])!!}
</article>

<article class="form-group">
  <label>Región registrada: {{$evento->Region}}</label>
   <select name='Region'  class="form-control" id="regiones" ></select>
</article>

<article class="form-group">
  <label>Comuna registrada: {{$evento->Comuna}}</label>
  <select  name='Comuna' class="form-control" id="comunas" ></select>
</article>
<article class="form-group">
    {!! Form::label('descripcion', 'descripción')!!}
    {!! Form::textarea('descripcion', $evento->Descripcion, ['class'=>'form-control', 'required', 'placeholder'=>'Ingrese descripcion'])!!}
</article>
 

<article class="form-group">
    {!! Form::label('Fotografia[]', 'Seleccione nueva foto')!!}
    {!! Form::file('Fotografia[]', null, ['class'=>'form-control', 'type'=>'file','accept'=>'jpg,.png', 'placeholder'=>''])!!}
</article>

<article class="form-group">
    {!! Form::label('categoria', 'Categoria del campeonato registrada:')!!} {{$evento->categoria->Categorias}}
    {!! Form::select('categoria', $categoria  ,null, ['class'=>'form-control', 'placeholder'=>'Seleccione una categoria'])!!}

</article>

<article class="form-group">
    {!! Form::label('RangoEdadMin', 'Edad mínima')!!}
    {!! Form::number('RangoEdadMin', $evento->RangoEdadMin, ['class'=>'form-control', 'required', 'placeholder'=>'ingrese la edad minima para participar'])!!}
</article>

<article class="form-group">
    {!! Form::label('RangoEdadMax', 'Edad máxima')!!}
    {!! Form::number('RangoEdadMax', $evento->RangoEdadMax, ['class'=>'form-control', 'required', 'placeholder'=>'ingrese la edad máxima para participar'])!!}
</article>


<article class="form-group">
    {!! Form::label('modalida', 'Modalidad del campeonato')!!}
    {!! Form::select('modalida', $modalidad  ,null, ['class'=>'form-control', 'placeholder'=>'Seleccione una modalidad'])!!}

</article>

<article class="form-group">
    
    {!! Form::submit('Editar', ['class'=>'btn btn-primary btn-lg btn-block'])!!}
    
    
     
</article>

<article class="form-group">
    
  <a href="{{ URL::previous() }}" class="btn btn-primary btn-lg btn-block">Cancelar</a>
    
     
</article>



{!! Form::close()!!}


</section>


 

</div>
</body>
@endsection
