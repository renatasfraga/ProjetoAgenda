<!DOCTYPE html>
<html>
<head>
</head>
<body>


<?php

    $codGrupo = $_POST['cod_grupo'];
    
    function __autoload( $classe ){
        
        if(file_exists( "{$classe}.php" )) {
            include_once "{$classe}.php";
        } else {
            echo "O arquivo {$classe}.php da classe {$classe} não foi encontrado";
        }
    }
    
    $persistenciaGrupo = new DaoGrupo();
    
    if($persistenciaGrupo->delete($codGrupo)){
        ?> <script>
					alert("Grupo removido com sucesso!");
					window.location.href = "telaGrupo.php";
					

             	</script>
             <?php  
        }
 ?>
 </body>
 </html>
    