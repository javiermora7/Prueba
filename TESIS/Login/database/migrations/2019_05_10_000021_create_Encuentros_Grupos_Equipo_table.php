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
             
            $table->increments('id');
            $table->integer('Encuentros_id')->unsigned();
            $table->integer('Grupos_Equipo_id')->unsigned();
            $table->integer('Grupos_Equipo_Equipo_Evento_id');
            $table->integer('Grupos_Equipo_Grupos_id');
            $table->integer('Grupos_Equipo_Fase_id');

          


            $table->foreign('Encuentros_id')
                ->references('id')->on('Encuentros')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('Grupos_Equipo_id')
                ->references('id')->on('Grupos_Equipo')
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
