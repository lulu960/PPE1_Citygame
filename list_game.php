<?php
require_once("db.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head><title>CityGame</title>
    <meta charset="utf8" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />
    <link href="CSS\lestyle.css" rel="stylesheet">
</head>
<body>
<?php
if (isset($_SESSION["Droit"]) AND $_SESSION["Droit"] == 1) {
    require_once("header.php");

$sql = "SELECT ID,Nom ,Reference,Prix,Description ,Editeur,Stock ,Datesortie, Genre,Plateforme FROM jeuxpc";
$result = mysqli_query($conn, $sql);
$sql1 =  "SELECT COUNT(*) FROM jeuxpc";
$result1 = mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_array($result1);
$conteur = $row1["COUNT(*)"];
    echo "<table class = 'tableList_game' border = '1px solid'>";
    echo "<tr>";
            echo "<th class = 'thList_game'>Image</th>";
            echo "<th class = 'thList_game'>Nom</th>";
            echo "<th class = 'thList_game'>Prix</th>";
            echo "<th class = 'thList_game'>Reférence</th>";
            echo "<th class = 'thList_game'>Stock</th>";
            echo "<th class = 'thList_game'>Description</th>";
            echo "<th class = 'thList_game'>Date de sortie</th>";
            echo "<th class = 'thList_game'>Editeur</th>";
            echo "<th class = 'thList_game'>Genre</th>";
            echo "<th class = 'thList_game'>Plateforme</th>";
    echo "</tr>";
    for($i = 0; $i < $conteur; $i++ ){
        $row = mysqli_fetch_array($result);
    echo "<tr>";
            echo "<td class = 'tdList_game' ></td>";
            echo "<td class = 'tdList_game'>".$row['Nom']."</td>";
            echo "<td class = 'tdList_game'>".$row["Prix"]."€</td>";
            echo "<td class = 'tdList_game'>".$row['Reference']."</td>";
            echo "<td class = 'tdList_game'>".$row['Stock']."</td>";
            echo "<td class = 'tdList_game'>".$row['Description']."</td>";
            echo "<td class = 'tdList_game'>".$row['Datesortie']."</td>";
            echo "<td class = 'tdList_game'>".$row['Editeur']."</td>";
            echo "<td class = 'tdList_game'>".$row['Genre']."</td>";
            echo "<td class = 'tdList_game'>".$row['Plateforme']."</td>";
            echo "<td class = 'tdList_game'><a href=formulaire_game_update.php?ID=" .$row['ID']. "><input type='button' value='Modifier'></a></td>";
            echo "<td class = 'tdList_game'><a href=remove_game.php?ID=" .$row['ID']. "><input type='button' value='Supprimer'></a></td>";
    }
    echo "</tr></table>";

}   else {header("location: index.php");}

?>
</body>
</html>
