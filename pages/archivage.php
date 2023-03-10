<?php 

    session_start();
    if(!isset($_SESSION['id'])){
        header("location:login.php");
    }
    require("./basededonnees.php");
    $repertoire = $BaseDeDonnee->query("SELECT * FROM REPERTOIRE");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WIN - GED  | Archivage </title>
    <link rel="shortcut icon" href="../images/6837ba87909803.Y3JvcCwxMjg5LDEwMDgsMzU0LDI0NQ.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/archivage.css">
    

</head>
<body>
<header class="container">
    <div class="title">
        WIN - GED 
    </div>
    <div class="items">

        <div class="item" onclick="window.location.href='archivage.php'">
            Archivage
        </div>
    
        <div class="item">
            Demandes
        </div>
    
        <div class="item" onclick="window.location.href='doclog.php'">
            Documentation logicielle
        </div>
    
        <div class="item">
            Utilisateurs
        </div>
    </div>
    </header>

    <section>
        <div class="sectiongauche col-md-3">
            <div class="item directories dir" id="dir">
                Visualiser les differents repertoires
            </div>

            <div class="item folder" id="folder">
                Visualiser les differents documents
            </div>

            <div class="item nouveau" id="nouveau">
                Créer un repertoires
            </div>
        </div>

        <div class="sectiondroite col-md-8">
            <div class="repertoire" id='repertoire'>
                <h2>  Liste de repertoires</h2>
                <?php 
                    while ($resultRep = $repertoire->fetch()) {
                        # code...
                        ?>

                        <div class="rep">
                            <div class="nom">
                            <?php  echo $resultRep['nom'];?>
                            </div>

                            <div class="nb">
                                 <?php  echo $resultRep['nbr_document'];?> Document(s)
                            </div>
                            <div class="opt">
                                <div class="btn btn-primary" onclick="window.location.href='gererrep.php?docid=<?php echo $resultRep['id']?>'">
                                    Gérer
                                </div>

                                <div class="btn btn-danger" onclick="window.location.href='suprep.php?docid=<?php echo $resultRep['id']?>'" >
                                    Supprimer
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                
                ?>
                   
                  
            </div>
            <div class="document" id='document'>
               document list
            </div>

            <div class="creerrepertoire" id='creerrepertoire'>
                <h2> Création d'un repertoire </h2>
                <form action="ar.php" method="post">

                    <div class="form-group">
                        <br>
                        <br>
                        <label for="nom"> Nom du repertoire</label>
                        <div class="col-md-5">
                            <input type="text" name="nom" id="" class="form-control col-md-7">
                        </div>
                        <br>
                        <br>
                        <input type="submit"  class = "btn btn-success" value="Créer">
                        
                    </div>
                </form>
            </div>
        </div>
        
    </section>
    <script src="../js/archivage.js"></script>
    <script>
        var dir = document.querySelector("#dir")
        var nouveau = document.querySelector("#nouveau")
        var folder = document.querySelector("#folder")

        var repertoire = document.querySelector("#repertoire")
        var documents = document.querySelector("#document")
        var creerrepertoire = document.querySelector("#creerrepertoire")

        dir.onclick=function(){
            repertoire.style.display='block';

            documents.style.display='none';
            creerrepertoire.style.display='none';
        }

        nouveau.onclick=function(){
            creerrepertoire.style.display='block';

            repertoire.style.display='none';
            documents.style.display='none';
            
        }

        folder.onclick=function(){
            documents.style.display='block';

            repertoire.style.display='none';
            creerrepertoire.style.display='none';
        }
    </script>
</body>
</html>