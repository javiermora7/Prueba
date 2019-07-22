<!DOCTYPE html>
<html lang="es">
  <head>
      <meta http-equiv="Expires" content="0">
      <meta http-equiv="Last-Modified" content="0">
      <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
      <meta http-equiv="Pragma" content="no-cache">
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

    <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<!------ EL OTRO TEMPLATE ---------->
   {{--  <link rel="stylesheet"  href="{{asset('/Sport/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet"  href="{{asset('/Sport/css/magnific-popup.css')}}">
    <link rel="stylesheet"  href="{{asset('/Sport/css/jquery-ui.css')}}">
    <link rel="stylesheet"  href="{{asset('/Sport/css/owl.carousel.min.css')}}">
    <link rel="stylesheet"  href="{{asset('/Sport/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet"  href="{{asset('/Sport/css/aos.css')}}">
    <link rel="stylesheet"  href="{{asset('/Sport/css/style.css')}}">
        <link rel="stylesheet"  href="{{asset('/Sport/css/ImagenFechas.css')}}"> --}}


   


{{--     <link rel="stylesheet" href="css/bootstrap.min.css">
 --}}   

 <script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        DireccionUnica = document.getElementById("DireccionUnica");
        if (DireccionUnica.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>

<script language="JavaScript">
 //Creacion de Variable incremental
 var incremento = 0;
//Lo que se hará cuando se presione el boton de Agregar
 function agregar(obj)
 {
  if (incremento<7) {
incremento++;
 //Obteniendo el Div "Dias"
 bloque = document.getElementById('Dias');
//Creando el Select que irá dentro del Div "Dias"
 elemento = document.createElement('select');
 elemento.setAttribute("class", "custom-select custom-select-sm-1 mb-3" );
 elemento.id = 'DiasPartidos'+incremento;
 bloque.appendChild(elemento);
 //Llenando el arreglo que contendrá los "Options" de nuestro "Select"
 var options = [
 "Lunes",
 "Martes",
 "Miercoles",
 "Jueves",
 "Viernes",
 "Sábado",
 "Domingo"
 ];
 //Agregando nuestros "Options" a nuestro "Select"
 for (var i = 0; i < options.length; i++) {
 var option = document.createElement("option");
 option.value = options[i];
 option.text = options[i];
 elemento.appendChild(option);
 }
}
 }
 //Lo que se hará cuando se presione el boton de Borrar
 function borrar(obj) {
 incremento = incremento - 1;
 bloque = document.getElementById('Dias');
 bloque.removeChild(bloque.lastChild);
 }
 </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <div id="wrapper">
      <div class="topbar">
        <div class="topbar-left"><a class="logo" href="index.html"><span><img src="
       {{asset('/Componentes/assets/images/tercer.png')}}" alt="" width="90"></span>
       <i><img src="{{asset('/Componentes/assets/images/tercer.png')}}" alt="" height="42"></i></a></div>
        <nav class="navbar-custom">
          <ul class="navbar-right d-flex list-inline float-right mb-0">
            <li class="dropdown notification-list d-none d-md-block"><a class="nav-link waves-effect" href="#" id="btn-fullscreen"><i class="mdi mdi-fullscreen noti-icon"></i></a></li>
            <li class="dropdown notification-list">
              <div class="dropdown notification-list nav-pro-img"><a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><img class="rounded-circle" src="{{asset('/Componentes/assets/images/tercer.png')}}" alt="user"></a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                   <a class="dropdown-item"  href="{{route('perfil')}}"><i class="mdi mdi-account-circle m-r-5"></i>mi perfil</a>
          <div class="dropdown-divider"></div>
                 {{-- <a class="dropdown-item" href="{{route('EditPerfil', Crypt::encrypt($user->id))}}">
                  <i class="fas fa-edit"></i></i>Editar Perfil</a> --}}
                 {{--  <a class="dropdown-item" href="{{route('EditarClave', Crypt::encrypt($user->id))}}"><i class="fas fa-key"></i></i>Editar Clave</a> --}}
                  <div class="dropdown-divider"></div><a class="dropdown-item text-danger"  href="{{route('salir')}}"><i class="mdi mdi-power text-danger">Salir</i></a>
                </div>
              </div>
            </li>
          </ul>
          <ul class="list-inline menu-left mb-0">
            <li class="float-left">
              <button class="button-menu-mobile open-left waves-effect"><i class="mdi mdi-menu"></i></button>
            </li>
          </ul>
        </nav>
      </div>
      <div class="left side-menu">
        <div class="slimscroll-menu" id="remove-scroll">
          <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
             
              <li class="menu-title"></li>           
             <li class="nav-item">
        <a class="waves-effect" id="activarRegistro" href="{{route('VerificarPerfilEvento', Crypt::encrypt($evento->id))}}">
        <i class="far fa-futbol"></i>
          <span>Equipos</span></a>
       <a class="waves-effect" id="activarRegistro"  href="{{route('Estadisticas', Crypt::encrypt($evento->id))}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Estadísticas</span></a>
           <a class="waves-effect" id="activarRegistro"  href="{{route('AgregarFecha', Crypt::encrypt($evento->id))}}">
       <i class="far fa-calendar-alt"></i>
        <span>Registrar fecha</span></a>
        <a  class="waves-effect" id="activarRegistro"  href="{{route('Fechas', Crypt::encrypt($evento->id))}}">
        <i class="far fa-calendar-check"></i>
        <span>Fechas deportivas</span></a>
         <a  class="waves-effect" id="activarRegistro"  href="{{route('Arbitro', Crypt::encrypt($evento->id))}}">
        <i class="fab fa-black-tie"></i>
        <span>Registrar árbitro</span></a>
          <li><a class="waves-effect" href="javascript:void(0);"><i class="fas fa-cogs"></i><span>Configuración<span class="float-right menu-arrow">
          <i class="mdi mdi-chevron-right"></i></span></span></a>
          <ul class="submenu">
          <li>
          <a  href="{{route('editEvento', Crypt::encrypt($evento->id))}}">Editar evento</a>
          <a href="{{route('DeleteEvento', Crypt::encrypt($evento->id))}}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" >Eliminar Evento</a></li>
          </ul>
          </li>
        </li>

            </ul>
          </div>
        </div>
      </div>
      <div class="content-page">
        <div class="content">
          <div class="container-fluid">
            <div class="page-title-box">
              <div class="row align-items-center">
                <div class="col-sm-6">
                  <h4 class="page-title">Inicio</h4>
                  
                </div>
              </div>
            </div>

<div class="container emp-profile">
   @include('flash::message')
        
              
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="/storage/{{$evento->Fotografia}}" alt=""/>
                            
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="profile-head">
                                    <h6>
                                       Evento Deportivo: {{$evento->Nombre}}
                                    </h6>
                                   {{--  <p class="proile-rating">ligas activas : <span>{{$ligas}}</span></p> --}}
                          
                        </div>
                    </div>                  
                    
        </div>
<hr class="featurette-divider">



<div class="row sm-gutter">
         

   <section  class="container">
    {{-- {agregar la ruta al random} --}}
  
@if(count($resultadoEquipos) > 3)
{!! Form::open(['route'=> 'Encuentros','id'=> 'CrearEvento', 'enctype'=>'multipart/form-data' , 'class'=>'form-horizontal','method' => 'POST']) !!}
  <div class="row">
      <input type="hidden" value="{{$evento->id}}" name="idEvento">
      <input type="hidden" name="variable">
      @foreach($EncuentrosCreados as $ens)
       @if($ens->EncuentrosCreados==1)
       <input type="hidden" value="1" name="variable">
       <div class="col-3">
          <label>Encuentros ya creados..</label>
          
       </div>
          <div class="col">
              <button class="btn btn-outline-warning">Eliminar encuentros creados</button>
          </div>
          {!! Form::close()!!}
       @else
  <div class="col-md-4"> 
  <article class="form-group">
    <h2>Dirección de partidos</h2>
    <hr>
    {!! Form::label('DireccionUnica', 'Dirección única')!!}
  <input type="checkbox" name="DireccionUnica" id="DireccionUnica" value="1" onchange="javascript:showContent()" />

</article>

<div id="content" style="display: none;">

<article class="form-group">
    {!! Form::label('Direccion', 'Ingrese direccion')!!}
    {!! Form::text('Direccion', null, ['class'=>'form-control','maxlength'=>'100','min'=>'0' ])!!}
</article>
  

 </div>
 <div class="form-group">
        <div class="form-row">           
        <div class="col-md-6">
 <input id="" name="users_id" type="hidden" value={{ Auth::user()->id}}>

              </div>     
                        
                      </div>
  <div class="form-action d-flex justify-content-end">
  
       
     

      <button class="btn btn-outline-primary">Generar Encuentros</button>

                      
                    </div>
                    </div>

{!! Form::close()!!}
@endif
@endforeach
</section>
@else
<h2>El numero de equipos creados no permite generar fechas deportivas</h2>
@endif
</div>



  <!-- /.row j.-->
              
            </div>  
            <hr class="featurette-divider">
            <?php $i =0 ?> 
            <div class="row">
            @foreach($EncuentrosCreados as $en)
            @if($en->EncuentrosCreados==1)
            @foreach ($resultadoEquipos as $fecha)
            
                <?php $i++;
                  $total = count($resultadoEquipos);
                
                ?>
           
                  <div class="card border-success mb-3" style="max-width: 18rem;">
                      {!! Form::open(['route'=> 'VerFechas','id'=> 'CrearEvento', 'enctype'=>'multipart/form-data' , 'class'=>'form-horizontal','method' => 'POST']) !!}
 
                      {{-- <div class="card-header">Header</div> --}}
                      <input id="" name="users_id" type="hidden" value={{ Auth::user()->id}}>
                      <input type="hidden" value="{{$evento->id}}" name="idEvento">
                      <input type="hidden" value="<?php echo $i; ?>" name="fecha">
                      <div class="card-body text-success">
                        <h6 class="card-title">{{'Encuentros fecha'. $i}}: </h5>
                        {{-- <p class="card-text">Encuentros </p> --}}
                        <button class="btn btn-outline-primary">Definir fechas</button>
                      </div>
                      {!! Form::close()!!}
                   
                    </div>
                  
            @endforeach
            @else 

            @endif
            @endforeach
          </div>
            </div>

         
          </div>
          
        </div>
      </div>
    </div>
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!--el otro template--> 
    {{-- <script src="{{asset('/Sport/js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('/Sport/js/jquery-migrate-3.0.1.min.js')}}"></script>
         <script src="{{asset('/Sport/js/jquery-ui.js')}}"></script>
         <script src="{{asset('/Sport/js/popper.min.js')}}"></script>
         <script src="{{asset('/Sport/js/bootstrap.min.js')}}"></script>
         <script src="{{asset('/Sport/js/owl.carousel.min.js')}}"></script>
         <script src="{{asset('/Sport/js/jquery.stellar.min.js')}}"></script>
         <script src="{{asset('/Sport/js/jquery.countdown.min.js')}}"></script>
         <script src="{{asset('/Sport/js/jquery.magnific-popup.min.js')}}"></script>
                <script src="{{asset('/Sport/js/aos.js')}}"></script>

                <script src="{{asset('/Sport/js/main.js')}}"></script>

    <script></script> --}}
  </body>
</html>