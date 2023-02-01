<?php

namespace My_Web_Struct\model\bancoDados;

use mysqli;

class Conexao
{
    private $endereco = "127.0.0.1";
    private $login = "root";
    private $senha = "pitang";
    private $banco = "my_web_struct";
    public $mysqli;

    public function __construct()   
    {
        $this->mysqli = new mysqli($this->endereco,$this->login,$this->senha,$this->banco);
    }

    public function __destruct()
    {
        
    }

    public function fecharConexao(){
        $this->mysqli->close();
        $this->__destruct();
    }
}
