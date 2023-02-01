<!DOCTYPE html>
<html lang="pt-br" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="./librares/css/view/head.css" />

    <!-- Fonte -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Ms+Madi&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


    <link rel="stylesheet" href="/librares/css/bootstrap.min.css">
    <link rel="stylesheet" href="/librares/css/sticky-footer-navbar.css">

    <link rel="stylesheet" type="text/css" href="./librares/css/view/head.css" />

    <title>Memorial Digital</title>
</head>

<body class="d-flex flex-column h-100">
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top " style="background-color: #4169E1; ">
            <div class="container-fluid">
                <a class="navbar-brand" href="/main_page">
                    Memorial Digital</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">

                    <ul class="navbar-nav me-auto mb-2 mb-md-0">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Transcrição
                            </a>
                            
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                                <?php if (array_key_exists("usuario", $_SESSION)) {  ?>
                                        <li><a class="dropdown-item" href="/transcricao/cadastro">Cadastro</a></li>
                                <?php } ?>

                                    <li><a class="dropdown-item" href="/transcricao/lista">Lista</a></li>
                                
                                </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Escravos
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                                <li><a class="dropdown-item" href="/pesquisa">Lista</a></li>
                                <?php if (array_key_exists("usuario", $_SESSION)) {  ?>
                                    <li><a class="dropdown-item" href="/pesquisa/cadastro">Cadastro</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/mapa">Mapa</a>
                        </li>

                        <?php if (array_key_exists("usuario", $_SESSION)) {  ?>

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

                        <?php  }  ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Imagem
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                                <li><a class="dropdown-item" href="/imagem/lista">Lista</a></li>
                                <li><a class="dropdown-item" href="/imagem/cadastro">Cadastro</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/sobre">Sobre</a>
                        </li>

                    </ul>

                    <div class="button">
                        <div class="ball"></div>
                    </div>

                    <ul class="navbar-nav d-flex m-2">
                        
                        <?php if (array_key_exists("usuario", $_SESSION)) {  ?>

                            <li class="nav-item dropdown-center active me-5">
                                <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <!-- <img src="https://github.com/mdo.png" alt="mdo" width="40" height="40" class="rounded-circle"> -->
                                    <?php echo $_SESSION["usuario"]; ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Configurações</a></li>
                                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/login/deslog">Sair</a></li>
                                </ul>
                            </li> <?php } else { ?>
                            <li class="nav-item" id="login">
                                <a class="nav-link active" aria-current="page" href="/login">Login</a>
                            </li> <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <main class="flex-shrink-0">
        <div class="container">
            <!-- Navbar -->
            <script>
                document.querySelector('.ball').addEventListener('click', function(event) {

                    event.target.classList.toggle('ball-move');
                    document.body.classList.toggle('dark');

                });
            </script>