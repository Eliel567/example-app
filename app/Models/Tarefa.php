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
     */
    protected $fillable = [
        'user_id', 
        'titulo',
        'prazo',
        'concluida', // NOVO: Campo para controlar o status da tarefa
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     */
    protected $casts = [
        'prazo' => 'date',       // Opcional: Garante que 'prazo' é um objeto de data
        'concluida' => 'boolean', // NOVO: Garante que 'concluida' seja tratado como booleano (true/false)
    ];
    
    // Opcional: Adicionar um valor padrão para 'concluida' se não for passado no create
    protected $attributes = [
        'concluida' => false,
    ];

    /**
     * Relacionamento: Uma tarefa pertence a um usuário.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
