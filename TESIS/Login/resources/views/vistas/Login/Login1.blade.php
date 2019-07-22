@extends('vistas.layouts.LayoutLogin')
@section('title')
ENTRAR
@endsection

@section('content')


    <body class="bg-green">
    	<!--aca hay que hacer un nav nuevo-->
  @include('vistas.layouts.NavNat')

<div class="container">

    <div class=" card-login mx-auto mt-5">
      @include('flash::message')
      <div class="card-header">Iniciar Sesión</div>
      <div class="card-body">
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

       
        
<div class="form-group">
            <div class="form-label-group">
              <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Ingrese correo" required="required" autofocus="autofocus">
              <label for="inputEmail">Correo</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Contraseña</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Recordar contraseña
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block name="button">Iniciar sesión</button> 
      

    {!!Form::close()!!}

   </div>
   </div>
 </div>
</body>

@endsection