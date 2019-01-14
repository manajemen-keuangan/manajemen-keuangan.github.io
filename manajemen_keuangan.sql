-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2019 at 12:30 PM
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
  `IdUser` int(11) NOT NULL,
  `IdParent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Nama` varchar(75) NOT NULL,
  `Username` varchar(75) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Level` enum('1','2') NOT NULL DEFAULT '2',
  `Status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `Email` varchar(255) NOT NULL,
  `Saldo` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Nama`, `Username`, `Password`, `Level`, `Status`, `Email`, `Saldo`) VALUES
(2, '123', '123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2', 'Y', '123@123.com', 99998),
(5, '12345', '12345', '8cb2237d0679ca88db6464eac60da96345513964', '2', 'Y', '12345@12345.com', 0),
(6, '123456', '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2', 'Y', '123456@123456.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userchild`
--

CREATE TABLE `userchild` (
  `Id` int(11) NOT NULL,
  `Nama` varchar(75) NOT NULL,
  `Username` varchar(75) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `Email` varchar(255) NOT NULL,
  `IdParent` int(11) NOT NULL,
  `Saldo` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userchild`
--

INSERT INTO `userchild` (`Id`, `Nama`, `Username`, `Password`, `Status`, `Email`, `IdParent`, `Saldo`) VALUES
(2, '1234', '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Y', '1234@1234.com', 2, 0),
(3, '1234567', '1234567', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'Y', '1234567@1234567.com', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `keuangan_ibfk_2` (`IdUser`),
  ADD KEY `IdParent` (`IdParent`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `userchild`
--
ALTER TABLE `userchild`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ParentId` (`IdParent`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userchild`
--
ALTER TABLE `userchild`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD CONSTRAINT `keuangan_ibfk_1` FOREIGN KEY (`IdUser`) REFERENCES `user` (`Id`),
  ADD CONSTRAINT `keuangan_ibfk_2` FOREIGN KEY (`IdUser`) REFERENCES `user` (`Id`),
  ADD CONSTRAINT `keuangan_ibfk_3` FOREIGN KEY (`IdParent`) REFERENCES `user` (`Id`),
  ADD CONSTRAINT `keuangan_ibfk_4` FOREIGN KEY (`IdParent`) REFERENCES `userchild` (`IdParent`);

--
-- Constraints for table `userchild`
--
ALTER TABLE `userchild`
  ADD CONSTRAINT `ParentId` FOREIGN KEY (`idparent`) REFERENCES `user` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
