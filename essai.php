<?php
require_once("db.php");
session_start();

if (isset($_SESSION["Droit"]) AND $_SESSION["Droit"] == 1) {
// recuperation des variable du formulaire
$conn;
$ID_nom =  mysqli_real_escape_string($conn ,$_POST['Name_game']);
$ID_prix = $_POST['Prix_game'];
$ID_desc = mysqli_real_escape_string($conn ,$_POST['Description_game']);
$ID_stock = $_POST['Stock_game'];
$ID_date = mysqli_real_escape_string($conn ,$_POST['dates_game']);
$ID_ref = mysqli_real_escape_string($conn ,$_POST['Reference_game']);
$ID_genre = $_POST['genre'];
$Nom_editeur =  mysqli_real_escape_string($conn,$_POST['Editeur']);
$Plateforme = mysqli_real_escape_string($conn,$_POST['Plateforme']);

// requete table de l'image
$cover = $_FILES["Image_game"]["name"];
$sql1 ="INSERT INTO cover (`ID`, `Cover`) VALUES (NULL, 'Cover/$cover'); ";
$result1 = mysqli_query($conn,$sql1);
$sql2 = "SELECT LAST_INSERT_ID() FROM cover";
$result2 = mysqli_query($conn,$sql2);
$row = mysqli_fetch_array($result2);
$ID_cover = $row["LAST_INSERT_ID()"];

 // Vérifie si le fichier a été uploadé sans erreur.
 if (isset($_FILES["Image_game"])) {
        $filename = $_FILES["Image_game"]["name"];
        // Vérifie si le fichier existe avant de le télécharger.
        if (file_exists("Cover/" . $_FILES["Image_game"]["name"])) {
            echo $_FILES["Image_game"]["name"] . " existe déjà.";
        } else {
            move_uploaded_file($_FILES["Image_game"]["tmp_name"], "Cover/" . $_FILES["Image_game"]["name"]);
            echo "Votre fichier a été téléchargé avec succès.";
        }
    } else {
        echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer." ;
    }

// Editeur on regarde si il existe deja 
$sql3 ="SELECT ID,Nom FROM `editeur` WHERE Nom = '$Nom_editeur'";
$result3 = mysqli_query($conn,$sql3);
$row3 = mysqli_fetch_array($result3);
$row_cnt = mysqli_num_rows($result3);
if ($row_cnt == 0){
$sql4 ="INSERT INTO editeur (`ID`, `Nom`) VALUES (NULL, '$Nom_editeur'); ";
$result4 = mysqli_query($conn,$sql4);
$sql4 = "SELECT LAST_INSERT_ID() FROM editeur";
$result4 = mysqli_query($conn,$sql4);
$row4 = mysqli_fetch_array($result4);
$ID_editeur = $row4["LAST_INSERT_ID()"];
}
else { $ID_editeur = $row3["ID"];
}


if(isset($_POST["Windows"])){
$Plateforme = $_POST["Windows"];
$sql = "INSERT INTO jeuxpc (ID, Reference, Nom, Prix, Description, Editeur, Stock, Datesortie, Genre, Cover ,Plateforme) VALUES (NULL,'$ID_ref','$ID_nom', $ID_prix,'$ID_desc',$ID_editeur,$ID_stock,'$ID_date',$ID_genre,$ID_cover,'$Plateforme')";
                        $result = mysqli_query($conn,$sql);
}

if(isset($_POST["MacOS"])){
    $Plateforme = $_POST["MacOS"];
    $sql = "INSERT INTO jeuxpc (ID, Reference, Nom, Prix, Description, Editeur, Stock, Datesortie, Genre, Cover ,Plateforme) VALUES (NULL,'$ID_ref','$ID_nom', $ID_prix,'$ID_desc',$ID_editeur,$ID_stock,'$ID_date',$ID_genre,$ID_cover,'$Plateforme')";
                            $result = mysqli_query($conn,$sql);
    }

    if(isset($_POST["Linux"])){
        $Plateforme = $_POST["Linux"];
        $sql = "INSERT INTO jeuxpc (ID, Reference, Nom, Prix, Description, Editeur, Stock, Datesortie, Genre, Cover ,Plateforme) VALUES (NULL,'$ID_ref','$ID_nom', $ID_prix,'$ID_desc',$ID_editeur,$ID_stock,'$ID_date',$ID_genre,$ID_cover,'$Plateforme')";
                                $result = mysqli_query($conn,$sql);
        }

        if(isset($_POST["Xbox360"])){
            $Plateforme = $_POST["Xbox360"];
            $sql = "INSERT INTO jeuxpc (ID, Reference, Nom, Prix, Description, Editeur, Stock, Datesortie, Genre, Cover ,Plateforme) VALUES (NULL,'$ID_ref','$ID_nom', $ID_prix,'$ID_desc',$ID_editeur,$ID_stock,'$ID_date',$ID_genre,$ID_cover,'$Plateforme')";
                                    $result = mysqli_query($conn,$sql);
            }

            if(isset($_POST["XboxOne"])){
                $Plateforme = $_POST["XboxOne"];
                $sql = "INSERT INTO jeuxpc (ID, Reference, Nom, Prix, Description, Editeur, Stock, Datesortie, Genre, Cover ,Plateforme) VALUES (NULL,'$ID_ref','$ID_nom', $ID_prix,'$ID_desc',$ID_editeur,$ID_stock,'$ID_date',$ID_genre,$ID_cover,'$Plateforme')";
                                        $result = mysqli_query($conn,$sql);
                }

                if(isset($_POST["XboxSeries"])){
                    $Plateforme = $_POST["XboxSeries"];
                    $sql = "INSERT INTO jeuxpc (ID, Reference, Nom, Prix, Description, Editeur, Stock, Datesortie, Genre, Cover ,Plateforme) VALUES (NULL,'$ID_ref','$ID_nom', $ID_prix,'$ID_desc',$ID_editeur,$ID_stock,'$ID_date',$ID_genre,$ID_cover,'$Plateforme')";
                                            $result = mysqli_query($conn,$sql);
                    }

                    if(isset($_POST["PS3"])){
                        $Plateforme = $_POST["PS3"];
                        $sql = "INSERT INTO jeuxpc (ID, Reference, Nom, Prix, Description, Editeur, Stock, Datesortie, Genre, Cover ,Plateforme) VALUES (NULL,'$ID_ref','$ID_nom', $ID_prix,'$ID_desc',$ID_editeur,$ID_stock,'$ID_date',$ID_genre,$ID_cover,'$Plateforme')";
                                                $result = mysqli_query($conn,$sql);
                        }
            
                        if(isset($_POST["PS4"])){
                            $Plateforme = $_POST["PS4"];
                            $sql = "INSERT INTO jeuxpc (ID, Reference, Nom, Prix, Description, Editeur, Stock, Datesortie, Genre, Cover ,Plateforme) VALUES (NULL,'$ID_ref','$ID_nom', $ID_prix,'$ID_desc',$ID_editeur,$ID_stock,'$ID_date',$ID_genre,$ID_cover,'$Plateforme')";
                                                    $result = mysqli_query($conn,$sql);
                            }
                            if(isset($_POST["PS5"])){
                                $Plateforme = $_POST["PS5"];
                                $sql = "INSERT INTO jeuxpc (ID, Reference, Nom, Prix, Description, Editeur, Stock, Datesortie, Genre, Cover ,Plateforme) VALUES (NULL,'$ID_ref','$ID_nom', $ID_prix,'$ID_desc',$ID_editeur,$ID_stock,'$ID_date',$ID_genre,$ID_cover,'$Plateforme')";
                                                        $result = mysqli_query($conn,$sql);
                                }
                                if(isset($_POST["Switch"])){
                                    $Plateforme = $_POST["Switch"];
                                    $sql = "INSERT INTO jeuxpc (ID, Reference, Nom, Prix, Description, Editeur, Stock, Datesortie, Genre, Cover ,Plateforme) VALUES (NULL,'$ID_ref','$ID_nom', $ID_prix,'$ID_desc',$ID_editeur,$ID_stock,'$ID_date',$ID_genre,$ID_cover,'$Plateforme')";
                                                            $result = mysqli_query($conn,$sql);
                                    }
                                    if(isset($_POST["Wii"])){
                                        $Plateforme = $_POST["Wii"];
                                        $sql = "INSERT INTO jeuxpc (ID, Reference, Nom, Prix, Description, Editeur, Stock, Datesortie, Genre, Cover ,Plateforme) VALUES (NULL,'$ID_ref','$ID_nom', $ID_prix,'$ID_desc',$ID_editeur,$ID_stock,'$ID_date',$ID_genre,$ID_cover,'$Plateforme')";
                                                                $result = mysqli_query($conn,$sql);
                                        }
                                        if(isset($_POST["Wii_U"])){
                                            $Plateforme = $_POST["Wii_U"];
                                            $sql = "INSERT INTO jeuxpc (ID, Reference, Nom, Prix, Description, Editeur, Stock, Datesortie, Genre, Cover ,Plateforme) VALUES (NULL,'$ID_ref','$ID_nom', $ID_prix,'$ID_desc',$ID_editeur,$ID_stock,'$ID_date',$ID_genre,$ID_cover,'$Plateforme')";
                                                                    $result = mysqli_query($conn,$sql);
                                            }
                        header("location: list_game.php");
        }else  {header("location: index.php");}
