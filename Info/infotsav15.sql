-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2015 at 09:42 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `infotsav15`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobileno` bigint(13) NOT NULL,
  `institute` varchar(100) NOT NULL,
  `year` enum('1','2','3','4','5') NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `ip` varchar(20) NOT NULL,
  `email_act` enum('0','1') NOT NULL DEFAULT '0',
  `phone_act` int(1) DEFAULT NULL,
  `activation` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `password`, `mobileno`, `institute`, `year`, `username`, `email`, `branch`, `gender`, `ip`, `email_act`, `phone_act`, `activation`) VALUES
(1, 'Anshul', '753b22ef17267db14535c2e701ad8b5d', 9407002735, 'ABV-IIITM', '3', 'ansh_vyas747', 'anshul.vyas380@gmail.com', 'IT', 'male', '::1', '', NULL, ''),
(4, 'Aman', 'ccda1683d8c97f8f2dff2ea7d649b42c', 7770980386, 'iiitm', '3', 'aman2695', 'amanjain7898@gmail.com', 'ict', 'male', '::1', '0', 1, ''),
(5, 'Anshul', '912ec803b2ce49e4a541068d495ab570', 9424597149, 'ABV-IIITM', '3', 'aman2695', 'ansh.vyas747@gmail.com', 'IT', 'male', '::1', '1', NULL, '241af19aa65443282ccd15986cf1a4ba'),
(6, 'a', '0cc175b9c0f1b6a831c399e269772661', 5462341563, 'ABV-IIITM', '4', 'a', 'darksoulsince1995@gmail.com', 'IT', 'male', '::1', '0', NULL, '6cd5d16d36e3ee5372679b8a0bdc5ce6'),
(7, 'a', '0cc175b9c0f1b6a831c399e269772661', 46579813, 'sa', '2', 'a', 'ada@gmail.com', 'ads', 'male', '::1', '0', NULL, '445c6a4aa8f5d7908816493aee4dd8fd'),
(8, 'a', '0cc175b9c0f1b6a831c399e269772661', 89899898999, 'ABV-IIITM', '2', 'a', 'a@a.com', 'IT', 'male', '::1', '1', NULL, '86cd8007043c4b89c9d0e85a337e3151'),
(9, 'Ansul', '83f617aedb4589ee66ef687a1dd2faa1', 9479329771, 'ABV-IIITM', '3', 'ansh', 'ansulsharma1312@gmail.com', 'IT', 'male', '::1', '0', NULL, '267774087425628419fa68d6a4d7db6d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
