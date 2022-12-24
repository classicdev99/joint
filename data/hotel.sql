-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2022 at 09:27 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(12) NOT NULL,
  `hotel_location_id` int(12) NOT NULL,
  `building_id` int(12) NOT NULL,
  `customer_name` varchar(220) NOT NULL,
  `checkin` timestamp NULL DEFAULT NULL,
  `checkout` timestamp NULL DEFAULT NULL,
  `persons` int(12) NOT NULL,
  `room_id` int(12) DEFAULT NULL,
  `cleaner_id` int(12) DEFAULT NULL,
  `maintenancer_id` int(12) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `hotel_location_id`, `building_id`, `customer_name`, `checkin`, `checkout`, `persons`, `room_id`, `cleaner_id`, `maintenancer_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Nadeem', '2022-05-07 09:47:00', '2022-05-07 01:03:28', 2, 1, 3, 4, '2022-05-06 09:47:57', '2022-05-06 09:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `booking_history`
--

CREATE TABLE `booking_history` (
  `id` int(12) NOT NULL,
  `hotel_location_id` int(12) NOT NULL,
  `building_id` int(12) NOT NULL,
  `customer_name` varchar(220) NOT NULL,
  `checkin` timestamp NULL DEFAULT NULL,
  `checkout` timestamp NULL DEFAULT NULL,
  `persons` int(12) NOT NULL,
  `room_id` int(12) DEFAULT NULL,
  `cleaner_id` int(12) DEFAULT NULL,
  `amount` varchar(22) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_history`
--

INSERT INTO `booking_history` (`id`, `hotel_location_id`, `building_id`, `customer_name`, `checkin`, `checkout`, `persons`, `room_id`, `cleaner_id`, `amount`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'Nadeem', '2022-05-07 09:47:00', '2022-05-07 01:01:00', 2, 1, NULL, NULL, '2022-05-06 12:33:28', '2022-05-06 12:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` int(12) NOT NULL,
  `hotel_location_id` int(12) NOT NULL,
  `building_name` varchar(220) NOT NULL,
  `floors` int(12) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `hotel_location_id`, `building_name`, `floors`, `created_at`, `updated_at`) VALUES
(1, 1, 'testing building', 5, '2022-05-05 03:45:28', '2022-05-05 10:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `cleaners`
--

CREATE TABLE `cleaners` (
  `id` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `phone_no` varchar(30) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cleaners`
--

INSERT INTO `cleaners` (`id`, `name`, `email`, `phone_no`, `password`, `created_at`) VALUES
(3, 'cleaner', 'cleaner@gmail.com', '03464323220', '$2y$10$u9T/gDbeNnGsFGKxR78T5.XwrK9RNE38PZhGfCR3UJaDxRWTaL2FO', '2022-05-05 12:06:49'),
(4, 'nadeemaslam', 'nadeemaslam0129@gmail.com', '03464323220', '$2y$10$Chb/yeXj8SAN/B/zHK/x8ujFlPKAnc3/f8e0jjN/0Xk1avuIXTxQS', '2022-05-06 09:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `cleaner_room_update`
--

CREATE TABLE `cleaner_room_update` (
  `id` int(11) NOT NULL,
  `cleaner_id` int(12) DEFAULT NULL,
  `room_id` int(12) DEFAULT NULL,
  `remarks` varchar(12000) DEFAULT NULL,
  `image` varchar(220) DEFAULT NULL,
  `status` varchar(22) DEFAULT NULL,
  `image_path` varchar(220) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cleaner_room_update`
--

INSERT INTO `cleaner_room_update` (`id`, `cleaner_id`, `room_id`, `remarks`, `image`, `status`, `image_path`, `created_at`) VALUES
(8, 4, 1, '', '1651863919.jpg', 'recieved', '/uploads/1651863919.jpg', '2022-05-06 18:23:45'),
(9, 3, 1, 'done', '1651863208.jpg', NULL, '/uploads/1651863208.jpg', '2022-05-06 18:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `customer_service`
--

CREATE TABLE `customer_service` (
  `id` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `phone_no` varchar(30) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_service`
--

INSERT INTO `customer_service` (`id`, `name`, `email`, `phone_no`, `password`, `created_at`) VALUES
(5, 'test', 'test@gmail.com', '03464323220', '$2y$10$KHvjnN7pT8f2Q3ltQ9YlCOKA1u48nB9IDr5GaqV4TCfXpseFQ938C', '2022-05-06 09:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(12) NOT NULL,
  `hotel` varchar(220) NOT NULL,
  `state` varchar(33) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `hotel`, `state`, `created_at`, `updated_at`) VALUES
(1, 'test', 'state test', '2022-05-05 10:45:11', '2022-05-05 10:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `maintenancer`
--

CREATE TABLE `maintenancer` (
  `id` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `phone_no` varchar(30) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenancer`
--

INSERT INTO `maintenancer` (`id`, `name`, `email`, `phone_no`, `password`, `created_at`) VALUES
(4, 'maintenancer', 'maintenancer@gmail.com', '03464323220', '$2y$10$wD7cur53qj2r60kOlihhTe7/7C80uNoCYoRN6mMhm2T.avDAdkdgi', '2022-05-06 09:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_room_update`
--

CREATE TABLE `maintenance_room_update` (
  `id` int(11) NOT NULL,
  `maintenancer_id` int(12) DEFAULT NULL,
  `room_id` int(12) DEFAULT NULL,
  `remarks` varchar(12000) DEFAULT NULL,
  `status` varchar(22) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenance_room_update`
--

INSERT INTO `maintenance_room_update` (`id`, `maintenancer_id`, `room_id`, `remarks`, `status`, `created_at`) VALUES
(4, 4, 1, 'done', 'recieved', '2022-05-06 19:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(12) NOT NULL,
  `room_no` int(12) NOT NULL,
  `floor_no` int(12) NOT NULL,
  `building_id` int(12) NOT NULL,
  `status` varchar(33) NOT NULL DEFAULT 'Available',
  `price` varchar(55) DEFAULT NULL,
  `remarks` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_no`, `floor_no`, `building_id`, `status`, `price`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 'Cleaning', '800', '', '2022-05-05 10:45:51', '2022-05-05 10:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `test_migrations`
--

CREATE TABLE `test_migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `test_students`
--

CREATE TABLE `test_students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isLoggedIn` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(22) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `isLoggedIn`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@gmail.com', NULL, '$2y$10$LfGwWDuXgG20Gz3C4EQkaeId7xY08TvqoWNziQYzhYpLmTel.kIJi', NULL, 'admin', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_history`
--
ALTER TABLE `booking_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cleaners`
--
ALTER TABLE `cleaners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cleaner_room_update`
--
ALTER TABLE `cleaner_room_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_service`
--
ALTER TABLE `customer_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenancer`
--
ALTER TABLE `maintenancer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_room_update`
--
ALTER TABLE `maintenance_room_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_migrations`
--
ALTER TABLE `test_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_students`
--
ALTER TABLE `test_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking_history`
--
ALTER TABLE `booking_history`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cleaners`
--
ALTER TABLE `cleaners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cleaner_room_update`
--
ALTER TABLE `cleaner_room_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_service`
--
ALTER TABLE `customer_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `maintenancer`
--
ALTER TABLE `maintenancer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `maintenance_room_update`
--
ALTER TABLE `maintenance_room_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_migrations`
--
ALTER TABLE `test_migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_students`
--
ALTER TABLE `test_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
