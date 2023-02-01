<?php require __DIR__ . "/../share/head.php"; ?>
<style>
    .botaotest {
        border: 100px solid red;
        border-radius: 10px;
        width: 100px;
        width: 20px;
        position: absolute;
        /*background: darkblue;*/
        top: 450px;
        left: 800px;
    }
</style>
<h1>Mapa</h1>

<!--<div class ="botaotest" onclick="test()"></div>-->
<a href="/personagens?search=Caruaru" role="button" aria-pressed="true" class="botaotest" >Caruaru</a>
    <img src="/images/mapa-bacias-pernambuco-s1.png" alt="mdo" width="1000" height="500" >


    <button type="button" class="btn btn-secondary" data-toggle="tooltip" id="example" data-placement="top" title="Tooltip on top">
  Tooltip on top
</button>

<button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
  Popover on top
</button>

<a tabindex="0" class="btn btn-lg btn-danger" role="button" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</a>

<script>
function test() {
    alert('ola')
}
$('#example').tooltip(options)
</script>

<?php require __DIR__ . "/../share/footer.php"; ?>