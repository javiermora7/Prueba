<?php

namespace Login\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Login\User;
use Login\TipoUsuario;
use Login\Categoria;
use Login\Producto;
use Login\Equipo;
use Login\EstadoActivo;
use Login\Modalidad;
use Login\Evento;
use Login\Jugador;

use Cache;
use Sesion;
use Redirect;
use Cookie;


class CibernautaController extends Controller
{
    public function index(Request $request)
    //PASAR TODO ESTO AL OTRO PROYECTO
    {
        $Nombre = $request->get('Nombre');
        $Region = $request->get('Region');
        $Comuna = $request->get('Comuna');

    
    
         $cantidad = Evento::select('*')
                              ->where('evento.EstadosActivo_id', '=', 2)->count();
         $equipos = Equipo::select('*')
                              ->join('evento', 'evento_id', '=', 'evento.id')
                              ->where('evento.EstadosActivo_id', '=', 2)->count();
                              //falta query para los jugadores, pero necesito el algoritmo
        $jugadores =  Jugador::select('*')->count();

        
        //falta query para los jugadores, pero necesito el algoritmo

           $evento = Evento::orderBy('id','ASC')
           //listar eventos en el index
                  ->Name($Nombre)
                  ->Region($Region)
                   ->Comuna($Comuna)
                  ->where('evento.EstadosActivo_id', '=', 2)
                  ->select('evento.id','evento.users_id','evento.Nombre' ,'evento.Fotografia','evento.Comuna','evento.Descripcion','evento.FechaInicio',
                   'evento.EstadosActivo_id')->paginate(6);
     return view('vistas.cibernauta.index',['lista' =>$evento, 'cantidad' =>$cantidad, 'equipos' => $equipos,'jugadores'=>$jugadores ]);

    }


    public function verificar($id, Request $request)
    {
      $jugadores =  Jugador::select('*')->count();
    //id sesion iniciada}
    $crip = $id;
    $id =  decrypt($crip);
    //id del evento seleccionado para ver el perfil
    $evento =  Evento::find($id);
    $evento->categoria;
    $evento->user;
    $evento->estadoactivo;
    $xd = $id;
       //aca hay que listar datos como cantidad de jugadores
    
       $cantidad = Evento::select('*')
                              ->where('evento.EstadosActivo_id', '=', 2)->count();
       $equipos = Equipo::select('*')
                              ->join('evento', 'evento_id', '=', 'evento.id')
                              ->where('evento.EstadosActivo_id', '=', 2)->count();
       $Nombre = $request->get('E_Nombre');
    $lista =  Evento::orderBy('id','ASC')
           //listar equipo
             // ->E_Nombre($Nombre)
            ->join('equipo','Evento.id', '=', 'equipo.Evento_id')
             ->Where('E_Nombre', 'LIKE', "%$Nombre%")
            ->where('evento.EstadosActivo_id', '=', 2)
            ->where('equipo.Evento_id', '=', $id)
            ->where('equipo.EstadosActivo_id', '=', 2)
            ->select('equipo.id','equipo.Evento_id','equipo.E_Nombre' ,'equipo.E_Logo','E_puntuacion')->paginate(6);
            
    if($lista) {
             
    return view('vistas.cibernauta.CampeonatoCiber',['jugadores'=>$jugadores,'evento' =>$evento,'lista'=>$lista, 'crip' => $crip,'cantidad' =>$cantidad, 'equipos' => $equipos]);
    
    }else{

         Flash::success("no tienes permisos");
         return redirect()->route('perfil');
    }
  
}


// public function verificarequipo($id, $id2)
//     {
//     $id =  decrypt($id);
//     $user =  Auth::user();
//     $equipo =  Equipo::find($id);
//     $evento =  Evento::find($id2);  
//     $evento->categoria;
//     $evento->user;
//     $evento->estadoactivo;
//     //$xd = $idl;    
       
//       return view('vistas.cibernauta.EquipoCiber',['evento' =>$evento,'lista'=>$equipo]);

 
       
    
//     }
 
public function verificarequipo($id, $id2)
    {
      $jugadores =  Jugador::select('*')->count();
    $id =  decrypt($id);
    $user =  Auth::user();
    $equipo =  Equipo::find($id);
    $evento =  Evento::find($id2);  
    $evento->categoria;
    $evento->user;
    $evento->estadoactivo;
    //$xd = $id;
       $cantidad = Evento::select('*')
                              ->where('evento.EstadosActivo_id', '=', 2)->count();
       $equipos = Equipo::select('*')
                              ->join('evento', 'evento_id', '=', 'evento.id')
                              ->where('evento.EstadosActivo_id', '=', 2)->count();
    

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
      return view('vistas.cibernauta.EquipoCiber',['jugadores'=>$jugadores,'evento' =>$evento,'lista'=>$equipo, 'jugadors'=>$jugadors,'cantidad' =>$cantidad, 'equipos' => $equipos]);

   
       
    
    }
 


   
}
