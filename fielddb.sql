-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 06:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fielddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_list`
--

CREATE TABLE `booking_list` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `slot_time` int(11) NOT NULL,
  `slot_date` date NOT NULL,
  `status` enum('pending','confirmed','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_list`
--

INSERT INTO `booking_list` (`id`, `name`, `phone`, `email`, `slot_time`, `slot_date`, `status`) VALUES
(1, 'Farin', 18798789, 'farin@mail.com', 2, '2022-08-24', 'confirmed'),
(3, 'ABESH', 123823, 'abesh@mail.com', 1, '2022-08-24', 'confirmed'),
(23, 'shakti', 34324, 'sakldj@', 2, '2022-08-25', 'confirmed'),
(24, 'ejaz', 23123, 'ej@', 3, '2022-08-26', 'confirmed'),
(25, 'aosaf', 23123, 'as@', 1, '2022-08-27', 'confirmed'),
(26, 'tanni', 23123, 'ta@', 3, '2022-08-29', 'confirmed'),
(27, 'abrarrr', 234214, 'abrar@mail.com', 3, '2022-08-30', 'pending'),
(28, 'abrarrr', 234214, 'abrar@mail.com', 1, '2022-08-26', 'pending'),
(29, 'Sarwar', 91823, 'sarwar@mail.com', 3, '2022-08-24', 'confirmed'),
(30, 'Shakir', 908139028, 'shakir@mail.com', 3, '2022-08-25', 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `field_status`
--

CREATE TABLE `field_status` (
  `id` int(11) NOT NULL,
  `status` enum('closed','open','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `field_status`
--

INSERT INTO `field_status` (`id`, `status`) VALUES
(1, 'closed');

-- --------------------------------------------------------

--
-- Table structure for table `review_list`
--

CREATE TABLE `review_list` (
  `booking_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `review_text` text NOT NULL,
  `status` enum('pending','confirmed','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_list`
--

INSERT INTO `review_list` (`booking_id`, `name`, `review_text`, `status`) VALUES
(1, 'Farin', 'veryy goood', 'confirmed'),
(23, 'Shakti', 'Very nice field 100% recommended. ', 'pending'),
(24, 'ejaz', 'Its alright still needs improving ', 'pending'),
(29, 'sarwar', 'its really fantastic', 'confirmed'),
(30, 'Shakir', 'THe field is amazingg !!!!!', 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `id` int(11) NOT NULL,
  `slot_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `slot_time`) VALUES
(1, '2:00 pm'),
(2, '3:30 pm'),
(3, '5:00 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_list`
--
ALTER TABLE `booking_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slot_time` (`slot_time`,`slot_date`);

--
-- Indexes for table `field_status`
--
ALTER TABLE `field_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_list`
--
ALTER TABLE `review_list`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_list`
--
ALTER TABLE `booking_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `field_status`
--
ALTER TABLE `field_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_list`
--
ALTER TABLE `booking_list`
  ADD CONSTRAINT `booking_list_ibfk_2` FOREIGN KEY (`slot_time`) REFERENCES `slots` (`id`);

--
-- Constraints for table `review_list`
--
ALTER TABLE `review_list`
  ADD CONSTRAINT `review_list_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
