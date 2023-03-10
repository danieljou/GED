<?php 
require("basededonnees.php");
$id = $_GET['docid'];
$req = $BaseDeDonnee->query("DELETE FROM REPERTOIRE WHERE id = '$id'");
header("location:archivage.php");






?>