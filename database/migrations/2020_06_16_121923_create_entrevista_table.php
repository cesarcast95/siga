<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrevistaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrevista', function (Blueprint $table) {
            $table->id();
            $table->boolean('estado')->default(false);
            $table->unsignedBigInteger('cupos_id');
            $table->foreign('cupos_id', 'fk_entrevista_cupos')->references('id')->on('cupos')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha_entrevista');
            $table->time('hora_entrevista', 0);
            $table->decimal('calificacion', 2, 1, false);
            $table->unsignedBigInteger('prueba_id')->unsigned();
            $table->foreign('prueba_id', 'fk_entrevista_prueba')->references('id')->on('respuesta_pruebas')->onDelete('restrict')->onUpdate('restrict');
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrevista');
    }
}
