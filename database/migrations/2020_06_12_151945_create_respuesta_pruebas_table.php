<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestaPruebasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_pruebas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curriculum_id');
            $table->foreign('curriculum_id', 'fk_pruebas_curriculum')->references('id')->on('curriculum')->onDelete('restrict')->onUpdate('restrict');
            $table->boolean('resultado')->default(false);#Apto-NoApto
            $table->boolean('estado_envio');
            // unsignedTinyInteger no permite números negativos y se usa para cantidades pequeñas
            $table->unsignedTinyInteger('psicometria_ratio');
            $table->string('psicometria_descripcion');
            // unsignedTinyInteger no permite números negativos y se usa para cantidades pequeñas
            $table->unsignedTinyInteger('competencias_ratio');
            $table->string('competencias_descripcion');
            $table->timestamps();
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
        Schema::dropIfExists('respuesta_pruebas');
    }
}
