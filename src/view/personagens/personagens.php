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

<script>
  $(document).ready(function() {
    $('table tr#tablelink').click(function() {
      window.location = $(this).data('url');
      returnfalse;
    });
  });
</script>


<link rel="stylesheet" type="text/css" href="./librares/css/view/personagens.css" />
<link rel="stylesheet" type="text/css" href="/librares/css/view/modal_atualizar_personagens.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />

<?php if (array_key_exists("usuario", $_SESSION)) { ?>
  <div class="col-sm " style="width: 50%; float: right; margin-right: -15px;  margin-top: -60px;">
    <button type="button" class="btn btn-dark" style="float: right;" data-toggle="modal" data-target="#CadastrarModal">Cadastrar Novo Personagem</button>
  </div>

  <div class="modal fade bd-example-modal-lg" id="CadastrarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content" id="modelAtualizar">
        <div class="modal-header" id="modal-header">
          <h2 class="modal-title" id="titulo">Cadastro Personagem</h2>
          <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="model-form" action="/personagens/add" method="POST">
            <fieldset>
              <label for="name">Nome:</label>
              <input type="text" class="form-control" placeholder="Nome" name="nome" id="text" maxlength="40" required>

              <label for="select">Genero:</label>
              <select class="js-example-basic-single" id="select" name="genero">
                <option value="" select> Nenhum </option>
                <option value="M"> Masculinho </option>
                <option value="F"> Feminino </option>
              </select>

              <label for="email">Valor:</label>
              <input type="number" class="form-control" placeholder="Valor" name="valor" id="number" min="0.1" max="100000" maxlength="10" step="0.05">

              <label for="name">Coondição/Qualidade:</label>
              <input type="text" class="form-control" placeholder="Coondição/Qualidade:" name="coondicao" id="text" maxlength="25">

              <label for="saude">Saúde:</label>
              <input type="text" class="form-control" placeholder="Saude" name="saude" id="text" maxlength="20">

              <label for="password">Região:</label>
              <input type="text" class="form-control" placeholder="Região" name="regiao" id="text" maxlength="35">

              <label for="email">Idade:</label>
              <input type="number" class="form-control" placeholder="Idade" name="idade" id="number" min="1" max="130" maxlength="2">

              <label for="password">Parentesco:</label>
              <input type="text" class="form-control" placeholder="Parentesco" name="parentesco" id="text" maxlength="20">

              <label for="name">Oficio:</label>
              <input type="text" class="form-control" placeholder="Oficio" name="oficio" id="text" maxlength="20">

              <label for="text">Data de Referencia:</label>
              <input type="number" class="form-control" placeholder="Data de Referencia" name="data_de_referencia" id="text" min="1700" max="1900">


              <label for="select">Documento:</label>
              <select class="select2-search" id="select" name="id_doc">
                <option value="">Nenhum</option>
                <?php foreach ($listaDocumentos as $doc) { ?>
                  <option value="<?php echo $doc->id; ?>"> <?php echo $doc->titulo; ?> </option>
                <?php } ?>
              </select>

              <label for="outras_info" class="form-label">Outras Informacoes:</label>
              <input type="text" class="form-control" placeholder="Outras Informacoes" id="outras_info" name="outras_informacoes" maxlength="25">

            </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-dark">Cadastrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<div class="container" style="width:1200px;">
<div class="row">
<div class="col-4"     style="width: 30%;">
          <a class="navbar-brand" href="/personagens">
            <h2>Lista de <b>Personagens</b></h2>
          </a>
        </div>
       
        <div class="col-3" style="width: 27%;" >
        <form action="/personagens" class="form_filtro" style="width:200px;" method="GET">
          <div class="input-group" style="width:250px; margin-left: -60px">
            <label class="input-group-text"><i class="bi bi-filter-left " ></i></label>
            <select class="form-select" aria-label="Filter select" name="sortBy"  data-live-search="true"  onchange="this.form.submit()">

              <option value="" selected disabled> Ordenar Por: </option>

              <optgroup label="Registro">
                <option value="id DESC" <?php echo $valor_ordenacao == "id DESC" ? "selected" : ""; ?>>Mais Recente</option>
                <option value="id" <?php echo $valor_ordenacao === "id" ? "selected" : ""; ?>>Mais Antigo</option>
              </optgroup>

              <optgroup label="Nome">
                <option value="nome" <?php echo $valor_ordenacao == "nome" ? "selected" : ""; ?>>A a Z </option>
                <option value="nome DESC" <?php echo $valor_ordenacao == "nome DESC" ? "selected" : ""; ?>>Z a A </option>
              </optgroup>

              <optgroup label="Valor">
                <option value="valor" <?php echo $valor_ordenacao == "valor" ? "selected" : ""; ?>>Valor: Menor Para Maior</option>
                <option value="valor DESC" <?php echo $valor_ordenacao == "valor DESC" ? "selected" : ""; ?>>Valor: Maior Para Menor</option>
              </optgroup>

              <optgroup label="idade">
                <option value="idade" <?php echo $valor_ordenacao == 'idade' ? "selected" : ""; ?>>Idade: Menor-Maior</option>
                <option value="idade DESC" <?php echo $valor_ordenacao == "idade DESC" ? "selected" : ""; ?>>Idade: Maior-Menor</option>
              </optgroup>
              </optgroup>

            </select>
          </div>
          </div>
          <div class="col-5" style="margin-right: -50px; margin-left: -10px; float:right; width: 42%;" >
          <div class="caixa-de-pesquisa" >

            <input type="search" class="form-control" placeholder="Pesquisa" id="search" name="search" autocomplete="off" value="<?php echo $valorpesquisa ?>" list="autocomplete" >


            <button type="submit" class="btn btn-dark">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
              </svg>
            </button>

            <datalist id="autocomplete"></datalist>

            <script>
              const registros = [<?php foreach ($AutoComplete as $Arraydados) { ?> '<?php echo $Arraydados->getNome(); ?>',
                  '<?php echo $Arraydados->getRegião(); ?>', '<?php echo $Arraydados->getOficio(); ?>', '<?php foreach ($listaDocumentos as $doc) {
                                                                                                            if ($Arraydados->getIdDoc() == $doc->id) {
                                                                                                              echo $doc->titulo;
                                                                                                            }
                                                                                                          } ?>', <?php } ?>
              ]

              var registrosSemRepeticao = registros.filter((este, i) => registros.indexOf(este) === i);

              document.getElementById('search').addEventListener('input', (e) => {
                let registrosArray = [];

                if (e.target.value) {
                  registrosArray = registrosSemRepeticao.filter(registrosSemRepeticao => registrosSemRepeticao.toLowerCase().includes(e.target.value));
                  registrosArray = registrosArray.map(registrosSemRepeticao => `<option>${registrosSemRepeticao}</option>`)
                }
                showregistrosArray(registrosArray);
              });

              function showregistrosArray(registrosArray) {
                const html = !registrosArray.length ? '' : registrosArray.join('');
                document.querySelector('datalist').innerHTML = html;
              }
            </script>

            <button type="button" class="bi bi-funnel btn-dark mx-3" data-toggle="modal" data-target="#exampleModal" style="width: 20%;">

            </button>

          </div>
            </div>
            </div>
            </div>
          <!-------------------------- MODAL ----------------------->

          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" id="exampleModalId" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title text-center" id="exampleModalLabel">Filtragem</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <div class="form">
                    <label for="form-select">Genero:</label>
                    <select class="form-select" aria-label="Default select example" name="filtro_genero">
                      <option value='' selected>Nenhum</option>
                      <option value="m" <?php echo $valor_genero == "m" ? "selected" : ""; ?>>Masculino</option>
                      <option value="f" <?php echo $valor_genero == "f" ? "selected" : ""; ?>>Feminino</option>
                    </select>
                  </div>
                
                  <div class="wrapper">
                    <label for="#slider-1" style="font-size: 20px;"><b>Idade:</b></label>
                    <div class="container3">

                      <div class="slider-track"></div>
                      <input type="range" min=0 max=130 value="<?php echo $valor_idade_min != null ? $valor_idade_min : 0; ?>" id="slider-1" name="idade_min" oninput="slideOne()">
                      <input type="range" min=0 max=130 value="<?php echo $valor_idade_max != null ? $valor_idade_max : 130; ?>" id="slider-2" name="idade_max" oninput="slideTwo()">
                    </div>
                    <div class="values">
                      <span id="range1">
                        0
                      </span>
                      <span> &dash; </span>
                      <span id="range2">
                        100
                      </span>
                    </div>
                  </div>


                  <div class="wrapper">
                    <label for="#slider-1" style="font-size: 20px;"><b>Valor:</b></label>
                    <div class="container3">

                      <div class="slider-track2"></div>
                      <input type="range" min=0 max=100000 step="100" value="<?php echo $valor_valor_min != null ? $valor_valor_min : 0; ?>" id="slider-3" name="valor_min" oninput="slideThree()">
                      <input type="range" min=0 max=100000 step="100" value="<?php echo $valor_valor_max != null ? $valor_valor_max : 100000; ?>" id="slider-4" name="valor_max" oninput="slideFour()">
                    </div>
                    <div class="values">
                      <span id="range3">
                        0
                      </span>
                      <span> &dash; </span>
                      <span id="range4">
                        100
                      </span>
                    </div>
                  </div>

                </div>
                <div class="modal-footer">

                  <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-success">Filtrar</button>
        </form>
      </div>
    </div>
  </div>
</div>



<!------------------------------------------------------------------------------------------------------------------->

<table class="table table-hover table-dark">
  <thead>

    <tr>
      <?php if ($ListaPersonagens->tr <= 0) { ?>
        <th></th>
        <td style="color: red;"><b>ERRO!</b> Nenhum Resultado Encontrado</td>
      <?php } else { ?>

        <th>Nome</th>
        <th>Data de Referençia</th>
        <th>Região</th>
        <th>Oficio</th>
        <th>Genero</th>
        <th>Parentesco</th>
        <th>Coondição/Qualidade</th>
        <th>Saúde</th>
        <th>Idade</th>
        <th>Valor</th>
        <th>Outras Informacões</th>

        <?php if (array_key_exists("usuario", $_SESSION)) { ?>
          <?php if ($_SESSION["credential"] != "nivel1") { ?>
            <th>Ação</th>
          <?php } ?>
        <?php } ?>
      <?php } ?>
    </tr>
  </thead>
  <tbody>

    <?php while ($dados = mysqli_fetch_array($ListaPersonagens->limite)) {
      $id = $dados['id'];
      $nome = $dados['nome'];
      $valor = $dados['valor'];
      $saude = $dados['saude'];
      $genero = $dados['genero'];
      $região = $dados['região'];
      $idade = $dados['idade'];
      $oficio = $dados['oficio'];
      $data_de_referencia = $dados['data_de_referência'];
      $coondicao = $dados['coondição'];
      $parentesco = $dados['parentesco'];
      $outras_informacoes = $dados['outras_informações'];
      $id_doc = $dados['id_doc'];
    ?>
      <tr>
        <td>
          <?php
          if ($id_doc > 0) {
            echo "<b><a href='/transcricao/view?id=" .  $id_doc . "'> $nome </a></b>";
          } else {
            echo $nome;
          }
          ?>
        </td>
        <td> <?php echo $data_de_referencia; ?></td>
        <td> <?php echo $região; ?></td>
        <td> <?php echo $oficio; ?></td>
        <td> <?php echo $genero; ?></td>
        <td> <?php echo $parentesco; ?></td>
        <td> <?php echo $coondicao; ?></td>
        <td> <?php echo $saude; ?></td>
        <td> <?php echo $idade; ?></td>
        <td> <?php echo $valor; ?></td>
        <td> <?php echo $outras_informacoes; ?></td>


        <?php if (array_key_exists("usuario", $_SESSION)) { ?>
          <?php if ($_SESSION["credential"] != "nivel1") { ?>
            <td>
              <a data-toggle="modal" href="#AtualizarModal<?php echo $id; ?>"> <i class="bi bi-pencil-square" title="Editar"> </i></a>

              <a href="" data-toggle="modal" data-target="#RemoverModel<?php echo $id; ?>"> <i class="bi bi-trash" title="Remover"> </i></a>

            </td>

            <!----------------------------------------------------------Modal-Remover--------------------------------------------------------------->

            <div class="modal fade" id="RemoverModel<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-black text-white">
                    <h5 class="modal-title" id="exampleModalLongTitle">Remover Personagem</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <P><b>Tem certeza que deseja remover esse personagem?!</b></p>
                    <P style="color:red;"> <b>Essa ação não pode ser desfeita!</b></p>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                    <a href='/personagens/remover?id=<?php echo $id; ?>' class="btn btn-danger">Excluir</a>
                  </div>
                </div>
              </div>
            </div>
            <!------------------------------------------------------------------------------------------------------------------->
            <!--------------------------------------------------------MODAL_Atualizar------------------------------>

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
                    <form class="model-form" action="/personagens/update?id=<?php echo $id; ?>" method="POST">
                      <fieldset>
                        <label for="name">Nome:</label>
                        <input type="text" class="form-control" placeholder="Nome" name="nome" id="text" maxlength="100" value="<?php echo $nome; ?>">

                        <label for="select">Genero:</label>
                        <select class="js-example-basic-single" id="select" name="genero">
                          <option value="" select>Nenhum</option>
                          <option value="M" <?php echo $genero == "M" ? "selected" : ""; ?>>Masculinho</option>
                          <option value="F" <?php echo $genero == "F" ? "selected" : ""; ?>>Feminino</option>
                        </select>

                        <label for="email">Valor:</label>
                        <input type="number" class="form-control" placeholder="Valor" name="valor" id="number" max="100000" maxlength="10" step="0.05" value="<?php echo $valor; ?>">

                        <label for="name">Coondição/Qualidade:</label>
                        <input type="text" class="form-control" placeholder="Coondição/Qualidade" name="coondicao" id="text" maxlength="35" value="<?php echo $coondicao; ?>">

                        <label for="saude">Saude:</label>
                        <input type="text" class="form-control" placeholder="Saude" name="saude" id="text" maxlength="35" value="<?php echo $saude; ?>">

                        <label for="password">Região:</label>
                        <input type="text" class="form-control" placeholder="Região" name="regiao" id="text" maxlength="40" value="<?php echo $região; ?>">

                        <label for="password">Parentesco:</label>
                        <input type="text" class="form-control" placeholder="Parentesco" name="parentesco" id="text" maxlength="20" value="<?php echo $parentesco; ?>">

                        <label for="email">Idade:</label>
                        <input type="number" class="form-control" placeholder="Idade" name="idade" id="number" max="130" maxlength="3" value="<?php echo $idade; ?>">

                        <label for="name">Oficio:</label>
                        <input type="text" class="form-control" placeholder="Oficio" name="oficio" id="text" maxlength="20" value="<?php echo $oficio; ?>">

                        <label for="text">Data de Referencia:</label>
                        <input type="number" class="form-control" placeholder="Data de Referencia" name="data_de_referencia" id="text" min="1700" max="1900" value="<?php echo $data_de_referencia; ?>">

                        <label for="select">Documento:</label>
                        <select class="js-example-basic-single" id="select" name="id_doc">
                          <option value="">Nenhum</option>
                          <?php foreach ($listaDocumentos as $doc) { ?>
                            <option value="<?php echo $doc->id; ?>" <?php echo $doc->id == $id_doc ? "selected" : ""; ?>> <?php echo $doc->titulo; ?> </option>
                          <?php } ?>
                        </select>

                        <label for="outras_info" class="form-label">Outras Informacoes:</label>
                        <input type="text" class="form-control" placeholder="Outras Informacoes" id="outras_info" name="outras_informacoes" value="<?php echo $outras_informacoes; ?>" maxlength="50">

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


  <ul class="pagination">

    <?php if ($ListaPersonagens->pag > 1) { ?>
      <li class="page-item disabled"><a href="?search=<?php echo $valorpesquisa; ?>&sortBy=<?php echo $valor_ordenacao; ?>&numero_registro=<?php echo $numero_registro ?>&pagina=<?= $ListaPersonagens->anterior;
                                                                                                                                                                                  if ($valor_genero || $valor_idade_min || $valor_idade_max || $valor_valor_min || $valor_valor_max != null) {
                                                                                                                                                                                    echo "&filtro_genero=$valor_genero" . "&idade_min=$valor_idade_min" . "&idade_max=$valor_idade_max" . "&valor_min=$valor_valor_min" . "&valor_max=$valor_valor_max";
                                                                                                                                                                                  } ?>
         ">Anterior</a></li>
    <?php } ?>

    <?php
    for ($i = 1; $i <= $ListaPersonagens->tp; $i++) {
      if ($ListaPersonagens->pag == $i) { ?>
        <li class='page-item active '><a href='?search=<?php echo $valorpesquisa; ?>&sortBy=<?php echo $valor_ordenacao; ?>&numero_registro=<?php echo $numero_registro ?>&pagina=<?php echo $i;
                                                                                                                                                                                  if ($valor_genero || $valor_idade_min || $valor_idade_max || $valor_valor_min || $valor_valor_max != null) {
                                                                                                                                                                                    echo "&filtro_genero=$valor_genero" . "&idade_min=$valor_idade_min" . "&idade_max=$valor_idade_max" . "&valor_min=$valor_valor_min" . "&valor_max=$valor_valor_max";
                                                                                                                                                                                  }
                                                                                                                                                                                  ?>' class='page-link bg-dark'><?php echo $i; ?></a></li>
      <?php } else { ?>
        <li class='page-item'><a href='?search=<?php echo $valorpesquisa; ?>&sortBy=<?php echo $valor_ordenacao; ?>&numero_registro=<?php echo $numero_registro ?>&pagina=<?php echo $i;
                                                                                                                                                                          if ($valor_genero || $valor_idade_min || $valor_idade_max || $valor_valor_min || $valor_valor_max != null) {
                                                                                                                                                                            echo "&filtro_genero=$valor_genero" . "&idade_min=$valor_idade_min" . "&idade_max=$valor_idade_max" . "&valor_min=$valor_valor_min" . "&valor_max=$valor_valor_max";
                                                                                                                                                                          }
                                                                                                                                                                          ?>' class='page-link'><?php echo $i; ?></a></li>
    <?php }
    }
    ?>

    <?php if ($ListaPersonagens->pag < $ListaPersonagens->tp) { ?>
      <li class="page-item"><a class="page-link" href="?search=<?php echo $valorpesquisa; ?>&sortBy=<?php echo $valor_ordenacao; ?>&numero_registro=<?php echo $numero_registro ?>&pagina=<?php echo $ListaPersonagens->proximo;
                                                                                                                                                                                          if ($valor_genero || $valor_idade_min || $valor_idade_max || $valor_valor_min || $valor_valor_max != null) {
                                                                                                                                                                                            echo "&filtro_genero=$valor_genero" . "&idade_min=$valor_idade_min" . "&idade_max=$valor_idade_max" . "&valor_min=$valor_valor_min" . "&valor_max=$valor_valor_max";
                                                                                                                                                                                          } ?>
         ">Proximo</a></li>
    <?php } ?>

  </ul>

<!-- MODAL -->

<script src="./librares/js/view/pesquisa.js"></script>
<?php require __DIR__ . "/../share/footer.php"; ?>