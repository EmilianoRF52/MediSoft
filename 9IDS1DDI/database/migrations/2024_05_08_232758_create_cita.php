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
        Schema::create('cita', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_especialidad');
            $table->unsignedBigInteger('id_doctor');
            $table->unsignedBigInteger('id_consultorio');
             
            $table->foreign('id_paciente')->references('id')->on('paciente');
            $table->foreign('id_especialidad')->references('id')->on('especialidad');
            $table->foreign('id_doctor')->references('id')->on('doctor');
            $table->foreign('id_consultorio')->references('id')->on('consultorio');

            $table->string('estado');
            $table->dateTime('fecha_hora');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cita');
    }
};
