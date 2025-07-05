-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2025 at 03:35 AM
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
(1, 'c8f6b7df-8bf8-4152-8bec-48b43418611c', 'Putri Harnis', 'harnis', '$2y$10$aBaKYwziC3AzQDJ2gweB0eK/1GFXbxDMTDwHv6tl2aZXoOXiQdqMy', 'putri.harnis@cp.co.id', '651ac623-5e48-44cc-b2f6-5d622603f53c', '66c8b282-9c49-40d3-85a0-257edc2160b6', '4', 'foto_1751446055.jpg', 'admin', '2024-02-28 09:51:31', '2025-07-02 16:05:50'),
(11, '0bd19b0f-d62c-444f-9862-cd3381dfef80', 'Admin', 'admin', '$2y$10$DWxZDzzIAFhzhQ3nWMPMyuVjbcIj.3BziDdZBjCo6qhMforiRDDpy', 'putri.harnis@cp.co.id', '651ac623-5e48-44cc-b2f6-5d622603f53c', '66c8b282-9c49-40d3-85a0-257edc2160b6', '0', 'foto_1751446086.jpg', 'admin', '2025-06-05 11:05:01', '2025-06-30 15:21:44'),
(12, '0da0c0cf-618a-4cd3-92f5-b57c3475ade8', 'Feri Agus Setiawan', 'feriagus', '$2y$10$9wmoZOnzba/TC1Z3M9t9Lembforr4r9EQuRD4XDyTriGVeJbYP8hK', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '66c8b282-9c49-40d3-85a0-257edc2160b6', '3', '', '', '2025-06-12 09:05:30', '2025-06-12 09:05:30'),
(13, '7511bb32-0a58-4408-886d-762f9d988f92', 'Guest', 'guest', '$2y$10$Qqzfo34xhs.HI.URQQPwYucKHqGPcm4k8A98469EBXretJJSeq0U6', '', '1eb341e0-1ec4-4484-ba8f-32d23352b84d', '66c8b282-9c49-40d3-85a0-257edc2160b6', '4', '', '', '2025-07-03 16:47:46', '2025-07-03 16:47:46');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `kebersihan_karyawan`
--
ALTER TABLE `kebersihan_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kebersihan_mesin`
--
ALTER TABLE `kebersihan_mesin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kebersihan_peralatan`
--
ALTER TABLE `kebersihan_peralatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kebersihan_ruang`
--
ALTER TABLE `kebersihan_ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `kekuatan_mt`
--
ALTER TABLE `kekuatan_mt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ketidaksesuaian`
--
ALTER TABLE `ketidaksesuaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kondisi_kerja`
--
ALTER TABLE `kondisi_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kontaminasi`
--
ALTER TABLE `kontaminasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `larutan`
--
ALTER TABLE `larutan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mixing`
--
ALTER TABLE `mixing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thermometer`
--
ALTER TABLE `thermometer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `timbangan`
--
ALTER TABLE `timbangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `verifikasi_mt`
--
ALTER TABLE `verifikasi_mt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
