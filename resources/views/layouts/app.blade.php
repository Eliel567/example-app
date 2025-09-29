<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Infinite</title>
</head>
<body>
  <header>
    <h1>Infinite</h1>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit">Sair</button>
    </form>
  </header>

  <main>
    @yield('content')
  </main>
</body>
</html>
