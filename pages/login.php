<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/login.css">
    <script src="../css/bootstrap/js/bootstrap.js"></script>
</head>
<body>

    <?php 
    require("./header.php");

    ?>
    
    
    <div class="formulaire">
        <form action="connexion.php" method = "post">
            <div class="item group-form">
                <label for="login" class="group-form">Adresse mail</label>
                <br>
                <br>
                <input type="email" name="login" id="" class="form-control" placeholder="Entrer votre addresse mail" required>
            </div>

            <br> <br>
            <div class="item group-form">
                <label for="login" class="group-form">Mot De Passe</label>
                <br>
                <br>
                <input type="password" name="pwd" id="" class="form-control" placeholder="Entrer votre Mot De Passe" required>
            </div>
            <br>
            <br>
            <div class="item group-form">
                <label for="login" class="group-form">Fonction</label>
                <br>
                <br>
                <select name="fonction" id="" class="item form-select" required>
                    <option value="invite"> Invite</option>
                    <option value="admin"> Administrateur</option>
                    <option value="employe"> Employé</option>
                </select>
            </div>
            <br> <br>
            <input type="submit" value="connexion" class="btn btn-success">
        </form>
    </div>
    
</body>
</html>