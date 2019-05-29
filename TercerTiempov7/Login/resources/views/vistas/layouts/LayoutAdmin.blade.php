<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" type="text/css" href="{{asset('/css/ListaEven.css')}}">
@include('vistas.layouts.LinkHeader')
  
</head>


 <section class="probar" >
    	@include('flash::message')
 	@yield('content')
 </section>


@include('vistas.layouts.LinkJs')
<script src="{{ asset('/js/Perfil/crear.js') }}" type="text/javascript"></script>

<script src="{{ asset('/js/Perfil/Perfil.js') }}" type="text/javascript"></script>


</html>