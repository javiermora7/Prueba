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
    <link rel="stylesheet" type="text/css" href="{{asset('/css/ListaEven.css')}}">


    <link rel="stylesheet" type="text/css" href="{{asset('/css/perfil/perfil.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    
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
                 <a class="dropdown-item" href="{{route('EditPerfil', Crypt::encrypt($user->id))}}">
                  <i class="fas fa-edit"></i></i>Editar Perfil</a>
                  <a class="dropdown-item" href="{{route('EditarClave', Crypt::encrypt($user->id))}}"><i class="fas fa-key"></i></i>Editar Clave</a>
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
                <a class="waves-effect"  href="{{route('perfil')}}"><i  class="mdi mdi-account-circle m-r-5"></i><span>Mi perfil</span></a>
              <a class="waves-effect" id="activarRegistro"  href="{{'CrearEvento'}}"><i class="fas fa-running"></i>
              <span>Crear Campeonato</span></a>
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
                            <img src="/storage/{{$user->FotoPerfil}}" alt=""/>
                            
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        {{ $user->Nombres}}  {{ $user->Apellidos}}
                                    </h5>
                                    <h6>
                                        Administrador 
                                    </h6>
                                    <p class="proile-rating">ligas activas : <span>{{$ligas}}</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Información</a>
                                </li>
                             
                            </ul>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                          
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                               <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Correo</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->email}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Telefono</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->Telefono}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Dirección</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->Direccion}}</p>
                                            </div>
                                        </div>
                                    
                            </div>
                          
                        </div>
                    </div>
                </div>
            </form>           
        </div>

            
           <h3 class="my-4">Ligas Registradas</h3>

  <div class="row">

     @if(count($campeonato) > 0)
     @foreach($campeonato as $campeonatos)
                 
          <div class="cards">
            <div class="" style="width: 18rem;">
            <img id="xxdd" class="card-img-top" src= "/storage/{{$campeonatos->Fotografia}}">
            <div class="card-body">
              <h5 class="card-title">{{$campeonatos->id}}</h5>
               <p class="card-text">{{$campeonatos->Nombre}}</p>
              <?php $estado = array($campeonatos) ?>
             
              @if($estado[0]->EstadosActivo_id == 2) 
              <a href="{{route('VerificarPerfilEvento', Crypt::encrypt($campeonatos->id))}}" class="btn btn-primary">ver perfil</a>
              @elseif($estado[0]->EstadosActivo_id == 1) 
              <a href="http://127.0.0.1:8000/khipu/{{$campeonatos->id}}" value="{{$campeonatos->id}}" class="btn btn-warning activar">activar</a>
              @elseif($estado[0]->EstadosActivo_id == 3) 
            <a href="http://127.0.0.1:8000/khipu/{{$campeonatos->id}}" value="{{$campeonatos->id}}" class="btn btn-danger pagar">Pagar Eventor</a>
              @endif
            </div>
          </div>
          </div>
     @endforeach
     @else
      <div class="alert alert-warning">
        <strong>Lo siento!</strong> no haz creado campeonatos.
    </div> 
    @endif
             

 
  </div>
    {!! $campeonato->render() !!}
  <!-- /.row j.-->
              
           
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