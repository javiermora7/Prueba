<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescripcionocTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'DescripcionOC';

    /**
     * Run the migrations.
     * @table DescripcionOC
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('Descripcion', 100);
            $table->integer('Valor');
            $table->integer('OC_id')->unsigned();

            $table->index(["OC_id"], 'fk_DescripcionOC_OC1_idx');


            $table->foreign('OC_id', 'fk_DescripcionOC_OC1_idx')
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
