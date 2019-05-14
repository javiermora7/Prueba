<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Evento';

    /**
     * Run the migrations.
     * @table Evento
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('Nombre', 150);
            $table->string('Direccion', 100);
            $table->date('FechaInicio');
            $table->integer('Cupos');
            $table->string('Region', 80);
            $table->string('Comuna', 80);
            $table->string('Descripcion')->nullable();
            $table->string('Fotografia', 50)->nullable();
            $table->integer('RangoEdadMin');
            $table->integer('RangoEdadMax')->nullable();
            $table->integer('users_id')->unsigned();
            $table->integer('EstadosActivo_id')->unsigned();
            $table->integer('Categoria_id')->unsigned();
            $table->integer('Modalidad_id')->unsigned();

            $table->index(["Categoria_id"], 'fk_Evento_Categoria1_idx');

            $table->index(["users_id"], 'fk_Evento_users_idx');

            $table->index(["EstadosActivo_id"], 'fk_Evento_EstadosActivo1_idx');

            $table->index(["Modalidad_id"], 'fk_Evento_Modalidad1_idx');


            $table->foreign('users_id', 'fk_Evento_users_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('EstadosActivo_id', 'fk_Evento_EstadosActivo1_idx')
                ->references('id')->on('EstadosActivo')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Categoria_id', 'fk_Evento_Categoria1_idx')
                ->references('id')->on('Categoria')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Modalidad_id', 'fk_Evento_Modalidad1_idx')
                ->references('id')->on('Modalidad')
                ->onDelete('no action')
                ->onUpdate('no action');
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
       Schema::dropIfExists($this->tableName);
     }
}
