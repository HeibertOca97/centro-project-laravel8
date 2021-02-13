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
            $table->string('nom_idea',255);
            $table->string('t_plan',15);
            $table->string('sector_act',255);
            $table->string('consumidores',255);
            $table->string('competidores',255);
            $table->string('habilidades',255);
            $table->string('debilidades',255);
            
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
        Schema::dropIfExists('ideanegocios');
    }
}
