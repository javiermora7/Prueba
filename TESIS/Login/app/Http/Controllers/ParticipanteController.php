<?php

namespace Login\Http\Controllers;

use Illuminate\Http\Request;
use Login\Participante;
use Login\Jugador;
use Login\Equipo;
use Login\Evento;
use Login\Categoria;
use Login\Modalidad;
use Login\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use \Http\Controllers\Crypt;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Storage;
use File;
use Carbon\Carbon ;
use Malahierba\ChileRut\ChileRut;
use Malahierba\ChileRut\Rules\ValidChileanRut;

use Login\Http\Requests\UserRequest;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vistas.ModuloEquipo.index');

    }

    
    public function create()
    {
        //
    }

      public function Jugador($id, $id2)
    {  

        //id del equipo
        $id =  decrypt($id);    
        $equipo =  Equipo::find($id);
        $evento= Evento::find($id2);
        $RangoMin = $evento->RangoEdadMin;
        $RangoMax = $evento->RangoEdadMax;
        $categoria =  Categoria::orderBy('id','ASC')->pluck('Categorias','id');
        $modalidad =  Modalidad::orderBy('id','ASC')->pluck('Modalidad','id');
//listo los equipos del evento para el side
        $lista = DB::table('evento')->orderBy('id','ASC')
                                    ->join('equipo','evento.id', '=', 'equipo.Evento_id')
                                    ->where('evento.users_id', '=', Auth::user()->id)
                                    ->where('equipo.Evento_id', '=', $id)
                                    ->select('equipo.id','equipo.Evento_id','equipo.E_Nombre' ,'equipo.E_Logo')
                                    ->paginate(6);
        return view('vistas.Jugador.Jugador',[
                      'evento' => $evento,
                      'equipo' => $equipo,
                      'categoria' =>$categoria, 
                      'modalidad'=>$modalidad, 
                      'RangoMin' =>$RangoMin,
                      'RangoMax' =>$RangoMax]);
    }


