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
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `perform_id` int(11) NOT NULL,
  `user_ID` int(9) NOT NULL,
  `income` int(20) NOT NULL,
  `tickets` int(5) NOT NULL,
  `bill_key` int(9) NOT NULL,
  `bill_date` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'original',
  `no_edited` int(11) NOT NULL,
  `financial_status` varchar(30) NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`perform_id`, `user_ID`, `income`, `tickets`, `bill_key`, `bill_date`, `status`, `no_edited`, `financial_status`) VALUES
(1, 975725201, 70000, 2, 652749940, '2025-01-01', 'corrected', 1, 'closed'),
(3, 975725201, 105000, 3, 783497695, '2025-01-01', 'corrected', 2, 'closed'),
(4, 975725201, 120000, 3, 678700713, '2025-01-01', 'original', 0, 'closed'),
(5, 502548951, 105000, 3, 964508505, '2025-01-01', 'corrected', 1, 'closed'),
(6, 535600963, 210000, 6, 364787010, '2025-01-01', 'corrected', 2, 'closed'),
(7, 975725201, 105000, 3, 216188794, '2025-01-02', 'original', 0, 'open'),
(8, 535600963, 160000, 4, 129231502, '2025-01-02', 'original', 0, 'open'),
(9, 975725201, 35000, 1, 794762275, '2025-01-03', 'original', 0, 'open'),
(10, 975725201, 105000, 3, 115837215, '2025-01-03', 'original', 0, 'open');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`perform_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `performance`
  MODIFY `perform_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
