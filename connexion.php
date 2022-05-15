<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
    <title></title>
    <link href="bootstrap4/css/bootstrap.min.css"  rel="stylesheet" >
    <script type="text/javascript" src="bootstrap4/js/jquery.min.js" ></script>
    <script type="text/javascript" src="bootstrap4/js/bootstrap.min.js" ></script>
    <link href="fontawesome/css/all.css" rel="stylesheet">
	
	</head>
    <body>

   <div class="container-fluid ">
   <br><br><br>
    <div class="row mt-2">
      <div class="offset-4 col-4 bg-light border border-primary">
        <h1 style="text-align:center">Bibliothèque@ESSAT</h1>
		<h3 style="text-align:center">Connexion</h3>
        <form action="verif.php" method="post">
              
          	   <div class="form-group">
                <input type="text" class="form-control"  id="username" name="email" value="" placeholder="Email" required="required" />
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
          	  </div>
            	<div class="form-group">
                	<input type="password" class="form-control" id="password" name="pass" placeholder="Password" required="required" />
                	<span class="glyphicon glyphicon-lock form-control-feedback"></span>
            	</div>

              
             <div class="form-row">
               <div class="col">
                 <input type="submit" class="btn btn-primary btn-block mb-1" id="_submit" name="_submit" value="Log in" />
               </div>
              
            </div>
        </form>
        <?php
        if(isset($_SESSION["erreur"])){
            echo"<div class='alert alert-{$_SESSION["type"]}'>";
            echo $_SESSION["erreur"];
            echo "</div>";
            unset($_SESSION["erreur"]);
        }
        ?>
      </div>
      
    </div>
  </div>
  
  
  
</body>
</html>