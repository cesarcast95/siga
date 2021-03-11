<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('area_id');
            // empleado_id, datos del trabajador quien se encarga del proceso de seleccion
            $table->foreign('area_id', 'fk_proceso_area')->references('id')->on('areas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'fk_cupo_empleado')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id', 'fk_cupo_empresa')->references('id')->on('empresa')->onDelete('restrict')->onUpdate('restrict');
            $table->boolean('estado')->default(false);
            // unsignedTinyInteger no permite números negativos y se usa para cantidades pequeñas
            $table->unsignedTinyInteger('cantidad_cupos')->default(1);#Por defecto desde base de datos 1 vacante por cupo
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
        Schema::dropIfExists('cupos');
    }
}
