<?php
require_once("db.php");
session_start();
//sécurité si la session existe ne peut pas se connecter une deuxieme fois
if (isset($_SESSION["Pseudo"])) {
    header("Location: index.php");
} else {
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>CityGame - Connexion</title>
    <meta charset="utf8" />
    <link href="CSS\lestyle.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="Imgfont/logo.png" />
</head>

<body>
    <!-- header -->
    <?php
    require_once("header.php");
    ?>



    </br>
    <div class="divConnexion">
        <h1>Connectez-vous</h1>

        <?php
    if (isset($_GET["SUCCES"]) AND $_GET["SUCCES"] == "1") {
        echo "Votre compte a bien été créé !";
    }
    if (isset($_GET["ERREUR"]) AND $_GET["ERREUR"] == "1") {
        echo "Identifiants incorrect !";
    }
        ?>


<form action="authentification_script.php" method="POST">
        <table class="tableConnexion" align="center">
            <tr>
                <td class="tdConnexion">
                    Pseudo : <input type="text" name="pseudo" placeholder="Pseudo" required />
                </td>
            </tr>
            <tr>
                <td class="tdConnexion">
                    Mot de passe : <input type="password" name="mdp" placeholder="motDePasse1234" required />
                </td>
            </tr>
            <tr>
                <td class="tdConnexion">
                    <input type="submit">
                </td>
            </tr>
        </table>
        </form>
        <span class="redirection"><a href="inscription.php">Vous n'avez pas encore de compte ?</br>Inscrivez-vous !</a></span>
    </div>
    <!--footer -->
    <?php
    require_once("footer.php");
    ?>


</body>



</html>