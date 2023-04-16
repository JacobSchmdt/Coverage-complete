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

/*Table structure for table `answers` */

DROP TABLE IF EXISTS `answers`;

CREATE TABLE `answers` (
  `Answers_ID` int NOT NULL AUTO_INCREMENT,
  `Location_ID` int NOT NULL,
  PRIMARY KEY (`Answers_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `answers` */

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `Category_ID` int NOT NULL AUTO_INCREMENT,
  `Category_Name` varchar(254) NOT NULL,
  `Category_Name_Insert` varchar(254) NOT NULL,
  `Category_Limit` varchar(254) NOT NULL,
  `Category_Description` varchar(254) DEFAULT 'Balls',
  PRIMARY KEY (`Category_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `category` */

insert  into `category`(`Category_ID`,`Category_Name`,`Category_Name_Insert`,`Category_Limit`,`Category_Description`) values 
(1,'Comm. Building Owner','CommBuildingOwner','CommBuildOwn','Balls'),
(2,'Restaurant','Restaurant','Rest','Balls'),
(3,'Auto Garage','AutoGarage','AutoGar','Balls'),
(4,'Pub','Pub','Pub','Balls');

/*Table structure for table `client` */

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client` (
  `Client_ID` int NOT NULL AUTO_INCREMENT,
  `Mailing_Address` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Client_First_Name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Client_Last_Name` varchar(64) NOT NULL,
  `Email_Address` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Phone_Number` varchar(254) DEFAULT NULL,
  `Coverage_Review` varchar(64) DEFAULT NULL,
  `Broker_ID` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Company_Name` varchar(64) DEFAULT NULL,
  `Notes` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`Client_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `client` */

insert  into `client`(`Client_ID`,`Mailing_Address`,`Client_First_Name`,`Client_Last_Name`,`Email_Address`,`Phone_Number`,`Coverage_Review`,`Broker_ID`,`Company_Name`,`Notes`) values 
(1,'123 ST','Kevin','Chubb','fakeemail.com','403892454','1','Chubb',NULL,NULL),
(2,'MayorGrath','Pozy','Man','firestone.com','42324748','1',NULL,NULL,NULL),
(3,'College Drive','Barry','Lab','barry.cit','59542394','1','Barrel',NULL,NULL),
(9,'','nate','john','','','','renzcatt','hypertech','gdfbd'),
(10,'','Jeff','Bezos','','','','renzcatt','Amazon','A very nice man working for a very nice company'),
(11,'','Place','Holder','','','','renzcatt','None','Description'),
(12,'','Bruh','Bruh','','','','renzcatt','Bruh','Bruh');

/*Table structure for table `client_coverage` */

DROP TABLE IF EXISTS `client_coverage`;

CREATE TABLE `client_coverage` (
  `Client_ID` int NOT NULL AUTO_INCREMENT,
  `Contents` int DEFAULT NULL,
  `Sewer_Backup` int DEFAULT NULL,
  `Flood` int DEFAULT NULL,
  `Earthquake` int DEFAULT NULL,
  `Equipment_Breakdown` int DEFAULT NULL,
  `Crime` int DEFAULT NULL,
  `CGL_NOA` int DEFAULT NULL,
  `Business_Interruption` int DEFAULT NULL,
  `Cyber_Incl_Social_Eng` int DEFAULT NULL,
  `Tenants_Legal_Liability` int DEFAULT NULL,
  `Spoilage` int DEFAULT NULL,
  PRIMARY KEY (`Client_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `client_coverage` */

insert  into `client_coverage`(`Client_ID`,`Contents`,`Sewer_Backup`,`Flood`,`Earthquake`,`Equipment_Breakdown`,`Crime`,`CGL_NOA`,`Business_Interruption`,`Cyber_Incl_Social_Eng`,`Tenants_Legal_Liability`,`Spoilage`) values 
(1,100000,2000,0,0,2000000,0,10000,0,0,0,500000),
(2,50000,0,0,0,100000,0,0,0,0,0,1500000),
(3,NULL,0,0,0,0,0,0,0,0,0,0),
(9,10000000,0,0,0,0,0,0,0,0,0,0),
(10,1000000,0,10,0,0,0,0,0,0,0,0),
(11,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(12,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `client_location` */

DROP TABLE IF EXISTS `client_location`;

CREATE TABLE `client_location` (
  `Location_ID` int NOT NULL AUTO_INCREMENT,
  `Client_ID` int NOT NULL,
  `Alias` varchar(64) NOT NULL,
  `Physical_Address` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Location_Phone` varchar(254) DEFAULT NULL,
  `Provider` varchar(254) NOT NULL,
  PRIMARY KEY (`Location_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `client_location` */

insert  into `client_location`(`Location_ID`,`Client_ID`,`Alias`,`Physical_Address`,`Location_Phone`,`Provider`) values 
(1,1,'SRI','123 ST','123321','Intact'),
(2,2,'Firestone','MayorGrath','5323564','Portage'),
(3,3,'College','College Drive','53453523','SGI'),
(9,9,'hypertech','','','wawanesa'),
(10,10,'Amazon','','','Black Rock'),
(11,11,'None','','','Bur'),
(12,12,'Bruh','','','Bruh');

/*Table structure for table `coverage` */

DROP TABLE IF EXISTS `coverage`;

CREATE TABLE `coverage` (
  `Coverage_ID` int NOT NULL AUTO_INCREMENT,
  `Coverage_Name` varchar(254) NOT NULL,
  `Coverage_Limit` varchar(254) NOT NULL,
  `Coverage_Name_Insert` varchar(254) NOT NULL,
  `Coverage_Description` varchar(254) DEFAULT 'Balls',
  PRIMARY KEY (`Coverage_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `coverage` */

insert  into `coverage`(`Coverage_ID`,`Coverage_Name`,`Coverage_Limit`,`Coverage_Name_Insert`,`Coverage_Description`) values 
(1,'Contents','Cont','Contents','Balls'),
(2,'Sewer Backup','SwrBkup','Sewer_Backup','Balls'),
(3,'Flood','Fld','Flood','Balls'),
(4,'Earthquake','Erthqk','Earthquake','Balls'),
(5,'Equipment Breakdown','EquipBrkdwn','Equipment_Breakdown','Balls'),
(6,'Crime','Cr','Crime','Balls'),
(7,'CGL & NOA','CGL','CGL_NOA','Balls'),
(8,'Business Interruption','BuisIntr','Business_Interruption','Balls'),
(9,'Cyber Incl Social Eng','Cyber','Cyber_Incl_Social_Eng','Balls'),
(10,'Tenants Legal Liability','TenLiab','Tenants_Legal_Liability','Balls'),
(11,'Spoilage','Spoil','Spoilage','Balls');

/*Table structure for table `coverage_option` */

DROP TABLE IF EXISTS `coverage_option`;

CREATE TABLE `coverage_option` (
  `Provider_ID` int NOT NULL,
  `Option_ID` int NOT NULL,
  `On` tinyint(1) DEFAULT NULL,
  `Applicable` tinyint(1) DEFAULT NULL,
  `Limit` int DEFAULT NULL,
  `Offer_Date` datetime DEFAULT NULL,
  `Decline_Date` datetime DEFAULT NULL,
  PRIMARY KEY (`Provider_ID`,`Option_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `coverage_option` */

/*Table structure for table `location_category` */

DROP TABLE IF EXISTS `location_category`;

CREATE TABLE `location_category` (
  `Category_ID` int NOT NULL AUTO_INCREMENT,
  `Client_Location` varchar(254) NOT NULL,
  `Location_ID` int NOT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `location_category` */

/*Table structure for table `office` */

DROP TABLE IF EXISTS `office`;

CREATE TABLE `office` (
  `Office_ID` int NOT NULL AUTO_INCREMENT,
  `Physical_Address` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Office_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `office` */

/*Table structure for table `option` */

DROP TABLE IF EXISTS `option`;

CREATE TABLE `option` (
  `Option_ID` int NOT NULL AUTO_INCREMENT,
  `Description` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`Option_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `option` */

/*Table structure for table `policy` */

DROP TABLE IF EXISTS `policy`;

CREATE TABLE `policy` (
  `Policy_ID` int NOT NULL AUTO_INCREMENT,
  `Location_ID` int NOT NULL,
  `Broker_ID` int NOT NULL,
  `Status` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Policy_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `policy` */

insert  into `policy`(`Policy_ID`,`Location_ID`,`Broker_ID`,`Status`) values 
(1,1,1,'used'),
(2,2,2,'used'),
(3,3,3,'used'),
(4,4,3,'b');

/*Table structure for table `provider` */

DROP TABLE IF EXISTS `provider`;

CREATE TABLE `provider` (
  `Provider_ID` int NOT NULL AUTO_INCREMENT,
  `Provider_Name` varchar(64) NOT NULL,
  PRIMARY KEY (`Provider_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `provider` */

insert  into `provider`(`Provider_ID`,`Provider_Name`) values 
(1,'Intact'),
(2,'Wawanesa'),
(3,'Economical'),
(4,'Portage'),
(5,'Peace Hills'),
(6,'Northbridge'),
(7,'SGI');

/*Table structure for table `unused-coverage` */

DROP TABLE IF EXISTS `unused-coverage`;

CREATE TABLE `unused-coverage` (
  `Coverage_ID` int NOT NULL AUTO_INCREMENT,
  `Policy_ID` int NOT NULL,
  `Option_ID` int NOT NULL,
  `Provider_ID` int NOT NULL,
  `Location_ID` int NOT NULL,
  PRIMARY KEY (`Coverage_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `unused-coverage` */

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

/*Table structure for table `user_log` */

DROP TABLE IF EXISTS `user_log`;

CREATE TABLE `user_log` (
  `Transaction_ID` int NOT NULL AUTO_INCREMENT,
  `User_ID` int NOT NULL,
  `Time_In` datetime NOT NULL,
  `Time_Out` datetime NOT NULL,
  `IP_Address` int NOT NULL,
  PRIMARY KEY (`Transaction_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `user_log` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
