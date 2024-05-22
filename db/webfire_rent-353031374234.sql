-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 11:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webfire_rent-353031374234`
--

-- --------------------------------------------------------

--
-- Table structure for table `ab_complaint`
--

CREATE TABLE `ab_complaint` (
  `id` int(11) NOT NULL,
  `type` enum('tenant') NOT NULL,
  `user_id` int(11) NOT NULL,
  `complain_user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text DEFAULT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0=open,1=closed',
  `response` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ab_login`
--

CREATE TABLE `ab_login` (
  `id` int(11) NOT NULL,
  `type` enum('Admin','Staff','Member') NOT NULL,
  `name` varchar(100) NOT NULL,
  `_user` varchar(100) NOT NULL,
  `_pass` varchar(100) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ab_login`
--

INSERT INTO `ab_login` (`id`, `type`, `name`, `_user`, `_pass`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Abhijeet Singh', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '2024-01-22 14:06:52', '2024-01-23 14:01:47'),
(2, 'Staff', '', 'staff', '202cb962ac59075b964b07152d234b70', '1', '2024-01-22 14:07:33', '2024-01-22 14:07:33'),
(3, 'Member', '', 'member', '202cb962ac59075b964b07152d234b70', '1', '2024-01-22 14:07:50', '2024-01-24 02:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `ab_monthly_reading`
--

CREATE TABLE `ab_monthly_reading` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `reading` int(11) NOT NULL,
  `extra_amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ab_monthly_reading`
--

INSERT INTO `ab_monthly_reading` (`id`, `user_id`, `room_id`, `reading`, `extra_amount`, `date`, `year`, `month`, `created_at`, `updated_at`) VALUES
(2, 3, 2, 30, 250, '0000-00-00', 2024, 1, '2024-01-27 21:13:36', '2024-01-27 21:39:02'),
(3, 3, 1, 100, 0, '0000-00-00', 2024, 1, '2024-01-27 21:38:43', '2024-01-28 05:51:28'),
(4, 3, 2, 43, 123, '0000-00-00', 2024, 3, '2024-03-08 15:29:32', '2024-03-08 15:29:32'),
(5, 3, 1, 40, 6, '0000-00-00', 2024, 3, '2024-03-27 12:41:04', '2024-03-27 12:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `ab_property`
--

CREATE TABLE `ab_property` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `desc` text DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `other` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ab_property`
--

INSERT INTO `ab_property` (`id`, `name`, `location`, `desc`, `image`, `other`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Abc Property', 'Firozabad', '', '2009ce7c84ad554b5baf7f266f8b39a3.png', '[\"Balcony\"]', 3, '1', '2024-01-24 03:17:36', '2024-01-27 16:03:29'),
(2, 'New', 'Agra', 'Hii', '997cc434a3df254459afa8988cfde66b.jpg', '[\"Swimming pool\",\"Terrace\",\"Air conditioning\",\"Internet\",\"Balcony\",\"Cable TV\",\"Computer\",\"Dishwasher\",\"Near Green Zone\",\"Near Church\",\"Near Estate\",\"Cofee pot\"]', 3, '1', '2024-01-28 12:41:24', '2024-01-28 12:41:24'),
(3, 'Krishna Complex', 'Delhi', '24 Floor building', 'd7a2684a8eea93900f4badbf36896df6.jpg', '[\"Swimming pool\",\"Terrace\",\"Air conditioning\",\"Internet\",\"Balcony\",\"Cable TV\",\"Near Green Zone\"]', 3, '1', '2024-04-07 14:12:38', '2024-04-07 14:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `ab_rooms`
--

CREATE TABLE `ab_rooms` (
  `id` int(11) NOT NULL,
  `type` enum('room','shop') NOT NULL,
  `title` varchar(100) NOT NULL,
  `room_no` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `capicity` int(11) NOT NULL,
  `room_type` enum('RK','1BHK','2BHK','3BHK') NOT NULL,
  `status` enum('1','0') NOT NULL,
  `property_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `value_now` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ab_rooms`
--

INSERT INTO `ab_rooms` (`id`, `type`, `title`, `room_no`, `image`, `capicity`, `room_type`, `status`, `property_id`, `user_id`, `price`, `value_now`, `created_at`, `updated_at`) VALUES
(1, 'shop', 'Shop', '101', '', 3, '1BHK', '1', 1, 3, 6000, 0, '2024-01-27 14:58:00', '2024-01-27 15:26:30'),
(2, 'room', 'Room 2', '102', '01e0ce748a74e339c5150c309eb4678f.jpg', 2, '3BHK', '1', 1, 3, 10000, 0, '2024-01-27 14:59:11', '2024-01-27 15:26:33'),
(3, 'room', '', '1', '265c5ac3890f4c82de06d8dd636868fe.jpg', 2, '2BHK', '1', 2, 3, 5000, 0, '2024-01-28 12:43:07', '2024-01-28 12:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `ab_tenant`
--

CREATE TABLE `ab_tenant` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `joining_date` date NOT NULL,
  `leaving_date` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ab_tenant`
--

INSERT INTO `ab_tenant` (`id`, `room_id`, `image`, `name`, `mobile`, `age`, `user_id`, `joining_date`, `leaving_date`, `created_at`, `updated_at`) VALUES
(1, 1, '2201d42258ddaaf12819c7b5e50b439c.jpg', 'Abhijeet Singh', '9955718214', 22, 3, '2024-01-24', 0, '2024-01-27 19:38:04', '2024-01-27 19:51:21'),
(2, 2, '04cc783be7d9e85cbb9b6b2ba3f2003f.jpeg', 'Ankit Singh', '1234567890', 12, 3, '2024-01-17', 0, '2024-01-27 19:58:28', '2024-01-27 20:57:32'),
(3, 3, 'f1415732b530325be935006969fd4b1f.jpg', 'Check', '123456789', 24, 3, '2024-01-28', 0, '2024-01-28 12:45:25', '2024-01-28 12:45:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ab_complaint`
--
ALTER TABLE `ab_complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ab_login`
--
ALTER TABLE `ab_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ab_monthly_reading`
--
ALTER TABLE `ab_monthly_reading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ab_property`
--
ALTER TABLE `ab_property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ab_rooms`
--
ALTER TABLE `ab_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ab_tenant`
--
ALTER TABLE `ab_tenant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ab_complaint`
--
ALTER TABLE `ab_complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ab_login`
--
ALTER TABLE `ab_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ab_monthly_reading`
--
ALTER TABLE `ab_monthly_reading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ab_property`
--
ALTER TABLE `ab_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ab_rooms`
--
ALTER TABLE `ab_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ab_tenant`
--
ALTER TABLE `ab_tenant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
