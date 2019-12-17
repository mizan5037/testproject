-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: optima_inventory
-- ------------------------------------------------------
-- Server version 	5.5.5-10.4.8-MariaDB
-- Date: Tue, 17 Dec 2019 06:00:51 +0100

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accessories`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accessories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ItemID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `Color` varchar(200) NOT NULL,
  `POID` int(11) NOT NULL,
  `Size` varchar(200) NOT NULL,
  `ReceivedQty` int(11) NOT NULL,
  `Shortage` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`),
  KEY `POID` (`POID`),
  KEY `AddedBy` (`AddedBy`),
  KEY `StyleID` (`StyleID`),
  KEY `ItemID` (`ItemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accessories`
--

LOCK TABLES `accessories` WRITE;
/*!40000 ALTER TABLE `accessories` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `accessories` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `accessories` with 0 row(s)
--

--
-- Table structure for table `b2blc`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b2blc` (
  `B2BLCID` int(11) NOT NULL AUTO_INCREMENT,
  `B2BLCNumber` varchar(200) NOT NULL,
  `MasterLCID` int(11) NOT NULL,
  `SupplierName` varchar(200) NOT NULL,
  `ContactPerson` varchar(200) NOT NULL,
  `ContactNumber` varchar(200) NOT NULL,
  `SupplierAddress` text NOT NULL,
  `Issuedate` date NOT NULL,
  `Maturitydate` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `AddedBy` int(11) NOT NULL,
  PRIMARY KEY (`B2BLCID`),
  KEY `MasterLCID` (`MasterLCID`),
  KEY `AddedBy` (`AddedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b2blc`
--

LOCK TABLES `b2blc` WRITE;
/*!40000 ALTER TABLE `b2blc` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `b2blc` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `b2blc` with 0 row(s)
--

--
-- Table structure for table `b2b_item`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b2b_item` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ItemID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `POID` int(11) NOT NULL,
  `B2BLCID` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `PricePerUnit` float NOT NULL,
  `TotalPrice` float NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`),
  KEY `B2BLCID` (`B2BLCID`),
  KEY `StyleID` (`StyleID`),
  KEY `POID` (`POID`),
  KEY `AddedBy` (`AddedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b2b_item`
--

LOCK TABLES `b2b_item` WRITE;
/*!40000 ALTER TABLE `b2b_item` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `b2b_item` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `b2b_item` with 0 row(s)
--

--
-- Table structure for table `buyer`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buyer` (
  `BuyerID` int(11) NOT NULL AUTO_INCREMENT,
  `BuyerName` varchar(200) NOT NULL,
  `BuyerEmail` varchar(200) NOT NULL,
  `BuyerPhone` varchar(200) NOT NULL,
  `BuyerAddress1` text NOT NULL,
  `BuyerAddress2` text NOT NULL,
  `BuyerCity` varchar(200) NOT NULL,
  `BuyerCountry` varchar(200) NOT NULL,
  `BuyerBuyingHouseName` varchar(200) NOT NULL,
  `BuyerContactPerson` varchar(200) NOT NULL,
  `ContactPersonDesignation` varchar(200) NOT NULL,
  `ContactPersonPhone` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `AddedBy` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`BuyerID`),
  KEY `AddedBy` (`AddedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buyer`
--

LOCK TABLES `buyer` WRITE;
/*!40000 ALTER TABLE `buyer` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `buyer` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `buyer` with 0 row(s)
--

--
-- Table structure for table `carton_form`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carton_form` (
  `CartonFromID` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `POID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `Color` varchar(200) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Remark` varchar(255) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`CartonFromID`),
  KEY `AddedBy` (`AddedBy`),
  KEY `StyleID` (`StyleID`),
  KEY `POID` (`POID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carton_form`
--

LOCK TABLES `carton_form` WRITE;
/*!40000 ALTER TABLE `carton_form` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `carton_form` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `carton_form` with 0 row(s)
--

--
-- Table structure for table `color`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(200) NOT NULL,
  `addedby` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `color` with 0 row(s)
--

--
-- Table structure for table `cutting_form`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cutting_form` (
  `CuttingFormID` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `StyleID` int(11) NOT NULL,
  `CuttingNo` int(11) NOT NULL,
  `POID` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`CuttingFormID`),
  KEY `AddedBy` (`AddedBy`),
  KEY `POID` (`POID`),
  KEY `StyleID` (`StyleID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cutting_form`
--

LOCK TABLES `cutting_form` WRITE;
/*!40000 ALTER TABLE `cutting_form` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `cutting_form` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `cutting_form` with 0 row(s)
--

--
-- Table structure for table `cutting_form_description`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cutting_form_description` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CuttingFormID` int(11) NOT NULL,
  `Color` varchar(200) NOT NULL,
  `Size` varchar(200) NOT NULL,
  `Qty` int(11) NOT NULL,
  `sewing` int(11) NOT NULL,
  `PrintEMBSent` int(11) NOT NULL,
  `PrintEmbReceive` int(11) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `AddedBy` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID`),
  KEY `CuttingFormID` (`CuttingFormID`),
  KEY `AddedBy` (`AddedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cutting_form_description`
--

LOCK TABLES `cutting_form_description` WRITE;
/*!40000 ALTER TABLE `cutting_form_description` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `cutting_form_description` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `cutting_form_description` with 0 row(s)
--

--
-- Table structure for table `fabric_issue_other`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fabric_issue_other` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BuyerID` int(11) NOT NULL,
  `ContrastPocket` varchar(45) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fabric_issue_other`
--

LOCK TABLES `fabric_issue_other` WRITE;
/*!40000 ALTER TABLE `fabric_issue_other` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `fabric_issue_other` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `fabric_issue_other` with 0 row(s)
--

--
-- Table structure for table `fabric_issue_other_description`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fabric_issue_other_description` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FabricIssueotherID` int(11) NOT NULL,
  `Particulars` varchar(200) NOT NULL,
  `Color` int(11) NOT NULL,
  `Qtz` int(11) NOT NULL,
  `Consumption` float NOT NULL,
  `RqdQty` int(11) NOT NULL,
  `IssueQty` int(11) NOT NULL,
  `Roll` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fabric_issue_other_description`
--

LOCK TABLES `fabric_issue_other_description` WRITE;
/*!40000 ALTER TABLE `fabric_issue_other_description` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `fabric_issue_other_description` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `fabric_issue_other_description` with 0 row(s)
--

--
-- Table structure for table `fab_issue`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fab_issue` (
  `FabIssueID` int(11) NOT NULL AUTO_INCREMENT,
  `BuyerID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `POID` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `AddedBy` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`FabIssueID`),
  KEY `AddedBy` (`AddedBy`),
  KEY `POID` (`POID`),
  KEY `StyleID` (`StyleID`),
  KEY `BuyerID` (`BuyerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fab_issue`
--

LOCK TABLES `fab_issue` WRITE;
/*!40000 ALTER TABLE `fab_issue` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `fab_issue` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `fab_issue` with 0 row(s)
--

--
-- Table structure for table `fab_issue_description`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fab_issue_description` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FabIssueID` int(11) NOT NULL,
  `Particulars` varchar(200) NOT NULL,
  `Color` varchar(200) NOT NULL,
  `Qtz` int(11) NOT NULL,
  `Consumption` int(11) NOT NULL,
  `RqdQty` int(11) NOT NULL,
  `IssueQty` int(11) NOT NULL,
  `Roll` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID`),
  KEY `AddedBy` (`AddedBy`),
  KEY `FabIssueID` (`FabIssueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fab_issue_description`
--

LOCK TABLES `fab_issue_description` WRITE;
/*!40000 ALTER TABLE `fab_issue_description` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `fab_issue_description` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `fab_issue_description` with 0 row(s)
--

--
-- Table structure for table `fab_receive`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fab_receive` (
  `FabReceiveID` int(11) NOT NULL AUTO_INCREMENT,
  `POID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `Color` varchar(200) NOT NULL,
  `Shade` varchar(200) NOT NULL,
  `Shrinkage` varchar(200) NOT NULL,
  `Width` varchar(200) NOT NULL,
  `ReceivedFab` float NOT NULL,
  `ReceivedRoll` int(11) NOT NULL,
  `Shortage` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`FabReceiveID`),
  KEY `POID` (`POID`,`StyleID`),
  KEY `StyleID` (`StyleID`),
  KEY `AddedBy` (`AddedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fab_receive`
--

LOCK TABLES `fab_receive` WRITE;
/*!40000 ALTER TABLE `fab_receive` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `fab_receive` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `fab_receive` with 0 row(s)
--

--
-- Table structure for table `fab_receive_other`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fab_receive_other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `BuyerID` int(11) NOT NULL,
  `ContrastPocket` varchar(200) NOT NULL,
  `Color` varchar(200) NOT NULL,
  `Shade` varchar(200) NOT NULL,
  `Shrinkage` varchar(200) NOT NULL,
  `Width` varchar(200) NOT NULL,
  `ReceivedFab` int(11) NOT NULL,
  `ReceivedRoll` int(11) NOT NULL,
  `Shortage` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `BuyerID` (`BuyerID`),
  KEY `AddedBy` (`AddedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fab_receive_other`
--

LOCK TABLES `fab_receive_other` WRITE;
/*!40000 ALTER TABLE `fab_receive_other` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `fab_receive_other` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `fab_receive_other` with 0 row(s)
--

--
-- Table structure for table `fab_relaxation`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fab_relaxation` (
  `FabRelaxationID` int(11) NOT NULL AUTO_INCREMENT,
  `BuyerID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `Color` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`FabRelaxationID`),
  KEY `AddedBy` (`AddedBy`),
  KEY `StyleID` (`StyleID`),
  KEY `BuyerID` (`BuyerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fab_relaxation`
--

LOCK TABLES `fab_relaxation` WRITE;
/*!40000 ALTER TABLE `fab_relaxation` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `fab_relaxation` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `fab_relaxation` with 0 row(s)
--

--
-- Table structure for table `fab_relaxation_description`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fab_relaxation_description` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FabRelaxationID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Shade` varchar(100) NOT NULL,
  `Shrinkage` varchar(100) NOT NULL,
  `RollNo` int(11) NOT NULL,
  `Yds` int(11) NOT NULL,
  `Shade2` varchar(100) NOT NULL,
  `Shrinkage2` varchar(100) NOT NULL,
  `RollNo2` int(11) NOT NULL,
  `Yds2` int(11) NOT NULL,
  `TotalYds` int(11) NOT NULL,
  `fabricOpenTime` varchar(100) NOT NULL,
  `FabricLayDate` date NOT NULL,
  `FabricLayTime` varchar(100) NOT NULL,
  `TotalHours` int(11) NOT NULL,
  `Remarks` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`),
  KEY `FabRelaxationID` (`FabRelaxationID`),
  KEY `AddedBy` (`AddedBy`),
  KEY `FabRelaxationID_2` (`FabRelaxationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fab_relaxation_description`
--

LOCK TABLES `fab_relaxation_description` WRITE;
/*!40000 ALTER TABLE `fab_relaxation_description` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `fab_relaxation_description` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `fab_relaxation_description` with 0 row(s)
--

--
-- Table structure for table `floor`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `floor` (
  `floor_id` int(11) NOT NULL AUTO_INCREMENT,
  `floor_name` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `addedby` int(11) NOT NULL,
  PRIMARY KEY (`floor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `floor`
--

LOCK TABLES `floor` WRITE;
/*!40000 ALTER TABLE `floor` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `floor` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `floor` with 0 row(s)
--

--
-- Table structure for table `hourly_finishing_form`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hourly_finishing_form` (
  `HourlyFinishingID` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `Floor` int(11) NOT NULL,
  `line` varchar(10) DEFAULT NULL,
  `POID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `Color` int(11) NOT NULL,
  `nine` int(11) NOT NULL,
  `ten` int(11) NOT NULL,
  `eleven` int(11) NOT NULL,
  `twelve` int(11) NOT NULL,
  `one` int(11) NOT NULL,
  `three` int(11) NOT NULL,
  `four` int(11) NOT NULL,
  `five` int(11) NOT NULL,
  `six` int(11) NOT NULL,
  `seven` int(11) NOT NULL,
  `eight` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`HourlyFinishingID`),
  KEY `AddedBy` (`AddedBy`),
  KEY `POID` (`POID`,`StyleID`),
  KEY `StyleID` (`StyleID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hourly_finishing_form`
--

LOCK TABLES `hourly_finishing_form` WRITE;
/*!40000 ALTER TABLE `hourly_finishing_form` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `hourly_finishing_form` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `hourly_finishing_form` with 0 row(s)
--

--
-- Table structure for table `hourly_production`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hourly_production` (
  `HourlyProductionID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `FloorNO` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`HourlyProductionID`),
  KEY `AddedBy` (`AddedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hourly_production`
--

LOCK TABLES `hourly_production` WRITE;
/*!40000 ALTER TABLE `hourly_production` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `hourly_production` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `hourly_production` with 0 row(s)
--

--
-- Table structure for table `hourly_production_details`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hourly_production_details` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `HourlyProductionID` int(11) NOT NULL,
  `LineNo` varchar(20) NOT NULL,
  `POID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `Color` int(11) NOT NULL,
  `nine` int(11) NOT NULL,
  `ten` int(11) NOT NULL,
  `eleven` int(11) NOT NULL,
  `twelve` int(11) NOT NULL,
  `one` int(11) NOT NULL,
  `three` int(11) NOT NULL,
  `four` int(11) NOT NULL,
  `five` int(11) NOT NULL,
  `six` int(11) NOT NULL,
  `seven` int(11) NOT NULL,
  `eight` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID`),
  KEY `AddedBy` (`AddedBy`),
  KEY `POID` (`POID`),
  KEY `StyleID` (`StyleID`),
  KEY `HourlyProductionID` (`HourlyProductionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hourly_production_details`
--

LOCK TABLES `hourly_production_details` WRITE;
/*!40000 ALTER TABLE `hourly_production_details` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `hourly_production_details` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `hourly_production_details` with 0 row(s)
--

--
-- Table structure for table `item`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `ItemID` int(11) NOT NULL AUTO_INCREMENT,
  `ItemName` varchar(200) NOT NULL,
  `ItemDescription` text NOT NULL,
  `ItemMeasurementUnit` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ItemID`),
  KEY `AddedBy` (`AddedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `item` with 0 row(s)
--

--
-- Table structure for table `itemrequirment`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itemrequirment` (
  `ItemRequirmentID` int(11) NOT NULL AUTO_INCREMENT,
  `ItemRequirmentStyleID` int(11) NOT NULL,
  `ItemRequirmentItemID` int(11) NOT NULL,
  `ItemRequirmentSize` varchar(200) NOT NULL,
  `ItemRequirmentQty` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ItemRequirmentID`),
  KEY `ItemRequirmentStyleID` (`ItemRequirmentStyleID`,`ItemRequirmentItemID`),
  KEY `ItemRequirmentItemID` (`ItemRequirmentItemID`),
  KEY `AddedBy` (`AddedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemrequirment`
--

LOCK TABLES `itemrequirment` WRITE;
/*!40000 ALTER TABLE `itemrequirment` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `itemrequirment` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `itemrequirment` with 0 row(s)
--

--
-- Table structure for table `item_issue_access`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_issue_access` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CuttingNumber` varchar(200) NOT NULL,
  `ItemID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `POID` int(11) NOT NULL,
  `Color` varchar(200) NOT NULL,
  `Size` varchar(200) NOT NULL,
  `Qty` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`),
  KEY `ItemID` (`ItemID`,`StyleID`,`POID`),
  KEY `StyleID` (`StyleID`),
  KEY `POID` (`POID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_issue_access`
--

LOCK TABLES `item_issue_access` WRITE;
/*!40000 ALTER TABLE `item_issue_access` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `item_issue_access` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `item_issue_access` with 0 row(s)
--

--
-- Table structure for table `item_receive_access`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_receive_access` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ItemID` int(11) NOT NULL,
  `ColorID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `POID` int(11) NOT NULL,
  `Size` int(11) NOT NULL,
  `Received` int(11) NOT NULL,
  `Shortage` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_receive_access`
--

LOCK TABLES `item_receive_access` WRITE;
/*!40000 ALTER TABLE `item_receive_access` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `item_receive_access` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `item_receive_access` with 0 row(s)
--

--
-- Table structure for table `lay_form`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lay_form` (
  `LayFormID` int(11) NOT NULL AUTO_INCREMENT,
  `BuyerID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `POID` int(11) NOT NULL,
  `CuttingNo` varchar(200) NOT NULL,
  `Unit` varchar(200) NOT NULL,
  `Date` date NOT NULL,
  `MarkerWidth` varchar(200) NOT NULL,
  `MarkerLength` varchar(200) NOT NULL,
  `SpecialAction` text NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`LayFormID`),
  KEY `BuyerID` (`BuyerID`),
  KEY `StyleID` (`StyleID`),
  KEY `POID` (`POID`),
  KEY `AddedBy` (`AddedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lay_form`
--

LOCK TABLES `lay_form` WRITE;
/*!40000 ALTER TABLE `lay_form` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `lay_form` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `lay_form` with 0 row(s)
--

--
-- Table structure for table `lay_form_details`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lay_form_details` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `layFormID` int(11) NOT NULL,
  `Color` varchar(200) NOT NULL,
  `LotNo` int(11) NOT NULL,
  `SlNo` int(11) NOT NULL,
  `RollNo` int(11) NOT NULL,
  `TTLFabricsYds` int(11) NOT NULL,
  `Lay` int(11) NOT NULL,
  `UsedFabricYds` int(11) NOT NULL,
  `RemainingYds` int(11) NOT NULL,
  `Shortage` int(11) NOT NULL,
  `Sticker` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`),
  KEY `AddedBy` (`AddedBy`),
  KEY `layFormID` (`layFormID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lay_form_details`
--

LOCK TABLES `lay_form_details` WRITE;
/*!40000 ALTER TABLE `lay_form_details` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `lay_form_details` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `lay_form_details` with 0 row(s)
--

--
-- Table structure for table `line`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `line` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `floor` varchar(20) NOT NULL,
  `line` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `addedby` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `line`
--

LOCK TABLES `line` WRITE;
/*!40000 ALTER TABLE `line` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `line` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `line` with 0 row(s)
--

--
-- Table structure for table `masterlc`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `masterlc` (
  `MasterLCID` int(11) NOT NULL AUTO_INCREMENT,
  `MasterLCNumber` varchar(200) NOT NULL,
  `MasterLCIssueDate` date NOT NULL,
  `MasterLCExpiryDate` date NOT NULL,
  `MasterLCIssuingCompany` varchar(200) NOT NULL,
  `MasterLCBuyer` int(11) NOT NULL,
  `MasterLCSenderBank` varchar(200) NOT NULL,
  `MasterLCReceiverBank` varchar(200) NOT NULL,
  `MasterLCCurrency` varchar(200) NOT NULL,
  `MasterLCAmount` int(11) NOT NULL,
  `MasterLCPartialShipment` tinyint(1) NOT NULL,
  `MasterLCTranshipment` tinyint(1) NOT NULL,
  `MasterLCPortOfLoading` varchar(200) NOT NULL,
  `MasterLCPortOfDischarge` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`MasterLCID`),
  KEY `MasterLCBuyer` (`MasterLCBuyer`),
  KEY `AddedBy` (`AddedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `masterlc`
--

LOCK TABLES `masterlc` WRITE;
/*!40000 ALTER TABLE `masterlc` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `masterlc` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `masterlc` with 0 row(s)
--

--
-- Table structure for table `masterlc_description`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `masterlc_description` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MasterLCID` int(11) NOT NULL,
  `POID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Unit` varchar(200) NOT NULL,
  `Price` int(11) NOT NULL,
  `LSDate` date NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `masterlc_description`
--

LOCK TABLES `masterlc_description` WRITE;
/*!40000 ALTER TABLE `masterlc_description` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `masterlc_description` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `masterlc_description` with 0 row(s)
--

--
-- Table structure for table `order_description`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_description` (
  `OrderdescriptionID` int(11) NOT NULL AUTO_INCREMENT,
  `POID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `Color` varchar(200) NOT NULL,
  `ClrNo` varchar(200) NOT NULL,
  `Dzs` int(11) NOT NULL,
  `PPack` int(11) NOT NULL,
  `Units` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`OrderdescriptionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_description`
--

LOCK TABLES `order_description` WRITE;
/*!40000 ALTER TABLE `order_description` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `order_description` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `order_description` with 0 row(s)
--

--
-- Table structure for table `pi`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pi` (
  `PIID` int(11) NOT NULL AUTO_INCREMENT,
  `RefNo` varchar(200) NOT NULL,
  `IssueDate` date NOT NULL,
  `SupplierName` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`PIID`),
  KEY `AddedBy` (`AddedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pi`
--

LOCK TABLES `pi` WRITE;
/*!40000 ALTER TABLE `pi` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `pi` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `pi` with 0 row(s)
--

--
-- Table structure for table `pi_description`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pi_description` (
  `PIDescriptionID` int(11) NOT NULL AUTO_INCREMENT,
  `PIID` int(11) NOT NULL,
  `POID` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Qty` int(11) NOT NULL,
  `PricePerUnit` float NOT NULL,
  `TotalPrice` float NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`PIDescriptionID`),
  KEY `PIID` (`PIID`,`POID`,`ItemID`),
  KEY `POID` (`POID`),
  KEY `ItemID` (`ItemID`),
  KEY `AddedBy` (`AddedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pi_description`
--

LOCK TABLES `pi_description` WRITE;
/*!40000 ALTER TABLE `pi_description` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `pi_description` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `pi_description` with 0 row(s)
--

--
-- Table structure for table `plan`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `poid` int(11) NOT NULL,
  `styleid` int(11) NOT NULL,
  `addedby` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan`
--

LOCK TABLES `plan` WRITE;
/*!40000 ALTER TABLE `plan` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `plan` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `plan` with 0 row(s)
--

--
-- Table structure for table `plan_details`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plan_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `plan_id` int(11) NOT NULL,
  `line` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `addedby` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `floor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan_details`
--

LOCK TABLES `plan_details` WRITE;
/*!40000 ALTER TABLE `plan_details` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `plan_details` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `plan_details` with 0 row(s)
--

--
-- Table structure for table `po`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `po` (
  `POID` int(11) NOT NULL AUTO_INCREMENT,
  `MasterLCOccupied` tinyint(4) NOT NULL DEFAULT 0,
  `BTBLCIDOccupied` tinyint(4) NOT NULL DEFAULT 0,
  `PONumber` varchar(200) NOT NULL,
  `POFrom` varchar(200) NOT NULL,
  `PODate` date NOT NULL,
  `POCMPWH` float NOT NULL,
  `POCurrency` varchar(200) NOT NULL,
  `POSpecialInstruction` text NOT NULL,
  `POFinalDestination` varchar(200) NOT NULL,
  `POCMP` float NOT NULL,
  `POWASH` float NOT NULL,
  `POHANGER` float NOT NULL,
  `FOB` float NOT NULL,
  `Division` varchar(200) NOT NULL,
  `special_note` text DEFAULT NULL,
  `AddedBy` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`POID`),
  KEY `POMasterLCID` (`MasterLCOccupied`,`BTBLCIDOccupied`),
  KEY `AddedBy` (`AddedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `po`
--

LOCK TABLES `po` WRITE;
/*!40000 ALTER TABLE `po` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `po` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `po` with 0 row(s)
--

--
-- Table structure for table `po_event`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `po_event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(200) NOT NULL,
  PRIMARY KEY (`event_id`),
  UNIQUE KEY `event_id` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `po_event`
--

LOCK TABLES `po_event` WRITE;
/*!40000 ALTER TABLE `po_event` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `po_event` VALUES (1,'Order Confirmation From Buyer'),(2,'PO Sheet Received From Buyer	'),(3,'Fabric P/I Received From Buyer	'),(4,'Trims P/I Received From Buyer	'),(5,'Fabric & Trims L/C Open	'),(6,'Bulk Fabric sample Received From Buyer	'),(7,'Bulk Trims Sample Received From Buyer'),(8,'Bulk Fabric Shipment	'),(9,'Bulk Trims Shipment	'),(10,'Bulk Fabric Doc\'s Received From buyer	'),(11,'Bulk Trims Doc\'s Received From Buyer	'),(12,'Embroidery Approval	'),(13,'Sewing Thread Approval	'),(14,'PPS Submit'),(15,'PPS Approval'),(16,'Sewing Thread In House'),(17,'Main Label In House'),(18,'Size Label In House'),(19,'Care Label In House'),(20,'Other Label In House'),(21,'Interlining in House'),(22,'Bulk Fabric In House'),(23,'Bulk Trims In House'),(24,'Hang Tag + Hologram Sticker In House'),(25,'UPC Ticket In House'),(26,'Size Set Submit '),(27,'Size Set Approval'),(28,'PP Meeting'),(29,'Production Pilot Run (PPR)'),(30,'Cutting Start Date'),(31,'Line Required'),(32,'Days Required'),(33,'Sewing Start Date'),(34,'Sewing Complete Date'),(35,'Finish Start Date'),(36,'Pack Complete	'),(37,'Bulk Garments Final Inspection /Ex Factory'),(38,'Bulk Garments Hand Over to Forwarder');
/*!40000 ALTER TABLE `po_event` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `po_event` with 38 row(s)
--

--
-- Table structure for table `po_time_action`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `po_time_action` (
  `po_time_action_id` int(11) NOT NULL AUTO_INCREMENT,
  `projected_date` varchar(20) DEFAULT NULL,
  `implement_date` varchar(20) DEFAULT NULL,
  `1st_revised_implement_date` varchar(20) DEFAULT NULL,
  `2nd_revised_implement_date` varchar(20) DEFAULT NULL,
  `3rd_revised_implement_date` varchar(20) DEFAULT NULL,
  `4th_revised_implement_date` varchar(20) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `POID` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `added_by` int(11) NOT NULL,
  PRIMARY KEY (`po_time_action_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `po_time_action`
--

LOCK TABLES `po_time_action` WRITE;
/*!40000 ALTER TABLE `po_time_action` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `po_time_action` VALUES (0,'','','','','','','',0,NULL,'0000-00-00 00:00:00',1);
/*!40000 ALTER TABLE `po_time_action` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `po_time_action` with 1 row(s)
--

--
-- Table structure for table `prepack`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prepack` (
  `PrePackID` int(11) NOT NULL AUTO_INCREMENT,
  `POID` int(11) NOT NULL,
  `PrePackCode` varchar(200) NOT NULL,
  `PrePackSize` varchar(200) NOT NULL,
  `PrepackQty` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`PrePackID`),
  KEY `POID` (`POID`),
  KEY `AddedBy` (`AddedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prepack`
--

LOCK TABLES `prepack` WRITE;
/*!40000 ALTER TABLE `prepack` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `prepack` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `prepack` with 0 row(s)
--

--
-- Table structure for table `shipment_form`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipment_form` (
  `ShipmentFormID` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `POID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `Color` int(11) NOT NULL,
  `Shipment` int(11) NOT NULL,
  `Remark` varchar(255) DEFAULT NULL,
  `Sample` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ShipmentFormID`),
  KEY `POID` (`POID`),
  KEY `StyleID` (`StyleID`),
  KEY `AddedBy` (`AddedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipment_form`
--

LOCK TABLES `shipment_form` WRITE;
/*!40000 ALTER TABLE `shipment_form` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `shipment_form` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `shipment_form` with 0 row(s)
--

--
-- Table structure for table `size`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size` varchar(100) NOT NULL,
  `addedby` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `size`
--

LOCK TABLES `size` WRITE;
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `size` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `size` with 0 row(s)
--

--
-- Table structure for table `stationary_issue`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stationary_issue` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UnitName` varchar(200) NOT NULL,
  `IssueBy` varchar(200) NOT NULL,
  `ItemID` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Remark` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`ID`),
  KEY `AddedBy` (`AddedBy`),
  KEY `ItemID` (`ItemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stationary_issue`
--

LOCK TABLES `stationary_issue` WRITE;
/*!40000 ALTER TABLE `stationary_issue` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `stationary_issue` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `stationary_issue` with 0 row(s)
--

--
-- Table structure for table `stationary_item`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stationary_item` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `MeasurmentUnit` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`),
  KEY `AddedBy` (`AddedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stationary_item`
--

LOCK TABLES `stationary_item` WRITE;
/*!40000 ALTER TABLE `stationary_item` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `stationary_item` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `stationary_item` with 0 row(s)
--

--
-- Table structure for table `stationary_receive`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stationary_receive` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ItemID` int(11) NOT NULL,
  `SupplierName` varchar(200) NOT NULL,
  `ChallanNo` varchar(200) NOT NULL,
  `ReceivedQty` int(11) NOT NULL,
  `Shortage` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`),
  KEY `AddedBy` (`AddedBy`),
  KEY `ItemID` (`ItemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stationary_receive`
--

LOCK TABLES `stationary_receive` WRITE;
/*!40000 ALTER TABLE `stationary_receive` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `stationary_receive` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `stationary_receive` with 0 row(s)
--

--
-- Table structure for table `style`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `style` (
  `StyleID` int(11) NOT NULL AUTO_INCREMENT,
  `StyleNumber` varchar(200) NOT NULL,
  `StyleDescription` text NOT NULL,
  `StyleWash` varchar(200) NOT NULL,
  `StyleImage` varchar(200) NOT NULL,
  `StyleProto` varchar(200) NOT NULL,
  `StyleFabricDetails` text NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`StyleID`),
  KEY `AddedBy` (`AddedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `style`
--

LOCK TABLES `style` WRITE;
/*!40000 ALTER TABLE `style` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `style` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `style` with 0 row(s)
--

--
-- Table structure for table `trimsaccess`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trimsaccess` (
  `TrimsAccessID` int(11) NOT NULL AUTO_INCREMENT,
  `TrimsAccessPOID` int(11) NOT NULL,
  `TrimsAccessStyleID` int(11) NOT NULL,
  `TrimsAccessName` varchar(200) NOT NULL,
  `TrimsAccessDescription` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`TrimsAccessID`),
  KEY `TrimsAccessPOID` (`TrimsAccessPOID`,`TrimsAccessStyleID`),
  KEY `TrimsAccessStyleID` (`TrimsAccessStyleID`),
  KEY `AddedBy` (`AddedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trimsaccess`
--

LOCK TABLES `trimsaccess` WRITE;
/*!40000 ALTER TABLE `trimsaccess` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `trimsaccess` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `trimsaccess` with 0 row(s)
--

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Designation` tinyint(2) NOT NULL,
  `Pass` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`UserID`),
  KEY `AddedBy` (`AddedBy`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `users` VALUES (1,'Admin','admin','srse@drg',1,'202cb962ac59075b964b07152d234b70',1,'2019-12-05 05:35:20',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `users` with 1 row(s)
--

--
-- Table structure for table `wash_form`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wash_form` (
  `WashFormID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `POID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `Color` int(11) NOT NULL,
  `Send` int(11) NOT NULL,
  `Receive` int(11) NOT NULL,
  `Remark` varchar(255) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`WashFormID`),
  KEY `AddedBy` (`AddedBy`),
  KEY `POID` (`POID`),
  KEY `StyleID` (`StyleID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wash_form`
--

LOCK TABLES `wash_form` WRITE;
/*!40000 ALTER TABLE `wash_form` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `wash_form` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `wash_form` with 0 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Tue, 17 Dec 2019 06:00:51 +0100
