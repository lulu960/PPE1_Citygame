<?php
require_once("db.php");
session_start();
require_once("header.php");
if (isset($_GET["Plateforme"])) {

$Plateforme = htmlspecialchars($_GET["Plateforme"]);

$sql = "SELECT jp.ID, jp.Nom, jp.Prix, c.Cover , jp.Plateforme FROM jeuxpc jp  JOIN cover c ON jp.cover = c.ID WHERE jp.Plateforme = '$Plateforme' ORDER BY rand() ";
$result = mysqli_query($conn, $sql);
$tt =  "SELECT COUNT(*) FROM jeuxpc WHERE Plateforme = '$Plateforme'";
$resulta = mysqli_query($conn, $tt);
$rowa = mysqli_fetch_array($resulta);
$nb_ligne = $rowa["COUNT(*)"];
if ($nb_ligne == 0) {
    echo "Aucun result";
} else {
    $ligne = $nb_ligne / 6;
    $ligne = floor($ligne);
    echo $ligne;
    echo "<table class = 'tablePlaceImg'>";
    for ($j = 1; $j <= $ligne; $j++) {
        echo "<tr>";
        for ($i = 1; $i <= 6; $i++) {
            $row = mysqli_fetch_array($result);
            echo "<td>  <div class='box'>";
            echo "<div class='img'> <a href=page_game.php?ID=" . $row["ID"] . "> <img class='cover' src='" . $row["Cover"] . "'></a></div>"; // affichage du cover
            echo "<div class='prix'>" . $row["Prix"] . "€" . "</div>"; // affichage du prix
            echo "<div class='name''>" . $row["Nom"]  . "</div></div>"; // affichage du nom
            echo "<div class ='badge'><img src='logoPlateformes\badge-" . $row["Plateforme"] . "' class = 'imgBadge'> </div></td>";
        }
        echo "</tr>";
    }
    if (0 != $nb_ligne % 6) {
        echo "<tr>";
        $reset = $nb_ligne % 6;
        for ($w = 1; $w <= $reset; $w++) {
            $row = mysqli_fetch_array($result);
            echo "<td>  <div class='box'>";
            echo "<div class='img'> <a href=page_game.php?ID=" . $row["ID"] . "> <img class='cover' src='" . $row["Cover"] . "'></a></div>"; // affichage du cover
            echo "<div class='prix'>" . $row["Prix"] . "€" . "</div>"; // affichage du prix
            echo "<div class='name''>" . $row["Nom"]  . "</div></div>"; // affichage du nom
            echo "<div class ='badge'><img src='logoPlateformes\badge-" . $row["Plateforme"] . "' class = 'imgBadge'> </div></td>";
        }
    }
    echo "</tr>";
    echo "</table>";
}
}
require_once("footer.php");
?>