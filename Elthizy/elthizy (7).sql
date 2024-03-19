-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 11:26 AM
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
-- Database: `elthizy`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `name`, `address`, `phone_number`, `email`, `password`, `level`) VALUES
(1, 'Budi Restianto', 'Bandung Barat', '0892536633', 'budirestianto@gmail.com', '$2y$10$1FZR2h/MNiNK97390uVx0O.HuQn9VJmyOjRdzPvt6xtRiTis9qJHK', 2),
(4, 'user12345', 'Jakarta Barat, Indonesia', '0895372736', 'user12345@gmail.com', '$2y$10$NzCtldEreAcHxxYRhBVaAOHwmFtSSaMgMzLLnC7m3eX6NVl71z1rW', 1),
(5, 'Adrian Jeremia', 'Bandengan, Jakarta Utara', '08956827321', 'adrianjeremia@gmail.com', '$2y$10$JEWQzLhEvPKt9YEBRPU5culAjA6ZgRPGO1lgYorC8SE3OxrGHXIdy', 1),
(6, 'asu goreng', 'jonggol nangor', '082113230068', 'asu@gmail.com', '$2y$10$EaQ/MUwxjFkspQbyuF3luurU6hSytsGV/jf0YzAahfMt.a9IDTkdm', 1),
(7, 'exsfoexsfo', 'edxsfcregtyu', '3213467643', 'eexsfo@gmail.com', '$2y$10$nlUoWNHDQrBsh2XVpL.oR.0gkdTUBThifrhZmQptFUHoShTfsx2HS', 1),
(8, 'exsfoexsfo', 'wartulio', '3213467643', 'exxxfo@gmail.com', '$2y$10$XgfIlvJhbhCNMh.qio2XrOPg7oxTucGVpNII6g.k1mFzsLjEDqqJO', 2);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `Makanan_id` int(5) NOT NULL,
  `Nama_makanan` varchar(255) NOT NULL,
  `Deskripsi_makanan` varchar(255) NOT NULL,
  `Harga_makanan` int(255) UNSIGNED NOT NULL,
  `Status_makanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`Makanan_id`, `Nama_makanan`, `Deskripsi_makanan`, `Harga_makanan`, `Status_makanan`) VALUES
(1, 'Ayam Rica - Rica', 'Ayam dengan bumbu cabai rica - rica', 15000, ''),
(2, 'Ayam Cabai Garam', 'Ayam dengan cita rasa asin, gurih, dan pedas', 15000, ''),
(3, 'Sapi Lada Hitam', 'Sapi dengan bumbu saus tiram dan lada hitam', 18000, ''),
(4, 'Sapi Saus teriyaki', 'Sapi yang dipanggang dalam bumbu kecap manis', 18000, ''),
(5, 'Cumi Asam Manis', 'Cumi dengan saus dengan cita rasa asam dan manis yang segar', 17000, ''),
(6, 'Cumi Cah Jamur', 'Cumi yang dimasak dengan tambahan jamur sebagai pelengkap', 17000, '');

-- --------------------------------------------------------

--
-- Table structure for table `order_makanan`
--

CREATE TABLE `order_makanan` (
  `order_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `makanan_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_makanan`
--

INSERT INTO `order_makanan` (`order_id`, `id`, `makanan_id`, `order_date`, `order_quantity`) VALUES
(10, 4, 2, '2023-12-02', 1),
(12, 7, 2, '2023-12-03', 1),
(13, 7, 3, '2023-12-03', 1),
(14, 7, 2, '2023-12-03', 1),
(15, 7, 3, '2023-12-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `id`, `payment_method`, `payment_status`, `payment_date`, `payment_total`) VALUES
(7, 7, 'bank_transfer', 'pending', '2023-12-03', 66000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`Makanan_id`);

--
-- Indexes for table `order_makanan`
--
ALTER TABLE `order_makanan`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `Makanan_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_makanan`
--
ALTER TABLE `order_makanan`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_makanan`
--
ALTER TABLE `order_makanan`
  ADD CONSTRAINT `order_makanan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `auth` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`id`) REFERENCES `auth` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
