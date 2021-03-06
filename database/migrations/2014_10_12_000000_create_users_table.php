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
            $table->bigIncrements('id');
            $table->string('apellido');
            $table->string('nombre');
            $table->string('imagen_perfil')->nullable();
            $table->string('username',100)->unique();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('estado', ['habilitado', 'deshabilitado'])->default('habilitado');
            $table->enum('principal', ['visor','pacientes'])->default('pacientes');
            $table->enum('tipo', ['medico','administrativo'])->default('medico');
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
