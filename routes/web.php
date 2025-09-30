<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TarefaController;

// Tela inicial (Tela 1)
Route::get('/tela1', [PageController::class, 'tela1'])->name('tela1');

// Tela 2
Route::get('/tela2', [PageController::class, 'tela2'])->name('tela2');

// Cadastro
Route::get('/cadastro', [AuthController::class, 'showCadastro'])->name('cadastro');
Route::post('/cadastro', [AuthController::class, 'processaCadastro'])->name('cadastro.processa');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processaLogin'])->name('login.processa');
// Tela do App real
Route::get('/app', [PageController::class, 'appTela'])->name('app.tela');
// Tarefas
Route::get('/app', [TarefaController::class, 'index'])->name('app.tela');
Route::get('/tarefa/nova', [TarefaController::class, 'create'])->name('tarefa.nova');
Route::post('/tarefa/salvar', [TarefaController::class, 'store'])->name('tarefa.salvar');

Route::get('/tarefa', [TarefaController::class, 'create'])->name('tarefa.create');
Route::post('/tarefa', [TarefaController::class, 'store'])->name('tarefa.store');
Route::get('/app', [TarefaController::class, 'index'])->name('app.index');
