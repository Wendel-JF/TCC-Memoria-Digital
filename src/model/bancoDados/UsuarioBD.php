<?php

namespace My_Web_Struct\model\bancoDados;

use My_Web_Struct\model\bancoDados\Conexao;
use My_Web_Struct\model\Usuario;

class UsuarioBD
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function adicionar(Usuario $usuario)
    {
        $comando = "INSERT INTO usuario (login, senha, nivel) VALUES(?, ?, ?);";
        $login = $usuario->getLogin();
        $senha = $usuario->getSenhaMd5();
        $nivel = $usuario->getNivel();

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param(
            "sss",
            $login,
            $senha,
            $nivel
        );

        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function atualizar(Usuario $usuairoAtualizado)
    {
        $comando = "UPDATE TABLE usuario SET login = ?, senha = ?, nivel= ? WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param(
            "sssd",
            $usuairoAtualizado->getLogin(),
            $usuairoAtualizado->getSenhaMd5(),
            $usuairoAtualizado->getNivel(),
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
        $comando = "DELETE FROM TABLE usuario WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        var_dump($id);
        $preparacao->bind_param("s", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function getLista()
    {
        $comando = "SELECT * FROM usuario;";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }

        $listaUsuario = [];
        
        while ($linha = $resultado->fetch_assoc()) {
            $listaUsuario[] = new Usuario($linha["login"], $linha["nivel"], $linha["senha"], null, $linha["id"]);
        }


        $this->conexao->fecharConexao();
        return $listaUsuario;
    }

    public function getUsuario($id)
    {
        $comando = "SELECT * FROM usuario WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("d", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $linha = $resultado->fetch_assoc();
        $usuario = new Usuario($linha["login"], $linha["nivel"], $linha["senha"], null, $linha["id"]);
        $this->conexao->fecharConexao();
        return $usuario;
    }
}
