<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->enum('estado', ['Pendiente', 'Cancelado', 'Atendido'])->default('Pendiente');
            $table->dateTime('fecha')->nullable();
            $table->decimal('coseguro', 9, 2)->default(0.00);
            $table->text('motivo_consulta')->nullable();
            $table->bigInteger('tipo_consulta_id')->unsigned();
            $table->bigInteger('paciente_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('paciente_id')
                  ->references('id')
                  ->on('pacientes')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('tipo_consulta_id')
                  ->references('id')
                  ->on('tipo_consulta')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
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
        Schema::dropIfExists('turnos');
    }
}
