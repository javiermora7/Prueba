<?php

namespace Login;
use Login\User;
use Login\TipoUsuario;
use Login\Producto;
use Login\Categoria;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table ="productos";

   protected $fillable = [
        'Nombre', 'PrecioCompra', 'PrecioVenta','Stock','descripcion','Fecha','Categoria_id','Usuario_id',
    ];

     public function User(){

     return $this->belongsTo(User::class,'Usuario_id');

    }

     public function Categoria(){

     return $this->belongsTo(Categoria::class,'Categoria_id');

    }

}
