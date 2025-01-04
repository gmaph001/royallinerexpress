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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
