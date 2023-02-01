<?php

namespace My_Web_Struct\controller;

use My_Web_Struct\controller\inheritance\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class HelloWorld extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $serverRequest): ResponseInterface
    {
        $bodyHttp = $this->getHTTPBodyBuffer("/erro/Erro_500.php");
        $response = new Response(500, [], $bodyHttp);
        return $response;
    }
}
