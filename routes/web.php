<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppController;

Route::get('/', function () {
    return view('welcome'); // ou a sua tela inicial
});

// Cadastro
Route::get('/cadastro', [AuthController::class, 'showCadastro'])->name('cadastro');
Route::post('/cadastro', [AuthController::class, 'processaCadastro'])->name('processa_cadastro');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processaLogin'])->name('processa_login');

// Telas do app
Route::get('/app', [AppController::class, 'index'])->middleware('auth')->name('app');
Route::get('/app/tela1', [AppController::class, 'tela1'])->middleware('auth')->name('tela1');
Route::get('/app/tela2', [AppController::class, 'tela2'])->middleware('auth')->name('tela2');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
