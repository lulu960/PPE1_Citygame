<?php
require_once("db.php");
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>CityGame - Home</title>
    <meta charset="utf8" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />
    <link href="CSS\lestyle.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="Imgfont/logo.png" />
    <style>

    </style>

    <script type="text/javascript">
        window.onscroll = function() {
            var scroll = (document.documentElement.scrollTop ||
                document.body.scrollTop);
            if (scroll > 30)
                document.getElementById('sidebarBase').style.top = scroll + 'px';
        }
    </script>

</head>

<body class="corp">
    <!-- header -->
    <?php
    require_once("header.php");
    ?>

    <!--corps de la page -->


    <!-- afficher jeux -->

    <?php


    // page home
    if (!isset($_GET["search"]) && !isset($_GET["Plateforme"])) {
        $sql = "SELECT jp.ID, jp.Nom, jp.Prix, c.Cover , jp.Plateforme FROM jeuxpc jp  JOIN cover c ON jp.cover = c.ID WHERE jp.Plateforme = 'Windows' ORDER BY rand() ";
        $result = mysqli_query($conn, $sql);
        $tt =  "SELECT COUNT(*) AS Nom FROM jeuxpc";
        $resulta = mysqli_query($conn, $tt);
        $rowa = mysqli_fetch_array($resulta);
        $nb_ligne = 2;
        echo "<table class = 'tablePlaceImg'>";
        for ($j = 1; $j <= $nb_ligne; $j++) {
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
        echo "</table>";
    }


    // bouton par plateforme
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

    ?>
 i = 1; 
 i 

    <!--footer -->
    <?php
    require_once("footer.php");
    ?>
</body>

</html>