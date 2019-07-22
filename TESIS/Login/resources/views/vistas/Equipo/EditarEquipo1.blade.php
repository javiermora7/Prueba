@extends('vistas.layouts.LayoutsEventos.LayoutEvento')
@section('title')
Editar
@endsection
@section('content')


<body id="page-top">
  @include('vistas.layouts.LayoutsEventos.NavEvento')

<div id="wrapper">
    @include('vistas.layouts.LayoutsEventos.SideEvento')
<div class="container">


   
    <h1>Editar Equipo</h1>
    <h1> {{$evento->id}}</h1>
   <section class="container">
    
    
{!! Form::open(['route'=>['equipo.update',$equipo, Crypt::encrypt($equipo->id)],'id'=> 'signupForm', 'enctype'=>'multipart/form-data' , 'class'=>'form-horizontal','method' => 'PUT']) !!}
<article class="form-group">
    {!! Form::label('E_Nombre', 'Nombre de campeonato')!!}
    {!! Form::text('E_Nombre', $equipo->E_Nombre, ['class'=>'form-control', 'required', 'placeholder'=>'Nombre de campeonato'])!!}
</article>
<div class="col-md-5">
<h3>Foto registrada</h3>
<hr>
<img class="img-fluid" src="/storage/{{$equipo->E_Logo}}" alt="">
</div>
<hr>
<article class="form-group">
    {!! Form::label('E_Logo[]', 'Seleccione nueva foto')!!}
    {!! Form::file('E_Logo[]', null, ['class'=>'form-control', 'type'=>'file','accept'=>'jpg,.png', 'placeholder'=>''])!!}
</article>
<input id="" name="evento_id" type="hidden" value={{$evento->id}}>

<article class="form-group">
    
    {!! Form::submit('Editar', ['class'=>'btn btn-primary btn-lg btn-block'])!!}
        
     
</article>

<article class="form-group">
    
  <a href="{{ URL::previous() }}" class="btn btn-primary btn-lg btn-block">Cancelar</a>
    
     
</article>



{!! Form::close()!!}


</section>


 

</div>
</body>
@endsection
