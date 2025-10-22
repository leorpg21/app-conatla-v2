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
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->string('municipio', 60)->nullable();
            $table->string('corregimiento', 60)->nullable();
            $table->string('barrio', 60)->nullable();
            $table->string('direccion')->nullable();
            $table->foreignId('beneficiario_id')
                ->references('id')
                ->on('beneficiarios')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direcciones');
    }
};
