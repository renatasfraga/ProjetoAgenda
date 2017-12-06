<?php

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:inicial.php');
}

$logado = $_SESSION['login'];
    
try {
    
    $conn = new PDO('mysql:host=localhost;port=3307;dbname=agenda_familiar', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT  nome, dt_ini, hr_ini, dt_fim,hr_fim ,local_evento,usuario_email, descricao,cod_evento FROM evento
        WHERE usuario_email='$logado'";
    $data = $conn->query($sql);
    
    ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>	
		
			
			<title>Eventos</title>
		
			
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

            				 $('.datepicker').pickadate({
            					    selectMonths: true, // Creates a dropdown to control month
            					    selectYears: 15, // Creates a dropdown of 15 years to control year,
            					    today: 'Today',
            					    clear: 'Clear',
            					    close: 'Ok',
            					    closeOnSelect: false // Close upon selecting a date,
            				});

            				 $('.timepicker').pickatime({
            				    //default: 'now', // Set default time: 'now', '1:30AM', '16:30'
            				    fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
            				    twelvehour: false, // Use AM/PM or 24-hour format
            				    donetext: 'OK', // text for done-button
            				    cleartext: 'Clear', // text for clear-button
            				    canceltext: 'Cancel', // Text for cancel-button
            				    autoclose: false, // automatic close timepicker
            				    ampmclickable: true, // make AM PM clickable
            				    aftershow: function(){} //Function for after opening timepicker
            				  });
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
				<li class="active"><a href="#">Eventos</a></li>
				<li><a href="telaGrupo.php">Grupos de Contato</a></li>
				<li><a href="sair.php">Sair</a></li>
			</ul>
			<ul class="side-nav " id="mobile-demo">
				<li><a href="sass.html">Perfil</a></li>
				<li class="active"><a href="#">Eventos</a></li>
				<li><a href="telaGrupo.php">Grupos de Contato</a></li>
				<li><a href="sair.php">Sair</a></li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<br><br>
		<!-- Modal Trigger -->
		<a class="waves-effect waves-light btn modal-trigger deep-orange lighten-1" href="#modalnovo">NOVO</a>

		<!-- Modal Structure -->
		<div id="modalnovo" class="modal">
			<div class="modal-content">
				<h4>Novo Evento</h4>
				<div class="row">
		          	<form class="col s12" method="post" action="processa.php">
			            <div class="row">
			               <div class="input-field col s12">
					         <input name="nome_evento" type="text" class="validate">
         					 <label for="nome_evento">Nome do Evento</label>
       
					        </div>
					     </div>
					   

					     <div class="row">
			              	<div class="input-field col s12">
					         		<input name="local_evento" type="text" class="validate">
         					 		<label for="local_evento">Local do Evento</label>
					          </div>
					     </div>
					     
					    
						        <div class="row">
						        	<div class="input-field col s6">
						        		<input type="text" class="datepicker" name="dataini">
						        		<label for="dataini">Data Início</label>
						        		
						        	</div>
						        	<div class="input-field col s6">
						        	   	<input type="text" class="timepicker" name="horaini">
						        	   	<label for="horaini">Hora Início</label>
						        	</div>
						        </div>
						        
						        
						         <div class="row">
						        	<div class="input-field col s6">
						        		<input type="text" class="datepicker" name="datafim">
						        		<label for="datafim">Data Fim</label>
						        		
						        	</div>
						        	<div class="input-field col s6">
						        	   	<input type="text" class="timepicker" name="horafim">
						        	   	<label for="horafim">Hora Fim</label>
						        	</div>
						        </div>
						        
						        <div class="row">
						        	<div class="input-field col s12">
                                       <textarea name="descricao" class="materialize-textarea"></textarea>
                                       <label for="descricao">Detalhes:</label>
                                    </div>
						        
						        </div> 
						          <input type="hidden" value="<?php print $logado ?>" name="usuario_email">
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
					
					<?php print $row[5]. " | ". $row[1]."  ".$row[2]." - ".$row[3]."  ".$row[4]	; ?>
					
					<div align="right" style="width: 100%">
    					 <i class="small material-icons modal-trigger" href="#modalatualizar">border_color</i>
    					 <i class="small material-icons modal-trigger" href="#modalexcluir">delete</i>
					 </div>
				</div>
				<div class="collapsible-body">
					<p><?php  print "Nome:".$row[0]; ?> </p>
					<p><?php  print $row[7]; ?> </p>
					<p><?php  print "Criado por:".$row[6]; ?> </p>
				</div>
			</li>
		</ul>
	</div>


 
</body>
        
          <!-- Modal Structure -->
          <div id="modalexcluir" class="modal">
            <div class="modal-content">
            
              	<h4>Remover</h4>
              <form action="excluirEvento.php" method="post">
              	<p>Você tem certeza que deseja remover?</p>
              	<input type="hidden" value="<?php print $row[8]?>" name="cod_evento">
            
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
				<h4>Novo Evento</h4>
				<div class="row">
				<!--nome, dt_ini, hr_ini, dt_fim,hr_fim ,local_evento,usuario_email, descricao,cod_evento FROM evento';
    -->
		          	<form class="col s12" method="post" action="atualizaEvento.php">
			            <div class="row">
			               <div class="input-field col s12">
					         <input name="nome_evento" type="text" class="validate"
					         value="<?php print $row[0];?>">
         					 <label for="nome_evento">Nome do Evento</label>
       
					        </div>
					     </div>
					   

					     <div class="row">
			              	<div class="input-field col s12">
					         		<input name="local_evento" type="text" class="validate"
					         		value="<?php print $row[5];?>">
         					 		<label for="local_evento">Local do Evento</label>
					          </div>
					     </div>
					     
					    
						        <div class="row">
						        	<div class="input-field col s6">
						        		<input type="text" class="datepicker" name="dataini"
						        		value="<?php print $row[1];?>">
						        		<label for="dataini">Data Início</label>
						        		
						        	</div>
						        	<div class="input-field col s6">
						        	   	<input type="text" class="timepicker" name="horaini"
						        	   	value="<?php print $row[2];?>">
						        	   	<label for="horaini">Hora Início</label>
						        	</div>
						        </div>
						        
						        
						         <div class="row">
						        	<div class="input-field col s6">
						        		<input type="text" class="datepicker" name="datafim"
						        		value="<?php print $row[3];?>">
						        		<label for="datafim">Data Fim</label>
						        		
						        	</div>
						        	<div class="input-field col s6">
						        	   	<input type="text" class="timepicker" name="horafim"
						        	   	value="<?php print $row[4];?>">
						        	   	<label for="horafim">Hora Fim</label>
						        	</div>
						        </div>
						        
						        <div class="row">
						        	<div class="input-field col s12">
                                       <textarea name="descricao" class="materialize-textarea">
                                       <?php print $row[7];?></textarea>
                                       <label for="descricao">Detalhes:</label>
                                    </div>
						        
						        </div> 
						        	<input type="hidden" value="<?php print $row[8];?>" name="cod">
						          <input type="hidden" value="<?php print $row[6];?>" name="usuario_email">
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