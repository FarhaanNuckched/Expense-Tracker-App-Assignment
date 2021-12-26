-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2021 at 02:01 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expensetracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activity_id` int(16) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `amount` decimal(16,0) NOT NULL,
  `user_id` int(16) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `date`, `type`, `amount`, `user_id`, `category`) VALUES
(0, '2021-12-15', 'expense', '59', 1, 'Food'),
(1, '2021-12-15', 'expense', '360', 1, 'Food'),
(3, '2021-12-15', 'expense', '23', 1, 'Food'),
(4, '2021-12-16', 'income', '46', 1, 'Food'),
(5, '2021-12-16', 'income', '1500', 1, 'Food'),
(6, '2021-12-16', 'expense', '78', 1, 'Food'),
(7, '2021-12-16', 'expense', '68', 1, 'Clothing'),
(8, '2021-12-16', 'expense', '0', 1, 'Food'),
(9, '2021-12-16', 'expense', '96', 1, 'Rent'),
(10, '2021-12-17', 'expense', '322', 1, 'Miscellaneous'),
(11, '2021-12-19', 'expense', '9728', 1, 'Food'),
(12, '2021-12-19', '', '7741', 1, 'Clothing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
