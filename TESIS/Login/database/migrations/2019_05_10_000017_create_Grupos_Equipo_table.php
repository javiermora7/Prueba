<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposEquipoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Grupos_Equipo';

    /**
     * Run the migrations.
     * @table Grupos_Equipo
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
           
            $table->increments('id');
            $table->integer('Equipo_id')->unsigned();
            $table->integer('Equipo_Evento_id');
            $table->integer('Grupos_id')->unsigned();
            $table->integer('Fase_id')->unsigned();

            $table->index(["Fase_id"], 'fk_Equipo_has_Grupos_Fase1_idx');

            $table->index(["Equipo_id", "Equipo_Evento_id"], 'fk_Equipo_has_Grupos_Equipo1_idx');

            $table->index(["Grupos_id"], 'fk_Equipo_has_Grupos_Grupos1_idx');


            $table->foreign('Equipo_id', 'fk_Equipo_has_Grupos_Equipo1_idx')
                ->references('id')->on('Equipo')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Grupos_id', 'fk_Equipo_has_Grupos_Grupos1_idx')
                ->references('id')->on('Grupos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Fase_id', 'fk_Equipo_has_Grupos_Fase1_idx')
                ->references('id')->on('Fase')
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
