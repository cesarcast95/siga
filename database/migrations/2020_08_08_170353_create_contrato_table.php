<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('entrevista_id');
            $table->foreign('entrevista_id', 'fk_contrato_entrevista')->references('id')->on('entrevista')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha_inicio');
            $table->date('fecha_retiro');
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
        Schema::dropIfExists('contrato');
    }
}
