 <!DOCTYPE html>
  <html>
    <head>
    </head>
    <body>


<?php
    


    $nome_evento = $_POST['nome_evento'];
    $local_evento = $_POST['local_evento'];
    $dataIni = $_POST['dataini'];
    $horaIni = $_POST['horaini'];
    $dataFim = $_POST['datafim'];
    $horaFim = $_POST['horafim'];
    $descricao = $_POST['descricao'];
    $usuarioEmail = $_POST['usuario_email'];

    
    
    function __autoload( $classe ){
           
            if(file_exists( "{$classe}.php" )) {
                      include_once "{$classe}.php";
             } else {
                     echo "O arquivo {$classe}.php da classe {$classe} não foi encontrado";
             }
   }
        $evento = new Evento($nome_evento, $local_evento, $descricao, $dataIni, $dataFim, $horaIni, $horaFim, $usuarioEmail);
        
        $persistenciaEvento = new DaoEvento();
        
        if($persistenciaEvento->create($evento)){
             ?> <script>
					alert("Evento inserido com sucesso!");
					window.location.href = "usuario.php";
					

             	</script>
             <?php  
        }
?>
</body>
</html>