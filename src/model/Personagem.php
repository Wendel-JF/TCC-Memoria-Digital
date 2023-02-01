<?php 
namespace My_Web_Struct\model;

class Personagem
{
    private $id;
    private $nome;
    private $valor;
	private $saude;
    private $genero;
    private $região;
    private $idade;
    private $oficio;
	private $data_de_referencia;
	private $coondicao;
	private $parentesco;
	private $outras_informacoes;
	public $id_doc;

    public function __construct($nome, $valor, $saude, $genero, $região, $idade, $oficio, $data_de_referencia, $coondicao, $parentesco, $outras_informacoes, $id_doc, $id = null)
    {
        $this->nome = $nome;
        $this->valor = $valor;
		$this->saude = $saude;
        $this->genero = $genero;
        $this->região = $região;
        $this->idade = $idade;
        $this->oficio = $oficio;
		$this->data_de_referencia = $data_de_referencia;
        $this->coondicao = $coondicao;
        $this->parentesco = $parentesco;
        $this->outras_informacoes = $outras_informacoes;
        $this->id_doc = $id_doc;
        $this->id = $id;
		
    }

    public function getId(){
		return $this->id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function getValor(){
		return $this->valor;
	}

	public function getSaude(){
		return $this->saude;
	}

	public function getRegião(){
		return $this->região;
	}

	public function getGenero(){
		return $this->genero;
	}

	public function getIdade(){
		return $this->idade;
	}

	public function getOficio() {
		return $this->oficio;
	}

	public function getDatadeReferencia() {
		return $this->data_de_referencia;
	}

	public function getCoondicao() {
		return $this->coondicao;
	}

	public function getParentesco() {
		return $this->parentesco;
	}

	public function getOutras_informacoes() {
		return $this->outras_informacoes;
	}

	public function getIdDoc() {
		return $this->id_doc;
	}
}

