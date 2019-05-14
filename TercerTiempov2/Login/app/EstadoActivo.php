<?php

namespace Login;
use Login\User;
use Login\TipoUsuario;
use Login\Producto;
use Login\Categoria;
use Login\EstadoActivo;
use Illuminate\Database\Eloquent\Model;

class EstadoActivo extends Model
{
    protected $table ="EstadosActivo";

   protected $fillable = ['Estado'];

    public function Users(){

        return $this->hasMany(User::class);
    }
    /*

     public function Categoria(){

     return $this->belongsTo(Categoria::class,'Categoria_id');

    }*/
}
