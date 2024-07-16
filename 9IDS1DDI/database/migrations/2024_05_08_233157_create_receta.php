<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('receta', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('id_cita');
            $table->unsignedBigInteger('id_medicamento');

            $table->foreign('id_cita')->references('id')->on('cita');
            $table->foreign('id_medicamento')->references('id')->on('medicamento');

            $table->string('cantidad');
            $table->string('tiempo');
            $table->integer('dias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receta');
    }
};
