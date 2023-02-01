<?php require __DIR__ . "/../share/head.php"; ?>
<h1>Lista de usuarios</h1>
<table>
    <tr>
        <th>Nome</th>
        <th>Turma</th>
    </tr>
    <?php
    foreach ($listaAlunos as $aluno) {
        echo "<tr>";
        echo "<td>" . $aluno->nome . "</td>";
        echo "<td>" . $aluno->turma . "</td>";
        echo "</tr>";
    }
    ?>
</table>
<?php require __DIR__ . "/../share/footer.php"; ?>