<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Representa uma tarefa do usuário na aplicação Infinite.
 */
class Tarefa extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser preenchidos em massa (mass assignable).
     * Inclui o user_id para vincular a tarefa ao usuário.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'titulo',
        'descricao',
        'prazo',
        'concluida',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     * O campo 'concluida' deve ser sempre um booleano.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'concluida' => 'boolean',
        'prazo' => 'date', // Converte a data do banco para objeto Carbon/PHP
    ];

    /**
     * Define o relacionamento: Uma Tarefa pertence a um Usuário.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
