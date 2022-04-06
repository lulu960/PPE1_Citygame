<?php
require_once("db.php");
// on vérifie que les champs son remplis 
if(isset($_POST["pseudo"]) AND isset($_POST["pwd1"]) AND isset($_POST["pwd2"]) AND isset($_POST["mail"]))
{

// on vérifie stock les donné dans des variable et on blinde contre les injection 
$lepseudo = htmlspecialchars($_POST['pseudo']);
$lepass = htmlspecialchars($_POST['pwd1']);
$lepass2 = htmlspecialchars($_POST['pwd2']);
$lemail = htmlspecialchars($_POST['mail']);
// on vérifie si il existe dans la db
$sqla = ("SELECT Pseudo FROM `users` WHERE Pseudo ='$lepseudo' ");
$resulta = mysqli_query($conn, $sqla);
$rowa = mysqli_fetch_row($resulta);

$sql2 = ("SELECT Email FROM `users` WHERE Email ='$lemail' ");
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_row($result2);
if($row2 == 0){
    if($rowa == 0){
        if($lepass === $lepass2){
            $lepass = hash('sha256',$lepass);
                $inser = ("INSERT INTO `users` (`Pseudo`, `Mdp`,Email,DROIT) VALUE ('$lepseudo' , '$lepass','$lemail',0)");
                    $execute = mysqli_query($conn,$inser);
                    header ("Location: authentification.php?SUCCES=1");
                    } else header("Location: inscription.php?ERREUR=1");
    } else  header ("Location: inscription.php?ERREUR=2");
}else  header ("Location: inscription.php?ERREUR=3");
}
?>