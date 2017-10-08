-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 08, 2017 at 07:52 AM
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
  `urgency` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comBoard3500`
--

INSERT INTO `comBoard3500` (`message`, `time`, `userID`, `urgency`) VALUES
('helllllllllllllooooooo', '2017-10-04 07:53:28', 2, 1),
('asdsadsad', '2017-10-04 07:53:32', 2, 1),
('asfgsfdrfgsedrgsefrgg gsergserg serergergtaftwertv eartgwergterte', '2017-10-04 07:54:12', 2, 5),
('new message', '2017-10-07 03:44:20', 5, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
