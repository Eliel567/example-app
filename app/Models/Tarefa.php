<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Importa o Model User

class Tarefa extends Model
{
    use HasFactory;

    /**
     * Os atributos que são mass assignable (atribuíveis em massa).
     * É CRUCIAL incluir o 'user_id' aqui, pois ele é salvo via Tarefa::create().
     */
    protected $fillable = [
        'user_id', // Adicionado: Para ligar a tarefa ao usuário.
        'titulo',
        'prazo',
        // Se você tiver um campo 'status', adicione-o aqui também.
    ];

    // Se a sua tabela se chama 'tarefas' (padrão do Laravel), você não precisa desta linha.
    // protected $table = 'tarefas'; 
    
    // Opcional: Adicionar o relacionamento com o User
    // Isso permite que você acesse o dono da tarefa via $tarefa->user.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
