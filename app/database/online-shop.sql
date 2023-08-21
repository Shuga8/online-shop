-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 04:04 PM
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

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'saintman', 'admin@sainticonicluxury.com', '$2y$10$2YrQdzQsekYwjFgf1X2roOXy1fmXNyq1ZvwmvPp1C9l6DjPD82DmW', 'super-admin', '2023-08-20 16:19:58', '2023-08-20 16:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
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

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `product_image`, `product_name`, `product_price`, `product_quantity`, `product_size`, `product_total`, `created_at`, `updated_at`) VALUES
(9, '109033917743877585563', '169261274464e33888a8890', '1692612744saint.jpg', 'SIL X Louis Vuitton', 25000.00, 2, 'large', 25000, '2023-08-21 11:13:50', '2023-08-21 13:16:44');

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
  `is_featured` varchar(10) NOT NULL DEFAULT 'No',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `product_name`, `product_caption`, `product_image`, `product_price`, `product_discount`, `product_category`, `product_size`, `product_quantity`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, '169188043364d80bf1f1487', 'Mens Ripped Black Jean', 'High quality men\'s jean', '16918804331684795314c74b61053cee77bc44d403daaa939d0c.jpg', 15000.00, 0, 'men', 'large', 50, 'Yes', '2023-08-12 23:47:13', '2023-08-21 15:01:43'),
(2, '169188053064d80c5251ded', 'K.9 High Balance Shoe', 'High Quality Shoe', '169188053016845225343-1-600x600.png', 22300.00, 0, 'unisex', 'large', 10, 'Yes', '2023-08-12 23:48:50', '2023-08-21 14:10:50'),
(3, '169188108564d80e7da6484', 'Women\'s Caves Ripped Jean', 'High quality jean', '169188108516917779471684795683img-20220324-wa0096.jpg', 7000.00, 0, 'women', 'large', 20, 'No', '2023-08-12 23:58:05', '2023-08-12 23:58:05'),
(4, '169188119964d80eefc500a', 'Men\'s Blue Acoustic Jean', 'High quality men\'s jean', '169188119916917775021686915295blue-mens-jeans-denim-pants-orange-background-contrast-satur-saturated-color-fashion-clothing-concept-view-above-109378110.jpg', 8000.00, 0, 'men', 'large', 30, 'Yes', '2023-08-12 23:59:59', '2023-08-21 14:10:58'),
(5, '169188145564d80fef9f81b', 'Children\'s flowery rose gown', 'High quality', '16918814551686915531imgbin-dress-clothing-child-toddler-product-dress-fzeNcnyKykptvxeYwzWyPZK21_t.png', 5000.00, 0, 'children', 'medium', 15, 'No', '2023-08-13 00:04:15', '2023-08-13 00:04:15'),
(6, '169256145264e2702c71766', 'Hot Gray T-Shirt', 'Hot Products', '1692561452b6f8258008e5fad45a6e70918d66b66e.jpg', 5000.00, 0, 'men', 'large', 30, 'Yes', '2023-08-20 20:57:32', '2023-08-21 14:10:42'),
(7, '169261274464e33888a8890', 'SIL X Louis Vuitton', 'High Quality Shoe', '1692619677saint.jpg', 60000.00, 0, 'men', 'large', 40, 'Yes', '2023-08-21 11:12:24', '2023-08-21 14:06:49');

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
(1, '100506710207144320804', 'Patrick', 'Beahm', 'beahmpatrick@gmail.com', 'https://lh3.googleusercontent.com/a/AAcHTtfaTWZaFMHt6rWnWQ9vCc5RFOTYF5K6BL1kZNHplUg_=s96-c', '2023-08-11 19:09:33', '2023-08-11 19:09:33'),
(2, '109033917743877585563', 'charles', 'loto', 'charlesloto98@gmail.com', 'https://lh3.googleusercontent.com/a/AAcHTtci9VAJ2GMOIvNHJK5sThZMS1Moa9PUDLQozduahgo5=s96-c', '2023-08-12 21:55:37', '2023-08-12 21:55:37');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
