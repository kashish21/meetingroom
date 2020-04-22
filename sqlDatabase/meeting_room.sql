-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2020 at 07:44 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meeting_room`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `user_id` int(11) NOT NULL,
  `role_id` int(100) UNSIGNED NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`user_id`, `role_id`, `username`, `password`, `company`, `email`, `phone`, `active`, `created_on`) VALUES
(1, 1, 'Kashish', '$2y$08$/X5gzWjesYi78GqeAv5tA.dVGBVP7C1e1PzqnYCVe5s1qhlDIPPES', 'Company', 'superadmin@test.com', '7845127845', 1, '2019-08-12 11:09:29'),
(231, 2, 'Kasihsh', '$2a$08$68XjeQf5ut2P2LH32wG61.neqwhOJgRx3lJ3WvzSuRPHJpVag4oae', 'KashishCompany', 'kashish.gautam98@gmail.com', '8920035262', 1, '2020-03-21 04:00:45'),
(232, 5, 'KashishManager01', '$2a$08$eBleacKrQbVSig7gTidY5ODhkGMB8xMsf0q2lMvgohMl/5wmH6hVy', 'TestCompanyKashish', 'kashishmanager01@gmail.com', '9716039234', 1, '2020-04-22 15:57:46'),
(233, 5, 'KashishManager02', '$2a$08$c09TkHsz8Zvup81s8SfSEuyHbAWo07EuhXwgbEGibUh/wlZyPB97y', 'TestCompanyKashish01', 'kashishmanager02@gmail.com', '3456789012', 1, '2020-04-22 15:58:12'),
(234, 5, 'KashishManager03', '$2a$08$cTiJeketec/voEPg0APgQ.YlILJwbr9E92C5dIeJfl/tsSke6Xm.e', 'TestCompanyKashish02', 'kashishmanager03@gmail.com', '7654321234', 1, '2020-04-22 15:58:29'),
(235, 2, 'Kashish Gautam', '$2a$08$lCr28NtsX4JrCJYEmHcAY.sl2FUrWkKFjUcuxAoG0DPj.Zlk08OSO', 'KashishCompany01', 'kashish.gautam@test.com', '1234567890', 1, '2020-04-22 16:22:45'),
(236, 5, 'Manager01', '$2a$08$HHhy.oA7L25fL/oW7E9IBePfG.yshbcmzm0lQDUzvkUHNMzOcFKFe', 'TestCompany01', 'manager01@test.com', '2345678901', 1, '2020-04-22 16:25:04'),
(237, 5, 'Manager02', '$2a$08$BmYowATFHxdNL1CXReEjJORDsncWOfuJK9dz8P0KQ1zOQIjdUKOW.', 'TestCompany01', 'manager02@test.com', '4567890123', 1, '2020-04-22 16:25:38'),
(238, 5, 'Manager03', '$2a$08$B3znua4JBxv8dEHxFomwIeqfzr103HlEHdthEoEuQ6RZ.SbIb3FqW', 'TestCompany03', 'manager03@test.com', '5678901234', 1, '2020-04-22 16:26:01'),
(239, 5, 'Manager04', '$2a$08$cvgOnzCFNC3w1VGJsHjNa.Rhx1nHo1j2o3phNwFzEJXQUJ5EBBch6', 'TestCompany02', 'manager04@test.com', '6789012345', 1, '2020-04-22 16:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `am_pm`
--

CREATE TABLE `am_pm` (
  `id` int(100) NOT NULL,
  `am_pm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `am_pm`
--

INSERT INTO `am_pm` (`id`, `am_pm`) VALUES
(1, 'AM'),
(2, 'PM');

-- --------------------------------------------------------

--
-- Table structure for table `company_name`
--

