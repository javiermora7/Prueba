<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Equipo';

    /**
     * Run the migrations.
     * @table Equipo
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
           
            $table->increments('id');
            $table->string('E_Nombre', 100);
            $table->string('E_Logo', 45)->nullable();
            $table->integer('E_puntuacion');
            $table->integer('E_PartidosJugados');
            $table->integer('E_PartidosGanados');
            $table->integer('E_PartidosPerdidos');
            $table->integer('E_PartidosEmpatados');
            $table->integer('E_GolesRealizados');
            $table->integer('E_GolesContra');
            $table->string('Foto', 45)->nullable();
            $table->integer('Evento_id')->unsigned();

            $table->index(["Evento_id"], 'fk_Equipo_Evento1_idx');


            $table->foreign('Evento_id', 'fk_Equipo_Evento1_idx')
                ->references('id')->on('Evento')
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
