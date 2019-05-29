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

class Jugador extends Model
{
    protected $table ="Jugador";

   protected $fillable = ['Ju_Posicion', 'Ju_Numero', 'Ju_AmarillaActivas', 'Ju_RojasActivas', 'Ju_AmarillasAcumuladas', 'Ju_RojaAcumuladas', 'Ju_CantidadGoles', 'Ju_Entrenador', 'Ju_Representante', 'Equipo_id', 'Equipo_Evento_id', 'Participante_id', 'Estadojugador_id'];

    public function estadojugador(){
        return $this->belongsTo(EstadoJugador::class,'Estadojugador_id', 'id');
    }

    public function equipo(){
        return $this->belongsTo(Equipo::class,'Equipo_id', 'id');
    }
}
