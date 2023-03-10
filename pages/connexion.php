<?php 

require('./basededonnees.php');

    $login = $_POST['login'];
    $pwd = $_POST['pwd'];
    $fonction = $_POST['fonction'];

    if($fonction == 'invite'){
        $req = $BaseDeDonnee->query(" SELECT id FROM USAGER WHERE email = '$login' AND mot_passe = '$pwd'");
        $reqcount = $BaseDeDonnee->query(" SELECT COUNT(*)  as FROM USAGER WHERE email = '$login' AND mot_passe = '$pwd'");
     
    }
    elseif($fonction == 'admin'){
        $req = $BaseDeDonnee->query(" SELECT id FROM ADMINISTRATEUR WHERE email = '$login' AND mot_passe = '$pwd'");
        $result = $req->fetch();
        session_start();
        $_SESSION['id'] = $result['id'];
        header("location:admin.php");       
   

    }
    else{
        $req = $BaseDeDonnee->query(" SELECT id FROM EMPLOYE WHERE email = '$login' AND mot_passe = '$pwd'");
        $reqcount = $BaseDeDonnee->query(" SELECT COUNT(*)  as FROM EMPLOYE WHERE email = '$login' AND mot_passe = '$pwd'");
   

    }
   

        
?>
