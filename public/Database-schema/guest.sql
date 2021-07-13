-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 11:11 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guest`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `booking_id` int(200) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `total_price` int(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Live'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `email`, `booking_id`, `from_date`, `to_date`, `total_price`, `status`) VALUES
(1, 'test@gmail.com', 8, '2021-07-12', '2021-07-23', 11000, 'Live'),
(2, 'test@gmail.com', 12, '2021-07-13', '2021-08-07', 18750, 'Live');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` int(250) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `password`) VALUES
(1, 'jegadesh', 'jegamech666@gmail.com', 1234567890, '$2y$10$Z7Rx0J0VBlE/h9HbeFhOz.Zt30WUquGZPpoT.vgXfH1c2aFgTOxna'),
(2, 'kumar', 'test@gmail.com', 1234567890, '$2y$10$4YVEeapZUnmNuW8moTb5dOqqp.S1p.Lo9WqvTwwFy2yOxaLTPqbc.'),
(3, 'selvi', 'selvi@gmail.com', 1234567890, '$2y$10$pS9fkmAIxi1E7ykUgMscxu62JTesc/Fz7GOjhWhDeLq3EnLT092Vq'),
(4, 'vaishnavi', 'vaishnavi@gmail.com', 1234567890, '$2y$10$AWTaOsaQkqykqc1Mq5FsBuuEpdphwSMLSThrc88BAMtiqPx7ankkG');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `room` int(250) NOT NULL,
  `min_booking` int(250) NOT NULL,
  `max_booking` int(250) NOT NULL,
  `floor` varchar(200) NOT NULL,
  `bhk` int(200) NOT NULL,
  `wifi` varchar(200) NOT NULL,
  `roomsfor` varchar(250) NOT NULL,
  `price` int(250) NOT NULL,
  `image_path` varchar(500) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `email`, `name`, `location`, `room`, `min_booking`, `max_booking`, `floor`, `bhk`, `wifi`, `roomsfor`, `price`, `image_path`, `status`) VALUES
(8, 'test@gmail.com', 'jk house', 'chennai', 201, 5, 23, 'Ground', 1, 'Available', 'Family', 1000, '2-1626015108.jpg', 'Booked'),
(9, 'test@gmail.com', 'Hitech pg', 'coimbatore', 120, 1, 23, '3', 2, 'Not-Available', 'Family', 800, '2-1626015171.jpg', 'Available'),
(10, 'selvi@gmail.com', 'test house', 'tirupur', 56, 1, 10, '1', 2, 'Available', 'Male', 500, '3-1626064770.jpg', 'Available'),
(11, 'vaishnavi@gmail.com', 'Vaishnavi house', 'Erode', 701, 1, 30, 'Ground', 1, 'Available', 'Female', 550, '4-1626073840.jpg', 'Available'),
(12, 'jegamech666@gmail.com', 'passion city', 'Hydrabhad', 23, 15, 60, '5', 1, 'Available', 'Family', 750, '1-1626074419.jpg', 'Booked'),
(13, 'test@gmail.com', 'Hitech villa', 'Chennai', 180, 10, 60, '5', 2, 'Available', 'Family', 350, '2-1626163066.jpg', 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `booking_id` (`booking_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
