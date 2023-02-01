<?php

use My_Web_Struct\controller\MainPageController;
use My_Web_Struct\controller\PersonagensController;
use My_Web_Struct\controller\AboutController;
use My_Web_Struct\controller\MapController;
use My_Web_Struct\controller\EquipeController;

use My_Web_Struct\controller\AdminController;
use My_Web_Struct\controller\ErroController;
use My_Web_Struct\controller\LoginController;
use My_Web_Struct\controller\TranscriptionController;
use My_Web_Struct\controller\ProjectController;


return [
    "/" => MainPageController::class,

    "/personagens" => PersonagensController::class,
    "/personagens/add" => PersonagensController::class,
    "/personagens/remover" => PersonagensController::class,
    "/personagens/update" => PersonagensController::class,
    
    "/transcricao/cadastro" => TranscriptionController::class,
    "/transcricao/view" => TranscriptionController::class,
    "/transcricao/add" => TranscriptionController::class,
    "/transcricao/lista" => TranscriptionController::class,
    "/transcricao/atualizar" => TranscriptionController::class,
    "/transcricao/update" => TranscriptionController::class,
    "/transcricao/delete" => TranscriptionController::class,
    "/transcricao/downloadpdf" => TranscriptionController::class,

    "/projeto" => ProjectController::class,
    "/equipe" => EquipeController::class,
    "/sobre" => AboutController::class,
    "/mapa" => MapController::class,

    "/erro" => ErroController::class,
    "/erro/acesso_negado" => ErroController::class,

    "/login/logar" => LoginController::class,
    "/login/foto-de-perfil" => LoginController::class,
    "/login/deslog" => LoginController::class,

    "/adm" => AdminController::class,
    "/adm/add" => AdminController::class,
    "/adm/update" => AdminController::class,
    "/adm/delete" => AdminController::class,
];
