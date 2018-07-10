-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2018 at 09:17 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmeasy`
--

-- --------------------------------------------------------

--
-- Table structure for table `pe_user_details`
--

CREATE TABLE IF NOT EXISTS `pe_user_details` (
  `user_id` int(10) unsigned NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_type` enum('patient','doctor','pharmacist') NOT NULL DEFAULT 'patient',
  `created_by` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(10) unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pe_user_details`
--

INSERT INTO `pe_user_details` (`user_id`, `user_name`, `user_email`, `user_password`, `user_type`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'patient1', 'patient1@gmail.com', 'patient1', 'patient', 1, '2018-07-09 19:49:10', 1, '2018-07-09 19:49:10'),
(2, 'patient2', 'patient2@gmail.com', 'patient2', 'patient', 1, '2018-07-09 19:49:10', 1, '2018-07-09 19:49:10'),
(3, 'doctor1', 'doctor1@gmail.com', 'doctor1', 'doctor', 1, '2018-07-09 19:49:53', 1, '2018-07-09 19:49:53'),
(4, 'doctor2', 'doctor2@gmail.com', 'doctor2', 'doctor', 1, '2018-07-09 19:50:20', 1, '2018-07-09 19:50:20'),
(5, 'pharmacist1', 'pharmacist1@gmail.com', 'pharmacist1', 'pharmacist', 1, '2018-07-09 19:51:30', 1, '2018-07-09 19:51:30'),
(6, 'pharmacist2', 'pharmacist2@gmail.com', 'pharmacist2', 'pharmacist', 1, '2018-07-09 19:51:30', 1, '2018-07-09 19:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `pe_user_records`
--

CREATE TABLE IF NOT EXISTS `pe_user_records` (
  `user_record_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `record_type` enum('prescription','report','advice') NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(10) unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pe_user_records`
--

INSERT INTO `pe_user_records` (`user_record_id`, `user_id`, `record_type`, `file_name`, `file_path`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 1, 'prescription', 'Cold and Cough FileName', 'Cold and Cough FilePath', 1, '2018-07-09 19:57:42', 1, '2018-07-09 19:57:42'),
(2, 1, 'report', 'Blood Test report', 'Blood Test Report Path', 1, '2018-07-09 19:57:42', 1, '2018-07-09 19:57:42'),
(3, 1, 'prescription', 'Hair Fall Treatment', 'Hair Fall Treatment FilePath', 1, '2018-07-09 19:59:23', 1, '2018-07-09 19:59:23'),
(4, 1, 'report', 'CBS Test report', 'CBC Report Path', 1, '2018-07-09 19:59:23', 1, '2018-07-09 19:59:23'),
(5, 2, 'prescription', 'Thyroid', 'Thyroid FilePath', 1, '2018-07-09 20:00:39', 1, '2018-07-09 20:00:39'),
(6, 2, 'report', 'Thyroid Test', 'Thyroid Test', 1, '2018-07-09 20:00:39', 1, '2018-07-09 20:00:39'),
(7, 2, 'prescription', 'Ulcer', 'Ulcer FilePath', 1, '2018-07-09 20:01:28', 1, '2018-07-09 20:01:28'),
(8, 2, 'report', 'Salaiva Test', 'Salaiva Test', 1, '2018-07-09 20:01:28', 1, '2018-07-09 20:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `pe_user_requests`
--

CREATE TABLE IF NOT EXISTS `pe_user_requests` (
  `request_id` int(10) unsigned NOT NULL,
  `source_user` int(10) unsigned NOT NULL,
  `for_user` int(10) unsigned NOT NULL,
  `record_id` int(10) unsigned NOT NULL,
  `request_status` enum('pending','approved') NOT NULL DEFAULT 'pending',
  `created_by` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(10) unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pe_user_requests`
--

INSERT INTO `pe_user_requests` (`request_id`, `source_user`, `for_user`, `record_id`, `request_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 3, 1, 3, 'approved', 1, '2018-07-09 20:04:34', 1, '2018-07-09 20:04:34'),
(2, 4, 1, 3, 'pending', 1, '2018-07-09 20:04:34', 1, '2018-07-09 20:04:34'),
(3, 4, 2, 5, 'pending', 1, '2018-07-09 20:04:34', 1, '2018-07-09 20:04:34'),
(4, 6, 2, 8, 'pending', 1, '2018-07-09 20:04:34', 1, '2018-07-09 20:04:34'),
(5, 6, 1, 2, 'approved', 1, '2018-07-09 20:04:34', 1, '2018-07-09 20:04:34'),
(6, 4, 2, 6, 'pending', 1, '2018-07-09 20:05:12', 1, '2018-07-09 20:05:12'),
(7, 3, 2, 7, 'pending', 1, '2018-07-09 20:05:12', 1, '2018-07-09 20:05:12'),
(8, 5, 2, 8, 'pending', 1, '2018-07-09 20:10:03', 1, '2018-07-09 20:10:03'),
(9, 5, 1, 3, 'pending', 1, '2018-07-09 20:10:03', 1, '2018-07-09 20:10:03'),
(10, 5, 1, 2, 'pending', 1, '2018-07-09 20:10:03', 1, '2018-07-09 20:10:03'),
(11, 3, 1, 4, 'pending', 1, '2018-07-09 20:10:03', 1, '2018-07-09 20:10:03'),
(12, 4, 2, 8, 'pending', 1, '2018-07-09 20:10:03', 1, '2018-07-09 20:10:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pe_user_details`
--
ALTER TABLE `pe_user_details`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `pe_user_records`
--
ALTER TABLE `pe_user_records`
  ADD PRIMARY KEY (`user_record_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pe_user_requests`
--
ALTER TABLE `pe_user_requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `record_id` (`record_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pe_user_details`
--
ALTER TABLE `pe_user_details`
  MODIFY `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pe_user_records`
--
ALTER TABLE `pe_user_records`
  MODIFY `user_record_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pe_user_requests`
--
ALTER TABLE `pe_user_requests`
  MODIFY `request_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
