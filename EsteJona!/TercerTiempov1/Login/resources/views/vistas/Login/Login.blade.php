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

    <meta name="csrf-token" content="{{ csrf_token() }}">
   
  </head>
  <body>

    <div class="home-btn d-none d-sm-block"><a class="text-white" href="inde.html"><i class="fas fas-home h2"></i></a></div>
    <div class="accountbg"></div>

    <div class="wrapper-page account-page-full">

      <div class="card">
        <div class="card-body">
          <div class="text-center"><a class="logo" href="{{route('index')}}"><img src="{{asset('/Componentes/assets/images/tercer.png')}}" width="200" alt="logo"></a></div>
          <div class="p-3">
            <h4 class="font-1 m-b-5 text-center">Bienvenido</h4>
            <p class="text-mmuted text-center">Ingresa para conocer una nueva forma de adminitrar tus campeonatos</p>
       <!--lo de abajo captura los errores de inicio de sesion-->
        @include('flash::message')
                @if(count($errors)>0)
        <div class="alert alert-danger" >
             <ol>
        @foreach($errors->all() as $error)
             <li>{{$error}}</li>
        @endforeach
             </ol>
             </div>
        @endif
             
                {!!Form::open(['route' => 'login', 'method' =>'POST', 'class' => 'form-horizontal']) !!}
              <div class="form-group">
                <label for="username">Usuario</label>
                <input class="form-control" type="text" name="email" id="inputEmail" placeholder="Nombre de Usuario">
              </div>
              <div class="form-group">
                <label for="userpassword">Contraseña</label>
                <input class="form-control" name="password" id="inputPassword" type="password">
              </div>
              <div class="form-group row mt-20">
                <div class="col-sm-6">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="customControlInline">
                    <label class="custom-control-label" for="customControlInline">Recordarme</label>
                  </div>
                </div>
               
              </div>
              <div class="form-group row mt-20">
                <div class="col-sm-6 text-right">
                  <a class="btn btn-primary w-md waves-effect waves-light"  href="{{route('index')}}" >inicio</a>
                </div>
               <div class="col-sm-6 text-right">
                  <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Ingresar</button>
                </div>
            </div>
            
              <div class="form-group row mt-20">
                <div class="col-sm-6 text-right"><a href="recovery.html"><i class="mdi mdi-lock"></i>Recuperar contraseña</a></div>

                <div class="col-sm-6 text-right"><a href="{{route('registrar')}}"><i class="fas fa-users"></i>Registrate</a></div>
              </div>
              {!!Form::close()!!}
             
            </form>
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