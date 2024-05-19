-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2024 at 05:17 PM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbserver_excelsiorschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `advreceipt`
--

CREATE TABLE `advreceipt` (
  `recptcode` int(20) NOT NULL,
  `code` varchar(11) NOT NULL,
  `dt` date NOT NULL,
  `custname` varchar(255) NOT NULL,
  `recamt` varchar(255) NOT NULL,
  `tds` varchar(255) NOT NULL,
  `disc` varchar(255) NOT NULL,
  `mode` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `rem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `amctbl`
--

CREATE TABLE `amctbl` (
  `dt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `annexure`
--

CREATE TABLE `annexure` (
  `invno` varchar(255) NOT NULL,
  `code` int(255) NOT NULL,
  `contno` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `amt` varchar(255) NOT NULL,
  `outdt` date NOT NULL,
  `line` varchar(255) NOT NULL,
  `ctype` varchar(255) NOT NULL,
  `transporter` varchar(255) NOT NULL,
  `bookvalid` date NOT NULL,
  `vehno` varchar(255) NOT NULL,
  `indt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `autocr`
--

CREATE TABLE `autocr` (
  `code` int(20) NOT NULL,
  `unm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autocr`
--

INSERT INTO `autocr` (`code`, `unm`) VALUES
(1, 'user'),
(2, 'user'),
(3, 'user'),
(4, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `autodexp`
--

CREATE TABLE `autodexp` (
  `code` int(20) NOT NULL,
  `uname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `autofrxinv`
--

CREATE TABLE `autofrxinv` (
  `code` int(20) NOT NULL,
  `unm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autofrxinv`
--

INSERT INTO `autofrxinv` (`code`, `unm`) VALUES
(1, '123'),
(2, 'user'),
(3, 'user'),
(4, 'user'),
(5, 'user'),
(6, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `autogrnno`
--

CREATE TABLE `autogrnno` (
  `code` int(255) NOT NULL,
  `uname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `autoidexp`
--

CREATE TABLE `autoidexp` (
  `code` int(20) NOT NULL,
  `uname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `autoinv`
--

CREATE TABLE `autoinv` (
  `code` int(20) NOT NULL,
  `unm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autoinv`
--

INSERT INTO `autoinv` (`code`, `unm`) VALUES
(1, 'user'),
(2, 'user'),
(3, 'user'),
(4, 'user'),
(5, 'user'),
(6, 'user'),
(7, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `autootherexp`
--

CREATE TABLE `autootherexp` (
  `code` int(20) NOT NULL,
  `uname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `autopinv`
--

CREATE TABLE `autopinv` (
  `code` int(11) NOT NULL,
  `unm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `autopono`
--

CREATE TABLE `autopono` (
  `code` int(255) NOT NULL,
  `uname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `autorexp`
--

CREATE TABLE `autorexp` (
  `code` int(20) NOT NULL,
  `uname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bank_mst`
--

CREATE TABLE `bank_mst` (
  `code` int(20) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `ifsc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `code` int(20) NOT NULL,
  `line` varchar(255) NOT NULL,
  `bookdt` date NOT NULL,
  `bookid` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `pay` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `gst` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `booking_copy` varchar(255) NOT NULL,
  `chaname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contstatus`
--

CREATE TABLE `contstatus` (
  `code` int(20) NOT NULL,
  `contno` varchar(255) NOT NULL,
  `appdt` date NOT NULL,
  `estamt` varchar(255) NOT NULL,
  `appamt` varchar(255) NOT NULL,
  `repairdt` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `alloteddt` date NOT NULL,
  `remark` varchar(255) NOT NULL,
  `dmgcondition` varchar(255) NOT NULL,
  `shipper` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `credit_main`
--

CREATE TABLE `credit_main` (
  `crno` varchar(255) NOT NULL,
  `crdt` date NOT NULL,
  `invno` varchar(255) NOT NULL,
  `invdt` date NOT NULL,
  `billto` varchar(255) NOT NULL,
  `delnote` varchar(255) NOT NULL,
  `mode` varchar(255) NOT NULL,
  `ship` varchar(255) NOT NULL,
  `oref` varchar(255) NOT NULL,
  `bookno` varchar(255) NOT NULL,
  `bdt` date NOT NULL,
  `disp` varchar(255) NOT NULL,
  `dest` varchar(255) NOT NULL,
  `delterms` varchar(255) NOT NULL,
  `cgst` varchar(255) NOT NULL,
  `sgst` varchar(255) NOT NULL,
  `igst` varchar(255) NOT NULL,
  `round` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `txamt` varchar(255) NOT NULL,
  `cper` varchar(50) NOT NULL,
  `sper` varchar(50) NOT NULL,
  `iper` varchar(50) NOT NULL,
  `irnno` varchar(255) NOT NULL,
  `ackno` varchar(255) NOT NULL,
  `ackdt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `credit_main`
--

INSERT INTO `credit_main` (`crno`, `crdt`, `invno`, `invdt`, `billto`, `delnote`, `mode`, `ship`, `oref`, `bookno`, `bdt`, `disp`, `dest`, `delterms`, `cgst`, `sgst`, `igst`, `round`, `total`, `txamt`, `cper`, `sper`, `iper`, `irnno`, `ackno`, `ackdt`) VALUES
('EMSCRN/22-23/001', '2023-09-12', 'ESPL/23-24/00001', '2023-09-13', '10', 'thank you for purchasing', 'Cash', 'msc', 'amazon', '4585', '2023-09-15', 'amazon', 'adipur', 'idk', '', '', '22590', '0', '148090', '125500', '', '', '18%', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `cr_child`
--

CREATE TABLE `cr_child` (
  `crno` varchar(255) NOT NULL,
  `srno` int(255) NOT NULL,
  `descript` varchar(255) NOT NULL,
  `hsn` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `gstrate` varchar(255) NOT NULL,
  `gstamount` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cr_child`
--

INSERT INTO `cr_child` (`crno`, `srno`, `descript`, `hsn`, `qty`, `rate`, `gstrate`, `gstamount`, `amount`) VALUES
('EMSCRN/22-23/002', 1, '11', '456123', '51', '500', '912624', '232719120', '25500'),
('EMSCRN/22-23/002', 2, '11', '456123', '65', '500', '912624', '296602800', '32500'),
('EMSCRN/22-23/002', 3, '11', '456123', '56', '500', '912624', '255534720', '28000'),
('EMSCRN/22-23/002', 4, '11', '456123', '23', '500', '912624', '104951760', '11500'),
('EMSCRN/22-23/002', 5, '11', '456123', '56', '500', '912624', '255534720', '28000'),
('EMSCRN/22-23/003', 1, '11', '456123', '51', '500', '912624', '232719120', '25500'),
('EMSCRN/22-23/003', 2, '11', '456123', '65', '500', '912624', '296602800', '32500'),
('EMSCRN/22-23/003', 3, '11', '456123', '56', '500', '912624', '255534720', '28000'),
('EMSCRN/22-23/003', 4, '11', '456123', '23', '500', '912624', '104951760', '11500'),
('EMSCRN/22-23/003', 5, '11', '456123', '56', '500', '912624', '255534720', '28000'),
('EMSCRN/22-23/004', 1, '11', '456123', '50', '500', '912624', '228156000', '25000'),
('EMSCRN/22-23/004', 2, '11', '456123', '50', '300', '912624', '136893600', '15000'),
('EMSCRN/22-23/004', 3, '11', '456123', '50', '200', '912624', '91262400', '10000'),
('EMSCRN/22-23/001', 1, '11', '456123', '51', '500', '912624', '232719120', '25500'),
('EMSCRN/22-23/001', 2, '11', '456123', '65', '500', '912624', '296602800', '32500'),
('EMSCRN/22-23/001', 3, '11', '456123', '56', '500', '912624', '255534720', '28000'),
('EMSCRN/22-23/001', 4, '11', '456123', '23', '500', '912624', '104951760', '11500'),
('EMSCRN/22-23/001', 5, '11', '456123', '56', '500', '912624', '255534720', '28000');

-- --------------------------------------------------------

--
-- Table structure for table `cust_ac`
--

CREATE TABLE `cust_ac` (
  `code` varchar(255) NOT NULL,
  `code2` int(11) NOT NULL,
  `dt` date NOT NULL,
  `custid` varchar(255) NOT NULL,
  `add` varchar(255) NOT NULL,
  `less` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL,
  `tds` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cust_ac`
--

INSERT INTO `cust_ac` (`code`, `code2`, `dt`, `custid`, `add`, `less`, `other`, `tds`) VALUES
('JSPL/2023-24/00001', 1, '2023-09-09', '2', '8732.00', '0', '0', ''),
('EMSCRN/22-23/002', 3, '2023-09-12', '10', '0', '148090', '0', ''),
('EMSCRN/22-23/003', 4, '2023-09-12', '10', '0', '148090', '0', ''),
('EMSCRN/22-23/004', 5, '2023-09-12', '9', '0', '29500', '0', ''),
('EMSCRN/22-23/001', 6, '2023-09-12', '10', '0', '148090', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `cust_master`
--

CREATE TABLE `cust_master` (
  `code` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adrs` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `stcode` varchar(255) NOT NULL,
  `gstno` varchar(255) NOT NULL,
  `panno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `opnbal` varchar(255) NOT NULL,
  `aemail` varchar(255) NOT NULL,
  `wportal` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `oemail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cust_master`
--

INSERT INTO `cust_master` (`code`, `name`, `adrs`, `city`, `state`, `stcode`, `gstno`, `panno`, `email`, `mobile`, `opnbal`, `aemail`, `wportal`, `pincode`, `oemail`) VALUES
(3, 'tanya', 'adipur', 'gandhidham ', 'gujarat ', '24', '123456789', '3456789', 'touraniloveina@gmail', '7600605548', '200000', 'touraniloveina@gmail', '', '370205', ''),
(4, 'chirag', 'adipur', 'gandhidham ', 'gujarat ', '24', '45453', '453', 'cmdabhi67@gmail.com', '7600605548', '3000', 'cmdabhi67@gmail.com', '', '370205', ''),
(5, 'vanshika', 'adipur', 'gandhidham', 'gujarat', 'India', '5455', '5554', 'cmdabhi67@gmail.com', '0760060554', '9000', 'cmdabhi67@gmail.com', '', '370205', 'cmdabhi67@gmail.com'),
(6, 'mini nobles', 'adipur', 'gandhidham', 'gujarat', 'India', '5445', '4554', 'cmdabhi67@gmail.com', '0760060554', '100000', 'cmdabhi67@gmail.com', '', '370205', 'cmdabhi67@gmail.com'),
(7, 'nisarg', 'adipur', 'gandhidham', 'gujarat', 'India', '47545', '545', 'cmdabhi67@gmail.com', '0760060554', '134679', 'cmdabhi67@gmail.com', '', '370205', 'cmdabhi67@gmail.com'),
(8, 'gaurang', 'adipur', 'gandhidham', 'gujarat', 'India', '1435', '3554', 'cmdabhi67@gmail.com', '0760060554', '7894', 'cmdabhi67@gmail.com', '', '370205', 'cmdabhi67@gmail.com'),
(9, 'riddhi', 'adipur', 'gandhidham', 'gujarat', 'India', '2165', '6554', 'cmdabhi67@gmail.com', '654565465', '454546', 'cmdabhi67@gmail.com', '', '370205', 'cmdabhi67@gmail.com'),
(10, 'jaykishan', 'adipur', 'gandhidham', 'gujarat', 'India', '2555', '5525', 'cmdabhi67@gmail.com', '4528251422', '46000', 'cmdabhi67@gmail.com', '', '370205', 'cmdabhi67@gmail.com'),
(11, 'vanshika', 'adipur', 'gandhidham', 'gujarat', 'India', '512', '2944', 'cmdabhi67@gmail.com', '0760060554', '25480', 'cmdabhi67@gmail.com', '', '370205', 'cmdabhi67@gmail.com'),
(12, 'Hdhxxh', 'Djdj', 'Fnfnd', 'Fhd', '24', 'Ddj', 'jhf', 'Ndfhghh', 'Ffhchdhdhd', 'Ffjfh', 'Ffh', '', '370295', 'Ffvb'),
(13, 'vanshika', 'adipur', 'gandhidham', 'gujarat', 'India', '524', '4554', 'cmdabhi67@gmail.com', '0760060554', '200000', 'cmdabhi67@gmail.com', '', '370205', 'cmdabhi67@gmail.com'),
(14, 'chirag', 'adipur', 'gandhidham', 'gujarat', 'India', '5455', '5525', 'cmdabhi67@gmail.com', '0760060554', '9000', 'cmdabhi67@gmail.com', '', '370205', 'cmdabhi67@gmail.com'),
(15, 'vanshika', 'excelsior model school', 'adipur', 'gujarat', '24', '4646656', '4665654', 'vanshika2123.com', '2345857350', '3455', '23434', '', '370205', 'vanshika@12.com');

-- --------------------------------------------------------

--
-- Table structure for table `dattend`
--

CREATE TABLE `dattend` (
  `code` int(20) NOT NULL,
  `date` date NOT NULL,
  `empcode` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `desig` varchar(255) NOT NULL,
  `ap` varchar(255) NOT NULL,
  `tabsnt` varchar(255) NOT NULL,
  `tprsnt` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dept_mst`
--

CREATE TABLE `dept_mst` (
  `code` int(20) NOT NULL,
  `dept` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `desig_mst`
--

CREATE TABLE `desig_mst` (
  `code` int(20) NOT NULL,
  `designation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `directexp`
--

CREATE TABLE `directexp` (
  `code` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `exphead` varchar(255) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `narration` varchar(255) NOT NULL,
  `amt` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `approveby` varchar(255) NOT NULL,
  `cgst` varchar(255) NOT NULL,
  `sgst` varchar(255) NOT NULL,
  `igst` varchar(255) NOT NULL,
  `tds` varchar(255) NOT NULL,
  `tamt` varchar(255) NOT NULL,
  `camt` varchar(255) NOT NULL,
  `samt` varchar(255) NOT NULL,
  `iamt` varchar(255) NOT NULL,
  `mode` varchar(255) NOT NULL,
  `invno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `einv`
--

CREATE TABLE `einv` (
  `inv` varchar(50) NOT NULL,
  `sez` varchar(50) NOT NULL,
  `irnno` varchar(100) NOT NULL,
  `ackno` varchar(255) NOT NULL,
  `ackdt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `einv2`
--

CREATE TABLE `einv2` (
  `inv` varchar(50) NOT NULL,
  `sez` varchar(50) NOT NULL,
  `irnno` varchar(100) NOT NULL,
  `ackno` int(100) NOT NULL,
  `ackdt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `empentry`
--

CREATE TABLE `empentry` (
  `code` varchar(255) NOT NULL,
  `ecode` varchar(255) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `dt` date NOT NULL,
  `present` varchar(255) NOT NULL,
  `absent` varchar(255) NOT NULL,
  `otstatus` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_mst`
--

CREATE TABLE `emp_mst` (
  `code` varchar(25) NOT NULL,
  `empname` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `desig` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `joindt` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `basic` varchar(255) NOT NULL,
  `hra` varchar(255) NOT NULL,
  `convey` varchar(255) NOT NULL,
  `oallow` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `pday` varchar(255) NOT NULL,
  `acno` varchar(255) NOT NULL,
  `ifsc` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `pf` varchar(255) NOT NULL,
  `tds` varchar(255) NOT NULL,
  `bikedep` varchar(255) NOT NULL,
  `canteen` varchar(255) NOT NULL,
  `aadhar` varchar(255) NOT NULL,
  `pan` varchar(255) NOT NULL,
  `passbook` varchar(255) NOT NULL,
  `adproof` varchar(255) NOT NULL,
  `offerletter` varchar(255) NOT NULL,
  `pmode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `emptype` varchar(255) NOT NULL,
  `tdsamt` varchar(255) NOT NULL,
  `ptamt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `forexinv_child`
--

CREATE TABLE `forexinv_child` (
  `invno` varchar(255) NOT NULL,
  `srno` int(255) NOT NULL,
  `descript` varchar(255) NOT NULL,
  `hsn` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `gstrate` varchar(255) NOT NULL,
  `gstamount` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forexinv_child`
--

INSERT INTO `forexinv_child` (`invno`, `srno`, `descript`, `hsn`, `qty`, `rate`, `gstrate`, `gstamount`, `amount`, `size`) VALUES
('ESFRX/23-24/0003', 1, '11', '456123', '48', '500', '912624', '219029760', '24000.00', ''),
('ESFRX/23-24/0004', 1, '11', '456123', '48', '69', '100', '100', '3312.00', '40'),
('ESFRX/23-24/0005', 1, '14', '456123', '48', '2526', '0', '0', '121248.00', ''),
('ESFRX/23-24/0006', 1, '14', '84', '4', '100', '1128', '4512', '400.00', '40');

-- --------------------------------------------------------

--
-- Table structure for table `forexinv_main`
--

CREATE TABLE `forexinv_main` (
  `invno` varchar(255) NOT NULL,
  `dt` date NOT NULL,
  `billto` varchar(255) NOT NULL,
  `pod` varchar(255) NOT NULL,
  `pol` varchar(255) NOT NULL,
  `ship` varchar(255) NOT NULL,
  `eta` varchar(255) NOT NULL,
  `etd` varchar(255) NOT NULL,
  `hblno` varchar(255) NOT NULL,
  `mblno` varchar(255) NOT NULL,
  `contlot` varchar(255) NOT NULL,
  `exrate` varchar(255) NOT NULL,
  `cgst` varchar(255) NOT NULL,
  `sgst` varchar(255) NOT NULL,
  `igst` varchar(255) NOT NULL,
  `round` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `txamt` varchar(255) NOT NULL,
  `cper` varchar(50) NOT NULL,
  `sper` varchar(50) NOT NULL,
  `iper` varchar(50) NOT NULL,
  `sez` varchar(50) NOT NULL,
  `irnno` varchar(255) NOT NULL,
  `ackno` varchar(255) NOT NULL,
  `ackdt` date NOT NULL,
  `usdtamt` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forexinv_main`
--

INSERT INTO `forexinv_main` (`invno`, `dt`, `billto`, `pod`, `pol`, `ship`, `eta`, `etd`, `hblno`, `mblno`, `contlot`, `exrate`, `cgst`, `sgst`, `igst`, `round`, `total`, `txamt`, `cper`, `sper`, `iper`, `sez`, `irnno`, `ackno`, `ackdt`, `usdtamt`, `country`) VALUES
('ESFRX/23-24/0002', '2023-09-12', '3', '12', '12', 'msc', '45', '45', '1236', '1236', '12365', '458', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', 'Other'),
('ESFRX/23-24/0003', '2023-09-12', '5', '475', '545', 'msc', '44', '475', '5445', '4454', '45487', '424', '', '', '219029760.00', '0.00', '219053760.00', '24000.00', '', '', '912624', 'sez', '', '', '0000-00-00', '516636.23', 'India'),
('ESFRX/23-24/0004', '2023-09-12', '9', '66', '23', 'msc', '78', '475', '474', '56556', '6655', '525', '', '', '0.00', '0.00', '3312.00', '3312.00', '', '', '0', 'sez', '', '', '0000-00-00', '6.31', 'Other'),
('ESFRX/23-24/0005', '0578-08-05', '4', '45', '12', 'msc', '45', '475', '1755', '5454', '6655', '525', '', '', '0.00', '0.00', '121248.00', '121248.00', '', '', '0', 'sez', '', '', '0000-00-00', '230.95', 'Other'),
('ESFRX/23-24/0006', '2023-12-04', '4', '3', '1', '2', 'H', 'J', 'J', 'J', 'H', 'B', '', '', '4512.00', '0.00', '4912.00', '400.00', '', '', '1128', 'sez', '', '', '0000-00-00', 'NaN', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `gatepass`
--

CREATE TABLE `gatepass` (
  `gno` int(255) NOT NULL,
  `dt` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `line` varchar(255) NOT NULL,
  `transporter` varchar(255) NOT NULL,
  `vehno` varchar(255) NOT NULL,
  `vessel` varchar(255) NOT NULL,
  `bookno` varchar(255) NOT NULL,
  `dest` varchar(255) NOT NULL,
  `cont1` varchar(255) NOT NULL,
  `size1` varchar(255) NOT NULL,
  `cont2` varchar(255) NOT NULL,
  `size2` varchar(255) NOT NULL,
  `gwt1` varchar(255) NOT NULL,
  `twt1` varchar(255) NOT NULL,
  `mdt1` varchar(255) NOT NULL,
  `gwt2` varchar(255) NOT NULL,
  `twt2` varchar(255) NOT NULL,
  `mdt2` varchar(255) NOT NULL,
  `ctype` varchar(255) NOT NULL,
  `cha` varchar(255) NOT NULL,
  `dono` varchar(255) NOT NULL,
  `dodt` date NOT NULL,
  `type1` varchar(255) NOT NULL,
  `type2` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `status2` varchar(255) NOT NULL,
  `rem1` varchar(255) NOT NULL,
  `rem2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gatepassout`
--

CREATE TABLE `gatepassout` (
  `gno` varchar(255) NOT NULL,
  `indt` date NOT NULL,
  `dt` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `line` varchar(255) NOT NULL,
  `transporter` varchar(255) NOT NULL,
  `vehno` varchar(255) NOT NULL,
  `vessel` varchar(255) NOT NULL,
  `bookno` varchar(255) NOT NULL,
  `bookvalidity` varchar(255) NOT NULL,
  `dest` varchar(255) NOT NULL,
  `cont1` varchar(255) NOT NULL,
  `size1` varchar(255) NOT NULL,
  `cont2` varchar(255) NOT NULL,
  `size2` varchar(255) NOT NULL,
  `gwt1` varchar(255) NOT NULL,
  `twt1` varchar(255) NOT NULL,
  `gwt2` varchar(255) NOT NULL,
  `twt2` varchar(255) NOT NULL,
  `ctype` varchar(255) NOT NULL,
  `cha` varchar(255) NOT NULL,
  `dono` varchar(255) NOT NULL,
  `dodt` varchar(255) NOT NULL,
  `type1` varchar(255) NOT NULL,
  `type2` varchar(255) NOT NULL,
  `rem1` varchar(255) NOT NULL,
  `rem2` varchar(255) NOT NULL,
  `service1` varchar(255) NOT NULL,
  `service2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `grnchild`
--

CREATE TABLE `grnchild` (
  `grnno` varchar(255) NOT NULL,
  `code` int(255) NOT NULL,
  `work` varchar(255) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amt` varchar(255) NOT NULL,
  `rem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `grnentry`
--

CREATE TABLE `grnentry` (
  `grnno` varchar(255) NOT NULL,
  `grndt` date NOT NULL,
  `pono` varchar(255) NOT NULL,
  `supname` varchar(255) NOT NULL,
  `billno` varchar(255) NOT NULL,
  `billdt` date NOT NULL,
  `uname` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `idexp`
--

CREATE TABLE `idexp` (
  `code` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `exphead` varchar(255) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `narration` varchar(255) NOT NULL,
  `amt` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `approveby` varchar(255) NOT NULL,
  `invno` varchar(255) NOT NULL,
  `cgst` varchar(255) NOT NULL,
  `sgst` varchar(255) NOT NULL,
  `igst` varchar(255) NOT NULL,
  `camt` varchar(255) NOT NULL,
  `samt` varchar(255) NOT NULL,
  `iamt` varchar(255) NOT NULL,
  `tds` varchar(255) NOT NULL,
  `tamt` varchar(255) NOT NULL,
  `mode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inv_child`
--

CREATE TABLE `inv_child` (
  `invno` varchar(255) NOT NULL,
  `srno` int(255) NOT NULL,
  `descript` varchar(255) NOT NULL,
  `hsn` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `gstrate` varchar(255) NOT NULL,
  `gstamount` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inv_child`
--

INSERT INTO `inv_child` (`invno`, `srno`, `descript`, `hsn`, `qty`, `rate`, `gstrate`, `gstamount`, `amount`, `size`) VALUES
('JSPL/2023-24/00001', 1, '2', '1234', '2', '1000', '18', '360', '2000.00', '20'),
('JSPL/2023-24/00001', 2, '3', '12345', '2', '1200', '18', '432', '2400.00', '20'),
('JSPL/2023-24/00001', 3, '4', '123', '2', '1500', '18', '540', '3000.00', '20'),
('ESPL/23-24/00001', 1, '11', '456123', '48', '5655', '912624', '2477226585.6', '271440.00', '40'),
('ESPL/23-24/00002', 1, '11', '456123', '70', '200', '912624', '127767360', '14000.00', '20'),
('ESPL/23-24/00003', 1, '11', '456123', '48', '799', '912624', '350009556.48', '38352.00', '40'),
('ESPL/23-24/00004', 1, '11', '456123', '70', '5454', '912624', '3484215907.2', '381780.00', '20'),
('ESPL/23-24/00005', 1, '14', '84', '48', '5454', '1128', '2953013.76', '261792.00', '20'),
('ESPL/23-24/00006', 1, '13', '456123', '5', '50', '1696', '4240', '250.00', '20'),
('ESPL/23-24/00006', 2, '', '', '', '', '', '', '', ''),
('ESPL/23-24/00007', 1, '12', '456123', '10', '40', '912624', '3650496', '400.00', '40');

-- --------------------------------------------------------

--
-- Table structure for table `inv_child2`
--

CREATE TABLE `inv_child2` (
  `invno` varchar(255) NOT NULL,
  `srno` int(255) NOT NULL,
  `descript` varchar(255) NOT NULL,
  `hsn` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `gstrate` varchar(255) NOT NULL,
  `gstamount` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inv_main`
--

CREATE TABLE `inv_main` (
  `invno` varchar(255) NOT NULL,
  `dt` date NOT NULL,
  `billto` varchar(255) NOT NULL,
  `pod` varchar(255) NOT NULL,
  `pol` varchar(255) NOT NULL,
  `ship` varchar(255) NOT NULL,
  `eta` varchar(255) NOT NULL,
  `etd` varchar(255) NOT NULL,
  `hblno` varchar(255) NOT NULL,
  `mblno` varchar(255) NOT NULL,
  `contlot` varchar(255) NOT NULL,
  `exrate` varchar(255) NOT NULL,
  `cgst` varchar(255) NOT NULL,
  `sgst` varchar(255) NOT NULL,
  `igst` varchar(255) NOT NULL,
  `round` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `txamt` varchar(255) NOT NULL,
  `cper` varchar(50) NOT NULL,
  `sper` varchar(50) NOT NULL,
  `iper` varchar(50) NOT NULL,
  `sez` varchar(50) NOT NULL,
  `irnno` varchar(255) NOT NULL,
  `ackno` varchar(255) NOT NULL,
  `ackdt` date NOT NULL,
  `usdtamt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inv_main`
--

INSERT INTO `inv_main` (`invno`, `dt`, `billto`, `pod`, `pol`, `ship`, `eta`, `etd`, `hblno`, `mblno`, `contlot`, `exrate`, `cgst`, `sgst`, `igst`, `round`, `total`, `txamt`, `cper`, `sper`, `iper`, `sez`, `irnno`, `ackno`, `ackdt`, `usdtamt`) VALUES
('ESPL/23-24/00001', '2023-09-12', '4', '45', '56', 'msc', '54', '54', '1755', '1236', '12365', '525', '1238613292.80', '1238613292.80', '0.00', '0.40', '2477498026.00', '271440.00', '456312', '456312', '0', '', '', '', '0000-00-00', '4719043.86'),
('ESPL/23-24/00002', '2023-09-12', '6', '45', '12', 'msc', '445', '545', '545', '5454', '6655', '454', '0.00', '0.00', '127767360.00', '0.00', '127781360.00', '14000.00', '0', '0', '912624', 'sez', '', '', '0000-00-00', '281456.74'),
('ESPL/23-24/00003', '2023-09-12', '3', '54', '56', 'msc', '56', '56', '5476', '6566', '6965', '12', '175004778.24', '175004778.24', '0.00', '-0.48', '350047908.00', '38352.00', '456312', '456312', '0', 'sez', '', '', '0000-00-00', '29170659.04'),
('ESPL/23-24/00004', '2023-09-12', '8', '65', '123', 'msc', '574', '786', '5754', '5454', '87545', '54', '0.00', '0.00', '3484215907.20', '-0.20', '3484597687.00', '381780.00', '0', '0', '912624', 'sez', '', '', '0000-00-00', '64529586.80'),
('ESPL/23-24/00005', '2023-12-12', '4', '45', '12', 'msc', '45', '475', '1236', '1236', '12365', '525', '1476506.88', '1476506.88', '0.00', '0.24', '3214806.00', '261792.00', '564', '564', '0', 'sez', '', '', '0000-00-00', '6123.44'),
('ESPL/23-24/00006', '2023-12-11', '8', '12', '12', '2', '2', '1', '4', '3', '1', '40', '0.00', '0.00', '4240.00', '0.00', '4490.00', '250.00', '0', '0', '1696', 'sez', '', '', '0000-00-00', '112.25'),
('ESPL/23-24/00007', '2023-12-04', '6', '3', '4', '4', '5', '3', '3', '2', '3', '1', '0.00', '0.00', '3650496.00', '0.00', '3650896.00', '400.00', '0', '0', '912624', 'sez', '', '', '0000-00-00', '3650896.00');

-- --------------------------------------------------------

--
-- Table structure for table `line_mst`
--

CREATE TABLE `line_mst` (
  `code` int(20) NOT NULL,
  `line name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobno` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loading`
--

CREATE TABLE `loading` (
  `code` int(20) NOT NULL,
  `to` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `etype` varchar(255) NOT NULL,
  `indt` date NOT NULL,
  `vehno` varchar(255) NOT NULL,
  `lpass` varchar(255) NOT NULL,
  `cno` varchar(255) NOT NULL,
  `rem` varchar(255) NOT NULL,
  `intime` time NOT NULL,
  `contno2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `type` varchar(25) NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`code`, `name`, `pwd`, `type`, `ip`) VALUES
('1', 'user', '2023', 'admin', ''),
('', 'user', '2023', 'HR', ''),
('', 'nisarg', '2023', 'client', ''),
('', 'user', '2023', 'master', ''),
('', 'user', '2023', 'master', ''),
('', 'user', '2023', 'admin', ''),
('', '', '', 'user', '');

-- --------------------------------------------------------

--
-- Table structure for table `lonent`
--

CREATE TABLE `lonent` (
  `code` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `empc` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `dsg` varchar(255) NOT NULL,
  `lsdt` varchar(255) NOT NULL,
  `isdt` varchar(255) NOT NULL,
  `lamt` varchar(255) NOT NULL,
  `roiy` varchar(255) NOT NULL,
  `mded` varchar(255) NOT NULL,
  `mint` varchar(255) NOT NULL,
  `tdct` varchar(255) NOT NULL,
  `inst` varchar(255) NOT NULL,
  `mpay` varchar(255) NOT NULL,
  `bname` varchar(255) NOT NULL,
  `chqno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mattend`
--

CREATE TABLE `mattend` (
  `code` int(20) NOT NULL,
  `empcode` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `loc` varchar(255) NOT NULL,
  `01` varchar(10) NOT NULL,
  `02` varchar(10) NOT NULL,
  `03` varchar(10) NOT NULL,
  `04` varchar(10) NOT NULL,
  `05` varchar(10) NOT NULL,
  `06` varchar(10) NOT NULL,
  `07` varchar(10) NOT NULL,
  `08` varchar(10) NOT NULL,
  `09` varchar(10) NOT NULL,
  `10` varchar(10) NOT NULL,
  `11` varchar(10) NOT NULL,
  `12` varchar(10) NOT NULL,
  `13` varchar(10) NOT NULL,
  `14` varchar(101) NOT NULL,
  `15` varchar(10) NOT NULL,
  `16` varchar(10) NOT NULL,
  `17` varchar(10) NOT NULL,
  `18` varchar(10) NOT NULL,
  `19` varchar(10) NOT NULL,
  `20` varchar(10) NOT NULL,
  `21` varchar(10) NOT NULL,
  `22` varchar(10) NOT NULL,
  `23` varchar(10) NOT NULL,
  `24` varchar(10) NOT NULL,
  `25` varchar(10) NOT NULL,
  `26` varchar(10) NOT NULL,
  `27` varchar(10) NOT NULL,
  `28` varchar(10) NOT NULL,
  `29` varchar(10) NOT NULL,
  `30` varchar(10) NOT NULL,
  `31` varchar(10) NOT NULL,
  `tprsnt` varchar(10) NOT NULL,
  `tabsnt` varchar(10) NOT NULL,
  `mnthyear` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `offhire`
--

CREATE TABLE `offhire` (
  `code` varchar(255) NOT NULL,
  `hiredt` date NOT NULL,
  `hireto` varchar(255) NOT NULL,
  `srno` int(20) NOT NULL,
  `contno` varchar(255) NOT NULL,
  `from` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `intime` time NOT NULL,
  `indt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `otherexp`
--

CREATE TABLE `otherexp` (
  `code` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `exphead` varchar(255) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `narration` varchar(255) NOT NULL,
  `amt` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `approveby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pinv_child`
--

CREATE TABLE `pinv_child` (
  `invno` varchar(255) NOT NULL,
  `srno` int(255) NOT NULL,
  `descript` varchar(255) NOT NULL,
  `hsn` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `gstrate` varchar(255) NOT NULL,
  `gstamount` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pinv_main`
--

CREATE TABLE `pinv_main` (
  `invno` varchar(255) NOT NULL,
  `dt` date NOT NULL,
  `billto` varchar(255) NOT NULL,
  `delnote` varchar(255) NOT NULL,
  `mode` varchar(255) NOT NULL,
  `ship` varchar(255) NOT NULL,
  `oref` varchar(255) NOT NULL,
  `bookno` varchar(255) NOT NULL,
  `bdt` date NOT NULL,
  `disp` varchar(255) NOT NULL,
  `dest` varchar(255) NOT NULL,
  `delterms` varchar(255) NOT NULL,
  `cgst` varchar(255) NOT NULL,
  `sgst` varchar(255) NOT NULL,
  `igst` varchar(255) NOT NULL,
  `round` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `txamt` varchar(255) NOT NULL,
  `cper` varchar(50) NOT NULL,
  `sper` varchar(50) NOT NULL,
  `iper` varchar(50) NOT NULL,
  `recpt` varchar(50) NOT NULL,
  `sez` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pochild`
--

CREATE TABLE `pochild` (
  `pono` varchar(255) NOT NULL,
  `code` int(255) NOT NULL,
  `work` varchar(255) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amt` varchar(255) NOT NULL,
  `rem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poentry`
--

CREATE TABLE `poentry` (
  `pono` varchar(255) NOT NULL,
  `podt` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `supname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `prepareby` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `approveby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prod_master`
--

CREATE TABLE `prod_master` (
  `code` int(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `hsn` varchar(255) NOT NULL,
  `cgst` varchar(255) NOT NULL,
  `sgst` varchar(255) NOT NULL,
  `igst` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prod_master`
--

INSERT INTO `prod_master` (`code`, `pname`, `hsn`, `cgst`, `sgst`, `igst`) VALUES
(11, 'Transport ', '456123', '456312', '456312', '912624'),
(12, 'Transport ', '456123', '456312', '456312', '912624'),
(13, 'Transport ', '456123', '848', '848', '1696'),
(14, 'bisleri', '84', '564', '564', '1128'),
(15, 'britania', '5454', '121', '121', '242'),
(16, 'Transport ', '84', '0', '0', '0'),
(17, 'britania', '84', '456312', '456312', '912624');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `recptcode` varchar(255) NOT NULL,
  `code` varchar(11) NOT NULL,
  `dt` date NOT NULL,
  `custname` varchar(255) NOT NULL,
  `recamt` varchar(255) NOT NULL,
  `tds` varchar(255) NOT NULL,
  `disc` varchar(255) NOT NULL,
  `mode` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `rem` varchar(255) NOT NULL,
  `round` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `revexp`
--

CREATE TABLE `revexp` (
  `code` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `exphead` varchar(255) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `narration` varchar(255) NOT NULL,
  `amt` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `approveby` varchar(255) NOT NULL,
  `invno` varchar(255) NOT NULL,
  `cgst` varchar(255) NOT NULL,
  `sgst` varchar(255) NOT NULL,
  `igst` varchar(255) NOT NULL,
  `camt` varchar(255) NOT NULL,
  `samt` varchar(255) NOT NULL,
  `iamt` varchar(255) NOT NULL,
  `tds` varchar(255) NOT NULL,
  `tamt` varchar(255) NOT NULL,
  `mode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `salary-sheet`
--

CREATE TABLE `salary-sheet` (
  `code` int(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `wdays` varchar(255) NOT NULL,
  `empcode` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desig` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `mode` varchar(255) NOT NULL,
  `pdays` varchar(255) NOT NULL,
  `basic` varchar(255) NOT NULL,
  `hra` varchar(255) NOT NULL,
  `convey` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tds` varchar(255) NOT NULL,
  `pf` varchar(255) NOT NULL,
  `bikedep` varchar(255) NOT NULL,
  `adv` varchar(255) NOT NULL,
  `canteen` varchar(255) NOT NULL,
  `pt` varchar(255) NOT NULL,
  `totalamt` varchar(255) NOT NULL,
  `netamt` varchar(255) NOT NULL,
  `otdays` varchar(255) NOT NULL,
  `otamt` varchar(255) NOT NULL,
  `prepareby` varchar(255) NOT NULL,
  `hrname` varchar(255) NOT NULL,
  `hrstatus` varchar(255) NOT NULL,
  `adminname` varchar(255) NOT NULL,
  `adminstatus` varchar(255) NOT NULL,
  `paidname` varchar(255) NOT NULL,
  `paidstatus` varchar(255) NOT NULL,
  `msal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stk_ac`
--

CREATE TABLE `stk_ac` (
  `code` varchar(20) NOT NULL,
  `dt` date NOT NULL,
  `line` varchar(255) NOT NULL,
  `contno` varchar(255) NOT NULL,
  `add` varchar(255) NOT NULL,
  `less` varchar(255) NOT NULL,
  `vessel` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stk_ac1`
--

CREATE TABLE `stk_ac1` (
  `code` varchar(20) NOT NULL,
  `dt` date NOT NULL,
  `line` varchar(255) NOT NULL,
  `contno` varchar(255) NOT NULL,
  `add` varchar(255) NOT NULL,
  `less` varchar(255) NOT NULL,
  `vessel` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stk_ac2`
--

CREATE TABLE `stk_ac2` (
  `code` varchar(20) NOT NULL,
  `dt` date NOT NULL,
  `line` varchar(255) NOT NULL,
  `contno` varchar(255) NOT NULL,
  `add` varchar(255) NOT NULL,
  `less` varchar(255) NOT NULL,
  `vessel` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stk_ac22-23`
--

CREATE TABLE `stk_ac22-23` (
  `code` varchar(20) NOT NULL,
  `dt` date NOT NULL,
  `line` varchar(255) NOT NULL,
  `contno` varchar(255) NOT NULL,
  `add` varchar(255) NOT NULL,
  `less` varchar(255) NOT NULL,
  `vessel` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sup_mst`
--

CREATE TABLE `sup_mst` (
  `code` int(255) NOT NULL,
  `supname` varchar(255) NOT NULL,
  `adrs` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `gstno` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `stcode` varchar(255) NOT NULL,
  `mob` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `temp_login`
--

CREATE TABLE `temp_login` (
  `email` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transport_mst`
--

CREATE TABLE `transport_mst` (
  `code` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobno` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `code` varchar(255) NOT NULL,
  `dt` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `paidto` varchar(255) NOT NULL,
  `billno` varchar(255) NOT NULL,
  `prepareby` varchar(255) NOT NULL,
  `approveby` varchar(255) NOT NULL,
  `amt` varchar(255) NOT NULL,
  `accountant` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `acstatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advreceipt`
--
ALTER TABLE `advreceipt`
  ADD PRIMARY KEY (`recptcode`);

--
-- Indexes for table `annexure`
--
ALTER TABLE `annexure`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `autocr`
--
ALTER TABLE `autocr`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `autodexp`
--
ALTER TABLE `autodexp`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `autofrxinv`
--
ALTER TABLE `autofrxinv`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `autogrnno`
--
ALTER TABLE `autogrnno`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `autoidexp`
--
ALTER TABLE `autoidexp`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `autoinv`
--
ALTER TABLE `autoinv`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `autootherexp`
--
ALTER TABLE `autootherexp`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `autopinv`
--
ALTER TABLE `autopinv`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `autopono`
--
ALTER TABLE `autopono`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `autorexp`
--
ALTER TABLE `autorexp`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `bank_mst`
--
ALTER TABLE `bank_mst`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `contstatus`
--
ALTER TABLE `contstatus`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `credit_main`
--
ALTER TABLE `credit_main`
  ADD PRIMARY KEY (`invno`);

--
-- Indexes for table `cust_ac`
--
ALTER TABLE `cust_ac`
  ADD PRIMARY KEY (`code2`);

--
-- Indexes for table `cust_master`
--
ALTER TABLE `cust_master`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `dept_mst`
--
ALTER TABLE `dept_mst`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `desig_mst`
--
ALTER TABLE `desig_mst`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `directexp`
--
ALTER TABLE `directexp`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `forexinv_main`
--
ALTER TABLE `forexinv_main`
  ADD PRIMARY KEY (`invno`);

--
-- Indexes for table `gatepass`
--
ALTER TABLE `gatepass`
  ADD PRIMARY KEY (`gno`);

--
-- Indexes for table `grnchild`
--
ALTER TABLE `grnchild`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `idexp`
--
ALTER TABLE `idexp`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `inv_main`
--
ALTER TABLE `inv_main`
  ADD PRIMARY KEY (`invno`);

--
-- Indexes for table `line_mst`
--
ALTER TABLE `line_mst`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `loading`
--
ALTER TABLE `loading`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `mattend`
--
ALTER TABLE `mattend`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `otherexp`
--
ALTER TABLE `otherexp`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `pinv_main`
--
ALTER TABLE `pinv_main`
  ADD PRIMARY KEY (`invno`);

--
-- Indexes for table `pochild`
--
ALTER TABLE `pochild`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `prod_master`
--
ALTER TABLE `prod_master`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`recptcode`);

--
-- Indexes for table `revexp`
--
ALTER TABLE `revexp`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `sup_mst`
--
ALTER TABLE `sup_mst`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `transport_mst`
--
ALTER TABLE `transport_mst`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advreceipt`
--
ALTER TABLE `advreceipt`
  MODIFY `recptcode` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `annexure`
--
ALTER TABLE `annexure`
  MODIFY `code` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `autocr`
--
ALTER TABLE `autocr`
  MODIFY `code` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `autodexp`
--
ALTER TABLE `autodexp`
  MODIFY `code` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `autofrxinv`
--
ALTER TABLE `autofrxinv`
  MODIFY `code` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `autogrnno`
--
ALTER TABLE `autogrnno`
  MODIFY `code` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `autoidexp`
--
ALTER TABLE `autoidexp`
  MODIFY `code` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `autoinv`
--
ALTER TABLE `autoinv`
  MODIFY `code` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `autootherexp`
--
ALTER TABLE `autootherexp`
  MODIFY `code` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `autopinv`
--
ALTER TABLE `autopinv`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `autopono`
--
ALTER TABLE `autopono`
  MODIFY `code` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `autorexp`
--
ALTER TABLE `autorexp`
  MODIFY `code` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_mst`
--
ALTER TABLE `bank_mst`
  MODIFY `code` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `code` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contstatus`
--
ALTER TABLE `contstatus`
  MODIFY `code` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cust_ac`
--
ALTER TABLE `cust_ac`
  MODIFY `code2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cust_master`
--
ALTER TABLE `cust_master`
  MODIFY `code` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dept_mst`
--
ALTER TABLE `dept_mst`
  MODIFY `code` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `desig_mst`
--
ALTER TABLE `desig_mst`
  MODIFY `code` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grnchild`
--
ALTER TABLE `grnchild`
  MODIFY `code` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `line_mst`
--
ALTER TABLE `line_mst`
  MODIFY `code` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loading`
--
ALTER TABLE `loading`
  MODIFY `code` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mattend`
--
ALTER TABLE `mattend`
  MODIFY `code` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pochild`
--
ALTER TABLE `pochild`
  MODIFY `code` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prod_master`
--
ALTER TABLE `prod_master`
  MODIFY `code` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sup_mst`
--
ALTER TABLE `sup_mst`
  MODIFY `code` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport_mst`
--
ALTER TABLE `transport_mst`
  MODIFY `code` int(12) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
