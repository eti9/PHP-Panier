-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 22, 2023 at 05:05 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-panier`
--

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `FactureID` int NOT NULL,
  `ProduitID` int NOT NULL,
  `Username` varchar(100) NOT NULL,
  `NbItem` int NOT NULL,
  `DateAchat` date NOT NULL,
  PRIMARY KEY (`FactureID`,`ProduitID`,`Username`),
  KEY `fk_produit_facture` (`ProduitID`),
  KEY `fk_user_facture` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `facture`
--

INSERT INTO `facture` (`FactureID`, `ProduitID`, `Username`, `NbItem`, `DateAchat`) VALUES
(1, 3, 'etienne', 3, '2023-03-21'),
(2, 2, 'etienne', 2, '2023-03-21'),
(2, 3, 'etienne', 2, '2023-03-21'),
(3, 5, 'admin', 1, '2023-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `ProduitID` int NOT NULL,
  `NbItem` int NOT NULL,
  `Username` varchar(100) NOT NULL,
  PRIMARY KEY (`ProduitID`,`Username`) USING BTREE,
  KEY `fk_user` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`ProduitID`, `NbItem`, `Username`) VALUES
(1, 3, 'etienne');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `ProduitID` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `PrixUnitaire` decimal(10,2) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `NbDisponible` int NOT NULL,
  PRIMARY KEY (`ProduitID`)
) ;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`ProduitID`, `Nom`, `Description`, `PrixUnitaire`, `Image`, `NbDisponible`) VALUES
(1, 'USB C Gris', 'Voici votre nouveau câble USB résistant. L\'extrémité en caoutchouc de LILLHULT augmente sa souplesse et le câble en textile noué de façon serré lui permet de mieux résister à l\'usure quotidienne. La boucle élastique permet de ne pas l\'emmêler.', '19.99', 'USB-C-Gris.jpg', 7),
(2, 'Haute vitesse HDMI 2', 'Prise en charge du format 4K2K @ 60Hz HDR / 3D / 1080p / 1080i / 720p Prise en charge du format HDCP / EDID / CEC / DDC audio Prise en charge du débit audio: 18 Gbps Blu-ray, DVR, projecteur, jeux vidéo, ordinateurs et téléphones mobiles au format 4K @ 60', '117.99', 'HDMI.PNG', 4),
(3, 'USB 2.0 NOIR', '-Décharge de traction moulée <br>\r\n-USB mâle à micro USB 5 broches mâle <br>\r\n-Câble USB 2.0 haute vitesse, jusqu\'à 480 Mbps <br>\r\n-100% de conformité aux spécifications USB  actuelle', '1.99', 'USB20NOIR', 25),
(4, 'Iphone COLORER', '-Enchevêtrement gratuit et léger<br>\r\n-Veste en nylon tressé de qualité industrielle<br>\r\n-Durabilité exceptionnelle avec une durée de vie de 6 000+<br>\r\n-Résister à mâcher, plier, emmêler, température extrême<br>\r\n', '14.99', 'IPHONECOULEUR.PNG', 200),
(5, 'DisplayPort DP Câble', '- Connecte un DisplayPort (DP) équipé dans un ordinateur avec un moniteur ou un projecteur HD par port DisplayPort comme entrée <br>\r\n- Transmettre les audios et les vidéos HD de votre ordinateur à un moniteur pour le streaming vidéo ou de jeux; Connecter', '11.99', 'displayport.png', 1999);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Prenom`, `Nom`, `Password`, `Email`) VALUES
('admin', 'e', 'e', 'admin', 'etienno.robert@hotma'),
('etienne', 'Etienne', 'Robert', 'etienne', NULL),
('etienne2', 'a', 'a', 'aa', 'etienno.robert@hotma');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `fk_produit_facture` FOREIGN KEY (`ProduitID`) REFERENCES `produit` (`ProduitID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_facture` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `fk_produit` FOREIGN KEY (`ProduitID`) REFERENCES `produit` (`ProduitID`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
