-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 11:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `housing`
--

-- --------------------------------------------------------

--
-- Table structure for table `residence_application`
--

CREATE TABLE `residence_application` (
  `application_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_residence_name` varchar(255) NOT NULL,
  `first_room_number` varchar(50) DEFAULT NULL,
  `first_status` varchar(50) DEFAULT NULL,
  `second_residence_name` varchar(255) NOT NULL,
  `second_room_number` varchar(50) DEFAULT NULL,
  `second_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `update_information`
--

CREATE TABLE `update_information` (
  `update_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `student_number` varchar(50) NOT NULL,
  `degree_code` varchar(50) NOT NULL,
  `year_of_study` varchar(50) DEFAULT NULL,
  `level_of_study` varchar(50) DEFAULT NULL,
  `bursary` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `disability` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username_email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `residence_application`
--
ALTER TABLE `residence_application`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `update_information`
--
ALTER TABLE `update_information`
  ADD PRIMARY KEY (`update_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `residence_application`
--
ALTER TABLE `residence_application`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `update_information`
--
ALTER TABLE `update_information`
  MODIFY `update_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `residence_application`
--
ALTER TABLE `residence_application`
  ADD CONSTRAINT `residence_application_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `update_information`
--
ALTER TABLE `update_information`
  ADD CONSTRAINT `update_information_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
