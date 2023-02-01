<?php /*require __DIR__ . "/modalComponents.php";  ?>
<!--
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Filtro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form action="/personagens" method="GET">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genero" id="inlineRadio1" value="m" checked>
                    <label class="form-check-label" for="inlineRadio1">Masculino</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genero" id="inlineRadio2" value="f">
                    <label class="form-check-label" for="inlineRadio2">Feminino</label>
                  </div>
                  <div class="form-check form-check-inline">

                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Filtrar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

   
    ---------------------------Atualiza------------------------

    <div class="modal fade" id="AtualizarModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Filtro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <form action="/personagens/update?id=<?php echo $id; ?>" method="post">
                          <fieldset>
                            <label for="name">Nome:</label>
                            <input type="text" class="form-control" placeholder="Nome" name="nome" id="name" maxlength="30" value="<?php echo $nome; ?>">

                            <label for="job">Sexo:</label>
                            <select id="job" name="sexo">
                              <option value="M" select>Masculinho</option>
                              <option value="F">Feminino</option>
                            </select>

                            <label for="email">Preço:</label>
                            <input type="number" class="form-control" placeholder="Preço" name="preço" id="email" max="1000000" maxlength="10" step="0.05" value="<?php echo $preço; ?>">

                            <label for="password">Região:</label>
                            <input type="text" class="form-control" placeholder="Região" name="região" id="password" maxlength="30" value="<?php echo $região; ?>">

                            <label for="email">Idade:</label>
                            <input type="number" class="form-control" placeholder="Idade" name="idade" id="email" max="99" maxlength="2" value="<?php echo $idade; ?>">

                            <label for="name">Oficio:</label>
                            <input type="text" class="form-control" placeholder="Oficio" name="oficio" id="name" maxlength="30" value="<?php echo $oficio; ?>">

                            <label for="job">Documento:</label>
                            <select class="js-example-basic-single id=" job" name="id_doc">
                              <option value="0">Nenhum</option>
                              <?php foreach ($listaDocumentos as $doc) { ?>
                                <option value="<?php echo $doc->id; ?>" <?php echo $doc->id == $idDoc ? "selected" : ""; ?>> <?php echo $doc->titulo; ?> </option>
                              <?php } ?>
                            </select>

                          </fieldset>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>
                              --> */