-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2025 at 05:18 PM
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
  `username` text NOT NULL,
  `password` text NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `secondname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `residential` varchar(500) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `photo` text NOT NULL DEFAULT 'media\\images\\profiles\\profile-user.png',
  `reg_date` date NOT NULL,
  `confirmkey` varchar(10) NOT NULL,
  `OTP` int(6) NOT NULL,
  `userkey` int(9) NOT NULL,
  `security` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `username`, `password`, `firstname`, `secondname`, `lastname`, `birthdate`, `gender`, `marital_status`, `phone_no`, `email`, `residential`, `rank`, `photo`, `reg_date`, `confirmkey`, `OTP`, `userkey`, `security`) VALUES
(1, 'gmaph__001', 'SRSS14552', 'GEORGE', 'GODSON', 'MAPHOLE', '2005-03-26', 'male', 'single', '0626303582', 'gmaph001@gmail.com', '08 Mbwezeleni, Mianzini, Temeke, Dar-es-Salaam', 'manager', 'media/images/profiles/wallpaperflare.com_wallpaper (3).jpg', '2024-12-24', '440600', 0, 975725201, '::1'),
(2, 'BMosha', 'MOSHA1978', 'BERTHA', 'ISRAEL', 'MOSHA', '1979-08-12', 'female', 'single', '0712121820', 'bettymosha1978@gmail.com', 'Mbwezeleni, Mianzini, Temeke, Daresalaam', 'agent', 'media/images/profiles/wallpaperflare-cropped.jpg', '2024-12-24', '305953', 0, 502548951, '::1'),
(3, 'AMosha', 'MOSHA1968', 'AGNES', 'ISRAEL', 'MOSHA', '1968-01-01', 'female', 'single', '0627061101', 'moshaagnes1968@gmail.com', 'Mbwezeleni, Mianzini, Temeke, Daresalaam', 'main', 'media/images/profiles/MacOS Hello 4K.jpeg', '2024-12-24', '666300', 0, 535600963, '::1'),
(5, 'noah_matendo', 'MATENDO2006', '', '', '', '0000-00-00', '', '', '', 'noah@gmail.com', '', '', 'media\\images\\profiles\\profile-user.png', '0000-00-00', '', 0, 424888932, '');

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
(2, 'DAR ES SALAAM', 'TANGA', 0),
(3, 'TANGA', 'DAR ES SALAAM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `merchant_ref` varchar(255) NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `provider` varchar(255) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`perform_id`);

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
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `bill_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bus_info`
--
ALTER TABLE `bus_info`
  MODIFY `bus_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `driver_info`
--
ALTER TABLE `driver_info`
  MODIFY `driver_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `passenger_info`
--
ALTER TABLE `passenger_info`
  MODIFY `passenger_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `performance`
  MODIFY `perform_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `route_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
