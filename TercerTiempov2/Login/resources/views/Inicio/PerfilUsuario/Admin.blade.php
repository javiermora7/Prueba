@extends('Inicio.layout.LayoutAdmin')
@section('title')
Perfil
@endsection
@section('content')

<section class="chapa">
  Nombre: <label>{{ $prueba->name}}</label> <!--jona aca recibo el parametro prueba y llamo lo que quiera, en este aso la el nombre de la sesion-->
<hr>
   tipo: <label>{{ $prueba->tipousuario->TipoUsuario}}</label><!--aca hago la relacion con
   la tabla TipoUsuario, rescato el nombre y no la id, $prueba es el parametro que mande con el return, tipousuario el parametro que cree antes de mandar($user ->tipousuario()) y TipoUsuario es el nombre de la columna en la tabla de tipo de usuario--> 

  <hr>
 Correo: <label>{{ $prueba->email}}</label>

   <hr>
Telefono: <label>{{ $prueba->Telefono}}</label><br>
<hr>
<!--de aca empieza el formulario obviamente hay que listar cuando hayan eventos registrados -->


<a href="{{route('categoria')}}" class="btn btn-info" >Agregar Categoria</a>
 </section>
<br>
<section>
  @include('flash::message')
 	<table class="table table-striped table-white" style="border: 1px solid black">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre </th>
      <th scope="col">Apellido</th>
      <th scope="col">Correo</th>
      <th scope="col">Tipo</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    @foreach($lista as $listas)
        <tr>
          <td>{{$listas->id}}</td>
         <td>{{$listas->name}}</td>
         <td>{{$listas->Apellido}}</td>
          <td>{{$listas->email}}</td>
           <td>{{$listas->tipousuario->TipoUsuario}}</td>
            <td><a class="btn btn-danger" href="{{route('delete', $listas->id)}}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" >eliminar</a>

              <a class="btn btn-warning" href="{{route('edit', Crypt::encrypt($listas->id))}}"  >editar</a></td>
        </tr>

    @endforeach
  </tbody>
</table>

 
{!! $lista->render() !!}
</section>
@endsection
