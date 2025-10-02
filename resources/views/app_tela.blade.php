<!DOCTYPE html> 
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Infinite</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: Arial, sans-serif;
      background-color: #1980BA;
      display: flex;
      flex-direction: column;
      height: 100vh;
      color: #fff;
    }
    header {
      display: flex; align-items: center; justify-content: space-between;
      padding: 15px 20px; background-color: #156494;
    }
    .logo-container { display: flex; align-items: center; gap: 8px; }
    .logo-container img { height: 32px; }
    .logo-container span { font-size: 22px; font-weight: bold; }
    main {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
      overflow-y: auto;
    }
    ul { width: 100%; max-width: 500px; }
    li {
      margin: 10px 0;
      padding: 12px;
      background: #156494;
      border-radius: 8px;
    }
    footer {
      position: relative;
      display: flex;
      justify-content: space-around;
      align-items: center;
      padding: 10px 0;
      background-color: #156494;
    }
    footer .icon { font-size: 20px; cursor: pointer; }
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
      box-shadow: 0 4px 6px rgba(0,0,0,0.3);
      cursor: pointer;
      border: none;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <header>
    <div class="logo-container">
      <img src="{{ asset('Image/Infinite.png') }}" alt="Logo Infinite">
      <span>Infinite</span>
    </div>
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button style="background:none;border:none;color:white;cursor:pointer;">Sair</button>
    </form>
  </header>

  <main>
    @if(session('success'))
      <p style="color: lightgreen; text-align:center;">{{ session('success') }}</p>
    @endif

    @if($tarefas->count())
      <ul>
        @foreach($tarefas as $tarefa)
          <li>
            <strong>{{ $tarefa->titulo }}</strong><br>
            <small>Prazo: {{ $tarefa->prazo ? \Carbon\Carbon::parse($tarefa->prazo)->format('d/m/Y') : 'Não definido' }}</small>
          </li>
        @endforeach
      </ul>
    @else
      <p style="text-align:center;">Nenhuma tarefa cadastrada.</p>
    @endif
  </main>

  <footer>
    <a href="{{ route('tarefa.nova') }}" class="fab">+</a>
    <div class="icon">⚙️</div>
  </footer>
</body>
</html>
