<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre');
              $table->integer('PrecioCompra');
              $table->integer('PrecioVenta'); 
              $table->integer('Stock'); 
               $table->string('descripcion');
                 $table->timestamp('Fecha');
            $table->integer('Categoria_id')->unsigned();
            $table->integer('Usuario_id')->unsigned();
            $table->foreign('Categoria_id')->references('id')->on('categoria')->onDelete('cascade');
            $table->foreign('Usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Productos');
    }
}
