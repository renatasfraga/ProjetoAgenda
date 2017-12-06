<?php

class DaoEvento implements iDaoModeCrud {
    
    
    private $instanciaConexaoPdoAtiva;
    private $tabela;
    
    
    public function __construct() {
         $this->instanciaConexaoPdoAtiva = Conexao::getInstancia();
         $this->tabela = 'evento';
             
     }
        
    
    public function read($codEvento)   {
        $sqlStmt = "SELECT * from {$this->tabela} WHERE cod_evento = :codEvento";
        
        try {
            $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
            $operacao->bindValue(":codEvento",$id,PDO::PARAM_INT);
            $operacao->execute();
            $getRow = $operacao->fetch(PDO::FETCH_OBJ);
            $nome = $getRow->NOME;
            $local = $getRow->LOCAL;
            $descricao = $getRow->DESCRICAO;
            $dtIni = $getRow->DT_INI;
            $dtFim = $getRow->DT_FIM; 
            $usuarioEmail = $getRow->USUARIO_EMAIL;
            $objeto = new Evento($nome,$local,$descricao,$dtIni,$dtFim,$usuarioEmail);
            return $objeto;
        } catch(PDOException $excecao) {
            echo $excecao->getMessage();
        }
     }

    public function create($objeto)    {
        $nome = $objeto->getNome();
        $local = $objeto->getLocal();
        $descricao = $objeto->getDescricao();
        $dtIni = $objeto->getDtIni();
        $dtFim = $objeto->getDtFim();
        $hrInicio = $objeto->getHrInicio();
        $hrFim = $objeto->getHrFim(); 
        
        $usuarioEmail = $objeto->getUsuarioEmail();
        
        $sqlStmt = "INSERT INTO {$this->tabela} (nome,local_evento,descricao,dt_ini,dt_fim,hr_ini,hr_fim,usuario_email)  
                            VALUES(:nome,:local,:descricao,:dtIni,:dtFim,:hr_ini,:hr_fim,:usuarioEmail)";
        
        try {
            $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
            $operacao->bindValue(":nome",$nome,PDO::PARAM_STR);
            $operacao->bindValue(":local",$local,PDO::PARAM_STR);
            $operacao->bindValue(":descricao",$descricao,PDO::PARAM_STR);
            $operacao->bindValue(":dtIni",$dtIni,PDO::PARAM_STR);
            $operacao->bindValue(":dtFim",$dtFim,PDO::PARAM_STR);
            $operacao->bindValue(":hr_ini",$hrInicio,PDO::PARAM_STR);
            $operacao->bindValue(":hr_fim", $hrFim,PDO::PARAM_STR);
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
        $codEvento = $objeto->getCodEvento();
        $nome = $objeto->getNome();
        $local = $objeto->getLocal();
        $descricao = $objeto->getDescricao();
        $dtIni = $objeto->getDtIni();
        $dtFim = $objeto->getDtFim();
        $hrInicio = $objeto->getHrInicio();
        $hrFim = $objeto->getHrFim(); 
        
        $sqlStmt = "UPDATE {$this->tabela} SET NOME=:nome, LOCAL_EVENTO=:local,
                           DESCRICAO=:descricao, DT_INI=:dtIni, DT_FIM=:dtFim,
                           HR_INI=:hr_ini, HR_FIM=:hr_fim
                             
                            WHERE COD_EVENTO=:codEvento";
        try {
            $operacao=  $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
            $operacao->bindValue(":codEvento",$codEvento,PDO::PARAM_INT);
            $operacao->bindValue(":nome",$nome, PDO::PARAM_STR);
            $operacao->bindValue(":local",$local, PDO::PARAM_STR);
            $operacao->bindValue(":descricao",$descricao, PDO::PARAM_STR);
            $operacao->bindValue(":dtIni",$dtIni, PDO::PARAM_STR);
            $operacao->bindValue(":dtFim",$dtFim, PDO::PARAM_STR);
            $operacao->bindValue(":hr_ini",$hrInicio,PDO::PARAM_STR);
            $operacao->bindValue(":hr_fim", $hrFim,PDO::PARAM_STR);
           
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

    public function delete($codEvento)    {
        $sqlStmt = "DELETE FROM {$this->tabela} WHERE
             COD_EVENTO=:codEvento";
        try {
            $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
            $operacao->bindValue(":codEvento",$codEvento,PDO::PARAM_INT);
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

