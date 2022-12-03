-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2022 at 11:15 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_telkom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gejala`
--

CREATE TABLE `tbl_gejala` (
  `id_gejala` int NOT NULL,
  `kode_gejala` varchar(20) NOT NULL,
  `gejala` varchar(256) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gejala`
--

INSERT INTO `tbl_gejala` (`id_gejala`, `kode_gejala`, `gejala`, `created_at`, `updated_at`) VALUES
(2, 'CC1', 'Enim vel in aut offi', '2022-11-30 20:27:19', '2022-11-30 20:30:49'),
(3, 'CCS', 'Beatae aliqua Solut', '2022-11-30 21:59:44', '2022-11-30 21:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modem`
--

CREATE TABLE `tbl_modem` (
  `id_modem` int NOT NULL,
  `kode_modem` varchar(20) NOT NULL,
  `type_modem` varchar(100) NOT NULL,
  `modem` varchar(256) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_modem`
--

INSERT INTO `tbl_modem` (`id_modem`, `kode_modem`, `type_modem`, `modem`, `created_at`, `updated_at`) VALUES
(2, 'VV1', 'HG8145V5', 'Huawei', '2022-11-30 20:40:33', '2022-11-30 20:41:25'),
(3, 'XX1', 'HFAX7V', 'ZTE', '2022-12-03 17:31:08', '2022-12-03 17:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id_paket` int NOT NULL,
  `paket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_paket`
--

INSERT INTO `tbl_paket` (`id_paket`, `paket`) VALUES
(1, 'Internet'),
(2, 'Internet TV'),
(3, 'Internet Telepon');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int NOT NULL,
  `kode_pelanggan` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `paket_id` int NOT NULL,
  `photo_ktp` varchar(50) NOT NULL,
  `photo_selfie` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `kode_pelanggan`, `nama`, `email`, `no_hp`, `alamat`, `paket_id`, `photo_ktp`, `photo_selfie`, `created_at`, `updated_at`) VALUES
(9, '755086942298', 'Widdy Arfiansyah', 'widdyarfiansyah@ummi.ac.id', '08229992172', 'Sukabumi Cisaat', 2, 'index.jpg', 'LOGO_PN_SUKABUMI_COLOUR_BARU.png', '2021-06-30 21:45:13', '2021-07-25 22:42:47'),
(10, '391294966325', 'Widdy Arfiansyah', 'widdyarfiansyah@ummi.ac.id', '08229992172', 'Sukabumi Cisaat', 3, 'susah1.png', 'pendataanFINAL.png', '2021-07-09 21:47:10', '2021-07-24 21:47:10'),
(11, '324549375826', 'Tanggos', 'widdyarfiansyah@ummi.ac.ids', '08229992172', 'Sukabumi Cisaats', 3, 'logo.png', 'logo-noname.png', '2021-08-09 21:48:15', '2021-07-25 22:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayat`
--

CREATE TABLE `tbl_riwayat` (
  `id_riwayat` int NOT NULL,
  `kode_riwayat` varchar(20) NOT NULL,
  `kode_pelanggan` varchar(15) NOT NULL,
  `kode_modem` varchar(20) NOT NULL,
  `jawaban` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `kode_solusi` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_riwayat`
--

INSERT INTO `tbl_riwayat` (`id_riwayat`, `kode_riwayat`, `kode_pelanggan`, `kode_modem`, `jawaban`, `kode_solusi`, `created_at`) VALUES
(1, 'KR1', '755086942298', 'VV1', 'CC1,CCS', NULL, '2022-12-01 08:55:51'),
(3, 'NT6', '755086942298', 'XX1', 'CC1', NULL, '2022-12-03 17:41:28'),
(4, '4VP', '324549375826', 'VV1', 'CC1', NULL, '2022-12-03 18:51:11'),
(5, 'XIK', '324549375826', 'VV1', 'CC1,CCS', NULL, '2022-12-03 18:51:58'),
(6, '291', '324549375826', 'XX1', '', NULL, '2022-12-03 18:52:20'),
(7, 'RNL', '391294966325', 'VV1', 'CC1', NULL, '2022-12-03 19:02:39'),
(8, 'T1B', '391294966325', 'XX1', '', NULL, '2022-12-03 19:13:20'),
(9, '60R', '391294966325', 'VV1', 'CC1', NULL, '2022-12-03 19:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rules`
--

CREATE TABLE `tbl_rules` (
  `id_rules` int NOT NULL,
  `kode_rules` varchar(20) NOT NULL,
  `kode_solusi_rules` varchar(20) NOT NULL,
  `kode_gejala_rules` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rules`
--

INSERT INTO `tbl_rules` (`id_rules`, `kode_rules`, `kode_solusi_rules`, `kode_gejala_rules`) VALUES
(2, 'R1', 'CC1', 'CC1,CCS'),
(3, 'R2', 'CC1', 'CCS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_solusi`
--

CREATE TABLE `tbl_solusi` (
  `id_solusi` int NOT NULL,
  `kode_solusi` varchar(20) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `solusi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_solusi`
--

INSERT INTO `tbl_solusi` (`id_solusi`, `kode_solusi`, `judul`, `solusi`, `created_at`, `updated_at`) VALUES
(1, 'CC1', 'Itaque reprehenderit', 'Minima vel omnis qua', '2022-11-30 21:17:55', '2022-11-30 21:17:55'),
(2, 'S1', 'Sint non magni ipsam', '<p>asd<br></p>', '2022-12-01 01:23:01', '2022-12-01 01:23:01'),
(3, 'S2', 'Ut non odit aute per', '<ol><li>asdasd</li><li>asdasd</li><li>fdsssf<br></li></ol>', '2022-12-01 01:24:49', '2022-12-01 01:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id_status` int NOT NULL,
  `status` varchar(50) NOT NULL,
  `status_keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id_status`, `status`, `status_keterangan`) VALUES
(0, 'On Progress', 'warning'),
(1, 'Kendala', 'danger'),
(2, 'Done', 'success'),
(3, 'Cabut', 'info'),
(4, 'Putus Sementara', 'secondary');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_pelanggan`
--

CREATE TABLE `tbl_status_pelanggan` (
  `pelanggan_id` int NOT NULL,
  `status_id` int NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_status_pelanggan`
--

INSERT INTO `tbl_status_pelanggan` (`pelanggan_id`, `status_id`, `keterangan`) VALUES
(9, 2, NULL),
(10, 4, NULL),
(11, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('kaubis','tleader') NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `bio` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `role`, `email`, `nama_lengkap`, `no_hp`, `alamat`, `photo`, `bio`, `created_at`, `updated_at`) VALUES
(6, 'kaubis', 'e10adc3949ba59abbe56e057f20f883e', 'kaubis', 'widdyarfiansyah00@gmail.com', 'widdy arfiansyahh', '082299921720', 'Sukabumi Cisaat', 'hmif.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2021-07-25 01:28:20', '2021-07-25 22:50:38'),
(7, 'tleader', 'e10adc3949ba59abbe56e057f20f883e', 'tleader', 'tleader@gmail.com', 'tleader', '082299921720', 'Sukabumi bhayangkara', 'default.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2021-07-25 03:32:56', '2021-07-24 20:26:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `tbl_modem`
--
ALTER TABLE `tbl_modem`
  ADD PRIMARY KEY (`id_modem`),
  ADD UNIQUE KEY `kode_modem` (`kode_modem`);

--
-- Indexes for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `kode_pelanggan` (`kode_pelanggan`),
  ADD KEY `paket_id` (`paket_id`);

--
-- Indexes for table `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `kode_modem` (`kode_modem`),
  ADD KEY `kode_pelanggan` (`kode_pelanggan`) USING BTREE;

--
-- Indexes for table `tbl_rules`
--
ALTER TABLE `tbl_rules`
  ADD PRIMARY KEY (`id_rules`);

--
-- Indexes for table `tbl_solusi`
--
ALTER TABLE `tbl_solusi`
  ADD PRIMARY KEY (`id_solusi`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id_status`) USING BTREE;

--
-- Indexes for table `tbl_status_pelanggan`
--
ALTER TABLE `tbl_status_pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`,`status_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  MODIFY `id_gejala` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_modem`
--
ALTER TABLE `tbl_modem`
  MODIFY `id_modem` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id_paket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  MODIFY `id_riwayat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_rules`
--
ALTER TABLE `tbl_rules`
  MODIFY `id_rules` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_solusi`
--
ALTER TABLE `tbl_solusi`
  MODIFY `id_solusi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD CONSTRAINT `tbl_pelanggan_ibfk_1` FOREIGN KEY (`paket_id`) REFERENCES `tbl_paket` (`id_paket`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  ADD CONSTRAINT `tbl_riwayat_ibfk_1` FOREIGN KEY (`kode_modem`) REFERENCES `tbl_modem` (`kode_modem`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tbl_riwayat_ibfk_2` FOREIGN KEY (`kode_pelanggan`) REFERENCES `tbl_pelanggan` (`kode_pelanggan`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_status_pelanggan`
--
ALTER TABLE `tbl_status_pelanggan`
  ADD CONSTRAINT `tbl_status_pelanggan_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `tbl_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_status_pelanggan_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `tbl_status` (`id_status`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
