<?php

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/home', [HomeController::class, 'index']);

    Route::prefix('/parametro_global')->group(function(){
        Route::get('/listado', [ParametroGlobalController::class, 'listado']);
        // Route::post('/ajaxListado', [RolController::class, 'ajaxListado'])->name('rol.ajaxListado');
    });

    Route::prefix('/mes')->group(function(){
        Route::get('/listado', [MesController::class, 'listado']);
        // Route::post('/ajaxListado', [RolController::class, 'ajaxListado'])->name('rol.ajaxListado');
    });

    Route::prefix('/lectura')->group(function(){
        Route::get('/listado', [LecturaController::class, 'listado']);
        // Route::post('/ajaxListado', [RolController::class, 'ajaxListado'])->name('rol.ajaxListado');
    });
});

require __DIR__.'/auth.php';
