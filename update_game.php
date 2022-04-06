<?php 
require_once("db.php");
session_start();
if (isset($_SESSION["Droit"]) AND $_SESSION["Droit"] == 1) {
    $conn;
$nom = mysqli_real_escape_string($conn,$_POST['nom']);
$references = mysqli_real_escape_string($conn,$_POST['Reference_game']);
$prix = mysqli_real_escape_string($conn,$_POST['Prix_game']);
$edit = mysqli_real_escape_string($conn,$_POST['Editeur']); 
$description = mysqli_real_escape_string($conn,$_POST['Description_game']);
$date = mysqli_real_escape_string($conn,$_POST['dates_game']); 
$genre = mysqli_real_escape_string($conn,$_POST['game_genre']);
$stock = mysqli_real_escape_string($conn,$_POST['Stock_game']);
$id = mysqli_real_escape_string($conn,$_GET['ID']);

$sql ="UPDATE `jeuxpc` SET Nom = '$nom' , Reference = '$references' , Prix = $prix , Description = '$description' ,Editeur = $edit,Stock = $stock,Datesortie = '$date' ,Genre =$genre  WHERE ID = $id";
$result = mysqli_query($conn, $sql);
    {header("location: list_game.php");}
//printf("Nombre de lignes affectées (INSERT): %d\n", mysqli_affected_rows($conn));
}else {header("location: index.php");}

?>