<?php

include('cnx.php');
include('fonction.php');

if (isset($_POST['nom'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $matricule = $_POST['matricule'];
    $classe = $_POST['classe'];
    $num = random(5);

    if (!empty($nom) AND !empty($prenom) AND !empty($matricule) AND !empty($classe)) {
        $req=$cnx->prepare("INSERT INTO etudiant SET  nom = ? , prenom = ? , num = ?, classe = ?, matricule = ?");
        $req->execute(array($nom,$prenom,$matricule,$num,$classe));
       header("location:p_annonima.php");
    }
}
?>









<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IAI-CMR</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- =======================================================
    Theme Name: Medilab
    Theme URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!--banner-->
  <section id="banner" class="banner">
    <div class="bg-color">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
             
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Accueil</a></li>
                <li class=""><a href="annonima.php">deconnexion</a></li>
              
                
             
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="row">
          <div class="banner-info">
            <div class="banner-logo text-center">
              <h1 class="white">IAI-CAMEROUN</h1>
            </div>
            <div class="banner-text text-center">
              <h1 class="white">BIENVENUE/WELCOME</h1>
             
              <a href="#contact" class="btn btn-appoint">AJOUTER ETUDIANT.</a>
            </div>
            <div class="overlay-detail text-center">
              <a href="#service"><i class="fa fa-angle-down"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ banner-->
  <!--service-->
  <section id="service" class="section-padding">
    <div class="container">
      <div class="row">
       
        <div class="col-md-12 col-sm-12">
           <h2 class="ser-title">LISTE DES ETUDIANTS</h2>
             <hr class="botm-line">
         
  <?php  if (!empty($erreurs)): ?>

    <div class="alert alert-danger">
      <p>Vous n'avez pas remplile le formulaire correctement !</p>
        <ul>
        <?php foreach ($erreurs as  $erreur): ?>
            <li><?=$erreur; ?></li>

        <?php endforeach; ?>
         </ul>
    </div>

  <?php endif; ?>
   <?php
        
              

   
                       
                       $visite = $cnx->prepare("SELECT * FROM  etudiant  ");
                       $visite->execute(array());
                       $nbr = $visite->rowCount();
                       $visiteParPage = 10;
                       $visiteTotal = $nbr;
                       $pageTotal = ceil($visiteTotal/$visiteParPage);

                       if (isset($_GET['page']) AND !empty($_GET['page']) AND !empty($_GET['page'])>0) {
                          $_GET['page']=intval($_GET['page']);
                          $pagecourante = $_GET['page'];
                       }else{
                          $pagecourante = 1;
                       }

                       $depart = ($pagecourante-1)*$visiteParPage;

                       $visites = $cnx->prepare('SELECT * FROM  etudiant ORDER BY id ASC LIMIT '.$depart .','.$visiteParPage);

                        $visites->execute(array());
                
                        $plus = $pagecourante+1;
                        $moins = $pagecourante -1;

                        if ($moins<1) {
                          $moins=1;
                         } 

                         if ($plus>$pageTotal) {
                           $plus=$pageTotal;
                         }



    
                      
       ?>
        
         <table class="table">

           <thead>
             <tr>
               <td>Nom</td>
               <td>Prenom</td>
               <td>Matricule</td>
               <td>Classe</td>
               <td>Numéro Anonima</td>
             </tr>
           </thead>
           <tbody>
             <?php
                                        while ($vts = $visites->fetch()) {                    
                                 ?>
                                <tr>
                                    <td><?=$vts->nom?></td>
                                    <td><?=$vts->prenom?> </td>
                                    <td><?=$vts->matricule?> </td>
                                    
                                    <td><?=$vts->classe?></td>
                                    <td><?=$vts->num?></td>
                                 
                                  
                                </tr>

                                <?php


                                    }
                                ?>
           </tbody>
             
                             
         </table>
         <div class="custom-pagination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="p_annonima.php?page=<?=$moins ?>">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#"><?=$pagecourante;?></a></li>
                                        <li class="page-item"><a class="page-link" href="#">/</a></li>
                                        <li class="page-item"><a class="page-link" href="#"><?=$pageTotal;?></a></li>
                                        <li class="page-item"><a class="page-link" href="p_annonima.php?page=<?=$plus ?>">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
        </div>
      
      </div>
    </div>
  </section>
  <!--/ service-->

  <!--contact-->
  <section id="contact" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="ser-title">AJOUTER ETUDIANT </h2>
          <hr class="botm-line">
        </div>
       
        <div class="col-md-8 col-sm-8 marb20">
          <div class="contact-info">
            
            <div id="sendmessage">MESSAGE ENVOYER. MERCI!</div>
            <div id="errormessage"></div>
            <form action="" method="POST" role="" class="">
              <div class="form-group">
                <input type="text" name="nom" class="form-control br-radius-zero" id="" placeholder="Nom" />
              </div>
              <div class="form-group">
                <input type="text" name="prenom" class="form-control br-radius-zero" id="" placeholder="Prenom" />
              </div>
               <div class="form-group">
                <input type="text" name="matricule" class="form-control br-radius-zero" id="" placeholder="Matricule" />
              </div>
               <div class="form-group">
                <input type="text" name="classe" class="form-control br-radius-zero" id="" placeholder="Classe" />
              </div>
              

              <div class="form-action">
                <button type="submit" class="btn btn-form">AJOUTER</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ contact-->
  <!--footer-->
  <footer id="footer">
   
    <div class="footer-line">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            © Copyright IAI
           
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ footer-->

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
