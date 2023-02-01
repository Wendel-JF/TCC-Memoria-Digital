<?php

namespace My_Web_Struct\model\bancoDados;

use My_Web_Struct\model\bancoDados\Conexao;
use My_Web_Struct\model\Personagem;
use My_Web_Struct\model\bancoDados\DocumentosBD;

class PersonagensBD
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

    public function getLista($pesquisa, $pag, $filtro_genero, $filtro_idade_min, $filtro_idade_max, $filtro_valor_min, $filtro_valor_max, $ordenar, $numero_registro)
    {

        $busca = "SELECT * FROM personagens ORDER BY id DESC";

        //--------------------------------------------------------Filtros-----------------------------------------------------------------------

        if ($pesquisa || $ordenar || $filtro_genero || $filtro_idade_min || $filtro_idade_max || $filtro_valor_min || $filtro_valor_max != null) {

            if ($filtro_idade_min == null) {
                $filtro_idade_min = 0;
            }
            if ($filtro_valor_min == null) {
                $filtro_valor_min = 0;
            }

            if ($filtro_idade_max == null || $filtro_valor_max == null) {
                if ($filtro_idade_max == null) {
                    $filtro_idade_max = 130;
                }
                if ($filtro_valor_max == null) {
                    $filtro_valor_max = 1000000;
                }
            }

            if ($ordenar == null) {
                $ordenar = "id DESC";
            }
            if ($filtro_genero != null) {
                $pesquisa_genero = "AND genero LIKE '%$filtro_genero%'";
            } else {
                $pesquisa_genero = null;
            }
            $docDB = new DocumentosBD();
           
            $busca = "SELECT * FROM personagens WHERE (nome LIKE '%$pesquisa%' or região LIKE '%$pesquisa%' or oficio LIKE '%$pesquisa%') 
            AND idade >= $filtro_idade_min AND valor >= $filtro_valor_min AND idade <= $filtro_idade_max AND valor <= $filtro_valor_max $pesquisa_genero ORDER BY $ordenar";
        }

        $todos = $this->conexao->mysqli->query($busca);

        //paginacao
        $registros = "10";

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

        $listaPersonagens = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listaPersonagens[] = new Personagem($linha["nome"], $linha["valor"], $linha["saude"], $linha["genero"], $linha["região"], $linha["idade"], $linha["oficio"], $linha["data_de_referência"], $linha["coondição"], $linha["parentesco"], $linha["outras_informações"], $linha["id_doc"], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listaPersonagens;
    }

    public function getCount()
    {
        $comando = "SELECT * FROM personagens";


        $resultado = $this->conexao->mysqli->query($comando);

        if ($resultado == false) {
            return null;
        }

        $num_rows = mysqli_num_rows($resultado);
        $this->conexao->fecharConexao();
        return $num_rows;
    }

    public function adicionar(Personagem $personagens)
    {
        if ($personagens->getIdDoc() == "" || $personagens->getIdDoc() == 0) {
            $id_doc = null;
        } else {
            $id_doc = $personagens->getIdDoc();
        }

        $comando = "INSERT INTO personagens (nome,valor,saude,região,genero,idade,oficio,data_de_referência,coondição,parentesco,outras_informações,id_doc) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);";

        $nome = $personagens->getNome();
        $idade = $personagens->getIdade();
        $valor = $personagens->getValor();
        $saude = $personagens->getSaude();
        $região = $personagens->getRegião();
        $genero = $personagens->getGenero();
        $oficio = $personagens->getOficio();
        $data_de_referencia = $personagens->getDatadereferencia();
        $coondicao = $personagens->getCoondicao();
        $parentesco = $personagens->getParentesco();
        $outras_informações = $personagens->getOutras_informacoes();

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param(
            "sdsssisisssi",
            $nome,
            $valor,
            $saude,
            $região,
            $genero,
            $idade,
            $oficio,
            $data_de_referencia,
            $coondicao,
            $parentesco,
            $outras_informações,
            $id_doc
        );

        $preparacao->execute();
        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }
    public function atualizar(Personagem $personagensAtualizados)
    {
        if ($personagensAtualizados->getIdDoc() == "") {
            $id_doc = null;
        } else {
            $id_doc = $personagensAtualizados->getIdDoc();
        }

        $comando = "UPDATE personagens SET nome = ?, valor = ?, saude = ?, região = ?, genero = ?, idade = ?, oficio = ?, data_de_referência = ?, coondição = ?, parentesco = ?, outras_informações = ?, id_doc = ? WHERE id = ?;";

        $id = $personagensAtualizados->getId();
        $nome = $personagensAtualizados->getNome();
        $valor = $personagensAtualizados->getValor();
        $idade = $personagensAtualizados->getIdade();
        $saude = $personagensAtualizados->getSaude();
        $região = $personagensAtualizados->getRegião();
        $genero = $personagensAtualizados->getGenero();
        $oficio = $personagensAtualizados->getOficio();
        $data_de_referencia = $personagensAtualizados->getDatadeReferencia();
        $coondicao = $personagensAtualizados->getCoondicao();
        $parentesco = $personagensAtualizados->GetParentesco();
        $outras_informacoes = $personagensAtualizados->GetOutras_informacoes();

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param(
            "sdsssisisssii",
            $nome,
            $valor,
            $saude,
            $região,
            $genero,
            $idade,
            $oficio,
            $data_de_referencia,
            $coondicao,
            $parentesco,
            $outras_informacoes,
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
        $comando = "UPDATE personagens SET id_doc = null WHERE id_doc = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function getPersonagem($id)
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

        $listaPersonagens = new Personagem($linha["nome"], $linha["valor"], $linha["saude"], $linha["genero"], $linha["região"], $linha["idade"], $linha["oficio"], $linha["data_de_referência"], $linha["coondição"], $linha["parentesco"], $linha["outras_informações"], $linha["id_doc"], $linha["id"]);

        $this->conexao->fecharConexao();
        return $listaPersonagens;
    }
}
