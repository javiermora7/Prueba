@extends('Inicio.layout.LayoutRegistro')

@section('title')
Welcome
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
<h1>Registro Usuario Natural</h1>
<section class="container">
    
{!! Form::open(['route'=> 'users.store','id'=> 'signupForm', 'method' => 'POST']) !!}

<article class="form-group">
    {!! Form::label('name', 'Nombre')!!}
    {!! Form::text('name', null, ['class'=>'form-control', 'required', 'placeholder'=>'Primer nombre'])!!}
</article>

<article class="form-group">
    {!! Form::label('Apellido', 'Apellido')!!}
    {!! Form::text('Apellido', null, ['class'=>'form-control', 'required', 'placeholder'=>'Apellido'])!!}
</article>

<article class="form-group">
    {!! Form::label('Telefono', 'Telefono')!!}
    {!! Form::number('Telefono', null, ['class'=>'form-control', 'required', 'placeholder'=>'Telefono'])!!}
</article>


<article class="form-group">
    {!! Form::label('email', 'email')!!}
    {!! Form::email('email', null, ['class'=>'form-control', 'required', 'placeholder'=>'example@gmail.com'])!!}
</article>

<article class="form-group">
    {!! Form::label('password', 'password')!!}
    {!! Form::password('password',['class'=>'form-control', 'required', 'placeholder'=>'**********'])!!}
</article>
<article class="form-group">
    {!! Form::label('confirm_password', 'Repita Contraseña')!!}
    {!! Form::password('confirm_password',['class'=>'form-control', 'required', 'placeholder'=>'**********'])!!}
    <span id="error" ></span>
</article>


<article class="form-group">
    {!! Form::label('RazonSocial', 'RazonSocial')!!}
    {!! Form::text('RazonSocial', null, ['class'=>'form-control', 'required', 'placeholder'=>'Ingrese razon social'])!!}
</article>

<article class="form-group">
    
    {!! Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}
    
     
</article>



{!! Form::close()!!}


</section>
@endsection

