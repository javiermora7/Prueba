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
class Oc extends Model
{
    protected $table ="OC";

   protected $fillable = ['FechaFacturacion', 'FechaVencimiento' ];


public function pago(){

return $this->hasOne(Pago::class, 'OC_id','id');

}

public function descripcion(){

       return $this->hasOne(DescripcionOc::class, 'OC_id','id');

}

}
