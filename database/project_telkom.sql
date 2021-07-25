-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 10:47 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

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
-- Table structure for table `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id_paket` int(11) NOT NULL,
  `paket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id_pelanggan` int(11) NOT NULL,
  `kode_pelanggan` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `paket_id` int(3) NOT NULL,
  `photo_ktp` varchar(50) NOT NULL,
  `photo_selfie` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `kode_pelanggan`, `nama`, `email`, `no_hp`, `alamat`, `paket_id`, `photo_ktp`, `photo_selfie`, `created_at`, `updated_at`) VALUES
(6, '107832934230', 'widdy', 'widd@gmail.com', '08223334232', 'bahayngkara', 2, 'db1_websekolah.png', 'database_ptel.png', '2021-07-25 03:43:45', '2021-07-25 03:43:45'),
(7, '598629665695', 'siapaya', 'widd@gmail.com', '08223334232', 'bahayngkara', 3, 'err2.png', 'undraw_Operating_system_re_iqsc.png', '2021-07-25 03:44:44', '2021-07-25 03:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `status_keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `pelanggan_id` int(5) NOT NULL,
  `status_id` int(5) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_status_pelanggan`
--

INSERT INTO `tbl_status_pelanggan` (`pelanggan_id`, `status_id`, `keterangan`) VALUES
(6, 2, NULL),
(7, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('kaubis','tleader') NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `bio` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `role`, `email`, `nama_lengkap`, `no_hp`, `alamat`, `photo`, `bio`, `created_at`, `updated_at`) VALUES
(6, 'kaubis', 'e10adc3949ba59abbe56e057f20f883e', 'kaubis', 'widdyarfiansyah00@gmail.com', 'widdy arfiansyahh', '082299921720', 'Sukabumi Cisaat', 'ummi.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2021-07-25 01:28:20', '2021-07-25 03:28:42'),
(7, 'tleader', 'e10adc3949ba59abbe56e057f20f883e', 'tleader', 'tleader@gmail.com', 'tleader', '082299921720', 'Sukabumi bhayangkara', 'default.png', '', '2021-07-25 03:32:56', '2021-07-25 03:32:56');

--
-- Indexes for dumped tables
--

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
  ADD KEY `paket_id` (`paket_id`);

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
-- AUTO_INCREMENT for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD CONSTRAINT `tbl_pelanggan_ibfk_1` FOREIGN KEY (`paket_id`) REFERENCES `tbl_paket` (`id_paket`) ON UPDATE CASCADE;

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
