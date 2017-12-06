 <!DOCTYPE html>
  <html>
    <head>
    </head>
    <body>


<?php
    


    $nome_grupo = $_POST['nome_grupo'];
    $usuario_email = $_POST['usuario_email'];
    
    
    
    function __autoload( $classe ){
           
            if(file_exists( "{$classe}.php" )) {
                      include_once "{$classe}.php";
             } else {
                     echo "O arquivo {$classe}.php da classe {$classe} não foi encontrado";
             }
   }
        
        $grupo = new Grupo($nome_grupo,$usuario_email);
        $persistenciaGrupo = new DaoGrupo();
        
        if($persistenciaGrupo->create($grupo)){
             ?> <script>
					alert("Grupo inserido com sucesso!");
					window.location.href = "telaGrupo.php";
					

             	</script>
             <?php  
        }
?>
</body>
</html>