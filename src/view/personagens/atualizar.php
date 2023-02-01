<?php require __DIR__ . "/../share/head.php"; ?>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="/librares/css/view/personagens_cadastro-atualizar.css" />

<div class="titulo">
<h1>Atualizar Personagem</h1>
</div>

<div class="row">
  <div class="col-md-12">
    <form action="/personagens/update?id=<?php echo $escravo->getId() ?>" method="post">
      <fieldset>
        <label for="name">Nome:</label>
        <input type="text" class="form-control" placeholder="Nome" name="nome" id="name" maxlength="30" value="<?php echo $escravo->getNome(); ?>">

        <label for="job">Sexo:</label>
        <select id="job" name="sexo">
          <option value="M" select>Masculinho</option>
          <option value="F">Feminino</option>
        </select>

        <label for="email">Preço:</label>
        <input type="number" class="form-control" placeholder="Preço" name="preço" id="email" max="1000000" maxlength="10" step="0.05" value="<?php echo $escravo->getPreço(); ?>">

        <label for="password">Região:</label>
        <input type="text" class="form-control" placeholder="Região" name="região" id="password" maxlength="30" value="<?php echo $escravo->getRegião(); ?>">

        <label for="email">Idade:</label>
        <input type="number" class="form-control" placeholder="Idade" name="idade" id="email" max="99" maxlength="2" value="<?php echo $escravo->getIdade(); ?>">

        <label for="name">Oficio:</label>
        <input type="text" class="form-control" placeholder="Oficio" name="oficio" id="name" maxlength="30" value="<?php echo $escravo->getOficio(); ?>">

        <label for="job">Documento:</label>
        <select class="js-example-basic-single id="job" name="id_doc">
          <option value=''>Nenhum</option>
          <?php foreach ($listaDocumentos as $doc) { ?>
            <option value="<?php echo $doc->id; ?>" <?php echo $doc->id == $escravo->getIdDoc() ? "selected" : ""; ?>> <?php echo $doc->titulo; ?> </option>
          <?php } ?>
        </select>

      </fieldset>
      <button type="submit">Atualizar</button>

    </form>
  </div>
</div>

</body>

<script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });
</script>

<?php require __DIR__ . "/../share/footer.php"; ?>