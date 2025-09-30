<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nova Tarefa</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #52B0E5; /* cor do cabeçalho */
      font-family: Arial, sans-serif;
      height: 100vh;
      display: flex;
      flex-direction: column;
    }

    header {
      background-color: #52B0E5;
      padding: 15px;
      display: flex;
      align-items: center;
      font-weight: bold;
      font-size: 18px;
      color: black;
    }

    header a {
      margin-right: 10px;
      text-decoration: none;
      font-size: 20px;
      color: black;
    }

    main {
      flex: 1;
      background-color: #1980BA; /* fundo principal */
      padding: 20px;
    }

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
      color: black;
    }

    input {
      width: 100%;
      padding: 12px;
      border-radius: 25px;
      border: none;
      margin-bottom: 20px;
      background: #E6E6E6;
      font-size: 16px;
    }

    .prazo {
      display: flex;
      align-items: center;
      background: #E6E6E6;
      border-radius: 25px;
      padding: 0 10px;
    }

    .prazo input {
      flex: 1;
      border: none;
      outline: none;
      background: transparent;
      padding: 12px;
      font-size: 16px;
    }

    .prazo button {
      background: black;
      color: white;
      border: none;
      border-radius: 50%;
      width: 35px;
      height: 35px;
      cursor: pointer;
      font-size: 16px;
    }

    .check-btn {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background: black;
      color: white;
      border: none;
      border-radius: 50%;
      width: 55px;
      height: 55px;
      font-size: 24px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <header>
    <a href="{{ route('app.tela') }}">←</a>
    Nova tarefa
  </header>

  <main>
    <form action="{{ route('tarefa.salvar') }}" method="POST">
  @csrf
  <label for="tarefa">O que deve ser feito?</label>
  <input type="text" id="tarefa" name="titulo" placeholder="Insira sua nova tarefa aqui" required>

  <label for="prazo">Prazo</label>
  <div class="prazo">
    <input type="date" id="prazo" name="prazo">
    <button type="button">📅</button>
  </div>

  <button type="submit" class="check-btn">✔</button>
</form>
  </main>
</body>
</html>
