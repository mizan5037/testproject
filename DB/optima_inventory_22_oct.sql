-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2019 at 11:07 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `optima_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `ID` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `Color` varchar(200) NOT NULL,
  `POID` int(11) NOT NULL,
  `Size` varchar(200) NOT NULL,
  `ReceivedQty` int(11) NOT NULL,
  `Shortage` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `b2blc`
--

CREATE TABLE `b2blc` (
  `B2BLCID` int(11) NOT NULL,
  `MasterLCID` int(11) NOT NULL,
  `SupplierName` varchar(200) NOT NULL,
  `ContactPerson` varchar(200) NOT NULL,
  `ContactNumber` varchar(200) NOT NULL,
  `SupplierAddress` text NOT NULL,
  `Issuedate` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `AddedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `b2b_item`
--

CREATE TABLE `b2b_item` (
  `ItemID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `POID` int(11) NOT NULL,
  `B2BLCID` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `PricePerUnit` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `BuyerID` int(11) NOT NULL,
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
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`BuyerID`, `BuyerName`, `BuyerEmail`, `BuyerPhone`, `BuyerAddress1`, `BuyerAddress2`, `BuyerCity`, `BuyerCountry`, `BuyerBuyingHouseName`, `BuyerContactPerson`, `ContactPersonDesignation`, `ContactPersonPhone`, `timestamp`, `AddedBy`, `Status`) VALUES
(1, 'Shuvo s', 'fsdf@gmsgf', 'sdfsdf', 'sdf', 'sdfsdf', 'sdf', 'sdf', 'fsdfs', 'dfs', 'dfsd', 'f', '2019-10-21 09:42:17', 1, 0),
(2, 'sdgsdg', 'fsdf@dfg', 'sdfsdf', 'sdfsd', 'fsdf', 'sdf', 'sdfsd', 'fsdf', 'sdfsdf', 'sdfsdf', 'sdf', '2019-10-21 09:57:58', 1, 0),
(3, 'Shuvo', 'das@srf', 'dasd', 'asdas', 'dasdasd', 'asda', 'sda', 'sdas', 'sdasd', 'sda', 'dasda', '2019-10-21 13:23:39', 1, 1),
(4, 'sdf', 'sdfs@sdgfs.com', 'dfsdf', 'fsdf', 'sdfsdf', 'sdf', 'sdfs', 'dfsdf', 'sdfs', 'dfsd', 'fsdf', '2019-10-21 13:23:54', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `carton_form`
--

CREATE TABLE `carton_form` (
  `CartonFromID` int(11) NOT NULL,
  `POID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `Color` varchar(200) NOT NULL,
  `Qty` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cutting_form`
--

CREATE TABLE `cutting_form` (
  `CuttingFormID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `CuttingNo` int(11) NOT NULL,
  `POID` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cutting_form_description`
--

CREATE TABLE `cutting_form_description` (
  `ID` int(11) NOT NULL,
  `CuttingFormID` int(11) NOT NULL,
  `Color` varchar(200) NOT NULL,
  `Size` varchar(200) NOT NULL,
  `Qty` int(11) NOT NULL,
  `PrintEMBSent` int(11) NOT NULL,
  `PrintEmbReceive` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fab_issue`
--

CREATE TABLE `fab_issue` (
  `FabIssueID` int(11) NOT NULL,
  `BuyerID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `POID` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `AddedBy` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fab_issue_description`
--

CREATE TABLE `fab_issue_description` (
  `ID` int(11) NOT NULL,
  `FabIssueID` int(11) NOT NULL,
  `Particulars` int(11) NOT NULL,
  `Color` int(11) NOT NULL,
  `Qtz` int(11) NOT NULL,
  `Consumption` int(11) NOT NULL,
  `RqdQty` int(11) NOT NULL,
  `IssueQty` int(11) NOT NULL,
  `Remark` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fab_receive`
--

CREATE TABLE `fab_receive` (
  `FabReceiveID` int(11) NOT NULL,
  `POID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `Color` varchar(200) NOT NULL,
  `ReceivedFab` int(11) NOT NULL,
  `ReceivedRoll` int(11) NOT NULL,
  `Shortage` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fab_receive_other`
--

CREATE TABLE `fab_receive_other` (
  `id` int(11) NOT NULL,
  `BuyerID` int(11) NOT NULL,
  `ContrastPocket` int(11) NOT NULL,
  `Color` int(11) NOT NULL,
  `ReceivedFab` int(11) NOT NULL,
  `ReceivedRoll` int(11) NOT NULL,
  `Shortage` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `Status` tinyint(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fab_relaxation`
--

CREATE TABLE `fab_relaxation` (
  `FabRelaxationID` int(11) NOT NULL,
  `BuyerID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `Color` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fab_relaxation_description`
--

CREATE TABLE `fab_relaxation_description` (
  `ID` int(11) NOT NULL,
  `FabRelaxationID` int(11) NOT NULL,
  `Date` varchar(100) NOT NULL,
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
  `FabricLayDate` varchar(100) NOT NULL,
  `FabricLayTime` varchar(100) NOT NULL,
  `TotalHours` int(11) NOT NULL,
  `Remarks` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hourly_finishing_form`
--

CREATE TABLE `hourly_finishing_form` (
  `HourlyFinishingID` int(11) NOT NULL,
  `Floor` int(11) NOT NULL,
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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hourly_production`
--

CREATE TABLE `hourly_production` (
  `HourlyProductionID` int(11) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `FloorNO` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hourly_production_details`
--

CREATE TABLE `hourly_production_details` (
  `ID` int(11) NOT NULL,
  `HourlyProductionID` int(11) NOT NULL,
  `LineNo` varchar(20) NOT NULL,
  `POID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `Color` varchar(200) NOT NULL,
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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ItemID` int(11) NOT NULL,
  `ItemName` varchar(200) NOT NULL,
  `ItemDescription` text NOT NULL,
  `ItemMeasurementUnit` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ItemID`, `ItemName`, `ItemDescription`, `ItemMeasurementUnit`, `AddedBy`, `timestamp`, `status`) VALUES
(1, 'Button', '18LL', 'Piece', 1, '2019-10-20 07:10:23', 1),
(2, 'Hang Tag V', 'XLL', 'Piece', 1, '2019-10-20 07:40:50', 0),
(6, 'Hang Tag', 'XL', 'Piece', 1, '2019-10-20 11:17:29', 1),
(7, 'Price Tag', 'X', 'Piece', 1, '2019-10-20 11:17:29', 1),
(8, 'Button xxl', '18L', 'Piece', 1, '2019-10-21 13:18:59', 1),
(9, 'Hang tag', 'xxl', 'Piece', 1, '2019-10-21 13:18:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `itemrequirment`
--

CREATE TABLE `itemrequirment` (
  `ItemRequirmentID` int(11) NOT NULL,
  `ItemRequirmentStyleID` int(11) NOT NULL,
  `ItemRequirmentItemID` int(11) NOT NULL,
  `ItemRequirmentSize` varchar(200) NOT NULL,
  `ItemRequirmentQty` int(11) NOT NULL,
  `ItemRequirmentUnitID` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemrequirment`
--

INSERT INTO `itemrequirment` (`ItemRequirmentID`, `ItemRequirmentStyleID`, `ItemRequirmentItemID`, `ItemRequirmentSize`, `ItemRequirmentQty`, `ItemRequirmentUnitID`, `AddedBy`, `timestamp`, `Status`) VALUES
(1, 2, 1, 'XXS', 10, 0, 1, '2019-10-21 06:41:46', 1),
(2, 2, 6, 'XXS', 4, 0, 1, '2019-10-21 06:41:46', 1),
(3, 2, 1, 'XS', 8, 0, 1, '2019-10-21 06:41:46', 1),
(4, 3, 8, 'XXl', 10, 0, 1, '2019-10-21 13:20:48', 1),
(5, 3, 6, 'S', 5, 0, 1, '2019-10-21 13:20:48', 1),
(6, 4, 6, 'sdfsdf', 3, 0, 1, '2019-10-21 13:22:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_issue_access`
--

CREATE TABLE `item_issue_access` (
  `ID` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `POID` int(11) NOT NULL,
  `Color` varchar(200) NOT NULL,
  `Size` varchar(200) NOT NULL,
  `Qty` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_style`
--

CREATE TABLE `item_style` (
  `ItemID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lay_form`
--

CREATE TABLE `lay_form` (
  `LayFormID` int(11) NOT NULL,
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
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lay_form_details`
--

CREATE TABLE `lay_form_details` (
  `ID` int(11) NOT NULL,
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
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `masterlc`
--

CREATE TABLE `masterlc` (
  `MasterLCID` int(11) NOT NULL,
  `MasterLCCustomerID` int(11) NOT NULL,
  `MasterLCNumber` varchar(200) NOT NULL,
  `MasterLCIsseDate` date NOT NULL,
  `MasterLCExpiryDate` date NOT NULL,
  `MasterLCIssuingCompany` varchar(200) NOT NULL,
  `MasterLCBuyer` int(11) NOT NULL,
  `MasterLCSenderBank` varchar(200) NOT NULL,
  `MasterLCReceiverBank` varchar(200) NOT NULL,
  `MasterLCCurrency` varchar(200) NOT NULL,
  `MasterLCAmount` int(11) NOT NULL,
  `MasterLCPartialShipment` varchar(200) NOT NULL,
  `MasterLCTranshipment` varchar(200) NOT NULL,
  `MasterLCPortOfLoading` varchar(200) NOT NULL,
  `MasterLCPortOfDischarge` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_description`
--

CREATE TABLE `order_description` (
  `OrderdescriptionID` int(11) NOT NULL,
  `POID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `Color` varchar(200) NOT NULL,
  `ClrNo` varchar(200) NOT NULL,
  `Dzs` int(11) NOT NULL,
  `PPack` int(11) NOT NULL,
  `Units` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pi`
--

CREATE TABLE `pi` (
  `PIID` int(11) NOT NULL,
  `RefNo` varchar(200) NOT NULL,
  `IssueDate` date NOT NULL,
  `SupplierName` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pi_description`
--

CREATE TABLE `pi_description` (
  `PIID` int(11) NOT NULL,
  `POID` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Qty` int(11) NOT NULL,
  `PricePerUnit` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `POID` int(11) NOT NULL,
  `MasterLCOccupied` tinyint(4) NOT NULL DEFAULT 0,
  `BTBLCIDOccupied` tinyint(4) NOT NULL DEFAULT 0,
  `PONumber` varchar(200) NOT NULL,
  `POFrom` varchar(200) NOT NULL,
  `PODate` date NOT NULL,
  `POCMPWH` int(11) NOT NULL,
  `POCurrency` varchar(200) NOT NULL,
  `POSpecialInstruction` text NOT NULL,
  `POFinalDestination` varchar(200) NOT NULL,
  `POCMP` int(11) NOT NULL,
  `POWASH` int(11) NOT NULL,
  `POHANGER` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prepack`
--

CREATE TABLE `prepack` (
  `PrePackID` int(11) NOT NULL,
  `POID` int(11) NOT NULL,
  `PrePackCode` varchar(200) NOT NULL,
  `PrePackSize` varchar(200) NOT NULL,
  `PrepackQty` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipment_form`
--

CREATE TABLE `shipment_form` (
  `ShipmentFormID` int(11) NOT NULL,
  `POID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `Color` varchar(200) NOT NULL,
  `Shipment` int(11) NOT NULL,
  `Sample` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stationary_issue`
--

CREATE TABLE `stationary_issue` (
  `ID` int(11) NOT NULL,
  `UnitName` varchar(200) NOT NULL,
  `IssueBy` varchar(200) NOT NULL,
  `ItemID` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Remark` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `Status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stationary_item`
--

CREATE TABLE `stationary_item` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `MeasurmentUnit` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stationary_receive`
--

CREATE TABLE `stationary_receive` (
  `ID` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL,
  `SupplierName` varchar(200) NOT NULL,
  `ChallanNo` varchar(200) NOT NULL,
  `ReceivedQty` int(11) NOT NULL,
  `Shortage` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

CREATE TABLE `style` (
  `StyleID` int(11) NOT NULL,
  `StyleNumber` varchar(200) NOT NULL,
  `StyleDescription` text NOT NULL,
  `StyleWash` varchar(200) NOT NULL,
  `StyleImage` varchar(200) NOT NULL,
  `StyleProto` varchar(200) NOT NULL,
  `StylePrice` int(11) NOT NULL,
  `StyleCurency` varchar(200) NOT NULL,
  `StyleDivitionNo` varchar(200) NOT NULL,
  `StyleFabricDetails` text NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `style`
--

INSERT INTO `style` (`StyleID`, `StyleNumber`, `StyleDescription`, `StyleWash`, `StyleImage`, `StyleProto`, `StylePrice`, `StyleCurency`, `StyleDivitionNo`, `StyleFabricDetails`, `AddedBy`, `Timestamp`, `Status`) VALUES
(1, '125678S0UFU', 'LS Stretch OXFORD-SO', 'NO Wash', 'assets/images/uploads/838226058_2019_Oct_21_1571639382_1.', 'B-2979', 0, '', '', '58% Cotton, 39% Poly, 3% Spandex, CVC SOLID Stretch Oxford', 1, '2019-10-21 06:29:42', 1),
(2, '12A0553AUO5', 'Y/D CIRCLE DOBBY PATTERN-3A', 'MILD ENZYME WASH 15~20 MINUITES, LOW ENZYME RATIO ~1% ONLY, AND PLAIN SOFTENER', '/assets/images/uploads/89366661_2019_Oct_21_1571640105_1.jpg', 'B-03860', 0, '', '', '100% COTTON Y.D. Dobby Pattern', 1, '2019-10-21 08:28:42', 1),
(3, 'fthgdfg', 'dfgdfg', 'gdfgdf', '/assets/images/uploads/373392644_2019_Oct_21_1571664047_1.jpg', 'gdfgdf', 0, '', '', 'dfgdf', 1, '2019-10-21 13:20:48', 1),
(4, 'zdfcz', 'dfsdf', 'sdffs', '/assets/images/uploads/510841786_2019_Oct_21_1571664154_1.jpg', 'sdf', 0, '', '', 'safsdf', 1, '2019-10-21 13:22:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `style_po`
--

CREATE TABLE `style_po` (
  `StyleID` int(11) NOT NULL,
  `POID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trimsaccess`
--

CREATE TABLE `trimsaccess` (
  `TrimsAccessID` int(11) NOT NULL,
  `TrimsAccessPOID` int(11) NOT NULL,
  `TrimsAccessStyleID` int(11) NOT NULL,
  `TrimsAccessName` varchar(200) NOT NULL,
  `TrimsAccessDescription` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trimsaccess`
--

INSERT INTO `trimsaccess` (`TrimsAccessID`, `TrimsAccessPOID`, `TrimsAccessStyleID`, `TrimsAccessName`, `TrimsAccessDescription`, `AddedBy`, `Timestamp`, `Status`) VALUES
(1, 0, 1, 'Main Label', 'UBL 1791', 1, '2019-10-21 06:29:42', 1),
(2, 0, 1, 'Content/C.O.O. Label', '17921766', 1, '2019-10-21 06:29:42', 1),
(3, 0, 2, 'MAIN LABEL', 'UBL-1997', 1, '2019-10-21 06:41:45', 1),
(4, 0, 2, 'CONTENT/C.O.O. LABEL', 'UBL1792 UML-1766 CO#A', 1, '2019-10-21 06:41:45', 1),
(5, 0, 2, 'CARE LABEL', 'UMT-1746', 1, '2019-10-21 06:41:46', 1),
(6, 0, 2, 'SIZE STRIPE/STICKER', 'UCT-1218 BOYS', 1, '2019-10-21 06:41:46', 1),
(7, 0, 2, 'HANG TAG', 'UMT-1166 & USPA HOLOGRAM STICKER', 1, '2019-10-21 06:41:46', 1),
(8, 0, 2, 'UPC LABEL', 'UMT-1173(B)', 1, '2019-10-21 06:41:46', 1),
(9, 0, 2, 'HANGER', 'NONE', 1, '2019-10-21 06:41:46', 1),
(10, 0, 2, 'HANGER SIZER', 'NONE', 1, '2019-10-21 06:41:46', 1),
(11, 0, 2, 'POLYBAG', 'MASTER', 1, '2019-10-21 06:41:46', 1),
(12, 0, 2, 'FOLD METHOD', 'FLAT PACK', 1, '2019-10-21 06:41:46', 1),
(13, 0, 2, 'PCS/CARTON', '15', 1, '2019-10-21 06:41:46', 1),
(14, 0, 2, 'TOP SAMPLES', '', 1, '2019-10-21 06:41:46', 1),
(15, 0, 3, 'ds', 'sdf', 1, '2019-10-21 13:20:48', 1),
(16, 0, 3, 'sfs', 'sdfs', 1, '2019-10-21 13:20:48', 1),
(17, 0, 3, 'sf', 'sfd', 1, '2019-10-21 13:20:48', 1),
(18, 0, 3, 'sfsdf', 'sfds', 1, '2019-10-21 13:20:48', 1),
(19, 0, 4, 'df', 'sdf', 1, '2019-10-21 13:22:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Designation` varchar(200) NOT NULL,
  `Pass` varchar(200) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Name`, `Username`, `Designation`, `Pass`, `AddedBy`, `Timestamp`, `Status`) VALUES
(1, 'Admin', 'admin', 'Admin', '123', 1, '2019-10-20 05:39:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wash_form`
--

CREATE TABLE `wash_form` (
  `WashFormID` int(11) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `POID` int(11) NOT NULL,
  `StyleID` int(11) NOT NULL,
  `Color` varchar(100) NOT NULL,
  `Send` int(11) NOT NULL,
  `Receive` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `POID` (`POID`),
  ADD KEY `AddedBy` (`AddedBy`),
  ADD KEY `StyleID` (`StyleID`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `b2blc`
--
ALTER TABLE `b2blc`
  ADD PRIMARY KEY (`B2BLCID`),
  ADD KEY `MasterLCID` (`MasterLCID`),
  ADD KEY `AddedBy` (`AddedBy`);

--
-- Indexes for table `b2b_item`
--
ALTER TABLE `b2b_item`
  ADD PRIMARY KEY (`ItemID`),
  ADD KEY `ItemID` (`ItemID`,`StyleID`,`POID`),
  ADD KEY `B2BLCID` (`B2BLCID`),
  ADD KEY `StyleID` (`StyleID`),
  ADD KEY `POID` (`POID`),
  ADD KEY `AddedBy` (`AddedBy`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`BuyerID`),
  ADD KEY `AddedBy` (`AddedBy`);

--
-- Indexes for table `carton_form`
--
ALTER TABLE `carton_form`
  ADD PRIMARY KEY (`CartonFromID`),
  ADD KEY `AddedBy` (`AddedBy`),
  ADD KEY `StyleID` (`StyleID`),
  ADD KEY `POID` (`POID`);

--
-- Indexes for table `cutting_form`
--
ALTER TABLE `cutting_form`
  ADD PRIMARY KEY (`CuttingFormID`),
  ADD KEY `AddedBy` (`AddedBy`),
  ADD KEY `POID` (`POID`),
  ADD KEY `StyleID` (`StyleID`);

--
-- Indexes for table `cutting_form_description`
--
ALTER TABLE `cutting_form_description`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CuttingFormID` (`CuttingFormID`),
  ADD KEY `AddedBy` (`AddedBy`);

--
-- Indexes for table `fab_issue`
--
ALTER TABLE `fab_issue`
  ADD PRIMARY KEY (`FabIssueID`),
  ADD KEY `AddedBy` (`AddedBy`),
  ADD KEY `POID` (`POID`),
  ADD KEY `StyleID` (`StyleID`),
  ADD KEY `BuyerID` (`BuyerID`);

--
-- Indexes for table `fab_issue_description`
--
ALTER TABLE `fab_issue_description`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AddedBy` (`AddedBy`),
  ADD KEY `FabIssueID` (`FabIssueID`);

--
-- Indexes for table `fab_receive`
--
ALTER TABLE `fab_receive`
  ADD PRIMARY KEY (`FabReceiveID`),
  ADD KEY `POID` (`POID`,`StyleID`),
  ADD KEY `StyleID` (`StyleID`),
  ADD KEY `AddedBy` (`AddedBy`);

--
-- Indexes for table `fab_receive_other`
--
ALTER TABLE `fab_receive_other`
  ADD PRIMARY KEY (`id`),
  ADD KEY `BuyerID` (`BuyerID`),
  ADD KEY `AddedBy` (`AddedBy`);

--
-- Indexes for table `fab_relaxation`
--
ALTER TABLE `fab_relaxation`
  ADD PRIMARY KEY (`FabRelaxationID`),
  ADD KEY `AddedBy` (`AddedBy`),
  ADD KEY `StyleID` (`StyleID`),
  ADD KEY `BuyerID` (`BuyerID`);

--
-- Indexes for table `fab_relaxation_description`
--
ALTER TABLE `fab_relaxation_description`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FabRelaxationID` (`FabRelaxationID`),
  ADD KEY `AddedBy` (`AddedBy`),
  ADD KEY `FabRelaxationID_2` (`FabRelaxationID`);

--
-- Indexes for table `hourly_finishing_form`
--
ALTER TABLE `hourly_finishing_form`
  ADD PRIMARY KEY (`HourlyFinishingID`),
  ADD KEY `AddedBy` (`AddedBy`),
  ADD KEY `POID` (`POID`,`StyleID`),
  ADD KEY `StyleID` (`StyleID`);

--
-- Indexes for table `hourly_production`
--
ALTER TABLE `hourly_production`
  ADD PRIMARY KEY (`HourlyProductionID`),
  ADD KEY `AddedBy` (`AddedBy`);

--
-- Indexes for table `hourly_production_details`
--
ALTER TABLE `hourly_production_details`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AddedBy` (`AddedBy`),
  ADD KEY `POID` (`POID`),
  ADD KEY `StyleID` (`StyleID`),
  ADD KEY `HourlyProductionID` (`HourlyProductionID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ItemID`),
  ADD KEY `AddedBy` (`AddedBy`);

--
-- Indexes for table `itemrequirment`
--
ALTER TABLE `itemrequirment`
  ADD PRIMARY KEY (`ItemRequirmentID`),
  ADD KEY `ItemRequirmentStyleID` (`ItemRequirmentStyleID`,`ItemRequirmentItemID`),
  ADD KEY `ItemRequirmentItemID` (`ItemRequirmentItemID`),
  ADD KEY `AddedBy` (`AddedBy`);

--
-- Indexes for table `item_issue_access`
--
ALTER TABLE `item_issue_access`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ItemID` (`ItemID`,`StyleID`,`POID`),
  ADD KEY `StyleID` (`StyleID`),
  ADD KEY `POID` (`POID`);

--
-- Indexes for table `item_style`
--
ALTER TABLE `item_style`
  ADD KEY `item_id` (`ItemID`),
  ADD KEY `style_id` (`StyleID`);

--
-- Indexes for table `lay_form`
--
ALTER TABLE `lay_form`
  ADD PRIMARY KEY (`LayFormID`),
  ADD KEY `BuyerID` (`BuyerID`),
  ADD KEY `StyleID` (`StyleID`),
  ADD KEY `POID` (`POID`),
  ADD KEY `AddedBy` (`AddedBy`);

--
-- Indexes for table `lay_form_details`
--
ALTER TABLE `lay_form_details`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AddedBy` (`AddedBy`),
  ADD KEY `layFormID` (`layFormID`);

--
-- Indexes for table `masterlc`
--
ALTER TABLE `masterlc`
  ADD PRIMARY KEY (`MasterLCID`),
  ADD KEY `MasterLCBuyer` (`MasterLCBuyer`),
  ADD KEY `AddedBy` (`AddedBy`);

--
-- Indexes for table `order_description`
--
ALTER TABLE `order_description`
  ADD PRIMARY KEY (`OrderdescriptionID`);

--
-- Indexes for table `pi`
--
ALTER TABLE `pi`
  ADD PRIMARY KEY (`PIID`),
  ADD KEY `AddedBy` (`AddedBy`);

--
-- Indexes for table `pi_description`
--
ALTER TABLE `pi_description`
  ADD PRIMARY KEY (`PIID`),
  ADD KEY `PIID` (`PIID`,`POID`,`ItemID`),
  ADD KEY `POID` (`POID`),
  ADD KEY `ItemID` (`ItemID`),
  ADD KEY `AddedBy` (`AddedBy`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`POID`),
  ADD KEY `POMasterLCID` (`MasterLCOccupied`,`BTBLCIDOccupied`),
  ADD KEY `AddedBy` (`AddedBy`);

--
-- Indexes for table `prepack`
--
ALTER TABLE `prepack`
  ADD PRIMARY KEY (`PrePackID`),
  ADD KEY `POID` (`POID`),
  ADD KEY `AddedBy` (`AddedBy`);

--
-- Indexes for table `shipment_form`
--
ALTER TABLE `shipment_form`
  ADD PRIMARY KEY (`ShipmentFormID`),
  ADD KEY `POID` (`POID`),
  ADD KEY `StyleID` (`StyleID`),
  ADD KEY `AddedBy` (`AddedBy`);

--
-- Indexes for table `stationary_issue`
--
ALTER TABLE `stationary_issue`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AddedBy` (`AddedBy`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `stationary_item`
--
ALTER TABLE `stationary_item`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AddedBy` (`AddedBy`);

--
-- Indexes for table `stationary_receive`
--
ALTER TABLE `stationary_receive`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AddedBy` (`AddedBy`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`StyleID`),
  ADD KEY `AddedBy` (`AddedBy`);

--
-- Indexes for table `style_po`
--
ALTER TABLE `style_po`
  ADD KEY `StyleID` (`StyleID`),
  ADD KEY `POID` (`POID`);

--
-- Indexes for table `trimsaccess`
--
ALTER TABLE `trimsaccess`
  ADD PRIMARY KEY (`TrimsAccessID`),
  ADD KEY `TrimsAccessPOID` (`TrimsAccessPOID`,`TrimsAccessStyleID`),
  ADD KEY `TrimsAccessStyleID` (`TrimsAccessStyleID`),
  ADD KEY `AddedBy` (`AddedBy`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `AddedBy` (`AddedBy`);

--
-- Indexes for table `wash_form`
--
ALTER TABLE `wash_form`
  ADD PRIMARY KEY (`WashFormID`),
  ADD KEY `AddedBy` (`AddedBy`),
  ADD KEY `POID` (`POID`),
  ADD KEY `StyleID` (`StyleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `b2blc`
--
ALTER TABLE `b2blc`
  MODIFY `B2BLCID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `b2b_item`
--
ALTER TABLE `b2b_item`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `BuyerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carton_form`
--
ALTER TABLE `carton_form`
  MODIFY `CartonFromID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cutting_form`
--
ALTER TABLE `cutting_form`
  MODIFY `CuttingFormID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cutting_form_description`
--
ALTER TABLE `cutting_form_description`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fab_issue`
--
ALTER TABLE `fab_issue`
  MODIFY `FabIssueID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fab_issue_description`
--
ALTER TABLE `fab_issue_description`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fab_receive`
--
ALTER TABLE `fab_receive`
  MODIFY `FabReceiveID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fab_receive_other`
--
ALTER TABLE `fab_receive_other`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fab_relaxation`
--
ALTER TABLE `fab_relaxation`
  MODIFY `FabRelaxationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fab_relaxation_description`
--
ALTER TABLE `fab_relaxation_description`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hourly_finishing_form`
--
ALTER TABLE `hourly_finishing_form`
  MODIFY `HourlyFinishingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hourly_production`
--
ALTER TABLE `hourly_production`
  MODIFY `HourlyProductionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hourly_production_details`
--
ALTER TABLE `hourly_production_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `itemrequirment`
--
ALTER TABLE `itemrequirment`
  MODIFY `ItemRequirmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item_issue_access`
--
ALTER TABLE `item_issue_access`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lay_form`
--
ALTER TABLE `lay_form`
  MODIFY `LayFormID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lay_form_details`
--
ALTER TABLE `lay_form_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masterlc`
--
ALTER TABLE `masterlc`
  MODIFY `MasterLCID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_description`
--
ALTER TABLE `order_description`
  MODIFY `OrderdescriptionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pi`
--
ALTER TABLE `pi`
  MODIFY `PIID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pi_description`
--
ALTER TABLE `pi_description`
  MODIFY `PIID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `POID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prepack`
--
ALTER TABLE `prepack`
  MODIFY `PrePackID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipment_form`
--
ALTER TABLE `shipment_form`
  MODIFY `ShipmentFormID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stationary_issue`
--
ALTER TABLE `stationary_issue`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stationary_item`
--
ALTER TABLE `stationary_item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stationary_receive`
--
ALTER TABLE `stationary_receive`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `style`
--
ALTER TABLE `style`
  MODIFY `StyleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trimsaccess`
--
ALTER TABLE `trimsaccess`
  MODIFY `TrimsAccessID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wash_form`
--
ALTER TABLE `wash_form`
  MODIFY `WashFormID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;