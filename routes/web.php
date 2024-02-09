<?php

use Illuminate\Support\Facades\Route;


Route::get('/login', function(){
    return view('login');
})->name('login');

Route::post ('/logar', [\App\Http\Controllers\LoginController::class, 'logar']);
Route::post('/cadastrar', [\App\Http\Controllers\RegistroController::class, 'registro'])->name('registro');
Route::any('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::controller(\App\Http\Controllers\InicioController::class)->group(function(){
        Route::get('/', 'inicio')->name('inicio');
    });
    Route::resource('horario',\App\Http\Controllers\horarioController::class);
});

// Route::controller(\App\Http\Controllers\horarioController::class)->prefix('horario')->group(function(){
//     Route::get('/', 'formulario')->name('cadastrar.horario');
//     Route::post('/','registro')->name('registrar.horario');
// });
