-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for liga
CREATE DATABASE IF NOT EXISTS `liga` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `liga`;

-- Dumping structure for table liga.klub
CREATE TABLE IF NOT EXISTS `klub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_klub` varchar(50) DEFAULT NULL,
  `kota_klub` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table liga.pertandingan
CREATE TABLE IF NOT EXISTS `pertandingan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pertandingan` varchar(512) DEFAULT NULL,
  `id_klub` int(11) DEFAULT NULL,
  `gk` int(11) DEFAULT NULL,
  `gm` int(11) DEFAULT NULL,
  `poin` int(11) DEFAULT NULL,
  `menang` int(11) DEFAULT NULL,
  `seri` int(11) DEFAULT NULL,
  `kalah` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
