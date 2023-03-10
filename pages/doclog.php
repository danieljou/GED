<?php 

    session_start();
    if(!isset($_SESSION['id'])){
        header("location:login.php");
    }
    require("./basededonnees.php");
    $repertoire = $BaseDeDonnee->query("SELECT * FROM REPERTOIRE");
    $document = $BaseDeDonnee->query("SELECT * FROM DOCUMENTATION_LOGICIELLE");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WIN - GED  | Gestion de la documentation logicielle </title>
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
                Visualiser les differents documents
            </div>

            <div class="item folder" id="folder">
                Visualiser les differents documents
            </div>

            <div class="item nouveau" id="nouveau">
                Importer un document
            </div>


            <a href="#"class="btn btn-primary btn-lg border-dark "  data-toogle="modal" data-target="MyModal">
                Importer un document
            </a>
        </div>

        <div class="modal fade" id="MyModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modaltitle"
                            Titre de la modale
                        </div>
                        <button type="button" class="close" data-dismiss="modal"> x </button>
                    </div>

                    <div class="modal-body">
                    <form action="ajoutDocLo.php" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    
                                    <br>
                                    <br>
                                    <label for="nom"> Choisir le document</label>
                                    <div class="col-md-5">
                                        <input type="file" name="file" id="" class="form-control col-md-7" required>
                                    </div>
                                    <br>
                                    <br>


                                <div class="form-group">
                                <label for="nom">Enter le nom d'indexation du document</label>
                                    <div class="col-md-5">
                                        <input type="text" name="nom" id="" class="form-control col-md-7" required>
                                    </div>

                                    <br>
                                        <br>
                                </div>    
   
                            
                            Choisir de repertoire 
                                    <br>
                                    <br>

    <select name="rep" id="" class="form-select col-md-7" required>
                                    <?php 
                                        while ($i = $repertoire->fetch()) {

                                            ?>
                                                <option value="<?php echo $i['id'];?>"> <?php  echo $i['nom'];?></option>
                                            <?php
                                            # code...
                                        }

                                    ?>
                                    

                                </select>

                                <br>
                                <br>
                                <input type="submit"  class = "btn btn-success" value="Importer">
                                
                            </div>
                            </form>  
                             </div>


                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

        <div class="sectiondroite col-md-8">
            <div class="repertoire" id='repertoire'>
                <h2>  Liste de Document</h2>
               
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
                                <div class="btn btn-primary" onclick="window.location.href='<?php echo $doc['emplacement']?>'">
                                    Consulter
                                </div>

                                <div class="btn btn-danger" onclick="window.location.href='deldoc.php?docid=<?php echo $doc['id']?>'" >
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
                <h2> Importer Un document </h2>
                <form action="ajoutDocLo.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        
                        <br>
                        <br>
                        <label for="nom"> Choisir le document</label>
                        <div class="col-md-5">
                            <input type="file" name="file" id="" class="form-control col-md-7" required>
                        </div>
                        <br>
                        <br>


                       <div class="form-group">
                       <label for="nom">Enter le nom d'indexation du document</label>
                        <div class="col-md-5">
                            <input type="text" name="nom" id="" class="form-control col-md-7" required>
                        </div>

                        <br>
                            <br>
                       </div>    
                       
                       
                       Choisir de repertoire 
                            <br>
                            <br>

                        <select name="rep" id="" class="form-select col-md-7" required>
                            <?php 
                                while ($i = $repertoire->fetch()) {

                                    ?>
                                        <option value="<?php echo $i['id'];?>"> <?php  echo $i['nom'];?></option>
                                    <?php
                                    # code...
                                }

                            ?>
                            
                    
                        </select>

                        <br>
                        <br>
                        <input type="submit"  class = "btn btn-success" value="Importer">
                        
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
    <script src="../css/bootstrap/js/bootstrap.js"></script>
</body>
</html>