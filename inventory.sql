-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2012 at 07:40 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `id` int(11) NOT NULL auto_increment,
  `code` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`id`, `code`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `id` int(11) NOT NULL auto_increment,
  `duedate` varchar(100) NOT NULL,
  `p_code` varchar(100) NOT NULL,
  `paid` varchar(100) NOT NULL,
  `creditpayable` varchar(100) NOT NULL,
  `duepayable` varchar(100) NOT NULL,
  `coverage` varchar(100) NOT NULL,
  `nu_payment` varchar(100) NOT NULL,
  `name` varchar(300) NOT NULL,
  `purdate` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `credit`
--


-- --------------------------------------------------------

--
-- Table structure for table `creditdatails`
--

CREATE TABLE `creditdatails` (
  `id` int(11) NOT NULL auto_increment,
  `amount` int(11) NOT NULL,
  `datepayment` varchar(30) NOT NULL,
  `memberid` varchar(10) NOT NULL,
  `ornumber` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `creditdatails`
--

INSERT INTO `creditdatails` (`id`, `amount`, `datepayment`, `memberid`, `ornumber`) VALUES
(1, 1000, '03/14/2012', '112165', 'P-0007');

-- --------------------------------------------------------

--
-- Table structure for table `cuscode`
--

CREATE TABLE `cuscode` (
  `id` int(11) NOT NULL auto_increment,
  `code` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cuscode`
--

INSERT INTO `cuscode` (`id`, `code`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(60) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `ddate` varchar(100) NOT NULL,
  `bday` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `tel` varchar(11) NOT NULL,
  `office` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `hostess` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `member_id` varchar(100) NOT NULL,
  `code` varchar(30) NOT NULL,
  `ds` varchar(100) NOT NULL,
  `ns` varchar(100) NOT NULL,
  `cs` varchar(100) NOT NULL,
  `os` varchar(100) NOT NULL,
  `aa` varchar(100) NOT NULL,
  `ab` varchar(100) NOT NULL,
  `pro` varchar(100) NOT NULL,
  `proo` varchar(100) NOT NULL,
  `ma` varchar(100) NOT NULL,
  `mb` varchar(100) NOT NULL,
  `mc` varchar(100) NOT NULL,
  `md` varchar(100) NOT NULL,
  `me` varchar(100) NOT NULL,
  `mf` varchar(100) NOT NULL,
  `ba` varchar(100) NOT NULL,
  `bb` varchar(100) NOT NULL,
  `bc` varchar(100) NOT NULL,
  `bd` varchar(100) NOT NULL,
  `be` varchar(100) NOT NULL,
  `bf` varchar(100) NOT NULL,
  `bg` varchar(100) NOT NULL,
  `bh` varchar(100) NOT NULL,
  `bi` varchar(100) NOT NULL,
  `bj` varchar(100) NOT NULL,
  `bk` varchar(100) NOT NULL,
  `bl` varchar(100) NOT NULL,
  `bm` varchar(100) NOT NULL,
  `bn` varchar(100) NOT NULL,
  `bo` varchar(100) NOT NULL,
  `bp` varchar(100) NOT NULL,
  `ca` varchar(100) NOT NULL,
  `cb` varchar(100) NOT NULL,
  `cc` varchar(100) NOT NULL,
  `cd` varchar(100) NOT NULL,
  `ce` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `lname`, `mname`, `occupation`, `ddate`, `bday`, `address`, `tel`, `office`, `mobile`, `hostess`, `email`, `member_id`, `code`, `ds`, `ns`, `cs`, `os`, `aa`, `ab`, `pro`, `proo`, `ma`, `mb`, `mc`, `md`, `me`, `mf`, `ba`, `bb`, `bc`, `bd`, `be`, `bf`, `bg`, `bh`, `bi`, `bj`, `bk`, `bl`, `bm`, `bn`, `bo`, `bp`, `ca`, `cb`, `cc`, `cd`, `ce`, `birthday`) VALUES
(1, 'qwerty', '', '', '', '', '', '', '', '', '', '', '', 'C0005', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'argie', '', '', '', '', '', '', '', '', '', '', '', 'C0001', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL auto_increment,
  `listorder` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `list`
--


-- --------------------------------------------------------

--
-- Table structure for table `paycode`
--

CREATE TABLE `paycode` (
  `id` int(11) NOT NULL auto_increment,
  `code` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `paycode`
--

INSERT INTO `paycode` (`id`, `code`) VALUES
(1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `productlist`
--

CREATE TABLE `productlist` (
  `id` int(11) NOT NULL auto_increment,
  `pcode` varchar(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pdesc` varchar(100) NOT NULL,
  `psold` varchar(100) NOT NULL,
  `pleft` varchar(100) NOT NULL,
  `pprice` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `productlist`
--

INSERT INTO `productlist` (`id`, `pcode`, `pname`, `pdesc`, `psold`, `pleft`, `pprice`) VALUES
(1, '12345', '', 'qwertyuasdfghj', '1', '1233', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `PRICE` varchar(100) NOT NULL,
  `pcode` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `name`, `qty`, `total`, `code`, `date`, `time`, `PRICE`, `pcode`) VALUES
(1, 'qwertyuasdfghj', '1', '1234', '2012-03-0002-STO', '03/20/2012', '15 : 35 : 57', '1234', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `salessumarry`
--

CREATE TABLE `salessumarry` (
  `id` smallint(6) NOT NULL auto_increment,
  `date` varchar(30) NOT NULL,
  `transactioncode` varchar(30) NOT NULL,
  `total` varchar(30) NOT NULL,
  `mode` varchar(30) NOT NULL,
  `a` varchar(30) NOT NULL,
  `b` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `salessumarry`
--

INSERT INTO `salessumarry` (`id`, `date`, `transactioncode`, `total`, `mode`, `a`, `b`, `name`) VALUES
(1, '03/20/2012', '2012-03-0002-STO', '1234', 'cash', '1234', '0', 'argie');

-- --------------------------------------------------------

--
-- Table structure for table `socode`
--

CREATE TABLE `socode` (
  `id` int(11) NOT NULL auto_increment,
  `code` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `socode`
--

INSERT INTO `socode` (`id`, `code`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `stockin`
--

CREATE TABLE `stockin` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `CODE` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `datepurchase` varchar(100) NOT NULL,
  `transactioncode` varchar(100) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `stockin`
--


-- --------------------------------------------------------

--
-- Table structure for table `stockinsumarry`
--

CREATE TABLE `stockinsumarry` (
  `id` int(11) NOT NULL auto_increment,
  `code` varchar(100) NOT NULL,
  `totalqty` int(11) NOT NULL,
  `total` varchar(100) NOT NULL,
  `less` varchar(100) NOT NULL,
  `vsales` varchar(100) NOT NULL,
  `vat` varchar(100) NOT NULL,
  `totalamountdue` varchar(100) NOT NULL,
  `pdate` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `stockinsumarry`
--


-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL auto_increment,
  `company_name` varchar(100) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactno` varchar(100) NOT NULL,
  `bday` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `supplier`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'administrator', 'administrator');
