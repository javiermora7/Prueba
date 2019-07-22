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

 @include('flash::message')
   
    <h1>Editar Evento</h1>
   <section class="container">
 
    
{!! Form::open(['route'=> ['updateclave', Crypt::encrypt($user->id)],'id'=> 'signupForm', 'method' => 'POST']) !!}


 <article class="form-group">
    {!! Form::label('oldpassword', 'Contraseña actual')!!}
    {!! Form::password('oldpassword',['class'=>'form-control', 'placeholder'=>'**********'])!!}
    </article>

 <article class="form-group">
    {!! Form::label('password', 'Nueva contraseña')!!}
    {!! Form::password('password',['class'=>'form-control', 'placeholder'=>'**********'])!!}
    </article>
  
    <article class="form-group">
    {!! Form::label('confirm_password', 'Repita Contraseña')!!}
    {!! Form::password('confirm_password',['class'=>'form-control', 'placeholder'=>'**********'])!!}
    <span id="error" ></span>
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
