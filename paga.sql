-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2020 at 05:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paga`
--

-- --------------------------------------------------------

--
-- Table structure for table `llogaritjet`
--

CREATE TABLE `llogaritjet` (
  `Id_paga` int(15) NOT NULL,
  `Paga_Bruto` int(50) NOT NULL,
  `Sigurime_Shendetesore` int(15) NOT NULL,
  `Sigurime_Shoqerore` int(15) NOT NULL,
  `TAP` int(15) NOT NULL,
  `Paga_Neto` int(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `llogaritjet`
--

INSERT INTO `llogaritjet` (`Id_paga`, `Paga_Bruto`, `Sigurime_Shendetesore`, `Sigurime_Shoqerore`, `TAP`, `Paga_Neto`, `username`) VALUES
(211, 67, 1, 6, 0, 59, 'mam'),
(210, 350000, 5950, 10056, 61600, 272394, 'joana'),
(209, 123, 2, 12, 0, 109, 'demo'),
(201, 89087, 1514, 8463, 7681, 71428, ''),
(200, 899, 15, 85, 0, 798, ''),
(199, 8659, 147, 823, 0, 7689, ''),
(198, 343, 6, 33, 0, 305, ''),
(197, 34, 1, 3, 0, 30, ''),
(207, 56, 1, 5, 0, 50, ''),
(208, 1, 0, 0, 0, 1, 'demo');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Emri` varchar(50) NOT NULL,
  `Mbiemri` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Tipi` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Emri`, `Mbiemri`, `Username`, `Password`, `Tipi`) VALUES
(20, 'Joana', 'Shehaj', 'joana', '18f01959ff46071d73905d549cafde20', 'Admin'),
(23, 'demo', 'demo', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'Perdorues'),
(26, 'test', 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 'Perdorues'),
(27, 'abc', 'abc', 'abc', '900150983cd24fb0d6963f7d28e17f72', 'Perdorues'),
(28, 'demo', 'test', 'yes', '6b67853e42898de8e7f7953331e938cc', 'Perdorues');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `llogaritjet`
--
ALTER TABLE `llogaritjet`
  ADD PRIMARY KEY (`Id_paga`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `llogaritjet`
--
ALTER TABLE `llogaritjet`
  MODIFY `Id_paga` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
