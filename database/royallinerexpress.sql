-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2025 at 10:02 AM
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
  `office` varchar(100) NOT NULL DEFAULT 'DAR ES SALAAM',
  `confirmkey` varchar(10) NOT NULL,
  `OTP` int(6) NOT NULL,
  `userkey` int(9) NOT NULL,
  `security` text NOT NULL,
  `notifications` int(11) NOT NULL,
  `unread` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `username`, `password`, `firstname`, `secondname`, `lastname`, `birthdate`, `gender`, `marital_status`, `phone_no`, `email`, `residential`, `rank`, `photo`, `reg_date`, `office`, `confirmkey`, `OTP`, `userkey`, `security`, `notifications`, `unread`) VALUES
(1, 'gmaph__001', 'SRSS14552', 'GEORGE', 'GODSON', 'MAPHOLE', '2005-03-26', 'male', 'single', '0626303582', 'gmaph001@gmail.com', '08 Mbwezeleni, Mianzini, Temeke, Dar-es-Salaam', 'manager', 'media/images/profiles/wallpaperflare.com_wallpaper (3).jpg', '2024-12-24', 'DAR ES SALAAM', '440600', 0, 975725201, '::1', 0, 0),
(2, 'BMosha', 'MOSHA1978', 'BERTHA', 'ISRAEL', 'MOSHA', '1979-08-12', 'female', 'single', '0712121820', 'bettymosha1978@gmail.com', 'Mbwezeleni, Mianzini, Temeke, Daresalaam', 'agent', 'media/images/profiles/wallpaperflare-cropped.jpg', '2024-12-24', 'DAR ES SALAAM', '305953', 0, 502548951, '::1', 2, 0),
(3, 'AMosha', 'MOSHA1968', 'AGNES', 'ISRAEL', 'MOSHA', '1968-01-01', 'female', 'single', '0627061101', 'moshaagnes1968@gmail.com', 'Mbwezeleni, Mianzini, Temeke, Daresalaam', 'main', 'media/images/profiles/MacOS Hello 4K.jpeg', '2024-12-24', 'DAR ES SALAAM', '666300', 0, 535600963, '::1', 0, 0),
(6, 'eric_hashim', 'eric_hashim', 'ERIC', 'HASHIM', 'MLOSO', '2003-12-25', 'male', 'divorced', '0656456585', 'ericmloso@gmail.com', 'Mbagala, Dar es Salaam', 'agent', 'media/images/profiles/wallpaperflare.com_wallpaper.jpg', '2025-02-16', 'DAR ES SALAAM', '468240', 0, 754287625, '::1', 2, 0),
(7, '._muhy', 'muhy_marc', 'MUHADDITHA', 'YUSUPH', 'SULEIMAN', '2006-06-05', 'female', 'married', '0748551122', 'muhy@gmail.com', 'Magomeni, Dar es Salaam', 'agent', 'media\\images\\profiles\\profile-user.png', '2025-02-16', 'DAR ES SALAAM', '190983', 0, 971082350, '::1', 2, 0),
(8, 'suhy', 'suhayma_suleiman', 'SUHAYMA', 'SULEIMAN', 'SALEH', '2006-03-14', 'female', 'single', '0747484945', 'suhy@gmail.com', 'Magomeni, Dar es Salaam', 'agent', 'media/images/profiles/MacOS Hello 4K.jpeg', '2025-02-16', 'DAR ES SALAAM', '561562', 0, 868045784, '::1', 2, 0);

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
(10, 'gmaph__001', '0712121820', 'gmaph001@gmail.com', 105000, '13:36:57', '2025-01-03', 115837215),
(11, 'George Maphole', '0748554514', 'gmaph001@gmail.com', 40000, '15:01:00', '2025-01-21', 118670477);

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
(1, 947598852, 'Diana Festo', 'Tigo', '0717881992', 'gmaph001@gmail.com', 280000, '16:02', '2025-02-24', 502548951, 'opened'),
(2, 362003470, 'Bertha Mosha', 'Tigo', '0712121820', 'bettymosha1978@gmail.com', 80000, '22:02', '2025-02-25', 754287625, 'opened'),
(3, 654688460, 'Innocent Mathias', 'Halopesa', '0626303582', 'gmaph001@gmail.com', 100000, '15:02', '2025-02-26', 971082350, 'opened'),
(4, 948471829, 'Calvin Makule', 'Tigo', '0719656591', 'gmaph001@gmail.com', 105000, '17:03', '2025-03-01', 868045784, 'opened'),
(5, 636087282, 'albert kayombo', 'Halopesa', '0624417781', 'albertkayombo551@gmail.com', 160000, '12:03', '2025-03-02', 502548951, 'opened'),
(6, 185620875, 'Omar', 'Airtel', '0788719932', 'matumboomar45@gmail.com', 560000, '08:03', '2025-03-03', 754287625, 'opened'),
(9, 727113473, 'Joshua', 'Mpesa', '0748554514', 'gmaph001@gmail.com', 120000, '14:03', '2025-03-03', 0, 'closed'),
(10, 596218984, 'Joshua John', 'Mpesa', '0748554514', 'gmaph001@gmail.com', 210000, '15:03', '2025-03-03', 971082350, 'opened'),
(11, 993121065, 'edmund komba', 'Tigo', '0656144795', 'najifunza@gmail.com', 40000, '15:03', '2025-03-03', 868045784, 'opened');

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
  `ac` varchar(20) DEFAULT NULL,
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

