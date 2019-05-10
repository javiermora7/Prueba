<?php

namespace Login;
use Login\User;
use Login\TipoUsuario;

use Login\Producto;
use Login\Categoria;


use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table ="tipousuarios";

    protected $fillable =['TipoUsuario'];

    public function Users(){

    	return $this->hasMany(User::class);
    }
   
    
}
