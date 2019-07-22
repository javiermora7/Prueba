<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuentrosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Encuentros';

    /**
     * Run the migrations.
     * @table Encuentros
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            
            $table->increments('id');
            $table->dateTime('FechaHora');
            $table->string('Cancha', 50);
            $table->integer('Evento_id')->unsigned();
            $table->integer('Evento_users_id');
            $table->string('Arbitro1', 50);
            $table->string('Arbitro2', 50)->nullable();
            $table->string('Arbitro3', 50)->nullable();
            $table->string('Arbitro4', 50)->nullable();

            $table->index(["Evento_id", "Evento_users_id"], 'fk_Encuentros_Evento1_idx');


            $table->foreign('Evento_id', 'fk_Encuentros_Evento1_idx')
                ->references('id')->on('Evento')
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
