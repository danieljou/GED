<?php 

    session_start();
    if(!isset($_SESSION['id'])){
        header("location:login.php");
    }

    $id = $_GET['docid'];
    require("./basededonnees.php");
    $document = $BaseDeDonnee->query("SELECT * FROM DOCUMENTATION_LOGICIELLE WHERE repertoire = '$id'");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WIN - GED  | Administration </title>
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

    <div class="repertoire" id='repertoire'>
                <h2>  Liste de Document de type Dovumentation logicelle appartenant à ce repertoires</h2>
               
                <?php 
                    while ($doc = $document->fetch()) {
                        # code...
                        ?>

                        <div class="rep">
                            <div class="nom2">
                            <?php  echo $doc['nom'];?>
                            </div>

                            <div class="nb">
                                 <?php  echo $doc['taille']  ;?> Ko(s)
                            </div>

                            


                            <div class="opt">
                                <div class="btn btn-primary" >
                                    Consulter
                                </div>

                                <div class="btn btn-danger" onclick="window.location.href='deldoc.php?docid=<?php echo $doc['id']?>?repid=<?php echo $id; ?>'" >
                                    Supprimer
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                
                ?>
                  
            </div>

</body>
</html>