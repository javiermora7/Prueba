<!DOCTYPE html>
<html lang="es">
<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

   <script src="{{ asset('/js/jquery.rut.chileno.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery.rut.chileno.min.js') }}" type="text/javascript"></script>

@include('vistas.layouts.LinkHeader')  
<script type="text/javascript">
	jQuery(document).ready(function($){
		$('#Rut').rut();
	});
	</script>
	<style type="text/css">
	.rut-error{
		color: #black;
		font-weight: 200;
		background-color: white;
		padding: 3px 10px;
		display: inline-block;
		margin: 1px;
	}
	</style>
</head>


 <section class="probar" >
    	@include('flash::message')
 	@yield('content')
 </section>


@include('vistas.layouts.LinkJs')


</html>