<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DatosClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_clientes', function (Blueprint $table) {
            $table->id(); //única y autoinc
            $table->string('nombres'); //tipo string
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->text('domicilio');
            $table->string('correo_electronico'); //tipo string único

            $table->timestamps();
            $table->softDeletes(); //'deleted_at' para soft delete
        
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
