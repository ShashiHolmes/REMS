-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2019 at 05:12 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rems1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `passcode` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_email`, `name`, `contact`, `address`, `passcode`) VALUES
('msshashi21@gmail.com', 'Shashi Kumar', 1234567890, 'NITK', '2k16nitk'),
('sanathramesh55@gmail.com', 'Sanath Ramesh', 2147483647, 'NITK', '2k16nitk');

-- --------------------------------------------------------

--
-- Table structure for table `booking1`
--

CREATE TABLE `booking1` (
  `bid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `b_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking1`
--

INSERT INTO `booking1` (`bid`, `pid`, `b_email`) VALUES
(6, 137, 'email1@gmail.com'),
(7, 136, 'email1@gmail.com'),
(8, 140, 'email@gmail.com'),
(9, 139, 'email@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `booking2`
--

CREATE TABLE `booking2` (
  `pid` int(11) NOT NULL,
  `o_email` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking2`
--

INSERT INTO `booking2` (`pid`, `o_email`, `id`) VALUES
(137, 'email@gmail.com', 6),
(136, 'email@gmail.com', 7),
(140, 'email1@gmail.com', 8),
(139, 'email1@gmail.com', 9);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `trans_ref` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `bid`, `trans_ref`) VALUES
(1, 9, '0'),
(11, 9, 'e00da03b685a0dd18fb6a08af0923de0');

-- --------------------------------------------------------

--
-- Table structure for table `property1`
--

CREATE TABLE `property1` (
  `pid` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property1`
--

INSERT INTO `property1` (`pid`, `email`) VALUES
(139, 'email1@gmail.com'),
(140, 'email1@gmail.com'),
(136, 'email@gmail.com'),
(137, 'email@gmail.com'),
(138, 'email@gmail.com'),
(141, 'email@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `property2`
--

CREATE TABLE `property2` (
  `pid` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `location` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(20) NOT NULL,
  `key_code` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'unsold'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property2`
--

INSERT INTO `property2` (`pid`, `pname`, `location`, `price`, `description`, `image`, `key_code`, `status`) VALUES
(136, 'prop1', 11111, 1111111, 'desc1', 'images (1).jpg', '698d51a19d8a121ce581499d7b701668', 'sold'),
(137, 'prop2', 2222, 222222, 'desc2', 'images.jpg', 'bcbe3365e6ac95ea2c0343a2395834dd', 'sold'),
(138, 'prop3', 333, 333333, 'desc3', 'images (2).jpg', '310dcbbf4cce62f762a2aaa148d556bd', 'unsold'),
(139, 'dgdgdfg', 333, 1, 'dfdsfdf', 'download.jpg', '202cb962ac59075b964b07152d234b70', 'sold'),
(140, 'prop2', 111, 2222, 'desc2', 'images (2).jpg', '202cb962ac59075b964b07152d234b70', 'sold'),
(141, 'iudcusdifgiu', 25345, 5, 'hdgfuydsgfyu', 'download (1).jpg', '03afdbd66e7929b125f8597834fa83a4', 'unsold');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `contact`, `address`) VALUES
('sanath', 'email1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1234567890', 'email@gmail.com'),
('shashi', 'email@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1234567890', 'email@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_email`);

--
-- Indexes for table `booking1`
--
ALTER TABLE `booking1`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `email` (`b_email`);

--
-- Indexes for table `booking2`
--
ALTER TABLE `booking2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`),
  ADD KEY `o_email` (`o_email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD UNIQUE KEY `trans_ref` (`trans_ref`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `property1`
--
ALTER TABLE `property1`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `property2`
--
ALTER TABLE `property2`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking1`
--
ALTER TABLE `booking1`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `booking2`
--
ALTER TABLE `booking2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `property1`
--
ALTER TABLE `property1`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `property2`
--
ALTER TABLE `property2`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking1`
--
ALTER TABLE `booking1`
  ADD CONSTRAINT `booking1_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `property2` (`pid`),
  ADD CONSTRAINT `booking1_ibfk_2` FOREIGN KEY (`b_email`) REFERENCES `users` (`email`);

--
-- Constraints for table `booking2`
--
ALTER TABLE `booking2`
  ADD CONSTRAINT `booking2_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `property2` (`pid`),
  ADD CONSTRAINT `booking2_ibfk_2` FOREIGN KEY (`o_email`) REFERENCES `users` (`email`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `booking1` (`bid`);

--
-- Constraints for table `property1`
--
ALTER TABLE `property1`
  ADD CONSTRAINT `property1_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
