<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilenewemprendedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profilenewemprendedors', function (Blueprint $table) {
            $table->id();
            $table->string('ciudad',100)->nullable();
            $table->string('direccion',200)->nullable();
            $table->string('nom_universidad',255)->nullable();
            $table->unsignedBigInteger('niveleducativo_id')->nullable();
            $table->unsignedBigInteger('emprendedor_id')->unique();

            $table->foreign('niveleducativo_id')
            ->references('id')
            ->on('niveleducativos')
            ->onDelete('set null')->onUpdate('cascade');

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
        Schema::dropIfExists('profilenewemprendedors');
    }
}
