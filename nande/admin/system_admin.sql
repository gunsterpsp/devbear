-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 02:17 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `role` varchar(10) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_username`, `password`, `status`, `role`) VALUES
(1, 'admin', '123', 'Active', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `company_list`
--

CREATE TABLE `company_list` (
  `id` int(50) NOT NULL,
  `company` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(11) NOT NULL DEFAULT 'Active',
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_list`
--

INSERT INTO `company_list` (`id`, `company`, `username`, `email`, `password`, `created_at`, `updated_at`, `status`, `role`) VALUES
(5, 'Inventory', 'sofiabear143', 'sofiabear143@gmail.com', '123', '2022-06-23 00:59:37', '2022-06-23 09:00:59', 'Active', 'user'),
(17, '3333', 'maebear143', 'maebear143@gmail.com', '123', '2022-06-23 00:59:37', '2022-06-23 08:59:59', 'Active', 'user'),
(28, 'Meme', 'rikasan192', 'rikasan192@gmail.com', '123', '2022-06-23 01:42:30', '2022-06-23 11:55:46', 'Active', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_quantity` varchar(100) NOT NULL,
  `product_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_name`, `product_price`, `product_quantity`, `product_file`, `created_at`, `updated_at`) VALUES
(28, '123', '123', '123', 'C:fakepathgui.png', '2022-06-23 02:35:20', '2022-06-23 10:35:20'),
(29, '123', '123', '123', 'C:fakepath!cid_789F593C786446218B02AB6D7B83260A@FMCITCE21010.png', '2022-06-23 02:38:16', '2022-06-23 10:38:16'),
(30, '555', '555ss', '55', 'C:fakepath!cid_789F593C786446218B02AB6D7B83260A@FMCITCE21010.png', '2022-06-23 02:38:40', '2022-06-23 10:39:33'),
(32, 'asd', 'asd', 'asd', 'C:fakepath!cid_ii_ku694nod1.png', '2022-06-23 02:41:58', '2022-06-23 10:41:58'),
(33, 'asda', 'sd', 'asd', 'C:fakepath12-01-2021.png', '2022-06-23 03:00:13', '2022-06-23 11:00:13'),
(34, '1234', '1234', '1234', 'C:fakepath12-01-2021.png', '2022-06-23 03:07:58', '2022-06-23 12:40:49'),
(39, '3', '3', '3', 'C:fakepathakero.rar', '2022-06-23 05:55:03', '2022-06-23 13:55:03'),
(40, '33', '33', '33', 'C:fakepathinventory 2022-06-23.csv', '2022-06-23 05:56:32', '2022-06-23 13:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `city`) VALUES
(1, 'TOHKA', 'YAGATAMI', '123123123', 'tokyo japan'),
(2, 'ORIGAMI', 'tobiichiorigami@yahoo.com', '123123', 'Nagoya Japan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_list`
--
ALTER TABLE `company_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_list`
--
ALTER TABLE `company_list`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
