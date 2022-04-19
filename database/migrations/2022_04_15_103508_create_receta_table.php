<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receta', function (Blueprint $table) {
            $table->id();
            $table->text('conclusion');
            $table->timestamps();
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
        Schema::dropIfExists('receta');
    }
}
