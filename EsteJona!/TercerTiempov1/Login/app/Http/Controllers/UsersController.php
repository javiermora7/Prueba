<?php

namespace Login\Http\Controllers;

use Illuminate\Http\Request;
use Login\User;
use Illuminate\Support\Facades\Auth;
use Login\TipoUsuario;
use Login\Categoria;
use Laracasts\Flash\Flash;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Login\Http\Requests\CategoriaRequest;
use Login\Http\Requests\UserRequest;
use Malahierba\ChileRut\ChileRut;
use Malahierba\ChileRut\Rules\ValidChileanRut;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{

   function __construct(){
     
    $this->middleware('natural');    

    }

    public function index()
    {
        //
    }

    public function create()
    {
        
    }

    public function store(Request  $request)
    {
        

    }

    public function show($id)
    {
        //
    }

   
public function edit($id){
      
        $id =  decrypt($id);
        $user= User::find($id);

    return view('vistas.Perfiles.EditarPerfil',['user' =>$user]);
    }

   
public function update(Request $request, $id)
     {  
        $users= User::find($id);
        $users->Nombres = $request->Nombres;
        $users->Apellidos = $request->Apellidos;
        $users->Telefono= $request->Telefono;
        //$users->password = bcrypt($request->password);
        $users->Direccion = $request->Direccion;
        $users->NombreFacturacion = $request->Apellido;
        $users->RutFactiracion = $request->Telefono;
        $users->DireccionFacturacion = $request->name;
        $rut = $request->Rut;
        $chilerut = new ChileRut;     
if ($request->password ==  null) {

    $users ->password = $users ->password;
    
}else{
           $users ->password =  bcrypt($request->password);

}

if ($chilerut->check($rut)){
     $users->save();     
 Flash::warning("el usuario" ." ". $users->Nombres." ". " ha sido editado exitosamente");
 return redirect()->route('perfil'); 
 } else{
     $id = encrypt($id);
 return redirect()->route('EditPerfil', [$id])->withErrors(['Rut incorrecto']);
    }    
    }



public function EditarClave($id){
       
        $id =  decrypt($id);
        $user= User::find($id);

    return view('vistas.Perfiles.EditarClave',['user' =>$user]);
    }


public function updateclave(Request $request, $id)
     {  
         $id =  decrypt($id);
         $user= User::find($id);
        
        $oldpassword = $request->oldpassword;
        $newpassword = $request->password;
    if(!Hash::check($oldpassword, Auth::user()->password)){
        Flash::warning("La contraseña actual no es correcta");
        return view('vistas.Perfiles.EditarClave',['user' =>$user]);
    }
 $request->user()->fill(['password'=>Hash::make($newpassword)])->save();
Flash::warning("Contraseña actualizada correctamente");
return redirect()->route('perfil');      
    }




    public function destroy($id)
    {
        
   

    }
}
