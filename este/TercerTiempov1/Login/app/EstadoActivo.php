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

class EstadoActivo extends Model
{
    protected $table ="EstadosActivo";

   protected $fillable = ['Estado'];

    public function Users(){

        return $this->hasMany(User::class);
    }
    public function participantes(){

        return $this->hasMany(Participantes::class);
    }

     public function eventos(){

        return $this->hasMany(Evento::class);
    }
}
