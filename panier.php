

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


<!--corps de la page -->
<?php
require_once("db.php");
session_start();
// test si l'utilisateur est connecter
if (isset($_SESSION["Pseudo"])) {
    require_once("header.php");
//on regarde si l'utilisateur a des items dans la panier
    $sql = "SELECT COUNT(*) AS ID_prod FROM produit_panier WHERE ID_user = " . $_SESSION["ID"] . " AND Etat_vente = 0";
    $result = mysqli_query($conn, $sql);
    $rowa = mysqli_fetch_array($result);
    $conteur = $rowa["ID_prod"];
    //création du tableau
    if ($conteur == 0) {
        echo "<h1 class ='titrePanier'>Votre Panier est vide</h1>";
    } else {
        echo "<h1 class ='titrePanier'>Votre Panier</h1>";
        echo "<table class = 'tablePanier'>
            <thead>
                <tr>
                    <th>Produits</th>
                    <th>Nom</th>
                    <th>Plateforme</th>
                    <th>Quantité</th>
                    <th>Livraison</th>
                    <th>Prix</th>
                </tr>
            </thead>";

        // vas chercher les info sur le panier de l'utilisateur et en fonction du nombre de ligne troubé plus haut on créer une boucle
        $sql1 = "SELECT pp.ID ,pp.ID_user,jp.Nom,pp.ID_prod,jp.Prix, c.Cover,Plateforme,pp.Quantité FROM Produit_panier pp JOIN jeuxpc jp ON pp.ID_prod = jp.ID JOIN cover c ON jp.cover = c.ID WHERE pp.ID_user = " . $_SESSION['ID'] . " AND pp.Etat_vente = 0 ";
        $result1 = mysqli_query($conn, $sql1);
        for ($i = 0; $i < $conteur; $i++) {
            $row = mysqli_fetch_array($result1);
            // affichage des données
            echo
                "<tbody>
                <tr>
                    <td> <img class  ='cover' src = '" . $row["Cover"] . "'></td>
                     <td>" . $row["Nom"] . "</td>
                      <td>" . $row["Plateforme"] . "</td>
                     <td>" . $row["Quantité"] . "</td>
                       <td>Email</td>
                      <td class ='prixPanier'>" . $row["Prix"] . '€' . "</td>
                      <td><a href='remove_panier.php?ID=" . $row["ID"] ."&Q=".$row["Quantité"]." '> <input type='button' value='supprimer'></a></td>
                    </tr>";
        }
        $sql2 ="SELECT pp.ID_user, pp.ID_prod, pp.Etat_vente,ROUND (SUM(jp.Prix * pp.Quantité),2) AS Prixtotal FROM produit_panier pp , jeuxpc jp WHERE pp.ID_prod = jp.ID AND Etat_vente = 0 AND `ID_user` = " . $_SESSION['ID'] . "";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_array($result2);
        $Prixt = $row2["Prixtotal"];
        
        // fin du tableau
        echo "</tbody></table>";
        echo "<form action='validation_commande.php' method='POST'>";
        echo "<table class ='tableAcheter'>
            <tr>
                <td class = 'tdAcheter'> Coût Total : </td>
            </tr>
            <tr>
                <td class = 'tdAcheter'  >TTC : <span value='Prixtotal'>". $Prixt . '</span> €' ." </td>
            </tr>
            <tr>
            <td class = 'tdAcheter'> <input type='submit' value='Valdier la commande'>
            </tr></table></form>";
    }
}
    else header("Location: index.")
?>




<!--footer -->
<?php
require_once("footer.php");
?>


</body>



</html>
