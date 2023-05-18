-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 08:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paytab_db`
--
CREATE DATABASE IF NOT EXISTS `paytab_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `paytab_db`;

-- --------------------------------------------------------

--
-- Table structure for table `cathegorie`
--

CREATE TABLE `cathegorie` (
  `id` int(4) NOT NULL,
  `catheg_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `cathegorie`:
--

--
-- Dumping data for table `cathegorie`
--

INSERT INTO `cathegorie` (`id`, `catheg_name`, `parent`) VALUES
(1, 'Cathegorie A', 0),
(2, 'Cathegorie B', 0),
(3, 'SUB B-1', 2),
(4, 'SUB B-2', 2),
(5, 'SUB B-1-1', 3),
(6, 'SUB B-1-2', 3),
(7, 'SUB B-2-1', 4),
(8, 'SUB B-2-2', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cathegorie`
--
ALTER TABLE `cathegorie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cathegorie`
--
ALTER TABLE `cathegorie`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




/* create paytab user */
CREATE USER 'paytab'@'localhost' IDENTIFIED  BY 'pay123tab';

/* add all privileges for paytab db for paytab user */
GRANT ALL PRIVILEGES ON paytab_db.* TO 'paytab'@'localhost';