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

USE `coveragecompletedb`;

/*Table structure for table `answers` */

DROP TABLE IF EXISTS `answers`;

CREATE TABLE `answers` (
  `Answers_ID` int NOT NULL AUTO_INCREMENT,
  `Location_ID` int NOT NULL,
  PRIMARY KEY (`Answers_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `answers` */

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `Category_ID` int NOT NULL AUTO_INCREMENT,
  `Category_Name` varchar(254) NOT NULL,
  `Category_Name_Insert` varchar(254) NOT NULL,
  `Category_Limit` varchar(254) NOT NULL,
  `Category_Description` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  PRIMARY KEY (`Category_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `category` */

insert  into `category`(`Category_ID`,`Category_Name`,`Category_Name_Insert`,`Category_Limit`,`Category_Description`) values 
(1,'Comm. Building Owner','CommBuildingOwner','CommBuildOwn','Commercial Building Owners'),
(2,'Restaurant','Restaurant','Rest','Restaurant'),
(3,'Auto Garage','AutoGarage','AutoGar','Automotive Repair Garage'),
(4,'Pub','Pub','Pub','Pub');

/*Table structure for table `category_coverages` */

DROP TABLE IF EXISTS `category_coverages`;

CREATE TABLE `category_coverages` (
  `Category_ID` tinyint(1) NOT NULL AUTO_INCREMENT,
  `Contents` tinyint(1) DEFAULT NULL,
  `Sewer_Backup` tinyint(1) DEFAULT NULL,
  `Flood` tinyint(1) DEFAULT NULL,
  `Earthquake` tinyint(1) DEFAULT NULL,
  `Equipment_Breakdown` tinyint(1) DEFAULT NULL,
  `Crime` tinyint(1) DEFAULT NULL,
  `CGL_NOA` tinyint(1) DEFAULT NULL,
  `Business_Interruption` tinyint(1) DEFAULT NULL,
  `Cyber_Incl_Social_Eng` tinyint(1) DEFAULT NULL,
  `Tenants_Legal_Liability` tinyint(1) DEFAULT NULL,
  `Spoilage` tinyint(1) DEFAULT NULL,
  `Building` tinyint(1) DEFAULT NULL,
  `Stock` tinyint(1) DEFAULT NULL,
  `Liquor_Liability` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `category_coverages` */

insert  into `category_coverages`(`Category_ID`,`Contents`,`Sewer_Backup`,`Flood`,`Earthquake`,`Equipment_Breakdown`,`Crime`,`CGL_NOA`,`Business_Interruption`,`Cyber_Incl_Social_Eng`,`Tenants_Legal_Liability`,`Spoilage`,`Building`,`Stock`,`Liquor_Liability`) values 
(1,1,1,1,1,1,1,1,NULL,1,NULL,NULL,1,NULL,NULL),
(2,1,1,1,1,1,1,1,1,1,NULL,1,NULL,1,1),
(3,NULL,NULL,NULL,NULL,1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL),
(4,1,1,1,1,1,1,1,1,1,NULL,1,NULL,1,1);

/*Table structure for table `client` */

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client` (
  `Client_ID` varchar(254) NOT NULL,
  `Mailing_Address` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Client_First_Name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Client_Last_Name` varchar(64) NOT NULL,
  `Email_Address` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Phone_Number` varchar(254) DEFAULT NULL,
  `Coverage_Review` varchar(64) DEFAULT NULL,
  `Broker_ID` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Company_Name` varchar(64) DEFAULT NULL,
  `Notes` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Client_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `client` */

insert  into `client`(`Client_ID`,`Mailing_Address`,`Client_First_Name`,`Client_Last_Name`,`Email_Address`,`Phone_Number`,`Coverage_Review`,`Broker_ID`,`Company_Name`,`Notes`) values 
('1','123 ST','Kevin','Chubb','fakeemail.com','403892454','1','Chubb','SRI',''),
('2','MayorGrath','Pozy','Man','firestone.com','42324748','1',NULL,NULL,NULL),
('3','College Drive','Barry','Lab','barry.cit','59542394','1','Barrel',NULL,NULL);

/*Table structure for table `client_coverage` */

DROP TABLE IF EXISTS `client_coverage`;

CREATE TABLE `client_coverage` (
  `Client_ID` varchar(254) NOT NULL,
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
  `Building` int DEFAULT NULL,
  `Stock` int DEFAULT NULL,
  `Liquor_Liability` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `client_coverage` */

insert  into `client_coverage`(`Client_ID`,`Contents`,`Sewer_Backup`,`Flood`,`Earthquake`,`Equipment_Breakdown`,`Crime`,`CGL_NOA`,`Business_Interruption`,`Cyber_Incl_Social_Eng`,`Tenants_Legal_Liability`,`Spoilage`,`Building`,`Stock`,`Liquor_Liability`) values 
('1',100000,2000,0,0,2000000,0,0,0,0,0,500000,0,10,0),
('2',50000,0,2500000,0,100000,0,0,0,0,0,1500000,NULL,NULL,NULL),
('3',NULL,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL);

/*Table structure for table `client_location` */

DROP TABLE IF EXISTS `client_location`;

CREATE TABLE `client_location` (
  `Location_ID` varchar(254) NOT NULL,
  `Client_ID` varchar(254) NOT NULL,
  `Alias` varchar(64) NOT NULL,
  `Physical_Address` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Location_Phone` varchar(254) DEFAULT NULL,
  `Provider` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `client_location` */

insert  into `client_location`(`Location_ID`,`Client_ID`,`Alias`,`Physical_Address`,`Location_Phone`,`Provider`) values 
('1','1','SRI','123 ST','123321','Intact'),
('2','2','Firestone','MayorGrath','5323564','Portage'),
('3','3','College','College Drive','53453523','SGI');

/*Table structure for table `coverage` */

DROP TABLE IF EXISTS `coverage`;

CREATE TABLE `coverage` (
  `Coverage_ID` int NOT NULL AUTO_INCREMENT,
  `Coverage_Name` varchar(254) NOT NULL,
  `Coverage_Limit` varchar(254) NOT NULL,
  `Coverage_Name_Insert` varchar(254) NOT NULL,
  `Coverage_Description` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  PRIMARY KEY (`Coverage_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `coverage` */

insert  into `coverage`(`Coverage_ID`,`Coverage_Name`,`Coverage_Limit`,`Coverage_Name_Insert`,`Coverage_Description`) values 
(1,'Contents','Cont','Contents','individual’s personal possessions'),
(2,'Sewer Backup','SwrBkup','Sewer_Backup','damages done by sewer system backing up'),
(3,'Flood','Fld','Flood','damages done by flooding'),
(4,'Earthquake','Erthqk','Earthquake','loss or damage caused to the property and its contents caused by the shaking of the earth'),
(5,'Equipment Breakdown','EquipBrkdwn','Equipment_Breakdown','property damage resulting from the sudden and accidental breakdown of insured equipment'),
(6,'Crime','Cr','Crime','money, property, stocks or securities being stolen by either employees or third-parties'),
(7,'CGL & NOA','CGL','CGL_NOA','provides coverage to a business for bodily injury, personal injury, and property damage caused by the business\'s operations, products, or injuries that occur on the business\'s premises'),
(8,'Business Interruption','BuisIntr','Business_Interruption','business cannot operate as a result of a covered loss'),
(9,'Cyber Incl Social Eng','Cyber','Cyber_Incl_Social_Eng','covers your business\' liability for a data breach involving sensitive customer information'),
(10,'Tenants Legal Liability','TenLiab','Tenants_Legal_Liability','loss or damage of a property resulting from an action of a person renting space'),
(11,'Spoilage','Spoil','Spoilage','cover perishable stock at a business for breakdown or contamination and for a power outage'),
(12,'Building','Build','Building','The percentage of the lot area that is covered by building area'),
(13,'Stock','Sck','Stock','number of days that a company can cover its demand with the stocks it has in storage'),
(14,'Liquor Liability','Lqr','Liquor_Liability','damages or injuries that occurred when alcohol is deemed to have been a contributing factor');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `coverage_option` */

/*Table structure for table `location_category` */

DROP TABLE IF EXISTS `location_category`;

CREATE TABLE `location_category` (
  `Location_ID` varchar(254) NOT NULL,
  `CommBuildingOwner` int DEFAULT NULL,
  `Restaurant` int DEFAULT NULL,
  `AutoGarage` int DEFAULT NULL,
  `Pub` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `location_category` */

insert  into `location_category`(`Location_ID`,`CommBuildingOwner`,`Restaurant`,`AutoGarage`,`Pub`) values 
('1',1,0,0,0),
('2',NULL,NULL,NULL,NULL),
('3',NULL,NULL,NULL,NULL);

/*Table structure for table `office` */

DROP TABLE IF EXISTS `office`;

CREATE TABLE `office` (
  `Office_ID` int NOT NULL AUTO_INCREMENT,
  `Physical_Address` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`Office_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `office` */

/*Table structure for table `option` */

DROP TABLE IF EXISTS `option`;

CREATE TABLE `option` (
  `Option_ID` int NOT NULL AUTO_INCREMENT,
  `Description` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Option_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `option` */

/*Table structure for table `policy` */

DROP TABLE IF EXISTS `policy`;

CREATE TABLE `policy` (
  `Policy_ID` int NOT NULL AUTO_INCREMENT,
  `Location_ID` int NOT NULL,
  `Broker_ID` int NOT NULL,
  `Status` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`Policy_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `unused-coverage` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `User_ID` int NOT NULL AUTO_INCREMENT,
  `User_Name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_Type` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone_Number` int NOT NULL,
  `Email_Address` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Physical_Address` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pass_Word` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user` */

insert  into `user`(`User_ID`,`User_Name`,`User_Type`,`Name`,`Phone_Number`,`Email_Address`,`Physical_Address`,`Pass_Word`) values 
(1,'RenzCatt','Admin','Renzo Cattoni',123,'bot','Lethbridge','$2y$10$NfGPXeBXk5i824/mXI85Qu9c6f0W.LZ1z9LlUaJ2Anh.6Svvl50f2'),
(2,'SaltySpammer','Admin','Joel Reimer',123,'bot','Lethbridge','$2y$10$iYQEU5/iNwCqSXA2EHVqse7YIdOgBLZEUJpbuAPdDH/K3.9.bZ62a'),
(3,'kimball','Admin','bot',123,'bot','bot','$2y$10$m73HXsUSK9QbaSslHDpoleDJDhNnHBBk8mQ9ZFd3J73eBK/CYaweK'),
(4,'Adam','Broker','Adam',221212,'bot','Coaldale','$2y$10$S/xlG3mC3VQakzdkQO8zx.2G1Gh4.3bfVWczjzIjeTFSsZVEVVqjG');

/*Table structure for table `user_log` */

DROP TABLE IF EXISTS `user_log`;

CREATE TABLE `user_log` (
  `Transaction_ID` int NOT NULL AUTO_INCREMENT,
  `User_ID` int NOT NULL,
  `Time_In` datetime NOT NULL,
  `Time_Out` datetime NOT NULL,
  `IP_Address` int NOT NULL,
  PRIMARY KEY (`Transaction_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_log` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
