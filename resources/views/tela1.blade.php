<!DOCTYPE html>
<html lang="pt-br">

<head>
   
  <meta charset="UTF-8" />
   
  <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Infinite</title>
   
  <link rel="preconnect" href="https://fonts.googleapis.com">
   
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
    /* Reset e Base */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    html,
    body {
      height: 100%;
    }

    body {
      /* Gradiente de Fundo Moderno */
      background: linear-gradient(135deg, #1980BA 0%, #0c486a 100%);
      font-family: 'Inter', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    /* Container principal */
    .hero-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 40px 20px;
      max-width: 90%;
      /* Animação de entrada sutil */
      animation: fadeIn 1s ease-out forwards;
      opacity: 0;
    }

    /* Estilo da Marca */
    .brand {
      display: flex;
      align-items: center;
      gap: 18px;
      margin-bottom: 30px;
      text-decoration: none;
      /* Removido do <a> para ser aplicado ao botão */
    }

    .brand__title {
      font-size: clamp(36px, 7vw, 64px);
      font-weight: 900;
      color: #FFFFFF;
      /* Destaque em Branco */
      letter-spacing: -1px;
      text-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .brand__logo {
      width: clamp(50px, 10vw, 100px);
      height: auto;
      filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.4));
      /* Efeito de brilho na logo */
    }

    /* Descrição (Novo Elemento) */
    .tagline {
      color: #B0D8F1;
      font-size: clamp(16px, 3vw, 24px);
      margin-bottom: 50px;
      font-weight: 400;
    }

    /* Botão de Chamada para Ação (CTA) */
    .cta-button {
      display: inline-block;
      padding: 15px 40px;
      border-radius: 50px;
      /* Borda arredondada */
      background-color: #FFFFFF;
      /* Fundo contrastante */
      color: #156494;
      /* Texto em destaque */
      font-weight: 700;
      text-decoration: none;
      font-size: clamp(18px, 4vw, 22px);
      transition: all 0.3s ease;
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
    }

    .cta-button:hover {
      transform: translateY(-3px);
      /* Efeito 3D sutil no hover */
      box-shadow: 0 12px 20px rgba(0, 0, 0, 0.4);
      background-color: #f0f0f0;
    }

    /* Keyframes da Animação */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>
    <div class="hero-container">
        <div class="brand" role="banner">
            <span class="brand__title">Infinite</span>
            <img src="{{ asset('Image/Infinite.png') }}" alt="Logo Infinite" class="brand__logo">
          </div>
       
        <p class="tagline">Organize suas ideias, gerencie seu tempo. Simplifique sua vida.</p>

        <a href="{{ route('tela2') }}" class="cta-button">
            Começar Agora →
          </a>
      </div>
</body>

</html>