<?php

namespace Login;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Cviebrock\EloquentSluggable\Sluggable;

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
class GrupoEquipo extends Model
{
    protected $table ="Grupos_Equipo";

   protected $fillable = ['Equipo_id', 'Equipo_Evento_id', 'Grupos_id', 'Fase_id'];

   public function fase(){
        return $this->belongsTo(Fase::class,'Fase_id', 'id');
    }

    public function grupo(){

     return $this->belongsTo(Grupo::class,'Grupos_id', 'id');
    }

     public function equipo(){

     return $this->belongsTo(Grupo::class,'Equipo_id', 'id');
    }
 public function encuentrogrupoequipo(){

       
      return $this->hasMany(EncuentroGrupoEquipo::class);

  }

}
