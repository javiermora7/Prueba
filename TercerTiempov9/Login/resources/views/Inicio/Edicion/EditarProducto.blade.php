@extends('Inicio.layout.LayoutPerfil')

@section('title')
Editar
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

<h1>Editar Producto {{$producto->Nombre}}</h1>
<section class="container">

    
{!! Form::open(['route'=>['campeonato.store',$producto],'id'=> 'signupForm', 'method' => 'PUT']) !!}

<article class="form-group">
    {!! Form::label('Nombre', 'Nombre')!!}
    {!! Form::text('Nombre', $producto->Nombre, ['class'=>'form-control', 'required', 'placeholder'=>'Primer nombre'])!!}
</article>





<article class="form-group">
    
    {!! Form::submit('Guardar Cambios', ['class'=>'btn btn-primary'])!!}
     <hr>
     <a href="{{ URL::previous() }}">Go Back</a>
</article>



{!! Form::close()!!}


</section>
@endsection
