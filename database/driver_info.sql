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
-- Table structure for table `driver_info`
--

CREATE TABLE `driver_info` (
  `driver_ID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `secondname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `residential` varchar(500) NOT NULL,
  `joining_date` date NOT NULL,
  `licence_no` int(50) NOT NULL,
  `experience` int(3) NOT NULL,
  `photo` text NOT NULL DEFAULT 'media\\images\\drivers\\profile-user.png',
  `bus_ID` varchar(10) NOT NULL,
  `area_confirm` varchar(50) NOT NULL,
  `date_confirm` date NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'active',
  `driver_key` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver_info`
--

INSERT INTO `driver_info` (`driver_ID`, `firstname`, `secondname`, `lastname`, `username`, `birthdate`, `gender`, `marital_status`, `phone_no`, `email`, `residential`, `joining_date`, `licence_no`, `experience`, `photo`, `bus_ID`, `area_confirm`, `date_confirm`, `status`, `driver_key`) VALUES
(1, 'RASHID', 'MFAUME', 'KAWAWA', 'cheed_kawawa', '2000-01-02', 'male', 'married', '0748554466', 'kawawa@gmail.com', 'Mbwezeleni, Mianzini, Temeke, Daresalaam', '2025-01-03', 789254631, 6, 'media/images/drivers/IMG_20180422_130609-1.jpg', '', '', '0000-00-00', 'active', 870254152),
(2, 'IBRAHIM', 'ABDALLAH', 'MWENDA', 'ibra_dullah', '1998-02-05', 'male', 'single', '0645887799', 'ibradullah@gmail.com', 'Mbagala, Temeke, Dar-es-Salaam', '2025-01-03', 2147483647, 4, 'media/images/drivers/peakpx (6).jpg', 'T765EJM', 'TANGA', '2025-01-03', 'active', 444876886);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver_info`
--
ALTER TABLE `driver_info`
  ADD PRIMARY KEY (`driver_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver_info`
--
ALTER TABLE `driver_info`
  MODIFY `driver_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
