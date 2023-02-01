<?php
/*
if (isset($_POST['submit'])) {
    include_once('config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $result = mysqli_query($conexao, "INSERT INTO contas(nome,email,senha) VALUES ('$nome','$email', '$senha')");
}
*/
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <link rel="stylesheet" href="librares/css/bootstrap.min.css">
    <link rel="stylesheet" href="librares/css/signin.css"> 
-->
    <title>Formulario Memorial Beta 2.0</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(105, 111, 117), rgb(49, 84, 112));
            justify-content: center;
            
        }

        .form {
            display: grid;
            grid-template-columns: auto auto auto;
            gap: 10px;
            max-width: 1230px;
            height: 450px;
            margin: auto;
            margin-top: 100px;
            background: rgb(147, 170, 183);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.363)
        }
        @media(max-width:1256px){
            .form {
                grid-template-columns: 0;
            gap: 10px;
                width:400px;
                height: 1000px;
            }
            .grid2 {
                margin-right: 10px;
                margin-top: -400px;
            }
            #linha-vertical {
           
            width: 450px;
           
        }
        .botao,
        .botao2 {
            width:100%;
        }
        .Email {
            margin-left:10px;
        }

        input {
            width:600px;
        }

        }
        @media(max-width:518px){
            .Email {
            margin-left: 1px;
        }
            .form {
                grid-template-columns: 0;
            gap: 10px;
                max-width:340px;
                min-width:320px;
                height: 1000px;
                padding:40px;
            }
            .grid2 {
                margin-right: 10px;
                margin-top: -400px;
            }
        }

        .grid1,
        .grid2 {
            min-width: 320px;
            max-width: 1140px;

        }

        .Email {
            margin-left: 18px;
        }

        #linha-vertical {
            margin-right: 30px;
            height: 450px;
            border-right: 1px solid rgb(81, 79, 79);
        }

        legend {
            margin-bottom: 12px;
            line-height: 1.2;
            color: rgb(224, 246, 249);
        }

        input {
            background-color: rgb(20, 75, 75);
            border-radius: 2px;
            width: 340px;
            height: 35px;
            padding: 10px;
            color: white;
        }

        ::placeholder {
            color: rgb(217, 242, 245);
        }

        .InputBox {
            margin-bottom: 2em;
        }

        .botao,
        .botao2 {
            font-size: 1.2em;
            background: hsl(210, 96%, 30%);
            border: 0;
            padding: 10px;
            width: 48%;
            height: 60px;
            font-size: 15px;
            border-radius: 10px;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);
        }

        .botao2 {
            width: 96%;
        }

        .botao:hover,
        .botao2:hover {
            background: #819ee1;
            cursor: pointer;
            box-shadow: inset 2px 2px 2px rgba(0, 0, 0, 0.2);
            text-shadow: none;
        }
    </style>
</head>

<body>
    <div class="form">
        <div class="grid1">
            <form action="formulario.php" method="POST">
                <fielset>
                    <h1>Registro</h1>

                    <p>Faça seu registro</p>
                    <legend><b>Nome</b></legend>
                    <div class="InputBox">                                                                      
                        <input type="text" name="nome" id="name" class="inputUser" required> <input type="email" name="email" id="email" class="Email" placeholder="Email" required>
                    </div>
                    <legend><b>Senha</b></legend>
                    <div class="InputBox">
                        <input type="password" name="senha" id="senha" class="inputUser" required>
                    </div>
                    <input type="submit" name='submit' id="submit" class="botao" value="Criar Conta">

                    </fieldset>
            </form>
        </div>
        <div id="linha-vertical"></div>
        <div class="grid2">
            <form action="/login/logar" method="POST">
                <h1>Iniciar sessão</h1>
                <p>Já possui uma conta? Faça login aqui <br>
                    embaixo.</p>

                <legend><b>Email</b></legend>
                <div class="InputBox">
                    <input type="text" name="login" id="login" class="inputUser" required>
                </div>
                <legend><b>Senha</b></legend>
                <div class="InputBox">
                    <input type="password" name="password" id="password"  required>
                </div>
                <input type="submit" name='botao' id="botao" class="botao2" value="Entrar">

            </form>
        </div>
    </div>

    <script src="/librares/js/bootstrap.min.js"></script>
</body>

</html>

<!-- <!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="librares/css/bootstrap.min.css">
    <link rel="stylesheet" href="librares/css/signin.css">
    <title>Formulario Memorial Beta 2.0</title>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto">
        <form action="/login/logar" method="POST">
            <h1 class="h3 mb-3 fw-normal">Registro</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="login" name="login" placeholder="name@example.com">
                <label for="login">Login</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Senha</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Logar</button>
            <p class="mt-5 mb-3 text-muted">© ETE - MFL 2022</p>
        </form>
    </main>
    <script src="/librares/js/bootstrap.min.js"></script>
</body>

</html> ->