@extends('Inicio.layout.LayoutPerfil')
@section('title')
Perfil
@endsection
@section('content')
<section class="chapa">
 <br>
  Nombre: <label>{{ $prueba->name}}</label>

<hr>
 tipo: <label>{{ $prueba->tipousuario->TipoUsuario}}</label>
  <hr>
 Correo: <label>{{ $prueba->email}}</label>

   <hr>
Telefono: <label>{{ $prueba->Telefono}}</label><br>
<hr>
<a href="{{route('producto')}}" class="btn btn-info" >Agregar Producto</a>
 </section>
<br>
 <section>
 
  @include('flash::message')
  <table class="table table-striped table-white" style="border: 1px solid black">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre </th>
      <th scope="col">Precio compra</th>
      <th scope="col">Precio Venta</th>
      <th scope="col">Stock</th>
      <th scope="col">descripcion</th>
       <th scope="col">Fecha de ingreso</th>
        <th scope="col">Categoria</th>
    </tr>
  </thead>
  <tbody>
    @foreach($lista as $listas)
        <tr>
          <td>{{$listas->id}}</td>
         <td>{{$listas->Nombre}}</td>
         <td>{{$listas->PrecioCompra}}</td>
          <td>{{$listas->PrecioVenta}}</td>
           <td>{{$listas->Stock}}</td>
           <td>{{$listas->descripcion}}</td>
           <td>{{$listas->Fecha}}</td>
           <td>{{$listas->nombre}}</td>
            <td><a class="btn btn-danger" href="{{route('deleteProduct', $listas->id)}}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" >eliminar</a>

                                                                      
              <a class="btn btn-warning" href="{{route('editProducto', Crypt::encrypt($listas->id))}}"  >editar</a></td>
        </tr>
        {{--Crypt::encrypt($g->id)--}}

    @endforeach
  </tbody>
</table>

 
{!! $lista->render() !!}
</section>

@endsection

