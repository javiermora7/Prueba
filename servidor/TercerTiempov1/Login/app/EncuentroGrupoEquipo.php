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

class EncuentroGrupoEquipo extends Model
{
    protected $table = "Encuentros_Grupos_Equipo";

    protected $fillable =['Encuentros_id', 'Grupos_Equipo_id', 'Grupos_Equipo_Equipo_Evento_id', 'Grupos_Equipo_Grupos_id', 'Grupos_Equipo_Fase_id'];



          public function grupoequipo(){

        return $this->belongsTo(Encuentro::class,'Grupos_Equipo_id', 'id');

    }  

      public function encuentro(){

        return $this->belongsTo(Encuentro::class,'Encuentros_id', 'id');

           
           
          
}
