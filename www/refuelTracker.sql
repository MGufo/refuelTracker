-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Creato il: Mar 17, 2021 alle 08:06
-- Versione del server: 10.4.10-MariaDB
-- Versione PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `refueltracker`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `refuels`
--

DROP TABLE IF EXISTS `refuels`;
CREATE TABLE IF NOT EXISTS `refuels` (
  `ID_refuel` int(11) UNSIGNED NOT NULL,
  `ID_user` int(11) UNSIGNED NOT NULL,
  `Date` date NOT NULL,
  `Cost` decimal(10,0) DEFAULT NULL,
  `Cost/L` decimal(10,0) DEFAULT NULL,
  `Liters` decimal(10,0) DEFAULT NULL,
  `Total Kms` int(7) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`ID_refuel`),
  KEY `FK(userID)` (`ID_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`ID_user`, `email`, `username`, `password`) VALUES
(1, '', 'Gufo', 'GufoTracker');

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `refuels`
--
ALTER TABLE `refuels`
  ADD CONSTRAINT `FK(userID)` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
