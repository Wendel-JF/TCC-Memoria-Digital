<?php require __DIR__ . "/../share/head.php"; ?>
<style>
    
    .imagem{
        background-image: url("/images/mapa-regioes-pernambuco.jpg");
        width: 1000px;
        height: 500px;
     
    }
    #divbotao {
      margin-left: 800px;
      margin-top: 100px;
    }
</style>
<h1>Mapa</h1>

<div class ="imagem">
<a href="/personagens?search=Caruaru" role="button" aria-pressed="true" id="divbotao">
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
</svg>
</a>
</div>
<br><br>
<button type="button" class="btn btn-lg btn-danger" id="popover" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>

<a href="#" title="Header" data-toggle="popover" data-placement="top" data-content="Content">Click</a>
<script>
function test() {
    alert('ola')
}
$('#example').tooltip(options)
</script>

<?php require __DIR__ . "/../share/footer.php"; ?>