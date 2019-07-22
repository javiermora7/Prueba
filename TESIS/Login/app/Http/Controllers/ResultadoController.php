<?php

namespace Login\Http\Controllers;

use Illuminate\Http\Request;

class ResultadoController extends Controller
{
  
    public function index()
    {
        
    }


    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
            
                $id=$request->idEvento;
                $user =  Auth::user();
                $evento =  Evento::find($id);
                $evento->categoria;
                $evento->user;

                $Equipos = Equipo::where('Evento_id',$evento->id)->get();   
                $fecha = DB::table('Equipo_Encuentros')->orderBy('id','ASC')
                ->join('Encuentros','Encuentros.id', '=', 'Equipo_Encuentros.Encuentros_id')
                ->join(DB::raw( 'equipo as eq1'),DB::raw( 'eq1.id'), '=', 'Equipo_Encuentros.Equipo_id')
                ->join(DB::raw( 'equipo as eq2'),DB::raw( 'eq2.id'), '=', 'Equipo_Encuentros.equipo2')
                ->where('Encuentros.Evento_users_id', '=', Auth::user()->id)
                // ->groupBy('equipo_encuentros.id', 'equipo1', 'equipo2','encuentros.FechaHora','encuentros.Cancha', 'encuentros.Arbitro1')
                ->select('Equipo_Encuentros.id',DB::raw( 'eq1.id as idequipo1'),DB::raw( 'eq2.id as idequipo2'),DB::raw( 'eq1.E_Nombre as equipo1'), DB::raw( 'eq2.E_Nombre as equipo2'), 'Encuentros.FechaHora',
                'Encuentros.Cancha', 'Encuentros.Arbitro1', 'faltasE1', 'faltaE2', 'amarillasE1', 'amarillasE2', 'rojasE2', 'rojasE1', 'estado','equipo1G', 'equipo2G', 'golesEquipo1', 'golesEquipo2')
            ->paginate(6);                              
                Flash::warning("Resultado guardado exitosamente");

            

            //ganador equipo1 
            if($request->golesEquipo1>$request->golesEquipo2){

            //$Sumas= Equipo::find('1');
            // $Sumas->increment('E_PartidosJugados',5);
                        //   ->increment('E_PartidosGanados',1)
                        //   //DB::table('Equipo')->increment('E_PartidosPerdidos')->where($request->idequipo1);
                        //   //DB::table('Equipo')->increment('E_PartidosEmpatados')->where($request->idequipo1);
                        //   ->increment('E_GolesRealizados',$request->golesEquipo1)
                        //   ->increment('E_GolesContra',$request->golesEquipo2);
                
            $Sumas->save();
                dd($Sumas);


                $id=$request->idEvento;
                $user =  Auth::user();
                $evento =  Evento::find($id);
                $evento->categoria;
                $evento->user;

            $encuentro = EquipoEncuentro::find($request->id);
            $encuentro->equipo1G=1;
            $encuentro->equipo2G=0;
            $encuentro->golesEquipo1=$request->golesEquipo1;  
            $encuentro->golesEquipo2=$request->golesEquipo2;
            $encuentro->faltasE1=$request->faltasE1;
            $encuentro->faltaE2=$request->faltaE2;
            $encuentro->amarillasE1=$request->amarillasE1;
            $encuentro->amarillasE2=$request->amarillasE2;
            $encuentro->rojasE2=$request->rojasE2;
            $encuentro->rojasE1=$request->rojasE1;
            $encuentro->estado=1;
            $encuentro->save();

            return view('vistas.Fechas.FechasEncuentros',['evento' =>$evento,'Equipos'=>$Equipos ,'fecha'=>$fecha ]); 

                //ganador equipo2
            }if ($request->golesEquipo2>$request->golesEquipo1) {
            
                $id=$request->idEvento;
                $user =  Auth::user();
                $evento =  Evento::find($id);
                $evento->categoria;
                $evento->user;

                $encuentro = EquipoEncuentro::find($request->id);
                $encuentro->equipo1G=0;
                $encuentro->equipo2G=1;
                $encuentro->golesEquipo1=$request->golesEquipo1;  
                $encuentro->golesEquipo2=$request->golesEquipo2;
                $encuentro->faltasE1=$request->faltasE1;
                $encuentro->faltaE2=$request->faltaE2;
                $encuentro->amarillasE1=$request->amarillasE1;
                $encuentro->amarillasE2=$request->amarillasE2;
                $encuentro->rojasE2=$request->rojasE2;
                $encuentro->rojasE1=$request->rojasE1;
                $encuentro->estado=1;
                $encuentro->save();   

                                        
                Flash::warning("Resultado guardado exitosamente");
                return view('vistas.Fechas.FechasEncuentros',['evento' =>$evento,'Equipos'=>$Equipos ,'fecha'=>$fecha ]); 

                
                //empate
            }if ($request->golesEquipo1==$request->golesEquipo2) {
                
                $id=$request->idEvento;
                $user =  Auth::user();
                $evento =  Evento::find($id);
                $evento->categoria;
                $evento->user;

                $encuentro = EquipoEncuentro::find($request->id);
                $encuentro->equipo1G=0;
                $encuentro->equipo2G=0;
                $encuentro->golesEquipo1=$request->golesEquipo1;  
                $encuentro->golesEquipo2=$request->golesEquipo2;
                $encuentro->faltasE1=$request->faltasE1;
                $encuentro->faltaE2=$request->faltaE2;
                $encuentro->amarillasE1=$request->amarillasE1;
                $encuentro->amarillasE2=$request->amarillasE2;
                $encuentro->rojasE2=$request->rojasE2;
                $encuentro->rojasE1=$request->rojasE1;
                $encuentro->estado=1;
                $encuentro->save(); 

                                        
                Flash::warning("Resultado guardado exitosamente");
                return view('vistas.Fechas.FechasEncuentros',['evento' =>$evento,'Equipos'=>$Equipos ,'fecha'=>$fecha ]); 
                
            }else{
                    
                Flash::warning("Resultado guardado exitosamente");
                return view('vistas.Fechas.FechasEncuentros',['evento' =>$evento,'Equipos'=>$Equipos ,'fecha'=>$fecha ]); 
            }
        

    }

  
    public function show($id)
    {
        
    }

  
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
