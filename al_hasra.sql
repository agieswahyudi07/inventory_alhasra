-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 02:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `al_hasra`
--

-- --------------------------------------------------------

--
-- Table structure for table `ms_division`
--

CREATE TABLE `ms_division` (
  `division_id` int(25) NOT NULL,
  `division_name` varchar(225) NOT NULL,
  `division_code` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ms_division`
--

INSERT INTO `ms_division` (`division_id`, `division_name`, `division_code`, `created_at`, `updated_at`) VALUES
(1, 'YAYASAN', '01', '2023-07-07 14:46:41', '2023-07-07 14:46:41'),
(2, 'SMK', '02', '2023-07-07 14:46:41', '2023-07-07 14:46:41'),
(3, 'SMA', '03', '2023-07-07 14:49:58', '2023-07-07 14:49:58'),
(4, 'SMP', '04', '2023-07-07 14:49:58', '2023-07-07 14:49:58'),
(5, 'FACILITIES', '05', '2023-07-07 14:50:35', '2023-07-07 14:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `ms_item`
--

CREATE TABLE `ms_item` (
  `item_id` int(25) NOT NULL,
  `item_name` varchar(225) DEFAULT NULL,
  `item_code` varchar(25) DEFAULT NULL,
  `item_price` int(225) DEFAULT NULL,
  `division_id` int(25) DEFAULT NULL,
  `room_id` int(25) DEFAULT NULL,
  `item_category_id` int(25) DEFAULT NULL,
  `purchase_date` datetime NOT NULL,
  `notes` varchar(225) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ms_item`
--

INSERT INTO `ms_item` (`item_id`, `item_name`, `item_code`, `item_price`, `division_id`, `room_id`, `item_category_id`, `purchase_date`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'meja', '01', 500000, 1, 1, 1, '2023-07-08 00:00:00', '2130210301', '2023-07-08 03:08:42', '2023-07-08 03:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `ms_item_category`
--

CREATE TABLE `ms_item_category` (
  `item_category_id` int(25) NOT NULL,
  `item_category_name` varchar(225) NOT NULL,
  `item_category_code` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ms_item_category`
--

INSERT INTO `ms_item_category` (`item_category_id`, `item_category_name`, `item_category_code`, `created_at`, `updated_at`) VALUES
(1, 'MESIN DAN LISTRIK', '01', '2023-07-08 04:24:42', '2023-07-08 04:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `ms_room`
--

CREATE TABLE `ms_room` (
  `room_id` int(25) NOT NULL,
  `room_name` varchar(225) NOT NULL,
  `room_code` varchar(25) NOT NULL,
  `division_id` int(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ms_room`
--

INSERT INTO `ms_room` (`room_id`, `room_name`, `room_code`, `division_id`, `created_at`, `updated_at`) VALUES
(1, 'KANTOR YAYASAN', '01', 1, '2023-07-08 04:24:03', '2023-07-08 04:24:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_division`
--
ALTER TABLE `ms_division`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `ms_item`
--
ALTER TABLE `ms_item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `division_id` (`division_id`,`room_id`,`item_category_id`);

--
-- Indexes for table `ms_item_category`
--
ALTER TABLE `ms_item_category`
  ADD PRIMARY KEY (`item_category_id`);

--
-- Indexes for table `ms_room`
--
ALTER TABLE `ms_room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `division_id` (`division_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ms_division`
--
ALTER TABLE `ms_division`
  MODIFY `division_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ms_item`
--
ALTER TABLE `ms_item`
  MODIFY `item_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ms_item_category`
--
ALTER TABLE `ms_item_category`
  MODIFY `item_category_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ms_room`
--
ALTER TABLE `ms_room`
  MODIFY `room_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
