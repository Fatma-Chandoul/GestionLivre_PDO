<?php
function getConnexion()
{
    return new PDO('mysql:host=localhost;dbname=baselivre', 'root', '');
}
function getAllLivre()
{
    $tab = [];
    $cnx = getConnexion();
    $req = $cnx->query(" SELECT * FROM livre ");
    $req->setFetchMode(PDO::FETCH_OBJ);
    while ($ligne = $req->fetch()) {
        $tab[] = $ligne;
    }
    return $tab;
}
function addLivre($titre, $qte)
{
    $cnx = getConnexion();
    $req = $cnx->prepare("insert into livre values (null,?,?,1)");
    $req->bindParam(1, $titre);
    $req->bindParam(2, $qte);
    $req->execute();
}
function deleteLivre($id)
{
    $cnx = getConnexion();
    $req = $cnx->prepare("delete from livre where id=?");

    $req->bindParam(1, $id);
    $req->execute();
}
function getAllReservation()
{
    $tab = [];
    $cnx = getConnexion();
    $req = $cnx->query(" SELECT * FROM reservation,user,livre where reservation.livre=livre.id and reservation.user=user.id ");
    $req->setFetchMode(PDO::FETCH_OBJ);
    while ($ligne = $req->fetch()) {
        $tab[] = $ligne;
    }
    return $tab;
}
function verifDispoLivre($id, $d_d, $d_f)
{
    $cnx = getConnexion();
    $req = $cnx->prepare("select * from reservation where livre=?");
    $req->bindParam(1, $id);
    $req->execute();
    $req->setFetchMode(PDO::FETCH_OBJ);
    $test = 0;
    while ($ligne = $req->fetch()) {
        $d1 = date("d-m-Y", strtotime($ligne->date_debut));
        $d2 = date("d-m-Y", strtotime($ligne->date_fin));
        if (($d2 >= $d_d) && ($d1 <= $d_f)) {
            $test = 1;
        }
    }
    return $test;
}
function addReservation($livre, $user, $d_d, $d_f)
{
    $cnx = getConnexion();
    $req = $cnx->prepare("insert into reservation values (null,?,?,?,?,1)");
    $req->bindParam(1, $livre);
    $req->bindParam(2, $user);
    $req->bindParam(3, $d_d);
    $req->bindParam(4, $d_f);
    $req->execute();

}
