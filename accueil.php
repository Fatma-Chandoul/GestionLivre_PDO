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
                        Liste des livres
                    </div>
                    <div class="card-body">
                        <a class="btn btn-danger mb-2" href="ajouter.php">Ajouter un livre</a>
                        <br>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Titre</th>
                                    <th>Quantite</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once("functions.php");
                                $prods = getAllLivre();
                                foreach ($prods as $k => $v) {
                                    echo "<tr>";
                                    echo "<td>" . $v->id . "</td>";
                                    echo "<td>" . $v->titre . "</td>";
                                    echo "<td>" . $v->qte . "</td>";
                                    echo "<td><a class='btn btn-danger' href='del.php?id={$v->id}'>Supprimer</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>