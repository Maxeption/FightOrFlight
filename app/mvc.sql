-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 29, 2021 at 03:26 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

DROP TABLE IF EXISTS `flight`;
CREATE TABLE IF NOT EXISTS `flight` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `origin` varchar(255) COLLATE utf8_bin NOT NULL,
  `destination` varchar(255) COLLATE utf8_bin NOT NULL,
  `dep_time` datetime NOT NULL,
  `return_time` datetime DEFAULT NULL,
  `seats` int(255) NOT NULL,
  `flighttype` varchar(25) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`id`, `origin`, `destination`, `dep_time`, `return_time`, `seats`, `flighttype`) VALUES
(1, 'Dar', 'Youcode', '2021-06-10 02:21:00', '2021-06-24 12:21:00', 3, 'Round Trip'),
(2, 'Youcode', 'Dar', '2021-06-16 14:23:00', '2021-06-23 14:23:00', 4, 'One Way'),
(3, 'Casablanca', 'Shibuya City', '2021-07-08 10:51:00', '2021-07-10 10:51:00', 100, 'One Way');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

DROP TABLE IF EXISTS `passenger`;
CREATE TABLE IF NOT EXISTS `passenger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `reservation_id` (`reservation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`id`, `user_id`, `reservation_id`, `fullname`) VALUES
(10, 1, 51, 'Jack');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `flight_type` varchar(255) COLLATE utf8_bin NOT NULL,
  `origin` varchar(255) COLLATE utf8_bin NOT NULL,
  `destination` varchar(255) COLLATE utf8_bin NOT NULL,
  `dep_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `flight_id` (`flight_id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `user_id`, `flight_id`, `flight_type`, `origin`, `destination`, `dep_time`) VALUES
(53, 1, 1, 'Round Trip', 'Youcode', 'Dar', '2021-06-24 12:21:00'),
(52, 1, 1, 'Round Trip', 'Dar', 'Youcode', '2021-06-10 02:21:00'),
(51, 1, 2, 'One Way', 'Youcode', 'Dar', '2021-06-16 14:23:00'),
(50, 4, 1, 'Round Trip', 'Youcode', 'Dar', '2021-06-24 12:21:00'),
(49, 4, 1, 'Round Trip', 'Dar', 'Youcode', '2021-06-10 02:21:00'),
(48, 1, 1, 'Round Trip', 'Youcode', 'Dar', '2021-06-24 12:21:00'),
(47, 1, 1, 'Round Trip', 'Dar', 'Youcode', '2021-06-10 02:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) COLLATE utf8_bin NOT NULL,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `role_u` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `username`, `password`, `role_u`) VALUES
(1, 'Jackson Michelle', 'HH2356', '$2y$12$Wxp2P0YGj4oKLAtha4F0WOFX2XdgQD0Vnww8Q.PGK/n1G8/unLLKO', '0'),
(3, 'Fred Jackson', 'FreJk', '$2y$12$zyTRFq5J8s2cN.Czfkl0u.SSemqOJo7tjrjFhmlQ4wVTKv.FpLoO.', '1'),
(4, 'Jackson jack', 'Jackie456', '$2y$12$dOqYLfn.TA7.rAus3jxKLOD2jr9i0gOxwg5wQZAagFC2rakKkrHce', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
