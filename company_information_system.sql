-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2017 at 06:51 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company_information_system`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_login` (IN `a` VARCHAR(10), IN `b` VARCHAR(15), IN `c` VARCHAR(15), IN `d` VARCHAR(30))  BEGIN
insert into login(USN, username, password, email) values (a,b,c,d);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_student` (`a` VARCHAR(10), `b` VARCHAR(15), `c` VARCHAR(15), `d` FLOAT, `e` VARCHAR(3))  BEGIN 
UPDATE `student_details` set `first_name` = b, `last_name` = c, `cgpa` = d, `dept` = e where `USN` = a;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `company_contact`
--

CREATE TABLE `company_contact` (
  `c_name` varchar(30) NOT NULL,
  `c_phn` bigint(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `website` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_contact`
--

INSERT INTO `company_contact` (`c_name`, `c_phn`, `address`, `website`) VALUES
('Capgemini', 8066567000, 'Pritech Park, Bldg 6B, Bellandur Village, Vathur Hobli,Outer Ring Road, Bengaluru, Karnataka 560037', 'www.capgemini.com'),
('Deloitte', 8066276000, 'Deloitte Centre, Anchorage II100/2, Richmond RoadKarnataka560025', 'https://www2.deloitte.com/in/en.html'),
('Intuit', 8041769200, 'Campus 4A, PrITech Park (Ecospace), 7th and 8th Floor, Belandur,\r\nBengaluru, Karnataka 560103', 'www.intuit.com'),
('Robert Bosch', 8067521111, 'Bosch Limited Post Box No. 3000, Hosur Road, Adugodi Bengaluru - 560 030, India', 'http://www.boschindia.com'),
('Toyota Kirloskar Auto Parts', 8027287141, 'Plot No # 21, Bidadi Industrial Area, Bidadi, Ramanagara District, Bengaluru, Karnataka 562109', 'www.toyotabharat.com'),
('VM ware', 18001026802, ' Kalyani Vista,192A, 3rd Main Rd, Doresanipalya,Phase 4,JP Nagar, Bengaluru, Karnataka 560076', 'www.vmware.com');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `c_name` varchar(30) NOT NULL,
  `c_domain` varchar(30) NOT NULL,
  `c_type` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`c_name`, `c_domain`, `c_type`) VALUES
('Capgemini', 'IT services, IT consulting', 'Service'),
('Deloitte', 'Professional services', 'Service'),
('Intuit', 'Enterprise software', 'Product'),
('Robert Bosch', 'Conglomerate', 'Product'),
('Toyota Kirloskar Auto Parts', 'Automotive', 'Product'),
('VM ware', 'Computer software', 'Service');

-- --------------------------------------------------------

--
-- Table structure for table `company_req`
--

CREATE TABLE `company_req` (
  `c_name` varchar(30) NOT NULL,
  `cutoff` float DEFAULT NULL,
  `tier` int(11) NOT NULL,
  `ECE` varchar(3) NOT NULL,
  `ISE` varchar(3) NOT NULL,
  `CSE` varchar(3) NOT NULL,
  `ME` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_req`
--

INSERT INTO `company_req` (`c_name`, `cutoff`, `tier`, `ECE`, `ISE`, `CSE`, `ME`) VALUES
('Capgemini', 6, 3, 'YES', 'YES', 'YES', 'YES'),
('Deloitte', 0, 3, 'NO', 'YES', 'YES', 'NO'),
('Intuit', 0, 1, 'YES', 'YES', 'YES', 'NO'),
('Robert Bosch', 7, 2, 'YES', 'YES', 'YES', 'YES'),
('Toyota Kirloskar Auto Parts', 6, 3, 'YES', 'YES', 'YES', 'YES'),
('VM ware', 8, 1, 'YES', 'YES', 'YES', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `USN` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`USN`, `email`, `username`, `password`) VALUES
('', '', '', ''),
('1PE15IS087', 'ruta@yahoo.com', 'ruts', 'RU'),
('1pe15is097', 'shim@gmail.com', 'shim', 'shim');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `USN` varchar(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `dept` varchar(3) NOT NULL,
  `cgpa` float NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`USN`, `first_name`, `last_name`, `dept`, `cgpa`, `username`, `password`) VALUES
('', '', '', '', 0, '', ''),
('1PE15IS087', ' RUTA', 'UTTURE', 'ISE', 6, 'ruts', 'RU'),
('1PE15IS097', 'SHIMONA', 'PRABU', 'ISE', 6, 'shim', 'shim');

--
-- Triggers `student_details`
--
DELIMITER $$
CREATE TRIGGER `trig` BEFORE INSERT ON `student_details` FOR EACH ROW set NEW.first_name = UPPER(NEW.first_name), NEW.last_name = UPPER(NEW.last_name), NEW.USN = UPPER(NEW.USN)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trig1` BEFORE UPDATE ON `student_details` FOR EACH ROW set NEW.first_name = UPPER(NEW.first_name), NEW.last_name = UPPER(NEW.last_name)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_contact`
--
ALTER TABLE `company_contact`
  ADD PRIMARY KEY (`c_name`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`c_name`);

--
-- Indexes for table `company_req`
--
ALTER TABLE `company_req`
  ADD PRIMARY KEY (`c_name`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`USN`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`USN`),
  ADD UNIQUE KEY `username` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
