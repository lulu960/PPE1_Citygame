<?php
require_once("db.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Citygame - Inscription</title>
    <meta charset="utf8" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />
    <link href="CSS\lestyle.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="Imgfont/logo.png" />
    <script>
        function validercompte() {
            var lenom = document.getElementsByName("pseudo")[0].value;
            if (lenom == "") {
                alert("Nom obligatoire");
                return false;
            }
            var pwd1 = document.getElementsByName("pwd1")[0].value;
            var pwd2 = document.getElementsByName("pwd2")[0].value;
            if (pwd1 != pwd2) {
                alert("Les mots de passe ne correspondent pas");
                return false;
            }

            return true;
        }
    </script>



</head>

<body class ="corp">
<!-- header -->
<?php
require_once("header.php");
?>

<!--corps de la page -->
<div class ="divInscription">
    <h1>Inscrivez-vous</h1>
    <form action="ajout.php" method="POST">
<?php
    if (isset($_GET["ERREUR"]) AND $_GET["ERREUR"] == "1") {
        echo "Les mots de passe ne correspondent pas !";
    }
    if (isset($_GET["ERREUR"]) AND $_GET["ERREUR"] == "2") {
        echo "Vous avez deja un compte !";
    }
    if (isset($_GET["ERREUR"]) AND $_GET["ERREUR"] == "3") {
        echo "L'adresse email est déja utilisé !";
    }
?>
        <table class="tableInscription">
            <tr>
                <td class = "tdInscription">
                    Pseudo : <input type="text" name="pseudo" placeholder ="Pseudo" required/>
                </td>
            </tr>
            <tr>
                <td class = "tdInscription">
                    Adresse mail : <input type="text" name ="mail" placeholder="abcdefg@hijklm.nopq" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
                </td>
            </tr>
            <tr>
                <td class = "tdInscription">
                    Mot de passe : <input type="password" name="pwd1" placeholder ="motDePasse1234" required/>
                </td>
            </tr>
                <td class = "tdInscription">
                    Confirmez votre mot de passe : <input type="password" name="pwd2" required/>
                </td>
            <tr>
                <td class = "tdInscription">
                    <input type="submit">
                </td>
            </tr>
        </table>
    </form>
    <span class="redirection"><a href="authentification.php">Vous avez déjà un compte ?</br>Connectez-vous !</a></span>
</div>
<!--footer -->
<?php
require_once("footer.php");
?>

</body>



</html>