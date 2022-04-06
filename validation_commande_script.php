<?php
require_once("db.php");
session_start();
require_once("header.php");
//info user
$genre = $_POST["genre"];
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$numt = $_POST["numt"];
$adresse = $_POST["adresse"];
$codep = $_POST["codep"];
$ville = $_POST["ville"];
$ID = $_SESSION["ID"];
//Inser info utilisateur
$sql = "INSERT INTO `info_users`(`ID`, ID_user, `Nom`, `Prénom`, `Num_tel`, `Addresse`, `Code_postal`, `Ville`) VALUES (NULL ,$ID,'$nom','$prenom',$numt,'$adresse',$codep,'$ville')";
$result = mysqli_query($conn,$sql);
//info carte
$nomc = $_POST["nomc"];
$numc = $_POST["numc"];
$moisexpi = $_POST["moisexpi"];
$anneexpi = $_POST["anneexpi"];
$cvv = $_POST["cvv"];
//Inser info carte 
$sql1 = "INSERT INTO `info_user_carte`(`ID`, `ID_user`, `Nomc`, `Numc`, `Moisexpi`, `Anneeexpi`, `CVV`) VALUES (NULL,$ID,'$nomc',$numc,$moisexpi,$anneexpi,$cvv)";
$result1 = mysqli_query($conn,$sql1);


// création facture et on récupère son id et on lui donne l'id user
$sql5 = "INSERT INTO `facture`(`ID`, `ID_user`) VALUES (NULL,$ID)";
$result5 = mysqli_query($conn,$sql5);
$sql7 =" SELECT LAST_INSERT_ID() FROM facture";
$result7 = mysqli_query($conn,$sql7);
$row7 = mysqli_fetch_array($result7);
$idfac = $row7["LAST_INSERT_ID()"];

//on récupère le nombre de prod dans le panier en fonction de l'id user pour créer la boucle pour afficher les produits
$sql3 = "SELECT COUNT(*) AS ID_prod FROM produit_panier WHERE ID_user = " . $_SESSION["ID"] . " AND Etat_vente = 0";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_array($result3);
$conteur = $row3["ID_prod"];
echo "<h1 class ='titrePanier'>Félicitation !</h1>";
//echo $idfac; // on vérifie l'id de la facture
//création du tableau pour afficher les produits
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
// recuperation des info produit prix nom cover ect ... pour les inclure dans le tableau
$sql2 = "SELECT pp.ID ,pp.ID_user,jp.Nom,pp.ID_prod,jp.Prix, c.Cover,Plateforme,pp.Quantité FROM Produit_panier pp JOIN jeuxpc jp ON pp.ID_prod = jp.ID JOIN cover c ON jp.cover = c.ID WHERE pp.ID_user = " . $_SESSION['ID'] . " AND pp.Etat_vente = 0 ";
        $result2 = mysqli_query($conn, $sql2);
        for ($i = 0; $i < $conteur; $i++) {
           $row = mysqli_fetch_array($result2);
           echo"
            <tbody>
            <tr>
                <td> <img class  ='cover' src = '" . $row["Cover"] . "'></td>
                 <td>" . $row["Nom"] . "</td>
                  <td>" . $row["Plateforme"] . "</td>
                 <td>" . $row["Quantité"] . "</td>
                   <td>Email</td>
                  <td class ='prixPanier'>" . $row["Prix"] . '€' . "</td>
                </tr>";
// on récupère l'id de la facture pour mettre les produit dans une table factured 
                $sql6 = "INSERT INTO `factured`(`ID`, `ID_fac`, `ID_prod`,Quantit) VALUES (NULL,$idfac,". $row['ID_prod'] .",".$row["Quantité"].")";
                $result26 = mysqli_query($conn, $sql6);
        }
        echo "</tbody></table>";
        // on envoie via formulaire l'id de la facture affin de l'afficher
        echo "<form>
                <table class ='tableAcheter'>
              <tr>
                <td class = 'tdAcheter'> Télécharger votre facture : </td>
             </tr> 
             <tr>
             <td class = 'tdAcheter'> <a href='pdf.php?FACid=".$idfac."'><input type='button' value='Télécharger'></a></td>
             </tr></table></form>";

// on update le panier pour les achats effectuer afin de voir l'historique dans achat récent
$sql8 ="UPDATE `produit_panier` SET `ID_commande`= ".$idfac." WHERE ID_user = " . $_SESSION['ID'] ." AND Etat_vente = 0" ;
$result8 = mysqli_query($conn,$sql8);
$sql4 ="UPDATE `produit_panier` SET `Etat_vente`= 1 WHERE ID_user = " . $_SESSION['ID'] ."" ;
$result4 = mysqli_query($conn,$sql4);
?>