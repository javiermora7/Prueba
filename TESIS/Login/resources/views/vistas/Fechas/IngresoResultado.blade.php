<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon"  href="{{asset('/Componentes/assets/images/tercer.png')}}">

    <!-- Chartist Chart CSS -->
     <link rel="stylesheet"  href="{{asset('/Componentes/plugins/chartist/css/chartist.min.css')}}">
    <!-- Bootstrap 4.0-->
{{--     <link rel="stylesheet"  href="{{asset('/Componentes/assets/css/bootstrap.min.css')}}">
 --}}    <!-- Data picker-->
    <link rel="stylesheet"  href="{{asset('/Componentes/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Data table-->
    <link rel="stylesheet"  href="{{asset('/Componentes/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"  href="{{asset('/Componentes/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"  href="{{asset('/Componentes/plugins/datatables/buttons.bootstrap4.min.css')}}">
    <!-- data table responsive-->
    <link rel="stylesheet"  href="{{asset('/Componentes/plugins/datatables/responsive.bootstrap4.min.css')}}">
    <!-- Sweet alert-->
  <link rel="stylesheet"  href="{{asset('/Componentes/plugins/sweet-alert2/sweetalert2.min.css')}}">
    <!-- Editor-->
      <link rel="stylesheet"  href="{{asset('/Componentes/plugins/summernote/summernote-bs4.css')}}">
    <!-- selector multiple-->
    <link rel="stylesheet"  href="{{asset('/Componentes/plugins/select2/css/select2.min.css')}}">
    <!--cajas de selector-->    
    <link rel="stylesheet"  href="{{asset('/Componentes/plugins/bootstrap-duallistbox/dist/bootstrap-duallistbox.min.css')}}">
    <!--theme css-->
     <link rel="stylesheet"  href="{{asset('/Componentes/assets/css/metismenu.min.css')}}">
     <link rel="stylesheet"  href="{{asset('/Componentes/assets/css/icons.css')}}">
     <link rel="stylesheet"  href="{{asset('/Componentes/assets/css/style.css')}}">
    <link rel="stylesheet"  href="{{asset('/Componentes/assets/css/style-movistar.css')}}">
    <!-- Estilos desarrollo -->
    <link rel="stylesheet" type="text/css" href="{{asset('/css/ListaEven.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/perfil/perfil.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ EL OTRO TEMPLATE ---------->
    <link rel="stylesheet"  href="{{asset('/Sport/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet"  href="{{asset('/Sport/css/magnific-popup.css')}}">
    <link rel="stylesheet"  href="{{asset('/Sport/css/jquery-ui.css')}}">
    <link rel="stylesheet"  href="{{asset('/Sport/css/owl.carousel.min.css')}}">
    <link rel="stylesheet"  href="{{asset('/Sport/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet"  href="{{asset('/Sport/css/aos.css')}}">
    <link rel="stylesheet"  href="{{asset('/Sport/css/style.css')}}">
        <link rel="stylesheet"  href="{{asset('/Sport/css/ImagenFechas.css')}}">


   


