<?php require __DIR__ . "/../share/head.php"; ?>
<style>
    .btn-dark {
        float: right;
    }
</style>
<h1>Lista de usuarios</h1>
<br>
<div class="container m-3">
    <div class="row">
        <div class="col-sm">
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">Cadastrar Novo Usuario</button>
        </div>
    </div>
</div>

<!-------------------------- MODAL ----------------------------------------------------------------------------------------------------->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-center" id="exampleModalLabel">Cadastro de Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="/adm/add" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Login:</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome" name="login" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha:</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="selectnivel">Nivel do Usuario:</label>
                        <select class="form-select form-select" id="selectnivel" aria-label=".form-select-sm example" name="nivel">
                            <option value="nivel1" selected>Nivel 1</option>
                            <option value="nivel2">Nivel 2</option>
                            <option value="adm">ADM</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-dark">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------------------------------------------------------------->


<table class="table table-dark text-aling center">
    <thead>
        <tr>
            <th scope="col" colspan="3">id</th>
            <th scope="col" colspan="3">Login</th>
            <th scope="col" colspan="3">Nivel</th>
            <th scope="col" colspan="3">Ações</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php foreach ($listaUsuarios as $usuario) { ?>
            <tr>
                <td scope="row" colspan="3"> <?php echo $usuario->getId(); ?></td>
                <td colspan="3"> <?php echo $usuario->getLogin(); ?></td>
                <td colspan="3"> <?php echo $usuario->getNivel(); ?></td>
                <td colspan="3">
                    <?php echo "<button class='btn btn-sm btn-secondary' data-toggle='modal' data-target='#AtualizarModal" . $usuario->getId() . "'>Atualizar</button>"; ?>
                    <?php echo "<button class='btn btn-sm btn-danger' data-toggle='modal' data-target='#RemoverModel" . $usuario->getId() . "'>Excluir</button>"; ?>
                </td>
            </tr>


            <!------------------------------------------------------------------ MODAL-------------------------------------------------------------------------------------------------->

            <div class="modal fade" id="AtualizarModal<?php echo $usuario->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Atualizar Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/adm/update?id=<?php echo $usuario->getId() ?>" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Login:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome" name="login" value="<?php echo $usuario->getLogin() ?>">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nova Senha:</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" name="password">
                                </div>

                                <div class="form-group">
                                    <label for="selectnivel">Nivel do Usuario:</label>
                                    <select class="form-select form-select" id="selectnivel" aria-label=".form-select-sm example" name="nivel">
                                        <option value="nivel1" <?php echo $usuario->getNivel() == "nivel1" ? "selected" : ""; ?>>Nivel 1</option>
                                        <option value="nivel2" <?php echo $usuario->getNivel() == "nivel2" ? "selected" : ""; ?>>Nivel 2</option>
                                        <option value="adm" <?php echo $usuario->getNivel() == "adm" ? "selected" : ""; ?>>ADM</option>
                                    </select>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-dark">Atualizar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
            <!------------------------------------------------------------------ MODAL-------------------------------------------------------------------------------------------------->

            <div class="modal fade" id="RemoverModel<?php echo $usuario->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Remover Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <P><b>Tem certeza de que deseja remover esse registro?!</b></p>
                            <P style="color:red;"> <b>Essa ação não pode ser desfeita!</b></p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                            <a href='/adm/delete?id=<?php echo $usuario->getId(); ?>' class="btn btn-danger">Excluir</a>
                        </div>
                    </div>
                </div>
            </div>
         <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <?php } ?>
    </tbody>
</table>



<?php require __DIR__ . "/../share/footer.php"; ?>