<?php

use App\Livewire\Sfi\IndicadorSeis\Index as IndicadorSeis;
use App\Livewire\Sfi\IndicadorSiete\Index as IndicadorSiete;
use App\Livewire\Sfi\IndicadorOcho\Index as IndicadorOcho;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){
    Route::get('indicador-seis', IndicadorSeis::class)
        ->middleware(['permission:ver_indicador|editar_indicador|cargar_indicador'])
        ->name('indicador_seis.index');

    Route::get('indicador-siete', IndicadorSiete::class)
        ->middleware(['permission:ver_indicador|editar_indicador|cargar_indicador'])
        ->name('indicador_siete.index');

    Route::get('indicador-ocho', IndicadorOcho::class)
        ->middleware(['permission:ver_indicador|editar_indicador|cargar_indicador'])
        ->name('indicador_ocho.index');
});