CREATE TABLE `company_name` (
  `id` int(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_name`
--

INSERT INTO `company_name` (`id`, `company_name`, `admin_id`, `active`, `created_at`, `updated_at`, `location`) VALUES
(1, 'TestCompanyKashish', 231, 1, '2020-04-02 13:11:08', '2020-04-02 13:11:08', 'California'),
(2, 'TestCompanyKashish01', 231, 1, '2020-04-22 15:54:25', '2020-04-22 15:54:25', 'Noida'),
(3, 'TestCompanyKashish02', 231, 1, '2020-04-22 15:54:33', '2020-04-22 15:54:33', 'Gurgaon'),
(4, 'TestCompany01', 235, 1, '2020-04-22 16:23:56', '2020-04-22 16:23:56', 'Mumbai'),
(5, 'TestCompany02', 235, 1, '2020-04-22 16:24:07', '2020-04-22 16:24:07', 'Chennai'),
(6, 'TestCompany03', 235, 1, '2020-04-22 16:24:20', '2020-04-22 16:24:20', 'Banglore');

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE `conference` (
  `id` int(100) NOT NULL,
  `company_id` int(100) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `conference_name` varchar(100) NOT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conference`
--

INSERT INTO `conference` (`id`, `company_id`, `admin_id`, `conference_name`, `active`) VALUES
(1, 1, 231, 'Conference01', 1),
(2, 2, 231, 'Conference02', 1),
(3, 3, 231, 'Conference03', 1),
(4, 4, 235, 'Conference01test', 1),
(5, 5, 235, 'Conference02test', 1),
(6, 6, 235, 'Conference03test', 1),
(7, 4, 235, 'Conference01.1test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `user_id` int(100) NOT NULL,
  `role_id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `company_id` int(100) NOT NULL,
  `phone` bigint(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`user_id`, `role_id`, `username`, `company_id`, `phone`, `email`, `password`, `admin_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 5, 'KashishManager01', 1, 9716039234, 'kashishmanager01@gmail.com', '$2a$08$83aN5NfNxw/W6Q45gnm9NOjv/sIAu37pg74AuWh5zk0R0me6ojvwa', 231, 1, '2020-04-22 15:57:46', '2020-04-22 15:57:46'),
(2, 5, 'KashishManager02', 2, 3456789012, 'kashishmanager02@gmail.com', '$2a$08$A87e/M8xoP0JN/caMvs8ZeAUWuwJGkbMyDr7KJSNrKFKA77/fQ8O6', 231, 1, '2020-04-22 15:58:12', '2020-04-22 15:58:12'),
(3, 5, 'KashishManager03', 3, 7654321234, 'kashishmanager03@gmail.com', '$2a$08$DAWHNCkuYjGGtcOIS.6Eo.jMmySaGC/O0sop80injgkRdklTJbTIW', 231, 1, '2020-04-22 15:58:29', '2020-04-22 15:58:29'),
(4, 5, 'Manager01', 4, 2345678901, 'manager01@test.com', '$2a$08$iYlmpzVQ8Ww9N3lWpSUQROcjyj.DPA1RUtfdgy2lKegRM2Li6pg1u', 235, 1, '2020-04-22 16:25:04', '2020-04-22 16:25:04'),
(5, 5, 'Manager02', 4, 4567890123, 'manager02@test.com', '$2a$08$IgUsJ6DKchBcZXT0gy33m..CXS4FNa8zaAcgPet10MREpxDrTug7u', 235, 1, '2020-04-22 16:25:38', '2020-04-22 16:25:38'),
(6, 5, 'Manager03', 6, 5678901234, 'manager03@test.com', '$2a$08$Am2gMuYSvnXICcQardrXIOOUo.D7YI5FFtCUhvugBV.LoZ4Q1WtM2', 235, 1, '2020-04-22 16:26:01', '2020-04-22 16:26:01'),
(7, 5, 'Manager04', 5, 6789012345, 'manager04@test.com', '$2a$08$U1V3MenreR4VR20qgJKTB.92FH7qgBhwfQOpUoy36NGoFMi5QLo7O', 235, 1, '2020-04-22 16:33:17', '2020-04-22 16:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(100) NOT NULL,
  `company_id` int(100) NOT NULL,
  `conference_id` int(100) NOT NULL,
  `manager` varchar(255) NOT NULL,
  `manager_phone` bigint(100) NOT NULL,
  `meeting_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `am_pm_` varchar(100) NOT NULL,
  `end_time` time NOT NULL,
  `am_pm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`id`, `company_id`, `conference_id`, `manager`, `manager_phone`, `meeting_name`, `date`, `start_time`, `am_pm_`, `end_time`, `am_pm`) VALUES
(1, 4, 4, 'Manager01', 2345678901, 'Meeting01', '2020-04-22', '10:30:00', 'AM', '11:30:00', 'AM'),
(3, 6, 6, 'Manager03', 5678901234, 'Meeting01', '2020-04-23', '10:30:00', 'AM', '11:30:00', 'AM'),
(4, 1, 1, 'KashishManager01', 9716039234, 'Meeting01', '2020-04-22', '10:30:00', 'AM', '11:30:00', 'AM'),
(5, 2, 2, 'KashishManager02', 3456789012, 'Meeting01', '2020-04-22', '10:30:00', 'AM', '11:30:00', 'AM');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Superadmin'),
(2, 'Admin'),
(5, 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_role_id` (`role_id`);

--
-- Indexes for table `am_pm`
--
ALTER TABLE `am_pm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_name`
--
ALTER TABLE `company_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `am_pm`
--
ALTER TABLE `am_pm`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_name`
--
ALTER TABLE `company_name`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `conference`
--
ALTER TABLE `conference`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
