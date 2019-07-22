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

class Equipo extends Model
{
    protected $table ="equipo";

    protected $fillable =['E_Nombre', 'E_Logo', 'E_puntuacion', 'E_PartidosJugados', 'E_PartidosGanados', 'E_PartidosPerdidos', 'E_PartidosEmpatados', 'E_GolesRealizados', 'E_GolesContra', 'Foto', 'Evento_id'   ];



     public function evento(){

        return $this->belongsTo(Evento::class,'Evento_id', 'id');

    }

    public function jugadores(){

        return $this->hasMany(Jugador::class);

    }

     public function equipoencuentro(){

       
      return $this->hasMany(EquipoEncuentro::class);

  }

  
  public function grupoequipos(){

        return $this->hasMany(GrupoEquipo::class);
    }
//scope


    
  }
