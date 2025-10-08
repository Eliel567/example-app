<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TarefaController;

/*
|--------------------------------------------------------------------------
| Rotas Públicas (não precisam de login)
|--------------------------------------------------------------------------
*/

// Redireciona / para tela1
Route::get('/', function () {
    return redirect()->route('tela1');
});

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

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Rotas Protegidas (precisam de login)
|--------------------------------------------------------------------------
| Usamos o 'auth' middleware padrão para proteger essas rotas.
*/
Route::middleware('auth')->group(function () {

    // Tela do App (lista de tarefas)
    Route::get('/app', [TarefaController::class, 'index'])->name('app.index');

    // Tarefas - Formulário de Criação (GET)
    Route::get('/tarefa/nova', [TarefaController::class, 'create'])->name('tarefa.nova');
    
    // Tarefas - Salvar no Banco (POST)
    Route::post('/tarefa/salvar', [TarefaController::class, 'store'])->name('tarefa.salvar');
    
    // NOVO: Rota para DELETAR a tarefa
    Route::delete('/tarefa/{tarefa}', [TarefaController::class, 'destroy'])->name('tarefa.deletar');
});