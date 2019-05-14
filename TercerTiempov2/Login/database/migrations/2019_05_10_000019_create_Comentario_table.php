<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentarioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Comentario';

    /**
     * Run the migrations.
     * @table Comentario
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('Nombre', 60)->nullable();
            $table->string('Correo', 100)->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('Comentario', 250)->nullable();
            $table->integer('Encuentros_id')->unsigned();
            $table->integer('Encuentros_Evento_id');

            $table->index(["Encuentros_id", "Encuentros_Evento_id"], 'fk_Comentario_Encuentros1_idx');


            $table->foreign('Encuentros_id', 'fk_Comentario_Encuentros1_idx')
                ->references('id')->on('Encuentros')
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
