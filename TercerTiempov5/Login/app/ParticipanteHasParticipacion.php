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

class ParticipanteHasParticipacion extends Model
{
    //protected $table ="Participante_has_Participacion";
    protected $table ="Participante_has_Participacion";

   protected $fillable = ['Participante_id', 'Participacion_id', 'Evento_id', 'Evento_users_id'];

   public function evento(){

     return $this->belongsTo(Evento::class,'Evento_id', 'id');
    }
  

 public function participacion(){

     return $this->belongsTo(Participacion::class,'Participacion_id', 'id');
    }

 public function participante(){

     return $this->belongsTo(Participantesn::class,'Participante_id', 'id');
    }

 }