{{--     <link rel="stylesheet" href="css/bootstrap.min.css">
 --}}   
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
      <hr>
      <div class="container">
      <div class="form-row ">
          {{-- equipo 1 --}}
            <div class="form-group col-md-2 " >
                <button type="button" class="btn btn-outline-success"><i class="fas fa-arrow-left"></i>Atras</button>
            </div> 
          <div class="form-group col-md-8">
       <center><label>Ingreso de resultado</label></center>
            </div>
          </div>
        </div>
   <hr>
     <div class="container">
        <div class="form-row ">
            {{-- equipo 1 --}}
              <div class="form-group col-md-6 " >
                  <div class="p-3 mb-2 bg-primary text-white">{{$nombreeq1}}</div>
                  <button type="button" class="btn btn-outline-success btn_agregar_gol_eq1"><i class="fas fa-plus-circle"></i>Gol</button>
                  <button type="button" class="btn btn-outline-warning btn_agregar_amarilla_eq1"><i class="fas fa-plus-circle"></i>Tarjeta Amarilla</button>
                  <button type="button" class="btn btn-outline-danger btn_agregar_roja_eq1" ><i class="fas fa-plus-circle"></i>Tarjeta Roja</button>
              </div>
            
            
            <div class="form-group col-md-6">
                <div class="p-3 mb-2 bg-success text-white">{{$nombreeq2}}</div>
                <button type="button" class="btn btn-outline-success btn_agregar_gol_eq2"><i class="fas fa-plus-circle"></i>Gol</button>
                <button type="button" class="btn btn-outline-warning btn_agregar_amarilla_eq2"><i class="fas fa-plus-circle"></i>Tarjeta Amarilla</button>
                <button type="button" class="btn btn-outline-danger btn_agregar_roja_eq2"><i class="fas fa-plus-circle"></i>Tarjeta Roja</button>
              </div>
            </div>

            {!! Form::open(['route'=> 'ResultadoEncuentros','id'=> 'CrearEvento', 'enctype'=>'multipart/form-data' , 'class'=>'form-horizontal','method' => 'POST']) !!}
            @csrf
            <input type="hidden" value="1" name="variable">
          <input type="hidden" value="{{$idEvento}}" name="id_evento">
          <input type="hidden" value="{{$idEquipoEncuentro}}" name="id_encuentro">
          <input type="hidden" value="{{$idEquipo1}}" name="idEquipo1">
          <input type="hidden" value="{{$idEquipo2}}" name="idEquipo2">
          <input type="hidden" value="{{$fecha}}" name="fecha">
          <div class="form-row " >
          {{-- equipo 1 goles--}}
          
            <div class="form-group col-md-3" id="goles_q1">
          
            </div>
            <div class="form-group col-md-3" id="n_goles_q1">
              
            </div>
            {{-- <div class="form-group col-md-2" id="d_goles_q1">
              
              </div> --}}
            {{-- fin euqipo 1 goles--}}
            {{-- equipo 2 goles --}}
            <div class="form-group col-md-3 border-left" id="goles_q2">
             
            </div>
          
          <div class="form-group col-md-3" id="n_goles_q2">
              
            </div>
          </div>
        
          {{-- fin euqipo 2 goles--}}
          {{-- equipo1 tarjeta amarilla--}}
          <div class="form-row">
          <div class="form-group col-md-3" id="amarilla_eq1">
       
          </div>
          <div class="form-group col-md-3 " id="n_amarilla_eq1">
         
          </div>
   {{-- fin equipo 1  tarjeta amarilla--}}
 {{-- equipo2  tarjeta amarilla--}}
          <div class="form-group col-md-3 border-left" id="amarilla_eq2" >
            
            </div>

        
          <div class="form-group col-md-3" id="n_amarilla_eq2">
     
          </div>
         {{--fin equipo2  tarjeta amarilla--}}
         {{-- equipo 1 tarjetas rojas --}}
      </div>
        <div class="form-row" >
            <div class="form-group col-md-3" id="roja_eq1">
           
            </div>
            <div class="form-group col-md-3 " id="n_roja_eq1">
             
          
            </div>
     {{-- fin equipo 1 tarjetas rojas --}}
   {{-- equipo2 tarjetas rojas--}}
            <div class="form-group col-md-3 border-left" id="roja_eq2">
              
              </div>
            <div class="form-group col-md-3" id="n_roja_eq2">
           
              </div>
          </div>
        {{-- fin equipo2 tarjetas rojas--}}
        <button type="button" class="btn btn-outline-success"><i class="fas fa-arrow-left"></i>Atras</button>
          <button type="submit" class="btn btn-primary">Registrar</button>
       
          {!! Form::close()!!}
      </div>
       
      <script>
 

//agrega gol equi1
$(".btn_agregar_gol_eq1").click(function (){
  

              var id_ju_gol_equipo1='<label for="inputEmail4">Numero Jugador <i class="fas fa-walking"></i></label>'+
                    '<select class="form-control" name="id_ju_gol_equipo1[]">'+
                        '<option value="0" selected>Seleccione...</option>'+
                        '@foreach($equipo1 as $eq1)'+
                         '<option value="{{$eq1->id}}">{{$eq1->Ju_Numero}}</option>'+
                        ' @endforeach'+             
                    '</select>';

              var n_goles_q1='<label for="inputEmail4">Nº de goles <i class="fas fa-futbol"></i></label>'+
               '<input type="number" min="0" max="100" class="form-control" name="n_goles_eq1[]">';

              //  var d = '<label for="inputEmail4"><hr><hr></label>'+
              //  '<button type="button" class="btn btn-outline-danger btn_agregar_gol_eq2"><i class="fas fa-minus-circle"></i></button>';
               $('#n_goles_q1').append(n_goles_q1);
              $('#goles_q1').append(id_ju_gol_equipo1);
              // $('#d_goles_q1').append(d);
              

});

