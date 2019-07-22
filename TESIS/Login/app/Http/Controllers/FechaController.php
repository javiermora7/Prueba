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

class FechaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

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
            ->where('encuentros.estadofechahora','=',0)
           // ->groupBy('equipo_encuentros.id', 'equipo1', 'equipo2','encuentros.FechaHora','encuentros.Cancha', 'encuentros.Arbitro1')
            ->select('equipo_Encuentros.id',DB::raw( 'eq1.id as idequipo1'),DB::raw( 'eq2.id as idequipo2'),DB::raw( 'eq1.E_Nombre as equipo1'),
             DB::raw( 'eq2.E_Nombre as equipo2'),'encuentros.estado','encuentros.id as idencuentro','encuentros.fecha','encuentros.Direccion','encuentros.fecha')->get();  
        // dd($fecha);
            return view('vistas.Fechas.Fecha',['evento' =>$evento,'fecha'=>$fecha]);
       
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
       ->where('encuentros.fecha','=',$request->fechadeportiva)
       ->where('encuentros.estadofechahora','=',0)
      // ->groupBy('equipo_encuentros.id', 'equipo1', 'equipo2','encuentros.FechaHora','encuentros.Cancha', 'encuentros.Arbitro1')
       ->select('equipo_Encuentros.id',DB::raw( 'eq1.id as idequipo1'),DB::raw( 'eq2.id as idequipo2'),DB::raw( 'eq1.E_Nombre as equipo1'), DB::raw( 'eq2.E_Nombre as equipo2'),
       'encuentros.estado','encuentros.id as idencuentro','encuentros.fecha','encuentros.Direccion','encuentros.fecha')->get();  




        $verificador = DB::table('encuentros')
        ->where('FechaHora','=',$request->fecha)
        ->where('hora','=',$request->hora)
        ->where('Cancha','=',$request->cancha)
        ->select('id','Direccion')->get();

        foreach($verificador as $v){

            if($request->direccion==$v->Direccion){
                if(Count($verificador)>0){
                    Flash::warning("la cancha ya se encuentra utilizada por favor seleccione otra hora");
                    return view('vistas.Fechas.Fecha',['evento' =>$evento,'fecha'=>$fecha]);
                }
            }
        }

      
         $encuentro = Encuentro::find($request->idEncuentro);
         $encuentro->FechaHora=$request->fecha;
         $encuentro->hora=$request->hora;
         $encuentro->Cancha=$request->cancha;
         $encuentro->Direccion=$request->direccion;
         $encuentro->estadofechahora=1;
         $encuentro->save();   

       Flash::success("Fecha asignada exitosamente.");
       return view('vistas.Fechas.Fecha',['evento' =>$evento,'fecha'=>$fecha]);

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
