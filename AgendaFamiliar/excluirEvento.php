<!DOCTYPE html>
<html>
<head>
</head>
<body>


<?php

    $codEvento = $_POST['cod_evento'];
    
    function __autoload( $classe ){
        
        if(file_exists( "{$classe}.php" )) {
            include_once "{$classe}.php";
        } else {
            echo "O arquivo {$classe}.php da classe {$classe} não foi encontrado";
        }
    }
    
    $persistenciaEvento = new DaoEvento();
    
    if($persistenciaEvento->delete($codEvento)){
        ?> <script>
					alert("Evento removido com sucesso!");
					window.location.href = "usuario.php";
					

             	</script>
             <?php  
        }
 ?>
 </body>
 </html>
    