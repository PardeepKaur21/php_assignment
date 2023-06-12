-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 07:20 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_hours`
--

CREATE TABLE `employee_hours` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `hours` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_hours`
--

INSERT INTO `employee_hours` (`id`, `first_name`, `last_name`, `email`, `employee_id`, `department`, `date`, `hours`) VALUES
(1, 'Mohan', 'Gupta', 'rochak.jaitly@gmail.com', 'mm12', 'HR', '2023-06-16', '12'),
(2, 'Mohan', 'Gupta', 'rochak.jaitly@gmail.com', 'mm12', 'HR', '2023-06-12', '11'),
(3, 'Mohan', 'Gupta', 'rochak.jaitly@gmail.com', 'mm12', 'HR', '2023-06-18', '10'),
(4, 'Rochak', 'jaitly', 'rochak.jaitly@gmail.com', 'Rm12', 'HR', '2023-06-20', '11'),
(5, 'Sohan', 'kumar', 'sonu@gmail.com', 'Mm23', 'Management', '2023-06-07', '10'),
(6, 'Pardeep', 'Kaur', 'pardeep@gmail.com', 'pk12', 'Management', '2023-06-06', '8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_hours`
--
ALTER TABLE `employee_hours`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_hours`
--
ALTER TABLE `employee_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
