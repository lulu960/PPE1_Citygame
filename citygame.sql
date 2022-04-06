-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 18 avr. 2021 à 15:37
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `citygame`
--

-- --------------------------------------------------------

--
-- Structure de la table `cover`
--

DROP TABLE IF EXISTS `cover`;
CREATE TABLE IF NOT EXISTS `cover` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Cover` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cover`
--

INSERT INTO `cover` (`ID`, `Cover`) VALUES
(1, 'Cover/valheim-cover.jpg'),
(2, 'Cover/R6-cover.jpg'),
(3, 'Cover/AcValahlla-cover.jpg'),
(4, 'Cover/BeamNG-cover.jpg'),
(5, 'Cover/ForzaH4-cover.jpg'),
(8, 'Cover/AcValahlla-cover.jpg'),
(50, 'Cover/cyberpunk-2077-cover.jpg'),
(66, 'Cover/GTA_Vr.jpg'),
(94, 'Cover/evil-genius-2-world-domination-cover.jpg'),
(96, 'Cover/fifa-21-cover.jpg'),
(97, 'Cover/minecraft-cover.jpg'),
(100, 'Cover/monster-hunter-world-cover.jpg'),
(101, 'Cover/monster-hunter-world-cover.jpg'),
(102, 'Cover/motogp-21-cover.jpg'),
(103, 'Cover/outriders-cover.jpg'),
(104, 'Cover/sea-of-thieves-pc-xbox-one-cover.jpg'),
(105, 'Cover/microsoft-flight-simulator-cover.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

DROP TABLE IF EXISTS `editeur`;
CREATE TABLE IF NOT EXISTS `editeur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `editeur`
--

INSERT INTO `editeur` (`ID`, `Nom`) VALUES
(1, 'Foxhole'),
(3, ' Coffee Stain Publishing	'),
(4, 'Ubisoft '),
(5, ' BeamNG	'),
(6, 'Microsoft'),
(12, ' CD PROJEKT RED'),
(19, 'Rockstar Games'),
(46, 'Rebellion'),
(47, 'Electronic Arts'),
(48, 'Mojang'),
(49, ' CAPCOM Co., Ltd'),
(51, 'CAPCOM Co., Ltd'),
(52, 'Milestone S.r.l.'),
(53, 'Square Enix'),
(54, 'Xbox Game Studios');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`ID`, `Nom`) VALUES
(1, 'Action'),
(2, 'Aventure'),
(5, 'Casual'),
(7, 'Simulation '),
(8, 'Course'),
(9, 'RPG'),
(10, 'Sport'),
(11, 'Stratégie '),
(12, 'Massivement multijoeur');

-- --------------------------------------------------------

--
-- Structure de la table `jeuxpc`
--

DROP TABLE IF EXISTS `jeuxpc`;
CREATE TABLE IF NOT EXISTS `jeuxpc` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Reference` varchar(50) DEFAULT NULL,
  `Prix` double NOT NULL,
  `Description` text NOT NULL,
  `Editeur` int(11) DEFAULT NULL,
  `Stock` tinyint(1) DEFAULT NULL,
  `Datesortie` varchar(50) NOT NULL,
  `Genre` int(11) DEFAULT NULL,
  `Cover` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IN_GENRE` (`Genre`),
  KEY `IN_EDITEUR` (`Editeur`),
  KEY `IN_COVER` (`Cover`),
  KEY `IN_PANIER` (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jeuxpc`
--

INSERT INTO `jeuxpc` (`ID`, `Nom`, `Reference`, `Prix`, `Description`, `Editeur`, `Stock`, `Datesortie`, `Genre`, `Cover`) VALUES
(58, 'Tom Clancys Rainbow Six® Siege', '23DSX', 39.99, 'Plongez dans un gameplay explosif en 5c5, une compétition de haut niveau et des combats en JcJ en équipe captivants. Tom Clancy\'s Rainbow Six® Siege procure une expérience toujours plus étendue, avec des possibilités illimitées pour parfaire votre stratégie et mener votre équipe à la victoire.\r\n\r\nRainbow Six Siege est en constante évolution. Chaque nouvelle saison apporte du nouveau contenu, des agents et compétences qui changent la donne, ainsi que des événements, armes et cartes en jeu.\r\n\r\n', 4, 1, '18 fevrier 2020', 1, 2),
(59, 'Assassins Creed Valhalla', '232DMS', 59.99, 'Dans Assassin\'s Creed Valhalla, incarnez Eivor, Viking légendaire en quête de gloire. Explorez un monde ouvert splendide et dynamique, dans la violence de l’Angleterre médiévale. Partez en raids pour attaquer vos ennemis, améliorez votre campement et développez votre influence politique afin de mériter votre place parmi les dieux, au Valhalla. ', 4, 1, '10 novembre 2020', 2, 3),
(60, ' BeamNG ', '1243MS', 19.99, 'BeamNG.drive est un jeu de conduite incroyablement réaliste aux possibilités quasi infinies. Notre moteur physique « soft-body » simule chaque composant d\'un véhicule en temps réel, ce qui permet d\'obtenir un résultat fidèle à la réalité. Grâce à des années de conception méticuleuse, de recherche intensive et d\'expériences, BeamNG.drive reproduit de manière authentique le plaisir de la conduite dans le monde réel. ', 5, 1, '29 mai 2015 (accès anticipé)', 7, 4),
(61, 'Forza Horizon 4', '324DS', 69.99, 'Les saisons dynamiques changent tout sur le plus grand festival automobile au monde. En solo ou en équipe, explorez les magnifiques paysages du Royaume-Uni historique dans un monde ouvert partagé. Collectionnez, modifiez et pilotez plus de 450 voitures. Course, coup de pub, création et exploration, tracez votre propre chemin pour devenir une star d\'Horizon.', 6, 1, '9 octobre 2018', 8, 5),
(62, 'Valheim', '32DSQz', 16.79, 'Guerrier tombé au combat, les Valkyries ont emporté votre âme à Valheim, le dixième monde de la mythologie nordique. Vous êtes le nouveau gardien de ce purgatoire primordial, assiégé de toute part par les créatures du chaos et les ennemis jurés des dieux. Odin compte sur vous pour reconquérir Valheim.\r\n\r\nVos épreuves commencent au centre étrangement paisible de ce monde, mais la faveur des dieux récompenses les braves. Aventurez-vous dans d\'impénétrables forêts, hissez-vous au sommet d\'imposantes montagnes, collectez des matériaux pour forger des armes mortelles et des armures plus résistantes, ainsi que pour bâtir des camps et des fortifications. Construisez un puissant langskip et parcourez les vastes océans à la recherche de terres exotiques... mais prenez garde de ne pas naviguer trop loin...\r\n', 3, 1, ' 2 février 2021', 1, 1),
(85, 'Cyberpunk-2077 ', 'rsdffsd', 59.99, 'Cyberpunk 2077 est un jeu d’action-aventure en monde ouvert qui se déroule à Night City, une mégalopole obsédée par le pouvoir, la séduction et les modifications corporelles. Vous incarnez V, mercenaire hors-la-loi à la recherche d’un implant unique qui serait la clé de l’immortalité. Personnalisez les cyberlogiciels, les compétences et le style de jeu de votre personnage, et explorez cette ville immense où chacun de vos choix aura un impact direct sur l’histoire et le monde qui vous entoure.\'fs\'\'\'\'\'dfss\'\'\'', 12, 1, '10 décembre 2020', 1, 50),
(90, 'Grand Theft Auto V', 'GTAV', 24.99, 'Grand Theft Auto V sur PC offre aux joueurs la possibilité d\'explorer le monde de Los Santos et Blaine County en haute résolution (jusqu\'à 4K) et à 60 images par seconde.', 19, 1, '18 fevrier 2020', 1, 66),
(91, 'Evil Genius 2: World Domination', 'EVILGE', 39.99, 'Un jeu de stratégie d’espionnage parodique, dans lequel VOUS êtes un génie du mal ! Construisez votre base, formez vos sbires, empêchez les forces de la Justice de nuire à vos opérations et dominez le monde !', 46, 1, '30 mars 2021', 7, 94),
(92, 'FIFA 21', 'FIFA21', 59.99, 'Le football est de retour avec EA SPORTS FIFA 21, avec de nouvelles façons de vous associer dans la rue et dans les stades pour décrocher d’encore plus belles victoires avec vos amis.', 47, 1, '9 octobre 2020', 10, 96),
(93, 'Minecraft', 'MINC', 24.99, 'L\'intrigue du jeu est d\'une simplicité dérisoire : vous arrivez dans le jeu avec rien de plus que vos mains et un inventaire limité. Vous exploitez les mines pour recueillir des matériaux que vous utilisez ensuite pour fabriquer des outils et construire des maisons et d\'autres bâtiments.\r\n\r\nLes ressources vont des plus communes aux plus rares, et souvent les produits les plus rares et les plus précieux sont les plus difficiles à obtenir, ce qui nécessite une exploitation minière en profondeur et même la construction de tunnels renforcés pour empêcher les eaux de crue ou les chutes de pierres de vous faire reculer.\r\n\r\nIl n\'y a pas de scénario en tant que tel : c\'est à vous de décider de ce que vous voulez réaliser. Vous pouvez construire des villes, ou un manoir à la campagne, vous pouvez élever des moutons ou aller pêcher. Le jeu est exactement ce que vous et votre imagination voulez qu\'il soit.', 48, 1, '18 novembre 2011', 2, 97),
(94, 'Monster Hunter: World', 'MONSW', 29.99, 'Bienvenue dans le Nouveau Monde ! \"Monster Hunter: World\" offre une dimension de jeu et une liberté sans commune mesure avec les précédents épisodes. Les chasseurs pourront utiliser un arsenal varié pour chasser un bestiaire unique dans un monde fabuleux !', 51, 1, '9 août 2018', 1, 101),
(95, 'MotoGP 21', 'MOTO21', 49.99, 'Prenez place sur la grille de départ et préparez-vous pour le jeu MotoGP le plus réaliste et immersif jamais réalisé. Vivez des sensations de course à deux-roues authentiques avec MotoGP 21 !', 52, 1, '22 avril 2021', 8, 102),
(96, 'OUTRIDERS', 'OUTS1', 59.99, 'Les combats sauvages et sanglants d\'Outriders allient tirs frénétiques, pouvoirs violents et mécaniques de jeu de rôle complexes pour créer un véritable hybride de genres.', 53, 1, '1 avril 2021', 1, 103),
(97, 'Sea of Thieves', 'SOF1', 39.99, 'Sea of Thieves vous propose une aventure de pirate ultime avec un gameplay directement issu de l\'imaginaire de la piraterie : de la navigation, de l\'exploration et des chasses aux trésors. Comme les rôles ne sont pas prédéfinis, vous pourrez contribuer à ce monde comme il vous plaira.', 54, 1, '3 juin 2020', 2, 104),
(98, 'Microsoft Flight Simulator', 'MFC1', 47.99, 'Des appareils légers aux gros porteurs, pilotez des avions détaillés et fidèles dans la nouvelle génération de Microsoft Flight Simulator.', 54, 1, '18 août 2020', 7, 105);

-- --------------------------------------------------------

--
-- Structure de la table `produit_panier`
--

DROP TABLE IF EXISTS `produit_panier`;
CREATE TABLE IF NOT EXISTS `produit_panier` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_user` int(11) DEFAULT NULL,
  `ID_prod` int(11) DEFAULT NULL,
  `Etat_vente` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IN_user` (`ID_user`),
  KEY `IN_Prod` (`ID_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(50) NOT NULL,
  `Mdp` varchar(255) NOT NULL,
  `Prénom` varchar(50) DEFAULT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `DROIT` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `Pseudo`, `Mdp`, `Prénom`, `Nom`, `Email`, `DROIT`) VALUES
(17, 'dsz', '18ac3e7343f016890c510e93f935261169d9e3f565436429830faf0934f4f8e4', NULL, NULL, 'lul.fs@gmail.com', 0),
(18, 'lucas', 'a8bd4f12188fdc6a0a789f58dbd76030c2fa05224d1f1f3b50d86aebe6102489', 'Lucas', 'Taranne', 'lucas.taranne@gmail.com', 1),
(19, 'roumain', 'ed17b4e8a754be68b1d37f10eaa621680dfffffc07aa4983d9833ff79eda289f', NULL, NULL, 'roumain@roumain.fr', 0),
(20, 'lol', '07123e1f482356c415f684407a3b8723e10b2cbbc0b8fcd6282c49d37c9c1abc', NULL, NULL, 'lol@lol.lol', 0),
(21, 'testip', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', NULL, NULL, 'roumain@dsd.fr', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `jeuxpc`
--
ALTER TABLE `jeuxpc`
  ADD CONSTRAINT `jeuxpc_ibfk_1` FOREIGN KEY (`Genre`) REFERENCES `genre` (`ID`),
  ADD CONSTRAINT `jeuxpc_ibfk_2` FOREIGN KEY (`Editeur`) REFERENCES `editeur` (`ID`),
  ADD CONSTRAINT `jeuxpc_ibfk_3` FOREIGN KEY (`Cover`) REFERENCES `cover` (`ID`);

--
-- Contraintes pour la table `produit_panier`
--
ALTER TABLE `produit_panier`
  ADD CONSTRAINT `produit_panier_ibfk_3` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `produit_panier_ibfk_4` FOREIGN KEY (`ID_prod`) REFERENCES `jeuxpc` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
