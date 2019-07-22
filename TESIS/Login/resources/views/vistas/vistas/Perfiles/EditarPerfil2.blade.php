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
 
    
{!! Form::open(['route'=> ['user.update',$user, Crypt::encrypt($user->id)],'id'=> 'signupForm', 'method' => 'PUT']) !!}

       
 
    <article class="form-group">
    {!! Form::label('Nombres', 'Nombres')!!}
    {!! Form::text('Nombres', $user->Nombres, ['class'=>'form-control', 'placeholder'=>'Primer nombre'])!!}
     </article>
             
    <article class="form-group">
    {!! Form::label('Apellidos', 'Apellido')!!}
    {!! Form::text('Apellidos', $user->Apellidos, ['class'=>'form-control', 'placeholder'=>'Apellido'])!!}
    </article>
              
<article class="form-group">
    {!! Form::label('Rut', 'Rut')!!}
    {!! Form::text('Rut', $user->Rut, ['class'=>'form-control'])!!}
</article>
              
    <article class="form-group">
    {!! Form::label('Telefono', 'Telefono')!!}
    {!! Form::number('Telefono', $user->Telefono, ['class'=>'form-control', 'placeholder'=>'Telefono'])!!}
    </article>

    {!! Form::label('email', 'email')!!}
    {!! Form::email('email', $user->email, ['class'=>'form-control', 'disabled', 'placeholder'=>'example@gmail.com'])!!}
    </article>
    
   
    <article class="form-group">
    {!! Form::label('Direccion', 'Direccion')!!}
    {!! Form::text('Direccion',  $user->Direccion, ['class'=>'form-control', 'placeholder'=>'Direccion'])!!}
    
     
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
