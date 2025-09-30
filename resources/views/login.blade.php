<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
    body { margin:0; padding:0; background:#1980BA; font-family: Arial, sans-serif; }
    .container { max-width:350px; margin:80px auto; text-align:center; }
    .logo { font-size:40px; margin-bottom:20px; }
    h1 { font-size:22px; font-weight:bold; color:black; margin-bottom:25px; }
    .input { width:100%; padding:12px; margin:10px 0; border:none; border-radius:10px; background:#E6E6E6; }
    .btn { width:100%; padding:12px; background:black; color:white; font-size:16px; border:none; border-radius:10px; cursor:pointer; }
    .btn:hover { opacity:.9; }
  </style>
</head>
<body>
  <div class="container">
    <div class="logo">∞</div>
    <h1>Bem-Vindo de volta!</h1>

    @if(session('success'))
      <p style="color:green">{{ session('success') }}</p>
    @endif
    @if($errors->any())
      <p style="color:red">{{ $errors->first() }}</p>
    @endif

    <form action="{{ route('login.processa') }}" method="POST">
      @csrf
      <input class="input" type="email" name="email" placeholder="E-mail" required>
      <input class="input" type="password" name="senha" placeholder="Senha" required>
      <button class="btn" type="submit">Conecte-se</button>
    </form>
  </div>
</body>
</html>
