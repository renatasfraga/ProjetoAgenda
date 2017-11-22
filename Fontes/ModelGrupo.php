<?php

Class GrupoEvento{

	private $codGrupo;
	private $nomeGrupo;

	function __construct($codGrupo, $nomeGrupo){

			$this->codGrupo = $codGrupo;
			$this->nomeGrupo = $nomeGrupo;

	}

	//Métodos set
	public function setEmail($codGrupo) { 
			$this->codGrupo = $codGrupo; 
	} 
	public function setNomeUsuario($nomeGrupo){
			$this->nomeGrupo = $nomeGrupo;
	}


	//Métodos get
	public function getEamil(){
			return $this->codGrupo;
	}
	public function getNomeUsuario(){
			return $this->nomeGrupo;
	}


	public function listarEvento(){
			echo "Código do Grupo: $this->codGrupo <br>";
			echo "Nome do Grupo: $this->nomeGrupo <br>";
	}
}
?>