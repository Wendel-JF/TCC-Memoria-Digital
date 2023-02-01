<?php

namespace My_Web_Struct\controller;

use My_Web_Struct\controller\inheritance\Controller;
use My_Web_Struct\model\bancoDados\UsuarioBD;
use My_Web_Struct\model\Usuario;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AdminController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        $response = $this->create();
       
      if (strpos($path_info, "add")) {
            $response = $this->addUsuario($request);
        } else if (strpos($path_info, "update")) {
            $response = $this->update($request);
        } else if (strpos($path_info, "delete")) {
            $response = $this->delete($request);
        } 
        return $response;
    }

    public function addUsuario(ServerRequestInterface $request): ResponseInterface
    {
        $validate = $this->validateCredentials(["adm"]);
        if (!is_null($validate)) {
            return $validate;
        }

        $usuario = new Usuario(
            $request->getParsedBody()["login"],
            $request->getParsedBody()["nivel"],
            null,
            null,
            $request->getParsedBody()["password"]
        );

        $usuarioBD = new UsuarioBD();
        $usuarioBD->adicionar($usuario);

        $response = new Response(302, ["Location" => "/adm"], null);

        return $response;
    }

    public function create(): ResponseInterface
    {
        $validate = $this->validateCredentials(["adm"]);
        if (!is_null($validate)) {
            return $validate;
        }
        $usuarioBD = new UsuarioBD();

        $dados = ["listaUsuarios" => $usuarioBD->getLista()];

        $bodyHttp = $this->getHTTPBodyBuffer("/admin/admin.php", $dados);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function update(ServerRequestInterface $request): ResponseInterface
    {
        $validate = $this->validateCredentials(["adm"]);
        if (!is_null($validate)) {
            return $validate;
        }

        $usuarioBD = new UsuarioBD();
        $usuario = new Usuario(
            $request->getParsedBody()["login"],
            $request->getParsedBody()["nivel"],
            null,
            null,
            $request->getParsedBody()["password"],
            $request->getQueryParams()["id"]
        );

        $usuarioBD->atualizar($usuario);

        $response = new Response(302, ["Location" => "/adm"], null);
        return $response;
    }

    public function delete(ServerRequestInterface $request): ResponseInterface
    {
        $validate = $this->validateCredentials(["adm"]);

        if (!is_null($validate)) {
            return $validate;
        }

        $usuarioBD = new UsuarioBD();
        $usuarioBD->remover($request->getQueryParams()["id"]);

        $response = new Response(302, ["Location" => "/adm"], null);
        return $response;
    }
}
