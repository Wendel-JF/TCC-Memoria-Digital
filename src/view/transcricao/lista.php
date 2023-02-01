<?php require __DIR__ . "/../share/head.php"; ?>
<style>
    main > .container {

  max-width: 1100px;
  
}
    h1 {
       
        background-color: #212529;
        padding: 15px;
        margin-bottom: -25px;
    }
    .pagination {
        border-color: #212529;
    }
</style>

<div class="titulo">
<h1>Lista de Documentos</h1>
</div>

<table class="table table-hover table-dark">
    <thead>
        <tr>
            <th scope="col" colspan="3">id</th>
            <th scope="col" colspan="3">Titulo</th>
            <th scope="col" colspan="3">Usuario</th>
            <th scope="col" colspan="3">Data</th>
            <th scope="col" class="ml-20" colspan="3">Açôes</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php while ($dados = mysqli_fetch_array($listarDocumentos->limite)) {
            $id = $dados['id'];
            $titulo = $dados['titulo'];
            $documento = $dados['documento'];
            $usuario = $dados['usuario'];
            $data = $dados['data_upload'];
        ?>
            <tr>
                <td scope="row" colspan="3"> <?php echo $id; ?></td>
                <td colspan="3"> <?php echo $titulo; ?></td>
                <td colspan="3"> <?php echo $usuario; ?></td>
                <td colspan="3"> <?php echo $data; ?></td>
                </td>
                <td colspan="3">
                    <?php echo "<a class='btn btn-sm btn-secondary'  href='/transcricao/view?id=" . $id . "'>View</a>"; ?>
                    <?php echo "<a class='btn btn-sm btn-success' href='/transcricao/downloadpdf?id=" . $id . "'>Download PDF</a>"; ?>
                    <?php if (array_key_exists("usuario", $_SESSION)) { ?>
                        <?php if ($_SESSION["credential"] != 'nivel1') { ?>
                            <?php echo "<a class='btn btn-sm btn-primary'  href='/transcricao/atualizar?id=" . $id . "'>Atualizar</a>"; ?>
                            <?php echo "<button class='btn btn-sm btn-danger' data-toggle='modal' data-target='#RemoverModel" . $id . "'>Excluir</button>"; ?>
                </td>
            <?php } ?>
        <?php } ?>
            </tr>
            </tr>

   <!------------------------------------------------------------------ MODAL-------------------------------------------------------------------------------------------------->

            <div class="modal fade" id="RemoverModel<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-black text-white">
                            <h5 class="modal-title" id="exampleModalLongTitle">Remover Documento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <P><b>Tem certeza de que deseja remover esse Documento?!</b></p>
                            <P style="color:red;"> <b>Essa ação não pode ser desfeita!</b></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                            <a href='/transcricao/delete?id=<?php echo $id; ?>' class="btn btn-danger">Excluir</a>
                        </div>
                    </div>
                </div>
            </div>
   <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <?php } ?>
    </tbody>
</table>

<nav aria-label="Navegação de página exemplo">
    <ul class="pagination">
        <?php
        if ($listarDocumentos->pag > 1) {
        ?>
            <li class="page-item">
                <a class="page-link" href="?pagina=<?= $listarDocumentos->anterior; ?>" aria-label="Anterior">
                    <span aria-hidden="true">Anterior</span>
                </a>
            </li>
        <?php } ?>

        <?php
        for ($i = 1; $i <= $listarDocumentos->tp; $i++) {
            if ($listarDocumentos->pag == $i) {
                echo "<li class='page-item active '><a class='page-link bg-dark' href='?pagina=$i'>$i</a></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href='?pagina=$i'>$i</a></li>";
            }
        }
        ?>

        <?php
        if ($listarDocumentos->pag < $listarDocumentos->tp) {
        ?>
            <li class="page-item">
                <a class="page-link" href="?pagina=<?= $listarDocumentos->proximo; ?>" aria-label="Próximo">
                    <span aria-hidden="true">Próximo</span>
                </a>
            </li>
        <?php } ?>
    </ul>
</nav>

<?php require __DIR__ . "/../share/footer.php"; ?>