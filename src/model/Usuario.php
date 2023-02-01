<?php

namespace My_Web_Struct\model;

class Usuario
{

    private $id;
    private $login;
    private $senha;
    private $foto_perfil;
    private $senhaMd5;
    private $nivel;

    public function __construct($login, $nivel,$foto_perfil, $senhaMd5 = null, $senha = null, $id = null)
    {
        $this->login = $login;
        $this->senha = $senha;
        $this->foto_perfil = $foto_perfil;
        $this->senhaMd5 = $senhaMd5;
        $this->nivel = $nivel;
        $this->id = $id;
    }

    public function getSenhaMd5()
    {
        if ($this->senhaMd5 == null) {
            $this->senhaMd5 = md5($this->senha);
        }
        return $this->senhaMd5;
    }

    public function getId()
    {
        return $this->id;
    }

    public function validarSenha($senha)
    {
        return $this->senhaMd5 == md5($senha);
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getNivel()
    {
        return $this->nivel;
    }
    public function getFoto_Perfil()
    {
        return $this->foto_perfil;
    }
}
