-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 11:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mgarden`
--

-- --------------------------------------------------------

--
-- Table structure for table `cottages`
--

CREATE TABLE `cottages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `priceDay` double DEFAULT NULL,
  `priceNight` double DEFAULT NULL,
  `pricePackage` double DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cottages`
--

INSERT INTO `cottages` (`id`, `name`, `type`, `priceDay`, `priceNight`, `pricePackage`, `picture`, `created_at`) VALUES
(104, '1', 'NIPA', 1500, 2500, 4000, 'img/65e8392d2ebd3.jpg', '2024-03-06 17:36:45'),
(105, '2', 'NIPA', 1500, 2500, 4000, 'img/65e83959ec0a1.jpg', '2024-03-06 17:37:29'),
(106, '3', 'NIPA', 1500, 2500, 4000, 'img/65e839741e7dc.jpg', '2024-03-06 17:37:56'),
(107, '4', 'NIPA', 1500, 2500, 4000, 'img/65e839a3afbbe.jpg', '2024-03-06 17:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `address`, `phone`, `created_at`) VALUES
(1, 'John Paul Delayola Bayoneto', 'Sitio Bagong Sikat, Barangay Uno', '09560562135', '2024-02-29 21:47:24'),
(2, 'Nicole Gonzales', 'Binubusan', '12345566111', '2024-03-01 00:12:46'),
(3, 'Neil Feest', 'Fort Chaz', '+63 963-846-6564', '2022-03-05 04:03:13'),
(4, 'Dr. Tommie Emard', 'Bradtkeborough', '+63 955-660-4275', '0000-00-00 00:00:00'),
(5, 'Wilfred Kulas', 'East Keyonfurt', '+63 950-258-1492', '2023-03-06 07:03:13'),
(6, 'Bobbie Yost', 'Davenport', '+63 949-214-7947', '0000-00-00 00:00:00'),
(7, 'Hubert Donnelly', 'South Syble', '+63 942-163-8261', '0000-00-00 00:00:00'),
(8, 'Ms. Angela Kilback', 'Port Durwardfort', '+63 959-159-1630', '0000-00-00 00:00:00'),
(9, 'Betty Marks', 'North Antonettaborough', '+63 929-309-7713', '0000-00-00 00:00:00'),
(10, 'Olivia Kemmer', 'South Jalynburgh', '+63 996-985-4846', '0000-00-00 00:00:00'),
(11, 'Robin Moore', 'New Ezekielfield', '+63 951-551-2268', '0000-00-00 00:00:00'),
(12, 'Pearl Grimes', 'Goodwinview', '+63 994-462-3367', '2022-06-04 04:06:44'),
(13, 'Clark Shanahan', 'East Abe', '+63 900-741-6092', '2024-06-03 08:06:04'),
(14, 'Ethel Buckridge', 'Port Zachariah', '+63 955-088-8760', '0000-00-00 00:00:00'),
(15, 'Drew O\'Hara', 'Port Valentine', '+63 983-424-0104', '0000-00-00 00:00:00'),
(16, 'Melvin Grant', 'West Joy', '+63 918-419-9670', '0000-00-00 00:00:00'),
(17, 'Clay Heller', 'Runolfssonfurt', '+63 968-526-8707', '0000-00-00 00:00:00'),
(18, 'Rosalie Kunde', 'Fort Aubree', '+63 955-972-6314', '0000-00-00 00:00:00'),
(19, 'Ricardo Klein', 'Hellenstad', '+63 930-579-3051', '0000-00-00 00:00:00'),
(20, 'Ron Dibbert', 'Oro Valley', '+63 904-855-8417', '2022-04-01 12:04:12'),
(21, 'Jana Orn', 'Carliefield', '+63 924-477-0176', '0000-00-00 00:00:00'),
(22, 'Cheryl Tillman', 'Shanahanfield', '+63 992-725-1473', '0000-00-00 00:00:00'),
(23, 'Marcia Price', 'Bradenton', '+63 982-759-1481', '2020-11-06 08:11:51'),
(24, 'Daryl Erdman', 'Langworthton', '+63 981-634-9889', '0000-00-00 00:00:00'),
(25, 'Benjamin Johnson', 'New Eleazar', '+63 930-061-4292', '0000-00-00 00:00:00'),
(26, 'Juana Renner I', 'Jaydonhaven', '+63 950-094-7043', '0000-00-00 00:00:00'),
(27, 'Dr. Juana Smitham MD', 'Wyoming', '+63 981-066-6318', '2021-12-06 08:12:27'),
(28, 'Sandy Mertz', 'Jerdetown', '+63 963-295-5765', '2018-10-05 02:10:45'),
(29, 'Bethany Bahringer', 'New Cliffordville', '+63 910-482-5347', '0000-00-00 00:00:00'),
(30, 'Rachael O\'Conner', 'Emmahaven', '+63 983-279-8130', '0000-00-00 00:00:00'),
(31, 'Bert Fisher', 'Shanaboro', '+63 911-234-0215', '2020-10-02 05:10:42'),
(32, 'Dr. Otis Lemke I', 'Franzchester', '+63 968-520-1082', '0000-00-00 00:00:00'),
(33, 'Marta Gerhold', 'North Queenietown', '+63 923-197-4024', '0000-00-00 00:00:00'),
(34, 'Mr. Albert Monahan', 'Terryside', '+63 974-415-2514', '0000-00-00 00:00:00'),
(35, 'Antonia Feest', 'Joelleport', '+63 939-527-7811', '0000-00-00 00:00:00'),
(36, 'Bennie Rohan', 'Gavintown', '+63 975-792-9522', '2021-08-04 03:08:33'),
(37, 'Monica Bednar MD', 'West Lexieshire', '+63 989-841-9638', '0000-00-00 00:00:00'),
(38, 'Shelley Lemke', 'Port Tobyborough', '+63 981-166-8124', '0000-00-00 00:00:00'),
(39, 'Joann Kunde III', 'West Myrtie', '+63 915-165-4853', '2021-02-02 09:02:09'),
(40, 'Lynn Zieme', 'West Howard', '+63 940-667-8881', '0000-00-00 00:00:00'),
(41, 'Ira Ferry', 'Valdosta', '+63 905-699-8058', '0000-00-00 00:00:00'),
(42, 'Miss Roxanne Dickens', 'Deontechester', '+63 966-715-3231', '2019-03-05 12:03:45'),
(43, 'Kimberly Gleason DDS', 'Conroe', '+63 929-073-4443', '2023-09-02 09:09:26'),
(44, 'Priscilla Beatty', 'North Jefferychester', '+63 923-444-7582', '2023-03-02 07:03:47'),
(45, 'Amber Bechtelar', 'South Marianafurt', '+63 941-869-4141', '0000-00-00 00:00:00'),
(46, 'Daniel Ullrich', 'Joplin', '+63 918-715-6874', '0000-00-00 00:00:00'),
(47, 'Erik Pacocha', 'Vadaworth', '+63 958-412-4274', '0000-00-00 00:00:00'),
(48, 'Mrs. Dorothy Kuhlman', 'East Obie', '+63 940-778-1137', '0000-00-00 00:00:00'),
(49, 'Kevin Runolfsdottir-Emmerich', 'West Marcus', '+63 957-719-1468', '0000-00-00 00:00:00'),
(50, 'Isaac Larson', 'Margotshire', '+63 932-309-4220', '0000-00-00 00:00:00'),
(51, 'Israel Lakin', 'Port Myra', '+63 902-826-9301', '0000-00-00 00:00:00'),
(52, 'Wayne Nader I', 'Ullrichburgh', '+63 999-909-2636', '2018-07-01 09:07:49'),
(53, 'Dr. Patty Weissnat', 'North Alec', '+63 907-456-2661', '0000-00-00 00:00:00'),
(54, 'Cristina Simonis', 'Lake Andresstad', '+63 950-110-2322', '0000-00-00 00:00:00'),
(55, 'Dexter Moen', 'North Samantaport', '+63 963-304-9241', '0000-00-00 00:00:00'),
(56, 'Sophie Kuhic-Hauck', 'Port Lonzostead', '+63 987-284-5829', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `logs` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `logs`, `type`, `created_at`) VALUES
(1, 'bayoneto has logged out', 'Logout', '2024-02-29 20:47:38'),
(2, 'admin| Logged in', 'Login', '2024-02-29 20:47:45'),
(3, 'John Paul Delayola Bayoneto| New Customer was added', 'Adding Customer', '2024-02-29 21:47:24'),
(4, '| New user was added', 'Adding user', '2024-02-29 21:56:30'),
(5, '1| New cottage was added', 'Adding cottage', '2024-02-29 23:41:53'),
(6, '1 was removed', 'Removing cottage', '2024-02-29 23:42:45'),
(7, '1| New cottage was added', 'Adding cottage', '2024-02-29 23:43:02'),
(8, '1 was removed', 'Removing cottage', '2024-02-29 23:44:26'),
(9, '1| New cottage was added', 'Adding cottage', '2024-02-29 23:49:28'),
(10, 'John Paul Delayola Bayoneto | New transaction was added', 'Adding Transaction', '2024-02-29 23:51:41'),
(11, 'John Paul Delayola Bayoneto | New transaction was added', 'Adding Transaction', '2024-03-01 00:11:13'),
(12, 'Nicole Gonzales| New Customer was added', 'Adding Customer', '2024-03-01 00:12:46'),
(13, 'Transaction was cancel', 'Cancel Transaction', '2024-03-01 00:13:47'),
(14, 'Nicole Gonzales | New transaction was added', 'Adding Transaction', '2024-03-01 00:13:51'),
(15, 'admin has logged out', 'Logout', '2024-03-02 09:22:13'),
(16, 'admin| Logged in', 'Login', '2024-03-02 09:22:15'),
(17, 'admin has logged out', 'Logout', '2024-03-02 09:22:58'),
(18, 'paul| Logged in', 'Login', '2024-03-02 09:23:02'),
(19, 'Transaction was cancel', 'Cancel Transaction', '2024-03-03 22:09:09'),
(20, 'John Paul Delayola Bayoneto | New transaction was added', 'Adding Transaction', '2024-03-03 22:09:16'),
(21, '1', 'Add Cottage', '2024-03-03 22:12:53'),
(22, 'John Paul Delayola Bayoneto | New transaction was added', 'Adding Transaction', '2024-03-03 22:13:42'),
(23, 'Transaction ID:4| Transaction has been marked as Paid', 'Mark Paid', '2024-03-03 22:13:52'),
(24, 'Transaction was cancel', 'Cancel Transaction', '2024-03-03 22:18:08'),
(25, 'Nicole Gonzales | New transaction was added', 'Adding Transaction', '2024-03-03 22:18:13'),
(26, '1', 'Add Cottage', '2024-03-03 22:18:30'),
(27, 'rental was updated', 'Updating rentals', '2024-03-03 22:18:34'),
(28, 'Transaction ID:6| Transaction has been marked as Paid', 'Mark Paid', '2024-03-03 22:19:05'),
(29, 'admin| Logged in', 'Login', '2024-03-03 22:27:36'),
(30, 'admin has logged out', 'Logout', '2024-03-03 22:28:52'),
(31, 'paul| Logged in', 'Login', '2024-03-03 22:28:53'),
(32, 'admin has logged out', 'Logout', '2024-03-03 22:29:07'),
(33, 'paul| Logged in', 'Login', '2024-03-03 22:36:08'),
(34, 'paul has logged out', 'Logout', '2024-03-03 22:45:15'),
(35, 'paul| Logged in', 'Login', '2024-03-03 22:45:16'),
(36, 'paul| Logged in', 'Login', '2024-03-03 22:46:08'),
(37, 'paul has logged out', 'Logout', '2024-03-03 22:46:39'),
(38, 'admin| Logged in', 'Login', '2024-03-03 22:46:47'),
(39, 'admin| Logged in', 'Login', '2024-03-03 22:50:33'),
(40, 'admin| Logged in', 'Login', '2024-03-03 22:54:56'),
(41, 'paul has logged out', 'Logout', '2024-03-04 22:45:09'),
(42, 'admin| Logged in', 'Login', '2024-03-04 22:45:16'),
(43, 'admin| Logged in', 'Login', '2024-03-04 22:47:43'),
(44, 'admin| Logged in', 'Login', '2024-03-05 07:38:58'),
(45, 'paul| Logged in', 'Login', '2024-03-05 08:05:07'),
(46, 'admin| Logged in', 'Login', '2024-03-05 08:23:26'),
(47, 'admin has logged out', 'Logout', '2024-03-05 08:23:39'),
(48, 'paul| Logged in', 'Login', '2024-03-05 08:23:53'),
(49, 'admin| Logged in', 'Login', '2024-03-05 08:32:27'),
(50, 'paul| Logged in', 'Login', '2024-03-05 09:44:11'),
(51, 'paul has logged out', 'Logout', '2024-03-05 21:58:30'),
(52, 'admin| Logged in', 'Login', '2024-03-05 21:58:39'),
(53, 'admin| Logged in', 'Login', '2024-03-05 22:00:13'),
(54, 'admin| Logged in', 'Login', '2024-03-05 22:21:22'),
(55, 'Amber Bechtelar | New transaction was added', 'Adding Transaction', '2024-03-05 22:22:01'),
(56, 'admin| Logged in', 'Login', '2024-03-05 22:23:24'),
(57, '1 was removed', 'Removing cottage', '2024-03-06 17:33:52'),
(58, '1| New cottage was added', 'Adding cottage', '2024-03-06 17:36:45'),
(59, '2| New cottage was added', 'Adding cottage', '2024-03-06 17:37:29'),
(60, '3| New cottage was added', 'Adding cottage', '2024-03-06 17:37:56'),
(61, '4| New cottage was added', 'Adding cottage', '2024-03-06 17:38:43'),
(62, 'John Paul Delayola Bayoneto | New transaction was added', 'Adding Transaction', '2024-03-06 17:50:34');

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` int(11) NOT NULL,
  `cottage_id` int(11) DEFAULT NULL,
  `transact_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `start_datetime` date DEFAULT NULL,
  `end_datetime` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `customer_id`, `user_id`, `status`, `payment_status`, `created_at`) VALUES
(8, 1, 1, 'Pending', NULL, '2024-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `phone`, `address`, `type`, `created_at`) VALUES
(1, 'admin', '$2y$10$WgL2d2fzi6IiGiTfXvdBluTLlMroU8zBtIcRut7SzOB6j9i/LbA4K', '000000000', 'administrator', 'admin', '2024-02-29 20:47:25'),
(2, 'paul', '$2y$10$rpB7ZxyEZvfft8MJRnulMetp8iDuYqAnGaxECnK.NAg3zOp3dPpVy', '09560562135', 'Dine daw sa sulok, Bucana, Nasugbu', 'staff', '2024-02-29 21:56:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cottages`
--
ALTER TABLE `cottages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_ibfk_1` (`cottage_id`),
  ADD KEY `rentals_ibfk_2` (`transact_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cottages`
--
ALTER TABLE `cottages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_ibfk_1` FOREIGN KEY (`cottage_id`) REFERENCES `cottages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rentals_ibfk_2` FOREIGN KEY (`transact_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
