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
-- Table structure for table `users3500`
--

CREATE TABLE `users3500` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `addressline1` varchar(200) DEFAULT NULL,
  `addressline2` varchar(200) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users3500`
--

INSERT INTO `users3500` (`userId`, `userName`, `userEmail`, `userPass`, `addressline1`, `addressline2`, `country`, `zipcode`, `city`) VALUES
(1, 'luke', 'luke.daniels@live.com', '$2y$10$3u/34Lvlktih/rtGCN8zAeG3rZXVFkGt1HPFtEir20OoOmP8r1QdS', 'werwer', 'werwer', 'wre', 'werwe', 'werwer'),
(2, 'hey', 'hey@hey.com', '$2y$10$rNrYXlLCutoCN0cLpRAbu.vmezmeLvN1yhKTC22DUEMf98kvxMoIC', 'sadsad', 'sadsa', 'sads', 'asdd', 'asdsad'),
(3, 'wqewewq', 'qwe@sad', '$2y$10$iHWoFZMVuTMJX.q/4KTdT.NgaEVJaQL4oiMWUvvS/pYhJHcYlceja', 'qwewqe', 'qwewq', 'qwew', 'qwewqe', 'qwewqe'),
(4, 'luke', 'luke@g.com', '$2y$10$pbibC9lw8V9cy9v8WdonLeYf6z60AqKbbuiyHm6Fi./2xRcv.rQpq', 'werwer', 'werwe', 'wwerwe', '1111', 'bris'),
(5, 'jamj', 'jj@jam.com', '$2y$10$VJsBgr9yyNZaJicK5CVSzO023rsrd.t5VsbRvceEAiQDuhlNmWMm2', 'werre', 'werwer', 'ewerew', '1111', 'sads'),
(6, 'Luke', 'luke@luke.com', '$2y$10$/nqQMvZJUkdWOesuS77.1uKWzGHTFF9WpI1MCYYn50UrUUTB2IzqO', 'Hampstead road', 'High gate hill ', 'Aus', '4000', 'Brisbane'),
(7, 'luke', 's4266015@gmail.com', '$2y$10$LrHEB/gRQr5FLyBGGnnkHO7oqISlCN3LRDLsWeSBLRMbSqInhRrNm', 'hampstead road', 'highgate hill', 'aus', '4101', 'brisbane'),
(8, 'luke', 's4266016@gmail.com', '$2y$10$clGbR8aCSucmUBLdii1iJulxOuwdWohNacYkdW2n4EiaanRCrNYDG', 'hampstead road', 'highgate hill', 'aus', '4101', 'brisbane');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users3500`
--
ALTER TABLE `users3500`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users3500`
--
ALTER TABLE `users3500`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
