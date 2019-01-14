-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2019 at 02:40 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_keuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `Id` int(11) NOT NULL,
  `Keperluan` varchar(255) NOT NULL,
  `Deskripsi` varchar(255) NOT NULL,
  `Transaksi` int(11) NOT NULL,
  `Kategori` enum('1','2') NOT NULL,
  `TipeUser` tinyint(1) NOT NULL,
  `IdUser` varchar(255) NOT NULL,
  `IdParent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `IdParent` varchar(255) NOT NULL,
  `Nama` varchar(75) NOT NULL,
  `Username` varchar(75) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Level` enum('1','2') NOT NULL DEFAULT '2',
  `Status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `Email` varchar(255) NOT NULL,
  `Saldo` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userchild`
--

CREATE TABLE `userchild` (
  `Id` int(11) NOT NULL,
  `IdChild` varchar(255) NOT NULL,
  `Nama` varchar(75) NOT NULL,
  `Username` varchar(75) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `Email` varchar(255) NOT NULL,
  `IdParent` varchar(255) NOT NULL,
  `Saldo` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdUser` (`IdUser`),
  ADD KEY `IdParent` (`IdParent`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `IdParent` (`IdParent`);

--
-- Indexes for table `userchild`
--
ALTER TABLE `userchild`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `IdChild` (`IdChild`),
  ADD KEY `IdParent` (`IdParent`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userchild`
--
ALTER TABLE `userchild`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD CONSTRAINT `keuangan_ibfk_1` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdParent`),
  ADD CONSTRAINT `keuangan_ibfk_2` FOREIGN KEY (`IdUser`) REFERENCES `userchild` (`IdChild`),
  ADD CONSTRAINT `keuangan_ibfk_3` FOREIGN KEY (`IdParent`) REFERENCES `user` (`IdParent`),
  ADD CONSTRAINT `keuangan_ibfk_4` FOREIGN KEY (`IdParent`) REFERENCES `userchild` (`IdParent`);

--
-- Constraints for table `userchild`
--
ALTER TABLE `userchild`
  ADD CONSTRAINT `userchild_ibfk_1` FOREIGN KEY (`IdParent`) REFERENCES `user` (`IdParent`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
