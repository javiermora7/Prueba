@extends('vistas.layouts.LayoutAdmin')
@section('title')
Editar
@endsection
@section('content')


<body id="page-top">
  @include('vistas.layouts.NavAdmin')

<div id="wrapper">
    @include('vistas.layouts.NavSideBar')
<div class="container">


   
    <h1>Editar Evento</h1>
   <section class="container">
 
    
{!! Form::open(['route'=> ['user.update',$prueba, Crypt::encrypt($prueba->id)],'id'=> 'signupForm', 'method' => 'PUT']) !!}

       
 
    <article class="form-group">
    {!! Form::label('Nombres', 'Nombres')!!}
    {!! Form::text('Nombres', $prueba->Nombres, ['class'=>'form-control', 'placeholder'=>'Primer nombre'])!!}
     </article>
             
    <article class="form-group">
    {!! Form::label('Apellidos', 'Apellido')!!}
    {!! Form::text('Apellidos', $prueba->Apellidos, ['class'=>'form-control', 'placeholder'=>'Apellido'])!!}
    </article>
              
<article class="form-group">
    {!! Form::label('Rut', 'Rut')!!}
    {!! Form::text('Rut', $prueba->Rut, ['class'=>'form-control'])!!}
</article>
              
    <article class="form-group">
    {!! Form::label('Telefono', 'Telefono')!!}
    {!! Form::number('Telefono', $prueba->Telefono, ['class'=>'form-control', 'placeholder'=>'Telefono'])!!}
    </article>

    {!! Form::label('email', 'email')!!}
    {!! Form::email('email', $prueba->email, ['class'=>'form-control', 'disabled', 'placeholder'=>'example@gmail.com'])!!}
    </article>
    
    <article class="form-group">
    {!! Form::label('password', 'password')!!}
    {!! Form::password('password',['class'=>'form-control', 'placeholder'=>'**********'])!!}
    </article>
  
    <article class="form-group">
    {!! Form::label('confirm_password', 'Repita Contraseña')!!}
    {!! Form::password('confirm_password',['class'=>'form-control', 'placeholder'=>'**********'])!!}
    <span id="error" ></span>
   </article>
  
    <article class="form-group">
    {!! Form::label('Direccion', 'Direccion')!!}
    {!! Form::text('Direccion',  $prueba->Direccion, ['class'=>'form-control', 'placeholder'=>'Direccion'])!!}
    
     
</article>
<article class="form-group">
    
    {!! Form::submit('Editar', ['class'=>'btn btn-primary btn-lg btn-block enviar',])!!}
    
    
     
</article>

<article class="form-group">
    
  <a href="{{ URL::previous() }}" class="btn btn-primary btn-lg btn-block">Cancelar</a>
    
     
</article>



{!! Form::close()!!}


</section>


 

</div>

</body>
@endsection
