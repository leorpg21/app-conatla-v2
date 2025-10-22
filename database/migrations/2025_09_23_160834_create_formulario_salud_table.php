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
        Schema::create('formulario_salud', function (Blueprint $table) {
            $table->id();
            $table->enum('pregunta_b3_1', ['si', 'no'])->nullable();
            $table->enum('pregunta_b3_2', ['si', 'no'])->nullable();
            $table->enum('pregunta_b3_3', ['si', 'no'])->nullable();
            $table->enum('pregunta_b3_4', ['si', 'no'])->nullable();
            $table->enum('pregunta_b3_5', ['si', 'no'])->nullable();
            $table->enum('pregunta_b3_6', ['si', 'no'])->nullable();
            $table->enum('pregunta_b3_7', ['si', 'no'])->nullable();
            $table->enum('pregunta_b3_8', ['si', 'no'])->nullable();
            $table->enum('pregunta_b3_9', ['si', 'no'])->nullable();
            $table->string('otro_servicio', 80)->nullable();
            $table->enum('pregunta_c1', ['si', 'no'])->nullable();
            $table->enum('pregunta_c2', ['si', 'no'])->nullable();
            $table->text('pregunta_d1', 500)->nullable();
            $table->text('observaciones_encuesta', 500)->nullable();
            $table->text('observacion', 500)->nullable();
            $table->enum('estado', ['sin revisar', 'gestionado', 'encuestado'])->default('sin revisar');
            $table->enum('seleccionado_muestra', ['si', 'no'])->default('no');
            $table->foreignId('beneficiario_id')
                ->references('id')
                ->on('beneficiarios')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('encuestador_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulario_salud');
    }
};
