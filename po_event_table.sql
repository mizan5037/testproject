-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 03, 2019 at 06:48 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

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
-- Table structure for table `po_event`
--

CREATE TABLE `po_event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_event`
--

INSERT INTO `po_event` (`event_id`, `event_name`) VALUES
(1, 'Order Confirmation From Buyer'),
(2, 'PO Sheet Received From Buyer	'),
(3, 'Fabric P/I Received From Buyer	'),
(4, 'Trims P/I Received From Buyer	'),
(5, 'Fabric & Trims L/C Open	'),
(6, 'Bulk Fabric sample Received From Buyer	'),
(7, 'Bulk Trims Sample Received From Buyer'),
(8, 'Bulk Fabric Shipment	'),
(9, 'Bulk Trims Shipment	'),
(10, 'Bulk Fabric Doc\'s Received From buyer	'),
(11, 'Bulk Trims Doc\'s Received From Buyer	'),
(12, 'Embroidery Approval	'),
(13, 'Sewing Thread Approval	'),
(14, 'PPS Submit'),
(15, 'PPS Approval'),
(16, 'Sewing Thread In House'),
(17, 'Main Label In House'),
(18, 'Size Label In House'),
(19, 'Care Label In House'),
(20, 'Other Label In House'),
(21, 'Interlining in House'),
(22, 'Bulk Fabric In House'),
(23, 'Bulk Trims In House'),
(24, 'Hang Tag + Hologram Sticker In House'),
(25, 'UPC Ticket In House'),
(26, 'Size Set Submit '),
(27, 'Size Set Approval'),
(28, 'PP Meeting'),
(29, 'Production Pilot Run (PPR)'),
(30, 'Cutting Start Date'),
(31, 'Line Required'),
(32, 'Days Required'),
(33, 'Sewing Start Date'),
(34, 'Sewing Complete Date'),
(35, 'Finish Start Date'),
(36, 'Pack Complete	'),
(37, 'Bulk Garments Final Inspection /Ex Factory'),
(38, 'Bulk Garments Hand Over to Forwarder'),
(39, 'Special Note:');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `po_event`
--
ALTER TABLE `po_event`
  ADD PRIMARY KEY (`event_id`),
  ADD UNIQUE KEY `event_id` (`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `po_event`
--
ALTER TABLE `po_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
