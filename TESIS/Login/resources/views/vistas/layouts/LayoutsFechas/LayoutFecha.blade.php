<!DOCTYPE html>
<html lang="es">
<head>


@include('vistas.layouts.LinkHeader')  

<style type="text/css">
td{
border-spacing: 0;
padding: 0px;
 }
	</style>
</head>


 <section class="probar" >
    	@include('flash::message')
 	@yield('content')
 </section>


@include('vistas.layouts.LinkJs')


</html>