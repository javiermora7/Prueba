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

class UsersController extends Controller
{

   function __construct(){
     
    $this->middleware('natural');    

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request)
    {
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
      
        $id =  decrypt($id);
        $user= User::find($id);

    return view('vistas.Perfiles.EditarPerfil',['prueba' =>$user]);
    }

   
       public function update(Request $request, $id)
    {

        $users= User::find($id);
   
        $users->Nombres = $request->Nombres;
        $users->Apellidos = $request->Apellidos;
        $users->Rut = $request->Rut;
        $users->Telefono= $request->Telefono;
        $users->password = bcrypt($request->password);
        $users->Direccion = $request->Direccion;
        $users->NombreFacturacion = $request->Apellido;
        $users->RutFactiracion = $request->Telefono;
        $users->DireccionFacturacion = $request->name;
       
        

        if ($users->save()) {
           return response()->json([
                'success' => true,
                'msg'     => 'Operacion exitosa'
                
           ]);
        } else {
            return response()->json([
                'success' => false,
                'error'   => 'Operacion erronea'
           ]);
        }
        
    //Flash::warning("el usuario" ." ". $users->Nombres." ". " ha sido editado exitosamente");
         //
         //  return redirect()->route('perfil');
   
      
    }

  
    public function destroy($id)
    {
        
   

    }
}
