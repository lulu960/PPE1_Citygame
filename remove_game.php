<?php 
require_once("db.php");
session_start();
if (isset($_SESSION["Droit"]) AND $_SESSION["Droit"] == 1) {
    $IDremover = $_GET["ID"];
    $sql = "DELETE FROM jeuxpc WHERE ID = ".$IDremover."";
    $result = mysqli_query($conn, $sql);
    header("Location: list_game.php");

}else header("Location: index.php");