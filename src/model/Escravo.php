<?php 
namespace My_Web_Struct\model;

class Escravo
{
    private $id;
    private $nome;
    private $preço;
    private $sexo;
    private $região;
    private $idade;
    private $oficio;
	public $id_doc;

    public function __construct($nome, $preço, $sexo, $região, $idade, $oficio, $id_doc,$id = null)
    {
        $this->nome = $nome;
        $this->preço= $preço;
        $this->sexo= $sexo;
        $this->região = $região;
        $this->idade = $idade;
        $this->oficio = $oficio;
        $this->id_doc = $id_doc;
        $this->id = $id;
    }

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getPreço(){
		return $this->preço;
	}

	public function setPreço($preço){
		$this->preço = $preço;
	}

	public function getRegião(){
		return $this->região;
	}

	public function setRegião($região){
		$this->região = $região;
	}
	public function getSexo(){
		return $this->sexo;
	}

	public function setSexo($sexo){
		$this->região = $sexo;
	}

	public function getIdade(){
		return $this->idade;
	}

	public function setIdade($idade){
		$this->idade = $idade;
	}

	public function getOficio() {
		return $this->oficio;
	}

	public function setOficio($oficio){
		$this->oficio = $oficio;
	}
	public function getIdDoc() {
		return $this->id_doc;
	}
	
}

