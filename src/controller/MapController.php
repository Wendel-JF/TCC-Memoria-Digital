<?php

namespace My_Web_Struct\controller;

use My_Web_Struct\controller\inheritance\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;

use Nyholm\Psr7\Response;

class MapController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $validate = $this->validateCredentials(["adm", "nivel2", "nivel1"]);
        if (!is_null($validate)) {
            return $validate;
        }
        $bodyHTTP = $this->getHTTPBodyBuffer("/mapa/mapa.php");
        $response = new Response(200, [], $bodyHTTP);
        return  $response;
    }
}


