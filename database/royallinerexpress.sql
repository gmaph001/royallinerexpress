-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2024 at 06:25 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_ID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `secondname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `phone_no` int(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `residential` varchar(500) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `rank_no` int(5) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `bill_ID` int(11) NOT NULL,
  `bill` int(30) NOT NULL,
  `phone` int(10) NOT NULL,
  `date` date NOT NULL,
  `bill_key` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bus_info`
--

CREATE TABLE `bus_info` (
  `bus_ID` int(11) NOT NULL,
  `bus_no` varchar(30) NOT NULL,
  `seats` int(2) NOT NULL,
  `class` varchar(10) NOT NULL,
  `fare` int(10) NOT NULL,
  `azam` varchar(20) DEFAULT NULL,
  `tv` varchar(20) DEFAULT NULL,
  `refreshments` varchar(20) DEFAULT NULL,
  `charging` varchar(50) DEFAULT NULL,
  `wifi` int(20) DEFAULT NULL,
  `toilet` varchar(20) DEFAULT NULL,
  `route_ID` int(10) NOT NULL,
  `filled` int(3) NOT NULL,
  `confirmation` varchar(20) NOT NULL,
  `area_confirm` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_info`
--

INSERT INTO `bus_info` (`bus_ID`, `bus_no`, `seats`, `class`, `fare`, `azam`, `tv`, `refreshments`, `charging`, `wifi`, `toilet`, `route_ID`, `filled`, `confirmation`, `area_confirm`, `date`) VALUES
(2, 'T387DJN', 51, 'Luxury', 35000, NULL, NULL, NULL, 'available', NULL, NULL, 2, 7, '', '', '0000-00-00'),
(3, 'T387DXV', 51, 'Semi-Luxur', 40000, 'available', NULL, NULL, 'available', NULL, NULL, 2, 0, '', '', '0000-00-00'),
(4, 'T387DXK', 51, 'Semi-Luxur', 40000, 'available', NULL, NULL, 'available', NULL, NULL, 2, 0, '', '', '0000-00-00'),
(5, 'T387DZE', 51, 'Semi-Luxur', 40000, 'available', NULL, NULL, 'available', NULL, NULL, 2, 0, '', '', '0000-00-00'),
(6, 'T345DBZ', 57, 'Luxury', 45000, 'available', NULL, NULL, NULL, 0, NULL, 2, 0, '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `driver_info`
--

CREATE TABLE `driver_info` (
  `driver_ID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `secondname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `phone_no` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `residential` varchar(500) NOT NULL,
  `joining_date` date NOT NULL,
  `licence_no` int(50) NOT NULL,
  `experience` int(3) NOT NULL,
  `bus_ID` int(10) NOT NULL,
  `area_confirm` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photo_ID` int(11) NOT NULL,
  `photo_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `route_ID` int(11) NOT NULL,
  `departure` varchar(30) NOT NULL,
  `destination` varchar(30) NOT NULL,
  `eta` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`route_ID`, `departure`, `destination`, `eta`) VALUES
(2, 'DAR ES SALAAM', 'TANGA', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`bill_ID`);

--
-- Indexes for table `bus_info`
--
ALTER TABLE `bus_info`
  ADD PRIMARY KEY (`bus_ID`);

--
-- Indexes for table `driver_info`
--
ALTER TABLE `driver_info`
  ADD PRIMARY KEY (`driver_ID`);

--
-- Indexes for table `passenger_info`
--
ALTER TABLE `passenger_info`
  ADD PRIMARY KEY (`passenger_ID`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_ID`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`route_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `bill_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bus_info`
--
ALTER TABLE `bus_info`
  MODIFY `bus_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `driver_info`
--
ALTER TABLE `driver_info`
  MODIFY `driver_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passenger_info`
--
ALTER TABLE `passenger_info`
  MODIFY `passenger_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `route_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
