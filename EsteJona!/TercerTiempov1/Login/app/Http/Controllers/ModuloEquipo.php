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
   
      /*$user = Auth::user();
      $user->estadoactivo;
      $user->tipousuario;*/
      $Equipo = new Equipo();
            $Equipo->E_Nombre = $request->Input('E_Nombre');
	     /* $Equipo->E_puntuacion = $request->Input('E_puntuacion');
	        $Equipo->E_PartidosJugados = $request->Input('E_PartidosJugados');
	        $Equipo->E_PartidosGanados =  $request->Input('E_PartidosGanados');
	        $Equipo->E_PartidosPerdidos =  $request->Input('E_PartidosPerdidos');
	        $Equipo->E_PartidosEmpatados =  $request->Input('E_PartidosEmpatados');
            $Equipo->E_GolesRealizados = $request->Input('descriptionE_GolesRealizadose');*/
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
    
       
      return view('vistas.Equipo.Equipo',['evento' =>$evento,'lista'=>$equipo]);

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
        $lista = DB::table('Evento')->orderBy('id','ASC')
                                    ->join('Equipo','Evento.id', '=', 'Equipo.Evento_id')
                                    ->where('evento.users_id', '=', Auth::user()->id)
                                    ->where('Equipo.Evento_id', '=', $id)
                                    ->select('Equipo.id','Equipo.Evento_id','Equipo.E_Nombre' ,'Equipo.E_Logo')
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
            //aca hay que borrar todo y listar los jugadores
        $lista = DB::table('Evento')->orderBy('id','ASC')
                                    ->join('Equipo','Evento.id', '=', 'Equipo.Evento_id')
                                    ->where('evento.users_id', '=', Auth::user()->id)
                                    ->where('Equipo.Evento_id', '=', $id)
                                    ->select('Equipo.id','Equipo.Evento_id','Equipo.E_Nombre' ,'Equipo.E_Logo')
                                    ->paginate(6);
        Flash::warning("El equipo" ." ". $equipo ->E_Nombre." ". " ha sido editado exitosamente");     
      return view('vistas.Equipo.Equipo',['evento' =>$evento,'lista'=>$equipo]);
              
    }


  public function UpdateEquipo($id , $id2)
    {
        $id =  decrypt($id);   
        if(Auth::check()){
        $evento= Evento::find($id2);
        
       $equipo= Equipo::find($id);
      //cambiar estado del evento a inactivo
          $lista = DB::table('Equipo')->where('Evento_id', '=', $id2)
                                      ->update(['EstadosActivo_id'=> 1]);     
      if( $lista ){
  
        Flash::warning("El equipo" ." ". $equipo ->E_Nombre." ". " ha sido eliminado exitosamente");
        return redirect()->route('perfil');
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
