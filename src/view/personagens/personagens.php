<head>
  <title>
    <?php 
if ($valorpesquisa != null) {
      echo $valorpesquisa . ' - ';
    } ?>
    Lista de Personagens - Memorial Digital
  </title>
</head>
<?php require __DIR__ . "/../share/head.php"; ?>


<link rel="stylesheet" type="text/css" href="./librares/css/view/pesquisa.css" />
<link rel="stylesheet" type="text/css" href="/librares/css/view/modal_atualizar_personagens.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />

<link href="/librares/dist_select2/css/select2.min.css" rel="stylesheet" />
<script src="/librares/dist_select2/js/select2.min.js"></script>

<div class="container1">
  <div class="table-wrapper">
    <div class="table-title">
      <div class="row">
        <div class="col-sm-6">
          <a class="navbar-brand" href="/personagens">
            <h2>Lista de <b>Personagens</b></h2>
          </a>
        </div>

        <form action="/personagens?numero_registro=<?php echo $numero_registro ?>" style="width:470px" method="GET">

        <div class="caixa-de-pesquisa">
        
          <input type="search" class="form-control" placeholder="Pesquisa" id="search" name="search" value="<?php echo $valorpesquisa ?>" list="autocomplete">
          <button type="submit" class="btn btn-dark">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
          </button>
          
          <datalist id="autocomplete">
          <?php  foreach ($AutoComplete as $dados) { ?>
            <?php $d = rand(0,1); if($d == 0) { ?>
            <option value="<?php echo $dados->getNome();?>">
            <?php } else {?>
            <option value="<?php echo $dados->getRegião();?>">
            <?php } ?>
            <?php }?>
          </datalist>
          
          <button type="button" class="btn btn-dark mx-3" data-toggle="modal" data-target="#exampleModal">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
  <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
