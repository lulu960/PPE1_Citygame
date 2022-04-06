<?php
session_start();
require_once("db.php");
    //on regade si les champs son bien remplis et on les sécurise
    if (isset($_POST["pseudo"]) and isset($_POST["mdp"])) {
        $lepseudo = htmlspecialchars($_POST['pseudo']);
        $lepass = htmlspecialchars($_POST['mdp']);
        // on fait une réquest pour voir si le pseudo est dans la db
        $sqla = ("SELECT Pseudo FROM `users` WHERE Pseudo ='$lepseudo' ");
        $resulta = mysqli_query($conn, $sqla);
        $rowa = mysqli_fetch_array($resulta);
        // si il y a un user on test le mdp rentrer par l'utilisateur 
        if ($rowa != null)  {
            $lepass = hash('sha256', $lepass);
            password_verify($lepass, 'sha256');
        // requete de test du mdp 
            $sql = ("SELECT ID,Pseudo,Mdp,DROIT FROM `users` WHERE Pseudo ='$lepseudo' AND Mdp ='$lepass' ");
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            if ($row != null){
        // si l'utilisateur est reconnu on lance la session et on redirige vers index
                $_SESSION["Pseudo"] = $row["Pseudo"];
                $_SESSION["ID"] = $row["ID"];
                $_SESSION["Droit"] = $row["DROIT"];
                header ("Location: index.php");
            } else header ("Location:authentification.php?ERREUR=1");
        } else header("Location:authentification.php?ERREUR=1");        
    }else header ("Location:authentification.php?ERREUR=1");
    ?>