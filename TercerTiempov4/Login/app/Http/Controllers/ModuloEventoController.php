<?php

namespace Login\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Login\User;
use Login\TipoUsuario;
use Login\EstadoActivo;
use Login\Categoria;
use Login\Modalidad;
use Login\Evento;
use Login\Equipo;
use \Http\Controllers\Crypt;
use Illuminate\Support\Facades\Input;
use Storage;
use File;
use Carbon\Carbon ;

use Sesion;
use Redirect;
use Cookie;

class ModuloEventoController extends Controller
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
        //
    }

   
    public function store(Request $request)
    {
        //dd($request);
        $evento = new Evento();
        $evento->user;
        $evento->categoria;
        $evento->estadoactivo;
        $evento->Encuentros;
        
    
       
           
        $estado="2";
      
            $evento ->Nombre = $request->Input('Nombre');
            $evento ->Direccion = $request->Input('Direccion');
            $evento ->FechaInicio = $request->Input('FechaInicio');
            $evento ->Cupos =  $request->Input('Cupo');
            $evento ->Region =  $request->Input('Region');
            $evento ->Comuna =  $request->Input('Comuna');
            $evento ->Descripcion= $request->Input('descripcion');
            $evento ->Categorias_id = $request->Input('categoria');
            $evento ->RangoEdadMin = $request->Input('RangoEdadMin');
            $evento ->RangoEdadMax =  $request->Input('RangoEdadMax');
            $evento ->users_id = Auth::user()->id;
            $evento ->EstadosActivo_id = $estado; 
            
            $evento ->Modalidad_id = $request->Input('modalida');           
            

            $evento ->save();
       

        if (Input::hasFile('Fotografia')) {

                $files = Input::file('Fotografia');

                  foreach ($files as  $file) {

                    
                    $carbon =  Carbon::now();

                    $url= $carbon->minute.'_'.$carbon->second.$file->getClientOriginalName();
                    Storage::disk('public')->put($url, File::get($file));
                    
                    $evento->Fotografia = $url;

                   $evento->save();




                }
            }
        Flash::warning("el EVENTO" ." ". $evento->Nombre." ". " ha sido registrado exitosamente");
           return redirect()->route('perfil');
    }

   

 public function verificar($id)
    {

        //verificar si el evento pertenece al usuario y redireccionar al perfil
        $id =  decrypt($id);
   $user =  Auth::user();
$producto =  Evento::find($id);
 $producto->categoria;
 $producto->user;
$xd = $id;

  if ( $producto->users_id == $user->id ) {
         return view('vistas.Evento.Evento',['producto' =>$producto]);
  }
     Flash::success("no tienes permisos");
         return redirect()->route('perfil');
    }



public function show($id)
    {
   //este odigo ya no sirve lo hice en otra funcion arriva
    /*
        $id =  decrypt($id);
  
             
        $producto= Evento::find($id);
          //$categoria =  Categoria::orderBy('id','ASC')->pluck('nombre','id');

        return view('vistas.Evento.Evento',['producto' =>$producto]);*/
    }

   
    public function edit($id)
    {
        
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        
    }
}
