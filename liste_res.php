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
                        Liste des réservations
                    </div>
                    <div class="card-body">
                        <a class="btn btn-danger mb-2" href="reserver.php">Réserver un livre</a>
                        <br>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Livre</th>
                                    <th>user</th>
                                    <th>Date_début</th>
                                    <th>Date_Fin</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once("functions.php");
                                $res = getAllReservation();
                                foreach ($res as $k => $v) {
                                    echo "<tr>";
                                    echo "<td>" . $v->id . "</td>";
                                    echo "<td>" . $v->livre . "</td>";
                                    echo "<td>" . $v->nom . "</td>";
                                    echo "<td>" . $v->date_debut . "</td>";
                                    echo "<td>" . $v->date_fin . "</td>";
                                    echo "<td><a class='btn btn-danger' href='delR.php?id={$v->id}'>Supprimer</a></td>";
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