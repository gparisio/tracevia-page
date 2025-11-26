<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="TRACEVIA - Soluções inovadoras em tecnologia">
    <title><?php echo isset($page_title) ? $page_title . ' - TRACEVIA' : 'TRACEVIA'; ?></title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="/tracevia-page/tracevia-page/assets/css/colors.css">
    <link rel="stylesheet" href="/tracevia-page/tracevia-page/assets/css/style.css">
</head>
<body>
    <!-- Header -->
<header class="header">
    <div class="header-top">

        <!-- LOGO (agora sem tamanho travado) -->
        <div class="header-left">
            <a href="/tracevia-page/tracevia-page/controllers/tracevia-home-controller-novo.php" class="logo">
                <img src="/tracevia-page/tracevia-page/assets/images/bluelogo_tracevia.png"
                     alt="logo-tracevia"
                     class="img-fluid">
            </a>
        </div>

        <!-- Ícones / Idioma no canto direito -->
        <div class="header-right">
            <div class="header-icons">

                <!-- Language Selector -->
                <div class="language-selector">
                    <div class="language-current">
                        <span><?php echo isset($_SESSION['language']) ? $_SESSION['language'] : 'PT'; ?></span>
                        <span class="language-arrow">▼</span>
                    </div>
                    <div class="language-dropdown">
                        <div class="language-option" data-lang="PT">PT</div>
                        <div class="language-option" data-lang="ESP">ESP</div>
                        <div class="language-option" data-lang="ENG">ENG</div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    
    <!-- MENU CENTRAL -->
    <nav class="nav-menu">
        <ul>
            <li><a href="/tracevia-page/tracevia-page/controllers/sobre_controller.php">Sobre Nós</a></li>
            <li><a href="/tracevia-page/tracevia-page/controllers/tracevia-solucoes-controller-novo.php">Soluções</a></li>
            <li><a href="/tracevia-page/tracevia-page/controllers/tracevia-noticias-controller-novo.php">Notícias</a></li>
            <li><a href="/tracevia-page/tracevia-page/controllers/contato_controller.php">Contatos</a></li>
        </ul>
    </nav>
</header>
