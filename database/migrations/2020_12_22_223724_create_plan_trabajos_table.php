<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_trabajos', function (Blueprint $table) {
            $table->id();
            $table->string('evento',255)->nullable();
            $table->string('lugar',100)->nullable();
            $table->string('responsables',200)->nullable();
            $table->date('fecha',0)->unique()->nullable();
            $table->string('hora',50)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('set null')->onUpdate('cascade');
            
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
        Schema::dropIfExists('plan_trabajos');
    }
}
