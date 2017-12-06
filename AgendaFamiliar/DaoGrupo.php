<?php

class DaoGrupo implements iDaoModeCrud {
    
    
    private $instanciaConexaoPdoAtiva;
    private $tabela;
    
    
    public function __construct() {
        $this->instanciaConexaoPdoAtiva = Conexao::getInstancia();
        $this->tabela = 'grupocontato';
        
    }
    
    
    public function read($codGrupo)   {
        $sqlStmt = "SELECT * from {$this->tabela} WHERE cod_grupo = :codGrupo";
        
        try {
            $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
            $operacao->bindValue(":codGrupo",$id,PDO::PARAM_INT);
            $operacao->execute();
            $getRow = $operacao->fetch(PDO::FETCH_OBJ);
            $nomeGrupo = $getRow->nome_grupo;
            $objeto = new Evento($nomeGrupo);
            return $objeto;
        } catch(PDOException $excecao) {
            echo $excecao->getMessage();
        }
    }
    
    public function create($objeto)    {
        $nomeGrupo = $objeto->getNomegrupo();
        $usuarioEmail = $objeto->getUsuarioEmail();
        
        
        $sqlStmt = "INSERT INTO {$this->tabela} (nome_grupo,usuario_email)
                            VALUES(:nomeGrupo,:usuarioEmail)";
        
        try {
            $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
            $operacao->bindValue(":nomeGrupo",$nomeGrupo,PDO::PARAM_STR);
            $operacao->bindValue(":usuarioEmail",$usuarioEmail,PDO::PARAM_STR);
            
            if($operacao->execute()) {
                if($operacao->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch(PDOException $excecao) {
            echo $excecao->getMessage();
        }
        
    }
    
    public function update($objeto)   {
        $codGrupo = $objeto->getCodGrupo();
        $nomeGrupo = $objeto->getNomeGrupo();
       
        $sqlStmt = "UPDATE {$this->tabela} SET nome_grupo=:nomeGrupo
                            WHERE cod_grupo=:codGrupo";
        try {
            $operacao=  $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
            $operacao->bindValue(":codGrupo",$codGrupo,PDO::PARAM_INT);
            $operacao->bindValue(":nomeGrupo",$nomeGrupo, PDO::PARAM_STR);
           
            if($operacao->execute()) {
                if($operacao->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch(PDOException $excecao) {
            echo $excecao->getMessage();
        }
        
    }
    
    public function delete($codGrupo)    {
        $sqlStmt = "DELETE FROM {$this->tabela} WHERE
             cod_grupo=:codGrupo";
        try {
            $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
            $operacao->bindValue(":codGrupo",$codGrupo,PDO::PARAM_INT);
            if($operacao->execute()) {
                if($operacao->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $excecao) {
            echo $excecao->getMessage();
            
        }  
    }     
}

