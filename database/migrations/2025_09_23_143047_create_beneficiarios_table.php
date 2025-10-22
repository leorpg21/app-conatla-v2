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
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150);
            $table->string('genero', 20)->nullable();
            $table->unsignedInteger('edad')->nullable();
            $table->string('numero_telefono', 255)->nullable();
            $table->string('correo', 130)->nullable();
            $table->string('tipo_poblacion_vulnerable', 120)->nullable();
            $table->string('otra_poblacion_vulnerable', 120)->nullable();
            $table->string('tipo_servicio_prestado', 200)->nullable();
            $table->date('fecha_prestacion_servicio')->nullable();
            $table->string('pais_nacimiento', 60)->nullable();
            $table->string('centro_servicio', 150)->nullable();
            $table->string('indicador_asociado', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiarios');
    }
};
