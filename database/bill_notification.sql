-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2025 at 01:59 PM
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
-- Table structure for table `bill_notification`
--

CREATE TABLE `bill_notification` (
  `notify_ID` int(11) NOT NULL,
  `bill_key` int(9) NOT NULL,
  `bill_name` varchar(50) NOT NULL,
  `method` varchar(400) NOT NULL,
  `account_no` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bill` int(20) NOT NULL,
  `bill_time` varchar(20) NOT NULL,
  `bill_date` date NOT NULL,
  `handler_key` int(9) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'closed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_notification`
--

INSERT INTO `bill_notification` (`notify_ID`, `bill_key`, `bill_name`, `method`, `account_no`, `email`, `bill`, `bill_time`, `bill_date`, `handler_key`, `status`) VALUES
(3, 678361158, 'Fumbuka Limbu', 'Mpesa', '0748554514', 'gmaph001@gmail.com', 80000, '12:01', '2025-01-24', 502548951, 'closed'),
(4, 986973994, 'Omar Mohammed', 'Halopesa', '0626303582', 'gmaphtech@gmail.com', 40000, '15:02', '2025-02-05', 502548951, 'closed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_notification`
--
ALTER TABLE `bill_notification`
  ADD PRIMARY KEY (`notify_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_notification`
--
ALTER TABLE `bill_notification`
  MODIFY `notify_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
