-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 08:31 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restuarentproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `image` text DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` tinytext NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `mobile` int(11) NOT NULL,
  `address` varchar(15) NOT NULL,
  `loc` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `name`, `gender`, `dob`, `email`, `password`, `mobile`, `address`, `loc`, `image`) VALUES
('c-212', 'Montaqim Tanjil', 'Male', '0000-00-00', 'montaqimtanjil@gmail.com', 'tanjil1234', 1829781730, '30/A, Ozyzen, C', 'Chattogram', '24f63a8320a10205144903447344bd61.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `#` int(11) NOT NULL,
  `order_id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`#`, `order_id`, `name`, `number`, `email`, `method`, `city`, `country`, `pin_code`, `total_products`, `total_price`) VALUES
(1, 5, 'Montaqim Tanjil', 1829718301, '0', 'cash on delivery', 'Chattogram', 'Bangladesh', 123456, 'Diet Coke (1) ', 45),
(2, 0, 'Montaqim Tanjil', 1823564789, '0', 'cash on delivery', 'Chattogram', 'Bangladesh', 123456, 'Pizza (2) ', 700),
(3, 0, 'Montaqim Tanjil', 1856478963, '0', 'cash on delivery', 'Chattogram', 'Bangladesh', 123456, 'Hot Dog (3) ', 360);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(3, 'Burger', 75, 'food-1.png'),
(4, 'Pizza', 350, 'food-2.png'),
(5, 'Hot Dog', 120, 'food-3.png'),
(6, 'Sandwitch', 55, 'food-4.png'),
(7, 'Diet Coke', 45, 'food-5.png'),
(8, 'French Fries', 75, 'food-6.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `userid` (`email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD UNIQUE KEY `cus_id` (`cus_id`),
  ADD UNIQUE KEY `cus_id_2` (`cus_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`#`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `#` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
