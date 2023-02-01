<?php require __DIR__ . "/../share/head.php"; ?>
<h1>Atualize a listagem</h1>
<form action="/pesquisa/update?id=<?php echo $escravo->getId() ?>" method="post">
  <div class="form-row" >
    <div class="col m-4">
      <input type="text" class="form-control" placeholder="Nome" name="nome" id="nome" maxlength="30" value="<?php echo $escravo->getNome(); ?>">
    </div>
    <div class="col m-4">
      <input type="text" class="form-control" placeholder="Sexo" name="sexo" id="sexo" value="<?php echo $escravo->getSexo(); ?>">
    </div>
    <div class="col m-4">
      <input type="number" class="form-control" placeholder="Preço" name="preço" id="preço"  max="1000000" maxlength="10" step="0.05" value="<?php echo $escravo->getPreço(); ?>"> 
    </div>
    <div class="col m-4">
      <input type="text" class="form-control" placeholder="Região"  name="região" id="região" maxlength="30" value="<?php echo $escravo->getRegião(); ?>">
    </div>
    <div class="col m-4">
      <input type="number" class="form-control" placeholder="Idade"  name="idade" id="idade" max="99" maxlength="2" value="<?php echo $escravo->getIdade(); ?>">
    </div>
    <div class="col m-4">
      <input type="text" class="form-control" placeholder="Oficio"  name="oficio" id="oficio" maxlength="30" value="<?php echo $escravo->getOficio(); ?>">
    </div>
  </div>
  <button class="btn btn-dark m-4" style="width: 100%;" type="submit">Atualizar</button>
</form>
<?php require __DIR__ . "/../share/footer.php"; ?>