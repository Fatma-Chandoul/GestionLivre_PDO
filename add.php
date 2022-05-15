<?php
require_once("functions.php");
$titre=$_GET["titre"];
$qte=$_GET["qte"];
addLivre($titre,$qte);
header("location:accueil.php");
?>
