<?php

namespace My_Web_Struct\model;

class Aluno
{
    public $nome;
    public $turma;

    public function __construct($nome, $turma)
    {
        $this->nome = $nome;
        $this->turma = $turma;
    }
}
