-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2025 at 03:52 AM
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
(8, '5dccfecf-6653-4290-b599-7b26df003fbc', 'qc_ckd', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-08', '11:17:00', '0.6', '1.5', '1.7', '2.5', '', '', '0', '', '2025-07-08 11:17:34', '', '0', '', '2025-07-08 11:17:34', '2025-07-08 11:17:34', '2025-07-08 11:17:34'),
(9, '84edfadb-66fa-4d7e-9cc4-0f260bd4cf69', 'qc_ckd', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-09', '00:00:00', '1', '2', '3', '4', '_', '', '0', '', '2025-07-09 11:00:22', '', '0', '', '2025-07-09 11:00:22', '2025-07-09 11:00:22', '2025-07-09 11:00:22');

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

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id`, `uuid`, `username`, `plant`, `date`, `shift`, `peralatan`, `qc_update`, `nama_spv`, `status_spv`, `catatan_spv`, `tgl_update_spv`, `created_at`, `modified_at`) VALUES
(40, '1152df4e-0898-45cb-8564-96eaa4b41efe', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-15', '1', '[{\"nama_alat\":\"Adaptor Timbangan Mettler Toledo\",\"jumlah\":\"1\",\"kondisi_awal\":\"Tidak Tersedia\",\"kondisi_akhir\":\"-\",\"keterangan\":\"\"},{\"nama_alat\":\"Thermometer (Preparasi)\",\"jumlah\":\"6\",\"kondisi_awal\":\"Rusak\",\"kondisi_akhir\":\"-\",\"keterangan\":\"\"}]', '', '', '0', '', '2025-07-15 15:08:03', '2025-07-15 15:08:03', '2025-07-15 15:08:03');

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

--
-- Dumping data for table `kebersihan_karyawan`
--

INSERT INTO `kebersihan_karyawan` (`id`, `uuid`, `username`, `plant`, `date`, `shift`, `nama`, `bagian`, `seragam`, `apron`, `tangan_kuku`, `kosmetik`, `perhiasan`, `masker`, `topi_hairnet`, `sepatu`, `tindakan`, `catatan`, `nama_produksi`, `status_produksi`, `catatan_produksi`, `tgl_update_produksi`, `nama_spv`, `status_spv`, `catatan_spv`, `tgl_update_spv`, `created_at`, `modified_at`) VALUES
(5, '2213573d-345e-436e-9d75-0ba54d6fd4d9', 'qc_ckd', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-07', '1', 'Yuli', 'Packing', 'tidak oke', 'tidak dipakai', 'tidak oke', 'ok', 'ok', 'ok', 'ok', 'ok', '1. Seragam sobek diganti \r\n2. Kuku panjang dipotong ', '', '', '0', '', '2025-07-07 14:14:23', '', '0', '', '2025-07-07 14:14:23', '2025-07-07 14:14:23', '2025-07-07 14:15:00'),
(6, '28fe3e7f-1723-4851-98f2-371b402c087c', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-11', '1', 'Purwoko', 'WORKSHOP', 'ok', 'ok', 'ok', 'ok', 'ok', 'ok', 'ok', 'ok', '', '', '', '0', '', '2025-07-11 14:47:04', '', '0', '', '2025-07-11 14:47:04', '2025-07-11 14:47:04', '2025-07-11 14:47:04');

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
  `peralatan` varchar(255) NOT NULL,
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
(4, '87caa833-b8af-4851-a43c-08532e7c5d26', 'qc_ckd', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-08', '1', 'grinder', 'Kotor', 'Terdapat sisa sisa potongan roti yang masih menyangkut di mesh grinder', 'Koordinasi dengan tim sanitasi untuk cleaning mesh grinder', '', '', '0', '', '2025-07-08 11:03:53', '', '0', '', '2025-07-08 11:03:53', '2025-07-08 11:03:53', '2025-07-08 11:03:53');

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

--
-- Dumping data for table `kebersihan_ruang`
--

INSERT INTO `kebersihan_ruang` (`id`, `uuid`, `username`, `plant`, `date`, `shift`, `lokasi`, `bagian`, `kondisi`, `problem`, `tindakan`, `nama_produksi`, `status_produksi`, `catatan_produksi`, `tgl_update_produksi`, `nama_spv`, `status_spv`, `catatan_spv`, `tgl_update_spv`, `created_at`, `modified_at`, `detail`) VALUES
(65, '75e8d510-839f-4214-ad3e-f2c7dd779091', 'qc_ckd', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-08', '2', 'Area Pencucian', '', '', '', '', '', '0', '', '', '', '0', '', '2025-07-08 11:06:06', '2025-07-08 11:06:06', '2025-07-08 11:06:06', '[{\"bagian\":\"Lantai\",\"kondisi\":\"4\",\"problem\":\"Terdapat sisa produk tercecer\",\"tindakan\":\"dibersihkan\"},{\"bagian\":\"Dinding\",\"kondisi\":\"3\",\"problem\":\"retak\",\"tindakan\":\"diperbaiki\"},{\"bagian\":\"Pintu & Curtain\",\"kondisi\":\"bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"bagian\":\"Langit-langit\",\"kondisi\":\"bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"bagian\":\"Lampu & Cover\",\"kondisi\":\"bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"bagian\":\"Softener Filter\",\"kondisi\":\"bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"bagian\":\"Bak Pencucian\",\"kondisi\":\"bersih\",\"problem\":\"\",\"tindakan\":\"\"}]'),
(66, '9586f917-7332-4117-af54-52522591a798', 'qc_sltg', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', '2025-07-09', '1', 'Ruang Buffer Tepung', '', '', '', '', '', '0', '', '', '', '0', '', '2025-07-09 11:15:41', '2025-07-09 11:15:41', '2025-07-09 11:15:41', '[{\"bagian\":\"Ruangan\",\"kondisi\":\"bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"bagian\":\"Pintu dan Tirai Plastik\",\"kondisi\":\"bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"bagian\":\"Pintu Transfer\",\"kondisi\":\"bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"bagian\":\"Blower\\/Exhaust\",\"kondisi\":\"bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"bagian\":\"Lampu+Cover\",\"kondisi\":\"bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"bagian\":\"Palet\",\"kondisi\":\"bersih\",\"problem\":\"\",\"tindakan\":\"\"}]'),
(67, 'cba9d6cd-5cf8-486f-a535-3c99ee3c75c3', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-11', NULL, 'Area Pengayakan', '', '', '', '', '', '0', '', '', '', '0', '', '2025-07-11 14:49:13', '2025-07-11 14:49:13', '2025-07-11 14:49:13', '[{\"bagian\":\"Lantai\",\"kondisi\":\"bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"bagian\":\"Dinding\",\"kondisi\":\"bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"bagian\":\"Pintu & Curtain\",\"kondisi\":\"bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"bagian\":\"Langit-langit\",\"kondisi\":\"bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"bagian\":\"Lampu & Cover\",\"kondisi\":\"bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"bagian\":\"Mesin Ayakan\",\"kondisi\":\"bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"bagian\":\"Rak Kabel\",\"kondisi\":\"bersih\",\"problem\":\"\",\"tindakan\":\"\"},{\"bagian\":\"Exhaust Fan\",\"kondisi\":\"bersih\",\"problem\":\"\",\"tindakan\":\"\"}]');

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

--
-- Dumping data for table `kekuatan_mt`
--

INSERT INTO `kekuatan_mt` (`id`, `uuid`, `username`, `plant`, `date`, `nama_alat`, `nilai`, `keterangan`, `catatan`, `nama_produksi`, `status_produksi`, `catatan_produksi`, `tgl_update_produksi`, `nama_spv`, `status_spv`, `catatan_spv`, `tgl_update_spv`, `created_at`, `modified_at`) VALUES
(4, 'c568e9ad-19f9-4fbb-a82d-f43136f2671c', 'qc_ckd', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-07', 'Gauss meter', '7528 gauss', '', '', '', '0', '', '2025-07-07 13:28:37', '', '0', '', '2025-07-07 13:28:37', '2025-07-07 13:28:37', '2025-07-07 13:28:42');

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
(9, '5b956caf-188a-4362-ae05-62256568880b', 'qc_ckd', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-07', '1', 'Produksi', '08:03:00', '7', 'Tidak menggunakan ciput dengan benar', 'Koordinasi dengan karyawan bersangkutan untun menggunakan ciput dengan benar', 'Karyawan sudah menggunakan ciput dengan benar', '2', 'Terdapat genang air pada lantai ruang Proofing ', 'Koordinasi dengan tim sanitasi dan produksi untuk mengeringkan lantai sebelum digunakan untuk proses produksi', 'Lantai proofing sudah kering', '✓', '', '', '', '', '', '0', '', '2025-07-07 14:09:53', '', '0', '', '2025-07-07 14:09:53', '2025-07-07 14:09:53', '2025-07-07 14:09:53'),
(10, '0369012a-f08f-4a31-8ed6-82a56150a6c8', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-11', '1', 'packing', '14:36:00', '✓', '', '', '', '7', 'kuku panjang', 'potonglah', 'oke', '7', '', '', '', '', '', '0', '', '2025-07-11 14:39:16', '', '0', '', '2025-07-11 14:39:16', '2025-07-11 14:39:16', '2025-07-11 14:39:16');

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

--
-- Dumping data for table `kontaminasi`
--

INSERT INTO `kontaminasi` (`id`, `uuid`, `username`, `plant`, `date`, `shift`, `time`, `jenis_kontaminasi`, `bukti`, `nama_produk`, `kode_produksi`, `jumlah_temuan`, `tahapan`, `analisis`, `tindakan`, `keterangan`, `catatan`, `nama_produksi`, `status_produksi`, `catatan_produksi`, `tgl_update_produksi`, `nama_spv`, `status_spv`, `catatan_spv`, `tgl_update_spv`, `created_at`, `modified_at`) VALUES
(12, 'eb4617b7-5ced-4de2-8188-4ffc2aefc75b', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-11', '1', '14:53:00', 'batu', '4dbdb7c1c791ccb2a487eca477f70e63.jpg', 'BC 1', 'OL 27 101 AA0', 3, 'metal', '-', '-', '-', '-', '', '0', '', '2025-07-11 14:54:44', '', '0', '', '2025-07-11 14:54:44', '2025-07-11 14:54:44', '2025-07-11 14:54:44');

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
  `nama_bahan` varchar(255) DEFAULT NULL,
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

--
-- Dumping data for table `larutan`
--

INSERT INTO `larutan` (`id`, `uuid`, `username`, `plant`, `date`, `shift`, `nama_bahan`, `kadar`, `bahan_kimia`, `air_bersih`, `volume_akhir`, `kebutuhan`, `keterangan`, `tindakan`, `verifikasi`, `catatan`, `nama_produksi`, `status_produksi`, `catatan_produksi`, `tgl_update_produksi`, `nama_spv`, `status_spv`, `catatan_spv`, `tgl_update_spv`, `created_at`, `modified_at`) VALUES
(16, 'c82315bf-74af-4370-8b3f-e81dd196cfeb', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-15', '1', 'METTA KLIN', '3%', '300', '9700', '10000', 'oke', 'Sesuai', '', '', '', '', '0', '', '2025-07-15 17:09:31', 'admin', '1', '', '2025-07-16 13:47:58', '2025-07-15 17:09:31', '2025-07-16 08:29:16'),
(17, '3c2da26d-4edf-4186-9e2a-530fe380e77f', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-15', '1', 'DIVERFOAM', '5%', '250', '4750', '5000', 'oke', 'Sesuai', '', '', '', '', '0', '', '2025-07-15 17:09:31', '', '0', '', '2025-07-15 17:09:31', '2025-07-15 17:09:31', '2025-07-15 17:09:31'),
(18, 'ff9ca0dd-e1c2-403c-9154-70ce272c8557', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-15', '1', 'METTA C 330', '2%', '300', '14700', '15000', 'oke', 'Sesuai', '', '', '', '', '0', '', '2025-07-15 17:09:31', '', '0', '', '2025-07-15 17:09:31', '2025-07-15 17:09:31', '2025-07-15 17:09:31'),
(19, 'b9708c11-eb8b-42d2-9ba5-f6862d75be6b', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-15', '1', 'HAND SOFT', '1000%', '-', '-', '-', 'oke', 'Sesuai', '', '', '', '', '0', '', '2025-07-15 17:09:31', '', '0', '', '2025-07-15 17:09:31', '2025-07-15 17:09:31', '2025-07-15 17:09:31'),
(20, '42c72cf9-ccaa-4b7b-8d28-75253b52cf43', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-15', '1', 'METTA QUART', '400 ppm', '4', '996', '1000', 'oke', 'Sesuai', '', '', '', '', '0', '', '2025-07-15 17:09:31', '', '0', '', '2025-07-15 17:09:31', '2025-07-15 17:09:31', '2025-07-15 17:09:31'),
(21, 'e47e0e40-0f39-4977-9616-faa725eed06f', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-15', '1', 'KLORIN 12% (50 ppm)', '50 ppm', '3', '7997', '8000', 'oke', 'Sesuai', '', '', '', '', '0', '', '2025-07-15 17:09:31', '', '0', '', '2025-07-15 17:09:31', '2025-07-15 17:09:31', '2025-07-15 17:09:31'),
(22, 'de268965-6af5-4955-b5eb-adf63b254c75', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-15', '1', 'KLORIN 12% (200 ppm)', '200 ppm', '167', '99833', '100000', 'oke', 'Sesuai', '', '', '', '', '0', '', '2025-07-15 17:09:31', '', '0', '', '2025-07-15 17:09:31', '2025-07-15 17:09:31', '2025-07-15 17:09:31'),
(23, '605f56f5-e0ab-4174-8df7-777cbc237d69', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-15', '1', 'METTA KLIN', '3%', '300', '9700', '10000', '', '', '', '', '', '', '0', '', '2025-07-16 15:35:09', '', '0', '', '2025-07-16 15:35:09', '2025-07-16 15:35:09', '2025-07-16 15:35:09'),
(24, '30aff166-50f8-4479-9c9a-799a42350e32', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-15', '1', 'DIVERFOAM', '5%', '250', '4750', '5000', '', '', '', '', '', '', '0', '', '2025-07-16 15:35:09', '', '0', '', '2025-07-16 15:35:09', '2025-07-16 15:35:09', '2025-07-16 15:35:09'),
(25, '53405bcb-71ee-4377-be78-4af4285bc57e', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-15', '1', 'METTA C 330', '2%', '300', '14700', '15000', '', '', '', '', '', '', '0', '', '2025-07-16 15:35:09', '', '0', '', '2025-07-16 15:35:09', '2025-07-16 15:35:09', '2025-07-16 15:35:09'),
(26, 'faccca2b-f777-4556-aecc-579589287a5c', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-15', '1', 'HAND SOFT', '1000%', '-', '-', '-', '', '', '', '', '', '', '0', '', '2025-07-16 15:35:09', '', '0', '', '2025-07-16 15:35:09', '2025-07-16 15:35:09', '2025-07-16 15:35:09'),
(27, '8597d81a-d8d2-4fcd-89b2-52bc58c9d664', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-15', '1', 'METTA QUART', '400 ppm', '4', '996', '1000', '', '', '', '', '', '', '0', '', '2025-07-16 15:35:09', '', '0', '', '2025-07-16 15:35:09', '2025-07-16 15:35:09', '2025-07-16 15:35:09'),
(28, 'cc71f37d-3eba-4d5e-a6a9-282921bd2ade', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-15', '1', 'KLORIN 12% (50 ppm)', '50 ppm', '3', '7997', '8000', '', '', '', '', '', '', '0', '', '2025-07-16 15:35:09', '', '0', '', '2025-07-16 15:35:09', '2025-07-16 15:35:09', '2025-07-16 15:35:09'),
(29, '5c641526-094e-4b86-8b7a-61643f3c02ec', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-15', '1', 'KLORIN 12% (200 ppm)', '200 ppm', '167', '99833', '100000', '', '', '', '', '', '', '0', '', '2025-07-16 15:35:09', '', '0', '', '2025-07-16 15:35:09', '2025-07-16 15:35:09', '2025-07-16 15:35:09'),
(30, 'cd01d23b-bcfb-40e7-a098-58eb77d8a415', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-16', '1', 'METTA KLIN', '3%', '300', '9700', '10000', '', '', '', '', '', '', '0', '', '2025-07-16 15:35:28', 'admin', '2', '', '2025-07-16 15:59:11', '2025-07-16 15:35:28', '2025-07-16 15:35:28'),
(31, 'ac7ad71d-1cab-4b82-ace1-9ab8f17ca1bc', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-16', '1', 'DIVERFOAM', '5%', '250', '4750', '5000', '', '', '', '', '', '', '0', '', '2025-07-16 15:35:28', '', '0', '', '2025-07-16 15:35:28', '2025-07-16 15:35:28', '2025-07-16 15:35:28'),
(32, '9f6e9cc9-4a9f-4ce0-8724-8a87d6246efa', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-16', '1', 'METTA C 330', '2%', '300', '14700', '15000', '', '', '', '', '', '', '0', '', '2025-07-16 15:35:28', '', '0', '', '2025-07-16 15:35:28', '2025-07-16 15:35:28', '2025-07-16 15:35:28'),
(33, 'fe70e085-c752-40ad-b72c-36b175abc6a0', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-16', '1', 'HAND SOFT', '1000%', '-', '-', '-', '', '', '', '', '', '', '0', '', '2025-07-16 15:35:28', '', '0', '', '2025-07-16 15:35:28', '2025-07-16 15:35:28', '2025-07-16 15:35:28'),
(34, 'a63f1b8c-0b77-44c9-930c-09dab65147d4', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-16', '1', 'METTA QUART', '400 ppm', '4', '996', '1000', '', '', '', '', '', '', '0', '', '2025-07-16 15:35:28', '', '0', '', '2025-07-16 15:35:28', '2025-07-16 15:35:28', '2025-07-16 15:35:28'),
(35, 'ceff3df0-237a-480c-ae22-93e27533d302', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-16', '1', 'KLORIN 12% (50 ppm)', '50 ppm', '3', '7997', '8000', '', '', '', '', '', '', '0', '', '2025-07-16 15:35:28', '', '0', '', '2025-07-16 15:35:28', '2025-07-16 15:35:28', '2025-07-16 15:35:28'),
(36, '89b3a532-a3d1-4169-a503-fb370c5ad2e4', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-16', '1', 'KLORIN 12% (200 ppm)', '200 ppm', '167', '99833', '100000', '', '', '', '', '', '', '0', '', '2025-07-16 15:35:28', '', '0', '', '2025-07-16 15:35:28', '2025-07-16 15:35:28', '2025-07-16 15:35:28');

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
(12, '0161bf16-2d96-47fd-8a57-1883ef719124', 'qc_sltg', '', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', '2025-07-09', '1', '09:48:00', 'BC Mix Trial', 'PG09301AB0', '008', '1', '1.5 mm', '2.0 mm', '2.5 mm', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', 'terdeteksi', '09:48:53', '09:48:59', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '0', '', '0', '', '0', '', '0', '', '2025-07-09 09:48:45', '2025-07-09 09:48:45', '2025-07-09 09:48:45', '2025-07-09 09:48:45', '', '', '2025-07-09 09:48:45', '2025-07-09 09:48:59', '2025-07-09 09:48:45'),
(13, '4996ff95-811a-40f0-b72d-fc279c54a7d9', 'qc_sltg', '', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', '2025-07-09', '1', '09:57:00', 'BC Mix (Trial)', 'PG09302AB0', '008', '1', '1.5 mm', '2.0 mm', '2.5 mm', 'terdeteksi', '', '', 'terdeteksi', '', '', 'terdeteksi', '', '', '00:00:00', '00:00:00', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '0', '', '0', '', '0', '', '0', '', '2025-07-09 09:57:59', '2025-07-09 09:57:59', '2025-07-09 09:57:59', '2025-07-09 09:57:59', '', '', '2025-07-09 09:57:59', '2025-07-09 09:57:59', '2025-07-09 09:57:59'),
(14, 'e9ee4610-99b7-4b6c-85ab-2cc3c6924495', 'admin', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-11', '1', '14:53:00', 'BC 1', 'OL 27 101 AA0', '009', '-', '2.5 mm', '3.0 mm', '3.0 mm', 'terdeteksi', '', '', 'terdeteksi', '', '', 'terdeteksi', '', '', '00:00:00', '00:00:00', '', '', '', '', '2025-07-11', '1', '', '', '', '', '', '', '', '0', '', '0', '', '0', '', '0', '', '2025-07-11 14:53:44', '2025-07-11 14:53:44', '2025-07-11 14:53:44', '2025-07-11 14:53:44', '', '', '2025-07-11 14:53:44', '2025-07-11 14:53:44', '2025-07-11 14:55:26');

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
  `packing_bb` date NOT NULL,
  `packing_kondisi_kemasan` varchar(255) NOT NULL,
  `packing_ketepatan` varchar(255) NOT NULL,
  `packing_suhu_before` varchar(255) NOT NULL,
  `packing_kadar_air` varchar(255) NOT NULL,
  `packing_bulk_density` varchar(255) NOT NULL,
  `packing_kode_supplier` varchar(255) NOT NULL,
  `packing_net_weight` varchar(255) NOT NULL,
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
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mixing`
--

INSERT INTO `mixing` (`id`, `uuid`, `username`, `plant`, `date`, `shift`, `nama_produk`, `jenis_produk`, `kode_produksi`, `tegu_kode`, `tegu_berat`, `tegu_sens`, `tapioka_kode`, `tapioka_berat`, `tapioka_sens`, `ragi_kode`, `ragi_berat`, `ragi_sens`, `bread_kode`, `bread_berat`, `bread_sens`, `premix`, `shortening_kode`, `shortening_berat`, `shortening_sens`, `chill_water_kode`, `chill_water_berat`, `chill_water_sens`, `mix_dough_waktu_1`, `mix_dough_waktu_2`, `mix_dough_hasil`, `mix_dough_mesin`, `mix_dough_cutting`, `mix_dough_sens`, `mix_dough_suhu_ruang`, `mix_dough_rh_ruang`, `mix_dough_suhu_adonan`, `fermen_suhu`, `fermen_rh`, `fermen_jam_mulai`, `fermen_jam_selesai`, `fermen_lama_proses`, `fermen_hasil_proof`, `electric_baking_suhu`, `electric_baking_mesin`, `electric_baking_expand`, `electric_baking_time_high`, `electric_baking_time_low`, `sens_kematangan`, `sens_rasa`, `sens_aroma`, `sens_tekstur`, `sens_warna`, `date_stall`, `shift_pack`, `stall_jam_mulai`, `stall_jam_berhenti`, `stall_aging`, `stall_kadar_air`, `hasil_grinding`, `dry_suhu`, `dry_rotasi`, `dry_kadar_air`, `produk_hasil`, `produk_rasa`, `produk_aroma`, `produk_tekstur`, `produk_warna`, `packing_nama_produk`, `packing_kode_kemasan`, `packing_bb`, `packing_kondisi_kemasan`, `packing_ketepatan`, `packing_suhu_before`, `packing_kadar_air`, `packing_bulk_density`, `packing_kode_supplier`, `packing_net_weight`, `nama_produksi`, `catatan_produksi`, `status_produksi`, `catatan`, `status_spv`, `nama_spv`, `tgl_update`, `tgl_update_prod`, `catatan_spv`, `created_at`, `modified_at`) VALUES
(20, 'fdbefea1-6ff6-4a94-9b3f-6dc6165e412c', 'qc_ckd', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-07', '1', 'BC MIX', 'BREADCRUMBS', 'PG 07 101 CC0', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '[]', '', 0, '', '', 0, '', 8, 3, '1', '1', 650, 'oke', '34.6', '78', 30.5, 35, 79, '15:00:00', '00:00:00', 70, 'OK', 96.6, '09', '87', '08', '4', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-09', '2', '00:00:00', '17:00:00', 12, 0, 'OK', 86, 4, 5.56, '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '0', '', '0', '', '2025-07-07 14:08:52', '2025-07-07 14:08:52', '', '2025-07-07 14:08:52', '2025-07-09 11:15:30'),
(21, '0426bd8e-3254-485d-8b4d-fea276d0a086', 'qc_ckd', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-09', '2', 'BC MIX', 'Breadcrumbs', 'PG 09 101 AA0', 'Q606C11', 32924, 'oke', '25052025', 22700, 'oke', 'P 25062025', 380, 'oke', '5220032025', 2345, 'oke', '[{\"kode\":\"PF 06 101 AA0\",\"berat\":\"5677\",\"sens\":\"oke\"},{\"kode\":\"PF 06 101 AA0\",\"berat\":\"5678\",\"sens\":null},{\"kode\":\"PF 06 101 AA0\",\"berat\":\"67899\",\"sens\":null}]', 'SBY24314', 2520, 'oke', '15.4', 567788, 'oke', 3, 8, '1', '1', 650, 'oke', '34.6', '78', 30.4, 35, 80, '15:20:00', '16:30:00', 70, 'OK', 96.6, '09', '87', '4', '8', 'oke', 'oke', 'oke', 'oke', 'oke', '2025-07-09', '1', '16:30:00', '07:40:00', 10, 34, 'OK', 85, 4, 6.5, 'oke', 'oke', 'oke', 'oke', 'oke', 'BC MIX', 'PG 09 101 AA0', '2026-01-09', '1', '1', '33', '7.88', '223', 'PG 09 101AB0', '10,000', '', '', '0', '', '0', '', '2025-07-09 11:02:19', '2025-07-09 11:02:19', '', '2025-07-09 11:02:19', '2025-07-09 11:23:25'),
(22, 'c07b8422-2c88-40cf-ae63-3ddcf9aae89b', 'admin', '2dadf061-fb44-4998-bcb2-1d6f6cb8f972', '2025-07-09', '1', 'BC MIX', 'Orange', 'OL 19 101 AA0', 'OL 10 101 BB0', 22, 'oke', 'OL 12 102 CC0', 12, 'oke', 'OL 13 101 CC0', 11, 'oke', 'OL 12 101 AA0', 24, 'oke', '[{\"kode\":\"PF 23 101 BB0\",\"berat\":\"2\",\"sens\":\"oke\"}]', 'OL 12 103 CC0', 344, 'oke', '12 12 2024', 22, 'oke', 0, 0, '', '', 0, '', '', '', 0, 35, 80, '14:00:00', '16:00:00', 66, 'oke', 0, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', 0, 0, 0, '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '0', '', '0', '', '2025-07-09 13:27:16', '2025-07-09 13:27:16', '', '2025-07-09 13:27:16', '2025-07-10 10:43:46'),
(23, '4951fa58-9efa-462a-8462-308ef43edd01', 'qc_sltg', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', '2025-07-09', '1', 'BC Mix Nat (Trial)', 'BC', 'PG09301AB0', 'A', 1, 'oke', 'S', 1, 'oke', 'F', 1, 'oke', 'E', 1, 'oke', '[{\"kode\":\"A\",\"berat\":\"1\",\"sens\":\"oke\"}]', 'S', 1, 'oke', '-', 1, 'oke', 0, 0, '', '', 0, '', '', '', 0, 0, 0, '00:00:00', '00:00:00', 0, '', 0, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0, 0, '', 0, 0, 0, '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '0', '', '0', '', '2025-07-09 13:56:39', '2025-07-09 13:56:39', '', '2025-07-09 13:56:39', '2025-07-09 14:02:09');

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
(1, 'c8f6b7df-8bf8-4152-8bec-48b43418611c', 'Putri Harnis', 'harnis', '$2y$10$aBaKYwziC3AzQDJ2gweB0eK/1GFXbxDMTDwHv6tl2aZXoOXiQdqMy', 'putri.harnis@cp.co.id', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', '66c8b282-9c49-40d3-85a0-257edc2160b6', '4', 'foto_1751446055.jpg', 'admin', '2024-02-28 09:51:31', '2025-07-15 14:20:53'),
(11, '0bd19b0f-d62c-444f-9862-cd3381dfef80', 'Admin', 'admin', '$2y$10$DWxZDzzIAFhzhQ3nWMPMyuVjbcIj.3BziDdZBjCo6qhMforiRDDpy', 'putri.harnis@cp.co.id', '651ac623-5e48-44cc-b2f6-5d622603f53c', '66c8b282-9c49-40d3-85a0-257edc2160b6', '0', 'foto_1751446086.jpg', 'admin', '2025-06-05 11:05:01', '2025-06-30 15:21:44'),
(12, '0da0c0cf-618a-4cd3-92f5-b57c3475ade8', 'Feri Agus Setiawan', 'feriagus', '$2y$10$9wmoZOnzba/TC1Z3M9t9Lembforr4r9EQuRD4XDyTriGVeJbYP8hK', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '66c8b282-9c49-40d3-85a0-257edc2160b6', '3', '', '', '2025-06-12 09:05:30', '2025-06-12 09:05:30'),
(14, '64187c6c-98ca-4a0f-9425-ffe2bb0490c4', 'SPV QC Cikande', 'spv_ckd', '$2y$10$PQI33.KUKdUv3O5.g8rwV.OZn.b0WJaMdZs7flAN24hcIuXTAVbL.', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '66c8b282-9c49-40d3-85a0-257edc2160b6', '2', '', '', '2025-07-05 12:32:13', '2025-07-05 12:32:13'),
(15, 'e4e97079-036c-49a6-816e-dc12e10a1b79', 'Foreman Produksi Cikande', 'foreman_ckd', '$2y$10$zw3pTdufIDJuRCya7J7J3u8EvmddYoiYlK4MJAG8GLHbbHe.sQMTG', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '3622efc5-b2f8-4370-acb0-4833617fa0af', '3', '', 'admin', '2025-07-05 12:32:50', '2025-07-05 12:35:24'),
(16, 'ab8de39a-2296-4562-bcb2-13f940de3cec', 'Warehouse Cikande', 'wh_ckd', '$2y$10$w/a4IULkAPJloBQ6x2JJNeA2qeD1Mp2JU3FYLQDK4rbspb513VsNu', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', 'a69f6469-8389-4d8b-806f-b6d5d4591560', '6', '', '', '2025-07-05 12:33:26', '2025-07-05 12:33:26'),
(17, 'bda8cab9-2e85-4a32-8c4d-94f0286f1691', 'QC Inspector Cikande', 'qc_ckd', '$2y$10$5DQ6n0MkKQ5Yzkg005ZMp.DoyNHdX2zUocVUDzFeWBsNAtiALV/DG', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '66c8b282-9c49-40d3-85a0-257edc2160b6', '4', '', '', '2025-07-05 12:33:57', '2025-07-05 12:33:57'),
(18, '29b0ba41-c64c-4bcf-9ba9-4fb0998af1c3', 'SPV QC Salatiga', 'spv_sltg', '$2y$10$Be2lZ3uGldJM1wNAv5wv3O8G8svq3U2CUv25nm3SpWy5VGD5WXra6', '', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', '66c8b282-9c49-40d3-85a0-257edc2160b6', '2', '', '', '2025-07-05 12:34:37', '2025-07-05 12:34:37'),
(19, '5eb40c95-5ffa-41ff-8e36-8f574792813f', 'Foreman Produksi Salatiga', 'foreman_sltg', '$2y$10$thN/ts5Cz2McwUYqz7.Rre/ZEOcZs72YR9PLPG1..Ujgvb26YtNO2', '', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', '3622efc5-b2f8-4370-acb0-4833617fa0af', '3', '', '', '2025-07-05 12:35:14', '2025-07-05 12:35:14'),
(20, 'e23866a8-3277-49bd-adfd-d57041cf9727', 'Warehouse Salatiga', 'wh_sltg', '$2y$10$DgITBUVIKuDLRKFbNLZsuOhkxonDbyzBzhkwGvBtKxFSRoB9hU2jC', '', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', 'a69f6469-8389-4d8b-806f-b6d5d4591560', '6', '', '', '2025-07-05 12:36:10', '2025-07-05 12:36:10'),
(21, '8f43e2dd-9457-4732-a6a2-4c52158f5312', 'Enginer Salatiga', 'eng_sltg', '$2y$10$fwhjlOq9MpDWiscWDPkbYOfuyGlqqxBtAP2Y5vUUlqyDuBYElgUDG', '', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', '73e68eee-2615-4557-9e1a-6b6371c35ccd', '5', '', '', '2025-07-05 12:36:43', '2025-07-05 12:36:43'),
(22, '10484d5e-65ec-4537-90dd-9ddc48fe1b7f', 'Lab Salatiga', 'lab_sltg', '$2y$10$lQ2wRJLpzBHahbLGf2rUmeicrsIGTTqETq7pz2jqn0K.uhUrbxNEW', '', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', '66c8b282-9c49-40d3-85a0-257edc2160b6', '7', '', '', '2025-07-05 12:37:15', '2025-07-05 12:37:15'),
(23, 'e2030420-f838-4b7f-a5af-fff44b5fa32b', 'QC Inspector Salatiga', 'qc_sltg', '$2y$10$cmKc2O.5viV/cbN.Yj4PZ.a.HkAnRi4FM0leuHYuUFuG.wGonPl8S', '', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', '66c8b282-9c49-40d3-85a0-257edc2160b6', '4', '', '', '2025-07-05 12:37:52', '2025-07-05 12:37:52'),
(24, '7018d241-835f-4951-bea3-83e2c7116dfb', 'Admin Salatiga', 'admin.salatiga', '$2y$10$gvfJNRvwvS4okwOiQiUeEuVcC2MGOc9WUUnkG665ulF7IyNLyzGXi', '', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', '66c8b282-9c49-40d3-85a0-257edc2160b6', '0', '', '', '2025-07-07 16:49:18', '2025-07-07 16:49:18');

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
(15, 'c891c7b0-95f8-4a2d-986c-3e0a371d9880', 'qc_ckd', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-07', '1', 'Ter C', 'C3H205', '2026-05-07', 25, 0, 0, 0, 'admin', '', '1', 'Baik tidak ada yang rusak', '', '1', 'admin', '2025-07-07 16:14:29', '2025-07-07 16:14:20', '', '2025-07-07 13:25:41', '2025-07-07 13:25:41');

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
(5, '651ac623-5e48-44cc-b2f6-5d622603f53c', 'harnis', 'Cikande 2 Bread Crumb', '2024-11-13 15:34:48', '2024-11-13 15:34:48'),
(8, '1eb341e0-1ec4-4484-ba8f-32d23352b84d', 'harnis', 'Salatiga Bread Crumb', '2025-06-12 10:01:52', '2025-07-02 16:05:03');

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

--
-- Dumping data for table `reagen`
--

INSERT INTO `reagen` (`id`, `uuid`, `username`, `plant`, `date`, `nama_larutan`, `no_lot`, `best_before`, `tgl_buka_botol`, `volume_penggunaan`, `volume_akhir`, `catatan`, `nama_spv`, `status_spv`, `catatan_spv`, `tgl_update_spv`, `created_at`, `modified_at`) VALUES
(7, 'b9922ef9-ca95-47ab-8f8e-25a38f78559d', 'qc_sltg', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', '2025-07-09', 'Reagen C1₂–1', 'HC32047075', '2026-02-14', '2025-04-14', '0,2', '13,4', '', '', '0', '', '2025-07-09 13:32:37', '2025-07-09 13:32:37', '2025-07-09 13:32:37'),
(8, '65a61e82-ae82-4cb2-b552-09037ee51e62', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-16', 'Reagen C1₂–1', '10hfhf', '2026-07-16', '2025-07-16', '100', '800', '', '', '0', '', '2025-07-16 16:11:59', '2025-07-16 16:11:59', '2025-07-16 16:12:39');

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
  `deskripsi` varchar(255) NOT NULL,
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
(8, '31756baf-b8e0-4c99-b135-cdaaf393d8a8', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-16', '1', '08:48:00', '[{\"sub_area\":\"Foot Basin\",\"standar\":\"200\",\"aktual\":\"200\",\"suhu_air\":\"\",\"keterangan\":\"oke\",\"tindakan\":\"dibersihkan\",\"gambar\":\"gambar_1752630670_0.jpeg\"},{\"sub_area\":\"Hand Basin\",\"standar\":\"50\",\"aktual\":\"200\",\"suhu_air\":\"\",\"keterangan\":\"oke\",\"tindakan\":\"dibersihkan\",\"gambar\":\"gambar_1752630670_1.jpeg\"}]', '', 'admin', '1', '', '2025-07-16 09:56:31', 'admin', '1', '', '2025-07-16 09:39:43', '2025-07-16 08:51:10', '2025-07-16 08:55:03'),
(9, 'c8151547-402d-425b-8a7e-ad8dbe75b317', 'qc_sltg', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', '2025-07-16', '1', '11:23:00', '[{\"sub_area\":\"Foot Basin\",\"standar\":\"200\",\"aktual\":\"\",\"suhu_air\":\"\",\"keterangan\":\"\",\"tindakan\":\"\",\"gambar\":null},{\"sub_area\":\"Hand Basin\",\"standar\":\"50\",\"aktual\":\"\",\"suhu_air\":\"\",\"keterangan\":\"\",\"tindakan\":\"\",\"gambar\":null},{\"sub_area\":\"Air Cuci Tangan\",\"standar\":\"-\",\"aktual\":\"\",\"suhu_air\":\"\",\"keterangan\":\"\",\"tindakan\":\"\",\"gambar\":null},{\"sub_area\":\"Air Cleaning\",\"standar\":\"-\",\"aktual\":\"\",\"suhu_air\":\"\",\"keterangan\":\"\",\"tindakan\":\"\",\"gambar\":null}]', '', '', '0', '', '2025-07-16 11:24:01', '', '0', '', '2025-07-16 11:24:01', '2025-07-16 11:24:01', '2025-07-16 11:24:01');

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

--
-- Dumping data for table `sensori_fg`
--

INSERT INTO `sensori_fg` (`id`, `uuid`, `username`, `plant`, `date`, `nama_produk`, `produk`, `tindakan`, `catatan`, `nama_produksi`, `status_produksi`, `catatan_produksi`, `tgl_update_produksi`, `nama_spv`, `status_spv`, `catatan_spv`, `tgl_update_spv`, `created_at`, `modified_at`) VALUES
(4, 'c04c5c68-0fee-4ac6-b5ca-681506bf7859', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-15', 'BC MIX', '[{\"kode_produksi\":\"PG 15 101 BB0\",\"best_before\":\"2026-07-15\",\"warna\":\"Ok\",\"tekstur\":\"Ok\",\"rasa\":\"Ok\",\"aroma\":\"Ok\",\"kenampakan\":\"Ok\"},{\"kode_produksi\":\"PG 15 102 BB0\",\"best_before\":\"2026-07-15\",\"warna\":\"Ok\",\"tekstur\":\"Ok\",\"rasa\":\"Ok\",\"aroma\":\"Ok\",\"kenampakan\":\"Ok\"}]', 'AAAA', '', '', '0', '', '2025-07-15 14:39:47', 'admin', '1', '', '2025-07-15 14:47:54', '2025-07-15 14:39:47', '2025-07-15 15:21:13'),
(5, '3d3a1b97-8912-4a97-8c68-bd065d1a51d8', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-15', 'SRFA', '[{\"kode_produksi\":\"PG 15 101 CC0\",\"best_before\":\"2025-07-15\",\"warna\":\"Ok\",\"tekstur\":\"Ok\",\"rasa\":\"Ok\",\"aroma\":\"Ok\",\"kenampakan\":\"Ok\"}]', 'SSS', '', '', '0', '', '2025-07-15 15:20:58', '', '0', '', '2025-07-15 15:20:58', '2025-07-15 15:20:58', '2025-07-15 15:21:07');

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
  `lokasi` varchar(255) NOT NULL,
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
(22, '68140be8-a9ef-4a43-9907-bcfcea63cd5f', 'qc_ckd', '2025-07-08', '1', '651ac623-5e48-44cc-b2f6-5d622603f53c', '11:00:00', 'Ruang Produksi', '30', '72', '', '', '0', '', '2025-07-08 11:17:10', '', '0', '', '2025-07-08 11:17:10', '2025-07-08 11:17:10', '2025-07-08 11:17:10'),
(23, '4bd87eda-462c-42a7-b05d-9c7c28c84a5b', 'qc_ckd', '2025-07-09', '1', '651ac623-5e48-44cc-b2f6-5d622603f53c', '08:00:00', 'Ruang Produksi', '34.4', '68', '', '', '0', '', '2025-07-09 10:58:47', '', '0', '', '2025-07-09 10:58:47', '2025-07-09 10:58:47', '2025-07-09 10:58:47'),
(24, 'bde12d48-35d4-4431-b8ae-924c9053cff5', 'admin', '2025-07-11', '1', '651ac623-5e48-44cc-b2f6-5d622603f53c', '14:00:00', 'Ruang Produksi', '26', '70', '', 'admin', '1', '', '2025-07-16 13:46:00', 'admin', '1', '', '2025-07-11 14:34:23', '2025-07-11 14:33:32', '2025-07-11 14:33:32');

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
(7, 'c511f906-22c1-4779-9aa7-19e8651e6583', 'qc_ckd', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-07', '1', '51319572/001', 'Testo 106', 'Produksi', '[{\"pukul\":\"07:03\",\"standar\":\"0\",\"hasil\":\"0.0\"}]', '', '', '', '0', '', '2025-07-07 13:34:58', '', '0', '', '2025-07-07 13:34:58', '2025-07-07 13:34:58', '2025-07-07 13:34:58'),
(8, '2edf919c-f2d6-47b7-b53a-bfdaa6564efd', 'admin', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-11', '1', '10384727', '106', 'Packing', '[{\"pukul\":\"11:19\",\"standar\":\"0\",\"hasil\":\"-1\"}]', '', '', '', '0', '', '2025-07-11 11:17:19', '', '0', '', '2025-07-11 11:17:19', '2025-07-11 11:17:19', '2025-07-11 11:17:19');

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
(5, '202dd50c-00fa-4b84-ac3b-4be74e161a42', 'qc_ckd', '651ac623-5e48-44cc-b2f6-5d622603f53c', '2025-07-07', '1', '213546', '3 kg', 'jadever', 'area mixing', '1000', '[{\"pukul\":\"07:15\",\"hasil\":\"1002\"}]', '', '', '', '0', '', '2025-07-07 13:36:49', '', '0', '', '2025-07-07 13:36:49', '2025-07-07 13:36:49', '2025-07-07 13:36:49');

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
-- Indexes for table `analisis_lab`
--
ALTER TABLE `analisis_lab`
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
-- Indexes for table `plant`
--
ALTER TABLE `plant`
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
-- AUTO_INCREMENT for table `analisis_lab`
--
ALTER TABLE `analisis_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `benda_pecah`
--
ALTER TABLE `benda_pecah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chiller`
--
ALTER TABLE `chiller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `kebersihan_karyawan`
--
ALTER TABLE `kebersihan_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kebersihan_mesin`
--
ALTER TABLE `kebersihan_mesin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kebersihan_peralatan`
--
ALTER TABLE `kebersihan_peralatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kebersihan_ruang`
--
ALTER TABLE `kebersihan_ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `kekuatan_mt`
--
ALTER TABLE `kekuatan_mt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ketidaksesuaian`
--
ALTER TABLE `ketidaksesuaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kondisi_kerja`
--
ALTER TABLE `kondisi_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kontaminasi`
--
ALTER TABLE `kontaminasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `larutan`
--
ALTER TABLE `larutan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `loading`
--
ALTER TABLE `loading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `magnet_trap`
--
ALTER TABLE `magnet_trap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `metal`
--
ALTER TABLE `metal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mixing`
--
ALTER TABLE `mixing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pembuatan_larutan`
--
ALTER TABLE `pembuatan_larutan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemeriksaan_chemical`
--
ALTER TABLE `pemeriksaan_chemical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pemeriksaan_pengiriman`
--
ALTER TABLE `pemeriksaan_pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemusnahan`
--
ALTER TABLE `pemusnahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penerimaan_kemasan`
--
ALTER TABLE `penerimaan_kemasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengayakan`
--
ALTER TABLE `pengayakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pengemasan`
--
ALTER TABLE `pengemasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plant`
--
ALTER TABLE `plant`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `residu`
--
ALTER TABLE `residu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `retain`
--
ALTER TABLE `retain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sanitasi`
--
ALTER TABLE `sanitasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sanitasi_wh`
--
ALTER TABLE `sanitasi_wh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seasoning`
--
ALTER TABLE `seasoning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sensori_fg`
--
ALTER TABLE `sensori_fg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suhu`
--
ALTER TABLE `suhu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `thermometer`
--
ALTER TABLE `thermometer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `timbangan`
--
ALTER TABLE `timbangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `verifikasi_mt`
--
ALTER TABLE `verifikasi_mt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
