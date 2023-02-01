<?php require __DIR__ . "/../share/head.php"; ?>

<link rel="stylesheet" href="/librares/css/view/transcricao_view.css">

<page size="A4">
    <h3><?php echo $ExibirDoc->titulo;?></h3>
    <br>
    <?php echo $ExibirDoc->documento;?>
</page>

<?php require __DIR__ . "/../share/footer.php"; ?>