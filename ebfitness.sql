/*
SQLyog Community v13.1.8 (64 bit)
MySQL - 8.0.21 : Database - ebfitness
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ebfitness` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `ebfitness`;

/*Table structure for table `accounts` */

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `account_workoutplan_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_account_workout_plan` (`account_workoutplan_id`),
  CONSTRAINT `fk_account_workout_plan` FOREIGN KEY (`account_workoutplan_id`) REFERENCES `workout_plans` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `accounts` */

insert  into `accounts`(`id`,`name`,`status`,`created_at`,`account_workoutplan_id`) values 
(15,'Armin','ACTIVE','2022-01-06 14:02:10',9),
(22,'Tarik Dragunic','ACTIVE','2022-01-11 14:01:58',4),
(23,'Edina','ACTIVE','2022-01-05 14:02:04',4),
(26,'Burko Caffe Company','ACTIVE','2022-01-13 10:29:04',5),
(28,'Mujo Company','ACTIVE','2022-01-13 11:04:46',10),
(29,'Aldin Company','PENDING','2022-01-13 12:40:30',11),
(133,'Merjem','ACTIVE','2022-01-19 10:08:00',10),
(245,'Emir Beba','ACTIVE','2022-02-09 10:20:48',5);

/*Table structure for table `instructors` */

DROP TABLE IF EXISTS `instructors`;

CREATE TABLE `instructors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(512) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `surname` varchar(512) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `job_description` varchar(512) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `awards` varchar(512) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `phone_number` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `instructors` */

insert  into `instructors`(`id`,`name`,`surname`,`job_description`,`awards`,`phone_number`) values 
(3,'Aleksandar ','Rakic','MMA Coach','UFC LHW Champion','062/223-322'),
(4,'Darko ','Stosic','Strength Trainer','/','062/123-321'),
(5,'Roberto ','Soldic','Condition Trainer','Marathon Winner','062/222-123'),
(6,'Khabib ','Nurmagomedov','Wrestling Coach','Olympic Wrestling Champion','062/444-122'),
(7,'Francis ','Ngannou','Boxing Coach','Former Heavyweight Champion','062/462-124'),
(8,'Richard ','Staudner','Mobility Coach','Bachelor of Sport, Health and Physical Activity','062/872-125'),
(10,'Petr','Yan','Flexibility and Balance Coach','Bachelor of Sport','062/333-127');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(512) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(1024) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'PENDING',
  `role` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'USER',
  `created_at` timestamp NULL DEFAULT NULL,
  `token` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `token_created_at` timestamp NULL DEFAULT NULL,
  `account_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_user_email` (`email`),
  KEY `fk_user_account` (`account_id`),
  CONSTRAINT `fk_user_account_id` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`status`,`role`,`created_at`,`token`,`token_created_at`,`account_id`) values 
(14,'Armin Sarak','arkegoku@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','ACTIVE','USER','2022-02-01 09:03:54',NULL,NULL,15),
(15,'Edina Beba','edina.b@lok.ba','827ccb0eea8a706c4c34a16891f84e7b','ACTIVE','USER','2022-02-02 09:04:01',NULL,NULL,23),
(18,'Tarik Dragunic','tarik.dragunic@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','ACTIVE','USER','2022-02-03 09:04:20',NULL,NULL,22),
(19,'Kenan Burko','kenburko@gmail.com','cd3d7d5a7cc0cbd0bd472f36257bed00','ACTIVE','USER','2022-01-13 10:29:04','7364a6ff75bfb948b2638a899934f42d','2022-02-09 08:34:59',26),
(21,'Mujo Sarak','mujos@gmail.com','c5fe25896e49ddfe996db7508cf00534','ACTIVE','USER_READ_ONLY','2022-01-13 11:04:46','d8c20847130674cd50969d84d892201d','2022-01-29 16:28:05',28),
(22,'Aldin Kovacevic','aldinkov@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','PENDING','USER','2022-01-13 12:40:30','fd0c6bf0e31abfd410ff9b03f18bd345',NULL,29),
(111,'Merjem kapo','merjemk@gmail.com','f484775225b3c48748165828cd6fc53c','ACTIVE','ADMIN','2022-01-19 10:08:01','1ce35c734029b8197560c5ab580430b0','2022-01-29 16:21:28',133),
(214,'Emir Beba','emir.beba@stu.ibu.edu.ba','8b14bd2444dc8c78f4a721f10fa10ecb','ACTIVE','ADMIN','2022-02-09 10:20:48','590e5f491511f90f26e4ad2f714b3cbe',NULL,245);

/*Table structure for table `workout_plans` */

DROP TABLE IF EXISTS `workout_plans`;

CREATE TABLE `workout_plans` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(512) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` varchar(1024) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL,
  `instructor_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_workoutplan_name` (`name`),
  KEY `fk_workoutplan_instructor_id` (`instructor_id`),
  CONSTRAINT `fk_workoutplan_instructor_id` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `workout_plans` */

insert  into `workout_plans`(`id`,`name`,`description`,`created_at`,`instructor_id`) values 
(4,'MMA Plan','Learn MMA','2022-01-13 09:57:20',3),
(5,'Wrestling Plan','Wrestling classes and tacktics','2022-01-13 10:15:20',6),
(9,'Plan for Strength','Improving strength','2022-01-12 10:16:34',4),
(10,'Boxing Plan','Learn Boxing basics','2022-01-19 10:17:32',7),
(11,'Plan for Condition','Increase your condition','2022-02-10 09:51:43',5),
(112,'Bodybuilding','Increase your muscle tone','2022-02-10 10:51:47',8);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
