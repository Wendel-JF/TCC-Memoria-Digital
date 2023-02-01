<head> <title>Cadastro Escravos - Memorial Digital</title> </head>

<?php require __DIR__ . "/../share/head.php"; ?>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="/librares/css/view/personagens_cadastro-atualizar.css" />

<link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0">
<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<div class="titulo">
<h1>Dados dos Escravos</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="/personagens/add" method="POST">
            <fieldset>
                <label for="name">Nome:</label>
                <input type="text" id="name" name="nome" maxlength="50" required>

                <label for="job">Sexo:</label>
                <select id="job" name="sexo">
                    <option value="M" select>Masculinho</option>
                    <option value="F">Feminino</option>
                </select>
                <label for="email">Preço:</label>
                <input type="number" id="mail" name="preço" min=0.1 max="1000000" maxlength="10" step="0.05" required>

                <label for="password">Região:</label>
                <input type="text" id="password" name="regiao" maxlength="30" required>

                <label for="email">Idade:</label>
                <input type="number" id="mail" name="idade" min=1 max="130" required>

                <label for="name">Oficio:</label>
                <input type="text" name="oficio" id="name" maxlength="30" required>

                <label for="job">Documento:</label>
                <select class="form-select" id="job" name="id_doc">
                <option value="">Nenhum</option>
                    <?php foreach ($listaDocumentos as $doc) { ?>
                        <option value="<?php echo $doc->id; ?>"> <?php echo $doc->titulo; ?> </option>
                    <?php } ?>
                </select>
            </fieldset>
            <button type="submit">Cadastrar</button>

        </form>
    </div>
</div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.form-select').select2();
    });
</script>
<!--<script src="./librares/js/view/personagens_cadastro.js"></script>-->
<?php require __DIR__ . "/../share/footer.php"; ?>