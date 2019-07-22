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
use Login\EstadoActivo;
use Login\Modalidad;
use Illuminate\Support\Facades\Input;
use Storage;
use File;
use Carbon\Carbon ;
use Sesion;
use Redirect;
use Cookie;
////

use \Http\Controllers\Crypt;

use Symfony\Component\HttpFoundation\StreamedResponse;



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
   
            $Equipo = new Equipo();
            $Equipo->E_Nombre = $request->Input('E_Nombre');
            $Equipo->EstadosActivo_id = 2;
            $Equipo->Evento_id = $request->Input('Evento_id');
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
      $fk= $request->Input('Evento_id');
      $id = encrypt($fk);      
      return redirect()->route('VerificarPerfilEvento', [$id]);

    }

 public function verificarequipo($id, $id2)
    {
    $id =  decrypt($id);
    $user =  Auth::user();
    $equipo =  Equipo::find($id);
    $evento =  Evento::find($id2);  
    $evento->categoria;
    $evento->user;
    $evento->estadoactivo;
    //$xd = $id;

  if ( $evento->users_id == $user->id ) {
    

    $jugadors = DB::table('jugador')->orderBy('jugador.id','ASC')
    ->join('participante','participante.id', '=', 'jugador.Participante_id')
    ->where('jugador.Equipo_id', '=', $equipo->id)
    ->where('participante.EstadosActivo_id', '=', 2)
    ->select(
      'participante.id',
      'Pa_Nombre',
      'Pa_Apellido',
      'Pa_Rut',
      'Pa_Edad',
      'Pa_FechaNacimiento',
      'Pa_Correo',
      'participante.Pa_img',
      'Ju_Posicion',
      'Ju_Numero',
      'Ju_AmarillaActivas',
      'Ju_RojasActivas',
      'Ju_AmarillasAcumuladas',
      'Ju_RojaAcumuladas',
      'Ju_CantidadGoles'
    )->paginate(6);
      return view('vistas.Equipo.Equipo',['evento' =>$evento,'lista'=>$equipo, 'jugadors'=>$jugadors]);

   } else{

         Flash::success("no tienes permisos");
         return redirect()->route('perfil');
    }
       
    
    }
 
    public function show($id)
    {
        //
    }

  
    public function edit($id, $id2)
    {  
        //id del equipo
        $id =  decrypt($id);    
        $equipo =  Equipo::find($id);
        $evento= Evento::find($id2);
        $categoria =  Categoria::orderBy('id','ASC')->pluck('Categorias','id');
        $modalidad =  Modalidad::orderBy('id','ASC')->pluck('Modalidad','id');
//listo los equipos del evento para el side
        $lista = DB::table('evento')->orderBy('id','ASC')
                                    ->join('equipo','evento.id', '=', 'equipo.Evento_id')
                                    ->where('evento.users_id', '=', Auth::user()->id)
                                    ->where('equipo.Evento_id', '=', $id)
                                    ->select('equipo.id','equipo.Evento_id','equipo.E_Nombre' ,'equipo.E_Logo')
                                    ->paginate(6);


    return view('vistas.Equipo.EditarEquipo',['evento' => $evento,'equipo' 
                 => $equipo,'categoria' =>$categoria, 'modalidad' =>$modalidad]);
    }

  
    public function update(Request $request, $id)
    {
          $equipo = Equipo::find($id);
          $idevento= $request->evento_id;
           $evento =  Evento::find($idevento);
           
            $equipo ->E_Nombre = $request->E_Nombre;
            $equipo->save();
        if (Input::hasFile('E_Logo')) {

                $files = Input::file('E_Logo');

                  foreach ($files as  $file) {

                    
                    $carbon =  Carbon::now();

                    $url= $carbon->minute.'_'.$carbon->second.$file->getClientOriginalName();
                       $url= substr($url, 0,20);
                    Storage::disk('public')->put($url, File::get($file));
                    
                    $equipo->E_Logo = $url;

                  $equipo->save();

                }
            }
            // listar los equipos
        $lista = DB::table('evento')->orderBy('id','ASC')
                                    ->join('equipo','evento.id', '=', 'equipo.Evento_id')
                                    ->where('evento.users_id', '=', Auth::user()->id)
                                    ->where('equipo.Evento_id', '=', $id)
                                    ->select('equipo.id','equipo.Evento_id','equipo.E_Nombre' ,'equipo.E_Logo')
                                    ->paginate(6);


    $jugadors = DB::table('jugador')->orderBy('jugador.id','ASC')
    ->join('participante','participante.id', '=', 'jugador.Participante_id')
    ->where('jugador.Equipo_id', '=', $equipo->id)
    ->where('participante.EstadosActivo_id', '=', 2)
    ->select(
      'participante.id',
      'Pa_Nombre',
      'Pa_Apellido',
      'Pa_Rut',
      'Pa_Edad',
      'Pa_FechaNacimiento',
      'Pa_Correo',
      'participante.Pa_img',
      'Ju_Posicion',
      'Ju_Numero',
      'Ju_AmarillaActivas',
      'Ju_RojasActivas',
      'Ju_AmarillasAcumuladas',
      'Ju_RojaAcumuladas',
      'Ju_CantidadGoles'
    )->paginate(6);
                                    
                                    
      return view('vistas.Equipo.Equipo',['evento' =>$evento,'lista'=>$equipo, 'jugadors'=>$jugadors]);
              
    }


  public function UpdateEquipo($id , $id2)
    {
        $id =  decrypt($id);   
        if(Auth::check()){
        $evento= Evento::find($id2);
        $equipo= Equipo::find($id); 
        $user =  Auth::user();
      
    
      //cambiar estado del equipo a inactivo
         $lista = DB::table('equipo')->where('equipo.id', '=', $id)
                                      ->update(['EstadosActivo_id'=> 1]);     
      if( $lista ){
       
          $fk= $evento->id;
      $id = encrypt($fk);      
      Flash::warning("El equipo" ." ". $equipo ->E_Nombre." ". " ha sido eliminado exitosamente");     
      return redirect()->route('VerificarPerfilEvento', [$id]);       
   
      } else{
        
        Flash::warning("No se pudo eliminar");

      }                            
   
}else{

    return redirect()->route('entrar');
}


    }
 
    public function destroy($id)
    {
        
    }
}
