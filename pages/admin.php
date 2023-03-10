<?php 

    session_start();
    if(!isset($_SESSION['id'])){
        header("location:login.php");
    }

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
        <hr>
        <h1 class="stats"> Statistisques </h1>

        <div class="elements">
            <div class="nom">
                Nombres d'utilisateurs de la platesforme
            </div>

            <div class="valeur">
                200
            </div>
        </div>


        <div class=" elements ">
            <div class="nom">
                Nombre de document présents sur la plateforme
            </div>
            
            <div class="valeur">
                750
            </div>

        </div>
    </section>
</body>
</html>