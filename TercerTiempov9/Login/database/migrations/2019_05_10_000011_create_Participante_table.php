<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipanteTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Participante';

    /**
     * Run the migrations.
     * @table Participante
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
           
            $table->increments('id');
            $table->string('Pa_Nombre', 50);
            $table->string('Pa_Apellido', 50);
            $table->string('Pa_Rut', 10);
            $table->integer('Pa_Edad');
            $table->date('Pa_FechaNacimiento');
            $table->string('Pa_Correo', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('Pa_Contacto');
            $table->string('Pa_img', 50);
            $table->integer('EstadosActivo_id')->unsigned();

            $table->index(["EstadosActivo_id"], 'fk_Participante_EstadosActivo1_idx');


            $table->foreign('EstadosActivo_id', 'fk_Participante_EstadosActivo1_idx')
                ->references('id')->on('EstadosActivo')
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
