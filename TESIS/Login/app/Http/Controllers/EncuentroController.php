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

use Login\Eventro;

use \Http\Controllers\Crypt;
use Illuminate\Support\Facades\Input;
use Storage;
use File;
use Carbon\Carbon ;

use Sesion;
use Redirect;
use Cookie;

class EncuentroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

  
    public function store(Request $request)
    {

      try{  

        $id=$request->idEvento;
        $user =  Auth::user();
        $evento =  Evento::find($id);
        $evento->categoria;
        $evento->user;
     

        if($request->variable==1){

            DB::table('equipo_encuentros')->where('Equipo_Evento_id','=', $evento->id)->delete();
            DB::table('encuentros')->where('Evento_id','=', $evento->id)->delete();
            $EstadoEvento = Evento::find($evento->id);
             $EstadoEvento->EncuentrosCreados=0;
             $EstadoEvento->save(); 
             $EncuentrosCreados=DB::table('evento')->select('EncuentrosCreados')->where('id','=',$evento->id)->get();


             return view('vistas.Fechas.AgregarFecha',['evento' =>$evento,'EncuentrosCreados'=>$EncuentrosCreados]);
        

        }else{    

    
        $EstadoEvento = Evento::find($evento->id);
        $EstadoEvento->EncuentrosCreados=1;
        $EstadoEvento->save();    

         $resultadoEquipos=DB::table('equipo')->select('id')->where('Evento_id','=',$evento->id)->get();
         $EncuentrosCreados=DB::table('evento')->select('EncuentrosCreados')->where('id','=',$evento->id)->get();

         $Direccion=$request->Direccion;
    
       $f = count($resultadoEquipos);
   
        foreach($resultadoEquipos as $Equipo ){

            
            DB::table('ramdom_fase')->insert(
                ['id_equipo' => $Equipo->id,'id_evento'=>$evento->id]
            );
        }
            $equipoRamdom = DB::table('ramdom_fase')->select('id','id_equipo')->where('id_evento','=',$evento->id)->get();
            $i=0;
            foreach($equipoRamdom as $equipo1){
              
            $resultadoRamdom= DB::table('ramdom_fase')->where('id_equipo','!=', $equipo1->id_equipo)
            ->where('id_evento','=',$evento->id)
            ->select('id','id_equipo')->inRandomOrder()->get();
            
                foreach($resultadoRamdom as $Contrincante){
                    $i++;
                    
             

                    if($i>$f){
                        $i=1;
                    }
                // $fechas='fecha'.$i;
                // echo  "fecha".$i.'<br>';
                DB::table('encuentros')->insert(
                ['Evento_id' => $evento->id,'Evento_users_id'=>$user->id,'estado'=>0,'fecha'=>$i,'estadofechahora'=>0,'Direccion'=>$Direccion]);

                $ultima=DB::table('encuentros')->select(DB::raw('max(id) as idencuentro'))->get();
             
                $idEncuentro = intval(preg_replace('/[^0-9]+/', '',$ultima), 10);

                DB::table('equipo_encuentros')->insert(
                ['Equipo_id' => $equipo1->id_equipo,'equipo2'=>$Contrincante->id_equipo,'Equipo_Evento_id'=> $evento->id,'Encuentros_id'=>$idEncuentro,'estado'=>0]);
                
                }
                
            }
            DB::table('ramdom_fase')->where('id_evento','=', $evento->id)->delete();

           
        
            
         Flash::warning("Encuentros creados correctamente");
         return view('vistas.Fechas.AgregarFecha',['evento' =>$evento,'resultadoEquipos'=>$resultadoEquipos,'EncuentrosCreados'=>$EncuentrosCreados]);
        //  return view('vistas.Fechas.AgregarFecha',['evento' =>$evento,'resultadoEquipos'=>$resultadoEquipos,'EncuentrosCreados'=>$EncuentrosCreados]);
        }

    }catch(Exception $e){
        Flash::warning("Error al ingresar los datos ");
        return view('vistas.Fechas.AgregarFecha',['evento' =>$evento,'resultadoEquipos'=>$resultadoEquipos,'EncuentrosCreados'=>$EncuentrosCreados]);      
        // return view('vistas.Fechas.AgregarFecha',['evento' =>$evento,'resultadoEquipos'=>$resultadoEquipos,'EncuentrosCreados'=>$EncuentrosCreados]);
      

    }
        
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
}
