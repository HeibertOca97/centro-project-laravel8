<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmprendedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprendedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',50);
            $table->string('apellidos',50);
            $table->string('cedula',10);
            $table->string('celular',10);
            $table->string('telefono',9);
            $table->string('correo',80);
            $table->date('fecha_nacimiento');
            $table->unsignedBigInteger('nivel_id')->nullable();
            
            $table->foreign('nivel_id')->references('id')->on('nivelesformacion')->onDelete('set null');

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
        Schema::dropIfExists('emprendedores');
    }
}
