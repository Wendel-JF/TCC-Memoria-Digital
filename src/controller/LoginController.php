<?php

namespace My_Web_Struct\controller;

use My_Web_Struct\controller\inheritance\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use My_Web_Struct\model\Usuario;
use My_Web_Struct\model\bancoDados\UsuarioBD;


class LoginController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "logar")) {
            $response = $this->logar($request);
        } else if (strpos($path_info, "foto-de-perfil")) {
            $response = $this->FotoPerfil($request);
        } else if (strpos($path_info, "deslog")) {
            $response = $this->deslogar();
        } 
        return $response;
    }
    
    public function logar(ServerRequestInterface $request): ResponseInterface
    {
        $loginUsuario = $request->getParsedBody()["login"];
        $senhaUsuario = $request->getParsedBody()["password"];
        
        $ModelConnect = new UsuarioBD();
        $usuarioDB = $ModelConnect->getUsuarioLogin($loginUsuario);

        if ($loginUsuario == $usuarioDB->getLogin() && $usuarioDB->validarSenha($senhaUsuario)) {
            $_SESSION["usuario"] = $loginUsuario;
            $_SESSION["credential"] = $usuarioDB->getNivel(); //nivel1, nivel2, adm
            $_SESSION["fotoPerfil"] = $usuarioDB->getFoto_Perfil();
            $_SESSION["id_usuario"] = $usuarioDB->getId();
            return new Response(302, ["Location" => "/"],);
        } else {
            return new Response(302, ["Location" => "/"],);
        }
    }

    public function FotoPerfil(ServerRequestInterface $request): ResponseInterface 
    {
        $usuarioBD = new UsuarioBD();
        $binario =  file_get_contents($_FILES["foto"]['tmp_name']);
        $usuario = new Usuario(
            null,
            null,
            $binario,
            null,
            null
        );
       
        $usuarioBD->addFoto($usuario);
        $_SESSION["fotoPerfil"] = $usuario->getFoto_Perfil();
        $response = new Response(302, ["Location" => "/"], null);
        return $response;
    }

    public function deslogar(): ResponseInterface
    {
        session_unset();
        return new Response(302, ["Location" => "/"],);
    }
}
