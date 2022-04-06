<?php
require_once("db.php");
session_start();
if (isset($_SESSION["Droit"]) AND $_SESSION["Droit"] == 1) {
    require_once("header.php");
    echo "<div class='divGameAdd'>
    <h1>Ajoutez votre jeux</h1>
    <form action='essai.php' method='post' enctype='multipart/form-data'>
        <table class='tableGameAdd'>
            <tr>
                <td class='tdGameAdd'>
                    Non du jeux : <input type='text' id='NameG' name='Name_game'>
                </td>
            </tr>
            <tr>
                <td class='tdGameAdd'>
                    Reference : <input type='text' id='Reference' name='Reference_game'>
                </td>
            </tr>
            <tr>
                <td class='tdGameAdd'>
                <input type='checkbox'  name='Windows'  value='Windows'>
                Windows
                <input type='checkbox'  name='MacOS' value='MacOS'> 
                MacOS
                <input type='checkbox'  name='Linux'  value='Linux'> 
                Linux
                <input type='checkbox'  name='Xbox360'  value='Xbox360'> 
                Xbox360
                <input type='checkbox'  name='XboxOne'  value='XboxOne'> 
                XboxOne
                <input type='checkbox'  name='XboxSeries'  value='XboxSeries'> 
                XboxSeries
                <input type='checkbox'  name='PS3'  value='PS3'> 
                PS3
                <input type='checkbox'  name='PS4'  value='PS4'> 
                PS4
                <input type='checkbox'  name='PS5'  value='PS5'> 
                PS5
                <input type='checkbox'  name='Switch'  value='Switch'> 
                Switch
                <input type='checkbox'  name='Wii'  value='Wii'> 
                Wii
                <input type='checkbox'  name='Wii_U'  value='Wii_U'> 
                Wii U
                </td>
            </tr>
            <tr>
                <td class='tdGameAdd'>
                    Prix : <input type='text' id='PrixG' name='Prix_game'>
                </td>
            </tr>
            <tr>
                <td>
                    Editeur : <input type='text' id='Editeur' name='Editeur'>
                </td>
            </tr>
            <tr>
                <td class='tdGameAdd'>
                    Description : <textarea id='DescriptionG' name='Description_game'></textarea>
                </td>
            </tr>
            <tr>
                <td class='tdGameAdd'>
                    Genre : ";
    $sql3 = "SELECT COUNT(*) FROM `genre`";
    $result3 = mysqli_query($conn, $sql3);
    $row = mysqli_fetch_array($result3);
    $conteur = $row["COUNT(*)"];
    $sql4 = "SELECT ID,Nom FROM genre";
    $result4 = mysqli_query($conn, $sql4);
    echo "<select name='genre' id='genre'>";
    for ($i = 0; $i < $conteur; $i++) {
        $row2 = mysqli_fetch_array($result4);
        echo " <option value=' " . $row2["ID"] . " '> " . $row2["Nom"] . "</option> ";
    }
    echo "</select>
                    </td>
                    </tr>
                    <tr>
                        <td class='tdGameAdd'>
                            Date de sortie : <input type='text' id='DSG' name='dates_game'>
                        </td>
                    </tr>
                    <tr>
                        <td class='tdGameAdd'>
                            Stock : <input type='text' id='StockG' name='Stock_game'>
                        </td>
                    </tr>




                    </tr>
                    <td class='tdGameAdd'>
                        Image : <input type='file' id='ImageG' name='Image_game'>
                    </td>
                    </tr>
                    <tr>
                        <td class='tdIGameAdd'>
                            <input type='submit' value='Ajouter'>
                        </td>
                    </tr>
                </table>
            </form>
        </div>";
} 
else {

    header("location: index.php");

}

?>

<!DOCTYPE html>
<html>

<head>
    <title>CityGame - Home</title>
    <meta charset="utf8" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />
    <link href="./lestyle.css" rel="stylesheet">
    <style>

    </style>

</head>

<body>






    <!--footer -->

    <?php
    require_once("footer.php");
    ?>

</body>



</html>
<!--         <div>
                <span>Editeur :</span>
                <input type="text" id="EditeurG" name="Editeur_game">
            </div>















































