-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2016 at 11:56 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `infotsav`
--
CREATE DATABASE IF NOT EXISTS `infotsav` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `infotsav`;

-- --------------------------------------------------------

--
-- Table structure for table `coords`
--

CREATE TABLE IF NOT EXISTS `coords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coordinates` text NOT NULL,
  `coordside1` text NOT NULL,
  `coordside2` text NOT NULL,
  `coordside3` text NOT NULL,
  `coordside4` text NOT NULL,
  `coordside5` text NOT NULL,
  `coordside6` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `coords`
--

INSERT INTO `coords` (`id`, `coordinates`, `coordside1`, `coordside2`, `coordside3`, `coordside4`, `coordside5`, `coordside6`) VALUES
(1, '[{"x":52,"y":1673},{"x":2,"y":1749},{"x":100,"y":1327},{"x":27,"y":696},{"x":86,"y":792},{"x":1,"y":2115}]', '[{"x":366,"y":548},{"x":372,"y":625}]', '[{"x":859,"y":856},{"x":952,"y":862}]', '[{"x":374,"y":1076},{"x":403,"y":1090}]', '[{"x":918,"y":1311},{"x":933,"y":1330}]', '[{"x":331,"y":1465},{"x":365,"y":1563}]', '[{"x":794,"y":1666},{"x":958,"y":1745}]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `school` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `avtar` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `salt`, `contact`, `school`, `city`, `avtar`) VALUES
(1, 'Arvind Rachuri', 'ari0997@gmail.com', '9966949f9c4e179701d0e6d6429172d307aaf991bab4664552e7c27aba9f5234', 'wZò­b×ßˆlõ‘,©L™-MbAØBšÈµ6ƒ“z5Ê;', '8763476609', 'ABV IIITM', 'g', 2),
(6, 'Aman', 'amanjain7898@gmail.com', '563d6ec1bbeff4d62b567c0d79d021885ab3e3e98571d9dedc76dba1fe9a1403', 'ÑÀAúíKò÷?!	‹ìpžåFhò~Zõ»RÉy4Ø\0', '7770980386', 'IIITM Campus', 'Gwalior', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_sessions`
--

CREATE TABLE IF NOT EXISTS `users_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_score`
--

CREATE TABLE IF NOT EXISTS `user_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_score`
--

INSERT INTO `user_score` (`id`, `user_id`, `score`) VALUES
(3, 1, 20),
(4, 6, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_sessions`
--
ALTER TABLE `users_sessions`
  ADD CONSTRAINT `users_sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_score`
--
ALTER TABLE `user_score`
  ADD CONSTRAINT `user_score_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
