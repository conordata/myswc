-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 05:51 AM
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
(5, 'Ariel', 'wa lunda', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 2, '2020-12-08 04:13:49'),
(18, 'Francys', 'lumangi', 'root', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', 'admin', 0, '2020-12-08 04:34:38'),
(22, 'xwy', 'ywx', 'hypnone', '420df50a0a436cabe48e1597a9508a2b5449d35e', 'contractor', 0, '2020-12-08 04:18:47'),
(23, 'cherad', 'ilunga', 'che150', '8cb2237d0679ca88db6464eac60da96345513964', 'contractor', 13, '2020-12-08 04:31:31');

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
(6, 'bbmp001', '100', '4', '2020-12-06 16:39:47', NULL, NULL, '2020-12-02 12:43:57', '2020-12-06 11:09:47'),
(8, 'bbmp002', '85', '10', '2020-12-06 15:54:41', NULL, NULL, '2020-12-02 12:53:24', '2020-12-06 10:24:41'),
(12, 'bbmp004', '100', '4', '2020-12-06 16:27:16', NULL, NULL, '2020-12-06 16:24:27', '2020-12-06 10:57:16');

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
(10, 'hypnose', 'chelikere', 'chelikere water thank', '123456', '2020-12-06 17:01:43'),
(13, 'cherad', 'katuba', 'main road', '123456', '2020-12-08 09:59:55');

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
(4, '77.6437686', '13.0287335', 'main road', 'katuba', 'bbmp001', '2020-11-26 14:46:52', 'hazardous'),
(8, '12344.35', '12453.4', 'chelikere water thank', 'katuba', 'bbmp002', '2020-12-04 21:26:15', 'paper'),
(9, '12344.35', '12453.4', 'chelikere water thank', '', 'bbmp004', '2020-12-04 21:34:26', 'paper'),
(10, '12344.35', '12453.4', 'chelikere water thank main road', '', 'bbmp005', '2020-12-05 15:47:28', 'other'),
(11, '12344.35', '12453.4', 'chelikere water thank', '', 'bbmp006', '2020-12-05 15:49:02', 'dry'),
(12, '12344.35', '12453.4', 'chelikere water thank', '', 'bbmp007', '2020-12-05 15:49:15', 'recyclable'),
(15, '12344.35', '12453.4', 'chelikere water thank', '', 'bbmp008', '2020-12-06 11:37:39', 'recyclable'),
(16, '12344.35', '12453.4', 'chelikere water thank', 'chelikere', 'bbmp0010', '2020-12-06 11:57:32', 'wet');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `_idUser` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `code` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `area` varchar(45) NOT NULL,
  `idPart` varchar(45) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`_idUser`, `firstname`, `lastname`, `code`, `phone`, `area`, `idPart`, `date_created`) VALUES
(10, 'Ariel', 'wa lunda', '12345', '123456', 'chelikere', '2', '2020-12-05 19:21:57'),
(12, 'Arielus', 'ilunga', '12345509', '123456000', 'katuba', '0', '2020-12-05 19:23:08'),
(13, 'Arielus', 'lumangi', '123', '123456', 'katuba', '2', '2020-12-08 10:20:42');

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
  MODIFY `_idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `historic`
--
ALTER TABLE `historic`
  MODIFY `_idHisto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `_idPart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `trash`
--
ALTER TABLE `trash`
  MODIFY `_idTrash` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `_idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
