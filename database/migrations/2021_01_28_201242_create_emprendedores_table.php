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
            $table->string('cedula',10)->nullable()->unique();
            $table->string('nombres',50)->nullable();
            $table->string('apellidos',50)->nullable();
            $table->string('email',100)->nullable();
            $table->date('fec_nac')->nullable();
            $table->string('telefono',10)->nullable();
            $table->string('celular',10)->nullable();
            $table->integer('red_wa')->nullable();
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
        Schema::dropIfExists('emprendedores');
    }
}