</svg>
            </button>
          
        </div>

        <!-------------------------- MODAL ----------------------->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered"  id="exampleModalId"role="document">
            <div class="modal-content" >
              <div class="modal-header">
                <h3 class="modal-title text-center" id="exampleModalLabel">Filtragem</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
           
              <div class="form">

                  <label for="form-select" >Ordenar Por:</label>
                  <select class="form-select" aria-label="Default select example" name="sortBy">

                  <optgroup label="Registro">
                  <option value="id DESC">Mais Recente</option>
                  <option value="id">Mais Antigo</option>
                  </optgroup>

                  <optgroup label="Nome">
                  <option value="nome">A a Z </option>
                  <option value="nome DESC">Z a A </option>
                  </optgroup>

                  <optgroup label="Preço">
                  <option value="preço">Menor Para Maior</option>
                  <option value="preço DESC">Maior Para Menor</option>
                  </optgroup>

                  <optgroup label="idade">
                  <option value="idade ">Menor Para Maior</option>
                  <option value="idade DESC">Maior Para Menor</option>
                  </optgroup>

                  </select>
                  </div>
                  <br>

                  <div class="form">
                  <label for="form-select" >Genero:</label>
                  <select class="form-select" aria-label="Default select example" name="genero">

                  <option value="" selected> </option>
                  <option value="m" <?php echo $valor_genero == "m" ? "selected" : ""; ?>>Masculino</option>
                  <option value="f" <?php echo $valor_genero == "f" ? "selected" : ""; ?>>Feminino</option>
              
                  </select>
                  
                  </div>
                  <br>
                  <div class="row">
                    <label for="#idade">Idade:</label>
                    <div class="col">
                      <input type="number" class="form-control" id="idade1" placeholder="Minimo" name="idade_min" maxlength="4" min=1 max=99   value="<?php echo $valor_idade_min; ?>" > 
                    </div>
                    <div class="col">
                      <input type="number" class="form-control" id="idade2" placeholder="MaxImo" name="idade_max" maxlength="4" min=2 max=99  value="<?php echo $valor_idade_max; ?>" >
                    </div>
                  </div>
                 
                  <br>
                  <div class="row">
                    <label>Preço:</label>
                    <div class="col">
                      <input type="number" class="form-control" id="preco_min" placeholder="Minimo" name="preco_min" value="<?php ?>"  max=100000 maxlength="10" step="0.05" value="<?php echo $valor_preco_min; ?>">
                    </div>
                    <div class="col">
                      <input type="number" class="form-control" id="preco_max" placeholder="MaxImo" name="preco_max"  min=1 max=100000 maxlength="10" step="0.05" value="<?php echo $valor_preco_max; ?>">
                    </div>

                  </div>
                  
              </div>
              <div class="modal-footer">
              
                <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                <input type="reset" class="btn btn-danger" value="Limpar">
                <button type="submit" class="btn btn-success">Filtrar</button>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!------------------------------------------------------------------------------------------------------------------->

    <table class="table table-striped table-hover">
      <thead>
        <tr align="center">
        <?php if($listaEscravos->tr <= 0) { ?> 
              <th></th>
             <td style="color: red;"><b>ERRO!</b> Nenhum Resultado Encontrado</td> 
             <?php } else {?>

          <th>Nome</th>
          <th>Preço</th>
          <th>Sexo</th>
          <th>Região</th>
          <th>Idade</th>
          <th>Oficio</th>

          <?php if (array_key_exists("usuario", $_SESSION)) { ?>
            <?php if ($_SESSION["credential"] != "nivel1") { ?>
              <th>Ação</th>
            <?php } ?>
          <?php } ?>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
      
        <?php while ($dados = mysqli_fetch_array($listaEscravos->limite)) {
          $id = $dados['id'];
          $nome = $dados['nome'];
          $preço = $dados['preço'];
          $sexo = $dados['sexo'];
          $região = $dados['região'];
          $idade = $dados['idade'];
          $oficio = $dados['oficio'];
          $idDoc = $dados['id_Doc'];
        ?>
          <tr align="center">
            <td>
              <?php
              if ($idDoc != null) {
                echo "<a href='/transcricao/view?id=" .  $idDoc . "'> $nome </a>";
              } else {
                echo $nome;
              }
              ?>
            </td>
            
            <td> <?php echo $preço; ?></td>
            <td> <?php echo $sexo; ?></td>
            <td> <?php echo $região; ?></td>
            <td> <?php echo $idade; ?></td>
            <td> <?php echo $oficio; ?></td>
            <?php if (array_key_exists("usuario", $_SESSION)) { ?>
              <?php if ($_SESSION["credential"] != "nivel1") { ?>
                <td>
                  <!--
                   <a href='/personagens/atualizar?id=<?php echo $id; ?>' class="bi bi-pencil-square"><i class="bi bi-pencil-square" title="Editar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.
                        5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg></i></a>
              -->

                  <a data-toggle="modal" href="#AtualizarModal<?php echo $id; ?>" class="bi bi-pencil-square"><i class="bi bi-pencil-square" title="Editar">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.
                        5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                      </svg></i></a>

                  <a href='/personagens/remover?id=<?php echo $id; ?>' class="bi bi-trash3"><i class="bi bi-trash3" title="Remover">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                      </svg></i></a>
                </td>


                <!----------------------------MODAL------------------------------>

                <div class="modal fade bd-example-modal-lg" id="AtualizarModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content" id="modelAtualizar">
                      <div class="modal-header" id="modal-header">
                        <h2 class="modal-title" id="titulo">Atualizar Personagens</h2>
                        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <form class="model-form" action="/personagens/update?id=<?php echo $id; ?>" method="post">

                          <fieldset>
                            <label for="name">Nome:</label>
                            <input type="text" class="form-control" placeholder="Nome" name="nome" id="text" maxlength="30" value="<?php echo $nome; ?>">

                            <label for="select">Sexo:</label>
                            <select class="js-example-basic-single" id="select" name="sexo">
                              <option value="M" select>Masculinho</option>
                              <option value="F">Feminino</option>
                            </select>

                            <label for="email">Preço:</label>
                            <input type="number" class="form-control" placeholder="Preço" name="preço" id="number" max="1000000" maxlength="10" step="0.05" value="<?php echo $preço; ?>">

                            <label for="password">Região:</label>
                            <input type="text" class="form-control" placeholder="Região" name="região" id="text" maxlength="30" value="<?php echo $região; ?>">

                            <label for="email">Idade:</label>
                            <input type="number" class="form-control" placeholder="Idade" name="idade" id="number" max="99" maxlength="2" value="<?php echo $idade; ?>">

                            <label for="name">Oficio:</label>
                            <input type="text" class="form-control" placeholder="Oficio" name="oficio" id="text" maxlength="30" value="<?php echo $oficio; ?>">

                            <label for="select">Documento:</label>
                            <select class="js-example-basic-single" id="select" name="id_doc">
                              <option value="">Nenhum</option>
                              <?php foreach ($listaDocumentos as $doc) { ?>
                                <option value="<?php echo $doc->id; ?>" <?php echo $doc->id == $idDoc ? "selected" : ""; ?>> <?php echo $doc->titulo; ?> </option>
                              <?php } ?>
                            </select>

                          </fieldset>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-dark">Atualizar</button>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>
                <!------------------------------------------------------------------------------------------------------------------->
                
              <?php } ?>
            <?php } ?>
          <?php } ?>
          </tr>
      </tbody>
    </table>

    <div class="clearfix">
    <div class="hint-text" style="color: black;">
    
      <form action="/personagens" method="GET">
      <b> <label>Mostrando:</label>
      <select class="form-select" aria-label="Default select example" id="registro" name="numero_registro" onchange="this.form.submit()">
    <option value="3" <?php echo $numero_registro == 3 ? "selected" : ""; ?> >3</option>
    <option value="5" <?php echo $numero_registro == 5 ? "selected" : ""; ?> >5</option>
    <option value="10" <?php echo $numero_registro == 10 ? "selected" : ""; ?> >10</option>
    <option value="15" <?php echo $numero_registro ==  null ? "selected" : ""; ?>> 15</option>
    <option value="20" <?php echo $numero_registro ==  20 ? "selected" : ""; ?> >20</option>
    <option value="30" <?php echo $numero_registro == 30 ? "selected" : ""; ?> >30</option>
    </select></b> de <b><?php echo $CountDados;?></b> Registros
  </div>
 </form>
      <ul class="pagination">

        <?php if ($listaEscravos->pag > 1) { ?>
          <li class="page-item disabled"><a href="?search=<?php echo $valorpesquisa;?>&sortBy=<?php echo $valor_ordenacao;?>&numero_registro=<?php echo $numero_registro?>&pagina=<?= $listaEscravos->anterior; 
          if ($valor_genero || $valor_idade_min || $valor_idade_max || $valor_preco_min || $valor_preco_max != null) {
           echo "&genero=$valor_genero"."&idade_min=$valor_idade_min"."&idade_max=$valor_idade_max"."&preco_min=$valor_preco_min"."&preco_max=$valor_preco_max"; }?>
         ">Anterior</a></li>
        <?php } ?> 

        <?php
        for ($i = 1; $i <= $listaEscravos->tp; $i++) {
          if ($listaEscravos->pag == $i) { ?>
            <li class='page-item active'><a href='?search=<?php echo $valorpesquisa;?>&sortBy=<?php echo $valor_ordenacao;?>&numero_registro=<?php echo $numero_registro?>&pagina=<?php echo $i;
            if ($valor_genero || $valor_idade_min || $valor_idade_max || $valor_preco_min || $valor_preco_max != null) { 
              echo "&genero=$valor_genero"."&idade_min=$valor_idade_min"."&idade_max=$valor_idade_max"."&preco_min=$valor_preco_min"."&preco_max=$valor_preco_max"; }
              ?>' class='page-link'><?php echo $i;?></a></li>
            <?php } else { ?>
            <li class='page-item'><a href='?search=<?php echo $valorpesquisa;?>&sortBy=<?php echo $valor_ordenacao;?>&numero_registro=<?php echo $numero_registro?>&pagina=<?php echo $i; 
            if ($valor_genero || $valor_idade_min || $valor_idade_max || $valor_preco_min || $valor_preco_max != null) { 
              echo "&genero=$valor_genero"."&idade_min=$valor_idade_min"."&idade_max=$valor_idade_max"."&preco_min=$valor_preco_min"."&preco_max=$valor_preco_max"; }
              ?>' class='page-link'><?php echo $i;?></a></li>
      <?php }
        }
        ?>

        <?php if ($listaEscravos->pag < $listaEscravos->tp) { ?>
          <li class="page-item"><a class="page-link" href="?search=<?php echo $valorpesquisa; ?>&sortBy=<?php echo $valor_ordenacao;?>&numero_registro=<?php echo $numero_registro?>&pagina=<?php echo $listaEscravos->proximo; 
          if ($valor_genero || $valor_idade_min || $valor_idade_max || $valor_preco_min || $valor_preco_max != null) {
           echo "&genero=$valor_genero"."&idade_min=$valor_idade_min"."&idade_max=$valor_idade_max"."&preco_min=$valor_preco_min"."&preco_max=$valor_preco_max"; }?>
         ">Proximo</a></li>
        <?php } ?>

      </ul>
    </div>
  </div>
</div>

<!-- MODAL -->

<script src="./librares/js/view/pesquisa.js"></script>
<?php require __DIR__ . "/../share/footer.php"; ?>