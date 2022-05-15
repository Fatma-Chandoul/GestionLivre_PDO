<?php
session_start();
if (!isset($_SESSION["user"])) {
    $_SESSION["erreur"] = "Vous n'avez pas le droit d'accéder!";
    $_SESSION["type"] = "danger";
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
                        Réserver des livres
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION["message"])) {
                            echo "<div class='alert alert-{$_SESSION["type"]}'>";
                            echo $_SESSION["message"];
                            echo "</div>";
                            unset($_SESSION["message"]);
                        }
                        ?>

                        <form action="addR.php" method="get">
                            <div class="form-group">
                                <label>Livre:</label>
                                <select class="form-control" name="livre">
                                    <?php
                                    require_once("functions.php");
                                    $livres = getAllLivre();
                                    foreach ($livres as $k => $v) {
                                        echo "<option value='{$v->id}'>{$v->titre}</option>";
                                    }

                                    ?>
                                </select>
                                <label>date de début:</label>
                                <input type="date" class="form-control" name="d1">
                                <label>date de fin:</label>
                                <input type="date" class="form-control" name="d2">
                            </div>
                            <div class="form_group">
                                <input class="btn btn-primary" type="submit" value="Réserver">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>