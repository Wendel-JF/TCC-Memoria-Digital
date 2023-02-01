<?php

namespace My_Web_Struct\controller;

use My_Web_Struct\controller\inheritance\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;

use Nyholm\Psr7\Response;

class MainPageController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if (array_key_exists("nivel", $_SESSION)) {
            $bodyHTTP = $this->getHTTPBodyBuffer("/main_page/main_page.php");
            $response = new Response(200, [], $bodyHTTP);
            return  $response;
        } else {
            return new Response(302, ["Location" => "/login"],);
        }
    }
}
