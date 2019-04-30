<?php

namespace Login;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Cviebrock\EloquentSluggable\Sluggable;
use Login\User;
use Login\TipoUsuario;
use Login\Producto;
use Login\Categoria;




use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Sluggable;
    use Notifiable;
    protected $table ="Users";

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'Nombre'
            ]
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'Apellido', 'Telefono','Rut','email','password','RazonSocial','TipoUsuario_id',
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
public function Producto(){

        return $this->hasMany(Producto::class);
    }
   

    
}
