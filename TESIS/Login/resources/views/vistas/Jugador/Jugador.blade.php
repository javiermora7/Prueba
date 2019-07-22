<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon"  href="{{asset('/Componentes/assets/images/tercer.png')}}">

      <!-- Chartist Chart CSS -->
     <link rel="stylesheet"  href="{{asset('/Componentes/plugins/chartist/css/chartist.min.css')}}">
    <!-- Bootstrap 4.0-->
    <link rel="stylesheet"  href="{{asset('/Componentes/assets/css/bootstrap.min.css')}}">
    <!-- Data picker-->
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
 <style type="text/css">
  .rut-error{
    color: #red;
    font-weight: 200;
    background-color: white;
    padding: 3px 10px;
    display: inline-block;
    margin: 1px;
  }
  </style>
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
          <a href="{{route('DeleteEvento', Crypt::encrypt($evento->id))}}" onclick="return confirm('¿Seguro que deseas eliminar este registro?')" >Eliminar evento</a></li>
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
                  <h4 class="page-title">Nuevo jugador</h4>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <fieldset>
                  <h5 class="fieldset-tile">Datos del jugador</h5>
                   @if(count($errors)>0)
             <div class="alert alert-danger col-sm"  >
      <ol>
           @foreach($errors->all() as $error)
              <li>{{$error}}</li>
        @endforeach
      </ol>
  </div>
        @endif
                      
    
{!! Form::open(['route'=> 'equipo.store','id'=> 'signupForm', 'enctype'=>'multipart/form-data' , 'class'=>'form-horizontal','method' => 'POST']) !!}
                    <div class="row">
                      <div class="col-md-4">
     {{ csrf_field() }}
      <input type="hidden" value="{{$equipo->id}}" name=idEquipo>
      <input type="hidden" value="{{$evento->id}}" name=idEvento>
      <input class="form-control" type="hidden"  value="1" name="validador" >
                  
     <article class="form-group">
    {!! Form::label('Pa_Nombre', 'Nombre del jugador')!!}
    {!! Form::text('Pa_Nombre', null, ['class'=>'form-control',  'title' =>'Ingrese un nombre','required', 'placeholder'=>'Nombre del jugador'])!!}
     </article> 
     <div class="form-group">
                          <label>Apellido</label>
                          <input class="form-control" type="text" required placeholder="Ingrese apellido" name="Pa_Apellido" >
     </div>   

    <div class="form-group">
                    <label>Correo</label>
                    <input class="form-control" type="email" placeholder="ingrese un correo"  required name="Pa_Correo" >
    </div>    

      <article class="form-group">
      <label for="Pa_FechaNacimiento">Fecha de nacimiento, rango de edad del evento ({{$RangoMin}} -> {{$RangoMax}})</label>
    <input class="form-control" title="{{-- Ingrese una fecha de inicio --}}" required="" placeholder="**/**/****" name="Pa_FechaNacimiento" type="date" id="Pa_FechaNacimiento">
      </article>  
  </div>   

  <div class="col-md-4">
    <article class="form-group">
    {!! Form::label('Pa_imga[]', 'Seleccione una foto')!!}
    {!! Form::file('Pa_img[]', null, ['class'=>'form-control', 'title' =>'Seleccione una foto','required', 'type'=>'file','accept'=>'jpg,.png', 'placeholder'=>''])!!}
</article>
   {{-- <div class="form-group">
    <label></label>
    <input class="form-control" type="text" required name="Ju_Posicion" >
   </div> --}}

<article class="form-group">
    <label for="Categorias_id">Posición del jugador</label>
    <select class="form-control" title="Seleccione una posición" required="" id="Ju_Posicion" name="Ju_Posicion">
      <option selected="selected" value="">Seleccione una posición</option>
      <option value="Arquero">Arquero</option>
      <option value="Lateral">Lateral</option>
      <option value="Central">Central</option>
      <option value="Centrocampista">Centrocampista</option>
      <option value="Delantero">Delantero</option>
    </select>
    <div id="categ"></div>
</article>


 

   <article class="form-group">
    {!! Form::label('Ju_Numero', 'Número de camiseta (1 a 99)')!!}
    {!! Form::number('Ju_Numero', null, ['class'=>'form-control', ' title' =>'Ingrese un número correcto', 'min' =>'1', 'max' =>'99','pattern'=>'^[1-9]\d*$', 'required', 'placeholder'=>'ingrese número de camiseta'])!!}
</article>
     <article class="form-group">
          {!! Form::label('Rut', 'Rut')!!}
          {!! Form::text('Rut', null, ['class'=>'form-control', 'title' =>'Ingrese un Rut','required'])!!}
      </article> 
   <div class="form-row">
            
   <div class="col-md-6">
    
<input id="" name="users_id" type="hidden" value={{ Auth::user()->id}}>
<input id="" name="EstadosActivo_id" type="hidden" value="2">
              </div>     
                        
                      </div>
<div class="form-action d-flex justify-content-end"><a class="btn btn-link" href="{{ URL::previous() }}">Cancelar</a>
                      <button id="enviar" class="btn btn-secondary">Crear</button>
                    </div>
                    </div>
                    
                  {!!Form::close()!!}
                </fieldset>
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
    <!--js propios-->
     <script src="{{ asset('/js/Rut.js') }}" type="text/javascript"></script>
     <script src="{{ asset('/js/jquery.rut.chileno.js') }}" type="text/javascript"></script>
     <script src="{{ asset('/js/jquery.rut.chileno.min.js') }}" type="text/javascript"></script>
     <script src="{{ asset('/js/Clave.js') }}" type="text/javascript"></script>
     <script src="{{ asset('/js/jquery.validate.min.js') }}" type="text/javascript"></script>
     <script src="{{ asset('/js/jquery.validate.js') }}" type="text/javascript"></script>
          <script src="{{ asset('/js/regioncomuna.js') }}" type="text/javascript"></script>
      <script type="text/javascript">
  jQuery(document).ready(function($){
    $('#Rut').rut();
  });
  </script>
 
  </body>
</html>