<?php

namespace My_Web_Struct\controller;

use My_Web_Struct\controller\inheritance\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AboutController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $serverRequest): ResponseInterface
    {
        if (array_key_exists("nivel", $_SESSION)) {
            $bodyHTTP = $this->getHTTPBodyBuffer("/sobre/sobre.php");
            $response = new Response(500, [], $bodyHTTP);
            return  $response;
        } else {
            return new Response(302, ["Location" => "/login"],);
        }

       
    }
}
