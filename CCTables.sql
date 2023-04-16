/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 8.0.30 : Database - coveragecompletedb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`coveragecompletedb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `coveragecompletedb`;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `User_ID` int NOT NULL AUTO_INCREMENT,
  `User_Name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `User_Type` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Phone_Number` int NOT NULL,
  `Email_Address` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Physical_Address` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Pass_Word` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `user` */

insert  into `user`(`User_ID`,`User_Name`,`User_Type`,`Name`,`Phone_Number`,`Email_Address`,`Physical_Address`,`Pass_Word`) values 
(1,'RenzCatt','Admin','Renzo Cattoni',123,'bot','Lethbridge','$2y$10$NfGPXeBXk5i824/mXI85Qu9c6f0W.LZ1z9LlUaJ2Anh.6Svvl50f2'),
(2,'SaltySpammer','Admin','Joel Reimer',123,'bot','Lethbridge','$2y$10$iYQEU5/iNwCqSXA2EHVqse7YIdOgBLZEUJpbuAPdDH/K3.9.bZ62a'),
(3,'kimball','Admin','bot',123,'bot','bot','$2y$10$m73HXsUSK9QbaSslHDpoleDJDhNnHBBk8mQ9ZFd3J73eBK/CYaweK'),
(4,'Tim','Broker','Tim',123,'bot','bot','$2y$10$Oarh7MWXNsykim7ZY3UAOOdfoJ0R9I.dNwtEW7ns7hb671COHqAsq'),
(5,'Balls','Admin','Ball',183813,'bot','Lethbridge','$2y$10$1zIVDSPjn.L2mr9yA6nd/uJegF2vz4m28se30Wf2UqC4RrECrswi2'),
(6,'Painframe','Admin','Zack',123456,'bot','Coaldale','$2y$10$CJVYayebubkpEgJfAfD62e.X2gLpsULFb0BL5EMEMnBnhjHyvw0lW'),
(7,'Joe','Broker','Joe',9494949,'bot','Lethbridge','$2y$10$WzcYbvD7o5OC0.6K2isBgOlve8Tuf7yynjumlfqoQ/Nr8QeFhLI8G'),
(8,'Adam','Broker','Adam',221212,'bot','Coaldale','$2y$10$S/xlG3mC3VQakzdkQO8zx.2G1Gh4.3bfVWczjzIjeTFSsZVEVVqjG');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
