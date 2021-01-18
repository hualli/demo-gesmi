<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('dni_cuil_cuit');
            $table->dateTime('fecha_nacimiento');
            $table->string('domicilio')->nullable();
            $table->string('telefono_fijo')->nullable();
            $table->string('telefono_celular')->nullable();
            $table->string('email')->nullable();
            $table->string('plan')->nullable();
            $table->string('numero_afiliado')->nullable();
            $table->enum('estado', ['habilitado', 'deshabilitado'])->default('habilitado');
            $table->bigInteger('obrasocial_id')->unsigned();
            $table->timestamps();

            $table->foreign('obrasocial_id')
                  ->references('id')
                  ->on('obras_sociales')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
