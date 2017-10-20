-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2017 at 01:41 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iListen`
--

-- --------------------------------------------------------

--
-- Table structure for table `comBoard3500`
--

CREATE TABLE `comBoard3500` (
  `message` varchar(140) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userID` int(11) NOT NULL,
  `urgency` varchar(50) NOT NULL,
  `sort` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comBoard3500`
--

INSERT INTO `comBoard3500` (`message`, `time`, `userID`, `urgency`, `sort`) VALUES
('ertttterttertert', '2017-10-19 02:14:08', 2, 'background-color: #f9c7c2;', 'Discount nearby'),
('sdgfgsfgdfg', '2017-10-19 02:33:17', 1, 'background-color: #f9e7c2;', 'Letters'),
('hghfggfhfgh', '2017-10-19 12:58:51', 2, 'background-color: #f9e7c2;', 'Letters'),
('vfcbbfdbdb', '2017-10-19 13:53:08', 2, 'background-color: #f9c7c2;', 'Missing items');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
