# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.7.14)
# Database: homestead
# Generation Time: 2016-09-16 15:27:15 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table kidnappers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kidnappers`;

CREATE TABLE `kidnappers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `part` int(11) NOT NULL,
  `reply` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `kidnappers` WRITE;
/*!40000 ALTER TABLE `kidnappers` DISABLE KEYS */;

INSERT INTO `kidnappers` (`id`, `part`, `reply`, `created_at`, `updated_at`)
VALUES
	(1,0,'I hate you guys rob our resources and land.',NULL,NULL),
	(2,0,'You cheat us all the time.I won’t trust you anymore.',NULL,NULL),
	(3,0,'Err…I can punish you guys I guess.',NULL,NULL),
	(4,0,'Yeah.So what?',NULL,NULL),
	(5,0,'A murder?Hahahaha,I will show you what a murder looks like.',NULL,NULL),
	(6,0,'Err…yeah,maybe you are right.Go far away and I will leave her.',NULL,NULL),
	(7,0,'It’s OK.But take out all your treasures to show your sincerity.',NULL,NULL),
	(8,0,'Then you can see the awful result!',NULL,NULL),
	(9,0,'Why not？',NULL,NULL),
	(10,0,'It doesn’t work on me.I won’t trust your stupid words.',NULL,NULL),
	(11,0,'Dame it！I will show you right now.',NULL,NULL),
	(12,0,'Then I can show you what is evil.',NULL,NULL),
	(13,0,'So can you disappear right now?',NULL,NULL),
	(14,0,' Friends?Haha……But never friends!I won’t trust your stupid words.',NULL,NULL),
	(15,0,'OK.Then take out all your treasures to show your sincerity.',NULL,NULL),
	(16,0,'Sure it is.OK,then I will leave your partner.',NULL,NULL),
	(17,0,'Yeah,so what?',NULL,NULL),
	(18,0,'Not me,but you all.Hahahahaha.',NULL,NULL),
	(19,0,'Yeah,you are right.But I need money.',NULL,NULL),
	(20,0,'Sure it is.OK,then I will leave your partner.',NULL,NULL),
	(21,0,'Well,let me think.Take me out of the trouble.And l will leave your friend.',NULL,NULL),
	(22,0,'Then you can see the sad ending.',NULL,NULL),
	(23,0,'I like it!Are you afraid?',NULL,NULL),
	(24,0,'I want to have some wine first.So let’s go!',NULL,NULL),
	(25,0,'Yeah,death tricks is always exciting!',NULL,NULL),
	(26,0,'Then that’s the end.Hahahahaha.',NULL,NULL),
	(27,0,'Playing with your pretty partner.',NULL,NULL),
	(28,0,'Hahahaha.All I want is to revenge on you.',NULL,NULL),
	(29,0,'OK,but Please take out all your treasures to show your sincerity first.',NULL,NULL),
	(30,0,'I won’t trust your stupid words.I’m not afraid at all.',NULL,NULL),
	(31,0,'OK,so kill your partner or take out all your treasures?',NULL,NULL),
	(32,0,'So what can I get from you guys to do so?',NULL,NULL),
	(33,0,'Maybe…Err,OK,but you pay the bill,OK?',NULL,NULL),
	(34,0,'Dame it!I don’t need a teacher.',NULL,NULL),
	(35,0,'But we need money first.',NULL,NULL),
	(36,0,'Sure it is.OK,then I will leave your partner.',NULL,NULL),
	(37,0,'Well,let me think.Take me out of the trouble.And l will leave your friend.',NULL,NULL),
	(38,0,'Then you can see the sad ending.',NULL,NULL),
	(39,0,'You plunder our resources and land.I must revenge on you.',NULL,NULL),
	(40,0,'Stop your stupid words.I’m the god to punish you guys.',NULL,NULL),
	(41,0,'No excuse,but take out all your treasures to show your sincerity.',NULL,NULL),
	(42,0,'Sure.OK,fetch your friend back then.',NULL,NULL);

/*!40000 ALTER TABLE `kidnappers` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
