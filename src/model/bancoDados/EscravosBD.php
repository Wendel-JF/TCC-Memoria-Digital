<?php

namespace My_Web_Struct\model\bancoDados;

use My_Web_Struct\model\bancoDados\Conexao;
use My_Web_Struct\model\Escravo;

class EscravosBD
{
    public $conexao;

    public $pag;
    public $tr;
    public $tp;
    public $proximo;
    public $anterior;
    public $limite = [];

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function getLista($pesquisa, $pag, $filtro_genero, $filtro_idade_min, $filtro_idade_max, $filtro_preco_min, $filtro_preco_max,$ordenar,$numero_registro)
    {

        $busca = "SELECT * FROM personagens ORDER BY id DESC";

        //--------------------------------------------------------Filtros-----------------------------------------------------------------------

        if ($pesquisa || $ordenar || $filtro_genero || $filtro_idade_min || $filtro_idade_max || $filtro_preco_min || $filtro_preco_max != null) {

            if ($filtro_idade_min == null) {
                $filtro_idade_min = 1;
            }
            if ($filtro_preco_min == null) {
                $filtro_preco_min = 0.1;
            }

            if ($filtro_idade_max == null || $filtro_preco_max == null) {
                if ($filtro_idade_max == null) {
                    $filtro_idade_max = 130;
                }
                if ($filtro_preco_max == null) {
                    $filtro_preco_max = 1000000;
                }
            }

            if ($ordenar == null) {
                $ordenar = "id DESC";
            }
            if ($filtro_genero == null) {
                $filtro_genero = null;
            }
            $busca = "SELECT * FROM personagens WHERE (nome LIKE '%$pesquisa%' or região LIKE '%$pesquisa%' or oficio LIKE '%$pesquisa%') 
            AND idade >= $filtro_idade_min AND preço >= $filtro_preco_min AND idade <= $filtro_idade_max AND preço <= $filtro_preco_max AND sexo LIKE '%$filtro_genero%' ORDER BY $ordenar";
        }

        $todos = $this->conexao->mysqli->query($busca);

        $numero_registro == null ? $numero_registro = 15 : $numero_registro;
        $registros = "$numero_registro";

        $this->tr = mysqli_num_rows($todos);
        $this->tp = ceil($this->tr / $registros);

        $this->pag = $pag;

        $inicio = ($registros * $this->pag) - $registros;
        $this->limite = $this->conexao->mysqli->query("$busca LIMIT $inicio, $registros");

        $this->anterior = $this->pag - 1;
        $this->proximo = $this->pag + 1;

        $this->conexao->fecharConexao();
    }

    public function getLista2()
    {
        $comando = "SELECT * FROM personagens ORDER BY nome DESC";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }

        $listaEscravo = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaEscravo[] = new Escravo($linha["nome"], $linha["preço"], $linha["sexo"], $linha["região"], $linha["idade"], $linha["oficio"], $linha["id_Doc"], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaEscravo;
    }

    public function getCount(){
        $comando = "SELECT * FROM personagens";
        $resultado = $this->conexao->mysqli->query($comando);
        
        if ($resultado == false) {
            return null;
        }

        $num_rows = mysqli_num_rows($resultado);
        $this->conexao->fecharConexao();
        return $num_rows;
        }

    public function adicionar(Escravo $escravos)
    {
        if ($escravos->getIdDoc() == "") {
            $id_doc = null;
        } else {
            $id_doc = $escravos->getIdDoc();
        }

        $comando = "INSERT INTO personagens (nome,preço,região,sexo,idade,oficio,id_Doc) VALUES (?,?,?,?,?,?,?);";

        $nome = $escravos->getNome();
        $preço = $escravos->getPreço();
        $região = $escravos->getRegião();
        $sexo = $escravos->getSexo();
        $idade = $escravos->getIdade();
        $oficio = $escravos->getOficio();
        

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("sdssisi", $nome, $preço, $região, $sexo, $idade, $oficio, $id_doc);

        $preparacao->execute();
        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }
    public function atualizar(Escravo $escravosAtualizados)
    {

        if ($escravosAtualizados->getIdDoc() == "") {
            $id_doc = null;
        } else {
            $id_doc = $escravosAtualizados->getIdDoc();
        }

        $comando = "UPDATE personagens SET nome = ?, preço = ?, região = ?, sexo = ?, idade = ?, oficio = ?, id_Doc = ? WHERE id = ?;";
        
        $id = $escravosAtualizados->getId();
        $nome = $escravosAtualizados->getNome();
        $preço = $escravosAtualizados->getPreço();
        $região = $escravosAtualizados->getRegião();
        $sexo = $escravosAtualizados->getSexo();
        $idade = $escravosAtualizados->getIdade();
        $oficio = $escravosAtualizados->getOficio();


        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param(
            "sdssisii",
            $nome,
            $preço,
            $região,
            $sexo,
            $idade,
            $oficio,
            $id_doc,
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

    public function removerId_doc($id)
    {
        $comando = "UPDATE personagens SET id_Doc = null WHERE id_Doc = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
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

        $listaEscravo = new Escravo($linha["nome"], $linha["preço"], $linha["sexo"], $linha["região"], $linha["idade"], $linha["oficio"], $linha["id_Doc"], $linha["id"]);

        $this->conexao->fecharConexao();
        return $listaEscravo;
    }
}
