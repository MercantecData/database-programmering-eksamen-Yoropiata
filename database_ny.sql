-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for databaseexam
CREATE DATABASE IF NOT EXISTS `databaseexam` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `databaseexam`;

-- Dumping structure for table databaseexam.adminusers
CREATE TABLE IF NOT EXISTS `adminusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table databaseexam.adminusers: ~0 rows (approximately)
/*!40000 ALTER TABLE `adminusers` DISABLE KEYS */;
INSERT INTO `adminusers` (`id`, `username`, `password`) VALUES
	(1, 'admin', 'admin');
/*!40000 ALTER TABLE `adminusers` ENABLE KEYS */;

-- Dumping structure for table databaseexam.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imageURL` varchar(255) NOT NULL,
  `owner` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `foreign key` (`owner`),
  CONSTRAINT `foreign key` FOREIGN KEY (`owner`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table databaseexam.images: ~7 rows (approximately)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `imageURL`, `owner`) VALUES
	(1, 'https://imgix.ranker.com/user_node_img/50047/1000931305/original/x-wing-photo-u1?w=650&q=50&fm=jpg&fit=crop&crop=faces', 1),
	(3, 'https://imgix.ranker.com/user_node_img/50047/1000931306/original/vader-and-39-s-tie-fighter-photo-u1?w=650&q=50&fm=jpg&fit=crop&crop=faces', 1),
	(5, 'https://imgix.ranker.com/user_node_img/50047/1000931296/original/slave-i-photo-u1?w=650&q=60&fm=jpg&fit=crop&crop=faces', 1),
	(6, 'http://static.tvtropes.org/pmwiki/pub/images/friendship_is_magic_newpageimage_1684.png', 2);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping structure for table databaseexam.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `salt` text NOT NULL,
  `hash` text NOT NULL,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

-- Dumping data for table databaseexam.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `salt`, `hash`, `name`) VALUES
	(1, 'kyloren', 'xUxWTTjm++VwuGaVVbqNbWONLDsk+LdWlhYeliqS92uvg8wGdyFuoJSB5wxNIZ6n5PflZ8o7LEpwZXvULDrRIQ==', 'K7tG5+0KnflHIbj98+8DVKUVIEKneEP9lJok2uPsGkWGadlKwypN5UhA1AoTWEL3qRSj7J7RnLJgoeBbKiW3Ew==', 'Ben Solo'),
	(2, 'fShy34', 'zP1yn4XaTroThvL/LkjuIQ1P1rq7l6POqeGFJN4na2QIezrBGplYsmg2ETIg03vIVATtzkmBCj86aAVP46fruw==', 'poDU5M0vwrPYU4tbh6T3Pn/e7v1HBaZ2TW1uhsb4SOibyUY18luhqXoU9CO1FyaHy1n/dP5sbPGTVdC4aIk4Pg==', 'Fluttershy');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
