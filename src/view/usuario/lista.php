<?php require __DIR__ . "/../share/head.php"; ?>
<h1>Lista de usuarios</h1>
<br>
<table class="table text-aling center">
    <thead>
        <tr>
            <th scope="col" colspan="3">Id</th>
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
                    <?php echo "<a class='btn btn-sm btn-outline-secondary' href='/usuario/atualizar?id=" .  $usuario->getId() . "'>Atualizar</a>"; ?>
                    <?php echo "<a class='btn btn-sm btn-outline-danger' href='/usuario/delete?id=" . $usuario->getId() . "'>Excluir</a>"; ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php require __DIR__ . "/../share/footer.php"; ?>