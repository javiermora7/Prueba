<?php

namespace Login\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Login\User;
use Login\TipoUsuario;
use Login\Categoria;
use Login\Evento;
use Login\Equipo;

use Illuminate\Support\Facades\Input;
use Storage;
use File;
use Carbon\Carbon ;

use Sesion;
use Redirect;
use Cookie;


class ModuloEquipo extends Controller
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
        
      $user = Auth::user();
      $user->estadoactivo;
      $user->tipousuario;
      
           $prueba= '1';

      $Equipo = new Equipo();
      
            $Equipo->E_Nombre = $request->Input('E_Nombre');
	        $Equipo->E_puntuacion = $request->Input('E_puntuacion');
	        $Equipo->E_PartidosJugados = $request->Input('E_PartidosJugados');
	        $Equipo->E_PartidosGanados =  $request->Input('E_PartidosGanados');
	        $Equipo->E_PartidosPerdidos =  $request->Input('E_PartidosPerdidos');
	        $Equipo->E_PartidosEmpatados =  $request->Input('E_PartidosEmpatados');
	        $Equipo->E_GolesRealizados = $request->Input('descriptionE_GolesRealizadose');
	         $Equipo->Evento_id = $request->Input('prodId');

        $Equipo->save();


        if (Input::hasFile('E_Logo')) {

	            $files = Input::file('E_Logo');

 

	              foreach ($files as  $file) {

	                
	                $carbon =  Carbon::now();

	                $url= $carbon->minute.'_'.$carbon->second.$file->getClientOriginalName();
                     $url= substr($url, 0,20);
	                Storage::disk('public')->put($url, File::get($file));
	                
	                $Equipo->E_Logo = $url;

	               $Equipo->save();




	            }
	        }
       
        
  
      Flash::warning("el Equipo" ." ". $Equipo->E_Nombre." ". " ha sido registrado exitosamente");
      $fk= $request->Input('prodId');
      $id = encrypt($fk);
  

         
          return redirect()->route('VerificarPerfilEvento', [$id]);

    }


 
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {$id =  decrypt($id);
        $user= User::find($id);

    return view('Inicio.Edicion.EditarUsuario',['user' =>$user]);
    }

  
    public function update(UserRequest $request, $id)
    {
         
   
      
    }

 
    public function destroy($id)
    {
        
 

    }
}
