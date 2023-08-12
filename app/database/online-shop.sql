-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 03:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` longtext NOT NULL,
  `role` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_quantity` int(20) NOT NULL,
  `product_size` varchar(20) NOT NULL,
  `product_total` int(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_image`, `product_name`, `product_price`, `product_quantity`, `product_size`, `product_total`, `created_at`, `updated_at`) VALUES
(1, '100506710207144320804', '16917775021686915295blue-mens-jeans-denim-pants-orange-background-contrast-satur-saturated-color-fashion-clothing-concept-view-above-109378110.jpg', 'Mens Jean', 12000.00, 2, 'medium', 12000, '2023-08-11 19:13:54', '2023-08-11 20:38:08'),
(2, '100506710207144320804', '16917779471684795683img-20220324-wa0096.jpg', 'Women\'s High Quality Jean', 5000.00, 6, 'medium', 5000, '2023-08-11 19:21:19', '2023-08-11 20:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_caption` varchar(100) NOT NULL,
  `product_image` longtext NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_discount` int(10) NOT NULL,
  `product_category` varchar(10) NOT NULL,
  `product_size` varchar(10) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `product_name`, `product_caption`, `product_image`, `product_price`, `product_discount`, `product_category`, `product_size`, `product_quantity`, `created_at`, `updated_at`) VALUES
(1, '169177750264d679de256b9Mens Jean', 'Mens Jean', 'High quality', '16917775021686915295blue-mens-jeans-denim-pants-orange-background-contrast-satur-saturated-color-fashion-clothing-concept-view-above-109378110.jpg', 12000.00, 0, 'men', 'medium', 30, '', '2023-08-11 19:11:42'),
(2, '169177794764d67b9b36863Women\'s High Quality Jean', 'Women\'s High Quality Jean', 'High quality jean', '16917779471684795683img-20220324-wa0096.jpg', 5000.00, 0, 'unisex', 'medium', 60, '', '2023-08-11 19:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_image` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `firstname`, `lastname`, `email`, `user_image`, `created_at`, `updated_at`) VALUES
(1, '100506710207144320804', 'Patrick', 'Beahm', 'beahmpatrick@gmail.com', 'https://lh3.googleusercontent.com/a/AAcHTtfaTWZaFMHt6rWnWQ9vCc5RFOTYF5K6BL1kZNHplUg_=s96-c', '2023-08-11 19:09:33', '2023-08-11 19:09:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
