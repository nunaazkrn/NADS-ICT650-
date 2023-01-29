-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2021 at 09:24 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hazard`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_pass`) VALUES
(1, 'admin', '$2y$10$KKhlw0ZUjv9rSXMR.cEAouPwDuAUaT0F8Q18VGLIM3htAQGG4vCNK');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `hz_id` int(11) NOT NULL,
  `hz_location` varchar(255) NOT NULL,
  `hz_state` varchar(100) NOT NULL,
  `hz_repname` varchar(150) NOT NULL,
  `hz_type` varchar(150) NOT NULL,
  `hz_desc` text NOT NULL,
  `hz_time` time NOT NULL,
  `hz_date` date NOT NULL,
  `hz_lat` decimal(10,4) NOT NULL,
  `hz_lng` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`hz_id`, `hz_location`, `hz_state`, `hz_repname`, `hz_type`, `hz_desc`, `hz_time`, `hz_date`, `hz_lat`, `hz_lng`) VALUES
(1, 'Jalan Jelutong', 'PENANG', 'Ajmal', 'Biological hazards', 'covid runaways', '15:15:00', '2021-08-05', '5.3947', '100.3108'),
(2, 'Jalan Ikan Mas', 'KUALA LUMPUR', 'Aiman', 'Physical hazards', 'Petrol car explode', '17:19:00', '2021-08-05', '3.1179', '101.7267'),
(3, 'Jalan Mahsuri', 'KEDAH', 'Kamal', 'Physical hazards', 'Car Accident', '23:41:00', '2021-08-08', '5.5084', '100.5377'),
(4, 'Jalan Bunga Raya Besar', 'JOHOR', 'Arif', 'Physical hazards', 'Road Construction', '19:50:00', '2021-08-08', '1.5096', '103.7685'),
(5, 'Taman Sri Amar', 'JOHOR', 'Ammar', 'Biological hazards', 'Covid-19 lockdown', '12:07:00', '2021-08-08', '1.5176', '103.7613'),
(6, 'Plaza Tol Sungai Besi', 'SELANGOR', 'Luqman', 'Physical hazards', 'Car Accident', '19:53:00', '2021-08-07', '3.0456', '101.7033'),
(7, 'BMC Mall Cheras', 'SELANGOR', 'Irdina', 'Environmental hazards', 'Covid-19 lockdown', '11:55:00', '2021-08-08', '3.0627', '101.7878'),
(8, 'Jalan Tembaga Kuning', 'PERAK', 'Azizi', 'Physical hazards', 'Road Construction', '01:57:00', '2021-08-07', '4.8578', '100.6937'),
(9, 'Jalan Utama', 'KEDAH', 'Merican', 'Physical hazards', 'Car Accident', '22:02:00', '2021-08-08', '5.9499', '100.4089'),
(10, 'Jalan Lahat', 'PERAK', 'Alya', 'Physical hazards', 'Road Constructions', '13:01:00', '2021-08-08', '4.5516', '101.0429'),
(11, 'Jalan Simpant Empat', 'PERLIS', 'Amirah', 'Physical hazards', 'Road Construction', '05:04:00', '2021-08-08', '6.3315', '100.1994'),
(12, 'Riverfront Sentral', 'MELAKA', 'Iman', 'Environmental hazards', 'In Covid total lockdown', '17:02:00', '2021-08-08', '2.2250', '102.2503'),
(13, 'Melaka Mall', 'MELAKA', 'Izzati', 'Environmental hazards', 'Covid-19 lockdown', '11:07:00', '2021-08-08', '2.2325', '102.2826'),
(14, 'Jalan Andalas', 'NEGERI SEMBILAN', 'Akram', 'Physical hazards', 'Car Crash between Motor', '09:11:00', '2021-08-08', '2.8241', '101.8901'),
(15, 'Jalan Perdana 4', 'NEGERI SEMBILAN', 'Izzudin', 'Radiation hazards', 'Bird Diseases', '16:11:00', '2021-08-07', '2.4505', '101.8639'),
(16, 'Jalan Andaman', 'KUALA LUMPUR', 'Adam', 'Physical hazards', 'Road Construction', '20:14:00', '2021-08-07', '3.2027', '101.7281'),
(17, 'Genting Highlands', 'PAHANG', 'Fatini', 'Environmental hazards', 'Covid19 runaways and lockdown', '02:13:00', '2021-08-08', '3.3931', '101.7701');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`hz_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `hz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
