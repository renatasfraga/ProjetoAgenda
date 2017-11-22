<?php

Class Usuario{

	private $email;
	private $nomeUsuario;
	private $senha;

	function __construct($email, $nomeUsuario, $senha){

			$this->email = $email;
			$this->nomeUsuario = $nomeUsuario;
			$this->senha = $senha;

	}

	//Métodos set
	public function setEmail($email) { 
			$this->email = $email; 
	} 
	public function setNomeUsuario($nomeUsuario){
			$this->nomeUsuario = $nomeUsuario;
	}
	public function setSenha($descricao){
			$this->senha = $senha;
	}


	//Métodos get
	public function getEamil(){
			return $this->email;
	}
	public function getNomeUsuario(){
			return $this->nomeUsuario;
	}
	public function getSenha(){
			return $this->senha;
	}


	public function listarEvento(){
			echo "E-mail: $this->email <br>";
			echo "Nome do Usuário: $this->nomeUsuario <br>";
	}
}
?>