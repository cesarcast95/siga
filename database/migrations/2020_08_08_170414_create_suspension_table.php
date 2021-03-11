<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuspensionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspension', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('fecha_suspension');
            $table->bigInteger('dias_suspension', false, 200);
            $table->uuid('contrato_id');
            $table->foreign('contrato_id', 'fk_suspension_contrato')->references('id')->on('contrato')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('suspension');
    }
}
