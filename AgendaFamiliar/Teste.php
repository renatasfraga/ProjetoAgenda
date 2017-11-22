<?php
       

        function __autoload( $classe ){
           
            if(file_exists( "{$classe}.php" )) {
                      include_once "{$classe}.php";
             } else {
                     echo "O arquivo {$classe}.php da classe {$classe} não foi encontrado";
             }
        }
        
        $evento = new Evento("renatas", "renatas", "reass", "2010-02-02", "2010-02-02" ,"renatasfraga@gmail.com");
        
        $persistenciaEvento = new DaoEvento();
        
        if($persistenciaEvento->create($evento)){
                   echo "Inseridos no banco com Êxito’";
        }
            
       
        
     
   ?>