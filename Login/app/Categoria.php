<?php

namespace Login;
use Login\User;
use Login\TipoUsuario;
use Login\Producto;
use Login\Categoria;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
     protected $table ="categoria";

  protected $fillable =['nombre'];


  public function Producto(){

        return $this->hasMany(Producto::class);
    }
}
