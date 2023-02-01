<!DOCTYPE html>
<html lang="pt-br" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonte -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Fonte NOTO SANS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@600&display=swap" rel="stylesheet">

    <!-- Fonte LIBRE BASKEVILLE-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Ms+Madi&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS only -->


    
 <link rel="stylesheet" href="/librares/css/bootstrap/bootstrap.min.css"> 
    <link rel="icon" type="imagem/png" href="/images/icon.png" />

    <link rel="stylesheet" href="/librares/css/head.css">

    <title>Memorial Digital</title>


</head>

<body class="d-flex flex-column h-100">
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top ">

            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="/images/logo.png" class="logo" alt="mdo"> </a>
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
                                Personagens
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                                <li><a class="dropdown-item" href="/personagens">Lista</a></li>
                                <?php if (array_key_exists("usuario", $_SESSION)) { ?>
                                    <li><a class="dropdown-item" href="/personagens/cadastro">Cadastro</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/mapa">Mapa</a>
                        </li>

                        <?php if (array_key_exists("usuario", $_SESSION)) {  ?>
                            <?php if ($_SESSION["credential"] == "adm") { ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Adm
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">

                                        <li><a class="dropdown-item" href="/usuario/lista">Lista</a></li>

                                        <li><a class="dropdown-item" href="/usuario/cadastro">Cadastro</a></li>

                                    </ul>
                                </li> <?php } ?>

                        <?php  }  ?>
                        <!--
                        <?php if (array_key_exists("usuario", $_SESSION)) {  ?>       
                            <?php if ($_SESSION["credential"] == "adm") { ?>            
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Imagem
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                                <li><a class="dropdown-item" href="/imagem/lista">Lista</a></li>
                                <li><a class="dropdown-item" href="/imagem/cadastro">Cadastro</a></li>
                            </ul>
                        </li><?php } ?>
                        <?php } ?>        -->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/equipe">Equipe</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/sobre">Sobre</a>
                        </li>

                    </ul>

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

                            <li class="nav-item" >
                            <div class="text-center">
                                <a href="" class="btn btn-success btn-lg btn-rounded mb-2" data-toggle="modal" data-target="#modalLoginForm">
                                    Login </a>
                            </div>
                            </li>

                           
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <main class="flex-shrink-0">
        <div class="container">
            <!-- Navbar -->
            <style>
    .modal {
        color: black;
    }
</style>
            <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Iniciar sessão</h4>
                                            
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                           
                                        </div>
                                        <div class="modal-body mx-3">
                                        <p>Já possui uma conta? Faça login aqui embaixo.</p>
                                            <br>
                                            <form action="/login/logar" method="POST">
                                            <div class="form-floating">
                                            
                                                <input type="text" id="floatingInput" class="form-control validate" placeholder="Login" name="login" required>
                                                <label for="floatingInput">Login</label>
                                            </div>
                                            <br>
                                            <div class="form-floating">
                                                
                                                <input type="password" id="floatingInput" class="form-control validate" placeholder="Senha" name="password" required>
                                                <label for="floatingInput">Senha</label>
                                                
                                            </div>

                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="submit" class="btn btn-dark btn-lg btn-block">Entrar</button>
                                        </div>
                            </form>
                                    </div>
                                </div>
                            </div>

                          