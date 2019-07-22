@extends('Inicio.layout.LayoutPerfil')

@section('title')
Agregar Producto
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

<h1>Agregar Producto</h1>
<section class="container">

    
{!! Form::open(['route'=>['producto.store'],'id'=> 'signupForm', 'method' => 'POST']) !!}

<article class="form-group">
    {!! Form::label('Nombre', 'Nombre')!!}
    {!! Form::text('Nombre', null, ['class'=>'form-control', 'required', 'placeholder'=>'Nombre de producto'])!!}
</article>

<article class="form-group">
    {!! Form::label('PrecioCompra', 'Precio de compra')!!}
    {!! Form::number('PrecioCompra', null, ['class'=>'form-control', 'required', 'placeholder'=>'Precio de compra'])!!}
</article>

<article class="form-group">
    {!! Form::label('PrecioVenta', 'Precio de venta')!!}
    {!! Form::number('PrecioVenta', null, ['class'=>'form-control', 'required', 'placeholder'=>'Precio de venta'])!!}
</article>


<article class="form-group">
    {!! Form::label('Stock', 'Stock')!!}
    {!! Form::number('Stock', null, ['class'=>'form-control', 'required', 'placeholder'=>'Stock'])!!}
</article>

<article class="form-group">
    {!! Form::label('descripcion', 'descripcion')!!}
    {!! Form::textarea('descripcion', null, ['class'=>'form-control', 'required', 'placeholder'=>'descripcion del producto'])!!}
</article>


<article class="form-group">
    {!! Form::label('Fecha', 'Fecha de registro')!!}
    {!! Form::date('Fecha', null, ['class'=>'form-control', 'required', 'placeholder'=>'Fecha de registro del producto'])!!}
</article>
<article class="form-group">
    {!! Form::label('Categoria_id', 'Categoria')!!}
    {!! Form::select('Categoria_id', $categoria, null,['class'=>'form-control', 'required', 'placeholder'=>'Seleccione una categoria'])!!}
</article>

<article class="form-group">
    
    {!! Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}
     <hr>
     <a href="{{ URL::previous() }}">volver</a>
</article>



{!! Form::close()!!}


</section>
@endsection
