<?php
session_start();
require_once("functions.php");
$d1=$_GET["d1"];
$d2=$_GET["d2"];
$livre=$_GET["livre"];
//addReservation($livre,$_SESSION,$1,$d2)
$d_debut=date("d-m-Y",strtotime($d1));
$d_fin=date("d-m-Y",strtotime($d2));
$test=verifDispoLivre($livre,$d_debut,$d_fin);
if($test==0){
    addReservation($livre,$_SESSION["id_user"],$d_debut,$d_fin);
    $_SESSION["message"]="Votre résérvation est validée";
    $_SESSION["type"]="info";
    header("location:reserver.php");
}else{
    $_SESSION["message"]="Le livre n'est pas disponible à ces dates";
    $_SESSION["type"]="warning";
    header("location:reserver.php");
}
