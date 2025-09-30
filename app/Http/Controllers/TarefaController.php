<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::all();
        return view('app_tela', compact('tarefas'));
    }

    public function create()
    {
        return view('tarefa');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required'
        ]);

        Tarefa::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao
        ]);

        return redirect()->route('app.index')->with('success', 'Tarefa criada com sucesso!');
    }
}
