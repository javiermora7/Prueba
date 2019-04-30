@extends('Inicio.layout.LayoutPerfil')

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

<h1>Editar Producto {{$producto->Nombre}}</h1>
<section class="container">

    
{!! Form::open(['route'=>['producto.update',$producto],'id'=> 'signupForm', 'method' => 'PUT']) !!}

<article class="form-group">
    {!! Form::label('Nombre', 'Nombre')!!}
    {!! Form::text('Nombre', $producto->Nombre, ['class'=>'form-control', 'required', 'placeholder'=>'Primer nombre'])!!}
</article>


<article class="form-group">
    {!! Form::label('PrecioCompra', 'Precio de compra')!!}
    {!! Form::number('PrecioCompra', $producto->PrecioCompra, ['class'=>'form-control', 'required', 'placeholder'=>'Precio de compra'])!!}
</article>
<article class="form-group">
    {!! Form::label('PrecioVenta', 'Precio de venta')!!}
    {!! Form::number('PrecioVenta', $producto->PrecioVenta, ['class'=>'form-control', 'required', 'placeholder'=>'Precio de venta'])!!}
</article>

<article class="form-group">
    {!! Form::label('Stock', 'Stock')!!}
    {!! Form::number('Stock', $producto->Stock, ['class'=>'form-control', 'required', 'placeholder'=>'Stock del producto'])!!}
</article>

<article class="form-group">
    {!! Form::label('descripcion', 'descripcion')!!}
    {!! Form::textarea('descripcion', $producto->descripcion, ['class'=>'form-control', 'required', 'placeholder'=>'descripcion del producto'])!!}
</article>
<article class="form-group">
    {!! Form::label('Fecha', 'Fecha de registro')!!}
    {!! Form::date('Fecha', $producto->Fecha, ['class'=>'form-control', 'required', 'placeholder'=>'Fecha de registro del producto'])!!}
</article>
<article class="form-group">
    {!! Form::label('Categoria_id', 'Categoria')!!}
    {!! Form::select('Categoria_id', $categoria, null,['class'=>'form-control', 'required', 'placeholder'=>'Seleccione una categoria'])!!}
</article>



<article class="form-group">
    
    {!! Form::submit('Guardar Cambios', ['class'=>'btn btn-primary'])!!}
     <hr>
     <a href="{{ URL::previous() }}">Go Back</a>
</article>



{!! Form::close()!!}


</section>
@endsection
