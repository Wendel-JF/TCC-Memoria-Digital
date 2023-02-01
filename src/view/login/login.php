
<?php require __DIR__ . "/../share/head.php"; ?>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./librares/css/view/login.css" />
   


    <div class="form">
        <form action="/login/logar" method="POST">
            <h1>Iniciar sessão</h1>
            <p>Já possui uma conta? Faça login aqui embaixo.</p>

            <div class="InputBox">
                <input type="text" name="login" id="id_login" class="inputUser" placeholder="Email" required>
            </div>

            <div class="InputBox">
                <input type="password" name="password" id="password" placeholder="Senha" required>
                
            </div>
            <input type="submit" name='botao' id="botao" class="botao2" value="Entrar">

        </form>

    </div>

    <script src="/librares/js/bootstrap.min.js"></script>
    <?php require __DIR__ . "/../share/footer.php"; ?>