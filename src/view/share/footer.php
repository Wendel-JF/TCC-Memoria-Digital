</div>
</main>
<?php date_default_timezone_set('America/Recife'); ?>
<footer class="text-center footer mt-auto py-1 bg-dark ">
    <div class="container">
        <span class="text-white">Copyright  ©2019 - <?php echo date('Y');?> • Todos os Direitos Reservados • ETE - MFL •  Alexandre Bittencourt</span>
    </div>
</footer>

<!-- <script src="/librares/js/bootstrap.min.js"></script> -->


<script src="/librares/js/bootstrap.bundle.min.js"></script>
<script src="./librares/js/view/head.js"></script>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="/librares/dist_select2/js/select2.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/prashantchaudhary/ddslick/master/jquery.ddslick.min.js" ></script>

<script>
    $(document).ready(function() {
  $(".select2-search").select2({
    dropdownParent: $("#CadastrarModal")
  });
});
$('#selectimage').ddslick({
    
    onSelected: function(selectedData){
        //callback function: do something with selectedData;
    }   
});


$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});

</script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
</body>

</html>
