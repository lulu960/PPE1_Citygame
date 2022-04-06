<?php
require_once("db.php");
?>
<!DOCTYPE html>
<html class="backHeader">

<head>
    <title>header</title>
    <meta charset="utf-8">
    <link href="CSS\lestyle.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="Imgfont/logo.png" />
    <style>
        .baseNav {
            width: 100%;
            background-color: rgba(0, 0, 0, 1);
        }

        .navbar {
            width: 100%;
            border: 0px;
        }

        .partageDesMarques {
            width: 25%;
        }

        .toolDispose {
            text-align: center;


        }

        li {
            list-style: none;
        }

        .toolbar {
            list-style: none;
            color: #FFF;
            font-size: 20px;
            text-decoration: none;
            padding-bottom: 1px;
            padding-top: 0px;
            width: 100%;
        }

        .toolBulOut {
            padding: 0px;
            margin: 0px;
        }

        .toolBulIn {
            position: relative;
            text-decoration: none;
            list-style: none;
            width: 22%;
            padding-top: 10px;
            background-color: rgba(3, 87, 167, 0.9);

        }

        nav ul li {
            list-style: none;
            line-height: 44px;
            float: left;

        }

        nav ul li a {
            color: #FFF;
            padding: 10px;
            font-size: 20px;
            text-decoration: none;
            text-align: center;
        }

        li a:hover {
            border-bottom: 3px #FFF solid;
        }

        nav ul li ul {
            display: none;
        }

        /* Rend le menu déroulant caché par défaut */

        nav ul li:hover ul {
            /* Affiche la toolBulIn au survol de la souris avec la class .drop */
            z-index: 99999;
            display: list-item !important;
            position: absolute;
            margin-left: 0px;
        }

        nav ul li:hover ul li {
            float: none;
        }

        .tableToolBar {
            width: 100%;
            height: 1%;
            text-align: center;
            background-color: rgba(3, 87, 167, 0.4);

        }

        .imgLogoOut {
            width: auto;
            height: 45px;
            padding-top: 10px;
        }

        .imgLogoIn {
            width: auto;
            height: 30px;
            padding-top: 10px;
        }
    </style>
    <script type="text/javascript">
    </script>
</head>

<body align="center" class="corp">


    <!-- tête de page -->
    <div class="backHeader">
        <div class="header" height="50">
                <table class="tableHeader">
                    <tr>
                        <td class="logoCase">
                            <a href='./index.php'><img src="ImgFont\logo_base.png" height='100' /></a>
                        </td>
                        <td class="searchBarre">    
                            <form action='recherche.php' Method='GET'>
                                <input type='text' name='search' class='rech' required />
                                <div class='placeSearch'>
                                <input type='submit' value='' style='background-image: url("Imgfont/searchv2.png"); border:none; background-repeat:no-repeat;background-size:100% 100%; background-color:white;' class='search' />
                            </form>
                        </td>
        <td>
            <?php
            if (isset($_SESSION["Pseudo"])) {

                echo "<span class='log'><a href='user.php'>Mon compte</a>";
                echo "</br> ------------------</br>";
                echo "<a href='deco.php'>Deconnexion</a></span>";
                echo "<td><a href ='panier.php'><img src='ImgFont\shopping-cart.png' class='panier'></a></td>";
            } else {
                echo "<span class='log'><a href='authentification.php'>Connexion</a>
                                 </br> ------------------</br>
                                <a href='inscription.php'> Inscription</a></span>";
            }
            ?>
        </td>
        </tr>
        </table>
    </div>
    </div>

    <!-- barre d'outils -->
    <table class="tableToolBar">
        <tr>
            <td class="partageDesMarques">
                <div class="baseNav">
                    <div class="toolDispose">
                        <nav>
                            <ul class="toolBulOut">
                                <li class="toolbar"><img src="logoPlateformes\PS.svg" class="imgLogoOut"></a>
                                    <ul class="toolBulIn">
                                        <li class="toolbar"><a href="index.php?Plateforme=PS3"><img src="logoPlateformes\PS3.png" class="imgLogoIn"></a></li>
                                        <li class="toolbar"><a href="index.php?Plateforme=PS4"><img src="logoPlateformes\PS4.png" class="imgLogoIn"></a></li>
                                        <li class="toolbar"><a href="index.php?Plateforme=PS5"><img src="logoPlateformes\PS5.png" class="imgLogoIn"></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </td>
            <td class="partageDesMarques">
                <div class="baseNav">
                    <div class="toolDispose">
                        <nav>
                            <ul class="toolBulOut">
                                <li class="toolbar"><img src="logoPlateformes\XBOX2.png" class="imgLogoOut"></a>
                                    <ul class="toolBulIn">
                                        <li class="toolbar"><a href="index.php?Plateforme=Xbox360"><img src="logoPlateformes\XBOX360.png" class="imgLogoIn"></a></li>
                                        <li class="toolbar"><a href="index.php?Plateforme=XboxOne"><img src="logoPlateformes\XBOXONE.png" class="imgLogoIn"></a></li>
                                        <li class="toolbar"><a href="index.php?Plateforme=XboxSeries"><img src="logoPlateformes\XBOXSERIES.png" class="imgLogoIn"></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </td>
            <td class="partageDesMarques">
                <div class="baseNav">
                    <div class="toolDispose">
                        <nav>
                            <ul class="toolBulOut">
                                <li class="toolbar"><img src="logoPlateformes\NINTENDO.png" class="imgLogoOut"></a>
                                    <ul class="toolBulIn">
                                        <li class="toolbar"><a href="index.php?Plateforme=Wii"><img src="logoPlateformes\WII.png" class="imgLogoIn"></a></li>
                                        <li class="toolbar"><a href="index.php?Plateforme=Wii_U"><img src="logoPlateformes\WIIU.png" class="imgLogoIn"></a></li>
                                        <li class="toolbar"><a href="index.php?Plateforme=Switch"><img src="logoPlateformes\SWITCH.png" class="imgLogoIn"></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </td>
            <td class="partageDesMarques">
                <div class="baseNav">
                    <div class="toolDispose">
                        <nav>
                            <ul class="toolBulOut">
                                <li class="toolbar"><img src="logoPlateformes\Pc.png" class="imgLogoOut"></a>
                                    <ul class="toolBulIn">
                                        <li class="toolbar"><a href="index.php?Plateforme=Windows"> <img src="logoPlateformes\WINDOWS2.png" class="imgLogoIn"> </a></li>
                                        <li class="toolbar"><a href="index.php?Plateforme=MacOS"> <img src="logoPlateformes\MAC.svg" class="imgLogoIn"> </a></li>
                                        <li class="toolbar"><a href="index.php?Plateforme=Linux"> <img src="logoPlateformes\LINUX.png" class="imgLogoIn"> </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </td>
        </tr>
    </table>



</body>



</html>