/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 8.0.32 : Database - coveragecompletedb
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
  `Answers_ID` INT NOT NULL AUTO_INCREMENT,
  `Location_ID` INT NOT NULL,
  PRIMARY KEY (`Answers_ID`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `answers` */

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `Category_ID` INT NOT NULL AUTO_INCREMENT,
  `Description` VARCHAR(254) NOT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `category` */

/*Table structure for table `client` */

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client` (
  `Client_ID` INT NOT NULL AUTO_INCREMENT,
  `Mailing_Address` VARCHAR(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Client_Name` VARCHAR(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Email_Address` VARCHAR(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Phone_Number` INT NOT NULL,
  `Coverage_Review` VARCHAR(64) DEFAULT NULL,
  `Broker_ID` VARCHAR(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Company_Name` VARCHAR(64) DEFAULT NULL,
  `Notes` VARCHAR(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`Client_ID`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `client` */

INSERT  INTO `client`(`Client_ID`,`Mailing_Address`,`Client_Name`,`Email_Address`,`Phone_Number`,`Coverage_Review`,`Broker_ID`,`Company_Name`,`Notes`) VALUES 
(1,'123 ST','Kevin Chubb','fakeemail.com',403892454,'1','Chubb',NULL,NULL),
(2,'MayorGrath','Pozy','firestone.com',42324748,'1',NULL,NULL,NULL),
(3,'College Drive','Barry','barry.cit',59542394,'1','Barrel',NULL,NULL);

/*Table structure for table `client_coverage` */

DROP TABLE IF EXISTS `client_coverage`;

CREATE TABLE `client_coverage` (
  `Client_ID` INT NOT NULL AUTO_INCREMENT,
  `Contents` INT DEFAULT NULL,
  `Sewer_Backup` INT DEFAULT NULL,
  `Flood` INT DEFAULT NULL,
  `Earthquake` INT DEFAULT NULL,
  `Equipment_Breakdown` INT DEFAULT NULL,
  `Crime` INT DEFAULT NULL,
  `CGL_NOA` INT DEFAULT NULL,
  `Business_Interruption` INT DEFAULT NULL,
  `Cyber_Incl_Social_Eng` INT DEFAULT NULL,
  `Tenants_Legal_Liability` INT DEFAULT NULL,
  `Spoilage` INT DEFAULT NULL,
  PRIMARY KEY (`Client_ID`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `client_coverage` */

INSERT  INTO `client_coverage`(`Client_ID`,`Contents`,`Sewer_Backup`,`Flood`,`Earthquake`,`Equipment_Breakdown`,`Crime`,`CGL_NOA`,`Business_Interruption`,`Cyber_Incl_Social_Eng`,`Tenants_Legal_Liability`,`Spoilage`) VALUES 
(1,100000,0,0,0,2000000,0,0,0,0,0,500000),
(2,50000,0,0,0,100000,0,0,0,0,0,1500000),
(3,NULL,0,0,0,0,0,0,0,0,0,0);

/*Table structure for table `client_location` */

DROP TABLE IF EXISTS `client_location`;

CREATE TABLE `client_location` (
  `Location_ID` INT NOT NULL AUTO_INCREMENT,
  `Client_ID` INT NOT NULL,
  `Alias` VARCHAR(64) NOT NULL,
  `Physical_Address` VARCHAR(254) NOT NULL,
  `Answers_ID` INT NOT NULL,
  `Location_Phone` INT NOT NULL,
  PRIMARY KEY (`Location_ID`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `client_location` */

INSERT  INTO `client_location`(`Location_ID`,`Client_ID`,`Alias`,`Physical_Address`,`Answers_ID`,`Location_Phone`) VALUES 
(1,1,'SRI','123 ST',1,123321),
(2,2,'Firestone','MayorGrath',1,5323564),
(3,3,'College','College Drive',1,53453523);

/*Table structure for table `coverage` */

DROP TABLE IF EXISTS `coverage`;

CREATE TABLE `coverage` (
  `Coverage_ID` INT NOT NULL AUTO_INCREMENT,
  `Coverage_Name` VARCHAR(254) NOT NULL,
  `Coverage_Limit` VARCHAR(254) NOT NULL,
  `Coverage_Name_Insert` VARCHAR(254) NOT NULL,
  `Coverage_Description` VARCHAR(254) DEFAULT 'Balls',
  PRIMARY KEY (`Coverage_ID`)
) ENGINE=INNODB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `coverage` */

INSERT  INTO `coverage`(`Coverage_ID`,`Coverage_Name`,`Coverage_Limit`,`Coverage_Name_Insert`,`Coverage_Description`) VALUES 
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
  `Provider_ID` INT NOT NULL,
  `Option_ID` INT NOT NULL,
  `On` TINYINT(1) DEFAULT NULL,
  `Applicable` TINYINT(1) DEFAULT NULL,
  `Limit` INT DEFAULT NULL,
  `Offer_Date` DATETIME DEFAULT NULL,
  `Decline_Date` DATETIME DEFAULT NULL,
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
  PRIMARY KEY (`Provider_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `provider` */

insert  into `provider`(`Provider_ID`) values 
(1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `user` */

insert  into `user`(`User_ID`,`User_Name`,`User_Type`,`Name`,`Phone_Number`,`Email_Address`,`Physical_Address`,`Pass_Word`) values 
(1,'RenzCatt','Admin','Renzo Cattoni',1234,'renzoman','lethy','Password1'),
(2,'SaltySpammer','Admin','Joel Reimer',438290,'joes address','swifty','Password1');

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
