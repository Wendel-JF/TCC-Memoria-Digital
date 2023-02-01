<?php

use My_Web_Struct\controller\MainPageController;
use My_Web_Struct\controller\Seach;
use My_Web_Struct\controller\AboutController;
use My_Web_Struct\controller\MapController;
use My_Web_Struct\controller\NewPasswordController;
use My_Web_Struct\controller\UsuarioController;
use My_Web_Struct\controller\HelloWorld;
use My_Web_Struct\controller\ErroController;
use My_Web_Struct\controller\LoginController;

return [
    "/main_page" => MainPageController::class,
    "/pesquisa" => Seach::class,
    "/sobre" => AboutController::class,
    "/mapa" => MapController::class,
    "/novaSenha" => NewPasswordController::class,
    "/erro" => ErroController::class,
    "/hello" => HelloWorld::class,
    "/login" => LoginController::class,
    "/login/logar" => LoginController::class,
    "/login/deslog" => LoginController::class,
    "/usuario/lista" => UsuarioController::class,
    "/usuario/cadastro" => UsuarioController::class,
    "/usuario/atualizar" => UsuarioController::class,
    "/usuario/remover" => UsuarioController::class,
];
