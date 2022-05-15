<?php
session_start();
if(!isset($_SESSION["user"])){
    $_SESSION["erreur"]="Vous n'avez pas le droit d'accéder!";
    $_SESSION["type"]="danger";
    header("location:connexion.php");
}

?>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap4/css//bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            include_once("top.php");
            ?>
        </div>
        <div class="row">
            <?php
            include_once("middle.php");
            ?>
        </div>


        <div class="row">
            <?php
            include_once("left.php");
            ?>




            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        Liste des livres
                    </div>
                    <div class="card-body">
                    
                    <form action="add.php" method="get">
                        <div class="form-group">
                            <label>Titre</label>
                            <input type="text" class="form-control" name="titre">
                            <label>Quantite</label>
                            <input type="text" class="form-control" name="qte">
                        </div>
                        <div class="form_group">
                            <input class="btn btn-primary" type="submit" value="Ajouter">
                        </div>
                    </form>
               
            </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>