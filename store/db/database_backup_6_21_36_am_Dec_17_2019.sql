-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: store
-- ------------------------------------------------------
-- Server version 	5.5.5-10.4.8-MariaDB
-- Date: Tue, 17 Dec 2019 06:21:36 +0100

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

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Tue, 17 Dec 2019 06:21:37 +0100
