<?php
require_once("db.php");
session_start();
$redirection = header("Location: index.php");
if (isset($_SESSION["Pseudo"])) {

    $game = $_GET["ID"];

    if (ctype_digit($game)) {
        require_once("header.php");
        $ID_user  = $_SESSION["ID"];

        $sql1 = "SELECT * FROM `produit_panier` WHERE `ID_prod` =  $game AND Etat_vente = 0 AND ID_user = $ID_user";
        $result1 = mysqli_query($conn, $sql1);  
        $row = mysqli_fetch_array($result1);

        if ($row["Quantité"] >= 1) {
           $Q = $row["Quantité"] ;
           $Q = $Q + 1;
             $sql3 = "UPDATE produit_panier SET Quantité = $Q WHERE `ID_prod` = $game AND Etat_vente = 0 AND ID_user = $ID_user";
             $result3 = mysqli_query($conn, $sql3);
        }else if ($row["Quantité"] == 0 )
        {
        $sql2 = "INSERT INTO produit_panier(ID, ID_user, ID_prod, Etat_vente,Quantité) VALUES (NULL, $ID_user,$game,0,1)";
        $result = mysqli_query($conn, $sql2);
        echo $redirection;
         }
    }
}
else {
    header("Location: authentification.php?erreur");
}



?>


