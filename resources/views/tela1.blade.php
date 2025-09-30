<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Infinite</title>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0 }
    html, body { height: 100% }
    body {
      background-color: #1980BA;
      font-family: "Inter", Arial, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .brand { display: flex; align-items: center; gap: 14px; padding: 16px; cursor: pointer; }
    .brand__title {
      font-size: clamp(28px, 5vw, 48px);
      font-weight: 800;
      color: black;
    }
    .brand__logo { width: clamp(44px, 8vw, 96px); height: auto; }
  </style>
</head>
<body>
  <a href="{{ route('tela2') }}">
    <div class="brand" role="banner">
      <span class="brand__title">Infinite</span>
      <img src="{{ asset('Image/Infinite.png') }}" alt="Logo Infinite" class="brand__logo">
    </div>
  </a>
</body>
</html>
