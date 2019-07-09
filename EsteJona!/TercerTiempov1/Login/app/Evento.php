<?php

namespace Login;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Login\Categoria;
use Login\Comentario;
use Login\DescripcionOc;
use Login\Encuentro;
use Login\EncuentroGrupoEquipo;
use Login\Equipo;
use Login\EquipoEncuentro;
use Login\EstadoActivo;
use Login\EstadoJugador;
use Login\Evento;
use Login\Fase;
use Login\Grupo;
use Login\GrupoEquipo;
use Login\Jugador;
use Login\Modalidad;
use Login\Oc;
use Login\Pago;
use Login\Participacion;
use Login\Participantes;
use Login\ParticipanteHasParticipacion;
use Login\TipoUsuario;
use Login\User;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table ="Evento";

   protected $fillable = ['Nombre','Direccion', 'FechaInicio', 'Cupos', 'Region', 'Comuna', 'Descripcion', 'Fotografia',  'RangoEdadMin', 'RangoEdadMax', 'users_id', 'EstadosActivo_id', 'Categorias_id', 'Modalidad_id'];



public function user(){
        return $this->belongsTo(User::class,'users_id', 'id');
    }

public function categoria(){
        return $this->belongsTo(Categoria::class,'Categorias_id', 'id');
    }
   
public function estadoactivo(){
       
        return $this->belongsTo(EstadoActivo::class,'EstadosActivo_id', 'id');
    }

public function Encuentros(){

    	return $this->hasMany(Encuentro::class);
    }


public function pago(){

       return $this->hasOne(Pago::class, 'Evento_id','id');

}

public function Equipos(){

    	return $this->hasMany(Equipo::class);
    }


public function modalidad(){

     return $this->belongsTo(Modalidad::class,'Modalidad_id', 'id');
    }
  




public function ParticipanteParticipacion(){

       
      return $this->hasMany(ParticipanteHasParticipacion::class);

  }


 public static function imagenes(){
    $query = DB::table('Evento')->select('Evento.id','Evento.Nombre' ,'Evento.Fotografia')->get();
        
         return $query;
  }




  //scope
  
  public function ScopeName($query, $Nombre){

    if ($Nombre) {
        return $query->Where('Nombre', 'LIKE', "%$Nombre%");
    } 
    
  }
 public function ScopeRegion($query, $Region){
  

    if ($Region) {
        return $query->Where('Region', 'LIKE', "%$Region%");
    } 
    
  }
   public function ScopeComuna($query, $Comuna){

    if ($Comuna) {
        return $query->Where('Comuna', 'LIKE', "%$Comuna%");
    } 
    
  }
// public function ScopeE_Nombre($query, $E_Nombre){
//       if ($E_Nombre) {  
//     $q = $query                                           
//         ->whereRaw("
//         (id IN (SELECT Equipo.E_Nombre FROM Evento INNER JOIN  Equipo ON Equipo.evento_id=evento.id)")
//         ->Where('E_Nombre', 'LIKE', "%$E_Nombre%");
//     return $q;
//   }
// }




}
