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
            $table->string('peso',3);
            $table->decimal('estatura',3,2);
            $table->string('frecu_cardi',3);
            $table->string('frecu_respi',2);
            $table->string('temperatura',2);
            $table->string('sistolica',3);
            $table->string('diastolica',2);
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
