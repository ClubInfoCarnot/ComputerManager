-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.11.7-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage de la structure de la table computer-manager. computer-inventory
DROP TABLE IF EXISTS `computer-inventory`;
CREATE TABLE IF NOT EXISTS `computer-inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  `brand` varchar(64) DEFAULT NULL,
  `model` varchar(64) DEFAULT NULL,
  `serial-number` varchar(64) DEFAULT NULL,
  `mac-address` varchar(64) DEFAULT NULL,
  `entry-date` varchar(50) DEFAULT NULL,
  `leave-date` varchar(64) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `recipient` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table computer-manager.computer-inventory : ~1 rows (environ)
DELETE FROM `computer-inventory`;
INSERT INTO `computer-inventory` (`id`, `type`, `brand`, `model`, `serial-number`, `mac-address`, `entry-date`, `leave-date`, `state`, `recipient`) VALUES
	(1, '1', 'MSI', 'G41M-P25', '1234', '8C:89:A5:5A:C9:61', '1712415612', '1712518301', 1, 1);

-- Listage de la structure de la table computer-manager. computer-type
DROP TABLE IF EXISTS `computer-type`;
CREATE TABLE IF NOT EXISTS `computer-type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visual-name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table computer-manager.computer-type : ~2 rows (environ)
DELETE FROM `computer-type`;
INSERT INTO `computer-type` (`id`, `visual-name`) VALUES
	(1, 'Ordinateur Portable'),
	(2, 'Ordinateur de Bureau');

-- Listage de la structure de la table computer-manager. recipient
DROP TABLE IF EXISTS `recipient`;
CREATE TABLE IF NOT EXISTS `recipient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL DEFAULT 'Aucun Nom',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table computer-manager.recipient : ~1 rows (environ)
DELETE FROM `recipient`;
INSERT INTO `recipient` (`id`, `name`) VALUES
	(1, 'Ecole de Pernes');

-- Listage de la structure de la table computer-manager. state
DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visual-name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table computer-manager.state : ~2 rows (environ)
DELETE FROM `state`;
INSERT INTO `state` (`id`, `visual-name`) VALUES
	(1, 'Nettoyage'),
	(2, 'Configuration');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
