<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosusuarioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    //public $tableName = 'DatosUsuario';

    /**
     * Run the migrations.
     * @table DatosUsuario
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
           
            $table->increments('id');
            $table->string('Nombres', 80);
            $table->string('Apellidos', 80);
            $table->string('Rut', 12);
            $table->integer('Telefono');
            $table->string('email')->unique();
            $table->text('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('Direccion', 100);
            $table->string('NombreFacturacion', 150)->nullable();
            $table->string('RutFactiracion', 10)->nullable();
            $table->string('DireccionFacturacion', 150)->nullable();
            $table->integer('TipoUsuario_id')->unsigned();
            $table->integer('EstadosActivo_id')->unsigned();  
            $table->foreign('TipoUsuario_id')->references('id')->on('TipoUsuarios')->onDelete('cascade');        
            $table->foreign('EstadosActivo_id')->references('id')->on('EstadosActivo')->onDelete('cascade');
            $table->rememberToken();
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
       Schema::dropIfExists('users');
     }
}
