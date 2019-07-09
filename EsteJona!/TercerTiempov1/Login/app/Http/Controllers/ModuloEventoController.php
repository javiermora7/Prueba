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
use Symfony\Component\HttpFoundation\StreamedResponse;
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

  //COPIAR ESTO EN EL PROYECTO NUEVO
   public function create()
    {
        $user =  User::find(Auth::user()->id);
         $user->estadoactivo;
        $user->tipousuario;
        

        $categoria =  Categoria::orderBy('id','ASC')->pluck('Categorias','id');
        $modalidad =  Modalidad::orderBy('id','ASC')->pluck('Modalidad','id');
 
        return view('vistas.Evento.CrearEvento',['user' =>$user, 'categoria'=>  $categoria, 'modalidad'=>  $modalidad]);
 
        
    }

   
    public function store(Request $request)
    {
        
        $evento = new Evento();
       
        $estado="3";
      
            $evento ->Nombre = $request->Input('Nombre');
            $evento ->Direccion = $request->Input('Direccion');
            $evento ->FechaInicio = $request->Input('FechaInicio');
            $evento ->Cupos =  $request->Input('Cupos');
            $evento ->Region =  $request->Input('Region');
            $evento ->Comuna =  $request->Input('Comuna');
            $evento ->Descripcion= $request->Input('Descripcion');
            $evento ->Categorias_id = $request->Input('Categorias_id');
            $evento ->RangoEdadMin = $request->Input('RangoEdadMin');
            $evento ->RangoEdadMax =  $request->Input('RangoEdadMax');
            $evento ->users_id = $request->Input('users_id');
            $evento ->EstadosActivo_id = $estado;
            $evento ->Modalidad_id = $request->Input('Modalidad_id');           
            $evento ->save();
       
      
        

        if (Input::hasFile('Fotografia')) {

                $files = Input::file('Fotografia');
    
        foreach ($files as  $file) {
                    
                    $carbon =  Carbon::now();
                    $url= $carbon->minute.'_'.$carbon->second.$file->getClientOriginalName();
                    //agregar funcion para permitir foto sin espacio
                    $url= substr($url, 0,20);
                    Storage::disk('public')->put($url, File::get($file));                  
                    $evento->Fotografia = $url;
                    $evento->save();
                     }
        }
        Flash::warning("el EVENTO" ." ". $evento->Nombre." ". " ha sido registrado exitosamente, tienes 24 Horas para cancelar el evento.");
           return redirect()->route('perfil');
    }

   
 //verificar si el evento pertenece al usuario y redifreccionar al perfil
 public function verificar($id)
    {
        
    //id sesion iniciada
    $id =  decrypt($id);
    $user =  Auth::user();
    //id del evento seleccionado para ver el perfil
    $evento =  Evento::find($id);
    $evento->categoria;
    $evento->user;
    $evento->estadoactivo;
    $xd = $id;

  if ( $evento->users_id == $user->id ) {

   $lista = DB::table('Evento')->orderBy('id','ASC')
           //listar equipo
            ->join('Equipo','Evento.id', '=', 'Equipo.Evento_id')
            ->where('evento.users_id', '=', Auth::user()->id)
            ->where('Evento.EstadosActivo_id', '=', 2)
            ->where('Equipo.Evento_id', '=', $id)
            ->where('Equipo.EstadosActivo_id', '=', 2)
            ->select('Equipo.id','Equipo.Evento_id','Equipo.E_Nombre' ,'Equipo.E_Logo')->paginate(6);
            
    if($lista) {
             
              return view('vistas.Evento.Evento',['evento' =>$evento,'lista'=>$lista]);
    
    }else{

         Flash::success("no tienes permisos");
         return redirect()->route('perfil');
    }
  }
         Flash::success("no tienes permisos");
         return redirect()->route('perfil');
}


 