// $(".btn_remover_gol_eq1").click(function (){
//   console.log('gola');
//    $('#n_goles_q1').remove();
//   $('#goles_q1').remove();
  

// });

//agrega tarjetaamarilla equi1


$(".btn_agregar_amarilla_eq1").click(function (){
  

  var id_ju_amarilla_equipo1='<label for="inputEmail4">Numero Jugador <i class="fas fa-walking"></i></label>'+
        '<select class="form-control" name="id_ju_amarilla_eq1[]">'+
            '<option value="0" selected>Seleccione...</option>'+
            '@foreach($equipo1 as $eq1)'+
             '<option value="{{$eq1->id}}">{{$eq1->Ju_Numero}}</option>'+
            ' @endforeach'+             
        '</select>';

  var n_amarilla_q1='<label for="inputAddress2">Nº de tajetas Amarillas <i class="fas fa-clone" style="color:yellow"></i></label>'+
            '<input type="number" min="0" maxlength="2"  class="form-control" name="amarilla_eq1[]" >'
   $('#n_amarilla_eq1').append(n_amarilla_q1);
  $('#amarilla_eq1').append(id_ju_amarilla_equipo1);
  

});

$(".btn_remover_amarilla_eq1").click(function (){

});
//agrega tarjetaroja equi1
$(".btn_agregar_roja_eq1").click(function (){
  

  var id_ju_roja_equipo1='<label for="inputEmail4">Numero Jugador <i class="fas fa-walking"></i></label>'+
        '<select class="form-control" name="id_ju_roja_eq1[]">'+
            '<option value="0" selected>Seleccione...</option>'+
            '@foreach($equipo1 as $eq1)'+
             '<option value="{{$eq1->id}}">{{$eq1->Ju_Numero}}</option>'+
            ' @endforeach'+             
        '</select>';

  var n_roja_q1='<hr>'+
              '<label for="inputAddress2">Tajetas Rojas <i class="fas fa-clone" style="color:red"></i></label>'+
              '<input type="hidden" class="form-control" name="roja_eq1[]" value="1" >';
   $('#n_roja_eq1').append(n_roja_q1);
  $('#roja_eq1').append(id_ju_roja_equipo1);
  

});
////////////////////////
//agrega gol equi2
$(".btn_agregar_gol_eq2").click(function (){
  

  var id_ju_gol_equipo2= '<label for="inputEmail4">Numero Jugador <i class="fas fa-walking"></i></label>'+
                '<select class="form-control"  name="id_ju_gol_equipo2[]">'+
                    '<option value="0" selected>Seleccione...</option>'+
                '@foreach($equipo2 as $eq2)'+
                '<option value="{{$eq2->id}}">{{$eq2->Ju_Numero}}</option>'+
                '@endforeach'+
                '</select>';

  var n_goles_q2= '<label for="inputEmail4">Nº de goles <i class="fas fa-futbol"></i></label>'+
               ' <input type="number" min="0" maxlength="2" class="form-control" name="n_goles_eq2[]">';
   $('#n_goles_q2').append(n_goles_q2);
  $('#goles_q2').append(id_ju_gol_equipo2);
  

});

