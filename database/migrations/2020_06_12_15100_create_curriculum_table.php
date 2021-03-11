<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cedula', 10);
            $table->string('nombre', 100);
            $table->boolean('sexo');
            $table->string('email', 100);
            $table->bigInteger('telefono', false, 10);
            $table->bigInteger('grado_academico', false, 100);
            $table->unsignedBigInteger('carrera_id');
            $table->foreign('carrera_id', 'fk_curriculum_carrera')->references('id')->on('carreras')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha_disposicion');
            $table->string('disponibilidad', 100);
            $table->boolean('recomendado')->nullable();
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id', 'fk_curriculum_empleado')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->string('parentesco')->nullable();
            $table->string('planta');
            $table->longText('obervacion', 500)->nullable();
            $table->boolean('estado_prueba')->default(false);
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
        Schema::dropIfExists('curriculum');
    }
}
