<?php

namespace My_Web_Struct\model\bancoDados;

use My_Web_Struct\model\bancoDados\Conexao;
use My_Web_Struct\model\Usuario;

class UsuarioBD
{
    public $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function adicionar(Usuario $usuario)
    {
        $comando = "INSERT INTO usuario (login, senha, nivel) VALUES (?, ?, ?);";

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
    public function addFoto(Usuario $usuario)
    {
        $comando = "UPDATE usuario SET foto_perfil = ? WHERE id = ?;";

        $id = $_SESSION["id_usuario"];
        $foto_perfil  = $usuario->getFoto_Perfil();
       
        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param(
            "si",
            $foto_perfil,
            $id
        );
        
        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }
        $this->conexao->fecharConexao();
    }
    public function atualizar(Usuario $usuarioAtualizado)
    {
        $comando = "UPDATE usuario SET login = ?, senha = ?, nivel= ? WHERE id = ?;";

        $id = $usuarioAtualizado->getId();
        $login = $usuarioAtualizado->getLogin();
        $senha = $usuarioAtualizado->getSenhaMd5();
        $nivel = $usuarioAtualizado->getNivel();

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param(
            "sssi",
            $login,
            $senha,
            $nivel,
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
        $comando = "DELETE FROM usuario WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
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
            $listaUsuario[] = new Usuario($linha["login"], $linha["nivel"],$linha["foto_perfil"], $linha["senha"], null, $linha["id"]);
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
        $usuario = new Usuario($linha["login"], $linha["nivel"],$linha["foto_perfil"], $linha["senha"], null, $linha["id"]);
        $this->conexao->fecharConexao();
        return $usuario;
    }
    public function getUsuarioLogin($login)
    {
        $comando = "SELECT * FROM usuario WHERE login = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("s", $login);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == null) {
            return null;
        }

        $linha = $resultado->fetch_assoc();
        $usuario = new Usuario($linha["login"], $linha["nivel"],$linha["foto_perfil"], $linha["senha"], null, $linha["id"]);
        $this->conexao->fecharConexao();
        return $usuario;
    }
}
