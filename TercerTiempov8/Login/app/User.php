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



use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    
    use Notifiable;
    protected $table ="Users";

    /**
  

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'Nombres', 'Apellidos','Rut', 'Telefono','email','password','Direccion', 'NombreFacturacion','RutFactiracion','DireccionFacturacion','TipoUsuario_id','EstadosActivo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tipousuario(){

     return $this->belongsTo(TipoUsuario::class,'TipoUsuario_id','id');
  //probar este 1 a 1
    // return $this->hasOne(TipoUsuario::class, 'llaveforanea(como sera llamada en la otra tabla)','id');

    }
    
    public function estadoactivo(){
        return $this->belongsTo(EstadoActivo::class,'EstadosActivo_id', 'id');
    }
   

    public function eventos(){

        return $this->hasMany(Evento::class);
    }
    
}
