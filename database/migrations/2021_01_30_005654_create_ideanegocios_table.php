<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeanegociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideanegocios', function (Blueprint $table) {
            $table->id();
            $table->string('nom_idea',255)->nullable();
            $table->integer('t_plan')->nullable();
            $table->string('sector_act',255)->nullable();
            $table->string('consumidores',255)->nullable();
            $table->string('competidores',255)->nullable();
            $table->string('habilidades',255)->nullable();
            $table->string('debilidades',255)->nullable();
            $table->string('t_apoyo',255)->nullable();
            
            $table->unsignedBigInteger('emprendedor_id')->unique();
            $table->foreign('emprendedor_id')
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
        Schema::dropIfExists('ideanegocios');
    }
}
