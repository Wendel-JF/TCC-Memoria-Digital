<?php

namespace My_Web_Struct\controller;

date_default_timezone_set('America/Recife');

use My_Web_Struct\controller\inheritance\Controller;
use My_Web_Struct\model\bancoDados\PersonagensBD;
use My_Web_Struct\model\Personagem;
use My_Web_Struct\model\bancoDados\DocumentosBD;
use My_Web_Struct\model\Documentos;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

//Gerar pdf 
use Dompdf\Dompdf;

class TranscriptionController extends Controller implements RequestHandlerInterface
{

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "cadastro")) {
            $response = $this->create();
        } else if (strpos($path_info, "add")) {
            $response = $this->addTranscricao($request);
        } else if (strpos($path_info, "lista")) {
            $response = $this->read();
        } else if (strpos($path_info, "view")) {
            $response = $this->view($request);
        } else if (strpos($path_info, "atualizar")) {
            $response = $this->atualizar($request);
        } else if (strpos($path_info, "update")) {
            $response = $this->update($request);
        } else if (strpos($path_info, "delete")) {
            $response = $this->delete($request);
        } else if (strpos($path_info, "downloadpdf")) {
            $response = $this->GerarPdf($request);
        } else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/Erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }

    public function create(): ResponseInterface
    {
        $validate = $this->validateCredentials(["adm", "nivel2", "nivel1"]);
        if (!is_null($validate)) {
            return $validate;
        }
        $bodyHttp = $this->getHTTPBodyBuffer("/transcricao/transcricao.php");
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function addTranscricao(ServerRequestInterface $request): ResponseInterface
    {
        $textarea_com_quebra_de_linha = nl2br($request->getParsedBody()["transcricao"]);

        $documento = new Documentos(
            null,
            $textarea_com_quebra_de_linha,
            $request->getParsedBody()["titulo"],
            $_SESSION["usuario"],
            date('d/m/Y-H:i')
        );

        $documentosBD = new DocumentosBD();
        $documentosBD->adicionar($documento);

        $response = new Response(302, ["Location" => "/personagens"], null);

        return $response;
    }

    public function read(): ResponseInterface
    {
        $documentosBD = new DocumentosBD();

        $pag = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
        $documentosBD->getListaDocumentos($pag);
        $dados = ["listarDocumentos" => $documentosBD];

        $bodyHttp = $this->getHTTPBodyBuffer("/transcricao/lista.php", $dados);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function atualizar(ServerRequestInterface $request): ResponseInterface
    {
        $validate = $this->validateCredentials(["adm", "nivel2"]);
        if (!is_null($validate)) {
            return $validate;
        }

        if (is_null($request->getQueryParams()["id"])) {
            $validate = $this->validateCredentials([""]);
            return $validate;
        }
        $documentosBD = new DocumentosBD();
        $transcricao = $documentosBD->getDocumentos($request->getQueryParams()["id"]);
        $bodyHttp = $this->getHTTPBodyBuffer("/transcricao/atualizar.php", ["listarDocumentos" => $transcricao]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
    public function update(ServerRequestInterface $request): ResponseInterface
    {
        $validate = $this->validateCredentials(["adm", "nivel2"]);
        if (!is_null($validate)) {
            return $validate;
        }

        $textarea_com_quebra_de_linha = nl2br($request->getParsedBody()["transcricao"]);

        $documentosBD = new DocumentosBD();
        $transcricao = new Documentos(
            $request->getQueryParams()["id"],
            $textarea_com_quebra_de_linha,
            $request->getParsedBody()["titulo"],
            $_SESSION["usuario"],
            date('d/m/Y-H:i')
        );

        $documentosBD->atualizar($transcricao);

        $response = new Response(302, ["Location" => "/transcricao/lista"], null);
        return $response;
    }

    public function delete(ServerRequestInterface $request): ResponseInterface
    {
        $validate = $this->validateCredentials(["adm", "nivel2"]);

        if (!is_null($validate)) {
            return $validate;
        }

        $documentosBD = new DocumentosBD();
        $PersonagensBD = new PersonagensBD();

        $PersonagensBD->removerId_doc($request->getQueryParams()["id"]);
        $documentosBD->remover($request->getQueryParams()["id"]);

        $response = new Response(302, ["Location" => "/transcricao/lista"], null);
        return $response;
    }
    public function view(ServerRequestInterface $request): ResponseInterface
    {
        $documentosBD = new DocumentosBD();

        $documento = $documentosBD->getDocumentos($request->getQueryParams()["id"]);

        if ($request->getQueryParams()["id"] != null) {
            $bodyHttp = $this->getHTTPBodyBuffer("/transcricao/view.php", ["ExibirDoc" => $documento]);
            $response = new Response(200, [], $bodyHttp);
            return $response;
        } 
            $validate = $this->validateCredentials(["0"]);
            return $validate;
        
    }
    
    public function GerarPdf(ServerRequestInterface $request)
    {

        $documentosBD = new DocumentosBD();

        $transcricao = $documentosBD->getDocumentos($request->getQueryParams()["id"]);

        $dados = "<h1>$transcricao->titulo</h1>";
        $dados .= $transcricao->documento;

        // Instanciar e usar a classe dompdf para gerar pdf 
        $dompdf = new Dompdf();

        //colocar conteudo no pdf no caso estamos esta vindo direto da caixa de texto atraves do metodo post
        $dompdf->loadHtml("$dados");

        //Configurar o tamanho e a orientao do papel do pdf
        // landscape = Imprimir no formato paisagem, portrait = retrato
        // $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $pdf = $dompdf->render();

        $dompdf->output();


        //fazer download do pdf

        $dompdf->stream("$transcricao->titulo" . ".pdf");
    }
}
