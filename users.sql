-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2026 at 10:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash_flows`
--

CREATE TABLE `cash_flows` (
  `id` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cash_flows`
--

INSERT INTO `cash_flows` (`id`, `type`, `amount`, `description`, `created_at`) VALUES
(1, 'in', 225.00, 'Sale of sting (x9)', '2026-04-16 15:32:14'),
(2, 'in', 25.00, 'out of stock', '2026-04-16 15:33:25'),
(3, 'in', 15.00, 'POS Sale: mantika (x1)', '2026-04-16 16:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(2, 'sting', 25.00, 18, '2026-04-16 15:31:54', '2026-04-16 15:32:14'),
(3, 'piatos', 30.00, 50, '2026-04-16 15:36:29', '2026-04-16 15:36:29'),
(4, 'mantika', 15.00, 49, '2026-04-16 15:37:23', '2026-04-16 16:03:16'),
(5, 'coke', 15.00, 55, '2026-04-16 15:37:52', '2026-04-16 15:37:52'),
(6, 'tanduay dark longnick', 140.00, 24, '2026-04-16 15:39:45', '2026-04-16 15:39:45'),
(7, 'redhorse', 140.00, 25, '2026-04-16 15:40:25', '2026-04-16 15:40:25'),
(8, 'giftwrap', 10.00, 50, '2026-04-16 15:41:04', '2026-04-16 15:41:04'),
(9, 'camel', 12.00, 100, '2026-04-16 15:41:34', '2026-04-16 15:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `quantity`, `total_price`, `created_at`) VALUES
(1, 2, 9, 225.00, '2026-04-16 15:32:14'),
(2, 4, 1, 15.00, '2026-04-16 16:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'rdcess1', 'admin123@gmail.com', '$2y$10$HnxhlRN6IFhs02nCNhyGbOeE.r9yOCPq64DIGdslgE7C7BG93rxMS', '2026-04-16 06:36:04', '2026-04-16 07:04:32'),
(2, 'asasasa', 'admin12345@gmail.com', '$2y$10$N0pSFO3MYH9groDCkE7Na.8LUNlVlVExKvJwpzzx6Wq9taRsHF1Ym', '2026-04-16 07:04:48', '2026-04-16 07:04:48'),
(3, 'melojane', '123456@gmail.com', '$2y$10$YEuBMHIlF3.b8YO6cpjtJOXNzfrYjrV0QJ9eYFJgPiHtp2bvL4H6K', '2026-04-16 07:35:04', '2026-04-16 07:35:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cash_flows`
--
ALTER TABLE `cash_flows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
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
-- AUTO_INCREMENT for table `cash_flows`
--
ALTER TABLE `cash_flows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
