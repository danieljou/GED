<?php 

require("./basededonnees.php");
$name = $_POST['nom'];
$nbreEl = 0;

$req = $BaseDeDonnee->query("INSERT INTO  REPERTOIRE (nom,nbr_document) VALUES ('$name','$nbreEl')");
header("location:archivage.php");



?>