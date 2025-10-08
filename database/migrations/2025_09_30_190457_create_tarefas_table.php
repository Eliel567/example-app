<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            
            // Chave estrangeira para o usuário
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            $table->string('titulo');
            $table->date('prazo')->nullable();
            
            // NOVO: Campo para o status de conclusão, com valor padrão FALSE (não concluída)
            $table->boolean('concluida')->default(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
