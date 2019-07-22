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
use Login\Encuentro;
use Login\EquipoEncuentro;
use Login\Jugador;
use Login\Eventro;

use \Http\Controllers\Crypt;
use Illuminate\Support\Facades\Input;
use Storage;
use File;
use Carbon\Carbon ;

use Sesion;
use Redirect;
use Cookie;
class ResultadoEncuentroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //  dd($request->id_ju_gol_equipo1);

        if($request->variable == 1){

            if($request->n_goles_eq1 != NULL){  
                $goleseq1 = array_sum($request->n_goles_eq1);
              }else{
                  $goleseq1=0; 
              }
          
                if($request->n_goles_eq2 != NULL){
                $goleseq2 = array_sum($request->n_goles_eq2);
                }else{
                    $goleseq2=0;
                }
          
                if($request->amarilla_eq1!= null){
                  $amarillaeq1= array_sum($request->amarilla_eq1);
                }else{
                  $amarillaeq1 = 0;
                }
          
          
                if($request->amarilla_eq2 != null){
                  $amarillaeq2= array_sum($request->amarilla_eq2);
                }else{
                  $amarillaeq2 = 0;
                }
          
          
                if($request->roja_eq1 != null){
                  $rojaseq1=array_sum($request->roja_eq1);
                  }else{
                    $rojaseq1 = 0;
                  }
          
                if($request->roja_eq2 != null){
                $rojaseq2=array_sum($request->roja_eq2);
                }else{
                  $rojaseq2 = 0;
                }
          
                $estado=1;
          
                if($goleseq1 > $goleseq2){
               
                  $EquipoEncuentro = EquipoEncuentro::find($request->id_encuentro);
                  $EquipoEncuentro->equipo1G=1;
                  $EquipoEncuentro->equipo2G=0; 
                  $EquipoEncuentro->golesEquipo1=$goleseq1; 
                  $EquipoEncuentro->golesEquipo2=$goleseq2;
                  $EquipoEncuentro->amarillasE1=$amarillaeq1;
                  $EquipoEncuentro->amarillasE2=$amarillaeq2;
                  $EquipoEncuentro->rojasE2=$rojaseq2;
                  $EquipoEncuentro->rojasE1=$rojaseq1;
                  $EquipoEncuentro->estado=1;
                  $EquipoEncuentro->save();

                  $resultadoEquipo = DB::table('equipo')->where('id','=',$request->idEquipo1)
                      ->select('E_puntuacion',
                      'E_PartidosJugados',
                      'E_PartidosGanados',
                      'E_PartidosPerdidos',
                      'E_PartidosEmpatados',
                      'E_GolesRealizados',
                      'E_GolesContra')
                      ->get();

                  foreach($resultadoEquipo as $resultadoeq1){

                    $E_puntuacion=$resultadoeq1->E_puntuacion;
                    $E_PartidosJugados=$resultadoeq1->E_PartidosJugados;
                    $E_PartidosGanados=$resultadoeq1->E_PartidosGanados;
                    $E_PartidosPerdidos=$resultadoeq1->E_PartidosPerdidos;
                    $E_PartidosEmpatados=$resultadoeq1->E_PartidosEmpatados;
                    $E_GolesRealizados=$resultadoeq1->E_GolesRealizados;
                    $E_GolesContra=$resultadoeq1->E_GolesContra;

                    $Equipo1 = Equipo::find($request->idEquipo1);
                    $Equipo1->E_puntuacion=$E_puntuacion+3;
                    $Equipo1->E_PartidosJugados=$E_PartidosJugados+1;
                    $Equipo1->E_PartidosGanados=$E_PartidosGanados+1;
                     $Equipo1->E_PartidosPerdidos=$E_PartidosPerdidos+0;
                     $Equipo1->E_PartidosEmpatados=$E_PartidosEmpatados+0;
                    $Equipo1->E_GolesRealizados=$E_GolesRealizados+$goleseq1;
                    $Equipo1->E_GolesContra=$E_GolesContra+$goleseq2;
                    $Equipo1->save();

                  }


                  $resultadoEquipo2 = DB::table('equipo')->where('id','=',$request->idEquipo2)
                  ->select('E_puntuacion',
                  'E_PartidosJugados',
                  'E_PartidosGanados',
                  'E_PartidosPerdidos',
                  'E_PartidosEmpatados',
                  'E_GolesRealizados',
                  'E_GolesContra')
                  ->get();

              foreach($resultadoEquipo2 as $resultadoeq2){

                $E_puntuacion=$resultadoeq2->E_puntuacion;
                $E_PartidosJugados=$resultadoeq2->E_PartidosJugados;
                $E_PartidosGanados=$resultadoeq2->E_PartidosGanados;
                $E_PartidosPerdidos=$resultadoeq2->E_PartidosPerdidos;
                $E_PartidosEmpatados=$resultadoeq2->E_PartidosEmpatados;
                $E_GolesRealizados=$resultadoeq2->E_GolesRealizados;
                $E_GolesContra=$resultadoeq2->E_GolesContra;

                $Equipo2 = Equipo::find($request->idEquipo2);
                $Equipo2->E_puntuacion=$E_puntuacion+0;
                $Equipo2->E_PartidosJugados=$E_PartidosJugados+1;
                $Equipo2->E_PartidosGanados=$E_PartidosGanados+0;
                $Equipo2->E_PartidosPerdidos=$E_PartidosPerdidos+1;
                $Equipo2->E_PartidosEmpatados=$E_PartidosEmpatados+0;
                $Equipo2->E_GolesRealizados=$E_GolesRealizados+$goleseq2;
                $Equipo2->E_GolesContra=$E_GolesContra+$goleseq1;
                $Equipo2->save();
              }

                 
          
          
                  $Encuentro = Encuentro::find($request->id_encuentro);
                  $Encuentro->estado=1;
                  $Encuentro->save(); 
          
                }elseif($goleseq1 < $goleseq2){
          
                  $EquipoEncuentro = EquipoEncuentro::find($request->id_encuentro);
                  $EquipoEncuentro->equipo1G=0;
                  $EquipoEncuentro->equipo2G=1; 
                  $EquipoEncuentro->golesEquipo1=$goleseq1; 
                  $EquipoEncuentro->golesEquipo2=$goleseq2;
                  $EquipoEncuentro->amarillasE1=$amarillaeq1;
                  $EquipoEncuentro->amarillasE2=$amarillaeq2;
                  $EquipoEncuentro->rojasE2=$rojaseq2;
                  $EquipoEncuentro->rojasE1=$rojaseq1;
                  $EquipoEncuentro->estado=1;
                  $EquipoEncuentro->save();


                  
                  $resultadoEquipo = DB::table('equipo')->where('id','=',$request->idEquipo1)
                      ->select('E_puntuacion',
                      'E_PartidosJugados',
                      'E_PartidosGanados',
                      'E_PartidosPerdidos',
                      'E_PartidosEmpatados',
                      'E_GolesRealizados',
                      'E_GolesContra')
                      ->get();

                  foreach($resultadoEquipo as $resultadoeq1){

                    $E_puntuacion=$resultadoeq1->E_puntuacion;
                    $E_PartidosJugados=$resultadoeq1->E_PartidosJugados;
                    $E_PartidosGanados=$resultadoeq1->E_PartidosGanados;
                    $E_PartidosPerdidos=$resultadoeq1->E_PartidosPerdidos;
                    $E_PartidosEmpatados=$resultadoeq1->E_PartidosEmpatados;
                    $E_GolesRealizados=$resultadoeq1->E_GolesRealizados;
                    $E_GolesContra=$resultadoeq1->E_GolesContra;

                    $Equipo1 = Equipo::find($request->idEquipo1);
                    $Equipo1->E_puntuacion=$E_puntuacion+0;
                    $Equipo1->E_PartidosJugados=$E_PartidosJugados+1;
                    $Equipo1->E_PartidosGanados=$E_PartidosGanados+0;
                     $Equipo1->E_PartidosPerdidos=$E_PartidosPerdidos+1;
                     $Equipo1->E_PartidosEmpatados=$E_PartidosEmpatados+0;
                    $Equipo1->E_GolesRealizados=$E_GolesRealizados+$goleseq1;
                    $Equipo1->E_GolesContra=$E_GolesContra+$goleseq2;
                    $Equipo1->save();

                  }


                  $resultadoEquipo2 = DB::table('equipo')->where('id','=',$request->idEquipo2)
                  ->select('E_puntuacion',
                  'E_PartidosJugados',
                  'E_PartidosGanados',
                  'E_PartidosPerdidos',
                  'E_PartidosEmpatados',
                  'E_GolesRealizados',
                  'E_GolesContra')
                  ->get();

              foreach($resultadoEquipo2 as $resultadoeq2){

                $E_puntuacion=$resultadoeq2->E_puntuacion;
                $E_PartidosJugados=$resultadoeq2->E_PartidosJugados;
                $E_PartidosGanados=$resultadoeq2->E_PartidosGanados;
                $E_PartidosPerdidos=$resultadoeq2->E_PartidosPerdidos;
                $E_PartidosEmpatados=$resultadoeq2->E_PartidosEmpatados;
                $E_GolesRealizados=$resultadoeq2->E_GolesRealizados;
                $E_GolesContra=$resultadoeq2->E_GolesContra;

                $Equipo2 = Equipo::find($request->idEquipo2);
                $Equipo2->E_puntuacion=$E_puntuacion+3;
                $Equipo2->E_PartidosJugados=$E_PartidosJugados+1;
                $Equipo2->E_PartidosGanados=$E_PartidosGanados+1;
                $Equipo2->E_PartidosPerdidos=$E_PartidosPerdidos+0;
                $Equipo2->E_PartidosEmpatados=$E_PartidosEmpatados+0;
                $Equipo2->E_GolesRealizados=$E_GolesRealizados+$goleseq2;
                $Equipo2->E_GolesContra=$E_GolesContra+$goleseq1;
                $Equipo2->save();
              }


                  $Encuentro = Encuentro::find($request->id_encuentro);
                  $Encuentro->estado=1;
                  $Encuentro->save(); 
          
                }elseif($goleseq1 == $goleseq2){
          
                  $EquipoEncuentro = EquipoEncuentro::find($request->id_encuentro);
                  $EquipoEncuentro->equipo1G=2;
                  $EquipoEncuentro->equipo2G=2; 
                  $EquipoEncuentro->golesEquipo1=$goleseq1; 
                  $EquipoEncuentro->golesEquipo2=$goleseq2;
                  $EquipoEncuentro->amarillasE1=$amarillaeq1;
                  $EquipoEncuentro->amarillasE2=$amarillaeq2;
                  $EquipoEncuentro->rojasE2=$rojaseq2;
                  $EquipoEncuentro->rojasE1=$rojaseq1;
                  $EquipoEncuentro->estado=1;
                  $EquipoEncuentro->save();


                  
                  $resultadoEquipo = DB::table('equipo')->where('id','=',$request->idEquipo1)
                      ->select('E_puntuacion',
                      'E_PartidosJugados',
                      'E_PartidosGanados',
                      'E_PartidosPerdidos',
                      'E_PartidosEmpatados',
                      'E_GolesRealizados',
                      'E_GolesContra')
                      ->get();

                  foreach($resultadoEquipo as $resultadoeq1){

                    $E_puntuacion=$resultadoeq1->E_puntuacion;
                    $E_PartidosJugados=$resultadoeq1->E_PartidosJugados;
                    $E_PartidosGanados=$resultadoeq1->E_PartidosGanados;
                    $E_PartidosPerdidos=$resultadoeq1->E_PartidosPerdidos;
                    $E_PartidosEmpatados=$resultadoeq1->E_PartidosEmpatados;
                    $E_GolesRealizados=$resultadoeq1->E_GolesRealizados;
                    $E_GolesContra=$resultadoeq1->E_GolesContra;

                    $Equipo1 = Equipo::find($request->idEquipo1);
                    $Equipo1->E_puntuacion=$E_puntuacion+1;
                    $Equipo1->E_PartidosJugados=$E_PartidosJugados+1;
                    $Equipo1->E_PartidosGanados=$E_PartidosGanados+0;
                     $Equipo1->E_PartidosPerdidos=$E_PartidosPerdidos+0;
                     $Equipo1->E_PartidosEmpatados=$E_PartidosEmpatados+1;
                    $Equipo1->E_GolesRealizados=$E_GolesRealizados+$goleseq1;
                    $Equipo1->E_GolesContra=$E_GolesContra+$goleseq2;
                    $Equipo1->save();

                  }


                  $resultadoEquipo2 = DB::table('equipo')->where('id','=',$request->idEquipo2)
                  ->select('E_puntuacion',
                  'E_PartidosJugados',
                  'E_PartidosGanados',
                  'E_PartidosPerdidos',
                  'E_PartidosEmpatados',
                  'E_GolesRealizados',
                  'E_GolesContra')
                  ->get();

              foreach($resultadoEquipo2 as $resultadoeq2){

                $E_puntuacion=$resultadoeq2->E_puntuacion;
                $E_PartidosJugados=$resultadoeq2->E_PartidosJugados;
                $E_PartidosGanados=$resultadoeq2->E_PartidosGanados;
                $E_PartidosPerdidos=$resultadoeq2->E_PartidosPerdidos;
                $E_PartidosEmpatados=$resultadoeq2->E_PartidosEmpatados;
                $E_GolesRealizados=$resultadoeq2->E_GolesRealizados;
                $E_GolesContra=$resultadoeq2->E_GolesContra;

                $Equipo2 = Equipo::find($request->idEquipo2);
                $Equipo2->E_puntuacion=$E_puntuacion+1;
                $Equipo2->E_PartidosJugados=$E_PartidosJugados+1;
                $Equipo2->E_PartidosGanados=$E_PartidosGanados+0;
                $Equipo2->E_PartidosPerdidos=$E_PartidosPerdidos+0;
                $Equipo2->E_PartidosEmpatados=$E_PartidosEmpatados+1;
                $Equipo2->E_GolesRealizados=$E_GolesRealizados+$goleseq2;
                $Equipo2->E_GolesContra=$E_GolesContra+$goleseq1;
                $Equipo2->save();
              }



          
                  $Encuentro = Encuentro::find($request->id_encuentro);
                  $Encuentro->estado=1;
                  $Encuentro->save(); 
                }
          
          
          // sum resultado jugadores
          
                  if($request->id_ju_gol_equipo1!= null){
                  $goleseq1=count($request->id_ju_gol_equipo1);
                  }
          
                  if($request->id_ju_gol_equipo2!= null){
                  $goleseq2=count($request->id_ju_gol_equipo2);
                  }
          
                  if($request->id_ju_amarilla_eq1 != null){
                  $amarillaeq1=count($request->id_ju_amarilla_eq1);
                  }
          
                  if($request->id_ju_amarilla_eq2 != null){
                  $amarillaeq2=count($request->id_ju_amarilla_eq2);
                  }
                  
                  if($request->id_ju_roja_eq1 != null){
                      $rojaeq1=count($request->id_ju_roja_eq1);
                  }
          
                  if($request->id_ju_roja_eq2 != null){
                      $rojaeq2=count($request->id_ju_roja_eq2);
                  }
          
              //////////////////////
              if($request->id_ju_gol_equipo1!= null){
             
                  for($i=0;$i<$goleseq1;$i++){

                      $jugador_gol_eq1 = DB::table('jugador')->where('id','=',$request->id_ju_gol_equipo1[$i])
                      ->select('Ju_CantidadGoles')
                      ->get();
          
                    $resultadojugador=  intval(preg_replace('/[^0-9]+/', '',$jugador_gol_eq1), 10);
          
                    if($request->n_goles_eq1[$i] != null){
                    $total = $resultadojugador + $request->n_goles_eq1[$i];
                    }else{
                      $total = $resultadojugador + 0;
                    }
                  //  dd($request->$id_ju_gol_equipo1[$i]);
                    if($request->n_goles_eq1[$i] != null){
                    $EquipoEquipoEncuentro = Jugador::find($request->id_ju_gol_equipo1[$i]);
                    $EquipoEquipoEncuentro->Ju_CantidadGoles=$total;
                    $EquipoEquipoEncuentro->save();  
                    }
                  }
              }
          ///////////////
              if($request->id_ju_gol_equipo2 != null){
                  echo 'entre 2';
                  for($i=0;$i<$goleseq2;$i++){
                      
                      $jugador_gol_eq2 = DB::table('jugador')->where('id','=',$request->id_ju_gol_equipo2[$i])
                      ->select('Ju_CantidadGoles')
                      ->get();
          
                    $resultadojugador= intval(preg_replace('/[^0-9]+/', '',$jugador_gol_eq2), 10);
          
                    if($request->n_goles_eq2[$i] != null){
          
                    $total = $resultadojugador + $request->n_goles_eq2[$i];
                    }else{
                      $total = $resultadojugador + 0;
                    }
                    if($request->n_goles_eq2[$i] != null){
                    $EquipoEquipoEncuentro = Jugador::find($request->id_ju_gol_equipo2[$i]);
                  $EquipoEquipoEncuentro->Ju_CantidadGoles=$total;
                  $EquipoEquipoEncuentro->save();  
                    }
                  }
              }
                
                  /////////////
              if($request->id_ju_amarilla_eq1 != null){
                  for($i=0;$i<$amarillaeq1;$i++){
          
                  $jugador_amarilla_eq1 = DB::table('jugador')->where('id','=',$request->id_ju_amarilla_eq1[$i])
                  ->select('Ju_AmarillasAcumuladas')
                  ->get();
          
                  $resultadojugador= intval(preg_replace('/[^0-9]+/', '',$jugador_amarilla_eq1), 10);
          
          
                  if($request->amarilla_eq1[$i] != null){
                  $total = $resultadojugador + $request->amarilla_eq1[$i];
                  }else{
                      $total = $resultadojugador +0;
                  }

                  if($request->amarilla_eq1[$i] != null){
                  $EquipoEquipoEncuentro = Jugador::find($request->id_ju_amarilla_eq1[$i]);
                  $EquipoEquipoEncuentro->Ju_AmarillasAcumuladas=$total;
                  $EquipoEquipoEncuentro->save();  
                  }
          
                  }
              }
              //////////
              if($request->id_ju_amarilla_eq2 != null){
                  for($i=0;$i<$amarillaeq2;$i++){
                  $jugador_amarilla_eq2 = DB::table('jugador')->where('id','=',$request->id_ju_amarilla_eq2[$i])
                  ->select('Ju_AmarillasAcumuladas')
                  ->get();
          
                  $resultadojugador= intval(preg_replace('/[^0-9]+/', '',$jugador_amarilla_eq2), 10);
          
                  if($request->amarilla_eq2[$i] != null){
                  $total = $resultadojugador + $request->amarilla_eq2[$i];
                  }else{
                      $total = $resultadojugador + 0;
                  }
                  if($request->amarilla_eq2[$i] != null){
                  $EquipoEquipoEncuentro = Jugador::find($request->id_ju_amarilla_eq2[$i]);
                  $EquipoEquipoEncuentro->Ju_AmarillasAcumuladas=$total;
                  $EquipoEquipoEncuentro->save();  
                  }
          
                  }
              }
          
              ///////////////
              if($request->id_ju_roja_eq1 != null){
                  for($i=0;$i<$rojaeq1;$i++){
          
                  $jugado_roja_req1 = DB::table('jugador')->where('id','=',$request->id_ju_roja_eq1[$i])
                  ->select('Ju_RojaAcumuladas')
                  ->get();
          
                  $resultadojugador= intval(preg_replace('/[^0-9]+/', '',$jugado_roja_req1), 10);
          
                  if($request->roja_eq1[$i] != null){
                  $total = $resultadojugador + $request->roja_eq1[$i];
                  }else{
                      $total = $resultadojugador + 0;
                  }

                  if($request->roja_eq1[$i] < 0){
                  $EquipoEquipoEncuentro = Jugador::find($request->id_ju_roja_eq1[$i]);
                  $EquipoEquipoEncuentro->Ju_RojaAcumuladas=$total;
                  $EquipoEquipoEncuentro->save();  
                  }
          
                  }
          
              }
                //////////////
          
                if($request->id_ju_roja_eq2 != null){
                  for($i=0;$i<$rojaeq2;$i++){
          
                  $jugado_roja_req2 = DB::table('jugador')->where('id','=',$request->id_ju_roja_eq2[$i])
                  ->select('Ju_RojaAcumuladas')
                  ->get();
          
                  $resultadojugador= intval(preg_replace('/[^0-9]+/', '',$jugado_roja_req2), 10);
          
                  if($request->roja_eq2[$i] != null){
          
                  $total = $resultadojugador + $request->roja_eq2[$i];
          
                  }else{
                      $total = $resultadojugador + 0;
          
                  }
                  
                  if($request->roja_eq2[$i] < 0){
                  $EquipoEquipoEncuentro = Jugador::find($request->id_ju_roja_eq2[$i]);
                  $EquipoEquipoEncuentro->Ju_RojaAcumuladas=$total;
                  $EquipoEquipoEncuentro->save();  
                  }
          
                  }
          
              }
        
              $id=$request->id_evento;
              $user =  Auth::user();
              $evento =  Evento::find($id);
            //   $evento->categoria;
            //   $evento->user;

                  
        $fecha = DB::table('equipo_encuentros')->orderBy('id','ASC')
        ->join('encuentros','encuentros.id', '=', 'equipo_encuentros.Encuentros_id')
        ->join(DB::raw( 'equipo as eq1'),DB::raw( 'eq1.id'), '=', 'equipo_encuentros.Equipo_id')
       ->join(DB::raw( 'equipo as eq2'),DB::raw( 'eq2.id'), '=', 'equipo_encuentros.equipo2')
       ->where('encuentros.Evento_id', '=', $evento->id)
       ->where('encuentros.fecha','=',$request->fecha)
       ->where('encuentros.estadofechahora','=',1)
      // ->groupBy('equipo_encuentros.id', 'equipo1', 'equipo2','encuentros.FechaHora','encuentros.Cancha', 'encuentros.Arbitro1')
       ->select('equipo_encuentros.id',DB::raw( 'eq1.id as idequipo1'),DB::raw( 'eq2.id as idequipo2'),DB::raw( 'eq1.E_Nombre as equipo1'),
        DB::raw( 'eq2.E_Nombre as equipo2'),'encuentros.estado','encuentros.id as idencuentro','encuentros.fecha','encuentros.Direccion','encuentros.fecha',
        'encuentros.FechaHora','encuentros.Direccion','encuentros.Hora','encuentros.cancha','equipo_encuentros.equipo1G','equipo_encuentros.equipo2G',
        'equipo_encuentros.golesEquipo1','equipo_encuentros.golesEquipo2')->get();
        //  dd($fecha);
        return view('vistas.Fechas.FechasEncuentrosActivos',['evento' =>$evento,'fecha'=>$fecha]);



        }else{
        $id=$request->idEvento;
        $user =  Auth::user();
        $evento =  Evento::find($id);
        $evento->categoria;
        $evento->user;
       
     
       
        $fecha = DB::table('equipo_encuentros')->orderBy('id','ASC')
        ->join('encuentros','encuentros.id', '=', 'equipo_encuentros.Encuentros_id')
        ->join(DB::raw( 'equipo as eq1'),DB::raw( 'eq1.id'), '=', 'equipo_encuentros.Equipo_id')
       ->join(DB::raw( 'equipo as eq2'),DB::raw( 'eq2.id'), '=', 'equipo_encuentros.equipo2')
       ->where('encuentros.Evento_id', '=', $evento->id)
       ->where('encuentros.fecha','=',$request->fecha)
       ->where('encuentros.estadofechahora','=',1)
      // ->groupBy('equipo_encuentros.id', 'equipo1', 'equipo2','encuentros.FechaHora','encuentros.Cancha', 'encuentros.Arbitro1')
       ->select('equipo_encuentros.id',DB::raw( 'eq1.id as idequipo1'),DB::raw( 'eq2.id as idequipo2'),DB::raw( 'eq1.E_Nombre as equipo1'),
        DB::raw( 'eq2.E_Nombre as equipo2'),'encuentros.estado','encuentros.id as idencuentro','encuentros.fecha','encuentros.Direccion','encuentros.fecha',
        'encuentros.FechaHora','encuentros.Direccion','encuentros.Hora','encuentros.cancha','equipo_encuentros.equipo1G','equipo_encuentros.equipo2G',
        'equipo_encuentros.golesEquipo1','equipo_encuentros.golesEquipo2')->get();
        //  dd($fecha);
            return view('vistas.Fechas.FechasEncuentrosActivos',['evento' =>$evento,'fecha'=>$fecha]);
    
        }
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function IniciarPartido(Request $request){
        $id=$request->idEvento;
        $user =  Auth::user();
        $evento =  Evento::find($id);
        $evento->categoria;
        $evento->user;

        $EquipoEncuentro = EquipoEncuentro::find($request->EquipoEncuentro);
        $EquipoEncuentro->estado=2;
        $EquipoEncuentro->save();    

        $Encuentro = Encuentro::find($request->idEncuentro);
        $Encuentro->estado=2;
        $Encuentro->save();  


        $fecha = DB::table('equipo_encuentros')->orderBy('id','ASC')
        ->join('encuentros','encuentros.id', '=', 'equipo_encuentros.Encuentros_id')
        ->join(DB::raw( 'equipo as eq1'),DB::raw( 'eq1.id'), '=', 'equipo_encuentros.Equipo_id')
       ->join(DB::raw( 'equipo as eq2'),DB::raw( 'eq2.id'), '=', 'equipo_encuentros.equipo2')
       ->where('encuentros.Evento_id', '=', $evento->id)
       ->where('encuentros.fecha','=',$request->fecha)
       ->where('encuentros.estadofechahora','=',1)
      // ->groupBy('equipo_encuentros.id', 'equipo1', 'equipo2','encuentros.FechaHora','encuentros.Cancha', 'encuentros.Arbitro1')
       ->select('equipo_encuentros.id',DB::raw( 'eq1.id as idequipo1'),DB::raw( 'eq2.id as idequipo2'),DB::raw( 'eq1.E_Nombre as equipo1'),
        DB::raw( 'eq2.E_Nombre as equipo2'),'encuentros.estado','encuentros.id as idencuentro','encuentros.fecha','encuentros.Direccion','encuentros.fecha',
        'encuentros.FechaHora','encuentros.Direccion','encuentros.Hora','encuentros.cancha','equipo_encuentros.equipo1G','equipo_encuentros.equipo2G',
        'equipo_encuentros.golesEquipo1','equipo_encuentros.golesEquipo2')->get();  
       //dd($fecha);
       return view('vistas.Fechas.FechasEncuentrosActivos',['evento' =>$evento,'fecha'=>$fecha]);

    }
}
