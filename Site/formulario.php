<?php

if (isset($_POST['submit'])) {
    include_once('config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $result = mysqli_query($conexao, "INSERT INTO contas(nome,email,senha) VALUES ('$nome','$email', '$senha')");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Memorial Beta</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="form">
        <form action="formulario.php" method="POST">
            <fielset>
                <legend><b>Registro</b></legend>
                <br>
                <div class="InputBox">
                    
                    <input type="text" name="nome" id="name" class="inputUser" placeholder="Nome" required> <input type="email" name="email" id="email" class="Email" placeholder="Email"  required>
                </div>

                <div class="InputBox">
                    
                    <input type="password" name="senha" id="senha" class="inputUser" placeholder="Senha" required>
                </div>
                <input type="submit" name='submit' id="submit" class="botao" value="Criar Conta">
                </fieldset>
        </form>
    </div>
    <div class="Login">
        <form action="testLogin.php" method="POST">
        <legend><b>Login</b></legend>
        
        <br>
        <div class="InputBox">
        <input type="text" name="email" id="email" placeholder="Email" class="inputUser" required > 
        </div>
        <div class="InputBox">
        <input type="password" name="senha" id="senha" placeholder="Senha" required>
        </div>
        <input type="submit" name='botao' id="botao" class="botao2" value="Entrar">
    
    </form>
    </div>
    <div id="linha-vertical"></div>
</body>

</html>