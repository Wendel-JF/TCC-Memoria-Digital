<?php require __DIR__ . "/../share/head.php"; ?>

<style>
    h3 {
        text-align: center;
    }

    p {
        text-justify: auto;
    }

    body {
        /*background: rgb(204, 204, 204);*/
        text-decoration: dashed;
        color: black;
    }

    page {
        background: white;
        display: block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
    }

    page[size="A4"] {
        padding: 40px;
        padding-top: 80px;
        width: 21cm;
        height: auto;
    }

    @media print {
        body,
        page {
            margin: 0;
            box-shadow: 0;
        }
    }
</style>

<page size="A4">
    <h3><?php echo $ExibirDoc->titulo; ?></h3>
    <br>
    <?php echo $ExibirDoc->documento; ?>
</page>

<?php require __DIR__ . "/../share/footer.php"; ?>