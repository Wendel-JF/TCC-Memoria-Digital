<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./librares/css/view/login.css" />
    <title>Formulario Memorial Beta 2.0</title>
  
</head>

<body>
    <div class="form">
        <form action="/login/logar" method="POST">
            <h1>Iniciar sessão</h1>
            <p>Já possui uma conta? Faça login aqui embaixo.</p>

            <div class="InputBox">
                <input type="text" name="login" id="login" class="inputUser" placeholder="Email" required>
            </div>

            <div class="InputBox">
                <input type="password" name="password" id="password" placeholder="Senha" required>
            </div>
            <input type="submit" name='botao' id="botao" class="botao2" value="Entrar">

        </form>

    </div>

    <script src="/librares/js/bootstrap.min.js"></script>
</body>

</html>