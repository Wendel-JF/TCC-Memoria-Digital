<?php

namespace My_Web_Struct\controller;

use My_Web_Struct\controller\inheritance\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;

use My_Web_Struct\model\bancoDados\EscravosBD;
use My_Web_Struct\model\Escravo;

use Nyholm\Psr7\Response;

class SearchController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;
        if (strpos($path_info, "cadastro")) {
            $response = $this->create($request);
        }  else if (strpos($path_info, "add")) {
            $response = $this->Cadastro($request);
        } else if (strpos($path_info, "remover")) {
            $response = $this->remover($request);
        } else if (strpos($path_info, "atualizar")) {
            $response = $this->atualizar($request);
        } else if (strpos($path_info, "update")) {
            $response = $this->update($request);
        } else {
            $EscravosBD = new EscravosBD();
            if (!empty($request->getQueryParams()["search"])) {
                $pesquisa = $request->getQueryParams()["search"];
                $paginacao = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
                $EscravosBD->getSearchEscravos($pesquisa, $paginacao);
                $valorpesquisa = ["valorpesquisa" => $pesquisa];
                $dados = ["listaEscravos" => $EscravosBD];
                $bodyHttp = $this->getHTTPBodyBuffer("/pesquisa/pesquisa.php", $dados, $valorpesquisa);
                $response = new Response(200, [], $bodyHttp);

                return $response;
            } else {
                $pag = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
                $EscravosBD->Paginacao($pag);
                $dados = ["listaEscravos" =>  $EscravosBD];
                $bodyHttp = $this->getHTTPBodyBuffer("/pesquisa/pesquisa.php", $dados);
                $response = new Response(200, [], $bodyHttp);
                return $response;
            }
        }
        return $response;
    }
    public function create(): ResponseInterface
    {
        $validate = $this->validateCredentials(["adm", "nivel2"]);
        if (!is_null($validate)) {
            return $validate;
        }
        $bodyHttp = $this->getHTTPBodyBuffer("/pesquisa/cadastro.php");
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
    public function Cadastro(ServerRequestInterface $request): ResponseInterface
    {
        $validate = $this->validateCredentials(["adm", "nivel2"]);
        if (!is_null($validate)) {
            return $validate;
        }

        if (!empty($request->getParsedBody())) {
            $escravos = new Escravo (
                $request->getParsedBody()["nome"],
                $request->getParsedBody()["preço"],
                $request->getParsedBody()["sexo"],
                $request->getParsedBody()["regiao"],
                $request->getParsedBody()["idade"],
                $request->getParsedBody()["oficio"]
            );
           
            $DB = new EscravosBD();
            $DB->adicionar($escravos);
        }

        $DB = new EscravosBD();

        $bodyHttp = $this->getHTTPBodyBuffer("/pesquisa/pesquisa.php");


        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function remover(ServerRequestInterface $request): ResponseInterface
    {

        $validate = $this->validateCredentials(["adm", "nivel2"]);
        if (!is_null($validate)) {
            return $validate;
        }
        $EscravosBD = new EscravosBD();
        $EscravosBD->remover($request->getQueryParams()["id"]);

        $response = new Response(302, ["Location" => "/pesquisa"], null);
        return $response;
    }
    public function atualizar(ServerRequestInterface $request): ResponseInterface
    {
        $validate = $this->validateCredentials(["adm", "nivel2"]);
        if (!is_null($validate)) {
            return $validate;
        }

        $EscravosBD = new EscravosBD();
        $escravo = $EscravosBD->getEscravo($request->getQueryParams()["id"]);


        $bodyHttp = $this->getHTTPBodyBuffer("/pesquisa/atualizar.php", ["escravo" => $escravo]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
    public function update(ServerRequestInterface $request): ResponseInterface
    {

        $validate = $this->validateCredentials(["adm", "nivel2"]);
        if (!is_null($validate)) {
            return $validate;
        }

        $EscravosBD = new EscravosBD();
        $escravo = new Escravo(
            $request->getParsedBody()["nome"],
            $request->getParsedBody()["preço"],
            $request->getParsedBody()["sexo"],
            $request->getParsedBody()["região"],
            $request->getParsedBody()["idade"],
            $request->getParsedBody()["oficio"],
            $request->getQueryParams()["id"]
        );

        $EscravosBD->atualizar($escravo);

        $response = new Response(302, ["Location" => "/pesquisa"], null);
        return $response;
    }
}
