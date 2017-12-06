<?php

class Conexao {
    private static $instancia;
    
    private function __construct() { } 
    
    private function __clone() { }
    
    private function __wakeup() { }
   
    /**
     * @return object PDO connection 
     */
    public static function getInstancia()    {
        if(!isset(self::$instancia)) {
            try {
                
                define("PORT", "3307");
                define("DB", "agenda_familiar");
                define("END", "127.0.0.1");
                define("USER", "root");
                define("PASS", "");    
                
                self::$instancia = new PDO('mysql:host=' . END . ';port=' . PORT . ';dbname=' . DB . ';charset=utf8', USER, PASS);
                
                self::$instancia->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                
            }catch ( PDOException $excecao ){
                echo $excecao->getMessage();
                exit();
            } 
        }
        return self::$instancia;
    }

}

