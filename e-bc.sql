-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2025 at 07:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-bc`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_alat` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`id`, `uuid`, `username`, `nama_alat`, `jumlah`, `created_at`, `modified_at`) VALUES
(2, 'c085087a-a566-43fc-85ce-a7b99fdd43cd', 'admin', 'Adaptor Timbangan Mettler Toledo', 1, '2025-07-21 09:55:19', '2025-07-21 09:55:19'),
(3, '5d632c15-855d-4a02-9ff9-ecee82d0d8f8', 'admin', 'Timbangan Mettler Toledo', 1, '2025-07-21 09:55:41', '2025-07-21 09:55:41'),
(4, '1603f41f-4916-4c00-9cc1-9c70c3d579f6', 'admin', 'Anak Timbang 10 Kg', 1, '2025-07-21 09:56:34', '2025-07-21 09:56:34'),
(5, '7714dd81-724a-44db-8e93-195c506d2c31', 'admin', 'Moisture Analyzer Mettler Toledo', 1, '2025-07-21 09:56:56', '2025-07-21 09:56:56'),
(6, '535fea90-f49e-4aea-945e-e391f08cecb6', 'admin', 'Stabilizer', 1, '2025-07-21 09:57:07', '2025-07-21 09:57:07'),
(7, '14a22930-6986-49b3-9f9f-9189dbaca851', 'admin', 'Bolpoin', 1, '2025-07-21 09:57:15', '2025-07-21 09:57:15'),
(8, '44691831-9e5e-4b93-88f9-82fdfbbb8c95', 'admin', 'Spidol', 1, '2025-07-21 09:57:23', '2025-07-21 09:57:23'),
(9, 'e0168254-b521-43d0-83f8-c3ee6108dd55', 'admin', 'Gunting', 1, '2025-07-21 09:57:30', '2025-07-21 09:57:30'),
(10, 'a56e507e-fed0-4898-b4a5-5e751c53212c', 'admin', 'Penggaris Logam', 2, '2025-07-21 09:58:12', '2025-07-21 09:58:12'),
(11, 'e421bef6-5634-41c5-b412-12e6a6aeef1d', 'admin', 'Buku Estafet QC', 1, '2025-07-21 09:58:36', '2025-07-21 09:58:36'),
(12, 'e7220b5f-4184-4e6b-beba-4267943a410f', 'admin', 'Buku Instruksi Kerja', 1, '2025-07-21 09:58:54', '2025-07-21 09:58:54'),
(13, '9df114a2-e7b8-4fc0-ad37-013c6306a06f', 'admin', 'Buku Memo', 1, '2025-07-21 09:59:02', '2025-07-21 09:59:02'),
(14, '78c06242-c1c8-4a88-a354-629394a48817', 'admin', 'Dispenser Lakban 1 Inch', 1, '2025-07-21 09:59:18', '2025-07-21 09:59:18'),
(15, '9bdfeeae-13cd-48ea-90a4-61708f38f93b', 'admin', 'Meja QC', 1, '2025-07-21 09:59:29', '2025-07-21 09:59:29'),
(16, 'bdbba930-1084-4a40-acbe-a34c876e2c02', 'admin', 'Papan Jalan ', 3, '2025-07-21 09:59:40', '2025-07-21 09:59:40'),
(17, '9caa7b78-a25c-4627-a849-660631b59bce', 'admin', 'Sarung Tangan Hijau', 1, '2025-07-21 09:59:55', '2025-07-21 09:59:55'),
(18, '36e8215e-fc03-4b8d-b3ed-a76499103037', 'admin', 'Spray Alkohol', 2, '2025-07-21 10:00:08', '2025-07-21 10:00:08'),
(19, '4c7124cf-1091-4490-8216-e0f489f98c8a', 'admin', 'Test Piece (Fe 1.5;Non Fe 2.0;SUS 2.5)', 1, '2025-07-21 10:00:33', '2025-07-21 10:00:33'),
(20, '50f67d9a-3c62-409f-9635-034f8403e8c2', 'admin', 'Thermometer (Preparasi)', 1, '2025-07-21 10:00:49', '2025-07-21 10:00:49'),
(21, '8de4590b-bdeb-409e-9b26-e656ef7361ba', 'admin', 'Thermometer (Cooking/Packing)', 1, '2025-07-21 10:01:08', '2025-07-21 10:01:08'),
(22, '4e22cec2-cef1-4faf-976f-e7ffae13a2c4', 'admin', 'Thermometer (Ruang)', 1, '2025-07-21 10:01:22', '2025-07-21 10:01:22'),
(23, '10d772a9-fe10-4751-8efa-643d9b7f8cae', 'admin', 'Gelas Ukur 1 L', 1, '2025-07-21 10:01:42', '2025-07-21 10:01:42'),
(24, '734c470a-a76a-4eb2-951e-7dd01c5d117e', 'admin', 'Kalkulator', 1, '2025-07-21 10:01:58', '2025-07-21 10:01:58'),
(25, '19bd9b1f-7f94-44db-a179-a43afa0881a1', 'admin', 'Plastik Clipper (laporan)', 1, '2025-07-21 10:02:19', '2025-07-21 10:02:19'),
(26, '66628675-9eb2-4657-a583-54391f5c261f', 'admin', 'Stopwatch', 1, '2025-07-21 10:02:29', '2025-07-21 10:02:29'),
(27, '3d80e7bc-1990-4459-bbc7-6aaa1afe4c19', 'admin', 'Carry Box', 2, '2025-07-21 10:02:43', '2025-07-21 10:02:43'),
(28, '7467660c-e74d-48c8-934d-ad2005fdd9bc', 'admin', 'Toolbox Hitam', 1, '2025-07-21 10:02:55', '2025-07-21 10:02:55'),
(29, '3c5cde17-5f0d-434d-abba-a242a2afb51d', 'admin', 'Pinset', 1, '2025-07-21 10:03:02', '2025-07-21 10:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `analisis_lab`
--

CREATE TABLE `analisis_lab` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `tipe_sampel` varchar(255) NOT NULL,
  `penyimpanan` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `kode_produksi` varchar(255) NOT NULL,
  `best_before` date NOT NULL,
  `jumlah_sampel` varchar(255) NOT NULL,
  `analisis` longtext DEFAULT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_lab` varchar(255) NOT NULL,
  `status_lab` varchar(255) NOT NULL,
  `catatan_lab` varchar(255) NOT NULL,
  `tgl_update_lab` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `benda`
--

CREATE TABLE `benda` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_benda` varchar(255) NOT NULL,
  `pemilik` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `benda`
--

INSERT INTO `benda` (`id`, `uuid`, `username`, `nama_benda`, `pemilik`, `area`, `jumlah`, `created_at`, `modified_at`) VALUES
(2, 'ea51c9d4-f99d-4f4e-8202-5cc9153e5618', 'admin', 'Lampu & Cover', 'Produksi & QC', 'Ruang Buffer, Pengayakan, RM, Chiller 2(RM), Preparasi, Mixing, Fermentasi, Baking, Cleaning, Cutting & Grinding, Aging, Packing, Office QC, Office Produksi)', 111, '2025-07-21 09:01:58', '2025-07-21 09:22:57'),
(3, 'd9c74367-93bd-4936-a43b-1529f08d1e48', 'admin', 'Akrilik Showcase', 'Produksi', 'Ruang RM', 3, '2025-07-21 09:03:37', '2025-07-21 09:23:13'),
(4, 'b86cc56a-91bd-481c-aa75-d76fd13ab211', 'admin', 'Akrilik Freezer', 'Produksi', 'Ruang RM', 2, '2025-07-21 09:07:01', '2025-07-21 09:23:27'),
(5, '7adee4eb-6d5b-4fcd-aeee-9752d7a89736', 'admin', 'Akrilik pada Pintu', 'Produksi ', 'Ruang Fermentasi, Aging, Lift, RM', 15, '2025-07-21 09:08:42', '2025-07-21 09:24:06'),
(6, '7521d9d4-8410-4ded-9f50-6606d1f4cb37', 'admin', 'Akrilik Jendela', 'Produksi', 'Ruang RM', 3, '2025-07-21 09:10:38', '2025-07-21 09:24:17'),
(7, '7c8b501f-0d61-4baf-8947-332ffe6a0930', 'admin', 'Akrilik pada Pintu & Jendela', 'Produksi & QC', 'Ruang Office QC & Produksi', 4, '2025-07-21 09:11:11', '2025-07-21 09:24:41'),
(8, '0470cf76-1b7a-44d2-9378-bad0b729a2c7', 'admin', 'Akrilik penutup blower', 'Produksi', 'Ruang Preparasi', 1, '2025-07-21 09:11:27', '2025-07-21 09:26:19'),
(9, 'ba2ad371-76a8-48fc-af46-6f958c9037d2', 'admin', 'Akrilik Sheeting Moulding', 'Produksi', 'Ruang Mixing', 1, '2025-07-21 09:11:43', '2025-07-21 09:26:34'),
(10, 'f911ebe2-13f6-4727-96c7-1f72c793e425', 'admin', 'Akrilik Timer Oven', 'Produksi', 'Ruang Baking', 8, '2025-07-21 09:12:04', '2025-07-21 09:26:54'),
(11, '7b74cb62-d42b-414e-9223-fee0a198deca', 'admin', 'Akrilik Box Lakban', 'Produksi', 'Ruang Packing', 1, '2025-07-21 09:12:17', '2025-07-21 09:27:32'),
(12, '6f4daa37-13d8-48d9-b22e-caf58029fee3', 'admin', 'Akrilik Panel', 'Produksi', 'Ruang Baking & Aging', 25, '2025-07-21 09:28:01', '2025-07-21 09:28:01'),
(13, 'b5fc2b48-1e27-4a53-b473-0a0b80a2f4ad', 'admin', 'Penutup Mesin Cutting', 'Produksi', 'Ruang Cutting & Grinding', 5, '2025-07-21 09:31:08', '2025-07-21 09:31:08'),
(14, 'c599f1b1-a09b-41ee-af49-e819577a5e51', 'admin', 'Penutup Mesin Sieving', 'Produksi', 'Ruang Packing', 1, '2025-07-21 09:31:40', '2025-07-21 09:31:40'),
(15, '8034a62b-64b4-4b6f-95b5-c2ba04a70682', 'admin', 'Box Preparasi', 'Produksi', 'Ruang RM, Preparasi, dan Mixing', 12, '2025-07-21 09:33:47', '2025-07-21 09:33:47'),
(16, '50169b6c-fb7d-4a0b-a0b7-7857a0581949', 'admin', 'Box Tepung Besar', 'Produksi ', 'Ruang Pengayakan', 2, '2025-07-21 09:34:20', '2025-07-21 09:34:20'),
(17, '8b8eb3aa-598b-4174-a92d-a4ee9f7dd1af', 'admin', 'Box Tepung Kecil', 'Produksi', 'Ruang Pengayakan', 64, '2025-07-21 09:36:45', '2025-07-21 09:36:45'),
(18, '33a81e85-522a-460b-972f-f37f3225cdf0', 'admin', 'Penutup Box Tepung Kecil', 'Produksi', 'Ruang Pengayakan', 64, '2025-07-21 09:38:17', '2025-07-21 09:38:17'),
(19, '5c1132b7-cf89-4913-986a-09565c73e1cf', 'admin', 'Box Water Chiller', 'Produksi', 'Ruang Mixing', 4, '2025-07-21 09:38:59', '2025-07-21 09:38:59'),
(20, 'c58155d0-9066-4612-9ecf-b90e8206f614', 'admin', 'Box Reject dan Waste', 'Produksi', 'Ruang Pengayakan, Mixing, Baking, Cutting, Grinding, dan Packing', 8, '2025-07-21 09:39:44', '2025-07-21 09:39:44'),
(21, 'd27c16d4-b091-477b-8ec4-49a432489fca', 'admin', 'Box Metal Detector', 'Produksi', 'Ruang Packing', 1, '2025-07-21 09:41:45', '2025-07-21 09:41:45'),
(22, '010a1b4c-5ecb-4b10-ab91-8f07cadaa0e5', 'admin', 'Box Pencucian', 'Produksi', 'Ruang Cleaning', 3, '2025-07-21 09:42:13', '2025-07-21 09:42:13'),
(23, '0270c5af-9b44-4cba-8403-983ddb5d7bfc', 'admin', 'Botol Semprot', 'Produksi', 'Ruang Mixing & Packing', 2, '2025-07-21 09:44:50', '2025-07-21 09:44:50'),
(24, '91a8c627-6964-458f-8492-dc36b3223d2c', 'admin', 'Baking Cart ', 'Produksi', 'Ruang Mixing, Fermentasi, dan Baking', 29, '2025-07-21 09:47:33', '2025-07-21 09:47:33'),
(25, '85a2de00-125f-4593-a6e3-e2db68d0961a', 'admin', 'Tempat Minyak Goreng', 'Produksi', 'Ruang Preparasi', 2, '2025-07-21 09:48:05', '2025-07-21 09:48:05'),
(26, 'd17e1d4e-b38c-4d2a-9d42-1737101c51e1', 'admin', 'Jam Dinding', 'Produksi', 'Ruang Mixing, Baking dan Packing', 3, '2025-07-21 09:48:40', '2025-07-21 09:48:40'),
(27, 'ea191795-df48-45be-bb38-3e103cf57c66', 'admin', 'Display Suhu', 'Produksi', 'Ruang RM & Grinding', 2, '2025-07-21 09:49:13', '2025-07-21 09:49:13'),
(28, '76d12739-48a2-42e6-9ff3-fefbda9b07b8', 'admin', 'Fly Catcher', 'Produksi', 'Ruang Preparasi dan Anteroom', 2, '2025-07-21 09:49:49', '2025-07-21 09:49:49'),
(29, 'a1421e18-bc32-40ed-a3f8-5263758124bd', 'admin', 'Tempat Telepon Akrilik', 'Produksi', 'Ruang Preparasi', 1, '2025-07-21 09:50:30', '2025-07-21 09:50:30'),
(30, 'dc0bbde1-53f5-47cd-a5da-d4904aabe3e3', 'admin', 'Cermin', 'Produksi', 'Loker & Wastafel', 2, '2025-07-21 09:50:57', '2025-07-21 09:50:57'),
(31, '2ccfe43d-3d54-4219-8335-7794c2cd6f60', 'admin', 'Dispenser Handsanitizer', 'Produksi', 'Ruang Mixing & Packing', 4, '2025-07-21 09:51:26', '2025-07-21 09:51:26'),
(32, 'bebd2f3e-2c20-4a99-a461-b1e0d72c6fc7', 'admin', 'Tempat Sampah', 'Produksi', 'Ruang Pengayakan, Mixing, Baking, Packing, dan Loker', 8, '2025-07-21 09:52:46', '2025-07-21 09:52:46'),
(33, '345ab186-e665-4c44-95b5-e732473d6a5f', 'admin', 'Helm Code Red', 'Produksi', 'Ruang Cutting', 4, '2025-07-21 09:53:11', '2025-07-21 09:53:11'),
(34, '82bf3533-d331-4c65-bf28-03c55d4b6be6', 'admin', 'Lampu Alarm', 'Produksi', 'Ruang Baking, Cutting, Grinding, dan Packing', 5, '2025-07-21 09:53:50', '2025-07-21 09:53:50'),
(35, '8eb9345c-58a9-4634-9e1f-41262b45f1e5', 'admin', 'Test Piece', 'QC', 'Ruang Packing', 3, '2025-07-21 09:54:08', '2025-07-21 09:54:08'),
(36, 'c466d617-8cc2-44df-b06f-4c502ee0de73', 'admin', 'Kacamata', '', '', 0, '2025-07-21 09:54:45', '2025-07-21 09:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `benda_pecah`
--

CREATE TABLE `benda_pecah` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `benda_pecah` longtext DEFAULT NULL,
  `qc_update` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chiller`
--

CREATE TABLE `chiller` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `waktu` time NOT NULL,
  `chiller_1` varchar(255) NOT NULL,
  `chiller_2` varchar(255) NOT NULL,
  `chiller_3` varchar(255) NOT NULL,
  `chiller_4` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chiller`
--

INSERT INTO `chiller` (`id`, `uuid`, `username`, `plant`, `date`, `waktu`, `chiller_1`, `chiller_2`, `chiller_3`, `chiller_4`, `catatan`, `nama_produksi`, `status_produksi`, `catatan_produksi`, `tgl_update_produksi`, `nama_spv`, `status_spv`, `catatan_spv`, `tgl_update_spv`, `created_at`, `modified_at`) VALUES
(12, 'c8aab0e7-d8b6-42f9-bf01-cbb07b3d4a5e', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '23:00:00', '-', '3', '2', '2', '', 'Ahmad', '1', '', '2025-07-30 00:39:16', '', '0', '', '2025-07-30 00:39:16', '2025-07-30 00:39:16', '2025-07-30 00:39:16'),
(13, '5c1cc415-b3cf-4bc8-abd4-506075ed037d', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '00:00:00', '-', '4', '2', '4', '', 'Ahmad', '1', '', '2025-07-30 00:39:55', '', '0', '', '2025-07-30 00:39:55', '2025-07-30 00:39:55', '2025-07-30 00:39:55'),
(14, '4bee7da8-4daf-410f-8e02-b41c0164fdaf', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '01:00:00', '-', '3', '3', '4', '', 'Ahmad', '1', '', '2025-07-30 01:50:03', '', '0', '', '2025-07-30 01:50:03', '2025-07-30 01:50:03', '2025-07-30 01:50:03'),
(15, '8d96725e-4596-4be0-b664-cb455dca4fef', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '02:00:00', '-', '4', '2', '4', '', 'Ahmad', '1', '', '2025-07-30 01:50:26', '', '0', '', '2025-07-30 01:50:26', '2025-07-30 01:50:26', '2025-07-30 01:50:26'),
(16, 'cbb6ebe8-511c-4322-affe-21771f3ed4a8', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '03:00:00', '-', '1', '2', '2', '', 'Ahmad', '1', '', '2025-07-30 04:34:06', '', '0', '', '2025-07-30 04:34:06', '2025-07-30 04:34:06', '2025-07-30 04:34:06'),
(17, '6590946a-8bb0-4341-9648-f56093c0c59f', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '04:00:00', '-', '1', '2', '2', '', 'Ahmad', '1', '', '2025-07-30 04:34:31', '', '0', '', '2025-07-30 04:34:31', '2025-07-30 04:34:31', '2025-07-30 04:34:31'),
(18, 'f5776ddf-6994-41b3-a933-5fac6e32ffe8', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '05:00:00', '-', '3', '2', '2', '', 'Ahmad', '1', '', '2025-07-30 06:41:15', '', '0', '', '2025-07-30 06:41:15', '2025-07-30 06:41:15', '2025-07-30 06:41:15'),
(19, '2d7aa43f-9c11-4611-8703-055be233a03e', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '06:00:00', '-', '1', '2', '1', '', 'Ahmad', '1', '', '2025-07-30 06:42:25', '', '0', '', '2025-07-30 06:42:25', '2025-07-30 06:42:25', '2025-07-30 06:42:25'),
(20, '535e646f-d325-44e9-a323-03512676cb6e', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '15:00:00', '-', '3', '2', '2', '', 'Ahmad', '1', '', '2025-07-30 22:44:03', '', '0', '', '2025-07-30 22:44:03', '2025-07-30 22:44:03', '2025-07-30 22:44:03'),
(21, '7dcecba6-dcc4-411a-894d-b8f19d9a25cb', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '16:00:00', '-', '1', '2', '2', '', 'Ahmad', '1', '', '2025-07-30 22:44:25', '', '0', '', '2025-07-30 22:44:25', '2025-07-30 22:44:25', '2025-07-30 22:44:25'),
(22, '96a88933-7b1c-47a7-b136-a36b3392dd01', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '17:00:00', '-', '2', '3', '2', '', 'Ahmad', '1', '', '2025-07-30 22:44:41', '', '0', '', '2025-07-30 22:44:41', '2025-07-30 22:44:41', '2025-07-30 22:44:41'),
(23, '635e52db-29fd-46b9-9e90-ec6dcc80b0b8', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '18:00:00', '-', '2', '2', '1', '', 'Ahmad', '1', '', '2025-07-30 22:45:02', '', '0', '', '2025-07-30 22:45:02', '2025-07-30 22:45:02', '2025-07-30 22:45:02'),
(24, '0c385c2e-6113-4971-a605-f9abe46c868e', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '19:00:00', '-', '3', '2', '2', '', 'Ahmad', '1', '', '2025-07-30 22:45:22', '', '0', '', '2025-07-30 22:45:22', '2025-07-30 22:45:22', '2025-07-30 22:45:22'),
(25, '546929f3-7c87-4758-88c2-60e5886a738c', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '20:00:00', '-', '3', '3', '4', '', 'Ahmad', '1', '', '2025-07-30 22:45:36', '', '0', '', '2025-07-30 22:45:36', '2025-07-30 22:45:36', '2025-07-30 22:45:36'),
(26, 'f43e7f5b-6f91-452a-aa8b-272c16cb97fb', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '21:00:00', '-', '3', '3', '2', '', 'Ahmad', '1', '', '2025-07-30 22:45:54', '', '0', '', '2025-07-30 22:45:54', '2025-07-30 22:45:54', '2025-07-30 22:45:54'),
(27, '070053ab-7a9c-43b2-87f2-e53a4a9fdf81', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '22:00:00', '-', '3', '2', '2', '', 'Ahmad', '1', '', '2025-07-30 22:46:22', '', '0', '', '2025-07-30 22:46:22', '2025-07-30 22:46:22', '2025-07-30 22:46:22'),
(28, '94bdccb1-7094-4be5-aa2c-62f821f8cbfe', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '23:00:00', '-', '1', '2', '3', '', 'Ahmad', '1', '', '2025-07-31 01:39:27', '', '0', '', '2025-07-31 01:39:27', '2025-07-31 01:39:27', '2025-07-31 01:39:27'),
(29, 'cb24bdb2-98c2-4c96-a99a-58d6b72fdd16', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '00:00:00', '-', '2', '2', '3', '', 'Ahmad', '1', '', '2025-07-31 01:39:52', '', '0', '', '2025-07-31 01:39:52', '2025-07-31 01:39:52', '2025-07-31 01:39:52'),
(30, 'cfecb356-506c-4dd9-95fb-618355bdc117', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '01:00:00', '-', '3', '2', '2', '', 'Ahmad', '1', '', '2025-07-31 01:40:17', '', '0', '', '2025-07-31 01:40:17', '2025-07-31 01:40:17', '2025-07-31 01:40:17'),
(31, '4cb84514-b880-417d-b7f6-59489fe2bc05', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '02:00:00', '-', '1', '2', '3', '', 'Ahmad', '1', '', '2025-07-31 02:49:09', '', '0', '', '2025-07-31 02:49:09', '2025-07-31 02:49:09', '2025-07-31 02:49:09'),
(32, '117b44f6-f44b-4ca1-8abb-aaab25b24498', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '03:00:00', '-', '1', '2', '3', '', 'Ahmad', '1', '', '2025-07-31 02:49:30', '', '0', '', '2025-07-31 02:49:30', '2025-07-31 02:49:30', '2025-07-31 02:49:30'),
(33, '32a10bdd-82a4-425f-981e-88db234c4958', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '04:00:00', '-', '2', '2', '1', '', 'Ahmad', '1', '', '2025-07-31 05:39:39', '', '0', '', '2025-07-31 05:39:39', '2025-07-31 05:39:39', '2025-07-31 05:39:39'),
(34, '89f70017-a877-4d14-aafd-b23031597fb1', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '05:00:00', '-', '2', '2', '1', '', 'Ahmad', '1', '', '2025-07-31 05:39:59', '', '0', '', '2025-07-31 05:39:59', '2025-07-31 05:39:59', '2025-07-31 05:39:59'),
(35, '85561b40-e40f-4af0-8caa-aad41c8b7cdf', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '06:00:00', '-', '1', '2', '1', '', 'Ahmad', '1', '', '2025-07-31 05:40:30', '', '0', '', '2025-07-31 05:40:30', '2025-07-31 05:40:30', '2025-07-31 05:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `user_uuid` varchar(255) NOT NULL,
  `departemen` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id`, `uuid`, `user_uuid`, `departemen`, `created_at`, `modified_at`) VALUES
(1, '66c8b282-9c49-40d3-85a0-257edc2160b6', '000', 'PDQC', '2024-02-28 09:48:40', '2024-02-28 09:48:40'),
(2, '73e68eee-2615-4557-9e1a-6b6371c35ccd', '000', 'Engineering', '2024-02-28 09:48:46', '2024-02-28 09:48:46'),
(3, 'e2c64036-b3c0-4121-b0bf-48910cf2cd98', '000', 'Finance', '2024-02-28 09:48:53', '2024-02-28 09:48:53'),
(4, 'ee68310c-ea16-4a7b-bde7-d38fe5c4c47d', '000', 'PGA', '2024-02-28 09:49:02', '2024-02-28 09:49:02'),
(5, 'c6d788ee-9bc4-4441-9722-5127eb3111d8', '000', 'PPIC', '2024-02-28 09:49:06', '2024-02-28 09:49:06'),
(6, '3622efc5-b2f8-4370-acb0-4833617fa0af', '000', 'Produksi', '2024-02-28 09:49:17', '2024-02-28 09:49:17'),
(7, 'a69f6469-8389-4d8b-806f-b6d5d4591560', '000', 'Warehouse', '2024-02-28 09:49:22', '2024-02-28 09:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `kepada` varchar(255) NOT NULL,
  `disposisi` varchar(255) NOT NULL,
  `dasar_disposisi` longtext NOT NULL,
  `uraian_disposisi` longtext NOT NULL,
  `catatan` longtext NOT NULL,
  `cc` varchar(255) NOT NULL,
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_mg_qc` varchar(255) NOT NULL,
  `status_mg_qc` varchar(255) NOT NULL,
  `catatan_mg_qc` varchar(255) NOT NULL,
  `tgl_update_mg_qc` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_mg_prod` varchar(255) NOT NULL,
  `status_mg_prod` varchar(255) NOT NULL,
  `catatan_mg_prod` varchar(255) NOT NULL,
  `tgl_update_mg_prod` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `peralatan` longtext NOT NULL,
  `qc_update` varchar(255) NOT NULL,
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kebersihan_karyawan`
--

CREATE TABLE `kebersihan_karyawan` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bagian` varchar(255) NOT NULL,
  `seragam` varchar(255) NOT NULL,
  `apron` varchar(255) NOT NULL,
  `tangan_kuku` varchar(255) NOT NULL,
  `kosmetik` varchar(255) NOT NULL,
  `perhiasan` varchar(255) NOT NULL,
  `masker` varchar(255) NOT NULL,
  `topi_hairnet` varchar(255) NOT NULL,
  `sepatu` varchar(255) NOT NULL,
  `tindakan` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kebersihan_mesin`
--

CREATE TABLE `kebersihan_mesin` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `mesin` varchar(255) NOT NULL,
  `perbaikan` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `tgl_perbaikan` date NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `spare_part` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kebersihan_peralatan`
--

CREATE TABLE `kebersihan_peralatan` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `peralatan` longtext DEFAULT NULL,
  `kondisi` varchar(255) NOT NULL,
  `problem` varchar(255) NOT NULL,
  `tindakan` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kebersihan_peralatan`
--

INSERT INTO `kebersihan_peralatan` (`id`, `uuid`, `username`, `plant`, `date`, `shift`, `peralatan`, `kondisi`, `problem`, `tindakan`, `catatan`, `nama_produksi`, `status_produksi`, `catatan_produksi`, `tgl_update_produksi`, `nama_spv`, `status_spv`, `catatan_spv`, `tgl_update_spv`, `created_at`, `modified_at`) VALUES
(9, '81b9814c-70eb-44e8-9f3a-5a106846bb41', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '[{\"nama\":\"Mesin Jahit\",\"kondisi\":\"Bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"nama\":\"Hand Mixer\\/Whisker\",\"kondisi\":\"Bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"nama\":\"Vacuum Cleaner\",\"kondisi\":\"Bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"nama\":\"Baskom Stainless\",\"kondisi\":\"Bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"nama\":\"Cooling Rack\",\"kondisi\":\"Bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"nama\":\"Baking Cart & Titanium Plat\",\"kondisi\":\"Bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"nama\":\"Box Plastik\",\"kondisi\":\"Bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"nama\":\"Scrapper\",\"kondisi\":\"Bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"nama\":\"Serokan\",\"kondisi\":\"Bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"nama\":\"Pisau\",\"kondisi\":\"Bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"nama\":\"Meja Stainless\",\"kondisi\":\"Bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"nama\":\"Timbangan\",\"kondisi\":\"Bersih\",\"problem\":\"\",\"tindakan\":\"\"}]', '', '', '', '', 'Ahmad', '1', '', '2025-07-30 22:52:32', '', '0', '', '2025-07-30 22:52:32', '2025-07-30 22:52:32', '2025-07-30 22:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `kebersihan_ruang`
--

CREATE TABLE `kebersihan_ruang` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) NOT NULL,
  `bagian` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `problem` varchar(255) NOT NULL,
  `tindakan` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` varchar(255) NOT NULL,
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp(),
  `detail` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kekuatan_mt`
--

CREATE TABLE `kekuatan_mt` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `nama_alat` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ketidaksesuaian`
--

CREATE TABLE `ketidaksesuaian` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `waktu` time NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `ketidaksesuaian` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `penyebab` varchar(255) NOT NULL,
  `tindakan` varchar(255) NOT NULL,
  `verifikasi` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kondisi_kerja`
--

CREATE TABLE `kondisi_kerja` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `waktu` time NOT NULL,
  `kondisi_higiene` varchar(255) NOT NULL,
  `problem_higiene` varchar(255) NOT NULL,
  `tindakan_higiene` varchar(255) NOT NULL,
  `verifikasi_higiene` varchar(255) NOT NULL,
  `kondisi_kebersihan` varchar(255) NOT NULL,
  `problem_kebersihan` varchar(255) NOT NULL,
  `tindakan_kebersihan` varchar(255) NOT NULL,
  `verifikasi_kebersihan` varchar(255) NOT NULL,
  `kondisi_peralatan` varchar(255) NOT NULL,
  `problem_peralatan` varchar(255) NOT NULL,
  `tindakan_peralatan` varchar(255) NOT NULL,
  `verifikasi_peralatan` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kondisi_kerja`
--

INSERT INTO `kondisi_kerja` (`id`, `uuid`, `username`, `plant`, `date`, `shift`, `area`, `waktu`, `kondisi_higiene`, `problem_higiene`, `tindakan_higiene`, `verifikasi_higiene`, `kondisi_kebersihan`, `problem_kebersihan`, `tindakan_kebersihan`, `verifikasi_kebersihan`, `kondisi_peralatan`, `problem_peralatan`, `tindakan_peralatan`, `verifikasi_peralatan`, `catatan`, `nama_produksi`, `status_produksi`, `catatan_produksi`, `tgl_update_produksi`, `nama_spv`, `status_spv`, `catatan_spv`, `tgl_update_spv`, `created_at`, `modified_at`) VALUES
(15, 'b1054bb1-80ef-4c40-b184-b598f0c78443', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', 'BC', '15:00:00', '✓', '', '', '', '3', 'LANTAI KOTOR AREA MIXER', 'DI BERSIKAN', 'OK', '✓', '', '', '', '', 'Ahmad', '1', '', '2025-07-30 22:50:47', '', '0', '', '2025-07-30 22:50:47', '2025-07-30 22:50:47', '2025-07-30 22:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `kontaminasi`
--

CREATE TABLE `kontaminasi` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `jenis_kontaminasi` varchar(255) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `kode_produksi` varchar(255) NOT NULL,
  `jumlah_temuan` int(11) NOT NULL,
  `tahapan` varchar(255) NOT NULL,
  `analisis` varchar(255) NOT NULL,
  `tindakan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `larutan`
--

CREATE TABLE `larutan` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `nama_bahan` longtext DEFAULT NULL,
  `kadar` varchar(255) NOT NULL,
  `bahan_kimia` varchar(255) DEFAULT NULL,
  `air_bersih` varchar(255) DEFAULT NULL,
  `volume_akhir` varchar(255) DEFAULT NULL,
  `kebutuhan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tindakan` varchar(255) NOT NULL,
  `verifikasi` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loading`
--

CREATE TABLE `loading` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `no_pol` varchar(255) NOT NULL,
  `start_loading` time NOT NULL,
  `finish_loading` time NOT NULL,
  `nama_supir` varchar(255) NOT NULL,
  `ekspedisi` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `no_segel` varchar(255) NOT NULL,
  `kondisi_mobil` longtext DEFAULT NULL,
  `loading` longtext DEFAULT NULL,
  `nama_wh` varchar(255) NOT NULL,
  `status_wh` varchar(255) NOT NULL,
  `catatan_wh` varchar(255) NOT NULL,
  `tgl_update_wh` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `magnet_trap`
--

CREATE TABLE `magnet_trap` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `tahapan` varchar(255) NOT NULL,
  `kontaminasi` varchar(255) NOT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `analisis` varchar(255) NOT NULL,
  `tindakan` varchar(255) NOT NULL,
  `verifikasi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_enginer` varchar(255) NOT NULL,
  `status_enginer` varchar(255) NOT NULL,
  `catatan_enginer` varchar(255) NOT NULL,
  `tgl_update_enginer` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `berat` float NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `uuid`, `username`, `material`, `berat`, `created_at`, `modified_at`) VALUES
(0, '5484cc0b-4af8-4b72-80d1-03fae073a0b1', 'admin', 'Tepung Tapioka', 200, '2025-07-25 17:57:14', '2025-07-25 17:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `metal`
--

CREATE TABLE `metal` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username_1` varchar(255) NOT NULL,
  `username_2` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date_metal` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `kode_produksi` varchar(255) NOT NULL,
  `no_program` varchar(255) NOT NULL,
  `deteksi_ng` varchar(255) NOT NULL,
  `std_fe` varchar(255) NOT NULL,
  `std_nonfe` varchar(255) NOT NULL,
  `std_sus304` varchar(255) NOT NULL,
  `fe_d` varchar(255) NOT NULL,
  `fe_t` varchar(255) NOT NULL,
  `fe_b` varchar(255) NOT NULL,
  `nonfe_d` varchar(255) NOT NULL,
  `nonfe_t` varchar(255) NOT NULL,
  `nonfe_b` varchar(255) NOT NULL,
  `sus_d` varchar(255) NOT NULL,
  `sus_t` varchar(255) NOT NULL,
  `sus_b` varchar(255) NOT NULL,
  `update_time_t` time NOT NULL,
  `update_time_b` time NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `catatan_metal` varchar(255) NOT NULL,
  `nama_produksi_metal` varchar(255) NOT NULL,
  `no_mesin` varchar(255) NOT NULL,
  `date_false_rejection` date NOT NULL,
  `shift_monitoring` varchar(255) NOT NULL,
  `jumlah_tidak_lolos` varchar(255) NOT NULL,
  `jumlah_kontaminasi` varchar(255) NOT NULL,
  `jenis_kontaminasi` varchar(255) NOT NULL,
  `posisi_kontaminasi` varchar(255) NOT NULL,
  `false_rejection` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_produksi_false` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `status_produksi_false` varchar(255) NOT NULL,
  `catatan_produksi_false` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `status_spv_false` varchar(255) NOT NULL,
  `catatan_spv_false` varchar(255) NOT NULL,
  `tgl_update_spv_metal` datetime NOT NULL DEFAULT current_timestamp(),
  `tgl_update_produksi_metal` datetime NOT NULL DEFAULT current_timestamp(),
  `tgl_update_spv_false` datetime NOT NULL DEFAULT current_timestamp(),
  `tgl_update_produksi_false` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv_metal` varchar(255) NOT NULL,
  `nama_spv_false` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at_false` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `metal`
--

INSERT INTO `metal` (`id`, `uuid`, `username_1`, `username_2`, `plant`, `date_metal`, `shift`, `time`, `nama_produk`, `kode_produksi`, `no_program`, `deteksi_ng`, `std_fe`, `std_nonfe`, `std_sus304`, `fe_d`, `fe_t`, `fe_b`, `nonfe_d`, `nonfe_t`, `nonfe_b`, `sus_d`, `sus_t`, `sus_b`, `update_time_t`, `update_time_b`, `keterangan`, `catatan_metal`, `nama_produksi_metal`, `no_mesin`, `date_false_rejection`, `shift_monitoring`, `jumlah_tidak_lolos`, `jumlah_kontaminasi`, `jenis_kontaminasi`, `posisi_kontaminasi`, `false_rejection`, `catatan`, `nama_produksi_false`, `status_produksi`, `catatan_produksi`, `status_produksi_false`, `catatan_produksi_false`, `status_spv`, `catatan_spv`, `status_spv_false`, `catatan_spv_false`, `tgl_update_spv_metal`, `tgl_update_produksi_metal`, `tgl_update_spv_false`, `tgl_update_produksi_false`, `nama_spv_metal`, `nama_spv_false`, `created_at`, `modified_at`, `modified_at_false`) VALUES
(20, 'a3efe4d3-4894-4b1b-8ddf-791a448e5eb5', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-28', '2', '20:30:00', 'Bc orange', 'PG28112AC0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '00:00:00', '00:00:00', 'Ok', 'Ok', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-28 22:54:02', '2025-07-28 22:54:02', '2025-07-28 22:54:02', '2025-07-28 22:54:02', '', '', '2025-07-28 22:54:02', '2025-07-28 22:58:07', '2025-07-28 22:54:02'),
(21, 'fcf4cf47-c852-419b-824a-6bf52ce59a53', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-28', '2', '21:00:00', 'Bc orange', 'PG28113AC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '00:00:00', '21:00:00', 'Ok', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-28 23:01:16', '2025-07-28 23:01:16', '2025-07-28 23:01:16', '2025-07-28 23:01:16', '', '', '2025-07-28 23:01:16', '2025-07-28 23:02:12', '2025-07-28 23:01:16'),
(22, 'dec1087c-5688-47fe-a152-a6c7a7c97086', 'anifta.leli', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '3', '23:40:00', 'BC MIX', 'PG25127AB0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'tidak_terdeteksi', 'terdeteksi', 'terdeteksi', 'tidak_terdeteksi', 'terdeteksi', 'terdeteksi', '11:40:00', '11:40:00', 'Ok', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 02:28:30', '2025-07-29 02:28:30', '2025-07-29 02:28:30', '2025-07-29 02:28:30', '', '', '2025-07-29 02:28:30', '2025-07-31 06:49:21', '2025-07-29 02:28:30'),
(23, '7776f09f-38d2-45b3-8a34-df3b49bc68cf', 'anifta.leli', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '3', '00:00:00', 'BC MIX', 'PG25128AB0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '00:00:00', '00:00:00', 'Ok', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 02:30:41', '2025-07-29 02:30:41', '2025-07-29 02:30:41', '2025-07-29 02:30:41', '', '', '2025-07-29 02:30:41', '2025-07-31 06:49:30', '2025-07-29 02:30:41'),
(24, 'ebc29a55-a810-46b3-9ee1-2dca60d40625', 'anifta.leli', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '3', '00:20:00', 'BC MIX', 'PG25129AB0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '00:20:00', '00:20:00', 'Ok', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 02:31:45', '2025-07-29 02:31:45', '2025-07-29 02:31:45', '2025-07-29 02:31:45', '', '', '2025-07-29 02:31:45', '2025-07-31 06:49:45', '2025-07-29 02:31:45'),
(25, 'fa29411c-46c8-4821-b2db-5f7961382077', 'anifta.leli', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '3', '00:40:00', 'BC MIX', 'PG25130AB0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '00:40:00', '00:40:00', 'Ok', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 05:35:49', '2025-07-29 05:35:49', '2025-07-29 05:35:49', '2025-07-29 05:35:49', '', '', '2025-07-29 05:35:49', '2025-07-31 06:50:13', '2025-07-29 05:35:49'),
(26, 'e1800d73-065e-43d2-a1d2-7b996ff383d3', 'anifta.leli', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '3', '01:00:00', 'BC MIX', 'PG25131AB0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '01:00:00', '01:00:00', 'Ok', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 05:37:48', '2025-07-29 05:37:48', '2025-07-29 05:37:48', '2025-07-29 05:37:48', '', '', '2025-07-29 05:37:48', '2025-07-31 06:50:26', '2025-07-29 05:37:48'),
(27, 'a211c2ee-81d2-4b57-90bd-bf0046d54492', 'anifta.leli', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '3', '01:20:00', 'BC MIX', 'PG25132AB0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '01:20:00', '01:20:00', 'Ok', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 05:38:55', '2025-07-29 05:38:55', '2025-07-29 05:38:55', '2025-07-29 05:38:55', '', '', '2025-07-29 05:38:55', '2025-07-31 06:50:39', '2025-07-29 05:38:55'),
(28, 'fad2c827-99c4-49f6-8ab1-46934a252b71', 'anifta.leli', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '3', '04:30:00', 'BC MIX', 'PG25133AB0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '04:30:00', '04:30:00', 'Ok', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 05:39:58', '2025-07-29 05:39:58', '2025-07-29 05:39:58', '2025-07-29 05:39:58', '', '', '2025-07-29 05:39:58', '2025-07-31 06:50:55', '2025-07-29 05:39:58'),
(29, '1680a11c-fd33-412b-bbe8-e3bfa21ccfa8', 'anifta.leli', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '3', '04:50:00', 'BC MIX', 'PG25134CB0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '04:50:00', '04:50:00', 'Ok', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 05:41:01', '2025-07-29 05:41:01', '2025-07-29 05:41:01', '2025-07-29 05:41:01', '', '', '2025-07-29 05:41:01', '2025-07-31 06:51:19', '2025-07-29 05:41:01'),
(30, '57dbf718-786f-4153-b368-392d391c5c10', 'anifta.leli', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '3', '05:10:00', 'BC MIX', 'PG25135CBO', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '05:10:00', '05:10:00', 'Ok', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 06:48:23', '2025-07-29 06:48:23', '2025-07-29 06:48:23', '2025-07-29 06:48:23', '', '', '2025-07-29 06:48:23', '2025-07-31 06:51:43', '2025-07-29 06:48:23'),
(31, '2e820a1c-70e9-416a-be14-c380eaa061c0', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-28', '2', '21:30:00', 'BC ORANGE', 'PG 26 114 AC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '21:30:00', '21:30:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 21:19:38', '2025-07-29 21:19:38', '2025-07-29 21:19:38', '2025-07-29 21:19:38', '', '', '2025-07-29 21:19:38', '2025-07-29 21:24:57', '2025-07-29 21:19:38'),
(32, '0ba117a8-319a-4ff5-9f76-16fd1adc210f', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-28', '2', '22:00:00', 'BC ORANGE', 'PG 26 115 AC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '22:00:00', '21:30:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 21:22:30', '2025-07-29 21:22:30', '2025-07-29 21:22:30', '2025-07-29 21:22:30', '', '', '2025-07-29 21:22:30', '2025-07-29 21:29:01', '2025-07-29 21:22:30'),
(33, 'a368e8a0-83c0-41fe-a8b5-fcb27048cc99', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-28', '2', '22:30:00', 'BC ORANGE', 'PG 26 116 AC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '22:30:00', '22:30:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 21:29:56', '2025-07-29 21:29:56', '2025-07-29 21:29:56', '2025-07-29 21:29:56', '', '', '2025-07-29 21:29:56', '2025-07-29 21:30:52', '2025-07-29 21:29:56'),
(34, 'a78b8c6e-d359-410d-af63-b2aedb4abba9', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', '15:31:00', 'BC MIX', 'PG 26 105BC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '15:00:00', '15:00:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 21:33:10', '2025-07-29 21:33:10', '2025-07-29 21:33:10', '2025-07-29 21:33:10', '', '', '2025-07-29 21:33:10', '2025-07-29 21:34:33', '2025-07-29 21:33:10'),
(35, 'f572a565-f128-4d70-9150-79b66b723104', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', '15:30:00', 'BC MIX', 'PG 26 106 BC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '15:30:00', '15:30:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 21:35:56', '2025-07-29 21:35:56', '2025-07-29 21:35:56', '2025-07-29 21:35:56', '', '', '2025-07-29 21:35:56', '2025-07-29 21:37:05', '2025-07-29 21:35:56'),
(36, '2f879c80-fe2b-4404-abd3-6cf34b188dd1', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', '16:00:00', 'BC MIX', 'PG 26 107BC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '16:00:00', '16:00:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 21:38:20', '2025-07-29 21:38:20', '2025-07-29 21:38:20', '2025-07-29 21:38:20', '', '', '2025-07-29 21:38:20', '2025-07-29 21:39:01', '2025-07-29 21:38:20'),
(37, 'd758ad01-0695-48f0-9364-911ded4c5df1', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', '16:20:00', 'BC MIX', 'PG 26 108BC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '16:20:00', '16:20:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 21:39:48', '2025-07-29 21:39:48', '2025-07-29 21:39:48', '2025-07-29 21:39:48', '', '', '2025-07-29 21:39:48', '2025-07-29 21:40:34', '2025-07-29 21:39:48'),
(38, 'e665e7cc-1bbd-49b8-ad45-6f385a390604', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', '16:40:00', 'BC MIX', 'PG 26 109BC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '16:40:00', '16:40:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 21:41:18', '2025-07-29 21:41:18', '2025-07-29 21:41:18', '2025-07-29 21:41:18', '', '', '2025-07-29 21:41:18', '2025-07-29 21:41:59', '2025-07-29 21:41:18'),
(39, 'b208ede0-4121-4fea-a416-c83e3f34d57b', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', '17:00:00', 'BC MIX', 'PG 26 110BC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '17:00:00', '17:00:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 21:43:10', '2025-07-29 21:43:10', '2025-07-29 21:43:10', '2025-07-29 21:43:10', '', '', '2025-07-29 21:43:10', '2025-07-29 21:43:40', '2025-07-29 21:43:10'),
(40, 'a27a0e67-e51b-40e5-a7ba-46f5af3db6ca', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', '17:20:00', 'BC MIX', 'PG 26 111BC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '17:20:00', '17:20:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 21:44:48', '2025-07-29 21:44:48', '2025-07-29 21:44:48', '2025-07-29 21:44:48', '', '', '2025-07-29 21:44:48', '2025-07-29 21:45:32', '2025-07-29 21:44:48'),
(41, '78870e41-cfa4-437a-97bb-3c9b86113c2f', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', '17:40:00', 'BC MIX', 'PG 26 112AC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '17:40:00', '17:40:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 21:46:25', '2025-07-29 21:46:25', '2025-07-29 21:46:25', '2025-07-29 21:46:25', '', '', '2025-07-29 21:46:25', '2025-07-29 21:47:18', '2025-07-29 21:46:25'),
(42, '8c9a068d-5ed8-4f8a-a055-b254c3e6245c', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', '18:00:00', 'BC MIX', 'PG 26 113AC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '18:00:00', '18:00:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 21:48:01', '2025-07-29 21:48:01', '2025-07-29 21:48:01', '2025-07-29 21:48:01', '', '', '2025-07-29 21:48:01', '2025-07-29 21:48:40', '2025-07-29 21:48:01'),
(43, 'f39081a7-11c7-4b2e-81bc-596a68f5163c', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', '20:00:00', 'BC MIX', 'PG 26114AC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '20:00:00', '20:00:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 21:49:46', '2025-07-29 21:49:46', '2025-07-29 21:49:46', '2025-07-29 21:49:46', '', '', '2025-07-29 21:49:46', '2025-07-29 21:50:56', '2025-07-29 21:49:46'),
(44, 'c8ccf266-54f3-4bd8-9d4b-1e17a8e2ab54', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', '20:30:00', 'BC MIX', 'PG 26115AC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '20:30:00', '20:30:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-29 21:51:58', '2025-07-29 21:51:58', '2025-07-29 21:51:58', '2025-07-29 21:51:58', '', '', '2025-07-29 21:51:58', '2025-07-29 21:52:47', '2025-07-29 21:51:58'),
(45, '6996c935-b640-4b5f-84d3-00694b0be372', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '15:00:00', 'BC MIX', 'PG 26 130 CC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '15:00:00', '15:00:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-30 21:10:28', '2025-07-30 21:10:28', '2025-07-30 21:10:28', '2025-07-30 21:10:28', '', '', '2025-07-30 21:10:28', '2025-07-30 21:11:13', '2025-07-30 21:10:28'),
(46, '56442798-a9d7-42a0-a0b9-a1777495e145', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '15:20:00', 'BC MIX', 'PG 26 131 CC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '15:20:00', '15:20:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-30 21:11:56', '2025-07-30 21:11:56', '2025-07-30 21:11:56', '2025-07-30 21:11:56', '', '', '2025-07-30 21:11:56', '2025-07-30 21:13:10', '2025-07-30 21:11:56'),
(47, 'b1c00108-05fc-4a13-97cb-e1e8e750b73c', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '15:40:00', 'BC MIX', 'PG 29 101 CC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '15:40:00', '03:40:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-30 21:14:22', '2025-07-30 21:14:22', '2025-07-30 21:14:22', '2025-07-30 21:14:22', '', '', '2025-07-30 21:14:22', '2025-07-30 21:15:44', '2025-07-30 21:14:22'),
(48, '45a120bc-b844-4959-97f3-4b232751d8a2', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '16:00:00', 'BC MIX', 'PG 29 102 CC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '16:00:00', '16:00:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-30 21:16:53', '2025-07-30 21:16:53', '2025-07-30 21:16:53', '2025-07-30 21:16:53', '', '', '2025-07-30 21:16:53', '2025-07-30 21:17:55', '2025-07-30 21:16:53'),
(49, '07c3a581-db81-41e3-a460-b7a43cf517d5', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '16:20:00', 'BC MIX', 'PG 29 103 CC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '16:20:00', '16:20:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-30 21:19:11', '2025-07-30 21:19:11', '2025-07-30 21:19:11', '2025-07-30 21:19:11', '', '', '2025-07-30 21:19:11', '2025-07-30 21:19:56', '2025-07-30 21:19:11'),
(50, '17dc3ca2-d89c-4d40-8e0a-98be227af418', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '16:40:00', 'BC MIX', 'PG 29 104 CC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '16:40:00', '16:40:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-30 21:21:15', '2025-07-30 21:21:15', '2025-07-30 21:21:15', '2025-07-30 21:21:15', '', '', '2025-07-30 21:21:15', '2025-07-30 21:21:53', '2025-07-30 21:21:15'),
(51, '03cadefc-7520-48b3-95a0-e2e95c1425e1', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '17:00:00', 'BC MIX', 'PG 29 105 CC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '17:00:00', '17:00:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-30 21:23:01', '2025-07-30 21:23:01', '2025-07-30 21:23:01', '2025-07-30 21:23:01', '', '', '2025-07-30 21:23:01', '2025-07-30 21:23:36', '2025-07-30 21:23:01'),
(52, '2de3a43f-655b-4470-b324-5f92d46c0b3c', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '17:20:00', 'BC MIX', 'PG 29 106 CC0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '17:20:00', '17:20:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-30 21:24:23', '2025-07-30 21:24:23', '2025-07-30 21:24:23', '2025-07-30 21:24:23', '', '', '2025-07-30 21:24:23', '2025-07-30 21:25:21', '2025-07-30 21:24:23'),
(53, '0d66368f-3a65-407d-9247-2c04c10b258c', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '17:40:00', 'BC MIX', 'PG 29 107 BC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '17:40:00', '17:40:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-30 21:25:55', '2025-07-30 21:25:55', '2025-07-30 21:25:55', '2025-07-30 21:25:55', '', '', '2025-07-30 21:25:55', '2025-07-30 21:27:35', '2025-07-30 21:25:55'),
(54, '13f6a312-53d8-469d-b3c8-5d64e17d18a9', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '18:00:00', 'BC MIX', 'PG 29 108 BC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '18:00:00', '18:00:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-30 21:28:54', '2025-07-30 21:28:54', '2025-07-30 21:28:54', '2025-07-30 21:28:54', '', '', '2025-07-30 21:28:54', '2025-07-30 21:29:30', '2025-07-30 21:28:54'),
(55, 'f26c5c79-8226-4ac5-8083-03c97afb1e55', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '18:30:00', 'BC MIX', 'PG 29 109 BC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '18:30:00', '18:31:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-30 21:30:05', '2025-07-30 21:30:05', '2025-07-30 21:30:05', '2025-07-30 21:30:05', '', '', '2025-07-30 21:30:05', '2025-07-30 21:31:15', '2025-07-30 21:30:05'),
(56, '9a45cdf9-17af-4c9a-b280-65129f2e409d', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '20:00:00', 'BC MIX', 'PG 29 110 BC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '21:00:00', '00:00:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-30 21:31:56', '2025-07-30 21:31:56', '2025-07-30 21:31:56', '2025-07-30 21:31:56', '', '', '2025-07-30 21:31:56', '2025-07-30 21:32:22', '2025-07-30 21:31:56'),
(57, 'a8faad41-68b9-4b77-aad5-a8b7f0ff9217', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '20:30:00', 'BC MIX', 'PG 29 111 BC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '20:30:00', '20:30:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-30 21:32:57', '2025-07-30 21:32:57', '2025-07-30 21:32:57', '2025-07-30 21:32:57', '', '', '2025-07-30 21:32:57', '2025-07-30 21:34:07', '2025-07-30 21:32:57'),
(58, 'f8db4e6f-32e5-4623-9a5f-7aca2e009cf8', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '21:00:00', 'BC MIX', 'PG 29 112 BC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '21:00:00', '21:00:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-30 21:34:48', '2025-07-30 21:34:48', '2025-07-30 21:34:48', '2025-07-30 21:34:48', '', '', '2025-07-30 21:34:48', '2025-07-30 22:37:29', '2025-07-30 21:34:48'),
(59, 'd5b44d53-c14d-44ec-98df-84ff7e64cfea', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '21:30:00', 'BC MIX', 'PG 29 113 BC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '21:30:00', '21:30:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-30 22:32:57', '2025-07-30 22:32:57', '2025-07-30 22:32:57', '2025-07-30 22:32:57', '', '', '2025-07-30 22:32:57', '2025-07-30 22:38:16', '2025-07-30 22:32:57'),
(60, '110ca47f-cc59-4f04-978a-ab4fa8d70cf1', 'purkoni', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '22:00:00', 'BC MIX', 'PG 29 114 BC0', '011', '1', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '22:00:00', '22:00:00', 'OK', 'OK', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-30 22:34:35', '2025-07-30 22:34:35', '2025-07-30 22:34:35', '2025-07-30 22:34:35', '', '', '2025-07-30 22:34:35', '2025-07-30 22:38:55', '2025-07-30 22:34:35'),
(61, '5baff550-381a-48b6-be9f-9f8b71b64192', 'anifta.leli', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', '23:40:00', 'BC MIX', 'PG 29 115 BB0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '23:40:00', '23:40:00', '', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-31 05:46:49', '2025-07-31 05:46:49', '2025-07-31 05:46:49', '2025-07-31 05:46:49', '', '', '2025-07-31 05:46:49', '2025-07-31 06:48:48', '2025-07-31 05:46:49'),
(62, '5c11b36d-8f23-487c-86c0-e5a7428f6234', 'anifta.leli', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', '12:00:00', 'BC MIX', 'PG 29 116 BB0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '00:00:00', '00:00:00', '', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-31 05:47:48', '2025-07-31 05:47:48', '2025-07-31 05:47:48', '2025-07-31 05:47:48', '', '', '2025-07-31 05:47:48', '2025-07-31 06:48:26', '2025-07-31 05:47:48'),
(63, '30e71e36-c966-4546-afbf-ed73eeceb108', 'anifta.leli', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', '00:20:00', 'BC MIX', 'PG 29 117 BB0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '00:20:00', '00:20:00', '', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-31 05:48:42', '2025-07-31 05:48:42', '2025-07-31 05:48:42', '2025-07-31 05:48:42', '', '', '2025-07-31 05:48:42', '2025-07-31 06:48:17', '2025-07-31 05:48:42'),
(64, '9a1806b7-3692-4f9d-b33d-1f03b7a9244c', 'anifta.leli', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', '00:40:00', 'BC MIX', 'PG 29 118 BB0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '00:40:00', '00:39:00', '', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-31 05:49:21', '2025-07-31 05:49:21', '2025-07-31 05:49:21', '2025-07-31 05:49:21', '', '', '2025-07-31 05:49:21', '2025-07-31 06:48:04', '2025-07-31 05:49:21'),
(65, '721f2fac-0ff7-444f-94e6-a913fcecdf46', 'anifta.leli', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', '01:00:00', 'BC MIX', 'PG 29 119 BB0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '01:00:00', '01:00:00', '', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-31 05:49:49', '2025-07-31 05:49:49', '2025-07-31 05:49:49', '2025-07-31 05:49:49', '', '', '2025-07-31 05:49:49', '2025-07-31 06:47:57', '2025-07-31 05:49:49'),
(66, '817dc81c-dc95-4676-b22c-77f83080f820', 'anifta.leli', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', '01:20:00', 'BC MIX', 'PG 29 120 BB0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '01:20:00', '01:20:00', '', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-31 05:50:23', '2025-07-31 05:50:23', '2025-07-31 05:50:23', '2025-07-31 05:50:23', '', '', '2025-07-31 05:50:23', '2025-07-31 06:47:42', '2025-07-31 05:50:23'),
(67, '1711556f-0260-4a5e-b6ab-61d6810283d6', 'anifta.leli', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', '01:40:00', 'BC MIX', 'PG 29 121 AB0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'tidak_terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '01:40:00', '01:40:00', '', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-31 06:39:42', '2025-07-31 06:39:42', '2025-07-31 06:39:42', '2025-07-31 06:39:42', '', '', '2025-07-31 06:39:42', '2025-07-31 06:46:44', '2025-07-31 06:39:42'),
(68, '58c7077d-5d45-4103-8870-ed3322f6a5c3', 'anifta.leli', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', '02:00:00', 'BC MIX', 'PG 29 122 AB0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '02:00:00', '02:00:00', '', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-31 06:40:12', '2025-07-31 06:40:12', '2025-07-31 06:40:12', '2025-07-31 06:40:12', '', '', '2025-07-31 06:40:12', '2025-07-31 06:46:21', '2025-07-31 06:40:12'),
(69, '884573cd-e0a1-43d1-87cc-6d5349351dbd', 'anifta.leli', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', '02:20:00', 'BC MIX', 'PG 29 123 AB0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '02:20:00', '02:20:00', '', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-31 06:40:44', '2025-07-31 06:40:44', '2025-07-31 06:40:44', '2025-07-31 06:40:44', '', '', '2025-07-31 06:40:44', '2025-07-31 06:45:58', '2025-07-31 06:40:44'),
(70, '0e4ed0c7-aaf0-4080-9496-0668c2996532', 'anifta.leli', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', '05:10:00', 'BC MIX', 'PG 29 124 AB0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '05:10:00', '05:10:00', '', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-31 06:41:19', '2025-07-31 06:41:19', '2025-07-31 06:41:19', '2025-07-31 06:41:19', '', '', '2025-07-31 06:41:19', '2025-07-31 06:45:32', '2025-07-31 06:41:19'),
(71, '57111ac8-7c77-4c21-b59d-eaa16845c510', 'anifta.leli', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', '05:30:00', 'BC MIX', 'PG 29 125 AB0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '05:30:00', '05:30:00', '', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-31 06:41:51', '2025-07-31 06:41:51', '2025-07-31 06:41:51', '2025-07-31 06:41:51', '', '', '2025-07-31 06:41:51', '2025-07-31 06:43:39', '2025-07-31 06:41:51'),
(72, '5c5a42fd-57fc-4de4-bd33-bb5b6b4ba5b8', 'anifta.leli', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', '05:50:00', 'BC MIX', 'PG 29 126 AB0', '011', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '05:50:00', '05:50:00', '', '', 'Ahmad', '', '0000-00-00', '', '', '', '', '', '', '', 'Ahmad', '1', '', '1', '', '0', '', '0', '', '2025-07-31 06:42:23', '2025-07-31 06:42:23', '2025-07-31 06:42:23', '2025-07-31 06:42:23', '', '', '2025-07-31 06:42:23', '2025-07-31 06:43:24', '2025-07-31 06:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `mixing`
--

CREATE TABLE `mixing` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `proses_produksi` longtext DEFAULT NULL,
  `proses_packing` longtext DEFAULT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jenis_produk` varchar(255) NOT NULL,
  `kode_produksi` varchar(255) NOT NULL,
  `tegu_kode` varchar(255) NOT NULL,
  `tegu_berat` int(11) NOT NULL,
  `tegu_sens` varchar(255) NOT NULL,
  `tapioka_kode` varchar(255) NOT NULL,
  `tapioka_berat` int(11) NOT NULL,
  `tapioka_sens` varchar(255) NOT NULL,
  `ragi_kode` varchar(255) NOT NULL,
  `ragi_berat` int(11) NOT NULL,
  `ragi_sens` varchar(255) NOT NULL,
  `bread_kode` varchar(255) NOT NULL,
  `bread_berat` int(11) NOT NULL,
  `bread_sens` varchar(255) NOT NULL,
  `premix` longtext NOT NULL,
  `shortening_kode` varchar(255) NOT NULL,
  `shortening_berat` int(11) NOT NULL,
  `shortening_sens` varchar(255) NOT NULL,
  `chill_water_kode` varchar(255) NOT NULL,
  `chill_water_berat` int(11) NOT NULL,
  `chill_water_sens` varchar(255) NOT NULL,
  `mix_dough_waktu_1` float NOT NULL,
  `mix_dough_waktu_2` float NOT NULL,
  `mix_dough_hasil` varchar(255) NOT NULL,
  `mix_dough_mesin` varchar(255) NOT NULL,
  `mix_dough_cutting` int(11) NOT NULL,
  `mix_dough_sens` varchar(255) NOT NULL,
  `mix_dough_suhu_ruang` varchar(255) NOT NULL,
  `mix_dough_rh_ruang` varchar(255) NOT NULL,
  `mix_dough_suhu_adonan` float NOT NULL,
  `fermen_suhu` float NOT NULL,
  `fermen_rh` float NOT NULL,
  `fermen_jam_mulai` time NOT NULL,
  `fermen_jam_selesai` time NOT NULL,
  `fermen_lama_proses` int(11) NOT NULL,
  `fermen_hasil_proof` varchar(255) NOT NULL,
  `electric_baking_suhu` float NOT NULL,
  `electric_baking_mesin` varchar(255) NOT NULL,
  `electric_baking_expand` varchar(255) NOT NULL,
  `electric_baking_time_high` varchar(255) NOT NULL,
  `electric_baking_time_low` varchar(255) NOT NULL,
  `sens_kematangan` varchar(255) NOT NULL,
  `sens_rasa` varchar(255) NOT NULL,
  `sens_aroma` varchar(255) NOT NULL,
  `sens_tekstur` varchar(255) NOT NULL,
  `sens_warna` varchar(255) NOT NULL,
  `date_stall` date NOT NULL,
  `shift_pack` varchar(255) NOT NULL,
  `stall_jam_mulai` time NOT NULL,
  `stall_jam_berhenti` time NOT NULL,
  `stall_aging` float NOT NULL,
  `stall_kadar_air` float NOT NULL,
  `hasil_grinding` varchar(255) NOT NULL,
  `keterangan_grinding` varchar(255) NOT NULL,
  `dry_suhu` float NOT NULL,
  `dry_rotasi` float NOT NULL,
  `dry_kadar_air` float NOT NULL,
  `produk_hasil` varchar(255) NOT NULL,
  `produk_rasa` varchar(255) NOT NULL,
  `produk_aroma` varchar(255) NOT NULL,
  `produk_tekstur` varchar(255) NOT NULL,
  `produk_warna` varchar(255) NOT NULL,
  `packing_nama_produk` varchar(255) NOT NULL,
  `packing_kode_kemasan` varchar(255) NOT NULL,
  `gambar_kode_kemasan` varchar(255) DEFAULT NULL,
  `packing_bb` date NOT NULL,
  `packing_kondisi_kemasan` varchar(255) NOT NULL,
  `gambar_kondisi_kemasan` varchar(255) DEFAULT NULL,
  `packing_ketepatan` varchar(255) NOT NULL,
  `packing_suhu_before` varchar(255) NOT NULL,
  `packing_kadar_air` varchar(255) NOT NULL,
  `packing_bulk_density` varchar(255) NOT NULL,
  `packing_kode_supplier` varchar(255) NOT NULL,
  `packing_net_weight` varchar(255) NOT NULL,
  `catatan_packing` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `nama_spv` varchar(255) NOT NULL,
  `tgl_update` datetime NOT NULL DEFAULT current_timestamp(),
  `tgl_update_prod` datetime NOT NULL DEFAULT current_timestamp(),
  `catatan_spv` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mixing`
--

INSERT INTO `mixing` (`id`, `uuid`, `username`, `plant`, `date`, `shift`, `proses_produksi`, `proses_packing`, `nama_produk`, `jenis_produk`, `kode_produksi`, `tegu_kode`, `tegu_berat`, `tegu_sens`, `tapioka_kode`, `tapioka_berat`, `tapioka_sens`, `ragi_kode`, `ragi_berat`, `ragi_sens`, `bread_kode`, `bread_berat`, `bread_sens`, `premix`, `shortening_kode`, `shortening_berat`, `shortening_sens`, `chill_water_kode`, `chill_water_berat`, `chill_water_sens`, `mix_dough_waktu_1`, `mix_dough_waktu_2`, `mix_dough_hasil`, `mix_dough_mesin`, `mix_dough_cutting`, `mix_dough_sens`, `mix_dough_suhu_ruang`, `mix_dough_rh_ruang`, `mix_dough_suhu_adonan`, `fermen_suhu`, `fermen_rh`, `fermen_jam_mulai`, `fermen_jam_selesai`, `fermen_lama_proses`, `fermen_hasil_proof`, `electric_baking_suhu`, `electric_baking_mesin`, `electric_baking_expand`, `electric_baking_time_high`, `electric_baking_time_low`, `sens_kematangan`, `sens_rasa`, `sens_aroma`, `sens_tekstur`, `sens_warna`, `date_stall`, `shift_pack`, `stall_jam_mulai`, `stall_jam_berhenti`, `stall_aging`, `stall_kadar_air`, `hasil_grinding`, `keterangan_grinding`, `dry_suhu`, `dry_rotasi`, `dry_kadar_air`, `produk_hasil`, `produk_rasa`, `produk_aroma`, `produk_tekstur`, `produk_warna`, `packing_nama_produk`, `packing_kode_kemasan`, `gambar_kode_kemasan`, `packing_bb`, `packing_kondisi_kemasan`, `gambar_kondisi_kemasan`, `packing_ketepatan`, `packing_suhu_before`, `packing_kadar_air`, `packing_bulk_density`, `packing_kode_supplier`, `packing_net_weight`, `catatan_packing`, `nama_produksi`, `catatan_produksi`, `status_produksi`, `catatan`, `status_spv`, `nama_spv`, `tgl_update`, `tgl_update_prod`, `catatan_spv`, `created_at`, `modified_at`, `updated_at`) VALUES
(35, '3c0a1cf7-9c93-4132-b513-f46933db63e6', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-28', '1', NULL, NULL, 'BC Orange', 'BC Orange', 'PG28112A', 'Q607E18', 32960, 'oke', '28062025', 27600, 'oke', 'P20072025', 7320, 'oke', '1127062025', 380, 'oke', '[{\"kode\":\"PF11101AA0\",\"berat\":\"0231\",\"sens\":\"oke\"},{\"kode\":\"PG09101AA0\",\"berat\":\"2360\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"5080\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '01', 660, '', '29', '71', 30.4, 35, 80, '07:20:00', '08:50:00', 70, '', 96.8, '09', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-28', '2', '08:30:00', '20:30:00', 0, 34, '', '', 90, 4, 6.63, 'oke', 'oke', 'oke', 'oke', 'oke', 'BC Orange', 'PG28112A', NULL, '2026-07-28', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-28 13:03:15', '2025-07-28 13:03:15', '', '2025-07-28 13:03:15', '2025-07-28 22:34:57', '2025-07-29 09:43:54'),
(36, 'd38daf32-5289-4ddb-8b7d-e6e810074f4f', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-28', '1', NULL, NULL, 'BC Orange', 'BC Orange', 'PG28113A', 'Q607E18', 32960, 'oke', '28062025', 27600, 'oke', 'P20072025', 7320, 'oke', '1127062025', 380, 'oke', '[{\"kode\":\"PF11101AA0\",\"berat\":\"0231\",\"sens\":\"oke\"},{\"kode\":\"PG09101AA0\",\"berat\":\"2370\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"5080\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '02', 650, '', '29', '71', 30.3, 35, 80, '07:40:00', '08:50:00', 70, '', 97, '10', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-28', '2', '08:50:00', '21:00:00', 0, 34, '', '', 90, 4, 6.65, 'oke', 'oke', 'oke', 'oke', 'oke', 'BC Orange', 'PG28113A', NULL, '2026-07-28', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-28 13:28:53', '2025-07-28 13:28:53', '', '2025-07-28 13:28:53', '2025-07-28 22:39:47', '2025-07-29 09:43:54'),
(37, 'e0e3d125-e43d-4891-a215-6bdef29cf8e9', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-28', '1', NULL, NULL, 'BC Orange', 'BC Orange', 'PG28114A', 'Q607E18', 32960, 'oke', '28062025', 27600, 'oke', 'P20072025', 380, 'oke', '1127062025', 380, 'oke', '[{\"kode\":\"PF11101AA0\",\"berat\":\"0231\",\"sens\":\"oke\"},{\"kode\":\"PG09101AA0\",\"berat\":\"2360\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"5080\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '04', 650, '', '29', '71', 30.3, 35, 80, '08:00:00', '09:10:00', 70, '', 96.8, '11', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-28', '1', '09:10:00', '21:30:00', 0, 34, '', '', 90, 4, 6.68, 'oke', 'oke', 'oke', 'oke', 'oke', 'BC Orange', 'PG28114A', NULL, '2026-07-28', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-28 13:37:12', '2025-07-28 13:37:12', '', '2025-07-28 13:37:12', '2025-07-28 22:41:59', '2025-07-29 09:43:54'),
(38, 'caa8199f-a4d7-4bc9-bcec-d6ad91e37d3f', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-28', '1', NULL, NULL, 'BC Orange', 'BC Orange', 'PG28115A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '2025-07-28', '1', '09:30:00', '22:00:00', 0, 34, '', '', 90, 4, 6.7, 'oke', 'oke', 'oke', 'oke', 'oke', 'BC Orange', 'PG28115AC0', NULL, '2026-07-28', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-28 14:13:05', '2025-07-28 14:13:05', '', '2025-07-28 14:13:05', '2025-07-28 22:45:16', '2025-07-29 09:43:54'),
(39, '90ac74b6-cdd8-486a-846f-183b1a3fa72d', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-28', '1', NULL, NULL, 'BC Orange', 'BC Orange', 'PG28116A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 11, 0, '1', '05', 650, '', '29', '71', 30.4, 35, 80, '08:20:00', '09:30:00', 70, '', 0, '', '', '', '', '', '', '', '', '', '2025-07-28', '2', '09:30:00', '22:30:00', 0, 34, '', '', 90, 4, 6.72, 'oke', 'oke', 'oke', 'oke', 'oke', 'BC Orange', 'PG28116AC0', NULL, '2026-07-28', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-28 14:13:15', '2025-07-28 14:13:15', '', '2025-07-28 14:13:15', '2025-07-29 01:49:26', '2025-07-29 09:43:54'),
(41, 'a0a77eb6-cb45-4227-bf21-c88ed364a6a7', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-28', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG25135C', 'Q507A14', 32924, 'oke', '28062025', 22700, 'oke', 'P20072025', 7320, 'oke', '1127062025', 0, 'oke', '[{\"kode\":\"PG09101AA0\",\"berat\":\"0.070\",\"sens\":\"oke\"},{\"kode\":\"PF11101AA0\",\"berat\":\"0.060\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.2', 180, 'oke', 11, 0, '1', '1', 650, '', '30.6', '70', 30.8, 35, 80, '15:15:00', '16:25:00', 70, '', 95, '2', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-28 20:06:58', '2025-07-28 20:06:58', '', '2025-07-28 20:06:58', '2025-07-28 20:44:57', '2025-07-29 09:43:54'),
(42, 'bc7f1ee0-7107-4494-8a38-776fc04e1c32', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-28', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG25136C', 'Q507A14', 32924, 'oke', '28062025', 22700, 'oke', 'P20072025', 7320, 'oke', '1127062025', 0, 'oke', '[{\"kode\":\"PF11101AA0\",\"berat\":\"0.070\",\"sens\":\"oke\"},{\"kode\":\"PG09101AA0\",\"berat\":\"0.060\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '2', 650, '', '30.6', '70', 30.4, 35, 80, '16:00:00', '17:10:00', 70, '', 96.2, '5', '83', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-28 20:20:20', '2025-07-28 20:20:20', '', '2025-07-28 20:20:20', '2025-07-28 20:47:49', '2025-07-29 09:43:54'),
(43, 'ca483fbf-4e19-4522-aee4-8ca60eff1c8c', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-28', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG25137C', 'Q507A14', 32924, 'oke', '28062025', 22700, 'oke', 'P20072025', 7320, 'oke', '1127062025', 0, 'oke', '[{\"kode\":\"PG09101AA0\",\"berat\":\"0.070\",\"sens\":\"oke\"},{\"kode\":\"PF11101AA0\",\"berat\":\"0.060\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.8', 180, 'oke', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-28 20:48:29', '2025-07-28 20:48:29', '', '2025-07-28 20:48:29', '2025-07-28 20:52:22', '2025-07-29 09:43:54'),
(44, 'caa81ffd-6ff1-4a21-9399-7d8d99a82a54', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-28', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG25138C', 'Q507A14', 32924, 'oke', '28062025', 22700, 'oke', 'P20072025', 7320, 'oke', '1127062025', 0, 'oke', '[{\"kode\":\"PG09101AA0\",\"berat\":\"0.070\",\"sens\":\"oke\"},{\"kode\":\"PF11101AA0\",\"berat\":\"0.060\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '03', 650, '', '30.5', '70', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 97, '4', '83', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-28 20:52:53', '2025-07-28 20:52:53', '', '2025-07-28 20:52:53', '2025-07-28 20:59:31', '2025-07-29 09:43:54'),
(45, '992d17b9-129c-4100-ae21-0021fec367f1', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-28', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG25139C', 'Q507A14', 32924, 'oke', '28062025', 22700, 'oke', 'P20072025', 7320, 'oke', '1127062025', 0, 'oke', '[{\"kode\":\"PG09101AA0\",\"berat\":\"0.070\",\"sens\":\"oke\"},{\"kode\":\"PF11101AA0\",\"berat\":\"0.060\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '05', 650, '', '30.5', '70', 30.2, 35, 80, '16:20:00', '17:30:00', 70, '', 96.8, '05', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-28 21:00:18', '2025-07-28 21:00:18', '', '2025-07-28 21:00:18', '2025-07-28 21:11:17', '2025-07-29 09:43:54'),
(46, '09c0554d-2e98-4943-bbb1-a2ff2ecbe51f', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-28', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG25140C', 'Q507A14', 32924, 'oke', '28062025', 22700, 'oke', 'P20072025', 7320, 'oke', '1127062025', 380, 'oke', '[{\"kode\":\"PG09101AA0\",\"berat\":\"0.070\",\"sens\":\"oke\"},{\"kode\":\"PF11101AA0\",\"berat\":\"0.060\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.2', 180, 'oke', 11, 0, '1', '05', 650, '', '30.4', '70', 30.3, 35, 80, '17:00:00', '18:10:00', 70, '', 95, '05', '85', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-28 21:12:16', '2025-07-28 21:12:16', '', '2025-07-28 21:12:16', '2025-07-28 21:23:45', '2025-07-29 09:43:54'),
(47, 'eb002117-268a-42d5-a756-48c6582ce1d3', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-28', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG25141C', 'Q507A14', 2924, 'oke', '28062025', 22700, 'oke', 'P20072025', 7320, 'oke', '1127062025', 0, 'oke', '[{\"kode\":\"PG09101AA0\",\"berat\":\"0.070\",\"sens\":\"oke\"},{\"kode\":\"PF11101AA0\",\"berat\":\"0.060\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.2', 180, 'oke', 11, 0, '1', '05', 650, '', '30.4', '70', 30.7, 35, 79, '17:30:00', '18:40:00', 70, '', 94.6, '01', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-28 21:13:02', '2025-07-28 21:13:02', '', '2025-07-28 21:13:02', '2025-07-28 21:29:53', '2025-07-29 09:43:54'),
(48, '6712d895-8143-4b43-aa2e-4e85db252fb6', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-28', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG25142C', 'Q507A14', 32924, 'oke', '28062025', 22700, 'oke', 'P20072025', 7320, 'oke', '1127062025', 0, 'oke', '[{\"kode\":\"PG09101AA0\",\"berat\":\"0.070\",\"sens\":\"oke\"},{\"kode\":\"PF11101AA0\",\"berat\":\"0.060\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.4', 180, 'oke', 11, 0, '1', '01', 640, '', '30.4', '70', 30.3, 35, 80, '18:00:00', '19:10:00', 70, '', 94, '02', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-28 21:13:25', '2025-07-28 21:13:25', '', '2025-07-28 21:13:25', '2025-07-28 21:37:47', '2025-07-29 09:43:54'),
(49, '5e152716-38bd-4326-a592-2b4558542d7b', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-28', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG25143C', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 35, 80, '18:30:00', '19:40:00', 70, '', 96.6, '03', '83', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-28 21:39:06', '2025-07-28 21:39:06', '', '2025-07-28 21:39:06', '2025-07-28 21:44:28', '2025-07-29 09:43:54'),
(50, 'b4ae2e58-33bf-4da3-b963-0b4ca1e93ac2', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-28', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG25144C', 'Q507A14', 32924, 'oke', '28062025', 22700, 'oke', 'P20072025', 7320, 'oke', '1127062025', 0, 'oke', '[]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '03', 650, '', '30.2', '71', 30.8, 35, 80, '20:20:00', '21:30:00', 70, '', 93, '05', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-28 21:48:40', '2025-07-28 21:48:40', '', '2025-07-28 21:48:40', '2025-07-28 22:10:58', '2025-07-29 09:43:54'),
(51, 'c482b7f0-3fa5-4b23-b1ac-2b59e97594d8', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-28', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG25145C', 'Q507A14', 32924, 'oke', '28062025', 22700, 'oke', 'P20072025', 7320, 'oke', '1127062025', 0, 'oke', '[{\"kode\":\"PG09101AA0\",\"berat\":\"0.070\",\"sens\":\"oke\"},{\"kode\":\"PF11101AA0\",\"berat\":\"0.060\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '04', 650, '', '30.2', '71', 30.8, 35, 80, '21:10:00', '22:20:00', 70, '', 95, '2', '85', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-28 21:59:15', '2025-07-28 21:59:15', '', '2025-07-28 21:59:15', '2025-07-28 22:13:21', '2025-07-29 09:43:54'),
(52, 'bc757314-ed3a-40fe-9fc7-81a9c0c25005', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG26101B', 'Q607E18', 32924, 'oke', '28062025', 22700, 'oke', 'P20072025', 7320, 'oke', '1127062025', 380, 'oke', '[{\"kode\":\"PG09101AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PF11101AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '01', 650, '', '30.4', '70', 30.4, 35, 80, '23:20:00', '00:30:00', 70, '', 96.6, '10', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-29 00:07:40', '2025-07-29 00:07:40', '', '2025-07-29 00:07:40', '2025-07-29 00:28:36', '2025-07-29 09:43:54'),
(53, 'cc675e00-cc8f-457d-bc65-51e998182484', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG26102B', 'Q607E18', 32924, 'oke', '28062025', 22700, 'oke', 'P20072025', 7320, 'oke', '1127062025', 380, 'oke', '[{\"kode\":\"PG09101AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PF11101AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.2', 180, 'oke', 11, 0, '1', '02', 650, '', '30.6', '70', 30.4, 35, 80, '23:40:00', '00:50:00', 70, '', 96.4, '11', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-29 00:28:53', '2025-07-29 00:28:53', '', '2025-07-29 00:28:53', '2025-07-29 00:34:44', '2025-07-29 09:43:54'),
(54, 'dc1e87cb-6f24-4f10-ac24-e50042c9062a', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG26103B', 'Q507A14', 32924, 'oke', '28062025', 22700, 'oke', 'P20072025', 7320, 'oke', '1127062025', 380, 'oke', '[{\"kode\":\"PG09101AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PF11101AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.4', 180, 'oke', 11, 0, '1', '04', 650, '', '30.5', '71', 30.5, 35, 80, '00:00:00', '00:20:00', 70, '', 96.2, '12', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-29 00:29:06', '2025-07-29 00:29:06', '', '2025-07-29 00:29:06', '2025-07-29 00:39:44', '2025-07-29 09:43:54'),
(55, '112c6de6-8a42-4561-b2c1-598a6a8986c3', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG26104B', 'Q607E18', 32924, 'oke', '28062025', 22700, 'oke', 'P20072025', 7320, 'oke', '1127062025', 380, 'oke', '[{\"kode\":\"PG09101AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG15101AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 0, 0, '', '', 0, '', '', '', 0, 35, 80, '00:20:00', '01:30:00', 70, '', 0, '', '', '', '', '', '', '', '', '', '2025-07-29', '1', '01:30:00', '15:00:00', 0, 34, '', '', 90, 4, 5.12, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-29 00:29:26', '2025-07-29 00:29:26', '', '2025-07-29 00:29:26', '2025-07-29 17:01:07', '2025-07-29 09:43:54'),
(56, 'bdec948b-e2aa-4fa0-9f6b-ade9544db529', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG26105B', 'Q607E18', 32924, 'oke', '28062025', 22700, 'oke', 'P20072025', 7320, 'oke', '1127062025', 380, 'oke', '[{\"kode\":\"PG09101AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG15101AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.4', 180, 'oke', 11, 0, '1', '05', 650, '', '30.5', '71', 30.4, 35, 80, '00:50:00', '02:00:00', 70, '', 96.7, '09', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-29', '2', '02:00:00', '15:30:00', 0, 34, '', '', 90, 4, 5.15, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-29 00:29:58', '2025-07-29 00:29:58', '', '2025-07-29 00:29:58', '2025-07-29 18:44:35', '2025-07-29 09:43:54'),
(57, '1ba99fe0-1311-4282-b7ba-3677274553e1', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG26106B', 'Q607E18', 32924, 'oke', '28062025', 22700, 'oke', 'P20072025', 7320, 'oke', '1127062025', 380, 'oke', '[{\"kode\":\"PG09101AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG15101AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '02', 650, '', '30.6', '70', 30.4, 35, 80, '01:20:00', '02:30:00', 70, '', 96.8, '10', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-29', '2', '02:30:00', '16:00:00', 0, 34, '', '', 90, 4, 5.17, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-29 01:50:39', '2025-07-29 01:50:39', '', '2025-07-29 01:50:39', '2025-07-29 18:47:22', '2025-07-29 09:43:54'),
(58, '1f59907b-2443-4672-978f-4ed62e5a0e25', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG26107B', 'Q607E18', 32924, 'oke', '28062025', 22700, 'oke', 'P20072025', 7320, 'oke', '1127062025', 380, 'oke', '[{\"kode\":\"PG09101AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG15101AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '04', 650, '', '30.6', '70', 30.3, 35, 80, '01:40:00', '02:50:00', 70, '', 96.8, '11', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-29', '2', '02:50:00', '17:40:00', 0, 33, '', '', 90, 4, 6.65, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-29 02:07:29', '2025-07-29 02:07:29', '', '2025-07-29 02:07:29', '2025-07-30 18:41:56', '2025-07-29 09:43:54'),
(59, '8cbec039-d4bf-49f4-9ea0-d98cc9653a66', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG26108B', 'Q607E18', 32924, 'oke', '28062025', 22700, 'oke', 'P20072025', 7320, 'oke', '1127062025', 380, 'oke', '[{\"kode\":\"PG09101AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG15101AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.4', 180, 'oke', 11, 0, '1', '05', 650, '', '30.6', '70', 30.3, 35, 80, '02:00:00', '03:10:00', 70, '', 96.6, '12', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-29', '2', '03:10:00', '16:40:00', 0, 34, '', '', 90, 4, 5.23, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-29 02:18:15', '2025-07-29 02:18:15', '', '2025-07-29 02:18:15', '2025-07-29 18:51:24', '2025-07-29 09:43:54'),
(60, '97d14fa8-d611-40c7-a8ca-2d0a924c537a', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG26109B', 'Q607E18', 32924, 'oke', '28062025', 22700, 'oke', 'P20072025', 7320, 'oke', '1127062025', 380, 'oke', '[{\"kode\":\"PG09101AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG15101AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '01', 650, '', '30.4', '71', 30.3, 35, 80, '04:30:00', '05:10:00', 70, '', 96.6, '09', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-29', '2', '05:10:00', '17:00:00', 0, 34, '', '', 90, 4, 5.26, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-29 05:47:27', '2025-07-29 05:47:27', '', '2025-07-29 05:47:27', '2025-07-29 18:54:14', '2025-07-29 09:43:54'),
(61, '0161664f-c4cc-4190-8747-3b01fe1507e2', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG26110B', 'Q607E18', 32924, 'oke', '28062025', 22700, 'oke', 'P20072025', 7320, 'oke', '1127062025', 380, 'oke', '[{\"kode\":\"PG09101AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG15101AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.4', 180, 'oke', 0, 0, '', '', 0, '', '', '', 0, 35, 80, '05:00:00', '06:10:00', 70, '', 96.8, '10', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-29', '2', '06:10:00', '17:20:00', 0, 34, '', '', 90, 4, 5.28, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-29 05:52:13', '2025-07-29 05:52:13', '', '2025-07-29 05:52:13', '2025-07-29 18:56:00', '2025-07-29 09:43:54'),
(62, '3ace4a23-1dd1-408e-967e-52b87c391849', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG26111B', 'Q607E18', 32924, 'oke', '28062025', 22700, 'oke', 'P20072025', 7320, 'oke', '1127062025', 380, 'oke', '[{\"kode\":\"PG09101AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG15101AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG09101AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.4', 180, 'oke', 11, 0, '1', '04', 650, '', '30.5', '71', 30.3, 35, 80, '05:30:00', '06:40:00', 70, '', 96.6, '11', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-29', '2', '06:40:00', '17:40:00', 0, 34, '', '', 90, 4, 5.1, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-29 06:41:55', '2025-07-29 06:41:55', '', '2025-07-29 06:41:55', '2025-07-29 18:57:34', '2025-07-29 09:43:54'),
(66, '5f112984-ef40-4278-9195-74e7e7324c09', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 26 112 A', 'Q607E18', 32924, 'oke', '280625', 22700, 'oke', 'P200725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 09 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '5', 650, '', '30', '70', 29, 35, 80, '07:10:00', '08:20:00', 70, '', 0, '', '', '', '', '', '', '', '', '', '2025-07-29', '2', '08:20:00', '18:00:00', 0, 34, '', '', 90, 4, 5.15, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-29 15:44:45', '2025-07-29 15:44:45', '', '2025-07-29 15:44:45', '2025-07-29 19:02:00', '2025-07-29 15:44:45'),
(67, '9c234271-eb61-4fd4-b812-7ecc8f1d146d', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 26 113 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '2025-07-29', '2', '08:40:00', '18:30:00', 0, 34, '', '', 90, 4, 5.18, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-29 15:44:59', '2025-07-29 15:44:59', '', '2025-07-29 15:44:59', '2025-07-29 19:04:55', '2025-07-29 15:44:59'),
(68, 'a30a940e-f0db-47f1-9ec4-c0cd16b2da87', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 26 114 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '2025-07-29', '2', '09:00:00', '20:00:00', 0, 5.2, '', '', 90, 4, 5.2, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-29 15:45:08', '2025-07-29 15:45:08', '', '2025-07-29 15:45:08', '2025-07-29 19:07:25', '2025-07-29 15:45:08'),
(69, '5f2040c1-db12-491c-a35e-b0bb44fcd50b', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 26 115 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '2025-07-29', '2', '09:20:00', '20:30:00', 0, 34, '', '', 90, 4, 5.25, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-29 15:45:21', '2025-07-29 15:45:21', '', '2025-07-29 15:45:21', '2025-07-29 20:48:44', '2025-07-29 15:45:21'),
(70, '1cffc0e8-7b8f-4454-b378-93c9c029a3b7', 'feriagus', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 26 116 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-29 15:45:36', '2025-07-29 15:45:36', '', '2025-07-29 15:45:36', '2025-07-29 15:45:36', '2025-07-29 15:45:36'),
(71, '3fa61d5e-ecba-4000-8efa-3a4425551e00', 'feriagus', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 26 117 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-29 15:45:45', '2025-07-29 15:45:45', '', '2025-07-29 15:45:45', '2025-07-29 15:45:45', '2025-07-29 15:45:45'),
(72, 'bd8923be-4525-4b3a-ac28-ad41baa49643', 'feriagus', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 26 118 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-29 15:45:53', '2025-07-29 15:45:53', '', '2025-07-29 15:45:53', '2025-07-29 15:45:53', '2025-07-29 15:45:53'),
(73, 'c5bd3b4a-8bb6-4c3b-8eb8-4d168ed36073', 'feriagus', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 26 119 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-29 15:45:59', '2025-07-29 15:45:59', '', '2025-07-29 15:45:59', '2025-07-29 15:45:59', '2025-07-29 15:45:59'),
(74, '325503f3-7fea-4d5f-aaa0-922661bbdf88', 'feriagus', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 26 120 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-29 15:46:06', '2025-07-29 15:46:06', '', '2025-07-29 15:46:06', '2025-07-29 15:46:06', '2025-07-29 15:46:06'),
(75, '0436183a-5431-41b0-a356-e229a4919932', 'feriagus', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 26 121 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-29 15:46:12', '2025-07-29 15:46:12', '', '2025-07-29 15:46:12', '2025-07-29 15:46:12', '2025-07-29 15:46:12'),
(76, '88123fa0-318a-4bfb-8522-cca3f1dac501', 'feriagus', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 26 122 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-29 15:46:19', '2025-07-29 15:46:19', '', '2025-07-29 15:46:19', '2025-07-29 15:46:19', '2025-07-29 15:46:19'),
(77, '53a010c0-bc69-4e72-8f67-fe6dd04a66be', 'feriagus', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 26 123 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-29 15:46:36', '2025-07-29 15:46:36', '', '2025-07-29 15:46:36', '2025-07-29 15:46:36', '2025-07-29 15:46:36'),
(78, 'e4a3fa72-e71c-4baa-81f1-bbd65a054372', 'feriagus', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 26 124 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 11, 0, '1', '5', 650, '', '30', '70', 30.3, 35, 80, '04:30:00', '05:40:00', 70, '', 96.7, '09', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-29 15:46:47', '2025-07-29 15:46:47', '', '2025-07-29 15:46:47', '2025-07-29 15:57:28', '2025-07-29 15:46:47'),
(79, '4e9bfde7-dc86-4ef9-b056-3eaf982bb009', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 26 125C', 'Q607E18', 32924, 'oke', '280625', 22700, 'oke', 'P200725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG15101AA0\",\"berat\":\"0.060\",\"sens\":null},{\"kode\":\"PG 09 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.5', 180, 'oke', 11, 0, '1', '1', 650, '', '30', '70', 30.5, 35, 80, '15:15:00', '16:25:00', 70, '', 96.2, '09', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 90, 4, 5.15, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-29 16:26:55', '2025-07-29 16:26:55', '', '2025-07-29 16:26:55', '2025-07-29 19:07:36', '2025-07-29 16:26:55'),
(80, 'af9fc908-e94c-42ab-ac19-0d055fcc3250', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 26 126C', 'Q607E18', 32924, 'oke', '280625', 22700, 'oke', 'P200725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0.060\",\"sens\":null},{\"kode\":\"PG 09 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.6', 180, 'oke', 11, 0, '1', '2', 6, '', '30', '70', 30.7, 3, 80, '15:30:00', '16:40:00', 70, '', 96.4, '10', '83', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-29 19:07:58', '2025-07-29 19:07:58', '', '2025-07-29 19:07:58', '2025-07-29 19:12:09', '2025-07-29 19:07:58'),
(81, 'd451f3b6-ba3a-44ec-8f4d-7eaed0b38d2a', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 26 127C', 'Q607E18', 32924, 'oke', '280625', 22700, 'oke', 'P200725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 09 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.6', 180, 'oke', 11, 0, '1', '3', 650, '', '30.4', '70', 30.4, 35, 80, '16:00:00', '17:10:00', 70, '', 95, '11', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-29 19:12:37', '2025-07-29 19:12:37', '', '2025-07-29 19:12:37', '2025-07-29 19:29:25', '2025-07-29 19:12:37'),
(82, 'b662f42b-c80e-49fa-b495-6532c3601e36', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 26 128C', 'Q607E18', 32924, 'oke', '280625', 22700, 'oke', 'P200725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 09 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.2', 180, 'oke', 11, 0, '1', '4', 650, '', '30', '70', 30, 35, 80, '16:30:00', '17:40:00', 70, '', 96, '12', '85', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-29 19:29:38', '2025-07-29 19:29:38', '', '2025-07-29 19:29:38', '2025-07-29 19:38:42', '2025-07-29 19:29:38'),
(83, '72b0578a-7950-4e9a-b155-9690393d868c', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 26 129C', 'Q607E18', 32924, 'oke', '280625', 22700, 'oke', 'P200725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 09 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.7', 180, 'oke', 11, 0, '1', '1', 650, '', '29', '71', 30.3, 35, 80, '17:00:00', '18:10:00', 70, '', 96.7, '13', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-29 19:39:36', '2025-07-29 19:39:36', '', '2025-07-29 19:39:36', '2025-07-29 19:43:28', '2025-07-29 19:39:36'),
(84, '853a9aef-0109-439e-9803-66e95b90eb71', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 26 130C', 'Q607E18', 32924, 'oke', '280625', 22700, 'oke', 'P200725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 09 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.5', 180, 'oke', 11, 0, '1', '3', 640, '', '29.8', '71', 30.1, 35, 80, '17:30:00', '18:40:00', 70, '', 96.4, '09', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-30', '2', '18:40:00', '15:00:00', 0, 33, '', '', 9, 4, 6.67, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-29 19:44:04', '2025-07-29 19:44:04', '', '2025-07-29 19:44:04', '2025-07-30 17:43:13', '2025-07-29 19:44:04'),
(85, '23f0d363-b2d8-441a-914b-bb80ac7c10f1', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 26 131C', 'Q607E18', 32924, 'oke', '280625', 22700, 'oke', 'P200725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 09 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.1', 180, 'oke', 11, 0, '1', '1', 650, '', '29.8', '71', 30.4, 35, 80, '18:00:00', '19:10:00', 70, '', 95, '11', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-30', '2', '19:10:00', '15:20:00', 0, 33, '', '', 90, 4, 6.7, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-29 19:50:53', '2025-07-29 19:50:53', '', '2025-07-29 19:50:53', '2025-07-30 17:46:32', '2025-07-29 19:50:53'),
(86, 'e1489d6d-381e-423b-a604-5c8853c185a4', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 101C', 'Q607E18', 32924, 'oke', '280625', 22700, 'oke', 'P200725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 09 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.7', 180, 'oke', 11, 0, '1', '3', 650, '', '29.8', '71', 30.5, 35, 80, '18:30:00', '19:40:00', 70, '', 94.8, '11', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-30', '2', '19:40:00', '15:40:00', 0, 33, '', '', 90, 4, 6.73, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-29 19:53:57', '2025-07-29 19:53:57', '', '2025-07-29 19:53:57', '2025-07-30 17:48:43', '2025-07-29 19:53:57'),
(87, 'c784f515-2b03-418b-9e35-09200ef569a5', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 102C', 'Q607E18', 32924, 'oke', '280625', 22700, 'oke', 'P200725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 09 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.1', 180, 'oke', 11, 0, '1', '3', 650, '', '30.4', '71', 30.5, 35, 80, '20:00:00', '21:10:00', 70, '', 96.7, '10', '83', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-30', '2', '21:10:00', '16:00:00', 0, 33, '', '', 90, 4, 6.75, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-29 19:58:28', '2025-07-29 19:58:28', '', '2025-07-29 19:58:28', '2025-07-30 17:52:07', '2025-07-29 19:58:28'),
(88, 'c0061a8f-f920-4571-b636-6ab88aed8a1f', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 26 103C', 'Q607E18', 32924, 'oke', '280625', 22700, 'oke', 'P200725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 09 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.5', 180, 'oke', 11, 0, '1', '2', 640, '', '29.8', '71', 30.4, 35, 80, '20:30:00', '21:40:00', 70, '', 96.4, '12', '83', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-30', '2', '21:40:00', '16:20:00', 0, 33, '', '', 90, 4, 6.78, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-29 20:01:16', '2025-07-29 20:01:16', '', '2025-07-29 20:01:16', '2025-07-30 17:53:59', '2025-07-29 20:01:16'),
(89, '7b22dec5-219f-4790-bd32-290aef67eb82', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29104C', 'Q607E18', 32924, 'oke', '280625', 22700, 'oke', 'P200725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 09 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.7', 180, 'oke', 11, 0, '1', '2', 650, '', '29.8', '71', 30.7, 35, 79, '21:00:00', '22:10:00', 70, '', 96.4, '13', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-30', '2', '22:10:00', '16:40:00', 0, 33, '', '', 90, 4, 6.8, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-29 20:05:04', '2025-07-29 20:05:04', '', '2025-07-29 20:05:04', '2025-07-30 17:55:28', '2025-07-29 20:05:04'),
(90, 'ad3be222-1e01-4de1-bb04-22c1fc37ccdc', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29105C', 'Q607E18', 32924, 'oke', '280625', 22700, 'oke', 'P200725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 09 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.6', 180, 'oke', 11, 0, '1', '3', 650, '', '29.8', '71', 30.5, 35, 80, '21:30:00', '22:40:00', 70, '', 94.8, '13', '85', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-30', '2', '22:40:00', '17:00:00', 0, 33, '', '', 90, 4, 6.85, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-29 20:09:06', '2025-07-29 20:09:06', '', '2025-07-29 20:09:06', '2025-07-30 17:57:20', '2025-07-29 20:09:06'),
(91, 'c62baa9b-e178-48b5-a6bc-c9b548ceef5a', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-29', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29106C', 'Q607E18', 32924, 'oke', '280625', 22700, 'oke', 'P200725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.7', 180, 'oke', 11, 0, '1', '4', 650, '', '29.8', '71', 30.1, 35, 80, '21:30:00', '22:40:00', 70, '', 96.2, '09', '83', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-30', '2', '22:40:00', '17:20:00', 0, 33, '', '', 90, 4, 6.88, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-29 20:12:30', '2025-07-29 20:12:30', '', '2025-07-29 20:12:30', '2025-07-30 18:37:07', '2025-07-29 20:12:30'),
(92, '0a3fd740-1a5c-4040-8f46-17a6c10fc3aa', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 107 B', 'Q607E18', 32924, 'oke', '26052025', 22700, 'oke', 'P23072025', 7320, 'oke', '1127062025', 380, 'oke', '[{\"kode\":\"PG09101AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG10101AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG20101AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '02', 650, '', '29.7', '71', 30.5, 35, 80, '23:20:00', '00:30:00', 70, '', 96.6, '10', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-29 23:45:16', '2025-07-29 23:45:16', '', '2025-07-29 23:45:16', '2025-07-30 00:14:50', '2025-07-29 23:45:16'),
(93, '864ac492-8023-4267-8c7c-401653788555', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 108 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.4', 180, 'oke', 11, 0, '1', '4', 650, '', '29.8', '71', 30.4, 35, 80, '23:40:00', '00:50:00', 70, '', 96.6, '11', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-30', '2', '00:50:00', '18:00:00', 0, 34, '', '', 90, 4, 6.7, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-30 00:09:15', '2025-07-30 00:09:15', '', '2025-07-30 00:09:15', '2025-07-30 18:44:29', '2025-07-30 00:09:15');
INSERT INTO `mixing` (`id`, `uuid`, `username`, `plant`, `date`, `shift`, `proses_produksi`, `proses_packing`, `nama_produk`, `jenis_produk`, `kode_produksi`, `tegu_kode`, `tegu_berat`, `tegu_sens`, `tapioka_kode`, `tapioka_berat`, `tapioka_sens`, `ragi_kode`, `ragi_berat`, `ragi_sens`, `bread_kode`, `bread_berat`, `bread_sens`, `premix`, `shortening_kode`, `shortening_berat`, `shortening_sens`, `chill_water_kode`, `chill_water_berat`, `chill_water_sens`, `mix_dough_waktu_1`, `mix_dough_waktu_2`, `mix_dough_hasil`, `mix_dough_mesin`, `mix_dough_cutting`, `mix_dough_sens`, `mix_dough_suhu_ruang`, `mix_dough_rh_ruang`, `mix_dough_suhu_adonan`, `fermen_suhu`, `fermen_rh`, `fermen_jam_mulai`, `fermen_jam_selesai`, `fermen_lama_proses`, `fermen_hasil_proof`, `electric_baking_suhu`, `electric_baking_mesin`, `electric_baking_expand`, `electric_baking_time_high`, `electric_baking_time_low`, `sens_kematangan`, `sens_rasa`, `sens_aroma`, `sens_tekstur`, `sens_warna`, `date_stall`, `shift_pack`, `stall_jam_mulai`, `stall_jam_berhenti`, `stall_aging`, `stall_kadar_air`, `hasil_grinding`, `keterangan_grinding`, `dry_suhu`, `dry_rotasi`, `dry_kadar_air`, `produk_hasil`, `produk_rasa`, `produk_aroma`, `produk_tekstur`, `produk_warna`, `packing_nama_produk`, `packing_kode_kemasan`, `gambar_kode_kemasan`, `packing_bb`, `packing_kondisi_kemasan`, `gambar_kondisi_kemasan`, `packing_ketepatan`, `packing_suhu_before`, `packing_kadar_air`, `packing_bulk_density`, `packing_kode_supplier`, `packing_net_weight`, `catatan_packing`, `nama_produksi`, `catatan_produksi`, `status_produksi`, `catatan`, `status_spv`, `nama_spv`, `tgl_update`, `tgl_update_prod`, `catatan_spv`, `created_at`, `modified_at`, `updated_at`) VALUES
(94, 'c8e6995b-6210-40f7-a807-44adc5cf1e2f', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 109 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 0, 0, '', '', 0, '', '', '', 0, 35, 80, '00:00:00', '01:10:00', 70, '', 96.7, '12', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-30', '2', '01:10:00', '18:30:00', 0, 34, '', '', 92, 4, 6.7, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-30 00:09:30', '2025-07-30 00:09:30', '', '2025-07-30 00:09:30', '2025-07-30 18:49:57', '2025-07-30 00:09:30'),
(95, '62daa388-27e6-423f-8aba-5e9abf2b256e', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 110 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.4', 180, 'oke', 11, 0, '1', '1', 650, '', '29.7', '71', 30.3, 35, 80, '00:20:00', '01:30:00', 70, '', 96.6, '13', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-30', '2', '01:30:00', '20:00:00', 0, 34, '', '', 90, 4, 6.73, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-30 00:21:32', '2025-07-30 00:21:32', '', '2025-07-30 00:21:32', '2025-07-30 18:52:09', '2025-07-30 00:21:32'),
(96, '5bec164f-6785-4bc8-9581-a1ebfacf6e1c', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 111 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '2', 650, '', '30.4', '70', 30.3, 35, 80, '00:40:00', '01:50:00', 70, '', 0, '', '', '', '', '', '', '', '', '', '2025-07-30', '2', '01:50:00', '20:30:00', 0, 34, '', '', 90, 4, 6.76, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-30 00:21:46', '2025-07-30 00:21:46', '', '2025-07-30 00:21:46', '2025-07-30 18:55:25', '2025-07-30 00:21:46'),
(97, '99730883-8805-4730-a217-5faf29597777', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 112 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '3', 650, '', '30.5', '70', 30.4, 35, 80, '01:10:00', '02:20:00', 70, '', 0, '', '', '', '', '', '', '', '', '', '2025-07-30', '2', '02:20:00', '20:30:00', 0, 6.76, '', '', 90, 4, 6.8, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-30 00:21:54', '2025-07-30 00:21:54', '', '2025-07-30 00:21:54', '2025-07-30 20:40:19', '2025-07-30 00:21:54'),
(98, 'fb883e4a-99dc-42f3-bb65-6ea5a3a1d221', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 113 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.2', 180, 'oke', 11, 0, '1', '4', 650, '', '30.5', '70', 30.4, 35, 80, '01:30:00', '02:40:00', 70, '', 0, '', '', '', '', '', '', '', '', '', '2025-07-30', '2', '02:40:00', '21:00:00', 0, 34, '', '', 90, 4, 6.82, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', 'OK', '0', '', '2025-07-30 00:22:03', '2025-07-30 00:22:03', '', '2025-07-30 00:22:03', '2025-07-30 22:29:02', '2025-07-30 00:22:03'),
(99, '5495832c-b740-4e01-90d5-230639280a14', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 114 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.2', 180, 'oke', 11, 0, '1', '1', 650, '', '30.5', '70', 30.4, 35, 80, '02:00:00', '03:10:00', 70, '', 96.7, '12', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-30', '2', '03:10:00', '21:30:00', 0, 34, '', '', 90, 4, 6.85, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 00:57:19', '2025-07-30 00:57:19', '', '2025-07-30 00:57:19', '2025-07-30 22:30:24', '2025-07-30 00:57:19'),
(100, 'b2c5b688-73ca-40a6-8c49-134fb4da1c57', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 115 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.2', 180, 'oke', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '2025-07-31', '3', '00:00:00', '23:20:00', 0, 34, '', '', 89, 4, 5.36, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 00:57:29', '2025-07-30 00:57:29', '', '2025-07-30 00:57:29', '2025-07-31 00:10:42', '2025-07-30 00:57:29'),
(101, '04287dd3-d4b1-4135-9556-cdd7bf0289ee', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 116 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '4', 650, '', '30.4', '71', 30.5, 35, 80, '05:00:00', '06:10:00', 70, '', 96.8, '09', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-31', '3', '06:10:00', '12:40:00', 0, 34, '', '', 89, 4, 5.42, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 00:57:36', '2025-07-30 00:57:36', '', '2025-07-30 00:57:36', '2025-07-31 00:13:06', '2025-07-30 00:57:36'),
(102, '71287fdd-4c2c-4455-9683-4d3faa761fa0', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 117 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '5', 650, '', '30.4', '71', 30.5, 35, 80, '05:30:00', '06:40:00', 70, '', 96.7, '10', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-31', '3', '06:40:00', '00:00:00', 0, 34, '', '', 89, 4, 5.39, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 00:57:47', '2025-07-30 00:57:47', '', '2025-07-30 00:57:47', '2025-07-31 00:14:02', '2025-07-30 00:57:47'),
(103, 'edf5bc11-1864-4228-9bc0-7c4a5495a183', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 118 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.4', 180, 'oke', 11, 0, '1', '1', 650, '', '30.5', '71', 30.2, 35, 80, '06:00:00', '07:10:00', 70, '', 96.7, '11', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-31', '3', '07:10:00', '00:20:00', 0, 34, '', '', 89, 4, 5.48, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 02:08:13', '2025-07-30 02:08:13', '', '2025-07-30 02:08:13', '2025-07-31 00:14:48', '2025-07-30 02:08:13'),
(105, '7ff3fc17-0ff8-4e95-8ad2-a8b2a75cd6fa', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 119 A', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.4', 180, 'oke', 11, 0, '1', '1', 650, '', '30', '71', 29.7, 35, 80, '07:20:00', '08:30:00', 70, '', 96.7, '12', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-31', '3', '08:30:00', '00:40:00', 0, 34, '', '', 89, 4, 5.44, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 15:39:14', '2025-07-30 15:39:14', '', '2025-07-30 15:39:14', '2025-07-31 00:16:10', '2025-07-30 15:39:14'),
(106, '134ae50f-c809-43f0-83eb-94f9f2692d8e', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 120 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '2025-07-31', '3', '07:10:00', '00:20:00', 0, 34, '', '', 89, 4, 5.48, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 15:39:50', '2025-07-30 15:39:50', '', '2025-07-30 15:39:50', '2025-07-31 05:56:56', '2025-07-30 15:39:50'),
(107, '63cb6f8c-0c6a-4eaf-bd08-61cbe0d98e0e', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 121 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '2025-07-31', '3', '08:30:00', '00:40:00', 0, 34, '', '', 89, 4, 5.44, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 15:39:58', '2025-07-30 15:39:58', '', '2025-07-30 15:39:58', '2025-07-31 05:58:26', '2025-07-30 15:39:58'),
(108, 'bbfa1a2a-d723-4967-a38f-2ac74560e3f1', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 122 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '2025-07-31', '3', '09:30:00', '01:40:00', 0, 34, '', '', 84, 4, 6.79, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 15:40:07', '2025-07-30 15:40:07', '', '2025-07-30 15:40:07', '2025-07-31 06:00:34', '2025-07-30 15:40:07'),
(109, '946d78a8-ef7d-4bd3-9a48-4dbc8c317f0c', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 123 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '2025-07-31', '3', '09:50:00', '02:00:00', 0, 34, '', '', 85, 4, 5.42, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 15:40:18', '2025-07-30 15:40:18', '', '2025-07-30 15:40:18', '2025-07-31 06:38:11', '2025-07-30 15:40:18'),
(110, '3b919513-2c02-4ddc-a66e-8f74fa3d57f5', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 124 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '2025-07-31', '3', '10:10:00', '04:50:00', 0, 34, '', '', 85, 4, 5.53, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 15:40:31', '2025-07-30 15:40:31', '', '2025-07-30 15:40:31', '2025-07-31 06:38:41', '2025-07-30 15:40:31'),
(111, 'f4f0bc16-bea0-49ba-b5c4-fc4b20459755', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 125 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '2025-07-31', '3', '10:30:00', '05:10:00', 0, 34, '', '', 85, 4, 5.45, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 15:40:38', '2025-07-30 15:40:38', '', '2025-07-30 15:40:38', '2025-07-31 06:36:17', '2025-07-30 15:40:38'),
(112, 'cb816294-6df4-49a4-82b4-8f4787733dc6', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 126 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '2025-07-31', '3', '10:50:00', '05:30:00', 0, 34, '', '', 85, 4, 5.55, 'oke', 'oke', 'oke', 'oke', 'oke', '', '', NULL, '0000-00-00', '1', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 15:40:45', '2025-07-30 15:40:45', '', '2025-07-30 15:40:45', '2025-07-31 06:37:29', '2025-07-30 15:40:45'),
(113, '806e37fa-e80a-43d8-8f08-b7b41adfcc44', 'feriagus', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 127 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 15:40:51', '2025-07-30 15:40:51', '', '2025-07-30 15:40:51', '2025-07-30 15:40:51', '2025-07-30 15:40:51'),
(114, '7958bb02-874b-437a-ad5e-1d521e8a1dec', 'feriagus', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 128 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 15:40:57', '2025-07-30 15:40:57', '', '2025-07-30 15:40:57', '2025-07-30 15:40:57', '2025-07-30 15:40:57'),
(115, 'f7135751-10c9-4703-94ce-595b19da12f6', 'feriagus', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 129 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 15:41:03', '2025-07-30 15:41:03', '', '2025-07-30 15:41:03', '2025-07-30 15:41:03', '2025-07-30 15:41:03'),
(116, '3b16c3e2-1399-403c-9151-aae87f65ce60', 'feriagus', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '1', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 130 A', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 15:41:12', '2025-07-30 15:41:12', '', '2025-07-30 15:41:12', '2025-07-30 15:41:12', '2025-07-30 15:41:12'),
(117, 'ac7acd34-1e29-4769-baab-c6df174a20ed', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 131C', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.6', 180, 'oke', 11, 0, '1', '1', 650, '', '30.4', '71', 30.3, 35, 80, '15:00:00', '16:10:00', 70, '', 96.4, '09', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 18:15:44', '2025-07-30 18:15:44', '', '2025-07-30 18:15:44', '2025-07-30 18:20:03', '2025-07-30 18:15:44'),
(118, '98110807-933f-4f51-9f08-9c7dc0355a8c', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 132C', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.7', 180, 'oke', 11, 0, '1', '2', 650, '', '30.4', '70', 30.4, 35, 80, '15:20:00', '16:30:00', 70, '', 96.4, '10', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 18:56:54', '2025-07-30 18:56:54', '', '2025-07-30 18:56:54', '2025-07-30 19:04:03', '2025-07-30 18:56:54'),
(119, 'a2ec246d-470d-4cca-a571-128a9cea64f8', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 133C', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.6', 180, 'oke', 11, 0, '1', '3', 650, '', '30.4', '70', 30.3, 35, 80, '15:40:00', '16:50:00', 70, '', 96.2, '11', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 19:04:31', '2025-07-30 19:04:31', '', '2025-07-30 19:04:31', '2025-07-30 19:08:29', '2025-07-30 19:04:31'),
(120, '4e2e6026-bf33-45a8-b8d0-0bc1dbd73e81', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 134C', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.7', 180, 'oke', 11, 0, '1', '4', 650, '', '30.2', '71', 30.1, 35, 80, '16:00:00', '17:10:00', 70, '', 96.6, '12', '83', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 19:09:04', '2025-07-30 19:09:04', '', '2025-07-30 19:09:04', '2025-07-30 19:12:20', '2025-07-30 19:09:04'),
(121, 'b95227a7-c53d-4acd-b43a-1a81bb53f344', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 135C', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.5', 180, 'oke', 11, 0, '1', '5', 650, '', '30.2', '71', 30.7, 35, 80, '16:30:00', '17:40:00', 70, '', 96.7, '12', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 19:12:49', '2025-07-30 19:12:49', '', '2025-07-30 19:12:49', '2025-07-30 19:29:40', '2025-07-30 19:12:49'),
(122, 'f9d5b059-28c4-4087-8b14-d98faab6872f', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 136C', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.2', 180, 'oke', 11, 0, '1', '5', 650, '', '30.2', '71', 30.3, 35, 80, '17:00:00', '18:10:00', 70, '', 96.7, '09', '83', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 19:30:08', '2025-07-30 19:30:08', '', '2025-07-30 19:30:08', '2025-07-30 19:37:52', '2025-07-30 19:30:08'),
(123, 'e8273300-ba73-486d-b3aa-4dcb0aa50377', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 137C', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.5', 180, 'oke', 11, 0, '1', '2', 650, '', '30.2', '71', 30.5, 35, 80, '17:30:00', '18:40:00', 70, '', 96.4, '10', '85', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 19:38:25', '2025-07-30 19:38:25', '', '2025-07-30 19:38:25', '2025-07-30 19:42:29', '2025-07-30 19:38:25'),
(124, '4c24b0bd-cb22-468f-b255-2d27772a8f60', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 138C', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.7', 180, 'oke', 11, 0, '1', '3', 650, '', '30.2', '71', 30.5, 35, 80, '18:00:00', '19:10:00', 70, '', 96.4, '12', '85', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 19:42:54', '2025-07-30 19:42:54', '', '2025-07-30 19:42:54', '2025-07-30 19:47:22', '2025-07-30 19:42:54'),
(125, '04160990-f382-46c5-a213-0a29e408665a', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 139C', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 11 101 AA0\",\"berat\":\"0070\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.7', 180, 'oke', 11, 0, '1', '5', 650, '', '30.2', '71', 30.7, 35, 80, '18:30:00', '20:40:00', 70, '', 96.4, '10', '85', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 19:47:37', '2025-07-30 19:47:37', '', '2025-07-30 19:47:37', '2025-07-30 19:51:06', '2025-07-30 19:47:37'),
(126, '3298724f-d283-4188-a3d0-79632789bf43', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 140C', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.7', 180, 'oke', 11, 0, '1', '4', 650, '', '30.2', '71', 30.7, 35, 80, '20:00:00', '21:10:00', 70, '', 96.2, '13', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 19:53:36', '2025-07-30 19:53:36', '', '2025-07-30 19:53:36', '2025-07-30 19:57:14', '2025-07-30 19:53:36'),
(127, 'c1d119d1-0454-41c8-a2a6-e7503b5d92be', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 141C', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.2', 180, 'oke', 11, 0, '1', '1', 640, '', '30.2', '72', 30.1, 35, 79, '20:30:00', '21:40:00', 70, '', 96.2, '09', '83', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 19:57:48', '2025-07-30 19:57:48', '', '2025-07-30 19:57:48', '2025-07-30 20:02:28', '2025-07-30 19:57:48'),
(128, 'b5bf324f-5fa8-41c8-8192-33ef9980fa82', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 142C', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.6', 180, 'oke', 11, 0, '1', '2', 650, '', '30.0', '72', 30.1, 35, 80, '22:00:00', '23:10:00', 70, '', 96.2, '13', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 20:04:16', '2025-07-30 20:04:16', '', '2025-07-30 20:04:16', '2025-07-30 20:07:12', '2025-07-30 20:04:16'),
(129, 'a6f6dca2-d8d7-4320-866f-640c165046bc', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 143C', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 10 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.2', 180, 'oke', 11, 0, '1', '5', 650, '', '30.2', '72', 30.5, 35, 80, '22:30:00', '11:40:00', 70, '', 96.4, '11', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 22:24:14', '2025-07-30 22:24:14', '', '2025-07-30 22:24:14', '2025-07-30 22:27:09', '2025-07-30 22:24:14'),
(130, 'd491dc84-dce9-43ea-93f2-0dde2c183594', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 144 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '1', 650, '', '30.3', '69', 30.4, 35, 80, '23:20:00', '00:30:00', 70, '', 96.7, '09', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-30 23:59:10', '2025-07-30 23:59:10', '', '2025-07-30 23:59:10', '2025-07-31 00:05:06', '2025-07-30 23:59:10'),
(131, '51133c96-fdc4-4812-ae6c-2458d3fdd1f9', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 145 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0070\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"0060\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '2', 650, '', '30.4', '69', 30.4, 35, 80, '23:40:00', '00:50:00', 70, '', 96.7, '10', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-31 00:04:50', '2025-07-31 00:04:50', '', '2025-07-31 00:04:50', '2025-07-31 00:08:12', '2025-07-31 00:04:50'),
(132, '6bf280a8-a364-4f13-98b1-62e87414e543', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG 29 146 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.4', 180, 'oke', 11, 0, '1', '3', 650, '', '30.5', '70', 30.3, 35, 80, '00:00:00', '01:10:00', 70, '', 96.8, '13', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-31 01:20:09', '2025-07-31 01:20:09', '', '2025-07-31 01:20:09', '2025-07-31 01:24:15', '2025-07-31 01:20:09'),
(133, 'e3ddacfd-a102-4221-9a4a-46f555b13c25', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG  30 101 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 0, 0, '', '', 0, '', '', '', 0, 35, 80, '00:20:00', '01:30:00', 70, '', 96.7, '09', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-31 01:20:29', '2025-07-31 01:20:29', '', '2025-07-31 01:20:29', '2025-07-31 01:31:39', '2025-07-31 01:20:29'),
(134, 'e36265da-9114-4c65-adcd-e0e32a53a49b', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG  30 102 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '5', 650, '', '30.5', '70', 30.4, 35, 80, '00:50:00', '01:40:00', 70, '', 96.8, '10', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-31 01:20:39', '2025-07-31 01:20:39', '', '2025-07-31 01:20:39', '2025-07-31 01:35:55', '2025-07-31 01:20:39'),
(135, '8e2604b1-a711-462f-9f64-6709b73e6f26', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG  30 103 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.4', 180, 'oke', 11, 0, '1', '1', 650, '', '30.5', '70', 30.3, 35, 80, '01:10:00', '02:20:00', 70, '', 96.8, '11', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-31 01:20:53', '2025-07-31 01:20:53', '', '2025-07-31 01:20:53', '2025-07-31 01:38:34', '2025-07-31 01:20:53'),
(136, 'eadd8caa-ce18-4520-a13b-3fa8bd37068f', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG  30 104 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.2', 180, 'oke', 11, 0, '1', '2', 650, '', '30.6', '71', 30.4, 35, 80, '01:30:00', '02:40:00', 70, '', 96.6, '12', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-31 02:38:02', '2025-07-31 02:38:02', '', '2025-07-31 02:38:02', '2025-07-31 02:42:46', '2025-07-31 02:38:02'),
(137, '4a2d5aaa-a5bf-4d12-ab4b-372af3c916fe', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG  30 105 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.2', 180, 'oke', 11, 0, '1', '3', 650, '', '30.6', '71', 30.3, 35, 80, '01:50:00', '03:00:00', 70, '', 96.5, '13', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-31 02:39:03', '2025-07-31 02:39:03', '', '2025-07-31 02:39:03', '2025-07-31 02:46:05', '2025-07-31 02:39:03'),
(138, 'e053b85d-5053-4d5c-9c3a-e20a818b1627', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG  30 106 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 11, 0, '1', '4', 650, '', '30.6', '71', 30.2, 0, 0, '00:00:00', '00:00:00', 0, '', 96.6, '09', '84', '', '', 'oke', 'oke', 'oke', 'oke', 'oke', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-31 02:39:48', '2025-07-31 02:39:48', '', '2025-07-31 02:39:48', '2025-07-31 02:48:18', '2025-07-31 02:39:48'),
(139, '4173ffbd-8383-404a-a608-7c66d506c76b', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG  30 107 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-31 05:19:31', '2025-07-31 05:19:31', '', '2025-07-31 05:19:31', '2025-07-31 05:21:40', '2025-07-31 05:19:31'),
(140, '5b642f86-d59b-4b63-abd0-368bbca11adc', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG  30 108 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.2', 180, 'oke', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-31 05:19:57', '2025-07-31 05:19:57', '', '2025-07-31 05:19:57', '2025-07-31 05:23:28', '2025-07-31 05:19:57'),
(141, '07519b47-c65b-4521-a6ce-5697142708a3', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG  30 109 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.2', 180, 'oke', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-31 05:20:10', '2025-07-31 05:20:10', '', '2025-07-31 05:20:10', '2025-07-31 05:24:53', '2025-07-31 05:20:10'),
(142, 'ad9bf171-eb17-485b-846d-c724551e958a', 'anifta.leli', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-31', '3', NULL, NULL, 'BC MIX', 'BC MIX', 'PG  30 110 B', 'Q607E18', 32924, 'oke', '260525', 22700, 'oke', 'P230725', 7320, 'oke', '11270625', 380, 'oke', '[{\"kode\":\"PG 09 101 AA0\",\"berat\":\"0070\",\"sens\":\"oke\"},{\"kode\":\"PG 15 101 AA0\",\"berat\":\"0060\",\"sens\":null},{\"kode\":\"PG 02 101 AA0\",\"berat\":\"7440\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.3', 180, 'oke', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', '', 0, 0, 0, '', '', '', '', '', '', '', NULL, '0000-00-00', '', NULL, '', '', '', '', '', '', '', 'Ahmad', '', '1', '', '0', '', '2025-07-31 05:20:20', '2025-07-31 05:20:20', '', '2025-07-31 05:20:20', '2025-07-31 05:26:12', '2025-07-31 05:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `departemen` varchar(255) NOT NULL,
  `tipe_user` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `updater` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `uuid`, `nama`, `username`, `password`, `email`, `plant`, `departemen`, `tipe_user`, `foto`, `updater`, `created_at`, `modified_at`) VALUES
(1, 'c8f6b7df-8bf8-4152-8bec-48b43418611c', 'Putri Harnis', 'harnis', '$2y$10$aBaKYwziC3AzQDJ2gweB0eK/1GFXbxDMTDwHv6tl2aZXoOXiQdqMy', 'putri.harnis@cp.co.id', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', '66c8b282-9c49-40d3-85a0-257edc2160b6', '0', 'foto_1751446055.jpg', 'admin', '2024-02-28 09:51:31', '2025-07-15 14:20:53'),
(11, '0bd19b0f-d62c-444f-9862-cd3381dfef80', 'Admin', 'admin', '$2y$10$DWxZDzzIAFhzhQ3nWMPMyuVjbcIj.3BziDdZBjCo6qhMforiRDDpy', 'putri.harnis@cp.co.id', '651ac623-5e48-44cc-b2f6-5d622603f53c', '66c8b282-9c49-40d3-85a0-257edc2160b6', '0', 'foto_1751446086.jpg', 'admin', '2025-06-05 11:05:01', '2025-06-30 15:21:44'),
(12, '0da0c0cf-618a-4cd3-92f5-b57c3475ade8', 'Feri Agus Setiawan', 'feriagus', '$2y$10$9wmoZOnzba/TC1Z3M9t9Lembforr4r9EQuRD4XDyTriGVeJbYP8hK', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '66c8b282-9c49-40d3-85a0-257edc2160b6', '8', '', 'admin', '2025-06-12 09:05:30', '2025-07-28 09:51:50'),
(18, '29b0ba41-c64c-4bcf-9ba9-4fb0998af1c3', 'SPV QC Salatiga', 'spv_sltg', '$2y$10$Be2lZ3uGldJM1wNAv5wv3O8G8svq3U2CUv25nm3SpWy5VGD5WXra6', '', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', '66c8b282-9c49-40d3-85a0-257edc2160b6', '2', '', '', '2025-07-05 12:34:37', '2025-07-05 12:34:37'),
(19, '5eb40c95-5ffa-41ff-8e36-8f574792813f', 'Foreman Produksi Salatiga', 'foreman_sltg', '$2y$10$thN/ts5Cz2McwUYqz7.Rre/ZEOcZs72YR9PLPG1..Ujgvb26YtNO2', '', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', '66c8b282-9c49-40d3-85a0-257edc2160b6', '3', '', 'admin', '2025-07-05 12:35:14', '2025-07-28 09:51:37'),
(20, 'e23866a8-3277-49bd-adfd-d57041cf9727', 'Warehouse Salatiga', 'wh_sltg', '$2y$10$DgITBUVIKuDLRKFbNLZsuOhkxonDbyzBzhkwGvBtKxFSRoB9hU2jC', '', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', 'a69f6469-8389-4d8b-806f-b6d5d4591560', '6', '', '', '2025-07-05 12:36:10', '2025-07-05 12:36:10'),
(21, '8f43e2dd-9457-4732-a6a2-4c52158f5312', 'Enginer Salatiga', 'eng_sltg', '$2y$10$fwhjlOq9MpDWiscWDPkbYOfuyGlqqxBtAP2Y5vUUlqyDuBYElgUDG', '', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', '73e68eee-2615-4557-9e1a-6b6371c35ccd', '5', '', '', '2025-07-05 12:36:43', '2025-07-05 12:36:43'),
(22, '10484d5e-65ec-4537-90dd-9ddc48fe1b7f', 'Lab Salatiga', 'lab_sltg', '$2y$10$lQ2wRJLpzBHahbLGf2rUmeicrsIGTTqETq7pz2jqn0K.uhUrbxNEW', '', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', '66c8b282-9c49-40d3-85a0-257edc2160b6', '7', '', '', '2025-07-05 12:37:15', '2025-07-05 12:37:15'),
(23, 'e2030420-f838-4b7f-a5af-fff44b5fa32b', 'QC Inspector Salatiga', 'qc_sltg', '$2y$10$cmKc2O.5viV/cbN.Yj4PZ.a.HkAnRi4FM0leuHYuUFuG.wGonPl8S', '', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', '66c8b282-9c49-40d3-85a0-257edc2160b6', '4', '', '', '2025-07-05 12:37:52', '2025-07-05 12:37:52'),
(24, '7018d241-835f-4951-bea3-83e2c7116dfb', 'Admin Salatiga', 'admin.salatiga', '$2y$10$gvfJNRvwvS4okwOiQiUeEuVcC2MGOc9WUUnkG665ulF7IyNLyzGXi', '', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', '66c8b282-9c49-40d3-85a0-257edc2160b6', '0', '', '', '2025-07-07 16:49:18', '2025-07-07 16:49:18'),
(25, '96e22ee2-c1ac-4d5b-b4a8-ccbe88084be0', 'Ahmad', 'ahmad', '$2y$10$tgpz8KDFqbxPZBbLX7x1y.KKdWHXOStruxA5VbgTusxbpVSKxRh96', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '3622efc5-b2f8-4370-acb0-4833617fa0af', '3', '', '', '2025-07-28 09:32:13', '2025-07-28 09:32:13'),
(26, '352bc2e6-25ef-487c-8fe4-f5947beff79d', 'Fikri', 'fikri', '$2y$10$qJogGE8SIIBGeEHbh9KVfeBCGC8GPVAiNhqRjEdsFsCIzhqGecF2y', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '66c8b282-9c49-40d3-85a0-257edc2160b6', '3', '', '', '2025-07-28 09:32:43', '2025-07-28 09:32:43'),
(27, 'eaaf2236-c0c4-4bb7-9e88-a3aa770e6b51', 'Yonada Khairunnisa', 'yonada', '$2y$10$BIfWurSlfsHFlN9N1TqZRuq181in16IUezUHotzn5ILHntL4hhhFi', 'yonada.khairunnisa@cp.co.id', '651ac623-5e48-44cc-b2f6-5d622603f53c', '66c8b282-9c49-40d3-85a0-257edc2160b6', '2', '', '', '2025-07-28 10:06:30', '2025-07-28 10:06:30'),
(28, '7a7a379d-2912-4dc9-b4f5-11adae81a7a3', 'Arif Sholikin', 'arif.sholikin', '$2y$10$HmHrSsmx0arw27C5sPU0weWEgiQ7Z53NKtH.a0L5SSRrUcg2/2vui', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '66c8b282-9c49-40d3-85a0-257edc2160b6', '8', '', 'admin', '2025-07-28 10:09:32', '2025-07-28 10:10:22'),
(29, '024af46e-56fd-4310-b744-44e120bdcc1a', 'Purkoni', 'purkoni', '$2y$10$fsea2C1ZIiGK.mKj32Y3NuIztN.pOBWrMdblRB3OLj14J3Un2/u0e', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '66c8b282-9c49-40d3-85a0-257edc2160b6', '4', '', '', '2025-07-28 10:10:16', '2025-07-28 10:10:16'),
(30, 'f6b0c076-9193-47c1-be66-5a4e2d1dd5b3', 'Hermawan Istianto', 'hermawan.istianto', '$2y$10$ZCSCepC7mOe/YEtxBFU8qOZPM2jjX3Sz.p.oCsHsjw0TixLbi78GC', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '66c8b282-9c49-40d3-85a0-257edc2160b6', '4', '', '', '2025-07-28 10:11:14', '2025-07-28 10:11:14'),
(31, '16c0662f-e6d1-4995-b22c-34fbb79cede3', 'Widia Astuti', 'widia.astuti', '$2y$10$Q1byTdk6HdlmEiqJmCrC5etvyUYQWFFR1fdVIxER4/QimEHnXkzOW', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '66c8b282-9c49-40d3-85a0-257edc2160b6', '4', '', '', '2025-07-28 10:12:18', '2025-07-28 10:12:18'),
(32, '7d3c4284-676a-4c9a-bedc-500087bf3004', 'Tegar Mega Pratama', 'tegar.mega', '$2y$10$PEEfK1RILzEDEikbMh02N.3XOGipHcH0tRozpk/1yossJIPF6rD.u', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '66c8b282-9c49-40d3-85a0-257edc2160b6', '4', '', '', '2025-07-28 10:12:50', '2025-07-28 10:12:50'),
(33, '0dd6f960-c50c-413a-bd32-b3ab46dad67f', 'Nurchanifa', 'nurchanifa', '$2y$10$w2ZIAPMo2lOcVmLDqhCCKueVbJk8njFbWTgK6MA19f0IsraA0Qw/G', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '66c8b282-9c49-40d3-85a0-257edc2160b6', '4', '', '', '2025-07-28 10:13:24', '2025-07-28 10:13:24'),
(34, '9a825cec-414c-45b8-8dfc-98967e0953d0', 'Anifta Leli Nur Zahufi', 'anifta.leli', '$2y$10$/nlpiGofbjL/Gb3D6AcbI.g9HUg9zcQrLSnPigubwmaf1khIFy4aO', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '66c8b282-9c49-40d3-85a0-257edc2160b6', '4', '', '', '2025-07-28 10:13:50', '2025-07-28 10:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `pembuatan_larutan`
--

CREATE TABLE `pembuatan_larutan` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `area` varchar(255) NOT NULL,
  `pukul` varchar(255) NOT NULL,
  `nama_chemical` varchar(255) NOT NULL,
  `expired` date NOT NULL,
  `konsentrasi` varchar(255) NOT NULL,
  `larutan_beku` varchar(255) NOT NULL,
  `air` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_chemical`
--

CREATE TABLE `pemeriksaan_chemical` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `jenis_chemical` varchar(255) NOT NULL,
  `pemasok` varchar(255) NOT NULL,
  `kode_produksi` varchar(255) NOT NULL,
  `expired` date NOT NULL,
  `jumlah_barang` varchar(255) NOT NULL,
  `sampel` int(11) NOT NULL,
  `jumlah_reject` int(11) NOT NULL,
  `kemasan` varchar(255) NOT NULL,
  `warna` varchar(255) NOT NULL,
  `ph` varchar(255) NOT NULL,
  `halal_berlaku` varchar(255) NOT NULL,
  `halal_tak_berlaku` varchar(255) NOT NULL,
  `segel` varchar(255) NOT NULL,
  `coa` varchar(255) NOT NULL,
  `bukti_coa` varchar(255) DEFAULT NULL,
  `penerimaan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_pengiriman`
--

CREATE TABLE `pemeriksaan_pengiriman` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jenis_mobil` varchar(255) NOT NULL,
  `no_polisi` varchar(255) NOT NULL,
  `identitas_pengantar` varchar(255) NOT NULL,
  `segel` varchar(255) NOT NULL,
  `kebersihan` varchar(255) NOT NULL,
  `bocor` varchar(255) NOT NULL,
  `hama` varchar(255) NOT NULL,
  `jam_datang` time NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemusnahan`
--

CREATE TABLE `pemusnahan` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `kode_produksi` varchar(255) NOT NULL,
  `best_before` varchar(255) NOT NULL,
  `analisa` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL,
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan_kemasan`
--

CREATE TABLE `penerimaan_kemasan` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `jenis_kemasan` varchar(255) NOT NULL,
  `pemasok` varchar(255) NOT NULL,
  `kode_produksi` varchar(255) NOT NULL,
  `jumlah_datang` varchar(255) NOT NULL,
  `sampel` varchar(255) NOT NULL,
  `jumlah_reject` varchar(255) NOT NULL,
  `warna` varchar(255) NOT NULL,
  `panjang` varchar(255) NOT NULL,
  `diameter` varchar(255) NOT NULL,
  `lebar` varchar(255) NOT NULL,
  `tinggi` varchar(255) NOT NULL,
  `berat` varchar(255) NOT NULL,
  `delaminasi` varchar(255) NOT NULL,
  `bau` varchar(255) NOT NULL,
  `desain` varchar(255) NOT NULL,
  `segel` varchar(255) NOT NULL,
  `coa` varchar(255) NOT NULL,
  `bukti_coa` varchar(255) DEFAULT NULL,
  `penerimaan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengayakan`
--

CREATE TABLE `pengayakan` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kode_produksi` varchar(255) NOT NULL,
  `expired_date` date NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `kba_screenmess` int(11) NOT NULL,
  `kba_kerikil` int(11) NOT NULL,
  `kba_benang` int(11) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `nama_spv` varchar(255) NOT NULL,
  `tgl_update` datetime NOT NULL DEFAULT current_timestamp(),
  `tgl_update_prod` datetime NOT NULL DEFAULT current_timestamp(),
  `catatan_spv` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengayakan`
--

INSERT INTO `pengayakan` (`id`, `uuid`, `username`, `plant`, `date`, `shift`, `nama_barang`, `kode_produksi`, `expired_date`, `jumlah_barang`, `kba_screenmess`, `kba_kerikil`, `kba_benang`, `nama_produksi`, `catatan_produksi`, `status_produksi`, `kondisi`, `catatan`, `status_spv`, `nama_spv`, `tgl_update`, `tgl_update_prod`, `catatan_spv`, `created_at`, `modified_at`) VALUES
(17, '08858bf9-1fa4-4ff6-99db-296c0b04d186', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', 'T.TEGU', 'Q607E18', '2025-07-30', 395088, 0, 0, 0, 'Ahmad', '', '1', 'OK', 'OK', '0', '', '2025-07-30 21:47:29', '2025-07-30 21:47:29', '', '2025-07-30 21:47:29', '2025-07-30 21:47:29'),
(18, '2ff9e8d1-c316-4262-9677-712dfb335b6f', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', 'TSN LEBAH RATU', '260525', '2026-05-25', 27240, 0, 0, 0, 'Ahmad', '', '1', 'OK', 'OK', '0', '', '2025-07-30 21:51:41', '2025-07-30 21:51:41', '', '2025-07-30 21:51:41', '2025-07-30 21:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `pengemasan`
--

CREATE TABLE `pengemasan` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `waktu` time NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `kode_produksi` varchar(255) NOT NULL,
  `best_before` date NOT NULL,
  `kadar_air` varchar(255) NOT NULL,
  `kondisi_produk` varchar(255) NOT NULL,
  `kondisi_seal` varchar(255) NOT NULL,
  `berat_pack` varchar(255) NOT NULL,
  `berat_carton` varchar(255) NOT NULL,
  `labelisasi` varchar(255) NOT NULL,
  `kondisi_karton` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peralatan`
--

CREATE TABLE `peralatan` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `peralatan` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peralatan`
--

INSERT INTO `peralatan` (`id`, `uuid`, `username`, `peralatan`, `plant`, `created_at`, `modified_at`) VALUES
(1, 'bbbc19b1-a22a-498f-90cc-8ef636335898', 'admin', 'Timbangan', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-21 14:25:16', '2025-07-21 14:25:16'),
(2, '1c6bf7bb-68b1-4856-ab55-24229ac26ec1', 'admin', 'Meja Stainless', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-21 14:25:39', '2025-07-21 14:25:39'),
(3, '834fb8fc-df32-4f12-89fc-d98a4d2611c7', 'admin', 'Pisau', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-21 14:25:44', '2025-07-21 14:25:44'),
(4, '88a3f654-97dd-4b1b-8adc-086a36f97763', 'admin', 'Serokan', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-21 14:25:49', '2025-07-21 14:25:49'),
(5, '71bab01d-b108-435e-8491-35f3ee406f44', 'admin', 'Scrapper', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-21 14:25:56', '2025-07-21 14:25:56'),
(6, 'fb923a1e-43a7-4214-a26f-049abe419921', 'admin', 'Box Plastik', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-21 14:26:04', '2025-07-21 14:26:04'),
(7, 'a4d1b85d-2b24-4ec8-9d0e-25a82b941c77', 'admin', 'Baking Cart & Titanium Plat', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-21 14:26:25', '2025-07-21 14:26:25'),
(8, 'ea353a1e-6e49-4e32-a278-a83e15e50f7c', 'admin', 'Cooling Rack', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-21 14:26:34', '2025-07-21 14:26:34'),
(9, 'ce18cf22-421b-48fa-b095-28e4cab06cfb', 'admin', 'Baskom Stainless', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-21 14:26:45', '2025-07-21 14:26:45'),
(10, '0b5e21c3-eb58-4106-9776-c6aae63e49c4', 'admin', 'Vacuum Cleaner', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-21 14:26:55', '2025-07-21 14:26:55'),
(11, '403dd932-b402-4f10-9f56-08f4dc6f222c', 'admin', 'Hand Mixer/Whisker', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-21 14:27:09', '2025-07-21 14:27:09'),
(12, 'e97412f2-ce68-41d7-ac98-842f9756d52a', 'admin', 'Mesin Jahit', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-21 14:27:16', '2025-07-21 14:27:16');

-- --------------------------------------------------------

--
-- Table structure for table `plant`
--

CREATE TABLE `plant` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `user_uuid` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant`
--

INSERT INTO `plant` (`id`, `uuid`, `user_uuid`, `plant`, `created_at`, `modified_at`) VALUES
(9, '651ac623-5e48-44cc-b2f6-5d622603f53c', 'admin', 'Cikande 2 Bread Crumb', '2025-07-29 10:59:59', '2025-07-29 10:59:59'),
(10, '1eb341e0-1ec4-4484-ba8f-32d23352b84d', 'admin', 'Salatiga Bread Crumb', '2025-07-29 11:00:05', '2025-07-29 11:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `uuid`, `username`, `nama_produk`, `created_at`, `modified_at`) VALUES
(1, '966e2e13-17fc-434f-9f8e-542328844cd9', 'admin', 'BC MIX', '2025-07-25 17:49:14', '2025-07-28 11:14:53'),
(3, '621871b7-8c89-4fb4-a11f-29789e4e4246', 'admin', 'BC Orange', '2025-07-26 11:57:11', '2025-07-26 11:57:11'),
(4, '381b9edf-7686-497a-a8de-faa37fd2b67e', 'admin', 'BC Yellow', '2025-07-26 11:57:19', '2025-07-26 11:57:19'),
(5, '1d49adb8-8805-4a68-b5e6-d6aad89f4fbb', 'admin', 'BC White', '2025-07-26 11:57:29', '2025-07-26 11:57:29'),
(6, '0d5c8b5a-cfb5-42db-acd3-eb8820d0f3ca', 'admin', 'BC White Institusi', '2025-07-26 11:57:39', '2025-07-26 11:57:39'),
(7, '09636cfe-b850-46cf-8589-ea66234ff960', 'admin', 'Fiesta Tepung Roti Mix', '2025-07-26 11:57:52', '2025-07-26 11:57:52'),
(8, '99433e1d-8326-4d80-b730-6f19c36d3ecd', 'admin', 'Fiesta Tepung Roti Putih', '2025-07-26 11:58:02', '2025-07-26 11:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `reagen`
--

CREATE TABLE `reagen` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `nama_larutan` varchar(255) NOT NULL,
  `no_lot` varchar(255) NOT NULL,
  `best_before` date NOT NULL,
  `tgl_buka_botol` date NOT NULL,
  `volume_penggunaan` varchar(255) NOT NULL,
  `volume_akhir` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `release_packing`
--

CREATE TABLE `release_packing` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `kode_produksi` varchar(255) NOT NULL,
  `best_before` date NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `release_packing`
--

INSERT INTO `release_packing` (`id`, `uuid`, `username`, `plant`, `date`, `nama_produk`, `kode_produksi`, `best_before`, `jumlah`, `keterangan`, `nama_spv`, `status_spv`, `catatan_spv`, `tgl_update_spv`, `created_at`, `modified_at`) VALUES
(4, 'b1027726-696b-45cd-bae5-1d8fa46e5146', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', 'BC MIX', 'PG 26 130 CC0-31CC0', '2026-01-26', '660 KG', 'OK', '', '0', '', '2025-07-30 21:39:01', '2025-07-30 21:39:01', '2025-07-30 21:42:09'),
(5, 'eabe8866-6900-40a4-ad6b-aad830e39d98', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', 'BC MIX', 'PG 29 101CC0 - PG29112 BC0', '2025-07-30', '3600KG', 'OK', '', '0', '', '2025-07-30 21:41:50', '2025-07-30 21:41:50', '2025-07-30 21:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `residu`
--

CREATE TABLE `residu` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `area` varchar(255) NOT NULL,
  `titik_sampling` varchar(255) NOT NULL,
  `standar` varchar(255) NOT NULL,
  `hasil_pemeriksaan` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tindakan` varchar(255) NOT NULL,
  `verifikasi` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `retain`
--

CREATE TABLE `retain` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `plant` varchar(255) NOT NULL,
  `sample_type` varchar(255) NOT NULL,
  `sample_storage` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `kode_produksi` varchar(255) NOT NULL,
  `best_before` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanitasi`
--

CREATE TABLE `sanitasi` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `waktu` time NOT NULL,
  `area` longtext DEFAULT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanitasi`
--

INSERT INTO `sanitasi` (`id`, `uuid`, `username`, `plant`, `date`, `shift`, `waktu`, `area`, `catatan`, `nama_produksi`, `status_produksi`, `catatan_produksi`, `tgl_update_produksi`, `nama_spv`, `status_spv`, `catatan_spv`, `tgl_update_spv`, `created_at`, `modified_at`) VALUES
(13, 'f83e56c8-b56f-4cbc-8bd7-7dcb359ccc97', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '15:00:00', '[{\"sub_area\":\"Foot Basin\",\"standar\":\"200\",\"aktual\":\"200\",\"suhu_air\":\"\",\"keterangan\":\"OK\",\"tindakan\":\"\",\"gambar\":null},{\"sub_area\":\"Hand Basin\",\"standar\":\"50\",\"aktual\":\"50\",\"suhu_air\":\"\",\"keterangan\":\"OK\",\"tindakan\":\"\",\"gambar\":null}]', '', 'Ahmad', '1', '', '2025-07-30 22:47:27', '', '0', '', '2025-07-30 22:47:27', '2025-07-30 22:47:27', '2025-07-30 22:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `sanitasi_wh`
--

CREATE TABLE `sanitasi_wh` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `area` varchar(255) NOT NULL,
  `detail` longtext DEFAULT NULL,
  `nama_wh` varchar(255) NOT NULL,
  `status_wh` varchar(255) NOT NULL,
  `catatan_wh` varchar(255) NOT NULL,
  `tgl_update_wh` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seasoning`
--

CREATE TABLE `seasoning` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `jenis_seasoning` varchar(255) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `pemasok` varchar(255) NOT NULL,
  `kode_produksi` varchar(255) NOT NULL,
  `expired` date NOT NULL,
  `jumlah_barang` varchar(255) NOT NULL,
  `sampel` varchar(255) NOT NULL,
  `jumlah_reject` varchar(255) NOT NULL,
  `kemasan` varchar(255) NOT NULL,
  `warna` varchar(255) NOT NULL,
  `kotoran` varchar(255) NOT NULL,
  `aroma` varchar(255) NOT NULL,
  `logo_halal` varchar(255) NOT NULL,
  `kadar_air` varchar(255) NOT NULL,
  `negara_asal` varchar(255) NOT NULL,
  `segel` varchar(255) NOT NULL,
  `penerimaan` varchar(255) NOT NULL,
  `sertif_halal` varchar(255) NOT NULL,
  `coa` varchar(255) NOT NULL,
  `bukti_coa` varchar(255) DEFAULT NULL,
  `allergen` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sensori_fg`
--

CREATE TABLE `sensori_fg` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `produk` longtext DEFAULT NULL,
  `tindakan` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suhu`
--

CREATE TABLE `suhu` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `pukul` time NOT NULL,
  `lokasi` longtext NOT NULL,
  `suhu` varchar(255) NOT NULL,
  `rh` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suhu`
--

INSERT INTO `suhu` (`id`, `uuid`, `username`, `date`, `shift`, `plant`, `pukul`, `lokasi`, `suhu`, `rh`, `catatan`, `nama_produksi`, `status_produksi`, `catatan_produksi`, `tgl_update_produksi`, `nama_spv`, `status_spv`, `catatan_spv`, `tgl_update_spv`, `created_at`, `modified_at`) VALUES
(35, '3ce89a3e-6008-4b6d-aa63-dad1d661511f', 'purkoni', '2025-07-28', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '15:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30,8\",\"rh\":\"69\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"25.4\",\"rh\":\"28\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.6\",\"rh\":\"67\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"31.8\",\"rh\":\"68\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"44\",\"rh\":\"53\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"42\",\"rh\":\"53\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"35.6\",\"rh\":\"28\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-28 19:35:38', '', '0', '', '2025-07-28 19:35:38', '2025-07-28 19:35:38', '2025-07-28 19:35:38'),
(36, 'a03e145f-94ab-4f5f-a935-d5d1fd3698ee', 'purkoni', '2025-07-28', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '16:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.6\",\"rh\":\"69\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"25.4\",\"rh\":\"30\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.4\",\"rh\":\"67\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"32.0\",\"rh\":\"66\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"43\",\"rh\":\"53\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"42\",\"rh\":\"52\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"35.6\",\"rh\":\"28\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-28 19:38:12', '', '0', '', '2025-07-28 19:38:12', '2025-07-28 19:38:12', '2025-07-28 19:38:12'),
(37, '6229e4db-f440-4896-be1c-01377879d063', 'purkoni', '2025-07-28', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '17:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.6\",\"rh\":\"70\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"25.2\",\"rh\":\"31\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.4\",\"rh\":\"68\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"32.4\",\"rh\":\"65\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"79\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"44\",\"rh\":\"52\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"43\",\"rh\":\"53\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"-\",\"rh\":\"-\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-28 19:51:52', '', '0', '', '2025-07-28 19:51:52', '2025-07-28 19:51:52', '2025-07-28 19:51:52'),
(38, '2e08aa9d-61e0-465a-ad10-17b4c4be7058', 'purkoni', '2025-07-28', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '18:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.4\",\"rh\":\"70\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"25.0\",\"rh\":\"31\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.2\",\"rh\":\"68\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"32.4\",\"rh\":\"66\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"79\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"43\",\"rh\":\"52\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"44\",\"rh\":\"54\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"-\",\"rh\":\"-\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-28 19:54:09', '', '0', '', '2025-07-28 19:54:09', '2025-07-28 19:54:09', '2025-07-28 19:54:09'),
(39, '6fabebbf-30b1-4d38-92a8-a70d54d1fd33', 'purkoni', '2025-07-28', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '19:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.4\",\"rh\":\"71\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"25.0\",\"rh\":\"32\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.2\",\"rh\":\"69\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"32.2\",\"rh\":\"66\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"44\",\"rh\":\"51\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"44\",\"rh\":\"54\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-28 19:56:17', '', '0', '', '2025-07-28 19:56:17', '2025-07-28 19:56:17', '2025-07-28 19:56:17'),
(40, '70dba3ee-1ff8-4ec2-b7bf-9d9ecef3ad1a', 'purkoni', '2025-07-28', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '20:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.2\",\"rh\":\"71\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24,8\",\"rh\":\"33\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"29.8\",\"rh\":\"70\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"32.0\",\"rh\":\"67\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"43\",\"rh\":\"52\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"43\",\"rh\":\"53\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-28 19:58:05', '', '0', '', '2025-07-28 19:58:05', '2025-07-28 19:58:05', '2025-07-28 19:58:05'),
(47, 'e493a410-8f45-4e34-b479-0cd0e8a6101a', 'purkoni', '2025-07-28', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '21:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.0\",\"rh\":\"70\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.8\",\"rh\":\"30\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.2\",\"rh\":\"65\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"33.2\",\"rh\":\"66\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"44\",\"rh\":\"52\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"44\",\"rh\":\"53\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-29 20:19:50', '', '0', '', '2025-07-29 20:19:50', '2025-07-29 20:19:50', '2025-07-29 20:19:50'),
(48, '1fe6d962-ef4f-41fe-af89-48df7c174292', 'purkoni', '2025-07-28', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '22:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.0\",\"rh\":\"71\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.8\",\"rh\":\"30\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.2\",\"rh\":\"65\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"33.0\",\"rh\":\"66\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"44\",\"rh\":\"52\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"44\",\"rh\":\"53\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-29 20:21:04', '', '0', '', '2025-07-29 20:21:04', '2025-07-29 20:21:04', '2025-07-29 20:21:04'),
(49, 'd12e42ba-de60-4f9b-8a83-6b375376640f', 'purkoni', '2025-07-29', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '15:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"32.4\",\"rh\":\"68\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.6\",\"rh\":\"29\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.6\",\"rh\":\"67\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"33.0\",\"rh\":\"66\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"45\",\"rh\":\"51\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"45\",\"rh\":\"52\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"37.8\",\"rh\":\"23\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-29 20:53:16', '', '0', '', '2025-07-29 20:53:16', '2025-07-29 20:53:16', '2025-07-29 21:08:10'),
(50, '7c1dc3bf-52c3-442b-b91b-89d5af09f15b', 'purkoni', '2025-07-29', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '16:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"32.2\",\"rh\":\"68\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.6\",\"rh\":\"29\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.6\",\"rh\":\"67\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"33.2\",\"rh\":\"67\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"44\",\"rh\":\"51\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"44\",\"rh\":\"51\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"37.4\",\"rh\":\"24\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-29 20:55:54', '', '0', '', '2025-07-29 20:55:54', '2025-07-29 20:55:54', '2025-07-29 21:14:42'),
(51, '32d59fd1-e156-41a2-9482-324ed0c96475', 'purkoni', '2025-07-29', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '17:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"32.0\",\"rh\":\"68\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.6\",\"rh\":\"29\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.4\",\"rh\":\"67\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"33.0\",\"rh\":\"67\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"43\",\"rh\":\"52\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"43\",\"rh\":\"52\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-29 20:57:30', '', '0', '', '2025-07-29 20:57:30', '2025-07-29 20:57:30', '2025-07-29 21:14:28'),
(52, '1ea04250-524b-4c4e-9552-fcb8047e3af1', 'purkoni', '2025-07-29', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '18:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"31.8\",\"rh\":\"69\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.5\",\"rh\":\"30\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.4\",\"rh\":\"66\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"32.8\",\"rh\":\"68\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"44\",\"rh\":\"52\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"42\",\"rh\":\"52\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-29 21:02:09', '', '0', '', '2025-07-29 21:02:09', '2025-07-29 21:02:09', '2025-07-29 21:14:17'),
(53, 'ba2323e8-dd37-4519-a08b-b0954b5cbf2a', 'purkoni', '2025-07-29', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '19:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"31.6\",\"rh\":\"69\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.5\",\"rh\":\"30\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.2\",\"rh\":\"66\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"32.8\",\"rh\":\"68\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"44\",\"rh\":\"53\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"42\",\"rh\":\"52\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-29 21:03:53', '', '0', '', '2025-07-29 21:03:53', '2025-07-29 21:03:53', '2025-07-29 21:14:07'),
(54, '3aa58132-da7b-40fd-b34e-a996f53ec052', 'purkoni', '2025-07-29', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '20:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"31.4\",\"rh\":\"69\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.3\",\"rh\":\"30\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.2\",\"rh\":\"66\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"32.8\",\"rh\":\"68\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"45\",\"rh\":\"53\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"43\",\"rh\":\"52\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-29 21:07:05', '', '0', '', '2025-07-29 21:07:05', '2025-07-29 21:07:05', '2025-07-29 21:13:58'),
(55, '12bb2aab-8f7f-4d74-979f-b56bc39a6839', 'purkoni', '2025-07-29', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '21:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"31.2\",\"rh\":\"70\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.3\",\"rh\":\"31\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.0\",\"rh\":\"67\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"32.4\",\"rh\":\"68\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"44\",\"rh\":\"52\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"44\",\"rh\":\"53\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-29 21:11:04', '', '0', '', '2025-07-29 21:11:04', '2025-07-29 21:11:04', '2025-07-29 21:13:44'),
(56, 'f1546e66-d782-48c4-b2cc-c8b5acd397e0', 'purkoni', '2025-07-29', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '22:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.8\",\"rh\":\"70\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.3\",\"rh\":\"31\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"29.8\",\"rh\":\"68\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"32.0\",\"rh\":\"69\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"43\",\"rh\":\"52\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"44\",\"rh\":\"53\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-29 21:12:56', '', '0', '', '2025-07-29 21:12:56', '2025-07-29 21:12:56', '2025-07-29 21:13:14'),
(57, '605d4df7-f27b-4c6c-ac6b-f0964969e704', 'anifta.leli', '2025-07-30', '3', '651ac623-5e48-44cc-b2f6-5d622603f53c', '23:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"29.6\",\"rh\":\"71\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"25.5\",\"rh\":\"28\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"29.4\",\"rh\":\"68\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"29.9\",\"rh\":\"68\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"43\",\"rh\":\"50\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"41\",\"rh\":\"50\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"-\",\"rh\":\"-\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-30 01:53:20', '', '0', '', '2025-07-30 01:53:20', '2025-07-30 01:53:20', '2025-07-30 01:53:20'),
(58, '19b443b3-dfa8-4f4b-95ac-7a03f328972f', 'anifta.leli', '2025-07-30', '3', '651ac623-5e48-44cc-b2f6-5d622603f53c', '00:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"29.8\",\"rh\":\"71\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"25.3\",\"rh\":\"27\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"29.5\",\"rh\":\"68\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"29.9\",\"rh\":\"68\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"40\",\"rh\":\"52\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"43\",\"rh\":\"52\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-30 01:55:09', '', '0', '', '2025-07-30 01:55:09', '2025-07-30 01:55:09', '2025-07-30 01:55:19'),
(59, '87cb61ef-f984-488d-b07e-94a56c59415b', 'anifta.leli', '2025-07-30', '3', '651ac623-5e48-44cc-b2f6-5d622603f53c', '01:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.5\",\"rh\":\"70\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.8\",\"rh\":\"27\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.7\",\"rh\":\"69\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"28.9\",\"rh\":\"67\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"40\",\"rh\":\"52\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"43\",\"rh\":\"53\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-30 01:57:31', '', '0', '', '2025-07-30 01:57:31', '2025-07-30 01:57:31', '2025-07-30 01:57:31'),
(60, '7a0ec98f-23bc-4736-ace8-baf94dc6f338', 'anifta.leli', '2025-07-30', '3', '651ac623-5e48-44cc-b2f6-5d622603f53c', '02:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.5\",\"rh\":\"70\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.7\",\"rh\":\"28\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.1\",\"rh\":\"69\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"28.9\",\"rh\":\"67\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"41\",\"rh\":\"52\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"43\",\"rh\":\"53\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-30 02:00:15', '', '0', '', '2025-07-30 02:00:15', '2025-07-30 02:00:15', '2025-07-30 02:00:15'),
(61, '19e017d5-5ddd-434a-b0df-6a694cc5f517', 'anifta.leli', '2025-07-30', '3', '651ac623-5e48-44cc-b2f6-5d622603f53c', '03:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.6\",\"rh\":\"70\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.7\",\"rh\":\"28\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.2\",\"rh\":\"69\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"28.8\",\"rh\":\"68\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"41\",\"rh\":\"53\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"42\",\"rh\":\"53\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-30 02:02:27', '', '0', '', '2025-07-30 02:02:27', '2025-07-30 02:02:27', '2025-07-30 04:58:01'),
(62, '848be17a-6897-4076-b311-e1aa86d06b7c', 'anifta.leli', '2025-07-30', '3', '651ac623-5e48-44cc-b2f6-5d622603f53c', '04:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.4\",\"rh\":\"71\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.6\",\"rh\":\"28\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"29.8\",\"rh\":\"70\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"28.9\",\"rh\":\"68\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"42\",\"rh\":\"53\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"44\",\"rh\":\"53\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-30 04:59:53', '', '0', '', '2025-07-30 04:59:53', '2025-07-30 04:59:53', '2025-07-30 04:59:53'),
(63, '3d752224-04c1-439f-bb45-22d61ca00103', 'anifta.leli', '2025-07-30', '3', '651ac623-5e48-44cc-b2f6-5d622603f53c', '05:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.4\",\"rh\":\"71\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.4\",\"rh\":\"29\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"29.8\",\"rh\":\"70\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"28.9\",\"rh\":\"68\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"40\",\"rh\":\"50\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"40\",\"rh\":\"51\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-30 05:22:39', '', '0', '', '2025-07-30 05:22:39', '2025-07-30 05:22:39', '2025-07-30 05:22:39'),
(64, 'f48c0e33-2ecd-47c8-92ab-9c2b6cdb28fa', 'anifta.leli', '2025-07-30', '3', '651ac623-5e48-44cc-b2f6-5d622603f53c', '06:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.3\",\"rh\":\"71\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.4\",\"rh\":\"29\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"29.9\",\"rh\":\"70\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"28.9\",\"rh\":\"68\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"40\",\"rh\":\"50\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"40\",\"rh\":\"51\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-30 05:25:05', '', '0', '', '2025-07-30 05:25:05', '2025-07-30 05:25:05', '2025-07-30 05:25:15'),
(65, '484493e3-bd07-4de1-973e-66ba300a6c9d', 'purkoni', '2025-07-30', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '16:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.4\",\"rh\":\"70\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.4\",\"rh\":\"29\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.8\",\"rh\":\"69\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"33.0\",\"rh\":\"67\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"44\",\"rh\":\"50\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"44\",\"rh\":\"52\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-30 22:09:00', '', '0', '', '2025-07-30 22:09:00', '2025-07-30 22:09:00', '2025-07-30 22:09:00'),
(66, 'e262a13f-9b45-4208-8833-c30606314a73', 'purkoni', '2025-07-30', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '17:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.2\",\"rh\":\"70\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.4\",\"rh\":\"29\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.6\",\"rh\":\"69\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"32.8\",\"rh\":\"67\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"43\",\"rh\":\"51\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"43\",\"rh\":\"53\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-30 22:10:47', '', '0', '', '2025-07-30 22:10:47', '2025-07-30 22:10:47', '2025-07-30 22:12:53'),
(67, '6b929590-9814-4348-b6c0-e1ac5efd7ec0', 'purkoni', '2025-07-30', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '18:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.0\",\"rh\":\"71\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.2\",\"rh\":\"30\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.2\",\"rh\":\"70\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"32.4\",\"rh\":\"68\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"43\",\"rh\":\"52\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"44\",\"rh\":\"52\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-30 22:12:28', '', '0', '', '2025-07-30 22:12:28', '2025-07-30 22:12:28', '2025-07-30 22:13:08'),
(68, '811a41a8-2afa-49f0-a1fa-c156f7c3d6fa', 'purkoni', '2025-07-30', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '19:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.0\",\"rh\":\"71\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.2\",\"rh\":\"30\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.4\",\"rh\":\"70\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"32.6\",\"rh\":\"68\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"44\",\"rh\":\"52\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"44\",\"rh\":\"52\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-30 22:14:46', '', '0', '', '2025-07-30 22:14:46', '2025-07-30 22:14:46', '2025-07-30 22:14:46'),
(69, '85270e80-1d62-478b-8fc0-508924c0b9f8', 'purkoni', '2025-07-30', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '20:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"29.8\",\"rh\":\"72\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.2\",\"rh\":\"30\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.2\",\"rh\":\"70\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"32.4\",\"rh\":\"68\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"44\",\"rh\":\"51\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"42\",\"rh\":\"53\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-30 22:40:34', '', '0', '', '2025-07-30 22:40:34', '2025-07-30 22:40:34', '2025-07-30 22:40:53'),
(70, '3bda66e7-a5fe-4fd1-81b1-ce0dea4d9a6e', 'purkoni', '2025-07-30', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '21:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"29.6\",\"rh\":\"72\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.3\",\"rh\":\"30\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"29.8\",\"rh\":\"70\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"32.4\",\"rh\":\"69\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"43\",\"rh\":\"51\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"44\",\"rh\":\"52\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-30 22:42:06', '', '0', '', '2025-07-30 22:42:06', '2025-07-30 22:42:06', '2025-07-30 22:42:06'),
(71, '8af7cf42-c913-4393-aaf5-57b43243c21f', 'purkoni', '2025-07-30', '2', '651ac623-5e48-44cc-b2f6-5d622603f53c', '22:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"29.6\",\"rh\":\"72\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.2\",\"rh\":\"31\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.0\",\"rh\":\"70\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"32.4\",\"rh\":\"69\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"44\",\"rh\":\"52\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"43\",\"rh\":\"51\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-30 22:43:21', '', '0', '', '2025-07-30 22:43:21', '2025-07-30 22:43:21', '2025-07-30 22:43:21'),
(72, '50d9cbb2-2ac1-4c56-8837-c75e0358aba9', 'anifta.leli', '2025-07-31', '3', '651ac623-5e48-44cc-b2f6-5d622603f53c', '23:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.3\",\"rh\":\"69\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"25.0\",\"rh\":\"29\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.1\",\"rh\":\"67\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"31.8\",\"rh\":\"67\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"40\",\"rh\":\"50\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"41\",\"rh\":\"51\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-31 05:29:35', '', '0', '', '2025-07-31 05:29:35', '2025-07-31 05:29:35', '2025-07-31 05:29:35'),
(73, '4f55d825-a4a4-40c1-a7a9-1cce75bb5a20', 'anifta.leli', '2025-07-31', '3', '651ac623-5e48-44cc-b2f6-5d622603f53c', '00:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.4\",\"rh\":\"69\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.9\",\"rh\":\"28\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.2\",\"rh\":\"67\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"31.9\",\"rh\":\"67\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"41\",\"rh\":\"50\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"42\",\"rh\":\"51\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-31 05:31:08', '', '0', '', '2025-07-31 05:31:08', '2025-07-31 05:31:08', '2025-07-31 05:31:16'),
(74, '2d18ca5e-b196-4575-b963-07fdab2b44d2', 'anifta.leli', '2025-07-31', '3', '651ac623-5e48-44cc-b2f6-5d622603f53c', '01:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.5\",\"rh\":\"70\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.7\",\"rh\":\"28\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.2\",\"rh\":\"68\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"32.0\",\"rh\":\"68\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"41\",\"rh\":\"51\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"42\",\"rh\":\"52\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-31 05:33:08', '', '0', '', '2025-07-31 05:33:08', '2025-07-31 05:33:08', '2025-07-31 05:33:08'),
(75, '5a6cfd9f-aa77-4b78-befb-41eb14ca3d62', 'anifta.leli', '2025-07-31', '3', '651ac623-5e48-44cc-b2f6-5d622603f53c', '02:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.6\",\"rh\":\"70\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.3\",\"rh\":\"29\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.4\",\"rh\":\"68\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"33.2\",\"rh\":\"68\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"42\",\"rh\":\"50\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"43\",\"rh\":\"52\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-31 05:34:18', '', '0', '', '2025-07-31 05:34:18', '2025-07-31 05:34:18', '2025-07-31 05:34:18'),
(76, '96da3d57-00e2-4e60-a38d-05a96c6b7857', 'anifta.leli', '2025-07-31', '3', '651ac623-5e48-44cc-b2f6-5d622603f53c', '03:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.4\",\"rh\":\"71\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.3\",\"rh\":\"29\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.2\",\"rh\":\"69\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"33.0\",\"rh\":\"68\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"42\",\"rh\":\"52\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"43\",\"rh\":\"53\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-31 05:35:15', '', '0', '', '2025-07-31 05:35:15', '2025-07-31 05:35:15', '2025-07-31 05:35:15'),
(77, '51b9a80d-c67d-47ae-ab35-66b8638962c2', 'anifta.leli', '2025-07-31', '3', '651ac623-5e48-44cc-b2f6-5d622603f53c', '04:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.4\",\"rh\":\"71\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.3\",\"rh\":\"28\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.2\",\"rh\":\"69\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"33.3\",\"rh\":\"69\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"41\",\"rh\":\"52\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"44\",\"rh\":\"53\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-31 05:36:43', '', '0', '', '2025-07-31 05:36:43', '2025-07-31 05:36:43', '2025-07-31 05:36:43'),
(78, '3406acc3-2927-4af3-a0fe-8c77761719c8', 'anifta.leli', '2025-07-31', '3', '651ac623-5e48-44cc-b2f6-5d622603f53c', '05:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.5\",\"rh\":\"71\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.3\",\"rh\":\"28\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.1\",\"rh\":\"69\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"33.6\",\"rh\":\"67\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"42\",\"rh\":\"53\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"44\",\"rh\":\"53\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-31 05:37:52', '', '0', '', '2025-07-31 05:37:52', '2025-07-31 05:37:52', '2025-07-31 05:37:52'),
(79, 'db04543b-e745-4eee-be71-d0d676037d09', 'anifta.leli', '2025-07-31', '3', '651ac623-5e48-44cc-b2f6-5d622603f53c', '06:00:00', '[{\"nama_lokasi\":\"Ruang Produksi\",\"suhu\":\"30.5\",\"rh\":\"71\"},{\"nama_lokasi\":\"Gudang Premix\",\"suhu\":\"24.2\",\"rh\":\"29\"},{\"nama_lokasi\":\"Gudang Raw Material\",\"suhu\":\"30.1\",\"rh\":\"69\"},{\"nama_lokasi\":\"Gudang Finish Good\",\"suhu\":\"33.7\",\"rh\":\"67\"},{\"nama_lokasi\":\"Proofing Room\",\"suhu\":\"35\",\"rh\":\"80\"},{\"nama_lokasi\":\"Aging Room 1\",\"suhu\":\"42\",\"rh\":\"53\"},{\"nama_lokasi\":\"Aging Room 2\",\"suhu\":\"44\",\"rh\":\"53\"},{\"nama_lokasi\":\"Ruang Produksi (Bubble)\",\"suhu\":\"\",\"rh\":\"\"}]', '', '', '', 'Ahmad', '1', '', '2025-07-31 05:39:02', '', '0', '', '2025-07-31 05:39:02', '2025-07-31 05:39:02', '2025-07-31 05:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `thermometer`
--

CREATE TABLE `thermometer` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `kode_thermo` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `peneraan_hasil` longtext NOT NULL,
  `tindakan_perbaikan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thermometer`
--

INSERT INTO `thermometer` (`id`, `uuid`, `username`, `plant`, `date`, `shift`, `kode_thermo`, `model`, `area`, `peneraan_hasil`, `tindakan_perbaikan`, `keterangan`, `nama_produksi`, `status_produksi`, `catatan_produksi`, `tgl_update_produksi`, `nama_spv`, `status_spv`, `catatan_spv`, `tgl_update_spv`, `created_at`, `modified_at`) VALUES
(10, '98dd9af8-fc59-4c4d-9a46-e2422e13ef66', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '01', 'TESTO 110', 'BC', '[{\"pukul\":\"15:00\",\"standar\":\"0\",\"hasil\":\"0,1\"}]', '', 'OK', 'Ahmad', '1', '', '2025-07-30 21:55:55', '', '0', '', '2025-07-30 21:55:55', '2025-07-30 21:55:55', '2025-07-30 21:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `timbangan`
--

CREATE TABLE `timbangan` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `kode_timbangan` varchar(255) NOT NULL,
  `kapasitas` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `peneraan_standar` varchar(255) NOT NULL,
  `peneraan_hasil` longtext DEFAULT NULL,
  `keterangan` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timbangan`
--

INSERT INTO `timbangan` (`id`, `uuid`, `username`, `plant`, `date`, `shift`, `kode_timbangan`, `kapasitas`, `model`, `lokasi`, `peneraan_standar`, `peneraan_hasil`, `keterangan`, `catatan`, `nama_produksi`, `status_produksi`, `catatan_produksi`, `tgl_update_produksi`, `nama_spv`, `status_spv`, `catatan_spv`, `tgl_update_spv`, `created_at`, `modified_at`) VALUES
(7, 'b1abbb09-aba8-4e23-8405-47caf9817d8b', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '001', '1,2', 'VIBRA DIGITAL', 'PREMIX', '500', '[{\"pukul\":\"15:00\",\"hasil\":\"OK\"}]', 'OK', '', 'Ahmad', '1', '', '2025-07-30 21:59:11', '', '0', '', '2025-07-30 21:59:11', '2025-07-30 21:59:11', '2025-07-30 22:03:44'),
(8, '3d899881-113b-4dc8-a1eb-297b0b32334e', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '002', '1,5', 'JADEVER DIGITAL', 'AREA MIXER', '500', '[{\"pukul\":\"15:05\",\"hasil\":\"OK\"}]', 'OK', '', 'Ahmad', '1', '', '2025-07-30 22:00:51', '', '0', '', '2025-07-30 22:00:51', '2025-07-30 22:00:51', '2025-07-30 22:00:51'),
(9, '117776c4-95af-4c36-a6a3-0a9b0a037ae2', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '003', '150', 'JADEVER JWI 501 DIGITAL', 'AREA SIFTER', '5000', '[{\"pukul\":\"15:07\",\"hasil\":\"OK\"}]', 'OK', '', 'Ahmad', '1', '', '2025-07-30 22:02:07', '', '0', '', '2025-07-30 22:02:07', '2025-07-30 22:02:07', '2025-07-30 22:04:03'),
(10, 'ed5c5efb-cbc9-45c9-8040-35479e957260', 'purkoni', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-30', '2', '004', '150', 'JADEVER JWI 501 DIGITAL', 'Area Packing', '5000', '[{\"pukul\":\"15:10\",\"hasil\":\"OK\"}]', 'OK', '', 'Ahmad', '1', '', '2025-07-30 22:03:25', '', '0', '', '2025-07-30 22:03:25', '2025-07-30 22:03:25', '2025-07-30 22:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi_mt`
--

CREATE TABLE `verifikasi_mt` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `kode_produksi` varchar(255) NOT NULL,
  `jumlah_temuan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `analisis_lab`
--
ALTER TABLE `analisis_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benda`
--
ALTER TABLE `benda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benda_pecah`
--
ALTER TABLE `benda_pecah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chiller`
--
ALTER TABLE `chiller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kebersihan_karyawan`
--
ALTER TABLE `kebersihan_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kebersihan_mesin`
--
ALTER TABLE `kebersihan_mesin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kebersihan_peralatan`
--
ALTER TABLE `kebersihan_peralatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kebersihan_ruang`
--
ALTER TABLE `kebersihan_ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kekuatan_mt`
--
ALTER TABLE `kekuatan_mt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ketidaksesuaian`
--
ALTER TABLE `ketidaksesuaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kondisi_kerja`
--
ALTER TABLE `kondisi_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontaminasi`
--
ALTER TABLE `kontaminasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `larutan`
--
ALTER TABLE `larutan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loading`
--
ALTER TABLE `loading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `magnet_trap`
--
ALTER TABLE `magnet_trap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metal`
--
ALTER TABLE `metal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mixing`
--
ALTER TABLE `mixing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembuatan_larutan`
--
ALTER TABLE `pembuatan_larutan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_chemical`
--
ALTER TABLE `pemeriksaan_chemical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan_pengiriman`
--
ALTER TABLE `pemeriksaan_pengiriman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemusnahan`
--
ALTER TABLE `pemusnahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerimaan_kemasan`
--
ALTER TABLE `penerimaan_kemasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengayakan`
--
ALTER TABLE `pengayakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengemasan`
--
ALTER TABLE `pengemasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plant`
--
ALTER TABLE `plant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reagen`
--
ALTER TABLE `reagen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `release_packing`
--
ALTER TABLE `release_packing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residu`
--
ALTER TABLE `residu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retain`
--
ALTER TABLE `retain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanitasi`
--
ALTER TABLE `sanitasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanitasi_wh`
--
ALTER TABLE `sanitasi_wh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seasoning`
--
ALTER TABLE `seasoning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sensori_fg`
--
ALTER TABLE `sensori_fg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suhu`
--
ALTER TABLE `suhu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thermometer`
--
ALTER TABLE `thermometer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timbangan`
--
ALTER TABLE `timbangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verifikasi_mt`
--
ALTER TABLE `verifikasi_mt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `analisis_lab`
--
ALTER TABLE `analisis_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `benda`
--
ALTER TABLE `benda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `benda_pecah`
--
ALTER TABLE `benda_pecah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chiller`
--
ALTER TABLE `chiller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `kebersihan_karyawan`
--
ALTER TABLE `kebersihan_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kebersihan_mesin`
--
ALTER TABLE `kebersihan_mesin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kebersihan_peralatan`
--
ALTER TABLE `kebersihan_peralatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kebersihan_ruang`
--
ALTER TABLE `kebersihan_ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `kekuatan_mt`
--
ALTER TABLE `kekuatan_mt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ketidaksesuaian`
--
ALTER TABLE `ketidaksesuaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kondisi_kerja`
--
ALTER TABLE `kondisi_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kontaminasi`
--
ALTER TABLE `kontaminasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `larutan`
--
ALTER TABLE `larutan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `loading`
--
ALTER TABLE `loading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `magnet_trap`
--
ALTER TABLE `magnet_trap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `metal`
--
ALTER TABLE `metal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `mixing`
--
ALTER TABLE `mixing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pembuatan_larutan`
--
ALTER TABLE `pembuatan_larutan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemeriksaan_chemical`
--
ALTER TABLE `pemeriksaan_chemical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemeriksaan_pengiriman`
--
ALTER TABLE `pemeriksaan_pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemusnahan`
--
ALTER TABLE `pemusnahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penerimaan_kemasan`
--
ALTER TABLE `penerimaan_kemasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengayakan`
--
ALTER TABLE `pengayakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pengemasan`
--
ALTER TABLE `pengemasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `plant`
--
ALTER TABLE `plant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reagen`
--
ALTER TABLE `reagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `release_packing`
--
ALTER TABLE `release_packing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `residu`
--
ALTER TABLE `residu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `retain`
--
ALTER TABLE `retain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sanitasi`
--
ALTER TABLE `sanitasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sanitasi_wh`
--
ALTER TABLE `sanitasi_wh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seasoning`
--
ALTER TABLE `seasoning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sensori_fg`
--
ALTER TABLE `sensori_fg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `suhu`
--
ALTER TABLE `suhu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `thermometer`
--
ALTER TABLE `thermometer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `timbangan`
--
ALTER TABLE `timbangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `verifikasi_mt`
--
ALTER TABLE `verifikasi_mt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
