<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileregisteremprendedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profileregisteremprendedors', function (Blueprint $table) {
            $table->id();
            $table->integer('edad');
            $table->string('sexo',10);

            $table->unsignedBigInteger('tipodoc_id')->nullable();
            $table->foreign('tipodoc_id')
            ->references('id')
            ->on('tipodocs')
            ->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('nivel1_id')->nullable();
            $table->foreign('nivel1_id')
            ->references('id')
            ->on('estadoeducativos')
            ->onDelete('set null')->onUpdate('cascade');
            
            $table->unsignedBigInteger('nivel2_id')->nullable();
            $table->foreign('nivel2_id')
            ->references('id')
            ->on('estadoeducativos')
            ->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('nivel3_id')->nullable();
            $table->foreign('nivel3_id')
            ->references('id')
            ->on('estadoeducativos')
            ->onDelete('set null')->onUpdate('cascade');
            
            $table->unsignedBigInteger('nivel4_id')->nullable();
            $table->foreign('nivel4_id')
            ->references('id')
            ->on('estadoeducativos')
            ->onDelete('set null')->onUpdate('cascade');

            $table->date('fec_titulacion'); 
            $table->string('trabajoActual',2);

            $table->unsignedBigInteger('tipotrabajo_id')->nullable();
            $table->foreign('tipotrabajo_id')
            ->references('id')
            ->on('tipotrabajos')
            ->onDelete('set null')->onUpdate('cascade');

            $table->string('ingreso_princ',2);
            $table->string('ingreso_emp',2);

            $table->unsignedBigInteger('sectortrabajo_id')->nullable();
            $table->foreign('sectortrabajo_id')
            ->references('id')
            ->on('sectortrabajos')
            ->onDelete('set null')->onUpdate('cascade');

            $table->string('sector_tb',50);

            $table->unsignedBigInteger('emprendedore_id')->unique();
            $table->foreign('emprendedore_id')
            ->references('id')
            ->on('emprendedores')
            ->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('profileregisteremprendedors');
    }
}
