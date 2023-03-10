<?php 
require("basededonnees.php");
$id = $_GET['docid'];

$recupRepertoire = $BaseDeDonnee->query("SELECT repertoire FROM DOCUMENTATION_LOGICIELLE WHERE id = '$id'");
$val = $recupRepertoire->fetch();

$req = $BaseDeDonnee->query("DELETE FROM DOCUMENTATION_LOGICIELLE WHERE id = '$id'");



$rep = $val['repertoire'];

$getElement = $BaseDeDonnee->query("SELECT nbr_document FROM REPERTOIRE WHERE id = '$rep'");
$repEl = $getElement->fetch();
$el = $repEl['nbr_document'];
$el = $el - 1;
$update = $BaseDeDonnee->query("UPDATE REPERTOIRE  SET nbr_document = '$el' wHERE id = '$rep'");
if($_GET['repid'] != NULL ){
    header("location:gererrep.php?docid=$id");
}
else{
    header("location:doclog.php");
}






?>