<?php

namespace My_Web_Struct\controller\inheritance;

class Controller {
    
    public function getHTTPBodyBuffer(String $viewPath, Array $datas = [])
    {
        ob_start();
        extract($datas);
        require __DIR__.'/../../view'.$viewPath;
        $bodyHTTP = ob_get_clean();
        return $bodyHTTP;
    }
}