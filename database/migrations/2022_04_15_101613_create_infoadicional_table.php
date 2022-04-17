<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoadicionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infoadicional', function (Blueprint $table) {
            $table->id();
            $table->text('alergia')->default('');
            $table->text('ante_here_fami')->default('');
            $table->text('ante_no_pato')->default('');
            $table->text('ante_pato')->default('');
            $table->text('ante_psiqui')->default('');
            $table->text('dieta_nutri')->default('');
            $table->unsignedBigInteger('idpaciente');
            $table->foreign('idpaciente')->references('id')->on('paciente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infoadicional');
    }
}
