<?php

use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;
;

// Route::middleware('auth')->group(function(){
//     Route::get('/', Home::class)->name('home');
//     Route::get('dashboard', Dashboard::class)->name('dashboard');
// });
Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');

});

Route::post('logout', App\Livewire\Actions\Logout::class)->name('logout');