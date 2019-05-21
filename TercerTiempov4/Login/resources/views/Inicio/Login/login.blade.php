@extends('Inicio.layout.LayoutRegistro')
@section('title')
Entrar
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
 {!!Form::open(['route' => 'login', 'method' =>'POST']) !!}

        <img src="login/img/new.png" alt="" class="logo"><h1>Tercer Tiempo</h1>

        <input type="email" name="email" class="form-control" placeholder="Ingrese email" required="a">
        <input type="password" name="password"  class="form-control" placeholder="Contraseña" required="a">
        <button type="submit" class="btn btn-default" name="button">Iniciar sesión</button> 	
        


    {!!Form::close()!!}
    
@endsection