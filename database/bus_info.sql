-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2025 at 05:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `royallinerexpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus_info`
--

CREATE TABLE `bus_info` (
  `bus_ID` int(11) NOT NULL,
  `bus_no` varchar(30) NOT NULL,
  `seats` int(2) NOT NULL,
  `class` varchar(20) NOT NULL,
  `fare` int(10) NOT NULL,
  `azam` varchar(20) DEFAULT NULL,
  `tv` varchar(20) DEFAULT NULL,
  `refreshments` varchar(20) DEFAULT NULL,
  `charging` varchar(50) DEFAULT NULL,
  `wifi` varchar(20) DEFAULT NULL,
  `toilet` varchar(20) DEFAULT NULL,
  `route_ID` int(10) NOT NULL,
  `filled` int(3) NOT NULL,
  `confirmation` varchar(20) DEFAULT NULL,
  `position` varchar(50) NOT NULL,
  `op_date` date NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_info`
--

INSERT INTO `bus_info` (`bus_ID`, `bus_no`, `seats`, `class`, `fare`, `azam`, `tv`, `refreshments`, `charging`, `wifi`, `toilet`, `route_ID`, `filled`, `confirmation`, `position`, `op_date`, `status`) VALUES
(2, 'T567EBA', 51, 'LUXURY', 35000, NULL, 'available', 'available', 'available', NULL, NULL, 3, 1, NULL, 'TANGA', '2025-01-04', 'available'),
(3, 'T678EDS', 57, 'LUXURY', 35000, NULL, 'available', 'available', 'available', NULL, NULL, 3, 0, NULL, 'TANGA', '2025-01-04', 'available'),
(4, 'T765EJM', 57, 'LUXURY', 35000, NULL, 'available', 'available', 'available', NULL, NULL, 3, 0, NULL, 'TANGA', '2025-01-04', 'available'),
(5, 'T765ELJ', 57, 'VIP', 40000, 'available', 'available', 'available', 'available', NULL, 'available', 2, 3, NULL, 'DAR ES SALAAM', '2025-01-04', 'available'),
(6, 'T896ELY', 57, 'VIP A', 40000, 'available', 'available', 'available', 'available', 'available', 'available', 2, 0, NULL, 'DAR ES SALAAM', '2025-01-04', 'available'),
(7, 'T456DZK', 51, 'LUXURY', 35000, NULL, 'available', 'available', 'available', NULL, NULL, 3, 0, NULL, 'TANGA', '2025-01-03', 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus_info`
--
ALTER TABLE `bus_info`
  ADD PRIMARY KEY (`bus_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus_info`
--
ALTER TABLE `bus_info`
  MODIFY `bus_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
