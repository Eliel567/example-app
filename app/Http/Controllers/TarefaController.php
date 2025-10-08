<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
use Illuminate\Support\Facades\Auth;

class TarefaController extends Controller
{
    /**
     * Exibe a lista de tarefas, permitindo filtrar por status.
     */
    public function index(Request $request)
    {
        // 1. Inicia a query buscando apenas as tarefas do usuário logado
        $query = Tarefa::where('user_id', Auth::id());

        // 2. Aplica filtro de status, se presente na requisição (URL)
        $status = $request->input('status');

        if ($status === 'pendente') {
            $query->where('concluida', false);
        } elseif ($status === 'concluida') {
            $query->where('concluida', true);
        }

        // 3. Aplica a ordenação: Pendentes primeiro, depois por Prazo, e por fim por data de criação.
        $tarefas = $query->orderBy('concluida')
                         ->orderBy('prazo')
                         ->orderBy('created_at', 'desc') // Ordena por data de criação mais recente
                         ->get();
        
        // Passa o status atual do filtro para a view
        return view('app_tela', compact('tarefas', 'status'));
    }

    // Os métodos 'create', 'store', 'edit', 'update', 'toggleConcluida' e 'destroy' permanecem iguais.

    public function create()
    {
        return view('tarefa'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo'    => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'prazo'     => 'nullable|date',
        ]);

        Tarefa::create([
            'user_id'   => Auth::id(), 
            'titulo'    => $request->titulo,
            'descricao' => $request->descricao,
            'prazo'     => $request->prazo,
            'concluida' => false,
        ]);

        return redirect()->route('app.index')->with('success', 'Tarefa adicionada com sucesso!');
    }
    
    public function edit(Tarefa $tarefa)
    {
        if ($tarefa->user_id !== Auth::id()) {
            return redirect()->route('app.index')->with('error', 'Você não tem permissão para editar esta tarefa.');
        }
        return view('tarefa', compact('tarefa'));
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        if ($tarefa->user_id !== Auth::id()) {
            return redirect()->route('app.index')->with('error', 'Você não tem permissão para atualizar esta tarefa.');
        }

        $request->validate([
            'titulo'    => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'prazo'     => 'nullable|date',
        ]);

        $tarefa->update([
            'titulo'    => $request->titulo,
            'descricao' => $request->descricao,
            'prazo'     => $request->prazo,
        ]);

        return redirect()->route('app.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function toggleConcluida(Tarefa $tarefa)
    {
        if ($tarefa->user_id !== Auth::id()) {
            return redirect()->route('app.index')->with('error', 'Você não tem permissão para alterar o status desta tarefa.');
        }

        $novoStatus = !$tarefa->concluida;
        $tarefa->update(['concluida' => $novoStatus]);
        
        $mensagem = $novoStatus ? 'Tarefa marcada como concluída!' : 'Tarefa reaberta.';

        return redirect()->route('app.index')->with('success', $mensagem);
    }

    public function destroy(Tarefa $tarefa)
    {
        if ($tarefa->user_id !== Auth::id()) {
            return redirect()->route('app.index')->with('error', 'Você não tem permissão para deletar esta tarefa.');
        }

        $tarefa->delete();

        return redirect()->route('app.index')->with('success', 'Tarefa excluída com sucesso!');
    }
}
