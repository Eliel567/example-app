<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infinite - Tarefas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #1980BA;
            display: flex;
            flex-direction: column;
            height: 100vh;
            color: #fff;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px;
            background-color: #156494;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo-container img {
            height: 32px;
        }

        .logo-container span {
            font-size: 22px;
            font-weight: bold;
        }

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            overflow-y: auto;
        }

        /* Estilo para a barra de filtros */
        .filter-bar {
            width: 100%;
            max-width: 500px;
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #156494;
            border-radius: 8px;
        }

        .filter-btn {
            background-color: transparent;
            color: #fff;
            border: 1px solid transparent;
            padding: 6px 12px;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s;
        }

        /* Estilo para o botão de filtro ativo */
        .filter-btn.active {
            background-color: #52B0E5;
            font-weight: bold;
        }

        .filter-btn:hover {
            background-color: #1980BA;
        }
        /* FIM NOVO ESTILO FILTRO */

        /* Estilo da lista */
        ul {
            width: 100%;
            max-width: 500px;
            list-style: none;
            padding: 0;
        }

        /* Estilo do item da lista (li) - apenas para margem de separação */
        li {
            margin: 15px 0;
            padding: 0;
            background: none;
        }

        /* O BOX DE TAREFA */
        .task-box {
            padding: 15px;
            background: #156494;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-left: 5px solid #52B0E5;
            /* Azul para pendente */
        }

        /* Estilo para tarefa concluída */
        .task-box.concluida {
            border-left: 5px solid #5CB85C;
            /* Borda verde */
            opacity: 0.8;
        }

        .task-content {
            margin-bottom: 10px;
        }

        .task-box strong {
            display: block;
            font-size: 18px;
            margin-bottom: 5px;
            color: white;
        }

        .task-box p.description {
            font-size: 14px;
            margin-bottom: 10px;
            color: #E0E0E0;
            /* Cor mais clara para descrição */
            white-space: pre-wrap;
            /* Mantém quebras de linha */
        }

        .task-box .dates-container {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            color: #B0D8F1;
            margin-top: 5px;
        }

        .task-box small {
            display: block;
        }

        /* Estilos da Ações da Tarefa */
        .task-actions {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
        }

        /* Estilo do Botão de Concluir */
        .complete-btn {
            background: #5CB85C;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .complete-btn:hover {
            background: #4CAE4C;
        }

        /* Estilo do Botão de Editar */
        .edit-btn {
            background: #52B0E5;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: background-color 0.3s;
            text-decoration: none;
            display: inline-block;
            line-height: normal;
        }

        .edit-btn:hover {
            background: #3B98D0;
        }

        /* Estilos do Botão de Deletar */
        .delete-btn {
            background: #E55252;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .delete-btn:hover {
            background: #D53F3F;
        }

        /* FIM BOTÕES */

        /* Novo Estilo para o Botão Sair/Logout */
        header button {
            background: none;
            border: none;
            color: white !important; /* Força a cor branca */
            cursor: pointer;
            font-size: 16px; /* Aumenta um pouco para melhor visualização */
            font-weight: bold;
            padding: 5px 10px;
            transition: color 0.2s;
        }

        header button:hover {
            color: #B0D8F1 !important; /* Cor mais clara ao passar o mouse */
        }
        /* Fim Novo Estilo */


        footer {
            position: relative;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 10px 0;
            background-color: #156494;
        }

        footer .icon {
            font-size: 20px;
            cursor: pointer;
        }

        .fab {
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #000;
            color: white;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            border: none;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo-container">
            {{-- Fallback image for Infinite logo --}}
            <img src="{{ asset('Image/Infinite.png') }}" onerror="this.onerror=null; this.src='https://placehold.co/32x32/156494/FFFFFF?text=I';" alt="Logo Infinite">
            <span>Infinite</span>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Sair</button>
        </form>
    </header>

    <main>
        {{-- Mensagens de feedback --}}
        @if(session('success'))
            <p style="color: white; text-align:center; font-weight: bold;">{{ session('success') }}</p>
        @endif
        @if(session('error'))
            <p style="color: #E55252; text-align:center; font-weight: bold;">{{ session('error') }}</p>
        @endif
        
        {{-- BARRA DE FILTROS --}}
        <div class="filter-bar">
            {{-- Filtro 'Todas' (Sem parâmetro de status) --}}
            <a href="{{ route('app.index') }}" 
                class="filter-btn @if(is_null($status)) active @endif">
                Todas
            </a>

            {{-- Filtro 'Pendentes' (status=pendente) --}}
            <a href="{{ route('app.index', ['status' => 'pendente']) }}" 
                class="filter-btn @if($status === 'pendente') active @endif">
                Pendentes
            </a>

            {{-- Filtro 'Concluídas' (status=concluida) --}}
            <a href="{{ route('app.index', ['status' => 'concluida']) }}" 
                class="filter-btn @if($status === 'concluida') active @endif">
                Concluídas
            </a>
        </div>
        {{-- FIM BARRA DE FILTROS --}}


        @if($tarefas->count())
            <ul>
                @foreach($tarefas as $tarefa)
                    <li>
                        {{-- Adiciona a classe 'concluida' se $tarefa->concluida for verdadeiro --}}
                        <div class="task-box @if($tarefa->concluida) concluida @endif">

                            <div class="task-content">
                                <strong>
                                    {{ $tarefa->titulo }}
                                    {{-- Exibe "(Concluída)" se o campo for true --}}
                                    @if($tarefa->concluida)
                                        (Concluída)
                                    @endif
                                </strong>

                                {{-- Exibe a descrição se ela existir --}}
                                @if($tarefa->descricao)
                                    <p class="description">{{ $tarefa->descricao }}</p>
                                @endif

                                <div class="dates-container">
                                    {{-- Exibe a data de criação --}}
                                    <small>
                                        Criada: {{ \Carbon\Carbon::parse($tarefa->created_at)->format('d/m/Y') }}
                                    </small>

                                    {{-- Exibe o prazo --}}
                                    <small>
                                        Prazo: {{ $tarefa->prazo ? \Carbon\Carbon::parse($tarefa->prazo)->format('d/m/Y') : 'Não definido' }}
                                    </small>
                                </div>
                            </div>

                            <div class="task-actions">

                                {{-- BOTÃO CONCLUIR / REABRIR --}}
                                <form action="{{ route('tarefa.concluir', $tarefa->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="complete-btn" title="@if($tarefa->concluida) Reabrir Tarefa @else Marcar como Concluída @endif">
                                        @if($tarefa->concluida)
                                            Reabrir
                                        @else
                                            Concluída
                                        @endif
                                    </button>
                                </form>

                                {{-- BOTÃO EDITAR --}}
                                <a href="{{ route('tarefa.editar', $tarefa->id) }}" class="edit-btn" title="Editar Tarefa">
                                    Editar
                                </a>

                                {{-- BOTÃO DELETAR --}}
                                <form action="{{ route('tarefa.deletar', $tarefa->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')"
                                        class="delete-btn" title="Excluir Tarefa">
                                        Deletar
                                    </button>
                                </form>
                            </div>

                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p style="text-align:center;">Nenhuma tarefa cadastrada com o filtro atual.</p>
        @endif
    </main>

    <footer>
        <a href="{{ route('tarefa.nova') }}" class="fab" title="Nova Tarefa">+</a>
    </footer>

</body>

</html>