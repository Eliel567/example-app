<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
use Illuminate\Support\Facades\Auth;

class TarefaController extends Controller
{
    public function index()
    {
        // Busca tarefas APENAS do usuário logado
        $tarefas = Tarefa::where('user_id', Auth::id())->get();
        // Retorna a tela principal com a lista de tarefas
        return view('app_tela', compact('tarefas'));
    }

    public function create()
    {
        // O Laravel busca 'resources/views/tarefa.blade.php'
        return view('tarefa'); 
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'titulo' => 'required|string|max:255',
            'prazo'  => 'nullable|date',
        ]);

        // Cria e salva a nova tarefa no banco de dados
        Tarefa::create([
            'user_id' => Auth::id(), // Associa ao usuário logado
            'titulo'  => $request->titulo,
            'prazo'   => $request->prazo,
        ]);

        // Redireciona para a tela principal (index) com mensagem de sucesso
        return redirect()->route('app.index')->with('success', 'Tarefa adicionada com sucesso!');
    }
    
    /**
     * Remove a tarefa especificada do armazenamento.
     */
    public function destroy(Tarefa $tarefa)
    {
        // 1. Garante que apenas o DONO da tarefa possa deletá-la
        if ($tarefa->user_id !== Auth::id()) {
            // Se o ID do usuário logado não for o mesmo do dono da tarefa, nega o acesso
            return redirect()->route('app.index')->with('error', 'Você não tem permissão para deletar esta tarefa.');
        }

        // 2. Deleta a tarefa
        $tarefa->delete();

        // 3. Redireciona com mensagem de sucesso
        return redirect()->route('app.index')->with('success', 'Tarefa excluída com sucesso!');
    }
}
