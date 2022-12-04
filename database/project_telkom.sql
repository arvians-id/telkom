-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2022 at 05:36 PM
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
(1, 'E001', 'Pohon Tumbang', '2022-12-03 22:06:16', '2022-12-03 22:06:16'),
(2, 'E002', 'Tergigit Tikus', '2022-12-03 22:06:31', '2022-12-03 22:06:31'),
(3, 'E003', 'Tertarik Mobil Truck', '2022-12-03 22:06:46', '2022-12-03 22:06:46'),
(4, 'E004', 'Gesekan Layangan', '2022-12-03 22:07:01', '2022-12-03 22:07:01'),
(5, 'E005', 'Terjepit Lemari', '2022-12-03 22:07:14', '2022-12-03 22:07:14'),
(6, 'E006', 'Terjepit Pintu', '2022-12-03 22:07:26', '2022-12-03 22:07:26'),
(7, 'E007', 'Kabel Terjepit, Terlilit', '2022-12-03 22:07:45', '2022-12-03 22:07:45'),
(8, 'E008', 'Konektor Kotor', '2022-12-03 22:08:11', '2022-12-03 22:08:11'),
(9, 'E009', 'Konektor Pecah', '2022-12-03 22:08:18', '2022-12-03 22:08:18'),
(10, 'E010', 'Pon Blinking', '2022-12-03 22:08:37', '2022-12-03 22:08:37'),
(11, 'E011', 'Terlindas Kendaraan', '2022-12-03 22:08:44', '2022-12-03 22:08:44'),
(12, 'E012', 'Port ONT Kotor', '2022-12-03 22:09:01', '2022-12-03 22:09:01'),
(13, 'E013', 'Pact Core Terjepit', '2022-12-03 22:09:13', '2022-12-03 22:09:13'),
(14, 'E014', 'Digigit Semut', '2022-12-03 22:09:24', '2022-12-03 22:09:24'),
(15, 'E015', 'Adapter ONT', '2022-12-03 22:09:36', '2022-12-03 22:09:36');

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
(1, 'M01', 'HG6145F', 'Fiber Home', '2022-12-03 22:24:05', '2022-12-03 22:24:05'),
(2, 'M02', 'F670L', 'ZTE', '2022-12-03 22:24:16', '2022-12-03 22:24:16'),
(3, 'M03', 'HG8145V5', 'Huawei', '2022-12-03 22:24:27', '2022-12-03 22:24:27');

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
(1, '787', '391294966325', 'M02', 'E003,E004,E008,E011,E012,E015', NULL, '2022-12-03 22:25:32'),
(2, 'ZG4', '391294966325', 'M02', 'E009,E010,E012', 'G004', '2022-12-03 22:26:33'),
(3, '3VD', '391294966325', 'M01', 'E001,E002,E003,E004,E005,E006,E007,E014,E015', 'G001', '2022-12-03 22:27:42'),
(4, 'N7C', '391294966325', 'M03', 'E007,E008,E009,E010,E011,E012,E013', 'G002', '2022-12-03 22:29:01'),
(5, '6FZ', '391294966325', 'M01', 'E009,E010,E011,E012', 'G003', '2022-12-03 22:29:46'),
(6, '5P2', '391294966325', 'M02', 'E003,E006,E008,E010,E012,E015', NULL, '2022-12-03 22:30:18'),
(7, 'ZMK', '391294966325', 'M01', 'E003,E004,E005', NULL, '2022-12-03 22:30:42'),
(8, 'GD0', '391294966325', 'M01', 'E001,E003,E012,E013,E014,E015', NULL, '2022-12-03 22:33:30');

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
(1, 'R1', 'G001', 'E001,E002,E003,E004,E005,E006,E007,E014,E015'),
(2, 'R2', 'G002', 'E007,E008,E009,E010,E011,E012,E013'),
(3, 'R3', 'G003', 'E009,E010,E011,E012'),
(4, 'R4', 'G004', 'E009,E010,E012');

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
(1, 'G001', 'Kabel Fiber Optik Putus', '<ol><li>Melakukan Instalasi Kabel Rumah (IKR) Sesuai standar</li><li>Melalui jalur udara yag tidak terlalu tinggi dan sejajar dengan kabel udara yang sudah terpasang</li><li>Tentukan terebih dahulu jalur kabel yang aman sebelum IKR</li><li>Penarikan kabel secara perlahan jangan terburu-buru lihat alur segmen persegmennya</li><li>Gunakan sambungan konektor yang berkualitas jangan yang pecah dalemnya<br></li></ol>', '2022-12-03 22:17:49', '2022-12-03 22:17:49'),
(2, 'G002', 'Kabel Fiber Optik Bending', '<ol><li>Saat Melakukan IKR dilarang membelokan kabel secara belokan patah atau berbentuk hurup L</li><li>Tidak di gulung dengan sembarangan usahakan berbentuk Huruf O atau angka 8</li><li>Menutup di Optikal Distribution Point (ODP) dengan hati-hati</li><li>Usakan saat instalasi kabel lurus</li><li>Saat instalasi hindari belakang lemari atau pintu keluar masuk. </li><li>Gunakan Sambungan konektor yang bersih tidak kotor samasekali keramiknya</li><li>Jangan instalasi melalui jendela rawan terjepit<br></li></ol>', '2022-12-03 22:18:33', '2022-12-03 22:18:33'),
(3, 'G003', 'Kabel Fiber Optik Sambungan Nitik,Bubble', '<ol><li>Saat melakukan penyambungan menggunakan splasan usahakan di lap oleh tisu dan alkohol</li><li>Mengunakan splasan yang baik dan sejajar A dan B nya agarr core tersambung dengan cepat</li><li>Gunakan protecsion yang setandar</li><li>Bersihkan rutin papan elektro roda di splasan</li><li>Gunakan Fiber stripper dan core cleaver yang bagus<br></li></ol>', '2022-12-03 22:19:01', '2022-12-03 22:19:01'),
(4, 'G004', 'Kabel Fiber Optik Pecah Konektor SC', '<ol><li>lindungi konektor saat melakukan instalasi</li><li>Jangan sampai terbentur ke aspal</li><li>Dilarang terlalu keras saat pencolokan core ke odpnya<br></li></ol>', '2022-12-03 22:19:28', '2022-12-03 22:19:28');

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
  ADD PRIMARY KEY (`id_rules`),
  ADD UNIQUE KEY `kode_rules` (`kode_rules`) USING BTREE,
  ADD KEY `kode_solusi_rules` (`kode_solusi_rules`);

--
-- Indexes for table `tbl_solusi`
--
ALTER TABLE `tbl_solusi`
  ADD PRIMARY KEY (`id_solusi`),
  ADD UNIQUE KEY `kode_solusi` (`kode_solusi`);

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
  MODIFY `id_gejala` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id_riwayat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_rules`
--
ALTER TABLE `tbl_rules`
  MODIFY `id_rules` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_solusi`
--
ALTER TABLE `tbl_solusi`
  MODIFY `id_solusi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `tbl_rules`
--
ALTER TABLE `tbl_rules`
  ADD CONSTRAINT `tbl_rules_ibfk_1` FOREIGN KEY (`kode_solusi_rules`) REFERENCES `tbl_solusi` (`kode_solusi`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
