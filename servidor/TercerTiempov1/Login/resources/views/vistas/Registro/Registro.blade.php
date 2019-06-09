@extends('vistas.layouts.LayoutsRegistro.LayoutRegistro')
@section('title')
REGISTRO
@endsection

@section('content')


    <body class="bg-green">
    	<!--aca hay que hacer un nav nuevfo-->
  @include('vistas.layouts.NavNat')
 


<div class="container">
 
  
    
{!! Form::open(['route'=> 'users.store','id'=> 'signupForm', 'method' => 'POST']) !!}

       
  <div class="container">
    <div class=" card-register mx-auto mt-5">
      <div class="card-header">Registro Usuario Natural</div>
        @if(count($errors)>0)
             <div class="alert alert-danger col-sm"  >
      <ol>
           @foreach($errors->all() as $error)
              <li>{{$error}}</li>
        @endforeach
      </ol>
  </div>
        @endif
      <div class="card-body">
      
        <form>
      
          <div class="form-group">
            <div class="form-row">
              
              <div class="col-md-6">
              
    <article class="form-group">
    {!! Form::label('Nombres', 'Nombres')!!}
    {!! Form::text('Nombres', null, ['class'=>'form-control', 'required', 'placeholder'=>'Primer nombre'])!!}
     </article>
              </div>

              <div class="col-md-6">
    <article class="form-group">
    {!! Form::label('Apellidos', 'Apellido')!!}
    {!! Form::text('Apellidos', null, ['class'=>'form-control', 'required', 'placeholder'=>'Apellido'])!!}
    </article>
              </div>
                <div class="col-md-6">
<article class="form-group">
    {!! Form::label('Rut', 'Rut')!!}
    {!! Form::text('Rut', null, ['class'=>'form-control', 'required'])!!}
</article>
              </div>
              
            <div class="col-md-6">
    <article class="form-group">
    {!! Form::label('Telefono', 'Telefono')!!}
    {!! Form::number('Telefono', null, ['class'=>'form-control', 'required', 'placeholder'=>'Telefono'])!!}
    </article>

            </div>
          </div>
            <article class="form-group">
    {!! Form::label('email', 'email')!!}
    {!! Form::email('email', null, ['class'=>'form-control', 'required', 'placeholder'=>'example@gmail.com'])!!}
    </article>
          <div class="form-group">
            <div class="form-row">

              <div class="col-md-6">
    <article class="form-group">
    {!! Form::label('password', 'password')!!}
    {!! Form::password('password',['class'=>'form-control', 'required', 'placeholder'=>'**********'])!!}
    </article>
              </div>

              <div class="col-md-6">
    <article class="form-group">
    {!! Form::label('confirm_password', 'Repita Contraseña')!!}
    {!! Form::password('confirm_password',['class'=>'form-control', 'required', 'placeholder'=>'**********'])!!}
    <span id="error" ></span>
   </article>
              </div>
                <div class="col-md-6">
    <article class="form-group">
    {!! Form::label('Direccion', 'Direccion')!!}
    {!! Form::text('Direccion', null, ['class'=>'form-control', 'required', 'placeholder'=>'Direccion'])!!}
    </article>
              </div>
             


            </div>
          </div>


              
         <button type="submit" class="btn btn-primary btn-block name="button">Registrar</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.html">Login Page</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
        

      

    {!!Form::close()!!}


   </div>
 
</body>

@endsection