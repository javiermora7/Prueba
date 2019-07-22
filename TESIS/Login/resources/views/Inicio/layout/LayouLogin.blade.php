<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>@yield('title','Default')| Iniciar</title>
	<link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/js/jquery-3.3.1.js')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{asset('/css/probar.css')}}">
</head>
<body>

 <section class="probar" >
 	@include('flash::message')
 	@yield('content')
 </section>



</body>
</html>