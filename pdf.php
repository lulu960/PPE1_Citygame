<?php
require_once("db.php");
session_start();
ob_start();
?>


<?php
// recuperation des info session ID et de lID de la facture
        $ID = $_SESSION["ID"];
        $ID_fac = $_GET["FACid"];
        
        // affichage des données utilisateur pour lentete de la facture
            $sql = "SELECT iu.Nom,iu.Prénom,iu.Num_tel,iu.Addresse,iu.Code_postal,iu.Ville,u.Email FROM info_users iu JOIN users u ON u.ID = iu.ID_user WHERE `ID_user` = $ID";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
        ?>
    <div>
        <img  src="ImgFont\logo_base.png" style="
    position : absolute;
    width : 30%;
    left : 5px;
    top : 10px;">
    </div>
 
    <div style="position: absolute;
        left : 450px;
        top : 5px;">
        <table style="border : 1px solid">
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
                    Créateur : TARRANNE Lucas CHALUMEAU Nicolas
                </td>
            </tr>

        </table>
    </div>

    <div>
        <U style="position: absolute;
        left : 185px;
        top : 115px;">CityGame : Site Marchand Spécialisé dans la vente de Jeux Vidéo</U>
    </div>
<?php
    // on affiche les info du client
?>
    <div style="border : 1px solid; width : 25%;
     position : absolute;
        left : 5px;
        top : 130px;">
        <table>
            <tr>
                <td>
                    Client :
                </td>
            </tr>
            <tr>
                <td>
                    Nom / Prénom : <?php echo $row["Nom"] ." " ;echo  $row["Prénom"]?>
                </td>
            </tr>
            <tr>
                <td>
                    E-mail : <?php echo $row["Email"] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Numéro de tèl : <?php echo $row["Num_tel"] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Adresse : <?php echo $row["Addresse"]." "; echo $row["Ville"]." "; echo $row["Code_postal"] ?>
                </td>
            </tr>
        </table>
    </div>
    <div style="text-align: center;"> <h2><b><u>Votre commande n° <?php echo $ID_fac?> </u></b></h2></div>


<?php
// on recupere le nombre de produit factured via lid de la facture et créer un compteur daffichage 
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

        echo "<div>
        <table border='1px' 
        style='position : absolute;
        text-align: center;
        margin : auto ;
        width : 100%;
        table-layout: auto;
        top :300px;'>
        <thead style='width:100px;'>
        <tr style='width:100px;'>
            <th style='width:100px;'>Nom</th>
            <th style='width:100px;'>Prix</th>
            <th style='width:100px;'>Quantité</th>
            <th style='width:100px;'>Livraison</th>
            <th style='width:100px;'>Total</th>
        </tr>
    </thead>";

// affichage des données factured via lid facture
        echo "<tbody>";
        for ($i = 0; $i < $conteur; $i++) {
           $row2 = mysqli_fetch_array($result2);
                echo"<tr>
                    <td>" . $row2["Nom"] . "</td>
                    <td class ='prixPanier'>" . $row2["Prix"] . "€" . "</td>
                    <td>" . $row2["Quantit"]."</td>
                    <td>" . $row["Email"]."</td>
                </tr>";

        }echo "<tr><td colspan='4'>Total payer TTC : </td> <td>".$row10["Prixtotal"]. "€" ."</td></tr></tbody></table></div>";

?>

<?php
    $conteur = ob_get_clean();
use Spipu\Html2Pdf\Html2Pdf;
require __DIR__.'/vendor/autoload.php';
$pdf = new Html2Pdf('P','A4','Fr');
$pdf->writeHTML($conteur);
$pdf->output('facture-'.$ID.''.$ID_fac.'.pdf');
?>













