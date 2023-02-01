<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/librares/css/bootstrap.min.css">
    <link rel="stylesheet" href="/librares/css/sticky-footer-navbar.css">
    
    <!-- Fonte -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome scripts-->
    <script src="https://kit.fontawesome.com/0bd9fdbb42.js" crossorigin="anonymous"></script>
    
     <!-- Parallax -->
    <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
    <title>Memoria Digital</title>
    <style>
    body {
        font-family: 'Robot' , sans-serif;
        background-color: #F0E68C		;
        justify-content: center;
    }
    .container-fluid { /*Posição do Texto da barra de Navegação coloquei mais por centro */
    margin-left: 550px;
}
    a.nav-link.active:hover{ /*cor de fundo ao passar o mouse pelo itens do menu */
        background-color: #343030;
    }
    .navbar-brand:hover {
        color: #D5CDCD;
    }
    #teste {  /*posição do menu no perfil arrumada :) */
       position: absolute;
       left: -100px;
       background-color: #212529;
       color: white;
    }
    .dropdown-item { /*cor do texto no menu de perfil */
        color: white;
    }
    </style>
</head>

<body class="d-flex flex-column h-100" style="background-image: str;">
    <header>
        <!-- Fixed navbar -->
       <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" >
            <div class="container-fluid">
                <a class="navbar-brand" href="/main_page">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" fill="currentColor" class="bi bi-box2-heart" viewBox="0 0 16 16">
                        <path d="M8 7.982C9.664 6.309 13.825 9.236 8 13 2.175 9.236 6.336 6.31 8 7.982Z" />
                        <path d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4h-8.5Zm0 1H7.5v3h-6l2.25-3ZM8.5 4V1h3.75l2.25 3h-6ZM15 5v10H1V5h14Z" />
                    </svg>
                    Memorial Digital</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/main_page">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/mapa">Mapa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/sobre">Sobre</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Usuario
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                                <?php if ($_SESSION["credential"] != "nivel1") { ?>
                                    <li><a class="dropdown-item" href="/usuario/lista">Lista</a></li>
                                <?php } ?>
                                <?php if ($_SESSION["credential"] == "adm") { ?>
                                    <li><a class="dropdown-item" href="/usuario/cadastro">Cadastro</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav d-flex">
                        <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/login/deslog">Sair</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"><?php echo $_SESSION["usuario"]; ?></a>
                        </li>
                        <li class="nav-item dropdown active" >
                            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="mdo" width="40" height="40" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu" id="teste">
                                <li><a class="dropdown-item" href="#">Config</a></li>
                                <li><a class="dropdown-item" href="#">Perfil</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/login/deslog">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-shrink-0">
        <div class="container">