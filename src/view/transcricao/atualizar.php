<head>
    <title>Transcricao - Memorial Digital</title>
</head>
<?php
require __DIR__ . "/../share/head.php";
?>

<link rel="stylesheet" type="text/css" href="./librares/css/view/transcricao.css" />

<form class="form-inline " id='form' action="/transcricao/update?id=<?php echo $listarDocumentos->id; ?>" method="POST">
    <div class="form-group ">
        <h2 >Atualize o Documento</h2>
        <input class="form-control my-3" type="text" name="titulo" placeholder="Titulo" value="<?php echo $listarDocumentos->titulo; ?>">

        <textarea class="form-control my-4" id="exampleFormControlTextarea1" name="transcricao" rows="18" maxlength="20000"><?php echo $listarDocumentos->documento; ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary my-2" style="width: 100%;">Atualizar</button>
</form>


<?php require __DIR__ . "/../share/footer.php"; ?>