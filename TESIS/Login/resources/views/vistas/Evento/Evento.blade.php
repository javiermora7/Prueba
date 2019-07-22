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
    <link rel="stylesheet" type="text/css" href="{{asset('/css/ListaEven.css')}}">d


    <link rel="stylesheet" type="text/css" href="{{asset('/css/perfil/perfil.css')}}">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.3&appId=259367744717308&autoLogAppEvents=1"></script>
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
        <span> Registrar árbitro</span></a>
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
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="/storage/{{$evento->Fotografia}}" alt=""/>
                            
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        {{$evento->Nombre}}
                                    </h5>
                                    <h6>
                                       Evento Deportivo
                                    </h6>
                                   {{--  <p class="proile-rating">ligas activas : <span>{{$ligas}}</span></p> --}}
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Información del evento</a>
                                </li>
                              
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                          <h1>Descripción</h1>
                           <p>{{$evento->Descripcion}}</p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                               <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nombre organizador:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$evento->user->Nombres}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Región:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$evento->Region}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Comuna:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$evento->Comuna}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Dirección</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$evento->Direccion}}</p>
                                            </div>
                                        </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                                <label>Correo:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$evento->user->email}}</p>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                                <label>Categoria:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$evento->categoria->Categorias}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Modalidad:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$evento->modalidad->Modalidad}}</p>
                                            </div>
                                        </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </form>           
        </div>
<hr class="featurette-divider">
            <div class="row sm-gutter">
         

   <section  class="container">
    

    <h1>Registro de equipo</h1>
    
{!! Form::open(['route'=> 'Equipo.store','id'=> 'CrearEvento', 'enctype'=>'multipart/form-data' , 'class'=>'form-horizontal','method' => 'POST']) !!}

    <div class="form-group">
                  
              <div class="col-md-9">
      <article class="col-md-6">
      {!! Form::label('E_Nombre', 'Nombre del equipo')!!}
      {!! Form::text('E_Nombre', null, ['class'=>'form-control', 'title' =>'Ingrese un nombre del ','required', 'placeholder'=>'Ingrese nombre del equipo'])!!}
     </article>
              </div>
              <div class="col-md-6">
     <article class="col-md-9">
     {!! Form::label('E_Logo[]', 'Seleccione logo ')!!}
     {!! Form::file('E_Logo[]', null, ['class'=>'form-control', 'type'=>'file','accept'=>'jpg,.png', 'placeholder'=>''])!!}
     </article>
              </div>
         
     </div>
  <input id="Evento_id" name="Evento_id" type="hidden" value={{$evento->id}}>
     <article class="form-group">  
     {!! Form::submit('Crear', ['class'=>'btn btn-primary crear'])!!}     
     </article>
{!! Form::close()!!}
</section>


  <!-- /.row j.-->
              
            </div>

           <h3 class="my-4">Equipos Registrados</h3>
              <div class="row">
  @if(count($lista) > 0)
      @foreach($lista as $listas)
             <div class="cards">
          <div class="" style="width: 18rem;">
          <img id="xxdd" class="card-img-top" src= "/storage/{{$listas->E_Logo}}">
          <div class="card-body">
            <h5 class="card-title">{{$listas->id}}</h5>
             <p class="card-text">{{$listas->E_Nombre}}</p>
            <a href="{{route('VerificarPerfilEquipo', array(Crypt::encrypt($listas->id), $evento->id))}}" class="btn btn-primary">ver perfil</a>
          </div>
        </div>
        </div>

     @endforeach
     @else
      <div class="alert alert-warning">
        <strong>Lo siento!</strong> no haz registrado equipos.
    </div> 
  @endif

</div>
  {!! $lista->render() !!}
    
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
    <script></script>
  </body>
</html>