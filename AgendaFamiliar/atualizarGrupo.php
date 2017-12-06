 <!DOCTYPE html>
  <html>
    <head>
    </head>
    <body>


<?php
    

    $codGrupo = $_POST['cod_grupo'];
    $nomeGrupo = $_POST['nome_grupo'];
    $usuarioEmail = $_POST['usuario_email'];

    
    
    function __autoload( $classe ){
           
            if(file_exists( "{$classe}.php" )) {
                      include_once "{$classe}.php";
             } else {
                     echo "O arquivo {$classe}.php da classe {$classe} não foi encontrado";
             }
   }
        $grupo = new Grupo($nomeGrupo,$usuarioEmail);
        $grupo->setCodGrupo($codGrupo);
        
        $persistenciaGrupo = new DaoGrupo();
        
        if($persistenciaGrupo->update($grupo)){
             ?> <script>
					alert("Grupo alterado com sucesso!");
					window.location.href = "telaGrupo.php";
					

             	</script>
             <?php  
        }
?>
</body>
</html>