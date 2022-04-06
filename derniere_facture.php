<?php
require_once("db.php");
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>CityGame</title>
    <meta charset="utf8" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />
    <link href="CSS\lestyle.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="Imgfont/logo.png" />

    <style>

    </style>

    <script type="text/javascript">


    </script>
</head>

<body class = "corp">
<!-- header -->
<?php
require_once("header.php");
?>

<!--corps de la page -->

<?php
// recuperation des info session ID et de l'ID de la facture
        $ID = $_SESSION["ID"];
        $ID_fac = $_GET["FACid"];
        
        // affichage des données utilisateur pour l'entete de la facture
            $sql = "SELECT iu.Nom,iu.Prénom,iu.Num_tel,iu.Addresse,iu.Code_postal,iu.Ville,u.Email FROM info_users iu JOIN users u ON u.ID = iu.ID_user WHERE `ID_user` = $ID";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
        ?>
<div class ='A4'>

    <div>
        <img src='ImgFont\logo_base.png' class =' placeLogoFacture'>
    </div>

    <div class ='infosSite'>
        <table>
            <tr>
                <td>
                    Adresse : 25 Rue Claude Tillier, 75012 Paris
                </td>
            </tr>
            <tr>
                <td>
                    E-mail : nicolas.chalumeau78@gmail.com
                </td>
            </tr>
            <tr>
                <td>
                    Numéro de tèl : 07.70.76.33.04
                </td>
            </tr>
            <tr>
                <td>
                    Créateur : TARRANNE Lucas </br>CHALUMEAU Nicolas
                </td>
            </tr>

        </table>
    </div>

    <div class ='presCityGame'>
        <U>CityGame : Site Marchand Spécialisé dans la vente de Jeux Vidéo</U>
    </div>
<?php
    // on affiche les info du client
?>
    <div class ='infosClient'>
        <table>
            <tr>
                <td>
                    Nom / Prénom : <?php echo $row['Nom'] ." " ;echo  $row['Prénom'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    E-mail : <?php echo $row['Email'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Numéro de tèl : <?php echo $row['Num_tel'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Adresse : <?php echo $row['Addresse']." "; echo $row['Ville']." "; echo $row['Code_postal'] ?>
                </td>
            </tr>

        </table>
    </div>

    <div class = 'confirmationCommande'> <h2><b><u>Confirmation de votre commande n° <?php echo $ID_fac?> </u></b></h2></div>

<?php
// on recupere le nombre de produit factured via l'id de la facture et créer un compteur d'affichage 
$sql9 = "SELECT COUNT(*) AS ID_prod FROM factured WHERE ID_fac =  $ID_fac";
$result9 = mysqli_query($conn, $sql9);
$row9 = mysqli_fetch_array($result9);
$conteur = $row9["ID_prod"];
// puis on les select afin de les afficher 
$sql2 = "SELECT f.ID_fac, f.ID_prod ,jp.Nom,jp.Prix,f.Quantit FROM factured f JOIN jeuxpc jp ON f.ID_prod = jp.ID  WHERE f.ID_fac = $ID_fac ";
        $result2 = mysqli_query($conn, $sql2);
$sql10 ="SELECT f.ID_fac, f.ID_prod ,jp.Nom,jp.Prix,f.Quantit,ROUND (SUM(jp.Prix * f.Quantit),2) AS Prixtotal FROM factured f JOIN jeuxpc jp ON f.ID_prod = jp.ID  WHERE f.ID_fac = $ID_fac";
$result10 = mysqli_query($conn, $sql10);
$row10 = mysqli_fetch_array($result10);

        echo "<table border='1px'><thead>
        <tr>
            <th>Nom</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Livraison</th>
            <th>Total</th>
        </tr>
    </thead>";

// affichage des données factured via l'id facture
        for ($i = 0; $i < $conteur; $i++) {
           $row2 = mysqli_fetch_array($result2);
                echo"
                
                <tr>
                    <td>" . $row2["Nom"] . "</td>
                    <td class ='prixPanier'>" . $row2["Prix"] . '€' . "</td>
                    <td>" . $row2['Quantit']."</td>
                    <td>" . $row['Email']."</td>
                </tr>";

        }echo "<td colspan='4'>Total payer : </td> <td>".$row10["Prixtotal"]. '€' ."</td></tbody></table>";

?>





    </div>
</div>

<!--footer -->
<?php

?>


</body>



</html>