<?php require __DIR__ . "/../share/head.php"; ?>
<h1>Tela de Cadastro de Usuario</h1>

<form class="form" action="/create" method="post">
    <label for="login">Login:</label>
    <input type="text" name="login" id="login">
    <label for="password">Senha:</label>
    <input type="password" name="password" id="password">
    <label for="nivel">Nivel usuario:</label>

    <select name="nivel" id="nivel">
        <option value="adm">ADM</option>
        <option value="nivel2">nivel 2</option>
        <option value="nivel1">nivel 1</option>
    </select>
    <button type="submit">Cadastra</button>
</form>

<?php require __DIR__ . "/../share/footer.php"; ?>