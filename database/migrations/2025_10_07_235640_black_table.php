<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // ...
public function up(): void
{
    Schema::table('tarefas', function (Blueprint $table) {
        // Usa 'text' para permitir strings longas de até 65,535 caracteres.
        // Se 1000 for o limite, 'string' é suficiente, mas 'text' é mais seguro para descrições.
        $table->text('descricao')->nullable()->after('titulo');
    });
}

public function down(): void
{
    Schema::table('tarefas', function (Blueprint $table) {
        $table->dropColumn('descricao');
    });
}
// ...

};