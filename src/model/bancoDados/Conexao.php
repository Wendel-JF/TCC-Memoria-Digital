<?php

namespace My_Web_Struct\model\bancoDados;

use mysqli;

class Conexao
{
    private $endereco = "localhost";
    private $login = "root";
    private $senha = "1234";
    private $banco = "my_web_struct";
    public  $mysqli;

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
