<!DOCTYPE html>
<html lang="es">
<head>

@include('vistas.layouts.LinkHeader')
  
</head>


 <section class="probar" >
    	@include('flash::message')
 	@yield('content')
 </section>


@include('vistas.layouts.LinkJs')


</html>