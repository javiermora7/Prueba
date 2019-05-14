<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>@yield('title','Default')| Iniciar</title>
@include('vistas.layouts.LinkHeader')
  
</head>


 <section class="probar" >
    	
 	@yield('content')
 </section>


@include('vistas.layouts.LinkJs')


</html>