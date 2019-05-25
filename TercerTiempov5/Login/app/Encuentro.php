<?php

namespace Login;

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

use Illuminate\Database\Eloquent\Model;

class Encuentro extends Model
{
    protected $table ="Encuentros";

    protected $fillable =['FechaHora', 'Cancha', 'Evento_id', 'Evento_users_id', 'Arbitro1', 'Arbitro2', 'Arbitro3', 'Arbitro4' ];


    public function evento(){

        return $this->belongsTo(Evento::class,'Evento_id', 'id');

    }

    public function equipoencuentros(){

       
      return $this->hasMany(EquipoEncuentro::class);

  }

    public function encuentrogrupoequipo(){

       
      return $this->hasMany(EncuentroGrupoEquipo::class);

  }

   public function comentarios(){

       
      return $this->hasMany(Comentario::class);

  }

}
