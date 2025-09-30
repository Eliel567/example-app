<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Infinite</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <style>
    :root{
      --bg: #1980BA;
      --text: #0A0A0A;
      --btn-bg: #FFFFFF;
      --btn-text: #0A0A0A;
      --btn-shadow: 0 8px 24px rgba(0,0,0,.15);
      --card-shadow: 0 10px 30px rgba(0,0,0,.20);
      --maxw: 1024px;
    }
    body{
      margin:0;
      font-family: Inter, system-ui, Arial, sans-serif;
      background: var(--bg);
      color:#fff;
      display:flex;
      align-items:center;
      justify-content:center;
    }
    .wrap{ width:100%; max-width:var(--maxw); padding: 40px; }
    .brand{ display:flex; gap:12px; align-items:center; margin-bottom: 24px; }
    .brand__title{ font-weight: 800; font-size: clamp(34px, 5vw, 56px); color:black; }
    .brand__icon{ height:40px; width:auto; }
    .hero{ display:grid; grid-template-columns: 1.15fr .85fr; gap: 32px; align-items:center; }
    .hero__copy h2{ margin:0 0 8px 0; font-weight: 800; font-size: 40px; color:#000; }
    .hero__copy p{ margin:0; font-weight: 800; font-size: 24px; color:#000; }
    .cta{ margin-top: 28px; display:flex; gap: 24px; flex-wrap: wrap; }
    .btn{ border:0; border-radius: 999px; padding: 16px 26px; font-weight: 600; font-size: 18px;
      background: var(--btn-bg); color: var(--btn-text); text-decoration:none;
      display:inline-flex; align-items:center; justify-content:center; min-width: 200px;
      box-shadow: var(--btn-shadow); cursor:pointer; transition: 0.2s;
    }
    .btn:hover{ opacity:.9 }
    .hero__art{ justify-self:end; width: min(520px, 100%); aspect-ratio: 4 / 5; border-radius: 24px;
      background: rgba(255,255,255,.06); box-shadow: var(--card-shadow); display:flex;
      align-items:center; justify-content:center; overflow:hidden;
    }
    .hero__art img{ width:100%; height:100%; object-fit:contain; }
    @media (max-width: 860px){ .hero{ grid-template-columns:1fr; text-align:center; } .cta{ justify-content:center; } }
  </style>
</head>
<body>
  <main class="wrap">
    <div class="brand">
      <h1 class="brand__title">Infinite</h1>
      <img class="brand__icon" src="{{ asset('Image/Infinite.png') }}" alt="Símbolo do infinito">
    </div>

    <section class="hero">
      <div class="hero__copy">
        <h2>Simples, flexível e poderoso.</h2>
        <p>Mantenha tudo em um só lugar.</p>
        <div class="cta">
          <a class="btn" href="{{ route('login') }}">Iniciar Sessão</a>
          <a class="btn" href="{{ route('cadastro') }}">Criar Conta</a>
        </div>
      </div>
      <figure class="hero__art">
        <img src="{{ asset('Image/produtividade.png') }}" alt="Pessoa com notebook" />
      </figure>
    </section>
  </main>
</body>
</html>
