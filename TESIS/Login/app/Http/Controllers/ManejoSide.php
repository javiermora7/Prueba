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
use Mail;
use Sesion;
use Redirect;
use Cookie;


class ManejoSide extends Controller
{

	//aca hay que  crear un algoritmo para comparar el manejo con las sesiones
    function index ($id){

        $id =  decrypt($id);
        $user =  Auth::user();
        $evento =  Evento::find($id);
        $evento->categoria;
        $evento->user;
        $resultadoEquipos=DB::table('equipo')->select('id')->where('Evento_id','=',$evento->id)->get();
        $EncuentrosCreados=DB::table('evento')->select('EncuentrosCreados')->where('id','=',$evento->id)->get();
        
        $Encuentros=DB::table('encuentros')
                            ->where('Evento_id','=',$evento->id)
                            ->where('estadofechahora','=',1)
                            ->select('fecha')
                            ->groupBy('fecha')
                            ->get();
    
        // dd($Encuentros);
     
            return view('vistas.Fechas.FechasEncuentros',['evento' =>$evento ,'resultadoEquipos'=>$resultadoEquipos,'EncuentrosCreados'=>$EncuentrosCreados,'Encuentros'=>$Encuentros]);
    }

      function Arbitro ($id){

   $id =  decrypt($id);
    $user =  Auth::user();
    $evento =  Evento::find($id);
    $evento->categoria;
    $evento->user;

    	return view('vistas.Arbitro.Arbitro',['evento' =>$evento]);
    }

       function AgregarFecha ($id){

    $id =  decrypt($id);
    $user =  Auth::user();
    $evento =  Evento::find($id);
    $evento->categoria;
    $evento->user;
    $resultadoEquipos=DB::table('equipo')->select('id')->where('Evento_id','=',$evento->id)->get();
    $EncuentrosCreados=DB::table('evento')->select('EncuentrosCreados')->where('id','=',$evento->id)->get();
    
        return view('vistas.Fechas.AgregarFecha',['evento' =>$evento,'resultadoEquipos'=>$resultadoEquipos,'EncuentrosCreados'=>$EncuentrosCreados]);
    }

           function Estadisticas ($id){

    $id =  decrypt($id);
    $user =  Auth::user();
    $evento =  Evento::find($id);
    $evento->categoria;
    $evento->user;
    $TablaPosicion = DB::table('equipo')->orderBy('E_puntuacion','DESC')          
    ->where('Evento_id','=',$evento->id)
    ->select('equipo.E_Nombre', 'equipo.E_puntuacion', 'equipo.E_PartidosJugados','equipo.E_PartidosGanados','equipo.E_PartidosPerdidos','equipo.E_PartidosEmpatados','equipo.E_GolesRealizados','equipo.E_GolesContra')->paginate(6);

$goleador = DB::table('jugador')->orderBy('Ju_CantidadGoles','DESC')
//listar eventos en el perfil del usuario
->join('equipo','equipo.id', '=', 'jugador.Equipo_id')
->join('participante','jugador.Participante_id', '=', 'participante.id')
->where('Equipo_Evento_id','=',$evento->id)
->select('jugador.Ju_CantidadGoles','participante.Pa_Nombre','participante.Pa_Apellido' ,'equipo.E_Nombre')->paginate(6);

return view('vistas.Estadisticas.Estadisticas',['goleador'=>$goleador,'evento' =>$evento, 'TablaPosicion'=>$TablaPosicion]);
    }

function cambiarestado(){
    $FechaActual = Carbon::now(); 
        
             $eventos = DB::table('Evento') ->join('Users','users.id', '=', 'Evento.users_id')
                                       ->where('Evento.EstadosActivo_id', '=', 2)
                                       ->select('Evento.id','Evento.fecha_mensualidad','Users.email')->get();
           if ($eventos) {
            foreach ($eventos as $evento) {
            $start= Carbon::parse($evento->fecha_mensualidad);
            $diference= $FechaActual->diffForHumans($start);
              
            $datos= DB::table('Evento') ->join('Users','users.id', '=', 'Evento.users_id')
                                   ->where('evento.id', '=', $evento->id)
                                   ->where('evento.NotiMotivo','!=', 2)
                                   ->select('Users.email','Users.Nombres')->first();
             if ($datos)
                 {
                    $result = DB::table('Evento')
                    ->where('evento.id', '=', $evento->id)
                    ->update(['fecha_mensualidad'=> $FechaActual, 'EstadosActivo_id'=> 1, 'NotiMotivo' => 2, 'NotiEstado' => 2]);

                $email = $evento->email;
                $msj = '<!DOCTYPE html>';
                $msj =  $msj.'<html>';
                $msj =  $msj. '<head>'; 
                $msj =  $msj.'</head>';
                $msj =  $msj.' <body>';
                $msj =  $msj.' <p><strong>Boleta</strong><hr>'.$FechaActual.'</p>';
                $msj =  $msj.'<p><strong>Estimado (a)</strong><hr>'.$datos->Nombres.'</p>';
                // $msj =  $msj.'<p><strong>N° Teléfono :</strong></p>';
                $msj =  $msj.'<p><strong>Subcripción vencida, Monto a cancelar:</strong>$40.000</p>';
                $msj =  $msj.'</body>';
                $msj =  $msj.'</html>';
                    Mail::send([], [], function ($message) use ($msj, $email) {
                      $message->to($email)
                        ->subject('Correo contacto')
                        
                        ->setBody($msj, 'text/html'); 
                    });


                 }
              }  
         }
    }


// 


}
