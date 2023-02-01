<?php require __DIR__ . "/../share/head.php"; ?>
<style>
    .btn-success {
        float: right;
    }
</style>
<h1>Lista de usuarios</h1>
<br>
<div class="container m-2">
    <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-sm">

        </div>
        <div class="col-sm">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Cadastrar Novo Usuario</button>
        </div>
    </div>
</div>

<!-------------------------- MODAL ----------------------->

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

                <form action="/usuario/add" method="POST">
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
                <button type="submit" class="btn btn-primary">Cadastrar</button>
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
                    <?php echo "<a class='btn btn-sm btn-secondary' href='/usuario/atualizar?id=" .  $usuario->getId() . "'>Atualizar</a>"; ?>
                    <?php echo "<a class='btn btn-sm btn-danger' href='/usuario/delete?id=" . $usuario->getId() . "'>Excluir</a>"; ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AtualizarModal<?php echo $usuario->getId(); ?>">Atualizar</button>
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
                            <form action="/usuario/update?id=<?php echo $usuario->getId() ?>" method="POST">
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
                                        <option value="nivel1" <?php echo $usuario->getNivel() == "nivel1" ? "selected" : ""; ?> >Nivel 1</option>
                                        <option value="nivel2" <?php echo $usuario->getNivel() == "nivel2" ? "selected" : ""; ?> >Nivel 2</option>
                                        <option value="adm" <?php echo $usuario->getNivel() == "adm" ? "selected" : ""; ?>  >ADM</option>
                                    </select>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    </tbody>
</table>



<?php require __DIR__ . "/../share/footer.php"; ?>