<?php


?> 
 <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <!-- Compiled and minified CSS -->
  	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
      	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      
    
          
 
    </head>

    <body>
    	<div class="container center-align">
    	
    			<div class="col s12 l12">
    				<div class="row">
    						<img src="logo.png" class="img-responsive"> 
    						   	
    			</div>
    		</div>
    	
    			
    
          <form class="col s12" method="post" action="validarLogin.php">
           
            <div class='row'>
              <div class='input-field col s12'>
                <input  type='text' name='email' id='email'style="border-bottom: 2px solid  #ff7043"/>
                <label for='email'>E-mail:</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input  type='password' name='password' id='password' style="border-bottom: 2px solid #ff7043" />
                <label for='password'>Senha:</label>
              </div>
           </div>
                 
         
                       			 <input type="submit" style="width: 100%;background-color:#ff7043 " 
                       			 class="btn waves-effect waves-light" value="Login">
                                    	
                                 
                                 <br><br>
                                 <a href="criarconta.php" style="color:#ff7043">Sou novo. Quero criar uma conta</a>
                       
                       <br> <br>
                   
                </form>        	
           </div>            
          
    		
    		
    		
    	
    
      
      </body>
  </html>