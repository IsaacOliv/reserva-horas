<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function(){
    return view('login');
})->name('login');

Route::post ('/logar', [\App\Http\Controllers\LoginController::class, 'logar'])->name('logar');
Route::post('/cadastrar', [\App\Http\Controllers\RegistroController::class, 'registro'])->name('registro');
Route::any('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    //usuario
    Route::controller(\App\Http\Controllers\InicioController::class)->group(function(){
        Route::get('/', 'inicio')->name('inicio');
        Route::put('/alterar-tema', 'alterarTema')->name('alterar-tema');
    });
    Route::controller(\App\Http\Controllers\ContaController::class)->prefix('conta')->group(function(){
        Route::get('/detalhes}', 'detalhes')->name('detalhes.da.conta');
        Route::post('/detalhes', 'update')->name('editar-detalhes-da-conta');
        Route::get('/meus-horarios', 'horarios')->name('meus.horarios');
        Route::delete('/desmarcar-horario', 'desmarcar')->name('desmarcar.horarios');
    });
    Route::controller(\App\Http\Controllers\Usuario\HorarioController::class)->group(function(){
        Route::get('/horarios', 'inicio')->name('inicio.horario');
        Route::post('/reservar-horario', 'reservar')->name('reservar.horario');
    });


    //admin
    Route::prefix('admin')->group(function(){
        Route::resource('horario',\App\Http\Controllers\Admin\HorarioController::class);
        Route::resource('noticias', \App\Http\Controllers\Admin\NoticiasController::class);
    });

});
