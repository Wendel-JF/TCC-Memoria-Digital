<?php require __DIR__ . "/../share/head.php"; ?>
<h1>Tela de Cadastro de Usuario</h1>

<form class="form m-5 " action="/usuario/add" method="post">
  <div class="form-group row p-2">
   
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" name="login" placeholder="Login">
    </div>
  </div>
  <div class="form-group row p-2" >
    
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Senha">
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row p-3">
      <legend class="col-form-label col-sm-2 pt-0">Nivel do Usuario:</legend>
      <div class="col-sm-10">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="nivel" id="gridRadios1" value="nivel1" checked>
          <label class="form-check-label" for="gridRadios1">
            Nivel 1:
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="nivel" id="gridRadios2" value="nivel2">
          <label class="form-check-label" for="gridRadios2">
          Nivel 2:
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="nivel" id="gridRadios3" value="adm">
          <label class="form-check-label" for="gridRadios3">
          ADM
          </label>
        </div>
      </div>
    </div>
  </fieldset>
 
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
  </div>
</form>
<?php require __DIR__ . "/../share/footer.php"; ?>