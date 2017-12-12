
<?php
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:inicial.php');
}

$logado = $_SESSION['login'];
    
try {
    
    $conn = new PDO('mysql:host=localhost;port=3307;dbname=agenda_familiar', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT nome_grupo,cod_grupo FROM grupocontato where usuario_email='$logado'";
    $data = $conn->query($sql);
    
    ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>	
		
			
			<title>Grupo</title>
		
			
            <!--Import Google Icon Font-->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
            <!--Import jQuery before materialize.js-->
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <!-- Compiled and minified CSS -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

            <!-- Compiled and minified JavaScript -->
			<script	src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
            <!--Let browser know website is optimized for mobile-->
			<meta charset="utf-8">
            <style>
               /* label color */
               .input-field label {
                 color:#ff7043;
               }
               /* label focus color */
               .input-field input[type=text]:focus + label {
                 color: #ff7043;
               }
               /* label underline focus color */
               .input-field input[type=text]:focus {
                 border-bottom: 1px solid #ff7043;
                 box-shadow: 0 1px 0 0 #ff7043;
               }
               /* valid color */
               .input-field input[type=text].valid {
                 border-bottom: 1px solid #ff7043;
                 box-shadow: 0 1px 0 0 #ff7043;
               }
               /* invalid color */
               .input-field input[type=text].invalid {
                 border-bottom: 1px solid #ff7043;
                 box-shadow: 0 1px 0 0 #ff7043;
               }
              
            
            
            </style>

            <script>
            			$(document).ready(function() {
            				 $(".button-collapse").sideNav();
            				 $(".modal").modal();

            				
            			});
	
            </script>


</head>

<body>

	<nav>
		<div class="nav-wrapper deep-orange lighten-1">
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i
				class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="sass.html">Perfil</a></li>										
				<li><a href="usuario.php">Eventos</a></li>
				<li class="active"><a href="#">Grupos de Contato</a></li>
				<li><a href="sair.php">Sair</a></li>
			</ul>
			<ul class="side-nav " id="mobile-demo">
				<li><a href="sass.html">Perfil</a></li>
				<li><a href="usuario.php">Eventos</a></li>
				<li class="active"><a href="#">Grupos de Contato</a></li>
				<li><a href="sair.php">Sair</a></li>
			</ul>
		</div>
	</nav>
	
	
    

	<div class="container">
		<br><br>
		<!-- Modal Trigger -->
		<a class="waves-effect waves-light btn modal-trigger deep-orange lighten-1" href="#modalnovo">NOVO GRUPO</a>

		<!-- Modal Structure -->
		<div id="modalnovo" class="modal">
			<div class="modal-content">
				<h4>Novo Grupo</h4>
				<div class="row">
		          	<form class="col s12" method="post" action="salvarGrupo.php">
			            <div class="row">
			               <div class="input-field col s12">
					         <input name="nome_grupo" type="text" class="validate"
					         maxlength="100">
         					 <label for="nome_grupo">Nome do Grupo</label>
       
					        </div>
					     </div>
						          <input type="hidden" value="<?php print $logado?>" name="usuario_email">
						   <div class="modal-footer">
            				<input type="submit" value="Salvar" class="modal-action modal-close waves-effect waves-green btn-flat">
            			</div>     
		          	</form>
		        </div>
			</div>
			
		</div>
		
		</div>
<?php 
		while ($row = $data->fetch()) {
		    ?>
	  <div class="container ">
          
	

		<ul class="collapsible" data-collapsible="accordion">
			<li> 
				<div class="collapsible-header">
					<i class="material-icons">place</i> 
					<?php print $row[0]; ?>
					
					<div align="right" style="width: 100%">
    					 <i class="small material-icons modal-trigger" href="#modalatualizar">border_color</i>
    					 <i class="small material-icons modal-trigger" href="#modalexcluir">delete</i>
					 </div>
				</div>
				<div class="collapsible-body">

				</div>
			</li>
		</ul>
	</div>


 
</body>
        
          <!-- Modal Structure -->
          <div id="modalexcluir" class="modal">
            <div class="modal-content">
            
              	<h4>Remover</h4>
              <form action="excluirGrupo.php" method="post">
              	<p>Você tem certeza que deseja remover?</p>
				<input type="hidden" value="<?php print $row[1];?>" name="cod_grupo">
            
                <div class="modal-footer">
               	  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Não</a>
                  <input type="submit" value="Sim" class="modal-action modal-close waves-effect waves-green btn-flat ">
                </div>
            </form>
            </div>
          </div>

			<!-- Modal Structure -->
		<div id="modalatualizar" class="modal">
			<div class="modal-content">
				<h4>Editar Grupo</h4>
				<div class="row">
				
		          	<form class="col s12" method="post" action="atualizarGrupo.php">
			            <div class="row">
			               <div class="input-field col s12">
					         <input name="nome_evento" type="text" value="<?php print $row[0]?>"
					         maxlength="100" class="validate">

         					 <label for="nome_evento">Nome do Grupo</label>
       
					        </div>
					     </div>
					   		
					   		<input type="hidden" value="<?php print $logado?>" name="usuario_email">
					   		<input type="hidden" value="<?php print $row[1]?>" name="cod_grupo">
					   		
	
						   <div class="modal-footer">
            				<input type="submit" value="Salvar" class="modal-action modal-close waves-effect waves-green btn-flat">
            			</div>     
		          	</form>
		        </div>
			</div>
		
		</div>



</html>
<?php

    }
} catch (PDOException $e) {
    print $e->getMessage();
}

?>