public function show($id)
    {
  
    }

   
    public function edit($id)
    {
        $id =  decrypt($id);    
        $evento= Evento::find($id);
        $categoria =  Categoria::orderBy('id','ASC')->pluck('Categorias','id');
        $modalidad =  Modalidad::orderBy('id','ASC')->pluck('Modalidad','id');
//listo los equipos del evento para el side
        $lista = DB::table('Evento')->orderBy('id','ASC')
                                    ->join('Equipo','Evento.id', '=', 'Equipo.Evento_id')
                                    ->where('evento.users_id', '=', Auth::user()->id)
                                    ->where('Equipo.Evento_id', '=', $id)
                                    ->select('Equipo.id','Equipo.Evento_id','Equipo.E_Nombre' ,'Equipo.E_Logo')
                                    ->paginate(6);


        return view('vistas.Evento.EditarEvento',['evento' => $evento,'categoria' =>$categoria, 'modalidad' =>$modalidad]);

    }

    
    public function update(Request $request, $id)
    {

        //dd($request);
        
        $evento = Evento::find($id);
           
        $evento->user;
        $evento->categoria;
        $evento->estadoactivo;
        $evento->Encuentros; 
        $estado="2";
            $evento ->Nombre = $request->Nombre;
            $evento ->Direccion = $request->Direccion;
            $evento ->FechaInicio = $request->FechaInicio;
            $evento ->Cupos =  $request->Cupo;
            $evento ->Descripcion= $request->descripcion;
            $evento ->RangoEdadMin = $request->RangoEdadMin;
            $evento ->RangoEdadMax =  $request->RangoEdadMax;
            $evento ->users_id = Auth::user()->id;
            $evento ->EstadosActivo_id = $estado; 
            
                
            
if ($request->categoria ==  null) {

    $evento ->Categorias_id = $evento->Categorias_id;
    
}else{
            $evento ->Categorias_id = $request->categoria;

}
//////////////////////////
if ($request->modalida ==  null) {

    $evento ->Modalidad_id = $evento ->Modalidad_id;
    
}else{
            $evento ->Modalidad_id = $request->modalida;  

}
/////////////////

if ( $request->Region ==  null) {

    $evento->Region =  $evento->Region;
    
}else{
              
            $evento->Region =  $request->Region;

}

if ($request->Comuna ==  null) {

    $evento ->Comuna =  $evento ->Comuna;
    
}else{
              
           
 $evento ->Comuna =  $request->Comuna;
}


            $evento ->save();
       

        if (Input::hasFile('Fotografia')) {

                $files = Input::file('Fotografia');

                  foreach ($files as  $file) {

                    
                    $carbon =  Carbon::now();

                    $url= $carbon->minute.'_'.$carbon->second.$file->getClientOriginalName();
                       $url= substr($url, 0,20);
                    Storage::disk('public')->put($url, File::get($file));
                    
                    $evento->Fotografia = $url;

                   $evento->save();




                }
            }
//listo los equipos del evento
        $lista = DB::table('Evento')->orderBy('id','ASC')
                                    ->join('Equipo','Evento.id', '=', 'Equipo.Evento_id')
                                    ->where('evento.users_id', '=', Auth::user()->id)
                                    ->where('Equipo.Evento_id', '=', $id)
                                    ->select('Equipo.id','Equipo.Evento_id','Equipo.E_Nombre' ,'Equipo.E_Logo')
                                    ->paginate(6);
        Flash::warning("el EVENTO" ." ". $evento->Nombre." ". " ha sido editado exitosamente");
           return view('vistas.Evento.Evento',['evento' =>$evento,'lista'=>$lista]);

    }

   
    public function UpdateEvent($id)
    {
        $id =  decrypt($id);   
        if(Auth::check()){
       
       $evento= Evento::find($id);
      //cambiar estado del evento a inactivo
          $lista = DB::table('Evento')->where('evento.users_id', '=', Auth::user()->id)
                                      ->where('evento.id', '=', $id)
                                      ->update(['EstadosActivo_id'=> 1]);
      
      
      if( $lista ){
  
        Flash::warning("El evento" ." ". $evento->Nombre." ". " ha sido borrado exitosamente");
        return redirect()->route('perfil');
      } else{
        
        Flash::warning("No se pudo eliminar");

      }                            
   
}else{

    return redirect()->route('entrar');
}


    }
}
