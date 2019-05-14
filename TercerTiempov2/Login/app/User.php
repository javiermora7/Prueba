<?php

namespace Login;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Cviebrock\EloquentSluggable\Sluggable;
use Login\User;
use Login\TipoUsuario;
use Login\Producto;
use Login\Categoria;
use Login\EstadoActivo;




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

     return $this->belongsTo(TipoUsuario::class,'TipoUsuario_id');

    }
    /*
public function Producto(){

     return $this->belongsTo(Producto::class,'EstadosActivo_idEstados');
    }*/

      public function estadoactivo(){
        return $this->belongsTo(EstadoActivo::class,'EstadosActivo_id');
    }
   

    
}
