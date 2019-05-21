<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJugadorTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Jugador';

    /**
     * Run the migrations.
     * @table Jugador
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('Ju_Posicion', 50);
            $table->integer('Ju_Numero');
            $table->integer('Ju_AmarillaActivas');
            $table->integer('Ju_RojasActivas');
            $table->integer('Ju_AmarillasAcumuladas');
            $table->integer('Ju_RojaAcumuladas');
            $table->integer('Ju_CantidadGoles');
            $table->integer('Ju_Entrenador');
            $table->integer('Ju_Representante');
            $table->integer('Equipo_id')->unsigned();
            $table->integer('Equipo_Evento_id');
            $table->integer('Participante_id')->unsigned();
            $table->integer('Estadojugador_id')->unsigned();

            $table->index(["Equipo_id", "Equipo_Evento_id"], 'fk_Jugador_Equipo1_idx');

            $table->index(["Estadojugador_id"], 'fk_Jugador_Estadojugador1_idx');

            $table->index(["Participante_id"], 'fk_Jugador_Participante1_idx');


            $table->foreign('Equipo_id', 'fk_Jugador_Equipo1_idx')
                ->references('id')->on('Equipo')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('Participante_id', 'fk_Jugador_Participante1_idx')
                ->references('id')->on('Participante')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('Estadojugador_id', 'fk_Jugador_Estadojugador1_idx')
                ->references('id')->on('Estadojugador')
                ->onDelete('cascade')
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
