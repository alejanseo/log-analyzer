-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: web-lnx240.ergonet.host
-- Generation Time: Nov 24, 2018 alle 09:42
-- Versione del server: 10.1.35-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `logs`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `log-file`
--

CREATE TABLE IF NOT EXISTS `log-file` (
  `bite` int(11) NOT NULL,
  `request` text NOT NULL,
  `url` text NOT NULL,
  `status` text NOT NULL,
  `referral` text NOT NULL,
  `uagent` text NOT NULL,
  `date` date NOT NULL,
  `hit` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
