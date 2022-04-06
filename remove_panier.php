<?php
require_once("db.php");
session_start();
$loc = header("Location: panier.php");

if (isset($_SESSION["ID"]) && isset($_GET["ID"]) && isset($_GET["Q"])){
    $IDremover = $_GET["ID"];
    $Q = $_GET["Q"];
    $ID_user = $_SESSION["ID"];

    if ($Q > 1) {
        $Q = $Q - 1;
          $sql3 = "UPDATE produit_panier SET Quantité = $Q WHERE `ID` = $IDremover AND Etat_vente = 0 AND ID_user = $ID_user";
          $result3 = mysqli_query($conn, $sql3);
            echo $loc;
     }else if ($Q == 1 )
     {
        $sql = "DELETE FROM produit_panier WHERE ID = ".$IDremover." AND ID_user = ".$_SESSION['ID']."";
        $result = mysqli_query($conn, $sql);
        echo $loc;
      }
        
}
?>