-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2025 at 05:16 PM
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
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `bill_ID` int(11) NOT NULL,
  `bill_name` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(300) NOT NULL,
  `bill` int(10) NOT NULL,
  `bill_time` time NOT NULL,
  `bill_date` date NOT NULL,
  `bill_key` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`bill_ID`, `bill_name`, `phone`, `email`, `bill`, `bill_time`, `bill_date`, `bill_key`) VALUES
(1, 'Gmaph001', '0712121820', 'gmaph001@gmail.com', 70000, '12:01:13', '2025-01-01', 652749940),
(3, 'Gmaph001', '0622445566', 'gmaph001@gmail.com', 105000, '13:49:22', '2025-01-01', 783497695),
(4, 'Gmaph001', '0785654595', 'gmaph001@gmail.com', 120000, '14:31:58', '2025-01-01', 678700713),
(5, 'BMosha', '0745632545', 'bettymosha1978@gmail.com', 105000, '15:01:23', '2025-01-01', 964508505),
(6, 'AMosha', '0722114455', 'moshaagnes1968@gmail.com', 210000, '15:20:10', '2025-01-01', 364787010),
(7, 'Gmaph001', '0655442254', 'gmaph001@gmail.com', 105000, '12:19:11', '2025-01-02', 216188794),
(8, 'AMosha', '0655448877', 'moshaagnes1968@gmail.com', 160000, '12:23:27', '2025-01-02', 129231502),
(9, 'gmaph__001', '0748554477', 'gmaph001@gmail.com', 35000, '13:27:41', '2025-01-03', 794762275),
(10, 'gmaph__001', '0712121820', 'gmaph001@gmail.com', 105000, '13:36:57', '2025-01-03', 115837215);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`bill_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `bill_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
