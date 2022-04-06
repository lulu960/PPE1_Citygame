<?php
require_once("db.php");
session_start();

if (isset($_SESSION["Droit"]) AND $_SESSION["Droit"] == 1) { 
require_once("header.php");
$id = $_GET['ID'];
$sql = "SELECT Nom ,Reference,Prix,Description ,Editeur,Stock ,Datesortie, Genre FROM jeuxpc WHERE ID = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$Nom = $row['Nom'];
$Reference = $row['Reference'];
$Prix = $row['Prix'];
$Editeur = $row['Editeur'];
$Datesortie = $row['Datesortie'];
$Genre = $row['Genre']; 
$Stock = $row['Stock'];
$Description = $row['Description'];

echo "
<div>
<form action='update_game.php?ID=".$id."' method='post'>
<table>
    <table class='tableGameAdd'>
        <tr>
            <td class='tdGameAdd'>
                Non du jeux : <input type='text' name='nom'  value ='".htmlspecialchars($Nom)."' >
            </td>
        </tr>
        <tr>
            <td class='tdGameAdd'>
                Reference : <input type='text' id='Reference' name='Reference_game' value ='".htmlspecialchars($Reference)."'>
            </td>
        </tr>
        <tr>
            <td class='tdGameAdd'>
                Plateformes : <input type='text' id='Plateformes' name='Plateformes_game'>
            </td>
        </tr>
        <tr>
            <td class='tdGameAdd'>
                Prix : <input type='text' id='PrixG' name='Prix_game' value =' ".htmlspecialchars($Prix)." '>
            </td>
        </tr>
        <tr>
            <td>
                Editeur : <input type='text' id='Editeur' name='Editeur' value =' ".htmlspecialchars($Editeur)."'>
            </td>
        </tr>
        <tr>
            <td class='tdGameAdd'>
                Description : <textarea id='DescriptionG' name='Description_game'>".htmlentities($Description)."</textarea>
            </td>
        </tr>
        <tr>
            <td class='tdGameAdd'>
                Genre : <input type='text' id='DSG' name='game_genre' value =' ".htmlspecialchars($Genre)."'>
            </td>
        </tr>
        <tr>
            <td class='tdGameAdd'>
                Date de sortie : <input type='text' id='DSG' name='dates_game' value = '".htmlspecialchars($Datesortie)."'>
            </td>
        </tr>
        <tr>
            <td class='tdGameAdd'>
                Stock : <input type='text' id='StockG' name='Stock_game' value = '".htmlspecialchars($Stock)."'>
            </td>
        </tr>
        </tr>
        <td class='tdGameAdd'>
            Image : <input type='file' id='ImageG' name='Image_game' >
        </td>
        </tr>
        <tr>
            <td class='tdIGameAdd'>
                <input type='submit' value='Modifier'>
            </td>
        </tr>
    </table>
</form>
</div>";
}   else {header("location: index.php");}

?>