INSERT INTO `bus_info` (`bus_ID`, `bus_no`, `seats`, `class`, `fare`, `ac`, `tv`, `refreshments`, `charging`, `wifi`, `toilet`, `route_ID`, `filled`, `confirmation`, `position`, `op_date`, `status`) VALUES
(1, 'T879EJM', 57, 'VIP A', 40000, NULL, 'available', 'available', 'available', 'available', 'available', 2, 0, NULL, 'TANGA', '2025-01-25', 'available'),
(2, 'T879EGJ', 57, 'VIP A', 40000, NULL, 'available', 'available', 'available', 'available', 'available', 2, 6, NULL, 'TANGA', '2025-03-04', 'available'),
(4, 'T678DZT', 51, 'VIP B', 40000, NULL, 'available', 'available', 'available', NULL, 'available', 1, 0, NULL, 'DAR ES SALAAM', '2025-01-07', 'available'),
(5, 'T675EBM', 57, 'LUXURY', 35000, NULL, 'available', 'available', 'available', NULL, NULL, 2, 0, NULL, 'TANGA', '2025-01-07', 'available'),
(11, 'T876EJS', 57, 'LUXURY', 35000, NULL, 'available', 'available', 'available', NULL, NULL, 1, 3, NULL, 'DAR ES SALAAM', '2025-01-08', 'available'),
(12, 'T564EAC', 51, 'LUXURY', 35000, NULL, 'available', 'available', NULL, NULL, NULL, 1, 0, NULL, 'DAR ES SALAAM', '2025-01-08', 'available'),
(13, 'T567EJK', 57, 'VIP A', 100000, 'available', 'available', 'available', 'available', NULL, 'available', 7, 1, NULL, 'DAR ES SALAAM', '2025-01-08', 'available'),
(14, 'T657DZZ', 57, 'LUXURY', 40000, NULL, 'available', 'available', 'available', NULL, NULL, 5, 1, NULL, 'DAR ES SALAAM', '2025-01-08', 'available'),
(15, 'T675EBA', 57, 'LUXURY', 40000, NULL, 'available', 'available', 'available', NULL, NULL, 6, 0, NULL, 'ROMBO', '2025-01-08', 'available'),
(16, 'T547EHU', 51, 'LUXURY', 90000, NULL, 'available', 'available', 'available', NULL, 'available', 8, 0, NULL, 'MWANZA', '2025-01-08', 'available'),
(17, 'T678EAZ', 51, 'LUXURY', 70000, NULL, 'available', 'available', 'available', NULL, NULL, 3, 7, NULL, 'DAR ES SALAAM', '2025-01-08', 'available'),
(18, 'T567EAA', 57, 'LUXURY', 70000, NULL, 'available', 'available', 'available', NULL, NULL, 4, 0, NULL, 'MBEYA', '2025-01-08', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `chk_photos`
--

CREATE TABLE `chk_photos` (
  `photo_ID` int(11) NOT NULL,
  `photo_name` varchar(500) NOT NULL,
  `photo_key` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chk_photos`
--

INSERT INTO `chk_photos` (`photo_ID`, `photo_name`, `photo_key`) VALUES
(1, 'media/images/01.jpg', 283888046),
(3, 'media/images/02.jpg', 438723130),
(4, 'media/images/03.jpg', 294688450),
(5, 'media/images/04.jpg', 613147080),
(6, 'media/images/05.jpg', 276356580),
(7, 'media/images/06.jpg', 342243417),
(8, 'media/images/07.jpg', 495696937),
(9, 'media/images/08.jpg', 479229548),
(10, 'media/images/09.jpg', 386408307),
(11, 'media/images/10.jpg', 186052298),
(12, 'media/images/11.jpg', 448336934),
(13, 'media/images/background.jpg', 911500065);

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
(3, 'IBRAHIM', 'ABDALLAH', 'MWENDA', 'ibra_dullah', '1990-02-25', 'male', 'married', '0755446688', 'ibradullah@gmail.com', '08 Mbwezeleni, Mianzini, Temeke, Dar-es-Salaam', '2025-01-06', 2147483647, 10, 'media/images/drivers/MacOS Hello 4K.jpeg', 'T896ELY', 'TANGA', '2025-01-06', 'active', 409913923),
(4, 'Kassim', 'Said', 'Kassim', 'kassim_said', '1987-03-29', 'male', 'married', '0742365412', 'kassim1987@gmail.com', '08 Mbwezeleni, Mianzini, Temeke, Dar-es-Salaam', '2025-01-06', 2147483647, 12, 'media/images/drivers/peakpx (6).jpg', '', '', '0000-00-00', 'active', 593707976),
(5, 'George', 'Godson', 'Maphole', 'Gmaph001', '2003-05-26', 'male', 'single', '0748554514', 'gmaph001@gmail.com', 'Mbwezeleni, Mianzini, Temeke, Daresalaam', '2025-01-06', 987456321, 5, 'media/images/drivers/IMG_20180819_121655.jpg', 'T879EGJ', 'TANGA', '2025-03-03', 'active', 434993638);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `exp_ID` int(11) NOT NULL,
  `exp_name` varchar(500) NOT NULL,
  `expense` int(11) NOT NULL,
  `exp_date` date NOT NULL,
  `exp_key` int(9) NOT NULL
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

--
-- Dumping data for table `passenger_info`
--

INSERT INTO `passenger_info` (`passenger_ID`, `firstname`, `secondname`, `lastname`, `departure`, `arrival`, `class`, `fare`, `bus_no`, `seat_no`, `pay_status`, `tarehe`, `userkey`, `bill_id`) VALUES
(1, 'Omar', 'Mohammed', 'Matumbo', 'TANGA', 'DAR ES SALAAM', 'VIP A', 40000, 'T879EGJ', 1, '', '2025-03-04', 886667030, 727113473),
(2, 'Innocent', 'Mathias', 'Ngowi', 'TANGA', 'DAR ES SALAAM', 'VIP A', 40000, 'T879EGJ', 14, '', '2025-03-04', 473480653, 727113473),
(3, 'Joshua', 'John', 'Martin', 'TANGA', 'DAR ES SALAAM', 'VIP A', 40000, 'T879EGJ', 17, '', '2025-03-04', 422201785, 727113473),
(4, 'Omar', 'Mohammed', 'Matumbo', 'DAR ES SALAAM', 'MBEYA', 'LUXURY', 70000, 'T678EAZ', 2, 'paid', '2025-03-03', 134589163, 596218984),
(5, 'Innocent', 'Mathias', 'Ngowi', 'DAR ES SALAAM', 'MBEYA', 'LUXURY', 70000, 'T678EAZ', 27, 'paid', '2025-03-03', 762051956, 596218984),
(6, 'Joshua', 'John', 'Martin', 'DAR ES SALAAM', 'MBEYA', 'LUXURY', 70000, 'T678EAZ', 29, 'paid', '2025-03-03', 453687133, 596218984),
(7, 'edmund', 'Edmun', 'komba', 'DAR ES SALAAM', 'ROMBO', 'LUXURY', 40000, 'T657DZZ', 32, 'paid', '2025-03-03', 502004465, 993121065);

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
  `photo_name` varchar(500) NOT NULL,
  `photo_key` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_ID`, `photo_name`, `photo_key`) VALUES
(1, 'media/images/01.jpg', 283888046),
(2, 'media/images/02.jpg', 438723130),
(3, 'media/images/03.jpg', 294688450),
(4, 'media/images/04.jpg', 613147080),
(5, 'media/images/05.jpg', 276356580),
(6, 'media/images/06.jpg', 342243417),
(7, 'media/images/07.jpg', 495696937),
(8, 'media/images/08.jpg', 479229548),
(9, 'media/images/09.jpg', 386408307),
(10, 'media/images/10.jpg', 186052298),
(11, 'media/images/11.jpg', 448336934),
(12, 'media/images/background.jpg', 911500065);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `reviewkey` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_ID`, `name`, `email`, `message`, `status`, `reviewkey`) VALUES
(1, 'George Maphole', 'gmaph001@gmail.com', 'It is a good system.', ' not approved', 381338465),
(2, 'CALVIN MAKULE', 'gmaph001@gmail.com', 'It\'s a wonderful system.', ' not approved', 686197198),
(3, 'Innocent Mathias', 'omar01@gmail.com', 'It is a wonderful system with the best UI and functionality. Big up guys!', ' not approved', 273581834),
(4, 'Omar Mohammed', 'innomatty@gmail.com', 'It is the worst system do far!', ' not approved', 446782280);

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
(1, 'DAR ES SALAAM', 'TANGA', 4),
(2, 'TANGA', 'DAR ES SALAAM', 4),
(3, 'DAR ES SALAAM', 'MBEYA', 12),
(4, 'MBEYA', 'DAR ES SALAAM', 12),
(5, 'DAR ES SALAAM', 'ROMBO', 10),
(6, 'ROMBO', 'DAR ES SALAAM', 10),
(7, 'DAR ES SALAAM', 'MWANZA', 16),
(8, 'MWANZA', 'DAR ES SALAAM', 16);

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
-- Indexes for table `bill_notification`
--
ALTER TABLE `bill_notification`
  ADD PRIMARY KEY (`notify_ID`);

--
-- Indexes for table `bus_info`
--
ALTER TABLE `bus_info`
  ADD PRIMARY KEY (`bus_ID`);

--
-- Indexes for table `chk_photos`
--
ALTER TABLE `chk_photos`
  ADD PRIMARY KEY (`photo_ID`);

--
-- Indexes for table `driver_info`
--
ALTER TABLE `driver_info`
  ADD PRIMARY KEY (`driver_ID`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`exp_ID`);

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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_ID`);

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
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `bill_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bill_notification`
--
ALTER TABLE `bill_notification`
  MODIFY `notify_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bus_info`
--
ALTER TABLE `bus_info`
  MODIFY `bus_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `chk_photos`
--
ALTER TABLE `chk_photos`
  MODIFY `photo_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `driver_info`
--
ALTER TABLE `driver_info`
  MODIFY `driver_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `exp_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passenger_info`
--
ALTER TABLE `passenger_info`
  MODIFY `passenger_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `performance`
  MODIFY `perform_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `route_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
