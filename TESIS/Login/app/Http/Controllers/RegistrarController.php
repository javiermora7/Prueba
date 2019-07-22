<?php

namespace Login\Http\Controllers;
use Illuminate\Http\Request;
use Login\User;
use Illuminate\Support\Facades\Auth;
use Login\TipoUsuario;
use Laracasts\Flash\Flash;
use Malahierba\ChileRut\ChileRut;
use Malahierba\ChileRut\Rules\ValidChileanRut;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Login\Http\Requests\UserRequest;
use Storage;
use File;
use Carbon\Carbon;
use Sesion;
use Redirect;
use Cookie;

use Illuminate\Support\Facades\DB;
class RegistrarController extends Controller
{
    public function index()
    {
        //
    }

  
    public function RegistroEmpresa()
    {
        return view('vistas.Registro.RegistroEmpresa');
    }

     public function create()
    {
        return view('vistas.Registro.Registro');
    }


    public function store(Request $request)
    {
           // $user = new User($request->all());
            $user = new User();
       
           $tipo="1";
           $estado="2";
           $user->Nombres= $request->Nombres;
           $user->Apellidos= $request->Apellidos;
           $user->Telefono= $request->Telefono;
           $user->Direccion= $request->Direccion;
           $user->password= bcrypt($request->password);
           $user->TipoUsuario_id = $tipo;      
           $user->NombreFacturacion= $request->NombreFacturacion;
           $user->RutFactiracion= $request->RutFactiracion;
           //giro
           $user->DireccionFacturacion= $request->DireccionFacturacion;
           $user->EstadosActivo_id = $estado;
           $user->Rut = $request->Rut;
           $user->email = $request->email;

            if (Input::hasFile('FotoPerfil')) {
                  
                $files = Input::file('FotoPerfil');
    
        foreach ($files as  $file) {
                    
                    $carbon =  Carbon::now();
                    $url= $carbon->minute.'_'.$carbon->second.$file->getClientOriginalName();
                    //agregar funcion para permitir foto sin espacio
                    $url= substr($url, 0,20);
                    Storage::disk('public')->put($url, File::get($file));                  
                    $user->FotoPerfil = $url;
                    
                     }
                   }
        $rut = $request->Rut;
        $email = $request->email;
        $chilerut = new ChileRut;
        $validator = new \EmailValidator\Validator();
        $chilerut->check($rut);
        $validar = User::where('email',$request->email)->first();
        $ValidarRut = User::where('Rut',$request->Rut)->first();

           //registra
            if(($validar == false) && ($ValidarRut == false) && ($chilerut->check($rut) == true )&&($validator->hasMx($email) == true)){

      
                   
              $user->save();
             Flash::success("bienvenido, inicie sesión" ." ". $user->Nombres);
             return redirect()->route('entrar');
             }
             //correo registrado
            elseif (($validar == true) && ($ValidarRut == false) && ($chilerut->check($rut) == true )&&($validator->hasMx($email) == true)){
            
                return redirect()->route('registrar')->withErrors(['Correo ya registrado']);   
             }
             //rut registrado
              elseif (($validar == false) && ($ValidarRut == true) && ($chilerut->check($rut) == true )&&($validator->hasMx($email) == true)){
            
                return redirect()->route('registrar')->withErrors(['Rut ya registrado']);   
             }
             //rut incorrecto
             elseif (($validar == false)  && ($ValidarRut == false) && ($chilerut->check($rut) == false )&&($validator->hasMx($email) == true)){
               
             return redirect()->route('registrar')->withErrors(['Rut incorrecto']);   

             }
             //correo invalido
              elseif (($validar == false) && ($ValidarRut == false) && ($chilerut->check($rut) == true )&&($validator->hasMx($email) == false)){
               
             return redirect()->route('registrar')->withErrors(['Correo invalido']);   

             }

             //correo registrado y rut incorrecto
             elseif (($validar == true) && ($ValidarRut == false) && ($chilerut->check($rut) == false )&&($validator->hasMx($email) == true)){
               
              return redirect()->route('registrar')->withErrors(['Correo ya registrado','Rut incorrecto']);   

             }
             //correo registrado y rut registrado
             elseif (($validar == true)  && ($ValidarRut == true) && ($chilerut->check($rut) == true )&&($validator->hasMx($email) == true)){
               
              return redirect()->route('registrar')->withErrors(['Correo ya registrado','Rut ya registrado']);   


             }
             //correo invalido y rut incorrecto

             elseif (($validar == false) && ($ValidarRut == false) && ($chilerut->check($rut) == false )&&($validator->hasMx($email) == false)){
               
              return redirect()->route('registrar')->withErrors(['Rut incorrecto','Correo invalido']);   

             }

              //correo invalido y rut registrado

             elseif (($validar == false) && ($ValidarRut == true) && ($chilerut->check($rut) == true )&&($validator->hasMx($email) == false)){
               
              return redirect()->route('registrar')->withErrors(['Rut ya registrado','Correo invalido']);   

             }         
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}


