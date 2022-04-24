<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacion', function (Blueprint $table) {
            $table->id();
            $table->string('peso',3)->default('');
            $table->string('estatura',4)->default('');
            $table->string('frecu_cardi',3)->default('');
            $table->string('frecu_respi',2)->default('');
            $table->string('temperatura',2)->default('');
            $table->string('sistolica',3)->default('');
            $table->string('diastolica',3)->default('');
            $table->unsignedBigInteger('idconsulta');
            $table->foreign('idconsulta')->references('id')->on('consulta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informacion');
    }
}
