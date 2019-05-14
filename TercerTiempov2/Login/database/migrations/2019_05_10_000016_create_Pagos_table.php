<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Pagos';

    /**
     * Run the migrations.
     * @table Pagos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            
            $table->increments('Evento_id');
            $table->integer('Evento_users_id');
            $table->integer('OC_id')->unsigned();
            $table->integer('Estadopago');

            $table->index(["OC_id"], 'fk_Pagos_OC1_idx');


            $table->foreign('OC_id', 'fk_Pagos_OC1_idx')
                ->references('id')->on('OC')
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