//agrega amarilla equi2
$(".btn_agregar_amarilla_eq2").click(function (){
  

  var id_ju_amarilla_equipo1='<label for="inputEmail4">Numero Jugador <i class="fas fa-walking"></i></label>'+
        '<select class="form-control" name="id_ju_amarilla_eq2[]">'+
            '<option value="0" selected>Seleccione...</option>'+
            '@foreach($equipo2 as $eq2)'+
             '<option value="{{$eq2->id}}">{{$eq2->Ju_Numero}}</option>'+
            ' @endforeach'+             
        '</select>';

  var n_amarilla_q1='<label for="inputAddress2">Nº de tajetas Amarillas <i class="fas fa-clone" style="color:yellow"></i></label>'+
            '<input type="number" min="0" maxlength="2"  class="form-control" name="amarilla_eq2[]" >'
   $('#n_amarilla_eq2').append(n_amarilla_q1);
  $('#amarilla_eq2').append(id_ju_amarilla_equipo1);
  

});
//agrega roja equi2
$(".btn_agregar_roja_eq2").click(function (){
  

  var id_ju_roja_equipo2='<label for="inputEmail4">Numero Jugador <i class="fas fa-walking"></i></label>'+
        '<select class="form-control" name="id_ju_roja_eq2[]">'+
            '<option value="0" selected>Seleccione...</option>'+
            '@foreach($equipo2 as $eq2)'+
             '<option value="{{$eq2->id}}">{{$eq2->Ju_Numero}}</option>'+
            ' @endforeach'+             
        '</select>';

  var n_roja_q2='<hr>'+
              '<label for="inputAddress2">Tajetas Rojas <i class="fas fa-clone" style="color:red"></i></label>'+
              '<input type="hidden" class="form-control" name="roja_eq2[]" value="1" >';
   $('#n_roja_eq2').append(n_roja_q2);
  $('#roja_eq2').append(id_ju_roja_equipo2);
  

});

      </script>

  
      
    <!--Basic-->
    <script src="{{asset('/Componentes/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('/Componentes/assets/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('/Componentes/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('/Componentes/assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('/Componentes/assets/js/waves.min.js')}}"></script>    
    <!-- plugins-->
    <!--datepicker-->
    <script src="{{asset('/Componentes/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>    
    <!--datatable-->
    <script src="{{asset('/Componentes/plugins/datatables/jquery.dataTables.min.js')}}"></script> 
    <script src="{{asset('/Componentes/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Datatable responsive-->
    <script src="{{asset('/Componentes/plugins/datatables/dataTables.responsive.min.js')}}"></script>   
    <script src="{{asset('/Componentes/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>   
    <!-- Editor-->
    <script src="{{asset('/Componentes/plugins/summernote/summernote-bs4.min.js')}}"></script>      
    <!-- Repeter-->
    <script src="{{asset('/Componentes/plugins/jquery-repeater/jquery.repeater.min.js')}}"></script>   
    <script src="{{asset('/Componentes/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}"></script>          
    <!-- Sweet alert-->
    <script src="{{asset('/Componentes/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>           
    <!-- Selector multiple-->
    <script src="{{asset('/Componentes/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>           
    <script src="{{asset('/Componentes/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>           
    <script src="{{asset('/Componentes/plugins/select2/js/select2.min.js')}}"></script> 
    <script src="{{asset('/Componentes/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>           
    <script src="{{asset('/Componentes/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')}}"></script>               
    <!-- selector multiple cajas-->
    <script src="{{asset('/Componentes/plugins/bootstrap-duallistbox/dist/jquery.bootstrap-duallistbox.min.js')}}"></script>           
    
    <!-- init files-->
        <script src="{{asset('/Componentes/assets/pages/form-editors.int.js')}}"></script> 
    <script src="{{asset('/Componentes/assets/pages/dashboard.js')}}"></script> 
    <script src="{{asset('/Componentes/assets/pages/form-advanced.js')}}"></script> 
    <script src="{{asset('/Componentes/assets/pages/datatables.init.js')}}"></script> 
    <script src="{{asset('/Componentes/assets/pages/form-repeater.int.js')}}"></script> 
    <script src="{{asset('/Componentes/assets/pages/sweet-alert.init.js')}}"></script> 
    <script src="{{asset('/Componentes/assets/js/app.js')}}"></script> 
    <script src="{{asset('/Componentes/assets/js/custom.js')}}"></script>

    <!--el otro template--> 
   {{--  <script src="{{asset('/Sport/js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('/Sport/js/jquery-migrate-3.0.1.min.js')}}"></script>
         <script src="{{asset('/Sport/js/jquery-ui.js')}}"></script>
         <script src="{{asset('/Sport/js/popper.min.js')}}"></script>
         <script src="{{asset('/Sport/js/bootstrap.min.js')}}"></script>
         <script src="{{asset('/Sport/js/owl.carousel.min.js')}}"></script>
         <script src="{{asset('/Sport/js/jquery.stellar.min.js')}}"></script>
         <script src="{{asset('/Sport/js/jquery.countdown.min.js')}}"></script>
         <script src="{{asset('/Sport/js/jquery.magnific-popup.min.js')}}"></script>
                <script src="{{asset('/Sport/js/aos.js')}}"></script>

                <script src="{{asset('/Sport/js/main.js')}}"></script> --}}

    <script></script>
  </body>
</html>