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
  `Answers_ID` int NOT NULL AUTO_INCREMENT,
  `Location_ID` int NOT NULL,
  PRIMARY KEY (`Answers_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `answers` */

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `Category_ID` int NOT NULL AUTO_INCREMENT,
  `Description` varchar(254) NOT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `category` */

/*Table structure for table `client` */

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client` (
  `Client_ID` int NOT NULL AUTO_INCREMENT,
  `Mailing_Address` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Client_Name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Email_Address` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Phone_Number` int NOT NULL,
  `Credit_Consent` tinyint(1) DEFAULT NULL,
  `Privacy_Consent` tinyint(1) DEFAULT NULL,
  `Coverage_Review` tinyint(1) DEFAULT NULL,
  `Notes` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`Client_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `client` */

insert  into `client`(`Client_ID`,`Mailing_Address`,`Client_Name`,`Email_Address`,`Phone_Number`,`Credit_Consent`,`Privacy_Consent`,`Coverage_Review`,`Notes`) values 
(1,'123 ST','Kevin Chubb','fakeemail.com',403892454,1,1,1,'Chubb'),
(2,'MayorGrath','Pozy','firestone.com',42324748,1,1,1,NULL),
(3,'College Drive','Barry','barry.cit',59542394,1,1,1,'Barrel');

/*Table structure for table `client_coverage` */

DROP TABLE IF EXISTS `client_coverage`;

CREATE TABLE `client_coverage` (
  `Client_ID` int NOT NULL AUTO_INCREMENT,
  `Contents` tinyint(1) DEFAULT NULL,
  `Sewer_Backup` tinyint(1) DEFAULT NULL,
  `Flood` tinyint(1) DEFAULT NULL,
  `Earthquake` tinyint(1) DEFAULT NULL,
  `Equipment_Breakdown` tinyint(1) DEFAULT NULL,
  `Crime` tinyint(1) DEFAULT NULL,
  `CGL&NOA` tinyint(1) DEFAULT NULL,
  `Business_Interruption` tinyint(1) DEFAULT NULL,
  `Cyber_Incl_Social_Eng` tinyint(1) DEFAULT NULL,
  `Tenants_Legal_Liability` tinyint(1) DEFAULT NULL,
  `Spoilage` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Client_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `client_coverage` */

insert  into `client_coverage`(`Client_ID`,`Contents`,`Sewer_Backup`,`Flood`,`Earthquake`,`Equipment_Breakdown`,`Crime`,`CGL&NOA`,`Business_Interruption`,`Cyber_Incl_Social_Eng`,`Tenants_Legal_Liability`,`Spoilage`) values 
(1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `client_location` */

DROP TABLE IF EXISTS `client_location`;

CREATE TABLE `client_location` (
  `Location_ID` int NOT NULL AUTO_INCREMENT,
  `Client_ID` int NOT NULL,
  `Alias` varchar(64) NOT NULL,
  `Physical_Address` varchar(254) NOT NULL,
  `Answers_ID` int NOT NULL,
  `Location_Phone` int NOT NULL,
  PRIMARY KEY (`Location_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `client_location` */

insert  into `client_location`(`Location_ID`,`Client_ID`,`Alias`,`Physical_Address`,`Answers_ID`,`Location_Phone`) values 
(1,1,'SRI','123 ST',1,123321),
(2,2,'Firestone','MayorGrath',1,5323564),
(3,3,'College','College Drive',1,53453523);

/*Table structure for table `coverage` */

DROP TABLE IF EXISTS `coverage`;

CREATE TABLE `coverage` (
  `Coverage_ID` int NOT NULL AUTO_INCREMENT,
  `Coverage_Name` varchar(254) NOT NULL,
  `Coverage_Limit` varchar(254) NOT NULL,
  PRIMARY KEY (`Coverage_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `coverage` */

insert  into `coverage`(`Coverage_ID`,`Coverage_Name`,`Coverage_Limit`) values 
(1,'Contents','$250K'),
(2,'Sewer Backup','$250K'),
(3,'Flood','$250K'),
(4,'Eathquake','$250K'),
(5,'Equipment Breakdown','$250K'),
(6,'Crime','$10K'),
(7,'CGL & NOA','$2M'),
(8,'Business Interruption','$550K'),
(9,'Cyber Incl Social Eng','$50K'),
(10,'Tenants Legal Liability','$250K'),
(11,'Spoilage','$250K');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `policy` */

insert  into `policy`(`Policy_ID`,`Location_ID`,`Broker_ID`,`Status`) values 
(1,1,1,'used'),
(2,2,2,'used'),
(3,3,3,'used');

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
