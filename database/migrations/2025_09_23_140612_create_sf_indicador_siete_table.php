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
        Schema::create('sf_indicador_siete', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_pago');
            $table->string('egreso');
            $table->decimal('trm', 12, 2);
            $table->text('proyecto', 255);
            $table->decimal('valor_egreso', 12, 2);
            $table->decimal('usd', 8, 2);
            $table->string('contrato', 255);
            $table->integer('cdp');
            $table->integer('rp');
            $table->text('link_anexo');
            $table->enum('verificado', ['si', 'no'])->nullable();
            $table->text('observacion', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sf_indicador_siete');
    }
};
