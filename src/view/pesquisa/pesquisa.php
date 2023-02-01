<head>
  <title><?php echo $_GET['search']; ?> - Memorial Digital</title>
</head>
<?php
require __DIR__ . "/../share/head.php";
?>

<link rel="stylesheet" type="text/css" href="./librares/css/view/pesquisa.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />

<h1>Lista de Documentos</h1>

<div class="caixa-de-pesquisa">

  <input type="search" class="form-control" placeholder="Pesquisar" id="search" list="sugestao">
  <div class="dropdown">
    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" style="width: 100px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Filtro
    </button>
    <div class="dropdown-content">
      <a href="#" name="teste">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div>
  <button type="submit" class="btn btn-dark" onclick="searchData()">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
    </svg>
  </button>
</div>

<datalist id="sugestao">
  <option value="João"></option>
  <option value="Maria"></option>

</datalist>



<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2 m-2" role="group" aria-label="First group">
    <button type="button" class="btn btn-secondary">A</button>
    <button type="button" class="btn btn-secondary">B</button>
    <button type="button" class="btn btn-secondary">C</button>
    <button type="button" class="btn btn-secondary">D</button>

    <button type="button" class="btn btn-secondary">E</button>
    <button type="button" class="btn btn-secondary">F</button>
    <button type="button" class="btn btn-secondary">G</button>


    <button type="button" class="btn btn-secondary">H</button>
  </div>
</div>

<table id="tabela" class="table table-striped table-bordered table-condensed table-hover text-aling center">
  <thead class="thead-light">
    <tr class="table-primary	">
      <th scope="col" colspan="3">Id</th>
      <th scope="col" colspan="3">Nome</th>
      <th scope="col" colspan="3">Preço</th>
      <th scope="col" colspan="3">Sexo</th>
      <th scope="col" colspan="3">Região</th>
      <th scope="col" colspan="3">Idade</th>
      <th scope="col" colspan="3">Oficio</th>

      <?php if (array_key_exists("usuario", $_SESSION)) { ?>
        <?php if ($_SESSION["credential"] != "nivel1") { ?>
          <th scope="col" colspan="3">Ações</th>
        <?php } ?>
      <?php } ?>

    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php while ($dados = mysqli_fetch_array($listaEscravos->limite)) {
      $id = $dados['id'];
      $nome = $dados['nome'];
      $preço = $dados['preço'];
      $sexo = $dados['sexo'];
      $região = $dados['região'];
      $idade = $dados['idade'];
      $oficio = $dados['oficio'];
    ?>

      <tr class="table-light">
        <th scope="row" colspan="3"> <?php echo $id; ?></th>
        <td colspan="3"> <?php echo $nome; ?> </td>
        <td colspan="3"> <?php echo $preço; ?></td>
        <td colspan="3"> <?php echo $sexo; ?></td>
        <td colspan="3"> <?php echo $região; ?></td>
        <td colspan="3"> <?php echo $idade; ?></td>
        <td colspan="3"> <?php echo $oficio; ?></td>
        <?php if (array_key_exists("usuario", $_SESSION)) { ?>
          <?php if ($_SESSION["credential"] != "nivel1") { ?>
            <td colspan="3">
              <?php echo "<a class='btn btn-sm btn-outline-secondary' href='/pesquisa/atualizar?id=" . $id . "'>Atualizar</a>"; ?>
              <?php echo "<a class='btn btn-sm btn-outline-danger' href='/pesquisa/remover?id=" . $id . "'>Excluir</a>"; ?>
            </td>
          <?php } ?>
          <?php } ?><?php } ?>
      </tr>

  </tbody>
</table>

<nav aria-label="Navegação de página exemplo">
  <ul class="pagination">
    <?php
    if ($listaEscravos->pag > 1) {
    ?>
      <li class="page-item">
        <a class="page-link" href="?pagina=<?= $listaEscravos->anterior; ?>" aria-label="Anterior">
          <span aria-hidden="true">Anterior</span>
        </a>
      </li>
    <?php } ?>

    <?php
    for ($i = 1; $i <= $listaEscravos->tp; $i++) {
      if ($listaEscravos->pag == $i) {
        echo "<li class='page-item active'><a class='page-link' href='?pagina=$i'>$i</a></li>";
      } else {
        echo "<li class='page-item'><a class='page-link' href='?pagina=$i'>$i</a></li>";
      }
    }
    ?>

    <?php
    if ($listaEscravos->pag < $listaEscravos->tp) {
    ?>
      <li class="page-item">
        <a class="page-link" href="?pagina=<?php echo $listaEscravos->proximo; ?>" aria-label="Próximo">
          <span aria-hidden="true">Próximo</span>
        </a>
      </li>
    <?php } ?>
  </ul>
</nav>

<script src="./librares/js/view/pesquisa.js"></script>
<?php require __DIR__ . "/../share/footer.php"; ?>