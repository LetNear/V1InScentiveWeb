-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 03:45 AM
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
-- Database: `inscenttive`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `scent_id` int(11) UNSIGNED NOT NULL,
  `quantity` int(11) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `scent_id`, `quantity`) VALUES
(6, 3, 2, 1),
(7, 3, 3, 1),
(8, 3, 2, 1),
(9, 3, 2, 1),
(10, 3, 2, 1),
(11, 3, 2, 1),
(12, 3, 2, 1),
(13, 3, 2, 1),
(14, 3, 2, 1),
(15, 3, 3, 1),
(16, 3, 4, 1),
(17, 3, 2, 1),
(18, 3, 3, 1),
(19, 3, 3, 2),
(20, 3, 2, 1),
(24, 15, 3, 1),
(25, 15, 4, 1),
(27, 20, 3, 1),
(28, 20, 4, 1),
(29, 20, 2, 1),
(30, 20, 2, 1),
(31, 20, 2, 1),
(36, 21, 2, 1),
(37, 21, 3, 1),
(38, 21, 4, 1);

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
(1, '2024-05-11-060311', 'App\\Database\\Migrations\\CreateUserTable', 'default', 'App', 1715407467, 1),
(2, '2024-05-11-060317', 'App\\Database\\Migrations\\CreateScentTable', 'default', 'App', 1715407467, 1),
(3, '2024-05-11-060322', 'App\\Database\\Migrations\\CreateCartTable', 'default', 'App', 1715407716, 2);

-- --------------------------------------------------------

--
-- Table structure for table `scent`
--

CREATE TABLE `scent` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(11) UNSIGNED NOT NULL,
  `price` decimal(10,2) UNSIGNED NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scent`
--

INSERT INTO `scent` (`id`, `name`, `qty`, `price`, `description`) VALUES
(2, 'asdfasdsdafasdf234432', 7, 99.99, ''),
(3, 'asdfasd', 3, 400.00, ''),
(4, 'sadfasdf', 8, 400.00, 'asdfasdfasdfdsa');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) UNSIGNED NOT NULL,
  `nickName` varchar(50) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `nickName`, `fullName`, `email`, `password`) VALUES
(3, '', 'asdfasdf', 'admin@admin.com', '$2y$10$qEYNJA3QlGDiLEOlquxwHul2oVvzgdgLxzerGmzK4JbfiKLEdi3rm'),
(4, 'asdf', 'asdf', 'asdf', '$2y$10$Q6pMIzNIV6btV2R4UZSRdej5wooPAS1RI78qwTiT0g.U1eGwuRziu'),
(5, '', 'takoy', 'takoy', 'takoy'),
(6, '', 'takoy', 'takoy', 'takoy'),
(7, '', 'takoy', 'takoy', 'takoy'),
(8, 'admin', 'test', 'test@email.com', '$2y$10$fLh1o3Y0M5VROV1NdI1uJutyjhp5RAeTkTvG8ECpCyG4VhgCywV2W'),
(9, '', 'ads', 'ad@email.com', 'asdasdfasdf'),
(10, '', 'dfasfda', 'sdfasdfasdf@asdfasdf.asdfasdf', 'asdfasdfasdfasd'),
(11, '', 'dfasfda', 'sdfasdfasdf@asdfasdf.asdfaASDFASDFsdf', '$2y$10$aj745Tje7yrm6bPWUlqHhuv3y0tdgPct4/MwQNbnnYUCTBjkJgak2'),
(12, '', 'Kap Lawrence', 'kap@gmail.com', '$2y$10$dZ.uaHgmOT2qhvQx2ZkVCu2KYlzdzXjYc2Sjy3ciWKuWc0v1BvruO'),
(13, 'Test', 'admin', 'bopenales@my.cspc.edu.ph', '$2y$10$HDKf3OwkgbNgFTFuez3kuulybZk05LZBdjMV4MLIzjI6DSP9EXoxi'),
(14, '', 'Boyet Penales', 'bopenales@gmail.com', '$2y$10$nnfRRf97dLDsazmMepVfkOqZ86cHLNgDJhNdgm2DuhP9gX6jqlC0S'),
(15, 'Let', 'sadfas', 'test@test.com', '$2y$10$DXiYqzm9s4gU3JOpDAWwJ.aIAUfLhk1JMj5zF1BLYlVH6TAnh8fUm'),
(16, '', 'qwertyui', 'lowol@gmail.com', '$2y$10$MV0ZoS.NSTJVE.Ftd.xsIOA/5UT/hgB5W/RFf7oQtbyZ2Ur/x9g4K'),
(17, '', 'admin', 'admin@admin.com', '$2y$10$iG.N/6zvSTYOBriFWlqz6uE8G6Ij8cM3accqsYrXgF6Ze4.d9Pq8G'),
(18, '', 'Boyet', 'test@test.com', '$2y$10$kv6slNPrK0smiTPK5ynmlu.XOCMq128J7qpw3TJVbp9nkB83iwuga'),
(19, '', 'sadf', 'test@test.com', '$2y$10$zh4eyvrCYXY3Qd9V6RqT1uT12VN4Qd1cFpMqwAhiEwczOG0svHqq6'),
(20, '', 'Lawrence', 'noble@noble.com', '$2y$10$EWAH0KbQSk52q3sCHv.fjO8LKUDACsqXD8qc3gFLIlKsdvawY2zye'),
(21, '', 'asdfasdf', 'testing@testing.com', '$2y$10$1dDUJH.sRN3mmPt3DYiFwOZyFnCl4hOMO38a.my2M6.xLx/QXd2DG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_id_foreign` (`user_id`),
  ADD KEY `cart_scent_id_foreign` (`scent_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scent`
--
ALTER TABLE `scent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `scent`
--
ALTER TABLE `scent`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_scent_id_foreign` FOREIGN KEY (`scent_id`) REFERENCES `scent` (`id`),
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
