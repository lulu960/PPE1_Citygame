<?php
session_start();
require_once("db.php");
?>
<!DOCTYPE html>
<html class="backHeader">

<head>
    <title>Mon Compte</title>
    <meta charset="utf-8">
    <link href="CSS\lestyle.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="Imgfont/logo.png" />
    <style>
    </style>
    <script type="text/javascript">
    </script>
</head>

<body align="center" class="corp">
    <!--header -->
    <?php
    require_once("db.php");
    if (isset($_SESSION["ID"])) {
        require_once("header.php");

        $sql =   "SELECT Pseudo,Prénom,Nom,Email FROM `users` WHERE ID = " . $_SESSION["ID"] . "";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        echo "<div><h1 class ='bonjourUsers'> Bonjour " . $row['Pseudo'] . " !</h1></div>";

        if (isset($_SESSION["Droit"]) and $_SESSION["Droit"] == 1) {
            echo "<div class ='divUsers' align='right'><h2> Votre compte est un admin</h2>";
            echo "<a href='game_add.php'>Ajouter des jeux </a>";
            echo "</br></br>";
            echo "<a href='list_game.php'>Liste des jeux </a>";
            echo "</br></br>";
            echo "<a href='panel_user_admin.php'>Liste des utilisateurs</a></div>";
        }
        echo "<div class = 'divUsers'><table class = 'tableUsers' align ='center'>";
        echo "<tr><th class ='tdUsers'> Vos information</th></tr>";
        echo "<tr><td class ='tdUsers'> Votre Pseudo : " . $row['Pseudo'] . " </td></tr>";
        echo "<tr><td class ='tdUsers'> Votre Email : " . $row['Email'] . " </td></tr>";
        echo "<tr><td class ='tdUsers'> Votre Prénom : " . $row['Prénom'] . " </td></tr> ";
        echo "<tr><td class ='tdUsers'> Votre Nom : " . $row['Nom'] . " </td></tr>";
        echo "<tr><td class ='tdUsers'><a href=#><input type='button' value='Modifier vos informations'></a></td></tr></table></div>";
        //affichage facture
        $sql4 = "SELECT `ID`,`ID_user` FROM facture WHERE ID_user = " . $_SESSION["ID"] . "";
        $result4 = mysqli_query($conn, $sql4);
        $sql5 = "SELECT COUNT(*) AS ID FROM facture WHERE ID_user =" . $_SESSION["ID"] . "";
        $result5 = mysqli_query($conn, $sql5);
        $row5 = mysqli_fetch_array($result5);
        $conteur2  = $row5["ID"];
        echo "<div class ='divDernierAchat'>
        <h2>Vos factures :</h2>
        <table class ='tableDerniersAchat'>";
        for ($i = 1; $i < $row5["ID"] + 1; $i++) {
            $row4 = mysqli_fetch_array($result4);
            echo "<tr>
                    <td>
                    <a href='pdf.php?FACid=" . $row4["ID"] . "'><input type='button' value='Voir votre facture".$i."'></a>
                    </td>
                  </tr>";
            }
            echo "</table></div>";
        echo "<div class = 'divDernierAchat'>
        <table class ='tableDerniersAchat'>";
        echo "<tr><h2>Vos derniers achats :</h2></tr> ";
        $sql1 = "SELECT COUNT(*) AS ID_prod FROM produit_panier WHERE ID_user = " . $_SESSION["ID"] . " AND Etat_vente = 1";
        $result1 = mysqli_query($conn, $sql1);
        $rowa = mysqli_fetch_array($result1);
        $conteur = $rowa["ID_prod"];
        $sql2 = "SELECT pp.ID_commande, pp.ID ,pp.ID_user,jp.Nom,pp.ID_prod,jp.Prix, c.Cover FROM Produit_panier pp JOIN jeuxpc jp ON pp.ID_prod = jp.ID JOIN cover c ON jp.cover = c.ID WHERE pp.ID_user = " . $_SESSION['ID'] . " AND pp.Etat_vente = 1 ";
        $result2 = mysqli_query($conn, $sql2);
        for ($i = 0; $i < $conteur; $i++) {
            $row2 = mysqli_fetch_array($result2);
            // affichage des données
            echo "
                <tr>
                    <td> <img class  ='cover' src = '" . $row2["Cover"] . "'></td>
                     <td>" . $row2["Nom"] . "</td>
                      <td>PC</td>
                       <td>Email</td>
                      <td class ='prixPanier'>" . $row2["Prix"] . '€' . "</td>";
            echo "</tr>";
        }
        echo "</table></div>";
    }else {
        header("Location: index.php");
    }
    ?>

    <?php
    require_once("footer.php");
    ?>

</body>

</html>