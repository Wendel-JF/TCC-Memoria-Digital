<?php

namespace My_Web_Struct\model\bancoDados;

use My_Web_Struct\model\Documentos;

class DocumentosBD
{

    private $conexao;
    public $pag;
    public $tp;
    public $proximo;
    public $anterior;
    public $limite = [];

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function adicionar(Documentos $transcricao)
    {
        $comando = "INSERT INTO documentos (documento, titulo, data_upload, usuario) VALUES (?, ?, ?, ?);";

        $documento = $transcricao->documento;
        $titulo = $transcricao->titulo;
        $data = $transcricao->data;
        $usuario = $transcricao->usuario;

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("ssss", $documento, $titulo, $data, $usuario);

        $preparacao->execute();
        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function getListaDocumentos($pag)
    {
        $this->pag = $pag;

        $busca = "SELECT * FROM documentos ORDER BY id DESC";
        $todos = $this->conexao->mysqli->query($busca);

        $registros = "5";

        $tr = mysqli_num_rows($todos);
        $this->tp = ceil($tr / $registros);

        $inicio = ($registros * $this->pag) - $registros;
        $this->limite = $this->conexao->mysqli->query("$busca LIMIT $inicio, $registros");

        $this->anterior = $this->pag - 1;
        $this->proximo = $this->pag + 1;

        $this->conexao->fecharConexao();
    }

    public function atualizar(Documentos $transcricoesAtualizadas)
    {
        $comando = "UPDATE documentos SET documento = ?, titulo = ?, data_upload = ?, usuario = ? WHERE id = ?;";

        $id = $transcricoesAtualizadas->id;
        $documento = $transcricoesAtualizadas->documento;
        $titulo = $transcricoesAtualizadas->titulo;
        $data = $transcricoesAtualizadas->data;
        $usuario = $transcricoesAtualizadas->usuario;

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param(
            "ssssi",
            $documento,
            $titulo,
            $data,
            $usuario,
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
        $comando = "DELETE FROM documentos WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function getDocumentos($id)
    {
        $comando = "SELECT * FROM documentos WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("d", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $linha = $resultado->fetch_assoc();
        $transcricao = new Documentos($linha["id"], $linha["documento"], $linha["titulo"], $linha["usuario"], $linha["data_upload"]);
        $this->conexao->fecharConexao();
        return $transcricao;
    }
}
