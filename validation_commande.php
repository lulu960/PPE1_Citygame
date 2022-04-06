<?php
require_once("db.php");
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Validation Commande</title>
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
<div class = 'infosComplementCommande'>
    <h1>Information Complémentaire</h1>
    <form method='POST' action='validation_commande_script.php'>

<?php
  $sql2 ="SELECT pp.ID_user, pp.ID_prod, pp.Etat_vente,ROUND (SUM(jp.Prix * pp.Quantité),2) AS Prixtotal FROM produit_panier pp , jeuxpc jp WHERE pp.ID_prod = jp.ID AND Etat_vente = 0 AND `ID_user` = " . $_SESSION['ID'] . "";
  $result2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_array($result2);
  echo "Montant a payer : "; echo $row2["Prixtotal"] ."€";
?>

        <div class = 'genre'>
            <input type ='radio' name ='genre' value ='Madame' class = 'genre'   required>
                <label for="Type">Madame</label>
            <input type ='radio' name ='genre' value ='Monsieur' class = 'genre'   required>
                <label for="Type">Monsieur</label>
            <input type ='radio' name ='genre' value ='Autres' class = 'genre'  required>
                <label for="Type">Autres</label>
        </div>
        <div class ='infosPersonelle'>
            <h2>Informations Personnelles</h2>
            <input type = 'text' name ='nom' class = 'infosIn' placeholder ='Nom' required>
            <input type = 'text' name ='prenom' class = 'infosIn' placeholder ='Prénom' required></br>
            <input type = 'text' name ='numt' class = 'infosIn' pattern='[0-9]{10}' placeholder ='Numéro de Téléphone' required>
            <input type = 'text' name ='adresse' class = 'infosIn' placeholder ='Adresse de Facturation' required></br>
            <input type = 'text' name ='codep' class = 'infosIn' placeholder ='Code Postal' required>
            <input type = 'text' name ='ville' class = 'infosIn' placeholder ='Ville' required>
        </div>
        <div class ='infosBancaire'>
            <h2>Informations Bancaire</h2>
            <input type = 'text' name ='nomc' class = 'infosIn' placeholder ='Nom sur la carte' required></br>
            <input type = 'text' name ='numc' class = 'infosIn' placeholder ='Numéro de la carte' required></br>
            <input type = 'text' name ='moisexpi' class = 'infosIn' placeholder ='Mois d expiration' pattern='[0-9]{2}' required>
            <input type = 'text' name ='anneexpi' class = 'infosIn' placeholder ='Année d expiration' pattern='[0-9]{2}' required></br>
            <input type = 'text' name ='cvv' class = 'infosIn' placeholder ='CVV' pattern='[0-9]{3}' required>
        </div>
        <input type ='submit' value='Payer'>
    </form>
</div>




<!--footer -->
<?php
require_once("footer.php");
?>


</body>



</html>