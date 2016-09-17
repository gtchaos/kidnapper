# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.7.14)
# Database: homestead
# Generation Time: 2016-09-17 13:49:26 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table relations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `relations`;

CREATE TABLE `relations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `part` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `source_id` int(11) NOT NULL,
  `word_id` int(11) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `relations` WRITE;
/*!40000 ALTER TABLE `relations` DISABLE KEYS */;

INSERT INTO `relations` (`id`, `part`, `source_id`, `word_id`, `reply_id`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'0',0,1,1,0,NULL,NULL),
	(2,'0',0,2,17,0,NULL,NULL),
	(3,'0',0,3,27,0,NULL,NULL),
	(4,'1.1',1,4,2,3,NULL,NULL),
	(5,'1.2',1,5,3,0,NULL,NULL),
	(6,'1.3',1,6,13,0,NULL,NULL),
	(7,'1.2.1',5,7,4,0,NULL,NULL),
	(8,'1.2.2',5,8,8,4,NULL,NULL),
	(9,'1.2.3',5,9,9,0,NULL,NULL),
	(10,'1.2.1.1',7,10,5,3,NULL,NULL),
	(11,'1.2.1.2',7,11,6,2,NULL,NULL),
	(12,'1.2.1.3',7,12,7,1,NULL,NULL),
	(13,'1.2.3.1',9,13,10,3,NULL,NULL),
	(14,'1.2.3.2',9,14,11,4,NULL,NULL),
	(15,'1.2.3.3',9,15,12,3,NULL,NULL),
	(16,'1.3.1',6,16,14,3,NULL,NULL),
	(17,'1.3.2',6,17,15,1,NULL,NULL),
	(18,'1.3.3',6,18,16,5,NULL,NULL),
	(19,'2.1',2,19,18,0,NULL,NULL),
	(20,'2.2',2,20,25,3,NULL,NULL),
	(21,'2.3',2,21,26,4,NULL,NULL),
	(22,'2.1.1',19,22,19,0,NULL,NULL),
	(23,'2.1.2',19,23,23,3,NULL,NULL),
	(24,'2.1.3',19,24,24,2,NULL,NULL),
	(25,'2.1.1.1',22,25,20,5,NULL,NULL),
	(26,'2.1.1.2',22,26,21,2,NULL,NULL),
	(27,'2.1.1.3',22,27,22,4,NULL,NULL),
	(28,'3.1',3,28,28,0,NULL,NULL),
	(29,'3.2',3,29,32,0,NULL,NULL),
	(30,'3.3',3,30,39,0,NULL,NULL),
	(31,'3.1.1',28,31,29,1,NULL,NULL),
	(32,'3.1.2',28,32,30,3,NULL,NULL),
	(33,'3.1.3',28,33,31,0,NULL,NULL),
	(34,'3.1.3.1',33,46,0,5,NULL,NULL),
	(35,'3.1.3.2',33,47,0,4,NULL,NULL),
	(36,'3.2.1',29,34,33,0,NULL,NULL),
	(37,'3.2.2',29,35,34,4,NULL,NULL),
	(38,'3.2.3',29,36,35,0,NULL,NULL),
	(39,'3.2.1.1',34,48,0,2,NULL,NULL),
	(40,'3.2.3.1',36,37,36,5,NULL,NULL),
	(41,'3.2.3.2',36,38,37,2,NULL,NULL),
	(42,'3.2.3.3',36,39,38,4,NULL,NULL),
	(43,'3.3.1',30,40,40,3,NULL,NULL),
	(44,'3.3.2',30,41,41,0,NULL,NULL),
	(45,'3.3.3',30,42,42,5,NULL,NULL),
	(46,'3.3.2.1',41,43,0,5,NULL,NULL),
	(47,'3.3.2.2',41,44,0,4,NULL,NULL);

/*!40000 ALTER TABLE `relations` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
