<?php
session_start();
require_once("functions.php");
$cnx=getConnexion();
$email=$_POST["email"];
$pass=$_POST["pass"];
$req=$cnx->prepare("select * from user where email=?");
$exist=0;
$req ->bindParam(1,$email);
$req->execute();
$req->setFetchMode(PDO::FETCH_OBJ);
while($d=$req ->fetch()){
    if (password_verify($pass,$d->password)){
        $_SESSION["user"]=$d->nom;
        $_SESSION["id_user"]=$d->id;
        $da=date("d-m-Y H:i:s");
        $req2=$cnx->prepare("update user SET date_access=? where id=?");
        $req2->bindParam(1,$da);
        $req2->bindParam(1,$d->id);
        $req2->execute();
        $exist=1;
    }
}
if ($exist==0){
    $_SESSION["erreur"]="verifier Mr/Mlle votre email ou mot de passe!!";
    $_SESSION["type"]="warning";
    header("location:connexion.php");
}else{
    header("location:accueil.php");  
}
?>       