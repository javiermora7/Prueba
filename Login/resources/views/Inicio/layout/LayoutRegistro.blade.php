<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>@yield('title','Default')| Bienvenido</title>
	<link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.css')}}">
    <script src="{{ asset('/js/jquery-3.3.1.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/Clave.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/additional-methods.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/additional-methods.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/jquery.validate.js') }}" type="text/javascript"></script>
   
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{asset('/css/probar.css')}}">
</head>
<body>
@include('Inicio.layout.NavRegistro')

 <section class="probar" >
 	@include('flash::message')
 	@yield('content')

 </section>



</body>
</html>