<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('cedula',10)->unique()->nullable();
            $table->string('nombres',50)->nullable();
            $table->string('apellidos',50)->nullable();
            $table->text('avatar')->nullable();
            $table->string('cargo')->unique()->nullable();
            $table->string('username',25)->unique();
            $table->string('email',100)->unique();
            $table->string('password');
            $table->integer('status');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
