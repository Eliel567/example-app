<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro - Infinite</title>
  <style>
    body { background: #1980BA; font-family: Arial, sans-serif; display:flex; justify-content:center; align-items:center; height:100vh; }
    .form { background:#fff; padding:20px; border-radius:10px; width:300px; text-align:center; }
    input { width:100%; margin:10px 0; padding:10px; border-radius:5px; border:1px solid #ccc; }
    button { background:black; color:white; border:none; padding:10px; width:100%; border-radius:5px; cursor:pointer; }
  </style>
</head>
<body>
  <form method="POST" action="{{ route('processa_cadastro') }}" class="form">
    @csrf
    <h2>Crie sua conta</h2>
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="password" name="password" placeholder="Crie sua senha" required>
    <input type="password" name="password_confirmation" placeholder="Repita sua senha" required>
    <button type="submit">Criar Conta</button>
  </form>
</body>
</html>
