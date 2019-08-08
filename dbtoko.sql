-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2019 at 03:54 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtoko`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `kategori`, `harga`, `foto`, `created_at`, `updated_at`) VALUES
('BRG001', 'Audio Technica ATH-M20x Professional Monitoring Headphones', 'headphone', 629000, 'BRG001.jpg', '2019-08-06 22:56:13', '2019-08-06 22:56:13'),
('BRG002', 'Sony Headphones MDR ZX110 AP', 'headphone', 208000, 'BRG002.png', '2019-08-06 23:10:01', '2019-08-06 23:10:01'),
('BRG003', 'Sennheiser HD400S / HD 400 S / HD400 S Around ear Headphones', 'headphone', 1099000, 'BRG003.png', '2019-08-06 23:10:57', '2019-08-06 23:10:57'),
('BRG004', 'AKG Headphone Y30', 'headphone', 594000, 'BRG004.png', '2019-08-06 23:11:44', '2019-08-06 23:11:44'),
('BRG005', 'JBL In-Ear Headphone T110', 'earphone', 105000, 'BRG005.jpg', '2019-08-06 23:14:08', '2019-08-06 23:14:08'),
('BRG006', 'Audio Technica Earphones ATH-CK330iS', 'earphone', 299000, 'BRG006.jpg', '2019-08-06 23:14:49', '2019-08-06 23:14:49'),
('BRG007', 'Sennheiser IE 80 S', 'earphone', 5139000, 'BRG007.jpg', '2019-08-06 23:15:18', '2019-08-06 23:15:18'),
('BRG008', 'AKG N40 Customizable High-Resolution', 'earphone', 4549000, 'BRG008.png', '2019-08-06 23:15:48', '2019-08-06 23:15:48'),
('BRG009', 'Harman Kardon Bluetooth Portable Speaker Onyx Studio 4', 'speaker', 1849000, 'BRG009.png', '2019-08-06 23:16:57', '2019-08-06 23:16:57'),
('BRG010', 'Sony SRS- XB12 / XB 12 Extra Bass Portable Bluetooth Speaker', 'speaker', 739000, 'BRG010.png', '2019-08-06 23:17:58', '2019-08-06 23:17:58'),
('BRG011', 'JBL Pulse 3 Portable Bluetooth Speaker', 'speaker', 2799000, 'BRG011.png', '2019-08-06 23:18:14', '2019-08-06 23:18:14'),
('BRG012', 'Plantronics Bluetooth Headset Voyager Edge', 'headset', 985000, 'BRG012.png', '2019-08-06 23:20:03', '2019-08-06 23:20:03'),
('BRG013', 'Jabra Talk 35 Bluetooth Headset', 'headset', 729000, 'BRG013.jpg', '2019-08-06 23:20:38', '2019-08-06 23:20:38'),
('BRG014', 'Sennheiser Gaming Headset Game One', 'headset', 3525000, 'BRG014.jpg', '2019-08-06 23:21:07', '2019-08-06 23:21:07'),
('BRG015', 'Audio Technica ATH-PG1 / ATH PG1 Closed-Back Gaming Headset with Mic', 'headset', 1750000, 'BRG015.jpg', '2019-08-06 23:21:30', '2019-08-06 23:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(20) NOT NULL,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `id_transaksi`, `kode_barang`, `jumlah`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 'TRX001', 'BRG011', 4, 11196000, '2019-08-07 01:53:34', '2019-08-07 01:53:34'),
(2, 'TRX001', 'BRG007', 1, 5139000, '2019-08-07 01:53:34', '2019-08-07 01:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_04_120331_create_barangs_table', 1),
(4, '2019_08_04_120550_create_transaksis_table', 1),
(5, '2019_08_04_122121_create_carts_table', 1),
(6, '2019_08_04_122140_create_detail_transaksis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `total`, `alamat`, `status`, `resi`, `created_at`, `updated_at`) VALUES
('TRX001', '2', 16335000, 'Jl. Cibarengkong No. 183', 'Telah Dikirim', '123123123', '2019-08-07 01:53:34', '2019-08-07 06:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$Sbbv.nTJ1rYAABrjj7rD5.PVkVWQTVhGoo8nuSvQycqi7BEKstFty', 'admin', NULL, '2019-08-06 21:34:55', '2019-08-06 21:34:55'),
(2, 'wahyu', 'wahyunurhidayat744@gmail.com', NULL, '$2y$10$CnC4H.q1s1cjAIlBUNPDg.bBuRFDSEDsNx0HRN4qiB2EkRDPR3dVC', 'user', NULL, '2019-08-06 21:41:51', '2019-08-06 21:41:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
