@extends('Inicio.layout.LayoutAdmin')

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

<h1>Editar usuario {{$user->name}}</h1>
<section class="container">

    
{!! Form::open(['route'=>['user.update',$user],'id'=> 'signupForm', 'method' => 'PUT']) !!}

<article class="form-group">
    {!! Form::label('name', 'Nombre')!!}
    {!! Form::text('name', $user->name, ['class'=>'form-control', 'required', 'placeholder'=>'Primer nombre'])!!}
</article>

<article class="form-group">
    {!! Form::label('Apellido', 'Apellido')!!}
    {!! Form::text('Apellido', $user->Apellido, ['class'=>'form-control', 'required', 'placeholder'=>'Apellido'])!!}
</article>

<article class="form-group">
    {!! Form::label('Telefono', 'Telefono')!!}
    {!! Form::text('Telefono', $user->Telefono, ['class'=>'form-control', 'required', 'placeholder'=>'Telefono'])!!}
</article>




<article class="form-group">
    {!! Form::label('password', 'password nueva')!!}
    {!! Form::password('password',['class'=>'form-control', 'required', 'placeholder'=>'**********'])!!}
</article>
<article class="form-group">
    {!! Form::label('confirm_password', 'Repita nueva password')!!}
    {!! Form::password('confirm_password',['class'=>'form-control', 'required', 'placeholder'=>'**********'])!!}
    <span id="error" ></span>
</article>


<article class="form-group">
    {!! Form::label('RazonSocial', 'RazonSocial')!!}
    {!! Form::text('RazonSocial', $user->RazonSocial, ['class'=>'form-control', 'required', 'placeholder'=>'Ingrese razon social'])!!}
</article>

<article class="form-group">
    
    {!! Form::submit('Guardar Cambios', ['class'=>'btn btn-primary'])!!}
     <hr>
     <a href="{{ URL::previous() }}">Go Back</a>
</article>



{!! Form::close()!!}


</section>
@endsection
