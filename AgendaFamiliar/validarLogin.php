<html>
<head>
	<meta charset="utf-8">

</head>
<body>

<?php
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['email'];
$senha = $_POST['password'];


try {
    
    $conn = new PDO('mysql:host=localhost;port=3307;dbname=agenda_familiar', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT * FROM usuario WHERE email='$login' and senha='$senha'";
    $data = $conn->query($sql);
    
    
    
    if( $data->fetch() > 0 ) {
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        
       ?>
       
       <script>
       		window.location.href = "usuario.php";
    	</script>
      
       <?php
        
    } else {
        unset ($_SESSION['login']);
        unset ($_SESSION['senha']);
    ?> 
    	<script>
    		alert('Email e senha inválidos');
    		window.location.href = "inicial.php";
    	</script>
    <?php 
    
        
    } 
   

} catch (PDOException $e) {
    print $e->getMessage();
}

?>
   


</body>
</html>