// $equipo->id), $evento->id

    public function store(Request $request)
    {
      
          // dd($request);
        $rango = evento::where('evento.id',$request->idEvento)->first();
        $EdadMin = $rango->RangoEdadMin;
        $EdadMax = $rango->RangoEdadMax;
        $edad = Carbon::parse($request->Pa_FechaNacimiento)->age; 
        $rut = $request->Rut;
       //consulto si el usuario ya esta registrado en participantes
        $consulta = DB::table('participante')->where('Pa_Rut',$rut)->pluck('id');
       //consulto si el numero de la camiseta del jugador esta disponible
        $ValidarNumero = jugador::where('Equipo_Evento_id',$request->idEvento)
                                 ->where('Ju_Numero',$request->Ju_Numero)
                                 ->first();
                             

        if(count($consulta)>=1){
          //consulto si el usuario registrado en participante esta registrado en jugador
            $ValidarId = jugador::where('Participante_id',$consulta[0])
                                 ->where('Equipo_Evento_id',$request->idEvento)
                                 ->first();
            //buscamos el usuario ya registrado en el sistema y comparamos los datos si son iguales a los del formulariioasi evitamos dos usuarios con datos similares como por ejemplo el rut
            $DatosParticipante = participante::where('Pa_Nombre',$request->Pa_Nombre)
                                 ->where('Pa_Apellido',$request->Pa_Apellido)
                                 ->where('Pa_Rut',$request->Rut)
                                 ->where('Pa_FechaNacimiento',$request->Pa_FechaNacimiento)
                                 ->first();
       
             if ( $ValidarId){
                  
            return redirect()->route('Jugador', [encrypt($request->idEquipo),$request->idEvento ])->withErrors(['Los datos del jugador que intentas ingresar ya están registrados en este equipo']);
              }
              elseif (!$DatosParticipante) {
                return redirect()->route('Jugador', [encrypt($request->idEquipo),$request->idEvento ])->withErrors(['El jugador que intentas ingresar ya está registrado en el sistema Tercer Tiempo, los datos no coinciden']); 
              }else{  

                 if ($ValidarNumero)
              {
              return redirect()->route('Jugador', [encrypt($request->idEquipo),$request->idEvento ])->withErrors(['Número de la camiseta ya está en uso, elige otro']);             # 
              } elseif ($edad >= $EdadMin && $edad <= $EdadMax ){  
            $jugador = new Jugador();
            $id_participante= $consulta[0];
            $jugador->Ju_Posicion=$request->Ju_Posicion;
            $jugador->Ju_Numero=$request->Ju_Numero;
            $jugador->Participante_id=$id_participante;
            $jugador->Ju_AmarillaActivas=0;
            $jugador->Ju_RojasActivas=0;
            $jugador->Ju_AmarillasAcumuladas=0;
            $jugador->Ju_RojaAcumuladas=0;
            $jugador->Ju_CantidadGoles=0;
            $jugador->Ju_Entrenador=0;
            $jugador->Ju_Representante=0;
            $jugador->Equipo_id=$request->idEquipo;
            $jugador->Equipo_Evento_id=$request->idEvento;
            $jugador->Estadojugador_id=1;
              }else{
                return redirect()->route('Jugador', [encrypt($request->idEquipo),$request->idEvento ])->withErrors(['La edad del jugador no coincide con el rango de edad del evento']); 
          }
 
 }

        if ($jugador->save()) {
                                                     
      $eve=  $request->Input('idEvento');
      $fk= $request->Input('idEquipo');
      $id = encrypt($fk); 
      Flash::success("el jugador" ." ".$request->Input('Pa_Nombre')."ha sido registrado exitosamente");
     
      return redirect()->route('VerificarPerfilEquipo', [$id, $eve]);            
            }else{
                  $eve=  $request->Input('idEvento');
                  $fk= $request->Input('idEquipo');
                  $id = encrypt($fk); 
                  Flash::warning("No se logro completar la accion");
                  return redirect()->route('VerificarPerfilEquipo', [$id, $eve]);            }
           
        }else{

              //registrar como participante
              $rango = evento::where('evento.id',$request->idEvento)->first();
              $EdadMin = $rango->RangoEdadMin;
              $EdadMax = $rango->RangoEdadMax;
              // dd($EdadMax);
              $edad = Carbon::parse($request->Pa_FechaNacimiento)->age; 

           $Rutt=$request->Rut;
           $email = $request->Pa_Correo;
           $chilerut = new ChileRut;
           $validator = new \EmailValidator\Validator();
           $chilerut->check($Rutt);
  
        $validar = Participante::where('Pa_Correo',$request->Pa_Correo)->first();
        $ValidarRut = Participante::where('Pa_Rut',$Rutt)->first();
  //si la edad conrresponde al rango ejecutamos la insercion.
if ($edad >= $EdadMin && $edad <= $EdadMax ){      
       if (($validar == true) && ($chilerut->check($Rutt) == true )&&($validator->hasMx($email) == true)){
               
         return redirect()->route('Jugador', [encrypt($request->idEquipo),$request->idEvento ])->withErrors(['Correo ya registrado']);  
               
             }
      elseif (($validar == false)  && ($chilerut->check($Rutt) == false )&&($validator->hasMx($email) == true)){
               
       return redirect()->route('Jugador', [encrypt($request->idEquipo),$request->idEvento ])->withErrors(['Rut invalido']);
             }
       elseif (($validar == false) && ($chilerut->check($Rutt) == true )&&($validator->hasMx($email) == false)){
               
              return redirect()->route('Jugador', [encrypt($request->idEquipo),$request->idEvento ])->withErrors(['Correo invalido']);   

             }
       elseif (($validar == true)  && ($chilerut->check($Rutt) == false )&&($validator->hasMx($email) == true)){
               
               return redirect()->route('Jugador', [encrypt($request->idEquipo),$request->idEvento ])->withErrors(['Correo ya registrado','Rut invalido']);   

             }
         elseif (($validar == false) && ($ValidarRut == false) && ($chilerut->check($Rutt) == false )&&($validator->hasMx($email) == false)){
               
             return redirect()->route('Jugador', [encrypt($request->idEquipo),$request->idEvento ])->withErrors(['Rut invalido','Correo invalido']);   

             }
             elseif ($edad > $EdadMax && $edad < $EdadMin){
               
             return redirect()->route('Jugador', [encrypt($request->idEquipo),$request->idEvento ])->withErrors(['Rut invalido','Correo invalido']);   

             }
     elseif(($validar == false)  && ($chilerut->check($Rutt) == true )&&($validator->hasMx($email) == true)){


        $participante = new Participante();
        $participante->Pa_Nombre=$request->Pa_Nombre;
        $participante->Pa_Apellido=$request->Pa_Apellido;
        $participante->Pa_Rut=$request->Rut;
        $participante->Pa_Edad=  $edad;
        $participante->Pa_FechaNacimiento=$request->Pa_FechaNacimiento;
        $participante->Pa_Correo=$request->Pa_Correo;
        $EstadosActivo_id=2;
        $participante->EstadosActivo_id= $EstadosActivo_id;
        $participante->save();
        if (Input::hasFile('Pa_img')) 
            {

                $files = Input::file('Pa_img');
    
        foreach ($files as  $file) {
                    
                    $carbon =  Carbon::now();
                    $url= $carbon->minute.'_'.$carbon->second.$file->getClientOriginalName();
                    //agregar funcion para permitir foto sin espacio
                    $url= substr($url, 0,20);
                    Storage::disk('public')->put($url, File::get($file)); 
                    $participante->Pa_img=$url;
                     
                    $participante->save();        
                                   }
             }

        $C = DB::table('participante')->where('Pa_Rut',$rut)->pluck('id');
   if ($ValidarNumero)
              {
            return redirect()->route('Jugador', [encrypt($request->idEquipo),$request->idEvento ])->withErrors(['Número de la camiseta ya está en uso, elige otro']);  
              } else{
                
              
        $jugador = new Jugador();
        $id_participante= $C[0];
        $jugador->Ju_Posicion=$request->Ju_Posicion;
        $jugador->Ju_Numero=$request->Ju_Numero;
        $jugador->Participante_id=$id_participante;
        $jugador->Ju_AmarillaActivas=0;
        $jugador->Ju_RojasActivas=0;
        $jugador->Ju_AmarillasAcumuladas=0;
        $jugador->Ju_RojaAcumuladas=0;
        $jugador->Ju_CantidadGoles=0;
        $jugador->Ju_Entrenador=0;
        $jugador->Ju_Representante=0;
        $jugador->Equipo_id=$request->idEquipo;
        $jugador->Equipo_Evento_id=$request->idEvento;
        $jugador->Estadojugador_id=1;
      }
        if ($jugador->save()) {
      
      $eve=  $request->Input('idEvento');
      $fk= $request->Input('idEquipo');
      $id = encrypt($fk); 
      Flash::success("el jugador" ." ".$request->Input('Pa_Nombre')." ha sido registrado exitosamente");
      return redirect()->route('VerificarPerfilEquipo', [$id, $eve]);
        }else{
      
      $eve=  $request->Input('idEvento');
      $fk= $request->Input('idEquipo');
      $id = encrypt($fk); 
      Flash::warning("No se logro completar la accion");
      return redirect()->route('VerificarPerfilEquipo', [$id, $eve]);
             }           
        }   

    }else{
      return redirect()->route('Jugador', [encrypt($request->idEquipo),$request->idEvento ])->withErrors(['La edad del jugador no coincide con el rango de edad del evento']);  
             }
        // return view('vistas.ModuloEquipo.index');
    }
    }
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

 
  public function UpdateJugador($id , $id2, $id3)
    {
        $id =  decrypt($id);   
        if(Auth::check()){
          //evento
        $evento= Evento::find($id2);
        //jugador
        $jugador= Participante::find($id); 
        $user =  Auth::user();
         
    
      //cambiar estado del equipo a inactivo
         $lista = DB::table('participante')->where('participante.id', '=', $id)
                                      ->update(['EstadosActivo_id'=> 1]);     
      if( $lista ){
            





      $eve= $id2;
      $fk= $id3;
      $id = encrypt($fk); 
      Flash::success("El jugador" ." ". $jugador->Pa_Nombre." ". " ha sido eliminado exitosamente");     
      return redirect()->route('VerificarPerfilEquipo', [$id, $eve]);
   
      } else{
        
        Flash::warning("No se pudo eliminar");

      }                            
   
}else{

    return redirect()->route('entrar');
}


    }
    public function destroy($id)
    {
        //
    }
}
