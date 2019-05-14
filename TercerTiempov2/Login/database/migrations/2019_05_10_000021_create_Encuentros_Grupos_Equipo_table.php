<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuentrosGruposEquipoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Encuentros_Grupos_Equipo';

    /**
     * Run the migrations.
     * @table Encuentros_Grupos_Equipo
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            
            $table->increments('Encuentros_id')->unsigned();
            $table->integer('Grupos_Equipo_Equipo_id')->unsigned();
            $table->integer('Grupos_Equipo_Equipo_Evento_id');
            $table->integer('Grupos_Equipo_Grupos_id');
            $table->integer('Grupos_Equipo_Fase_id');

            $table->index(["Grupos_Equipo_Equipo_id", "Grupos_Equipo_Equipo_Evento_id", "Grupos_Equipo_Grupos_id", "Grupos_Equipo_Fase_id"], 'fk_Encuentros_has_Grupos_Equipo_Grupos_Equipo1_idx');

            $table->index(["Encuentros_id"], 'fk_Encuentros_has_Grupos_Equipo_Encuentros1_idx');


            $table->foreign('Encuentros_id', 'fk_Encuentros_has_Grupos_Equipo_Encuentros1_idx')
                ->references('id')->on('Encuentros')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Grupos_Equipo_Equipo_id', 'fk_Encuentros_has_Grupos_Equipo_Grupos_Equipo1_idx')
                ->references('Equipo_id')->on('Grupos_Equipo')
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
