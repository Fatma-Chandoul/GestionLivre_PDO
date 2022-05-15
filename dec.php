<?php
session_start();
unset($_SESSION["user"]);
unset($_SESSION["id_user"]);
$_SESSION["erreur"]="Merci pour votre visite Mr/Mlle";
$_SESSION["type"]="info";
header("location:connexion.php");
