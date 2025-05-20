<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BebeController;
use App\Http\Controllers\AdolecenteController;
use App\Http\Controllers\AdultoController;
use App\Http\Controllers\AdultoMayorController;
use App\Http\Controllers\JovenAdultoController;
use App\Http\Controllers\NinoController;
use App\Http\Controllers\PersonaLongevaController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\CheckAge;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/validar', [LoginController::class, 'validarEdad'])->name('login.validar');

// Rutas protegidas por edad
Route::middleware(CheckAge::class.':bebe')->group(function () {
    Route::get('/bebes', [BebeController::class, 'index'])->name('Bebe');
});

Route::middleware(CheckAge::class.':nino')->group(function () {
    Route::get('/ninos', [NinoController::class, 'index'])->name('Nino');
});

Route::middleware(CheckAge::class.':adolescente')->group(function () {
    Route::get('/adolescentes', [AdolecenteController::class, 'index'])->name('Adolecente');
});

Route::middleware(CheckAge::class.':joven-adulto')->group(function () {
    Route::get('/jovenes-adultos', [JovenAdultoController::class, 'index'])->name('JovenAdulto');
});

Route::middleware(CheckAge::class.':adulto')->group(function () {
    Route::get('/adultos', [AdultoController::class, 'index'])->name('Adulto');
});

Route::middleware(CheckAge::class.':adulto-mayor')->group(function () {
    Route::get('/adultos-mayores', [AdultoMayorController::class, 'index'])->name('AdultoMayor');
});

Route::middleware(CheckAge::class.':persona-longeva')->group(function () {
    Route::get('/personas-longevas', [PersonaLongevaController::class, 'index'])->name('PersonaLongeva');
});