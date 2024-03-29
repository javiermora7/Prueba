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
    <!-- Data tdable-->
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
       @include('vistas.layouts.NavNat')
      
      <div class="content-page">
        <div class="content">
          <div class="container-fluid">
            <div class="page-title-box">
              <div class="row align-items-center">
                <div class="col-sm-6">
                  <h4 class="page-title">Nuevo Usuario</h4>
                 
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <fieldset>
                  <h5 class="fieldset-tile">Datos de la empresa</h5>
                @if($errors->any())
      <div class="alert alert-danger">
      <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
  </div>
        @endif
                      
{!! Form::open(['route'=> 'users.store','id'=> 'signupForm','enctype'=>'multipart/form-data' , 'method' => 'POST']) !!}
                    <div class="row">
                      <div class="col-md-4">
                  
     <article class="form-group">
      {!! Form::label('Nombres', 'Nombres')!!}
      {!! Form::text('Nombres', null, ['class'=>'form-control', 'title' =>'Ingrese un nombre','required', 'placeholder'=>'Primer nombre'])!!}
     </article>      
      <article class="form-group">
      {!! Form::label('DireccionFacturacion', 'Giro de la empresa')!!}
      {!! Form::text('DireccionFacturacion', null, ['class'=>'form-control', 'title' =>'Ingrese giro','required', 'placeholder'=>'Giro'])!!}
      </article>       
      <article class="form-group">
          {!! Form::label('Rut', 'Rut de empresa')!!}
          {!! Form::text('Rut', null, ['class'=>'form-control', 'title' =>'Ingrese Rut','required'])!!}
      </article>      
      <article class="form-group">
      {!! Form::label('Telefono', 'Telefono')!!}
      {!! Form::number('Telefono', null, ['class'=>'form-control', 'title' =>'Ingrese un número telefonico','required', 'placeholder'=>'Telefono'])!!}
      </article>
      <article class="form-group">
    {!! Form::label('FotoPerfil[]', 'Seleccione una foto')!!}
    {!! Form::file('FotoPerfil[]', null, ['class'=>'form-control', 'title' =>'Seleccione una foto','required', 'type'=>'file','accept'=>'jpg,.png', 'placeholder'=>''])!!}
</article>
                </div>      
                      <div class="col-md-4">
                        <article class="form-group">
    {!! Form::label('email', 'email')!!}
    {!! Form::email('email', null, ['class'=>'form-control', 'title' =>'Ingrese un email','required', 'placeholder'=>'example@gmail.com'])!!}
    </article>
          <div class="form-group">
            <div class="form-row">

              <div class="col-md-6">
    <article class="form-group">
    {!! Form::label('password', 'password')!!}
    {!! Form::password('password',['class'=>'form-control', 'required', 'placeholder'=>'**********'])!!}
    </article>
              </div>

              <div class="col-md-6">
    <article class="form-group">
    {!! Form::label('confirm_password', 'Repita Contraseña')!!}
    {!! Form::password('confirm_password',['class'=>'form-control', 'required', 'placeholder'=>'**********'])!!}
    <span id="error" ></span>
   </article>
              </div>
                <div class="col-md-6">
    <article class="form-group">
    {!! Form::label('Direccion', 'Direccion')!!}
    {!! Form::text('Direccion', null, ['class'=>'form-control', 'title' =>'Ingrese una dirección','required', 'placeholder'=>'Direccion'])!!}
    </article>
              </div>
             
                        
                      </div>
<div class="form-action d-flex justify-content-end"><a class="btn btn-link" href="{{ 'index' }}">Cancelar</a>
                      <button class="btn btn-secondary">Guardar</button>
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
     <script type="text/javascript">
  jQuery(document).ready(function($){
    $('#Rut').rut();
  });
  </script>
 
  </body>
</html>