<?php

namespace My_Web_Struct\model\bancoDados;

use My_Web_Struct\model\bancoDados\Conexao;
use My_Web_Struct\model\Escravo;

class EscravosBD
{
    public $conexao;
    public $pag;
    public $tp;
    public $proximo;
    public $anterior;
    public $limite = [];
    
    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function adicionar(Escravo $escravos)
    {
        
        $comando = "INSERT INTO personagens (nome,preço,região,sexo,idade,oficio) VALUES (?,?,?,?,?,?);";

        $nome = $escravos->getNome();
        $preço = $escravos->getPreço();
        $região = $escravos->getRegião();
        $sexo = $escravos->getSexo();
        $idade = $escravos->getIdade();
        $oficio = $escravos->getOficio();

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("sdssis",$nome, $preço,$região,$sexo,$idade,$oficio);

        $preparacao->execute();
        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();

    }
    public function atualizar(Escravo $escravosAtualizados)
    {
        $comando = "UPDATE personagens SET nome = ?, preço = ?, região = ?, sexo = ?, idade = ?, oficio = ? WHERE id = ?;";

        $id = $escravosAtualizados->getId();
        $nome = $escravosAtualizados->getNome();
        $preço = $escravosAtualizados->getPreço();
        $região = $escravosAtualizados->getRegião();
        $sexo = $escravosAtualizados->getSexo();
        $idade = $escravosAtualizados->getIdade();
        $oficio = $escravosAtualizados->getOficio();

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param(
            "sdssisi",
            $nome, 
            $preço,
            $região,
            $sexo,
            $idade,
            $oficio,
            $id
        );
        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }
        $this->conexao->fecharConexao();
        
    }

    public function remover($id)
    {
        $comando = "DELETE FROM personagens WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function Paginacao($pag) {
        $this->pag = $pag;
    
        $busca = "SELECT * FROM personagens ORDER BY id DESC";
        $todos = $this->conexao->mysqli->query($busca);
        
        $registros = "10";
        
        $tr = mysqli_num_rows($todos);
        $this->tp = ceil($tr/$registros);
        
        $inicio = ($registros*$this->pag)-$registros;
        $this->limite = $this->conexao->mysqli->query("$busca LIMIT $inicio, $registros");
        
        $this->anterior = $this->pag -1;
        $this->proximo = $this->pag +1;

        $this->conexao->fecharConexao();
    }

    public function getSearchEscravos($pesquisa,$pag)
    {
    
        $this->pag = $pag;
        
        $comando = "SELECT * FROM personagens WHERE nome LIKE '%$pesquisa%' or preço LIKE '%$pesquisa%' or sexo LIKE '%$pesquisa%' or região LIKE '%$pesquisa%' or idade LIKE '%$pesquisa%' or oficio LIKE '%$pesquisa%' ORDER BY id DESC";
        $resultado = $this->conexao->mysqli->query($comando);
        
        $registros = "15";
        
        $tr = mysqli_num_rows($resultado);
        $this->tp = ceil($tr/$registros);
       
        
        $inicio = ($registros*$this->pag)-$registros;
        $this->limite = $this->conexao->mysqli->query("$comando LIMIT $inicio, $registros");
        
        
        $this->anterior = $this->pag -1;
        $this->proximo = $this->pag +1;
    }
    public function getEscravo($id)
    {
        
        $comando = "SELECT * FROM personagens WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("d", $id);
        
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }
        $linha = $resultado->fetch_assoc();
        
        $listaEscravo = new Escravo ($linha["nome"], $linha["preço"], $linha["sexo"], $linha["região"],$linha["idade"],$linha["oficio"], $linha["id"]);
       
        $this->conexao->fecharConexao();
        return $listaEscravo;
    }

}
