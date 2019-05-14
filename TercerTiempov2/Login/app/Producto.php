<?php

namespace Login;
use Login\User;
use Login\TipoUsuario;
use Login\Producto;
use Login\Categoria;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table ="estadosactivo";

   protected $fillable = ['Estado'];
 public function Users()
    {
        return $this->hasMany('Login\User');
    }
    /*public function Users(){

        return $this->hasMany(User::class);
    }

     public function Categoria(){

     return $this->belongsTo(Categoria::class,'Categoria_id');

    }*/

}
