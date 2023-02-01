<head>
    <title>Cadastro Escravos - Memorial Digital</title>
</head>
<?php
require __DIR__ . "/../share/head.php";
?>

<!--
<form class="form-inline " id='form' action="/pesquisa/add" method="POST">
    <h2 class="m-2">Dados dos Escravos</h2>
    <div class="form-group mx-sm-3 mb-2 d-flex m-4 check-inline">

        <input type="text" class="form-control w-20 m-2" name="nome" id="inputPassword2" placeholder="Nome" maxlength="30" required>

        <input type="number" class="form-control w-20 m-2" name="idade" id="inputPassword2" placeholder="Idade" max="99" maxlength="2">

        <input type="number" class="form-control w-20 m-2" name="preço" id="inputPassword2" placeholder="Preço" max="1000000" maxlength="10" step="0.05">

        <select name="sexo" required>
            <option value="M" select>Masculinho</option>
            <option value="F">Feminino</option>
        </select>
        <input type="text" class="form-control w-20 m-2" name="oficio" id="inputPassword2" placeholder="Oficio" maxlength="30">
        <input type="text" class="form-control w-20 m-2" name="regiao" id="inputPassword2" placeholder="Regiao" maxlength="30">
    </div>
    <button type="submit" class="btn btn-primary my-2 w-15" style="width: 100%;">Cadastrar</button>
</form>
-->
<style>
    .form-row {
        background-color: yellow;
    }
    
    #nome {
        background-color: green;
        display: flex;
        float:right;
        
    }
    #idade,#ivalidationCustom02 {
        background-color: green;
        display: flex;
        float:right;
    }
</style>
<form class="needs-validation" novalidate>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Nome</label>
      <input type="text" class="form-control" id="nome" name='nome' placeholder="Nome" value="Zezinho" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">idade</label>
      <input type="number" class="form-control" id="idade" name='idade' placeholder="Idade" value="15" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">Username</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
        </div>
        <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Please choose a username.
        </div>
      </div>
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary my-2 w-15">Cadastrar</button>
</form>
<?php require __DIR__ . "/../share/footer.php"; ?>