-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2023 at 10:35 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sib_dicoding_boostive`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produktif`
--

CREATE TABLE `kategori_produktif` (
  `id` int NOT NULL,
  `nama` varchar(20) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `bg-color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori_produktif`
--

INSERT INTO `kategori_produktif` (`id`, `nama`, `deskripsi`, `icon`, `bg-color`) VALUES
(1, 'TK', 'Taman Kanak-Kanak', 'tk-cat-icon.png', '#F0EEB7'),
(2, 'SD', 'Sekolah Dasar', 'sd-cat-icon.png', '#FFCFBF'),
(3, 'SMP', 'Sekolah Menengah Pertama', 'smp-cat-icon.png', '#C1B8F9'),
(4, 'SMA', 'Sekolah Menengah Atas', 'sma-cat-icon.png', '#C2C2C2'),
(5, 'Orang Tua', 'Untuk Semua Kalangan', 'su-cat-icon.png', '#F6F4AD'),
(6, 'Semua Usia', 'Untuk dipelajari oleh Orang Tua', 'orang-tua-cat-icon.png', '#FBCBF9');

-- --------------------------------------------------------

--
-- Table structure for table `kontribusi`
--

CREATE TABLE `kontribusi` (
  `id` int NOT NULL,
  `nama_kontributor` varchar(50) NOT NULL,
  `email_kontributor` varchar(100) NOT NULL,
  `id_kategori` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `slug` varchar(75) NOT NULL,
  `tautan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kontribusi`
--

INSERT INTO `kontribusi` (`id`, `nama_kontributor`, `email_kontributor`, `id_kategori`, `nama`, `slug`, `tautan`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Fatwa Aulia', 'fatwa@gmail.com', 1, 'Codespark', 'codespark', 'https://codespark.com/', 'Buka kunci masa depan anak Anda dengan kode', 'Diproses', '2023-06-02 07:18:20', '2023-06-02 07:18:20'),
(5, 'Akmal', 'akmal@gmail.com', 1, 'Matific', 'matific', 'https://www.matific.com/id/id/home/', 'Platform Belajar Matematika yang Disusun Ahli Pendidikan', 'Diproses', '2023-06-02 07:19:48', '2023-06-02 07:19:48'),
(6, 'Adil', 'adil@gmail.com', 4, 'Wordpress', 'wordpress', 'https://wordpress.com/id/', '43% web dibangun dengan WordPress. Lebih banyak bloger, usaha kecil, dan perusahaan Fortune 500 yang menggunakan WordPress dibandingkan dengan jumlah seluruh situs yang menggunakan platform lain. Bergabunglah dengan jutaan orang yang menjadikan WordPress.com seperti rumah sendiri.', 'Diproses', '2023-06-02 07:20:49', '2023-06-02 07:20:49'),
(8, 'Fatwa Aulia', 'fatwa@gmail.com', 6, 'Literacy Cloud', 'literacy-cloud', 'https://literacycloud.org/', 'Baca buku berkualitas gratis', 'Diproses', '2023-06-02 07:23:56', '2023-06-02 07:23:56'),
(9, 'Akmal', 'akmal@gmail.com', 6, 'Belajar Bahasa', 'belajar-bahasa', 'https://www.duolingo.com/', 'Belajar bahasa mulai dari nol - advance, belajar bahasa dengan model game', 'Diproses', '2023-06-02 07:25:05', '2023-06-02 07:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `produktif`
--

CREATE TABLE `produktif` (
  `id` int NOT NULL,
  `nama_kontributor` varchar(50) NOT NULL,
  `email_kontributor` varchar(100) NOT NULL,
  `id_kategori` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `slug` varchar(75) NOT NULL,
  `tautan` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi` text NOT NULL,
  `view` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produktif`
--

INSERT INTO `produktif` (`id`, `nama_kontributor`, `email_kontributor`, `id_kategori`, `nama`, `img`, `slug`, `tautan`, `deskripsi`, `view`, `created_at`, `updated_at`) VALUES
(9, 'Fatwa Aulia', 'fatwa@gmail.com', 2, 'mBlock', '', 'mblock', 'https://mblock.makeblock.com/en-us/', 'desksdasda aks djk asd', 0, '2023-05-21 23:51:19', '2023-05-21 23:51:19'),
(13, 'Superadmin', 'superadmin@gmail.com', 5, 'HSP (Highly Sensitive Person) test', '1685684718_3256cb6070d22cf21dcd.png', 'hsp-highly-sensitive-person-test', 'https://hsperson.com/test/highly-sensitive-child-test/', 'Online test to assess sensitivity', 0, '2023-06-01 13:20:00', '2023-06-02 12:45:19'),
(14, 'Abdul', 'fatwa@gmail.com', 2, 'Vex Challenges', '1685622150_55d49fda6879f74f6dd0.png', 'vex-challenges', 'https://www.sonsaur.com/vex-challenges/', 'VEX Challenges adalah game online baru di mana Anda harus menggunakan keahlian dan refleks Anda untuk menyelesaikan serangkaian tantangan. Gim ini dimainkan dalam serangkaian level, masing-masing dengan tantangan unik. Anda harus mencapai garis finis dalam waktu yang ditentukan untuk menyelesaikan suatu level. Anda juga bisa mendapatkan poin bonus dengan mengumpulkan bintang di jalan.', 0, '2023-06-01 19:22:31', '2023-06-01 19:22:31'),
(15, 'jessica', 'jessica@gmail.com', 6, 'lichess', '1685687304_f4dac450358391d3ec48.png', 'lichess', 'https://lichess.org/learn#/', 'Anda tahu bagaimana cara bermain catur, selamat! Apakah anda ingin menjadi pemain yang lebih hebat?', 0, '2023-06-02 13:28:24', '2023-06-02 13:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `nama` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama`) VALUES
(1, 'Superadmin'),
(2, 'Admin'),
(3, 'started');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `id_role` int NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `activated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_role`, `nama`, `email`, `password`, `img`, `jenis_kelamin`, `alamat`, `telp`, `token`, `activated_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Superadmin', 'superadmin@gmail.com', '6c6bbee91bae132c37f1fd88be269a80e8b7ca09436ae3f7d342d6599413b5760b26da25277ae56bbe027a35f1838c8dc4be34d0243e75da17090b27588e31a0', '', 'Laki-laki', 'Rumah Superadmin', '', '', '2022-10-21 19:19:52', '2022-10-21 14:14:28', '2023-06-01 18:58:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_produktif`
--
ALTER TABLE `kategori_produktif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontribusi`
--
ALTER TABLE `kontribusi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produktif`
--
ALTER TABLE `produktif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
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
-- AUTO_INCREMENT for table `kategori_produktif`
--
ALTER TABLE `kategori_produktif`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kontribusi`
--
ALTER TABLE `kontribusi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produktif`
--
ALTER TABLE `produktif`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
