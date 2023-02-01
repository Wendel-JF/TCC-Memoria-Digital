<?php

namespace My_Web_Struct\controller;

use My_Web_Struct\controller\inheritance\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;

use My_Web_Struct\model\bancoDados\EscravosBD;
use My_Web_Struct\model\Escravo;

use My_Web_Struct\model\bancoDados\DocumentosBD;

use Nyholm\Psr7\Response;

class PersonagensController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];

        $response = $this->list($request);
        if (strpos($path_info, "cadastro")) {
            $response = $this->Cadastro($request);
        } else if (strpos($path_info, "add")) {
            $response = $this->add($request);
        } else if (strpos($path_info, "remover")) {
            $response = $this->delete($request);
        } else if (strpos($path_info, "atualizar")) {
            $response = $this->atualizar($request);
        } else if (strpos($path_info, "update")) {
            $response = $this->update($request);
        }
        return $response;
    }

    public function list(ServerRequestInterface $request): ResponseInterface
    {
        $docDB = new DocumentosBD();
        $EscravosBD = new EscravosBD();
        $EscravosBD2 = new EscravosBD();
        $EscravosBD3 = new EscravosBD();
        $pesquisa = (isset($request->getQueryParams()['search'])) ? $request->getQueryParams()['search'] : null;

        $pag = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

        //-------------------------------------------------Filtros------------------------------------------------------------

        $filtro_genero = (isset($request->getQueryParams()['genero'])) ? $request->getQueryParams()['genero'] : null;
        $numero_registro = (isset($request->getQueryParams()['numero_registro'])) ? $request->getQueryParams()['numero_registro'] : null;


        $filtro_idade_min = (isset($request->getQueryParams()['idade_min'])) ? $request->getQueryParams()['idade_min'] : null;
        $filtro_idade_max = (isset($request->getQueryParams()['idade_max'])) ? $request->getQueryParams()['idade_max'] : null;

        $filtro_preco_min = (isset($request->getQueryParams()['preco_min'])) ? $request->getQueryParams()['preco_min'] : null;
        $filtro_preco_max = (isset($request->getQueryParams()['preco_max'])) ? $request->getQueryParams()['preco_max'] : null;
        $ordenar = (isset($request->getQueryParams()['sortBy'])) ? $request->getQueryParams()['sortBy'] : null;

        //-------------------------------------------------------------------------------------------------------------

        $EscravosBD->getLista($pesquisa, $pag, $filtro_genero, $filtro_idade_min, $filtro_idade_max, $filtro_preco_min, $filtro_preco_max, $ordenar,$numero_registro);

        $listaDados = [
            "valorpesquisa" => "$pesquisa",
            "valor_ordenacao" => $ordenar,
            "valor_genero" => "$filtro_genero",
            "valor_idade_min" => "$filtro_idade_min",
            "valor_idade_max" => "$filtro_idade_max",
            "valor_preco_min" => "$filtro_preco_min",
            "valor_preco_max" => "$filtro_preco_max",
            "listaEscravos" => $EscravosBD,
            "AutoComplete" => $EscravosBD2->getLista2(),
            "listaDocumentos" => $docDB->getLista(),
            "dadosDoc" => $docDB,
            "CountDados" => $EscravosBD3->getCount(),
            "numero_registro" => "$numero_registro",
        ];

        $bodyHttp = $this->getHTTPBodyBuffer("/personagens/personagens.php", $listaDados);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function Cadastro(): ResponseInterface
    {
        $validate = $this->validateCredentials(["adm", "nivel2", "nivel1"]);
        if (!is_null($validate)) {
            return $validate;
        }
        $docDB = new DocumentosBD();

        $listaDados = ["listaDocumentos" => $docDB->getLista()];
        $bodyHttp = $this->getHTTPBodyBuffer("/personagens/cadastro.php", $listaDados);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
    public function add(ServerRequestInterface $request): ResponseInterface
    {
        if (!empty($request->getParsedBody())) {
            $escravos = new Escravo(
                $request->getParsedBody()["nome"],
                $request->getParsedBody()["preço"],
                $request->getParsedBody()["sexo"],
                $request->getParsedBody()["regiao"],
                $request->getParsedBody()["idade"],
                $request->getParsedBody()["oficio"],
                $request->getParsedBody()["id_doc"]
            );

            $DB = new EscravosBD();
            $DB->adicionar($escravos);
        }

        $response = new Response(302, ["Location" => "/personagens"], null);
        return $response;
    }

    public function delete(ServerRequestInterface $request): ResponseInterface
    {

        $validate = $this->validateCredentials(["adm", "nivel2"]);
        if (!is_null($validate)) {
            return $validate;
        }
        $EscravosBD = new EscravosBD();
        $EscravosBD->remover($request->getQueryParams()["id"]);

        $response = new Response(302, ["Location" => "/personagens"], null);
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

        $docDB = new DocumentosBD();

        $listaDados = ["listaDocumentos" => $docDB->getLista(), "escravo" => $escravo, "dadosDoc" => $docDB];
        $bodyHttp = $this->getHTTPBodyBuffer("/personagens/atualizar.php", $listaDados);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
    public function update(ServerRequestInterface $request): ResponseInterface
    {
        $EscravosBD = new EscravosBD();

        $escravo = new Escravo(
            $request->getParsedBody()["nome"],
            $request->getParsedBody()["preço"],
            $request->getParsedBody()["sexo"],
            $request->getParsedBody()["região"],
            $request->getParsedBody()["idade"],
            $request->getParsedBody()["oficio"],
            $request->getParsedBody()["id_doc"],
            $request->getQueryParams()["id"]
        );

        $EscravosBD->atualizar($escravo);

        $response = new Response(302, ["Location" => "/personagens"], null);
        return $response;
    }
}
