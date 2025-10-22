<?php

use App\Livewire\Home\Index as Home;
use App\Livewire\Dashboard\Index as Dashboard;
use App\Livewire\GestionUsuario\Index as GestionUsuario;
use App\Livewire\Muestra\Index as Muestra;
use App\Livewire\GestionFormulario\Index as GestionFormulario;
Use App\Livewire\LcInfraestructura\Index as Infraestructura;
Use App\Livewire\Data\Index as Data;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

// Configuracion delivewire para producción

if(config('app.env') == 'production'){
    Livewire::setScriptRoute(function ($handle) {
        return Route::get('/conatla/livewire/livewire.js', $handle)->name('custom-livewire.assets');
    });
    
    Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/conatla/livewire/update', $handle)->name('custom-livewire.update');
    });

    
}


Route::middleware(['auth'])->group(function () {

    Route::get('/', Home::class)->name('home');
    
    Route::get('dashboard', Dashboard::class)
        ->middleware('permission:ver_dashboard')
        ->name('dashboard');

    Route::get('seleccion-muestra', Muestra::class)
        ->name('muestra.index');

    Route::get('gestion-usuario', GestionUsuario::class)
        ->middleware('permission:ver_usuarios')
        ->name('gestion-usuario.index');

    Route::get('gestion-formulario', GestionFormulario::class)
        ->middleware('permission:ver_usuarios')
        ->name('gestion-formulario.index');

    Route::get('lc-infraestructura', Infraestructura::class)
        ->middleware('permission:ver_infraestructura|editar_infraestructura|cargar_infraestructura')
        ->name('lc_infraestructura.index');

    Route::get('data', Data::class)
        ->middleware('permission:ver_data')
        ->name('data.index');

    // Route::redirect('settings', 'settings/profile');

    // Route::get('settings/profile', Profile::class)->name('settings.profile');
    // Route::get('settings/password', Password::class)->name('settings.password');
    // Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});


require __DIR__.'/auth.php';
require __DIR__.'/forms.php';
require __DIR__.'/sfi.php';