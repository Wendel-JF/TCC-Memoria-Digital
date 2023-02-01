<?php

namespace My_Web_Struct\controller;

use My_Web_Struct\controller\inheritance\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LoginController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "logar")) {
            $response = $this->logar($request);
        } else if (strpos($path_info, "deslog")) {
            $response = $this->deslogar();
        } else {
            $response = $this->index();
        }
        return $response;
    }

    public function index(): ResponseInterface
    {
        if (array_key_exists("usuario", $_SESSION)) {
            return new Response(302, ["Location" => "/main_page"],);
        } else {
            $bodyHTTP = $this->getHTTPBodyBuffer("/login/login.php");
            $response = new Response(200, [], $bodyHTTP);
            return $response;
        }
    }

    public function logar(ServerRequestInterface $request): ResponseInterface
    {
        $loginUsuario = $request->getParsedBody()["login"];
        $senhaUsuario = $request->getParsedBody()["password"];

        if (($loginUsuario == "Zezinho" || $loginUsuario == "maria")  && $senhaUsuario == "1234") {
            $_SESSION["usuario"] = $loginUsuario;
            $_SESSION["nivel"] = "adm";
            return new Response(302, ["Location" => "/main_page"],);
        } else {
            return new Response(302, ["Location" => "/login"],);
        }
    }

    public function deslogar(): ResponseInterface
    {
        session_unset();
        return new Response(302, ["Location" => "/login"],);
    }
}
