<?php

class Evento {
        private $codEvento;
        private $nome;
        private $local;
        private $descricao;
        private $dtIni;
        private $dtFim;
        private $hrInicio;
        private $hrFim;
        private $usuarioEmail;
        
        public function __construct($nome,$local,$descricao,$dtIni,$dtFim,
            $hrInicio, $hrFim,$usuarioEmail) {
            $this->nome = $nome;
            $this->local = $local; 
            $this->descricao = $descricao;
            $this->dtIni = $dtIni;
            $this->dtFim = $dtFim;
            $this->hrInicio = $hrInicio;
            $this->hrFim = $hrFim;
            $this->usuarioEmail = $usuarioEmail;
            
            
        }
        
        
        
        /**
         * @param mixed $codEvento
         */
        public function setCodEvento($codEvento)
        {
            $this->codEvento = $codEvento;
        }
    
        /**
         * @return mixed
         */
        public function getCodEvento()
        {
            return $this->codEvento;
        }
    
        /**
         * @return mixed
         */
        public function getNome()
        {
            return $this->nome;
        }
    
        /**
         * @return mixed
         */
        public function getLocal()
        {
            return $this->local;
        }
    
        /**
         * @return mixed
         */
        public function getDescricao()
        {
            return $this->descricao;
        }
    
        /**
         * @return mixed
         */
        public function getDtIni()
        {
            return $this->dtIni;
        }
    
        /**
         * @return mixed
         */
        public function getDtFim()
        {
            return $this->dtFim;
        }
    
        /**
         * @param mixed $nome
         */
        public function setNome($nome)
        {
            $this->nome = $nome;
        }
    
        /**
         * @param mixed $local
         */
        public function setLocal($local)
        {
            $this->local = $local;
        }
    
        /**
         * @param mixed $descricao
         */
        public function setDescricao($descricao)
        {
            $this->descricao = $descricao;
        }
    
        /**
         * @param mixed $dtIni
         */
        public function setDtIni($dtIni)
        {
            $this->dtIni = $dtIni;
        }
    
        /**
         * @param mixed $dtFim
         */
        public function setDtFim($dtFim)
        {
            $this->dtFim = $dtFim;
        }
        
        
        
        
        /**
         * @return mixed
         */
        public function getHrInicio()
        {
            return $this->hrInicio;
        }
    
        /**
         * @return mixed
         */
        public function getHrFim()
        {
            return $this->hrFim;
        }
    
        /**
         * @param mixed $hrInicio
         */
        public function setHrInicio($hrInicio)
        {
            $this->hrInicio = $hrInicio;
        }
    
        /**
         * @param mixed $hrFim
         */
        public function setHrFim($hrFim)
        {
            $this->hrFim = $hrFim;
        }
    
        public function setUsuarioEmail($usuarioEmail) {
            $this->usuarioEmail = $usuarioEmail; 
        }
        
        public function getUsuarioEmail() {
            return $this->usuarioEmail;
        }
        
        
        
    
    
}

