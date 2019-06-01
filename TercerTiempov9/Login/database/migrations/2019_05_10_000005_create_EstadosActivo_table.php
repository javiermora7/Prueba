<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadosactivoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'EstadosActivo';

    /**
     * Run the migrations.
     * @table EstadosActivo
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EstadosActivo', function (Blueprint $table) {
          
          $table->increments('id');
            $table->string('Estado', 45);
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
       Schema::dropIfExists('EstadosActivo');
     }
}
