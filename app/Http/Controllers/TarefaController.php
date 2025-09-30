<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    // Exibir lista de tarefas
    public function index()
    {
        $tarefas = Tarefa::all();
        return view('app_tela', compact('tarefas'));
    }

    // Exibir formulário de nova tarefa
    public function create()
    {
        return view('tarefa');
    }

    // Salvar tarefa no banco
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'prazo' => 'nullable|date',
        ]);

        Tarefa::create([
            'titulo' => $request->titulo,
            'prazo' => $request->prazo,
        ]);

        return redirect()->route('app.tela')->with('success', 'Tarefa criada com sucesso!');
    }
}
