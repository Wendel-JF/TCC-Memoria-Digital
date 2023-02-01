<?php
session_start();
//print_r($_SESSION);
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: formulario.php');
}
$logado = $_SESSION['email']
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Inicio</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            background-image: linear-gradient(to right, rgb(61, 55, 80), rgb(49, 84, 112));
            color: white;
        }

        .box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            width: 200px;
            height: 60px;
        }
        /*
        a {
            text-decoration: none;
            color: white;
            border: 3px solid dodgerblue;
            border-radius: 15px;
            padding: 10px;
        }
        

        a:hover {
            background-color: dodgerblue;
        }
        */
    </style>
</head>

<body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a href="#" class="navbar-brand">GROUP.COM</a>
                    </div>

                    <div class="navbar-collapse collapse" id="mobile_menu">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">About One</a></li>
                                    <li><a href="#">About Two</a></li>
                                    <li><a href="#">About Three</a></li>
                                    <li><a href="#">About Four</a></li>
                                    <li><a href="#">About Five</a></li>
                                    <li><a href="#">About Six</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Welcome</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li>
                                <form action="" class="navbar-form">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="search" name="search" id="" placeholder="Search Anything Here..." class="form-control">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>

                      

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Login / Sign Up <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Login</a></li>
                                    <li><a href="#">Sign Up</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class='d-flex'><a href="sair.php" class="btn btn-danger me-5">Sair </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <br>
    <h1>Memorial Digital</h1>
    <?php
    echo "<h1> Bem vindo <u>$logado</u></h1>";
    ?>
    <div class="box">
        <a href="">Login</a>
        <a href="formulario.php">Registro</a>
    </div>
</body>

</html>