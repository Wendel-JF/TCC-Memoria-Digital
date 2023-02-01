<?php

namespace My_Web_Struct\controller;

use My_Web_Struct\controller\inheritance\Controller;
use My_Web_Struct\model\Aluno;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class UsuarioController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (!array_key_exists("nivel", $_SESSION)) {
            $response = new Response(302, ["Location" => "/login"],);
        } else if (strpos($path_info, "cadastro") &&  $_SESSION["nivel"] == "adm") {
            $response = $this->create();
        } else if (strpos($path_info, "lista") && $_SESSION["nivel"] != "nivel1") {
            $response = $this->list();
        } else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/Erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }

    public function create(): ResponseInterface
    {
        $bodyHttp = $this->getHTTPBodyBuffer("/usuario/cadastro.php");
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
    public function list(): ResponseInterface
    {

        $aluno1 = new Aluno("Zezinho", "3º TDS");
        $aluno2 = new Aluno("Maria", "3º TDS");
        $aluno3 = new Aluno("Matheus", "3º TDS");

        $dados = ["listaAlunos" => [$aluno1, $aluno2, $aluno3]];

        $bodyHttp = $this->getHTTPBodyBuffer("/usuario/lista.php", $dados);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
}
