@extends('Inicio.layout.LayoutAdmin')

@section('title')
Registrar
@endsection
  
  
@section('content')

    @if(count($errors)>0)
<div class="alert alert-danger" >
    <ol>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ol>
</div>
@endif

<h1>Agregar una categoria de producto</h1>
<section class="container">

    
{!! Form::open(['route'=>['categoria.store'],'id'=> 'signupForm', 'method' => 'POST']) !!}

<article class="form-group">
    {!! Form::label('nombre', 'ingrese categoria')!!}
    {!! Form::text('nombre', null, ['class'=>'form-control', 'required', 'placeholder'=>'nombre categoria'])!!}
</article>





<article class="form-group">
    
    {!! Form::submit('Guardar Cambios', ['class'=>'btn btn-primary'])!!}
     <hr>
     <a href="{{ URL::previous() }}">volver</a>
</article>



{!! Form::close()!!}


</section>
@endsection
