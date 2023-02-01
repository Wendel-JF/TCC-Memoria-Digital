<?php

namespace My_Web_Struct\model;

class Documentos
{
    public $id;
    public $documento;
    public $titulo;
    public $usuario;
    public $data;

    public function __construct($id = null, $documento, $titulo,$usuario,$data)
    {
        $this->id = $id;
        $this->documento = $documento;
        $this->titulo = $titulo;
        $this->usuario = $usuario;
        $this->data = $data;
    }
}
