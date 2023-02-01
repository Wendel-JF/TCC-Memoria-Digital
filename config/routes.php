<?php

use My_Web_Struct\controller\MainPageController;
use My_Web_Struct\controller\PersonagensController;
use My_Web_Struct\controller\AboutController;
use My_Web_Struct\controller\MapController;

use My_Web_Struct\controller\UsuarioController;
use My_Web_Struct\controller\ErroController;
use My_Web_Struct\controller\LoginController;
use My_Web_Struct\controller\TranscriptionController;
use My_Web_Struct\controller\ImagemController;


return [
    "/" => MainPageController::class,
    //"/main_page" => MainPageController::class,

    "/personagens" => PersonagensController::class,
    "/personagens/cadastro" => PersonagensController::class,
    "/personagens/add" => PersonagensController::class,
    "/personagens/remover" => PersonagensController::class,
    "/personagens/atualizar" => PersonagensController::class,
    "/personagens/update" => PersonagensController::class,
    
    "/transcricao/cadastro" => TranscriptionController::class,
    "/transcricao/view" => TranscriptionController::class,
    "/transcricao/add" => TranscriptionController::class,
    "/transcricao/lista" => TranscriptionController::class,
    "/transcricao/atualizar" => TranscriptionController::class,
    "/transcricao/update" => TranscriptionController::class,
    "/transcricao/delete" => TranscriptionController::class,
    "/transcricao/downloadpdf" => TranscriptionController::class,

    "/sobre" => AboutController::class,
    "/mapa" => MapController::class,

    "/erro" => ErroController::class,
    "/erro/acesso_negado" => ErroController::class,

    "/login" => LoginController::class,
    "/login/logar" => LoginController::class,
    "/login/deslog" => LoginController::class,

    "/usuario/lista" => UsuarioController::class,
    "/usuario/cadastro" => UsuarioController::class,
    "/usuario/add" => UsuarioController::class,
    "/usuario/atualizar" => UsuarioController::class,
    "/usuario/update" => UsuarioController::class,
    "/usuario/delete" => UsuarioController::class,
    
    "/imagem/cadastro" => ImagemController::class,
    "/imagem/add" => ImagemController::class,
    "/imagem/atualizar" => ImagemController::class,
    "/imagem/update" => ImagemController::class,
    "/imagem/delete" => ImagemController::class,
    "/imagem/lista" => ImagemController::class,
];
