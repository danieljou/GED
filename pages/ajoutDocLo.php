<?php 

    require("basededonnees.php");


   
    $file = rand(1000,100000,)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $folder ="../documents/";

    $new_file_name = strtolower($file);
    $final = str_replace('','-',$new_file_name);
    
    $emp = $folder.$final;


    $nom = $_POST['nom'];
    $rep = $_POST['rep'];
    $getElement = $BaseDeDonnee->query("SELECT nbr_document FROM REPERTOIRE WHERE id = '$rep'");
    $repEl = $getElement->fetch();
    $el = $repEl['nbr_document'];
    $el = $el + 1;
    $update = $BaseDeDonnee->query("UPDATE REPERTOIRE  SET nbr_document = '$el' wHERE id = '$rep'");


    if(move_uploaded_file($file_loc,$folder.$final)){
        move_uploaded_file($file_loc,$folder.$final);
        $req = $BaseDeDonnee->query("INSERT INTO DOCUMENTATION_LOGICIELLE (nom, emplacement, taille,repertoire) VALUES ('$nom','$emp','$file_size','$rep') ");

    }
    header("location:doclog.php");
?>