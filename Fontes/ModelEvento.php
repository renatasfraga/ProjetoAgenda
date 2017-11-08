<?php

Class Evento{

	private $nomeEvento;
	private $local;
	private $descricao;
	private $dtHrInicio;
	private $dtHrFim;

	function __construct($nomeEvento, $local, $descricao, $dtHrInicio, $dtHrFim){

			$this->nomeEvento = $nomeEvento;
			$this->local = $local;
			$this->descricao = $descricao;
			$this->dtHrInicio = $dtHrInicio;
			$this->dtHrFim = $dtHrFim;
	}

	//Métodos set
	public function setNomeEvento($nomeEvento) { 
			$this->nomeEvento = $nomeEvento; 
	} 
	public function setLocal($local){
			$this->local = $local;
	}
	public function setDescricao($descricao){
			$this->descricao = $descricao;
	}
	public function setdtHrInicio($dtHrInicio){
			$this->dtHrInicio = $dtHrInicio;
	}
	public function setdtHrFim($dtHrFim){
			$this->dtHrFim = $dtHrFim;
	}

	//Métodos get
	public function getNomeEvento(){
			return $this->nomeEvento;
	}
	public function getLocal(){
			return $this->local;
	}
	public function getDescricao(){
			return $this->descricao;
	}
	public function getdtHrInicio(){
			return $this->dtHrInicio;
	}
	public function getdtHrFim(){
			return $this->dtHrFim;
	}

	public function listarEvento(){
			echo "Nome do Evento: $this->nomeEvento <br>";
			echo "Local: $this->local <br>";
			echo "Descrição: $this->descricao <br>";
			echo "Data/Hora Início: $this->dtHrInicio <br>";
			echo "Data/Hora Fim: $this->dtHrFim <br>";
	}
}
?>