<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora', function (Blueprint $table) {
            $table->id();
            $table->string('accion', 50);
            $table->string('tabla', 40)->nullable();
            $table->unsignedBigInteger('idusuario')->nullable();
            $table->foreign('idusuario')->references('id')->on('users');
            $table->unsignedBigInteger('idpaciente')->nullable();
            $table->foreign('idpaciente')->references('id')->on('paciente');
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
        Schema::dropIfExists('bitacora');
    }
}
