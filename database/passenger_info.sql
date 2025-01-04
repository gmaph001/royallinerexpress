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
-- Table structure for table `passenger_info`
--

CREATE TABLE `passenger_info` (
  `passenger_ID` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `secondname` varchar(30) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `departure` varchar(50) NOT NULL,
  `arrival` varchar(50) NOT NULL,
  `class` varchar(20) NOT NULL,
  `fare` int(10) NOT NULL,
  `bus_no` varchar(20) NOT NULL,
  `seat_no` int(2) NOT NULL,
  `pay_status` varchar(30) NOT NULL,
  `tarehe` date NOT NULL,
  `userkey` int(10) NOT NULL,
  `bill_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger_info`
--

INSERT INTO `passenger_info` (`passenger_ID`, `firstname`, `secondname`, `lastname`, `departure`, `arrival`, `class`, `fare`, `bus_no`, `seat_no`, `pay_status`, `tarehe`, `userkey`, `bill_id`) VALUES
(1, 'GEORGE', 'GODSON', 'MAPHOLE', 'TANGA', 'DAR ES SALAAM', 'LUXURY', 35000, 'T567EBA', 19, 'paid', '2025-01-04', 736135129, 794762275),
(2, 'AGNES', 'ISRAEL', 'MOSHA', 'DAR ES SALAAM', 'TANGA', 'LUXURY', 35000, 'T678EDS', 18, 'paid', '2025-01-03', 281321046, 115837215),
(3, 'BERTHA', 'ISRAEL', 'MOSHA', 'DAR ES SALAAM', 'TANGA', 'LUXURY', 35000, 'T678EDS', 26, 'paid', '2025-01-03', 855506081, 115837215),
(4, 'MEGHAN', 'MASHAKA', 'MASUDI', 'DAR ES SALAAM', 'TANGA', 'LUXURY', 35000, 'T678EDS', 34, 'paid', '2025-01-03', 221967407, 115837215),
(5, 'NOAH', 'MATENDO', 'STANSLAUS', 'DAR ES SALAAM', 'TANGA', 'VIP', 40000, 'T765ELJ', 30, '', '2025-01-04', 109860010, 204920006),
(6, 'ESTHER', 'MATENDO', 'STANSLAUS', 'DAR ES SALAAM', 'TANGA', 'VIP', 40000, 'T765ELJ', 23, '', '2025-01-04', 362468549, 204920006),
(7, 'DANIEL', 'MATENDO', 'MATENDO', 'DAR ES SALAAM', 'TANGA', 'VIP', 40000, 'T765ELJ', 22, '', '2025-01-04', 529094143, 204920006),
(8, 'ALBERT', 'DENNIS', 'KAYOMBO', 'DAR ES SALAAM', 'TANGA', 'LUXURY', 35000, 'T765EJM', 5, '', '2025-01-03', 290005575, 422998237);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `passenger_info`
--
ALTER TABLE `passenger_info`
  ADD PRIMARY KEY (`passenger_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `passenger_info`
--
ALTER TABLE `passenger_info`
  MODIFY `passenger_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
