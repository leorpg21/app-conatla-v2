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
        Schema::create('lc_infraestructura', function (Blueprint $table) {
            $table->id();
            $table->string('adecuacion_infraestructura', 255);
            $table->integer('cantidad_reportada');
            $table->string('unidad_medida', 35);
            $table->integer('cantidad_verificada')->nullable();
            $table->string('estado', 10)->nullable();
            $table->text('observacion', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lc_infraestructura');
    }
};
