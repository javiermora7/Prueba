<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipoEncuentrosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Equipo_Encuentros';

    /**
     * Run the migrations.
     * @table Equipo_Encuentros
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {

            $table->increments('id');
            $table->integer('Equipo_id')->unsigned();
            $table->integer('Equipo_Evento_id');
            $table->integer('Encuentros_id')->unsigned();

            $table->index(["Equipo_id", "Equipo_Evento_id"], 'fk_Equipo_has_Encuentros_Equipo1_idx');

            $table->index(["Encuentros_id"], 'fk_Equipo_has_Encuentros_Encuentros1_idx');


            $table->foreign('Equipo_id', 'fk_Equipo_has_Encuentros_Equipo1_idx')
                ->references('id')->on('Equipo')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('Encuentros_id', 'fk_Equipo_has_Encuentros_Encuentros1_idx')
                ->references('id')->on('Encuentros')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
