-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 02:11 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trashproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `_idAdmin` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `idPart` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`_idAdmin`, `firstname`, `lastname`, `username`, `password`, `role`, `idPart`, `date_created`) VALUES
(24, 'Ariel', 'wa lunda', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 0, '2020-12-09 14:44:44'),
(42, '', '', 'hyp736', '8cb2237d0679ca88db6464eac60da96345513964', 'admin-cont', 23, '2020-12-11 08:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `_idCom` int(11) NOT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `idTrash` varchar(45) DEFAULT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `dateComment` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `historic`
--

CREATE TABLE `historic` (
  `_idHisto` int(11) NOT NULL,
  `idTrash` varchar(45) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL,
  `weight` varchar(45) DEFAULT NULL,
  `dateFull` datetime DEFAULT NULL,
  `idUser` varchar(45) DEFAULT NULL,
  `dateEmpty` varchar(45) DEFAULT NULL,
  `dateHisto` datetime DEFAULT current_timestamp(),
  `lastUpdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `historic`
--

INSERT INTO `historic` (`_idHisto`, `idTrash`, `level`, `weight`, `dateFull`, `idUser`, `dateEmpty`, `dateHisto`, `lastUpdate`) VALUES
(6, 'bbmp001', '85', '20', '2020-12-06 16:39:47', 'zxp13', '2020:12:11 10:12:59', '2020-12-02 12:43:57', '2020-12-09 11:15:39'),
(8, 'bbmp002', '50', '20', NULL, 'zxp14', '2020-12-11 20:45:49', '2020-12-02 12:53:24', '2020-12-09 11:17:43'),
(12, 'bbmp004', '100', '4', '2020-12-06 16:27:16', 'zxp13', '2020-12-11 15:28:35', '2020-12-06 16:24:27', '2020-12-06 10:57:16'),
(13, 'bbmp005', '50', '20', NULL, NULL, NULL, '2020-12-09 16:51:58', '2020-12-09 11:21:58'),
(14, 'bbmp006', '90', '20', '2020-12-09 19:01:33', NULL, NULL, '2020-12-09 16:59:54', '2020-12-09 13:31:33'),
(15, 'bbmp007', '80', '20', NULL, NULL, NULL, '2020-12-09 19:05:51', '2020-12-09 13:35:57'),
(16, 'bbmp008', '80', '20', NULL, NULL, NULL, '2020-12-09 19:06:38', '2020-12-09 13:36:38'),
(17, 'bbmp010', '20', '20', NULL, 'zxp13', '2020:12:10 13:16:45', '2020-12-09 19:08:48', '2020-12-09 13:48:03'),
(18, 'bbmp011', '80', '20', NULL, 'zxp13', '2020-12-11 17:44:28', '2020-12-09 19:08:54', '2020-12-09 13:39:02'),
(19, 'bbmp012', '80', '20', NULL, NULL, NULL, '2020-12-09 19:09:08', '2020-12-09 13:39:08'),
(21, 'bbmp010', '50', '20', NULL, 'zxp13', '2020:12:10 14:21:01', '2020-12-10 13:18:16', '2020-12-10 07:49:18'),
(22, 'bbmp010', '85', '20', '2020-12-10 14:23:05', NULL, NULL, '2020-12-10 14:22:04', '2020-12-10 08:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `_idPart` int(11) NOT NULL,
  `namePart` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date_add` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`_idPart`, `namePart`, `area`, `address`, `phone`, `date_add`) VALUES
(23, 'hypnose', 'chelikere', 'chelikere water thank', '123456', '2020-12-11 13:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `trash`
--

CREATE TABLE `trash` (
  `_idTrash` int(11) NOT NULL,
  `longi` varchar(45) DEFAULT NULL,
  `lat` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `area` varchar(50) NOT NULL,
  `idTrash` varchar(45) DEFAULT NULL,
  `dateTrash` datetime DEFAULT current_timestamp(),
  `typeTrash` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trash`
--

INSERT INTO `trash` (`_idTrash`, `longi`, `lat`, `address`, `area`, `idTrash`, `dateTrash`, `typeTrash`) VALUES
(8, '12.90465923', '20.48596026', 'chelikere water thank', 'katuba', 'bbmp002', '2020-12-04 21:26:15', 'paper'),
(9, '20.34062385', '10.58473560', 'chelikere water thank', 'katuba', 'bbmp004', '2020-12-04 21:34:26', 'paper'),
(10, '12.23456730', '20.56404429', 'chelikere water thank main road', 'katuba', 'bbmp001', '2020-12-05 15:47:28', 'wet'),
(11, '12344.35', '12453.4', 'chelikere water thank', 'katuba', 'bbmp006', '2020-12-05 15:49:02', 'dry'),
(12, '12344.35', '12453.4', 'chelikere water thank', 'katuba', 'bbmp007', '2020-12-05 15:49:15', 'recyclable'),
(15, '12344.35', '12453.4', 'chelikere water thank', '', 'bbmp008', '2020-12-06 11:37:39', 'recyclable'),
(17, '12344.35', '12453.4', 'chelikere water thank', 'chelikere', 'bbmp010', '2020-12-09 19:07:05', 'dry'),
(18, '12344.35', '12453.4', 'chelikere water thank', 'chelikere', 'bbmp011', '2020-12-09 19:07:26', 'wet'),
(19, '12344.35', '12453.4', 'chelikere water thank', 'katuba', 'bbmp012', '2020-12-09 19:07:49', 'recyclable');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `_idUser` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `idWorker` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `area` varchar(45) NOT NULL,
  `idPart` varchar(45) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`_idUser`, `firstname`, `lastname`, `idWorker`, `phone`, `area`, `idPart`, `date_created`) VALUES
(20, 'Ariel', 'wa lunda', 'zxp13', '123456', 'chelikere', '0', '2020-12-10 14:15:58'),
(21, 'Alice', 'duboi', 'zxp14', '123456', 'katuba', '23', '2020-12-11 20:44:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`_idAdmin`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`_idCom`);

--
-- Indexes for table `historic`
--
ALTER TABLE `historic`
  ADD PRIMARY KEY (`_idHisto`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`_idPart`);

--
-- Indexes for table `trash`
--
ALTER TABLE `trash`
  ADD PRIMARY KEY (`_idTrash`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`_idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `_idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `historic`
--
ALTER TABLE `historic`
  MODIFY `_idHisto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `_idPart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `trash`
--
ALTER TABLE `trash`
  MODIFY `_idTrash` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `_idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
