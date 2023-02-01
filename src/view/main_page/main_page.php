<?php

namespace My_Web_Struct_4\src\view\main_page;

require __DIR__ . "/../share/head.php";

use My_Web_Struct\controller\SearchController;

$SearchController = new SearchController;
?>

<link rel="stylesheet" type="text/css" href="./librares/css/view/main_page.css" />
<h1>Memorial Digital</h1>

<hr>
<div class="caixa-de-pesquisa m-4 p-4">
    <input type="search" class="form-control w-70  " placeholder="Pesquisar" id="search">
    <button type="submit" class="btn btn-dark" onclick="searchData()">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
        </svg>
    </button>
</div>

<p> O presente projeto visa desenvolver um memorial digital,
    objetivando armazenar e disponibilizar dados sobre a escravidão
    nos sertões de Pernambuco, Brasil, nos séculos XVIII e XIX.
    A equipe de pesquisadores, composta por professores e estudantes
    da Escola Técnica Estadual Ministro Fernando Lyra (ETE),
    introduzirá no sistema informações a respeito dos escravos e dos
    lugares de trabalho, proporcionando ao público em geral uma
    ferramenta de busca digital que contribuirá para o estudo desse
    período da História de Pernambuco e, consequentemente, do Brasil.
    Concomitantemente, o projeto oportunizará a inserção dos alunos da ETE
    no âmbito da pesquisa científica, na medida em que estes irão ter
    contato com documentos históricos primários, além das técnicas
    de desenvolvimento do banco de dados/memorial da escravidão.
</p>

<script src="./librares/js/view/pesquisa.js"></script>
<?php require __DIR__ . "/../share/footer.php"; ?>