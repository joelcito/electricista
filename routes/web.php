<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConsumoController;
use App\Http\Controllers\CostoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LecturaController;
use App\Http\Controllers\MesController;
use App\Http\Controllers\ParametroGlobalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('home');
    // return view('welcome');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/home', [HomeController::class, 'index']);

    Route::prefix('/cliente')->group(function(){
        Route::get('/listado', [ClienteController::class, 'listado']);
        Route::post('/guardar', [ClienteController::class, 'guardar']);
        Route::post('/ajaxListado', [ClienteController::class, 'ajaxListado']);
        Route::post('/ajaxMedidores', [ClienteController::class, 'ajaxMedidores']);
        Route::post('/guardarMedidor', [ClienteController::class, 'guardarMedidor']);
    });

    Route::prefix('/categoria')->group(function(){
        Route::get('/listado', [CategoriaController::class, 'listado']);
        Route::post('/ajaxListado', [CategoriaController::class, 'ajaxListado']);
        Route::post('/guardar', [CategoriaController::class, 'guardar']);
    });

    Route::prefix('/costo')->group(function(){
        Route::get('/listado', [CostoController::class, 'listado']);
        Route::post('/ajaxListado', [CostoController::class, 'ajaxListado']);
        Route::post('/guardar', [CostoController::class, 'guardar']);
    });

    Route::prefix('/consumo')->group(function(){
        Route::get('/listado', [ConsumoController::class, 'listado']);
        Route::post('/ajaxListado', [ConsumoController::class, 'ajaxListado']);
        Route::post('/guardar', [ConsumoController::class, 'guardar']);
    });

    // Route::prefix('/parametro_global')->group(function(){
    //     Route::get('/listado', [ParametroGlobalController::class, 'listado']);
    //     // Route::post('/ajaxListado', [RolController::class, 'ajaxListado'])->name('rol.ajaxListado');
    // });

    // Route::prefix('/mes')->group(function(){
    //     Route::get('/listado', [MesController::class, 'listado']);
    //     // Route::post('/ajaxListado', [RolController::class, 'ajaxListado'])->name('rol.ajaxListado');
    // });

    Route::prefix('/lectura')->group(function(){
        // Route::get('/listado', [LecturaController::class, 'listado']);
        Route::post('/guardaLectura', [LecturaController::class, 'guardaLectura']);
        Route::post('/ajaxListado', [LecturaController::class, 'ajaxListado']);
    });



});

require __DIR__.'/auth.php';
