<head>
    <title>Transcricao - Memorial Digital</title>
</head>
<?php
require __DIR__ . "/../share/head.php";
?>

<link rel="stylesheet" type="text/css" href="./librares/css/view/transcricao.css" />

<form class="form-inline" id='form' action="/transcricao/add" method="POST">
    <div class="form-group ">
        <h2 >Transcreva o documento</h2>
        <input type="text" class="form-control my-4" name="titulo" id="floatingInput"  placeholder="Titulo" required>

        <textarea class="form-control my-4" id="exampleFormControlTextarea1" name="transcricao" rows="18" maxlength="20000" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary my-2" style="width: 100%;">Cadastrar</button>
</form>


<?php require __DIR__ . "/../share/footer.php"; ?>