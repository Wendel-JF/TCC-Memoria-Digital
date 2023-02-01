<?php 
require __DIR__ . "/../share/head.php";
?>
<!--
<div style="height: 700px; width: 100%;"> 
<embed src="<?php echo $PdfView;?>" type="application/pdf" height= "100%" width= "100%">

</div>
-->
<h1><?php echo $ExibirDoc->titulo;?></h1>
<p><?php echo $ExibirDoc->documento?></p>
<?php require __DIR__ . "/../share/footer.php"; ?>