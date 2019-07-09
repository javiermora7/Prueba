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
                              ->where('Evento.EstadosActivo_id', '=', 2)->count();
         $equipos = Equipo::select('*')
                              ->join('evento', 'evento_id', '=', 'evento.id')
                              ->where('Evento.EstadosActivo_id', '=', 2)->count();
                              //falta query para los jugadores, pero necesito el algoritmo


           $evento = Evento::orderBy('id','ASC')
           //listar eventos en el index
                  ->Name($Nombre)
                  ->Region($Region)
                   ->Comuna($Comuna)
                  ->where('Evento.EstadosActivo_id', '=', 2)
                  ->select('Evento.id','Evento.users_id','Evento.Nombre' ,'Evento.Fotografia','Evento.Comuna','Evento.Descripcion','Evento.FechaInicio',
                   'Evento.EstadosActivo_id')->paginate(6);
     return view('vistas.cibernauta.index',['lista' =>$evento, 'cantidad' =>$cantidad, 'equipos' => $equipos]);

    }

    public function verificar($id, Request $request)
    {
        
    //id sesion iniciada
    $id =  decrypt($id);
    //id del evento seleccionado para ver el perfil
    $evento =  Evento::find($id);
    $evento->categoria;
    $evento->user;
    $evento->estadoactivo;
    $xd = $id;
       //aca hay que listar datos como cantidad de jugadores
    
                             
       $Nombre = $request->get('E_Nombre');
    $lista =  Evento::orderBy('id','ASC')
           //listar equipo
             
             // ->E_Nombre($Nombre)
            ->join('Equipo','Evento.id', '=', 'Equipo.Evento_id')
             ->Where('E_Nombre', 'LIKE', "%$Nombre%")
            ->where('Evento.EstadosActivo_id', '=', 2)
            ->where('Equipo.Evento_id', '=', $id)
            ->where('Equipo.EstadosActivo_id', '=', 2)
            ->select('Equipo.id','Equipo.Evento_id','Equipo.E_Nombre' ,'Equipo.E_Logo','E_puntuacion')->paginate(6);
            
    if($lista) {
             
    return view('vistas.cibernauta.CampeonatoCiber',['evento' =>$evento,'lista'=>$lista]);
    
    }else{

         Flash::success("no tienes permisos");
         return redirect()->route('perfil');
    }
  
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
       
      return view('vistas.cibernauta.EquipoCiber',['evento' =>$evento,'lista'=>$equipo]);

 
       
    
    }
 



   
}
