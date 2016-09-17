# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.7.14)
# Database: homestead
# Generation Time: 2016-09-16 15:26:58 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table negotiators
# ------------------------------------------------------------

DROP TABLE IF EXISTS `negotiators`;

CREATE TABLE `negotiators` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `part` int(11) NOT NULL,
  `word` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `negotiators` WRITE;
/*!40000 ALTER TABLE `negotiators` DISABLE KEYS */;

INSERT INTO `negotiators` (`id`, `part`, `word`, `created_at`, `updated_at`)
VALUES
	(1,0,'So,could you please tell me why you do this?',NULL,NULL),
	(2,0,'Fine day,isn’t it?',NULL,NULL),
	(3,0,'Hey,what are you doing?',NULL,NULL),
	(4,0,'Come on!You misunderstand us!We are not robbers!',NULL,NULL),
	(5,0,'Been there,done that.What else you got?',NULL,NULL),
	(6,0,'Wait!We can sign an agreement!',NULL,NULL),
	(7,0,'Do you have any brothers or sisters?',NULL,NULL),
	(8,0,'You’re terribly awful to do this.',NULL,NULL),
	(9,0,'You can’t revenge on others life.',NULL,NULL),
	(10,0,'They love you.They are not willing to see you as a murder.',NULL,NULL),
	(11,0,'Mary is also our sister.You won’t kill your loved ones,right?',NULL,NULL),
	(12,0,'Please,please…Leave our sister Mary to us.We will appreciate you all the time.',NULL,NULL),
	(13,0,'You are absolutely not a bad guy.We can have a talk',NULL,NULL),
	(14,0,'You will be arrested as a murder then.',NULL,NULL),
	(15,0,'It’s evil and unethical.',NULL,NULL),
	(16,0,'You must be kidding.We can be friends to live here together.',NULL,NULL),
	(17,0,'Calm down please.We could exchange conditions fairly.',NULL,NULL),
	(18,0,'How can we do that right now?!We can give out all treasures to exchange our partner.',NULL,NULL),
	(19,0,'Somebody is having a bad day.',NULL,NULL),
	(20,0,'Someone don’t enjoy the sunshine,but choose to play jokes,right?',NULL,NULL),
	(21,0,'Didn’t you know that there is a crime?Holy Shit.',NULL,NULL),
	(22,0,'But you are not so good at the same time,right?',NULL,NULL),
	(23,0,'You can’t give up yourself.Please don’t do silly things.',NULL,NULL),
	(24,0,'But maybe we can have a big dinner and enjoy good mood!',NULL,NULL),
	(25,0,'OK,We will give out all the treasures.Leave our partner.',NULL,NULL),
	(26,0,'We can offer you some help,especially a solution.',NULL,NULL),
	(27,0,'Don\'t over do it.We have no money.',NULL,NULL),
	(28,0,'Please don’t play tricks on us.She is so afraid.',NULL,NULL),
	(29,0,'Hey,why not join us together to be a wonderful group?',NULL,NULL),
	(30,0,'We are not familiar with your homeland.If we do something wrong,please tell us.',NULL,NULL),
	(31,0,'We can have a gentle talk about this big event.',NULL,NULL),
	(32,0,'It’s useless to solve the problem.And you will get hurt at the same time.',NULL,NULL),
	(33,0,'Calm down please.We can communicate about how to solve the situation.',NULL,NULL),
	(34,0,'We can do anything together,for example,have a big dinner first.',NULL,NULL),
	(35,0,'To prevent you from the crime maybe the first step.',NULL,NULL),
	(36,0,'To protect you and your family for happiness.',NULL,NULL),
	(37,0,'OK,We will give out all the treasures.Leave our partner.',NULL,NULL),
	(38,0,'We can offer you some help,especially a solution.',NULL,NULL),
	(39,0,'Don\'t over do it.We have no money.',NULL,NULL),
	(40,0,'You must make a mistake.We are not robbers.',NULL,NULL),
	(41,0,'We can explain all to you.Please trust us!',NULL,NULL),
	(42,0,'We can give out all treasures to exchange our partner.Just let us leave.',NULL,NULL),
	(43,0,'OK,I will take out all things to exchange.',NULL,NULL),
	(44,0,'We have no money.Please give us some time.',NULL,NULL),
	(46,0,'OK,I will take out all things to exchange.',NULL,NULL),
	(47,0,'We have no money.Please give us some time.',NULL,NULL),
	(48,0,'Sure, let\'s go!',NULL,NULL);

/*!40000 ALTER TABLE `negotiators` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
