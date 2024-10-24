-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2024 at 02:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gosportrent`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Bola'),
(2, 'Raket'),
(3, 'Olahraga Tennis');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-10-22-101247', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1729750855, 1),
(2, '2024-10-22-101319', 'App\\Database\\Migrations\\CreateCategoriesTable', 'default', 'App', 1729750855, 1),
(3, '2024-10-22-101337', 'App\\Database\\Migrations\\CreateUnitsTable', 'default', 'App', 1729750855, 1),
(4, '2024-10-22-101338', 'App\\Database\\Migrations\\CreateUnitCategoriesTable', 'default', 'App', 1729750856, 1),
(5, '2024-10-22-101346', 'App\\Database\\Migrations\\CreateRentalsTable', 'default', 'App', 1729750856, 1),
(6, '2024-10-22-121421', 'App\\Database\\Migrations\\CreatePoliciesTable', 'default', 'App', 1729750856, 1);

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` int(11) UNSIGNED NOT NULL,
  `max_rental_days` int(11) NOT NULL DEFAULT 5,
  `overdue_fee_per_day` decimal(15,0) NOT NULL DEFAULT 50
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `max_rental_days`, `overdue_fee_per_day`) VALUES
(1, 5, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `rental_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `days_rented` int(11) NOT NULL DEFAULT 0,
  `cost` decimal(15,0) DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 1,
  `status_rent` enum('waiting_approval','rented','waiting_return','returned','rejected') NOT NULL DEFAULT 'waiting_approval',
  `status_paid` enum('unpaid','paid','fee','refunded') NOT NULL DEFAULT 'unpaid',
  `approved_rent_by` int(10) UNSIGNED DEFAULT NULL,
  `approved_return_by` int(10) UNSIGNED DEFAULT NULL,
  `rejected_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `user_id`, `unit_id`, `rental_date`, `return_date`, `days_rented`, `cost`, `amount`, `status_rent`, `status_paid`, `approved_rent_by`, `approved_return_by`, `rejected_by`) VALUES
(5, 2, 5, '0000-00-00', NULL, 30, 1, 1, 'waiting_approval', 'unpaid', NULL, NULL, NULL),
(6, 2, 6, '0000-00-00', NULL, 1, 1, 1, 'waiting_approval', 'unpaid', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `unit_code` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `cost_rent_per_day` decimal(15,0) NOT NULL DEFAULT 0,
  `cost_rent_per_month` decimal(15,0) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `unit_code`, `stock`, `cost_rent_per_day`, `cost_rent_per_month`, `image`) VALUES
(5, 'Tas', '686a', 1, 1, 1, '1729754517_dc8c95916f06aaa8f005.jpg'),
(6, 'Raket', '1c36', 1, 1, 1, '1729754669_e0546982210adc0bd398.jpg'),
(8, 'Barbel', 'bd92', 0, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `unit_categories`
--

CREATE TABLE `unit_categories` (
  `unit_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit_categories`
--

INSERT INTO `unit_categories` (`unit_id`, `category_id`) VALUES
(5, 1),
(6, 3),
(6, 2),
(8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Khalid', 'admin', 'admin@example.com', '$2y$10$OSmp1lKGa.IuNYnINCnzJefETqmy9Gvp7ergiWZYNOGBnW2MbOFQ.', 'admin', '2024-10-24 06:21:00', '2024-10-24 12:12:47'),
(2, 'Farhan', 'user', 'user@example.com', '$2y$10$34ak3CPMev31WRpe10TurOwewxRK/Xng7.X.UYX6dY5nYoek.8RW2', 'user', '2024-10-24 06:21:00', '2024-10-24 10:06:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_user_id_foreign` (`user_id`),
  ADD KEY `rentals_unit_id_foreign` (`unit_id`),
  ADD KEY `rentals_approved_rent_by_foreign` (`approved_rent_by`),
  ADD KEY `rentals_approved_return_by_foreign` (`approved_return_by`),
  ADD KEY `rentals_rejected_by_foreign` (`rejected_by`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit_code` (`unit_code`);

--
-- Indexes for table `unit_categories`
--
ALTER TABLE `unit_categories`
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_approved_rent_by_foreign` FOREIGN KEY (`approved_rent_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE SET NULL,
  ADD CONSTRAINT `rentals_approved_return_by_foreign` FOREIGN KEY (`approved_return_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE SET NULL,
  ADD CONSTRAINT `rentals_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE SET NULL,
  ADD CONSTRAINT `rentals_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unit_categories`
--
ALTER TABLE `unit_categories`
  ADD CONSTRAINT `unit_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_categories_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
