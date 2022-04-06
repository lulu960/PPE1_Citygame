<?php 
require_once("db.php");
session_start();
if (isset($_SESSION["Droit"]) AND $_SESSION["Droit"] == 1) {
    require_once("header.php");

$sql =   "SELECT ID, Pseudo,Prénom,Nom,Email,DROIT FROM `users`";
$result = mysqli_query($conn, $sql);
$sql1 =  "SELECT COUNT(*) FROM users";
$result1 = mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_array($result1);
$conteur = $row1["COUNT(*)"];


echo"<table class = 'tablePanelUsersAdmin' align='center' border = '1px solid'>";
echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Pseudo</th>";
    echo "<th>Nom</th>";
    echo "<th>Prénom</th>";
    echo "<th>Email</th>";
    echo "<th>Droit</th>";
echo "</tr>";

for($i = 0; $i < $conteur; $i++ ){
    $row = mysqli_fetch_array($result);
echo "<tr>";
    echo"<td class ='tdPanelUsersAdmin'>".$row['ID']."</td>";
    echo"<td class ='tdPanelUsersAdmin'>".$row['Pseudo']."</td>";
    echo"<td class ='tdPanelUsersAdmin'>".$row['Nom']."</td>";
    echo"<td class ='tdPanelUsersAdmin'>".$row['Prénom']."</td>";
    echo"<td class ='tdPanelUsersAdmin'>".$row['Email']."</td>";
    echo"<td class ='tdPanelUsersAdmin'>".$row['DROIT']."</td>";
    echo "<td class ='tdPanelUsersAdmin'><a href=panel_achat_user_admin.php?ID=" .$row['ID']. "><input type='button' value='Voir le compte'></a></td>";
echo "</tr>";
}
echo "</table>";

}