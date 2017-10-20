-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2017 at 01:40 AM
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
-- Table structure for table `exch3500`
--

CREATE TABLE `exch3500` (
  `message` varchar(140) NOT NULL,
  `groups` varchar(50) NOT NULL,
  `userID` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sort` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exch3500`
--

INSERT INTO `exch3500` (`message`, `groups`, `userID`, `time`, `sort`) VALUES
('dfgfggdg', 'Who are at home', 1, '2017-10-19 02:50:08', 'Borrow something'),
('errttetrtert', 'All neighbours', 1, '2017-10-19 03:01:21', 'Borrow something'),
('errttetrtert', 'All neighbours', 1, '2017-10-19 03:01:54', 'Borrow something'),
('werwer', 'Authenticated neighbours', 1, '2017-10-19 03:02:31', 'Share something'),
('werwer', 'Authenticated neighbours', 1, '2017-10-19 03:03:38', 'Share something');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
