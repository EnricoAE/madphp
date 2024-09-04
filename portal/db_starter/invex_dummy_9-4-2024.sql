-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2024 at 03:26 PM
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
-- Database: `invex_dummy`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_code` int(11) NOT NULL,
  `item_name_brand` varchar(255) NOT NULL,
  `unit_type` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `in_stock` int(11) NOT NULL,
  `date_dlvd` date NOT NULL,
  `out_stock` int(11) NOT NULL,
  `item_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_code`, `item_name_brand`, `unit_type`, `quantity`, `in_stock`, `date_dlvd`, `out_stock`, `item_category`) VALUES
(1, 'Acer', 'Boxed', 4, 4, '2024-09-07', 4, 'Tech Equipment'),
(2, 'Lenovo', 'Boxed', 155, 4, '2024-09-07', 4, 'Tech Equipment');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(11) NOT NULL,
  `req_name_brand` varchar(255) NOT NULL,
  `req_quantity` int(11) NOT NULL,
  `justification` varchar(255) NOT NULL,
  `user_id_inquiry` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `req_name_brand`, `req_quantity`, `justification`, `user_id_inquiry`) VALUES
(1, 'Acer', 4, 'kailangan po', 0),
(2, 'Lenovo', 12, 'pang valo', 453),
(3, 'Lenovo', 12, 'pang valo', 453),
(4, 'Acer', 122, 'basta', 100705);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `password` varchar(16) NOT NULL,
  `role_code` int(11) NOT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `f_name`, `l_name`, `contact_number`, `password`, `role_code`, `date_created`) VALUES
(9, 'eae_admin', 'Enrico', 'Enerlan', '9972112281', 'adminadmin', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `u_role_code` int(11) NOT NULL,
  `u_role_title` varchar(255) NOT NULL,
  `u_role_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`u_role_code`, `u_role_title`, `u_role_desc`) VALUES
(1, 'Admin', 'Super User'),
(2, 'Director', ''),
(3, 'Civil and Sanitary Services Chief', ''),
(4, 'Lights, Sounds, and Events Services Chief', ''),
(5, 'Electrical and Mechanical Service Chief', ''),
(6, 'Building and Grounds Service Chief', ''),
(7, 'Warehouse Personnel', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_code`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`u_role_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `item_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
