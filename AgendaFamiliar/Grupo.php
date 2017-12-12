<?php

class Grupo {
    private $codGrupo;
    private $nomeGrupo;
    private $usuarioEmail;

    
    public function __construct($nomeGrupo,$usuarioEmail) {
        $this->usuarioEmail = $usuarioEmail;
        $this->nomeGrupo = $nomeGrupo;
    }
    
    /**
     * @return mixed
     */
    
    
    
    /**
     * @return mixed
     */
    public function getUsuarioEmail()
    {
        return $this->usuarioEmail;
    }

    /**
     * @param mixed $codGrupo
     */
    public function setCodGrupo($codGrupo)
    {
        $this->codGrupo = $codGrupo;
    }

    /**
     * @param mixed $usuarioEmail
     */
    public function setUsuarioEmail($usuarioEmail)
    {
        $this->usuarioEmail = $usuarioEmail;
    }

    public function getCodGrupo()
    {
        return $this->codGrupo;
    }
    
    /**
     * @return mixed
     */
    public function getNomeGrupo()
    {
        return $this->nomeGrupo;
    }
    
    /**
     * @param mixed $nome
     */
    public function setNomeGrupo($nomeGrupo)
    {
        $this->nomeGrupo = $nomeGrupo;
    }
}

