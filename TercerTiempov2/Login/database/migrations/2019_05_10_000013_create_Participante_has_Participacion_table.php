<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipanteHasParticipacionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Participante_has_Participacion';

    /**
     * Run the migrations.
     * @table Participante_has_Participacion
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
           
            $table->increments('Participante_id')->unsigned();
            $table->integer('Participacion_id')->unsigned();
            $table->integer('Evento_id')->unsigned();
            $table->integer('Evento_users_id');

            $table->index(["Participante_id"], 'fk_Participante_has_Participacion_Participante1_idx');

            $table->index(["Evento_id", "Evento_users_id"], 'fk_Participante_has_Participacion_Evento1_idx');

            $table->index(["Participacion_id"], 'fk_Participante_has_Participacion_Participacion1_idx');


            $table->foreign('Participante_id', 'fk_Participante_has_Participacion_Participante1_idx')
                ->references('id')->on('Participante')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Participacion_id', 'fk_Participante_has_Participacion_Participacion1_idx')
                ->references('id')->on('Participacion')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Evento_id', 'fk_Participante_has_Participacion_Evento1_idx')
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
