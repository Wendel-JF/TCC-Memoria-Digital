<?php

namespace My_Web_Struct\controller;

use My_Web_Struct\controller\inheritance\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;

use My_Web_Struct\model\bancoDados\PersonagensBD;
use My_Web_Struct\model\Personagem;

use My_Web_Struct\model\bancoDados\DocumentosBD;

use Nyholm\Psr7\Response;

class PersonagensController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];

        $response = $this->list($request);
       if (strpos($path_info, "add")) {
            $response = $this->add($request);
        } else if (strpos($path_info, "remover")) {
            $response = $this->delete($request);
        } else if (strpos($path_info, "update")) {
            $response = $this->update($request);
        }
        return $response;
    }

    public function list(ServerRequestInterface $request): ResponseInterface
    {
        $docDB = new DocumentosBD();
        $PersonagensBD = new PersonagensBD();
        $PersonagensBD2 = new PersonagensBD();
        $PersonagensBD3 = new PersonagensBD();
        $pesquisa = (isset($request->getQueryParams()['search'])) ? $request->getQueryParams()['search'] : null;

        $pag = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

        //-------------------------------------------------Filtros------------------------------------------------------------

        $filtro_genero = (isset($request->getQueryParams()['filtro_genero'])) ? $request->getQueryParams()['filtro_genero'] : null;
        $numero_registro = (isset($request->getQueryParams()['numero_registro'])) ? $request->getQueryParams()['numero_registro'] : null;


        $filtro_idade_min = (isset($request->getQueryParams()['idade_min'])) ? $request->getQueryParams()['idade_min'] : null;
        $filtro_idade_max = (isset($request->getQueryParams()['idade_max'])) ? $request->getQueryParams()['idade_max'] : null;

        $filtro_valor_min = (isset($request->getQueryParams()['valor_min'])) ? $request->getQueryParams()['valor_min'] : null;
        $filtro_valor_max = (isset($request->getQueryParams()['valor_max'])) ? $request->getQueryParams()['valor_max'] : null;
        $ordenar = (isset($request->getQueryParams()['sortBy'])) ? $request->getQueryParams()['sortBy'] : null;

        //-------------------------------------------------------------------------------------------------------------
        

        $PersonagensBD->getLista($pesquisa, $pag, $filtro_genero, $filtro_idade_min, $filtro_idade_max, $filtro_valor_min, $filtro_valor_max, $ordenar,$numero_registro);

        $listaDados = [
            "valorpesquisa" => $pesquisa,
            "valor_ordenacao" => $ordenar,
            "valor_genero" => $filtro_genero,
            "valor_idade_min" => $filtro_idade_min,
            "valor_idade_max" => $filtro_idade_max,
            "valor_valor_min" => $filtro_valor_min,
            "valor_valor_max" => $filtro_valor_max,
            "ListaPersonagens" => $PersonagensBD,
            "AutoComplete" => $PersonagensBD2->getLista2(),
            "listaDocumentos" => $docDB->getLista(),
            "dadosDoc" => $docDB,
            "CountDados" => $PersonagensBD3->getCount(),
            "numero_registro" => "$numero_registro",
        ];

        $bodyHttp = $this->getHTTPBodyBuffer("/personagens/personagens.php", $listaDados);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function add(ServerRequestInterface $request): ResponseInterface
    {
        if (!empty($request->getParsedBody())) {
            $personagens = new Personagem(
                $request->getParsedBody()["nome"],
                $request->getParsedBody()["valor"],
                $request->getParsedBody()["saude"],
                $request->getParsedBody()["genero"],
                $request->getParsedBody()["regiao"],
                $request->getParsedBody()["idade"],
                $request->getParsedBody()["oficio"],
                $request->getParsedBody()["data_de_referencia"],
                $request->getParsedBody()["coondicao"],
                $request->getParsedBody()["parentesco"],
                $request->getParsedBody()["outras_informacoes"],
                $request->getParsedBody()["id_doc"]
            );

            $PersonagensBD = new PersonagensBD();
            $PersonagensBD->adicionar($personagens);
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
        $personagemsBD = new PersonagensBD();
        $personagemsBD->remover($request->getQueryParams()["id"]);

        $response = new Response(302, ["Location" => "/personagens"], null);
        return $response;
    }

    public function update(ServerRequestInterface $request): ResponseInterface
    {
        $PersonagensBD = new PersonagensBD();
        
        $personagem = new Personagem (
            $request->getParsedBody()["nome"],
            $request->getParsedBody()["valor"],
            $request->getParsedBody()["saude"],
            $request->getParsedBody()["genero"],
            $request->getParsedBody()["regiao"],
            $request->getParsedBody()["idade"],
            $request->getParsedBody()["oficio"],
            $request->getParsedBody()["data_de_referencia"],
            $request->getParsedBody()["coondicao"],
            $request->getParsedBody()["parentesco"],
            $request->getParsedBody()["outras_informacoes"],
            $request->getParsedBody()["id_doc"],
            $request->getQueryParams()["id"]
        );

        $PersonagensBD->atualizar($personagem);

        $response = new Response(302, ["Location" => "/personagens"], null);
        return $response;
    }
}
