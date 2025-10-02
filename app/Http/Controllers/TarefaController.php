<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
use Illuminate\Support\Facades\Auth;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::where('user_id', Auth::id())->get();
        return view('app_tela', compact('tarefas'));
    }

    public function create()
    {
        return view('tarefa');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'prazo'  => 'nullable|date',
        ]);

        Tarefa::create([
            'user_id' => Auth::id(),
            'titulo'  => $request->titulo,
            'prazo'   => $request->prazo,
        ]);

        return redirect()->route('app.index')->with('success', 'Tarefa adicionada com sucesso!');
    }
}
