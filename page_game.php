    <?php
require_once("db.php");
session_start();
// recup ID jeux
$game = $_GET["ID"];
// vérifiaction de l'ID pour éviter les injections SQL
if(ctype_digit($game)){}
    else{
    header("Location: index.php");
    exit();
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>CityGame - Jeux</title>
    <meta charset="utf8" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />
    <link href="CSS\lestyle.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="Imgfont/logo.png" />
</head>

<body class = "corp">
<!-- header -->

<?php
require_once("header.php");
?>

<!-- info_jeux -->

<?php
//info sur les jeux de la table jeuxpc
    $sql = ("SELECT Nom, Prix, Description , Cover FROM jeuxpc WHERE id = " . $game . "");
    $result = mysqli_query($conn, $sql);;
    $row = mysqli_fetch_array($result);
    //récuperation de la cover par la table Cover
    $sqla = "SELECT jp.ID ,c.Cover FROM jeuxpc jp JOIN cover c ON jp.cover = c.ID WHERE jp.ID = " . $game . "";
    $resulta = mysqli_query($conn, $sqla);;
    $rowa = mysqli_fetch_array($resulta);
    $rowa["Cover"];
    //affichage
    echo"<table class ='tablePageGame'> <tr><td rowspan=4> <img src=".$rowa['Cover'] ." class = 'presentation'></td>";
    echo"<td class = 'titrePageGame'>".$row["Nom"]."</td></tr>";
    echo"<tr><td class = 'prixPageGame'>".$row["Prix"].'€'."</td></tr>";
    echo"<tr><td>".$row["Description"]."</td></tr>
           <tr><td>  <a href='add_panier.php?ID=".$game."'><input type='button' value='Ajouter au Panier' class ='boutonAcheter'></a></td></tr> </table>";
?>

<!--footer -->
<?php
require_once("footer.php");
?>
</body>

</html>

