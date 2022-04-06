<?php 
require_once("db.php");
session_start();
if (isset($_SESSION["Droit"]) AND $_SESSION["Droit"] == 1) {
    require_once("header.php");
    $ID = $_GET["ID"];
    $sql3 = "SELECT `Pseudo` FROM `users` WHERE `ID` = '$ID'";
    $result3 = mysqli_query($conn,$sql3);
    $row3 = mysqli_fetch_array($result3);
    echo "<table class = 'tablePanelAchatUsersAdmin' align ='center'><tr><h3 class = 'derniersAcchatAnnonce'>Les derniers achats de ".$row3["Pseudo"]." :</h3></tr> ";
    $sql1 = "SELECT COUNT(*) AS ID_prod FROM produit_panier WHERE ID_user =  $ID AND Etat_vente = 1";
    $result1 = mysqli_query($conn, $sql1);
    $rowa = mysqli_fetch_array($result1);
    $conteur = $rowa["ID_prod"];
    $sql2 = "SELECT pp.ID ,pp.ID_user,jp.Nom,pp.ID_prod,jp.Prix, c.Cover FROM Produit_panier pp JOIN jeuxpc jp ON pp.ID_prod = jp.ID JOIN cover c ON jp.cover = c.ID WHERE pp.ID_user =  $ID AND pp.Etat_vente = 1 ";
    $result2 = mysqli_query($conn, $sql2);
    for ($i = 0; $i < $conteur; $i++) {
    $row2 = mysqli_fetch_array($result2);
            // affichage des données
            echo"
                <tr>
                    <td> <img class  ='cover' src = '" . $row2["Cover"] . "'></td>
                     <td>" . $row2["Nom"] . "</td>
                      <td>PC</td>
                       <td>Email</td>
                      <td class ='prixPanier'>" . $row2["Prix"] . '€' . "</td>
                </tr>";  
    }
    echo "</table>";



}
?>