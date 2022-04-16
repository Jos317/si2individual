<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 20);
            $table->string('apellido', 20);
            $table->string('ci', 10);
            $table->string('telefono', 10);
            $table->string('direccion', 50)->nullable();
            $table->char('sexo',1);
            $table->date('fecha_nac');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('imagen')->default('');
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
        Schema::dropIfExists('paciente');
    }
}
