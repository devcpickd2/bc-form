-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 10:43 AM
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
-- Database: `rpa`
--

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
(7, 'a69f6469-8389-4d8b-806f-b6d5d4591560', '000', 'Warehouse', '2024-02-28 09:49:22', '2024-02-28 09:49:22'),
(8, 'e45f85f0-7e48-4ceb-93fa-5bc588180ecd', '000', 'SLDRYProduk', '2024-02-28 09:49:35', '2024-02-28 09:49:35');

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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `uuid`, `nama`, `username`, `password`, `email`, `plant`, `departemen`, `tipe_user`, `created_at`, `modified_at`) VALUES
(1, 'c8f6b7df-8bf8-4152-8bec-48b43418611c', 'Putri Harnis', 'harnis', '$2y$10$aBaKYwziC3AzQDJ2gweB0eK/1GFXbxDMTDwHv6tl2aZXoOXiQdqMy', 'putri.harnis@cp.co.id', '4593d932-4594-4aad-a5d2-46c1598ddd70', '66c8b282-9c49-40d3-85a0-257edc2160b6', '0', '2024-02-28 09:51:31', '2024-02-28 09:51:31'),
(3, 'e96b7340-0bc2-4bbe-9476-d97a447cd9ab', 'Admin1', 'admin1', '$2y$10$WXgmX4gPpl.QrIYD3f2BeetIdN9JqBW8u7WJWkQp94Osc.RkLR166', '', '3239ce13-ab20-40b3-b889-f5a832c32b86', '66c8b282-9c49-40d3-85a0-257edc2160b6', '0', '2024-03-18 15:08:20', '2024-03-18 15:09:32'),
(4, 'd7c73711-662e-4bf2-aef8-8b4e0c13563b', 'ANWAR SUBHAN', 'ANWAR', '$2y$10$XUDO5VosTK2ILLSoA5nFy.YsCucwUYReSFV5.wMnK6yaz10HbN8ZS', 'anwarsubhanalausy@gmail.com', '3239ce13-ab20-40b3-b889-f5a832c32b86', '66c8b282-9c49-40d3-85a0-257edc2160b6', '4', '2024-04-03 10:04:07', '2024-04-03 10:04:07');

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
(1, '3239ce13-ab20-40b3-b889-f5a832c32b86', '000', 'Salatiga', '2024-02-28 09:47:31', '2024-03-18 15:07:56'),
(2, '4593d932-4594-4aad-a5d2-46c1598ddd70', '000', 'Cikande', '2024-02-28 09:50:46', '2024-02-28 09:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `post_mortem`
--

CREATE TABLE `post_mortem` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_farm` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `nomor_truk` varchar(255) NOT NULL,
  `ch_oh` varchar(255) NOT NULL,
  `waktu_kedatangan` time NOT NULL,
  `jumlah_ayam` float NOT NULL,
  `average_farm` float NOT NULL,
  `average_rpa` float NOT NULL,
  `ekspedisi` varchar(255) NOT NULL,
  `nama_mesin` varchar(255) NOT NULL,
  `sayap_memar_kebiruan_defect` float NOT NULL,
  `sayap_memar_kebiruan_persen` float NOT NULL,
  `sayap_patah_memar_defect` float NOT NULL,
  `sayap_patah_memar_persen` float NOT NULL,
  `kaki_arthritis_defect` float NOT NULL,
  `kaki_arthritis_persen` float NOT NULL,
  `hock_bruise_defect` float NOT NULL,
  `hock_bruise_persen` float NOT NULL,
  `hock_burn_defect` float NOT NULL,
  `hock_burn_persen` float NOT NULL,
  `dada_memar_defect` float NOT NULL,
  `dada_memar_persen` float NOT NULL,
  `breast_burn_defect` float NOT NULL,
  `breast_burn_persen` float NOT NULL,
  `punggung_memar_defect` float NOT NULL,
  `punggung_memar_persen` float NOT NULL,
  `kaki_patah_defect` float NOT NULL,
  `kaki_patah_persen` float NOT NULL,
  `kaki_memar_defect` float NOT NULL,
  `kaki_memar_persen` float NOT NULL,
  `penyakit_kulit_defect` float NOT NULL,
  `penyakit_kulit_persen` float NOT NULL,
  `luka_parut_defect` float NOT NULL,
  `luka_parut_persen` float NOT NULL,
  `kulit_berjamur_defect` float NOT NULL,
  `kulit_berjamur_persen` float NOT NULL,
  `kulit_daging_bintik_defect` float NOT NULL,
  `kulit_daging_bintik_persen` float NOT NULL,
  `pertumbuhan_tidak_normal_defect` float NOT NULL,
  `pertumbuhan_tidak_normal_persen` float NOT NULL,
  `sayap_memar_kebiruan_defect_lebih` float NOT NULL,
  `sayap_patah_memar_defect_lebih` float NOT NULL,
  `kaki_memar_kebiruan_defect_lebih` float NOT NULL,
  `kaki_patah_memar_defect_lebih` float NOT NULL,
  `arthritis_defect_lebih` float NOT NULL,
  `hock_bruise_defect_lebih` float NOT NULL,
  `hock_burn_defect_lebih` float NOT NULL,
  `dada_memar_kebiruan_defect_lebih` float NOT NULL,
  `breast_burn_defect_lebih` float NOT NULL,
  `punggung_memar_kebiruan_defect_lebih` float NOT NULL,
  `luka_parut_defect_lebih` float NOT NULL,
  `kulit_berjamur_defect_lebih` float NOT NULL,
  `penyakit_bisul_defect_lebih` float NOT NULL,
  `kulit_bintik_merah_defect_lebih` float NOT NULL,
  `pertumbuhan_tidak_normal_defect_lebih` float NOT NULL,
  `jumlah_defect_d` float NOT NULL,
  `hati_tidak_normal_defect` float NOT NULL,
  `hati_tidak_normal_persen` float NOT NULL,
  `jantung_tidak_normal_defect` float NOT NULL,
  `jantung_tidak_normal_persen` float NOT NULL,
  `organ_dalam_tidak_normal_defect` float NOT NULL,
  `organ_dalam_tidak_normal_persen` float NOT NULL,
  `sub_total_farm_defect` float NOT NULL,
  `sub_total_farm_persen` float NOT NULL,
  `sub_total_ordal_farm_defect` float NOT NULL,
  `sub_total_ordal_farm_persen` float NOT NULL,
  `sg_sayap_memar_defect` float NOT NULL,
  `sg_sayap_memar_persen` float NOT NULL,
  `sg_kaki_memar_defect` float NOT NULL,
  `sg_kaki_memar_persen` float NOT NULL,
  `sg_dada_memar_defect` float NOT NULL,
  `sg_dada_memar_persen` float NOT NULL,
  `sg_punggung_memar_defect` float NOT NULL,
  `sg_punggung_memar_persen` float NOT NULL,
  `sg_sayap_memar_kemerahan_defect_lebih` float NOT NULL,
  `sg_kaki_memar_kemerahan_defect_lebih` float NOT NULL,
  `sg_dada_memar_kemerahan_defect_lebih` float NOT NULL,
  `sg_punggung_memar_kemerahan_defect_lebih` float NOT NULL,
  `jumlah_defect_e` float NOT NULL,
  `sub_total_sg_defect` float NOT NULL,
  `sub_total_sg_persen` float NOT NULL,
  `rpa_over_scalder_defect` float NOT NULL,
  `rpa_over_scalder_persen` float NOT NULL,
  `rpa_sayap_patah_defect` float NOT NULL,
  `rpa_sayap_patah_persen` float NOT NULL,
  `rpa_kaki_patah_defect` float NOT NULL,
  `rpa_kaki_patah_persen` float NOT NULL,
  `rpa_kulit_sobek_dp_defect` float NOT NULL,
  `rpa_kulit_sobek_dp_persen` float NOT NULL,
  `rpa_kulit_sobek_dada_defect` float NOT NULL,
  `rpa_kulit_sobek_dada_persen` float NOT NULL,
  `rpa_kulit_sobek_paha_defect` float NOT NULL,
  `rpa_kulit_sobek_paha_persen` float NOT NULL,
  `rpa_karkas_rusak_defect` float NOT NULL,
  `rpa_karkas_rusak_persen` float NOT NULL,
  `rpa_empedu_pecah_defect` float NOT NULL,
  `rpa_empedu_pecah_persen` float NOT NULL,
  `rpa_daging_dada_bawah_cut_defect` float NOT NULL,
  `rpa_daging_dada_bawah_cut_persen` float NOT NULL,
  `rpa_daging_dada_atas_cut_defect` float NOT NULL,
  `rpa_daging_dada_atas_cut_persen` float NOT NULL,
  `rpa_kaki_terpotong_defect` float NOT NULL,
  `rpa_kaki_terpotong_persen` float NOT NULL,
  `rpa_over_scalder_defect_lebih` float NOT NULL,
  `rpa_sayap_patah_defect_lebih` float NOT NULL,
  `rpa_kaki_patah_defect_lebih` float NOT NULL,
  `rpa_kulit_sobek_dp_defect_lebih` float NOT NULL,
  `rpa_kulit_sobek_dada_defect_lebih` float NOT NULL,
  `rpa_kulit_sobek_paha_defect_lebih` float NOT NULL,
  `rpa_karkas_rusak_defect_lebih` float NOT NULL,
  `rpa_empedu_pecah_defect_lebih` float NOT NULL,
  `rpa_daging_dada_bawah_defect_lebih` float NOT NULL,
  `rpa_daging_dada_atas_defect_lebih` float NOT NULL,
  `rpa_kaki_terpotong_defect_lebih` float NOT NULL,
  `jumlah_defect_f` float NOT NULL,
  `sub_total_rpa_defect` float NOT NULL,
  `sub_total_rpa_persen` float NOT NULL,
  `ip_hati_hancur_ringan_defect` float NOT NULL,
  `ip_hati_hancur_ringan_persen` float NOT NULL,
  `ip_hati_hancur_berat_defect` float NOT NULL,
  `ip_hati_hancur_berat_persen` float NOT NULL,
  `ip_hati_hancur_ringan_defect_lebih` float NOT NULL,
  `ip_hati_hancur_berat_defect_lebih` float NOT NULL,
  `jumlah_defect_g` float NOT NULL,
  `sub_total_ip_defect` float NOT NULL,
  `sub_total_ip_persen` float NOT NULL,
  `ayam_defect_lebih_dari_satu` float NOT NULL,
  `ayam_defect_lebih_dari_satu_persen` float NOT NULL,
  `total_defect` float NOT NULL,
  `total_persen` float NOT NULL,
  `total_ayam_defect` float NOT NULL,
  `total_ayam_defect_persen` float NOT NULL,
  `total_defect_ayam_lebih` float NOT NULL,
  `total_defect_ayam_lebih_persen` float NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_mortem`
--

INSERT INTO `post_mortem` (`id`, `uuid`, `username`, `nama_farm`, `date`, `shift`, `nomor_truk`, `ch_oh`, `waktu_kedatangan`, `jumlah_ayam`, `average_farm`, `average_rpa`, `ekspedisi`, `nama_mesin`, `sayap_memar_kebiruan_defect`, `sayap_memar_kebiruan_persen`, `sayap_patah_memar_defect`, `sayap_patah_memar_persen`, `kaki_arthritis_defect`, `kaki_arthritis_persen`, `hock_bruise_defect`, `hock_bruise_persen`, `hock_burn_defect`, `hock_burn_persen`, `dada_memar_defect`, `dada_memar_persen`, `breast_burn_defect`, `breast_burn_persen`, `punggung_memar_defect`, `punggung_memar_persen`, `kaki_patah_defect`, `kaki_patah_persen`, `kaki_memar_defect`, `kaki_memar_persen`, `penyakit_kulit_defect`, `penyakit_kulit_persen`, `luka_parut_defect`, `luka_parut_persen`, `kulit_berjamur_defect`, `kulit_berjamur_persen`, `kulit_daging_bintik_defect`, `kulit_daging_bintik_persen`, `pertumbuhan_tidak_normal_defect`, `pertumbuhan_tidak_normal_persen`, `sayap_memar_kebiruan_defect_lebih`, `sayap_patah_memar_defect_lebih`, `kaki_memar_kebiruan_defect_lebih`, `kaki_patah_memar_defect_lebih`, `arthritis_defect_lebih`, `hock_bruise_defect_lebih`, `hock_burn_defect_lebih`, `dada_memar_kebiruan_defect_lebih`, `breast_burn_defect_lebih`, `punggung_memar_kebiruan_defect_lebih`, `luka_parut_defect_lebih`, `kulit_berjamur_defect_lebih`, `penyakit_bisul_defect_lebih`, `kulit_bintik_merah_defect_lebih`, `pertumbuhan_tidak_normal_defect_lebih`, `jumlah_defect_d`, `hati_tidak_normal_defect`, `hati_tidak_normal_persen`, `jantung_tidak_normal_defect`, `jantung_tidak_normal_persen`, `organ_dalam_tidak_normal_defect`, `organ_dalam_tidak_normal_persen`, `sub_total_farm_defect`, `sub_total_farm_persen`, `sub_total_ordal_farm_defect`, `sub_total_ordal_farm_persen`, `sg_sayap_memar_defect`, `sg_sayap_memar_persen`, `sg_kaki_memar_defect`, `sg_kaki_memar_persen`, `sg_dada_memar_defect`, `sg_dada_memar_persen`, `sg_punggung_memar_defect`, `sg_punggung_memar_persen`, `sg_sayap_memar_kemerahan_defect_lebih`, `sg_kaki_memar_kemerahan_defect_lebih`, `sg_dada_memar_kemerahan_defect_lebih`, `sg_punggung_memar_kemerahan_defect_lebih`, `jumlah_defect_e`, `sub_total_sg_defect`, `sub_total_sg_persen`, `rpa_over_scalder_defect`, `rpa_over_scalder_persen`, `rpa_sayap_patah_defect`, `rpa_sayap_patah_persen`, `rpa_kaki_patah_defect`, `rpa_kaki_patah_persen`, `rpa_kulit_sobek_dp_defect`, `rpa_kulit_sobek_dp_persen`, `rpa_kulit_sobek_dada_defect`, `rpa_kulit_sobek_dada_persen`, `rpa_kulit_sobek_paha_defect`, `rpa_kulit_sobek_paha_persen`, `rpa_karkas_rusak_defect`, `rpa_karkas_rusak_persen`, `rpa_empedu_pecah_defect`, `rpa_empedu_pecah_persen`, `rpa_daging_dada_bawah_cut_defect`, `rpa_daging_dada_bawah_cut_persen`, `rpa_daging_dada_atas_cut_defect`, `rpa_daging_dada_atas_cut_persen`, `rpa_kaki_terpotong_defect`, `rpa_kaki_terpotong_persen`, `rpa_over_scalder_defect_lebih`, `rpa_sayap_patah_defect_lebih`, `rpa_kaki_patah_defect_lebih`, `rpa_kulit_sobek_dp_defect_lebih`, `rpa_kulit_sobek_dada_defect_lebih`, `rpa_kulit_sobek_paha_defect_lebih`, `rpa_karkas_rusak_defect_lebih`, `rpa_empedu_pecah_defect_lebih`, `rpa_daging_dada_bawah_defect_lebih`, `rpa_daging_dada_atas_defect_lebih`, `rpa_kaki_terpotong_defect_lebih`, `jumlah_defect_f`, `sub_total_rpa_defect`, `sub_total_rpa_persen`, `ip_hati_hancur_ringan_defect`, `ip_hati_hancur_ringan_persen`, `ip_hati_hancur_berat_defect`, `ip_hati_hancur_berat_persen`, `ip_hati_hancur_ringan_defect_lebih`, `ip_hati_hancur_berat_defect_lebih`, `jumlah_defect_g`, `sub_total_ip_defect`, `sub_total_ip_persen`, `ayam_defect_lebih_dari_satu`, `ayam_defect_lebih_dari_satu_persen`, `total_defect`, `total_persen`, `total_ayam_defect`, `total_ayam_defect_persen`, `total_defect_ayam_lebih`, `total_defect_ayam_lebih_persen`, `created_at`, `modified_at`) VALUES
(27, '1e3f11b0-d822-4bcf-b60d-8def70234f79', 'admin1', 'Farm Sukadana', '2024-04-03', '1', '01', '0', '09:47:00', 1680, 1.4, 1.36, 'Berkah Abadi', 'Marel Stork', 2, 0.119048, 9, 0.535714, 20, 1.19048, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 0.357143, 1, 0.0595238, 0, 0, 0, 0, 1, 0.0595238, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 42, 0, 0, 0, 0, 0, 0, 39, 2.32143, 0, 0, 8, 0.47619, 3, 0.178571, 0, 0, 0, 0, 1, 1, 0, 0, 13, 11, 0.654762, 0, 0, 6, 0.357143, 3, 0.178571, 5, 0.297619, 8, 0.47619, 6, 0.357143, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 28, 28, 1.66667, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0.119048, 67, 3.9881, 80, 4.7619, 83, 4.94048, '2024-04-03 09:51:51', '2024-04-03 09:51:51'),
(28, 'dad80fe8-1b6c-46ba-8eca-0afb474a07c7', 'admin1', 'Salsa', '2024-04-04', '1', '01', '0', '08:12:00', 1677, 1.7, 1.65, 'DWD', 'Marel Stork', 6, 0.357782, 23, 1.3715, 16, 0.954085, 0, 0, 0, 0, 2, 0.119261, 0, 0, 0, 0, 2, 0.119261, 5, 0.298151, 0, 0, 21, 1.25224, 0, 0, 0, 0, 1, 0.0596303, 2, 3, 0, 0, 3, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 87, 2, 0.119261, 2, 0.119261, 0, 0, 76, 4.5319, 4, 0.238521, 5, 0.298151, 6, 0.357782, 4, 0.238521, 0, 0, 1, 2, 0, 0, 18, 15, 0.894454, 0, 0, 0, 0, 0, 0, 3, 0.178891, 5, 0.298151, 8, 0.477042, 16, 0.954085, 3, 0.178891, 0, 0, 0, 0, 10, 0.596303, 0, 0, 0, 0, 0, 1, 2, 0, 1, 0, 4, 53, 45, 2.68336, 22, 1.31187, 16, 0.954085, 0, 0, 0, 38, 2.26595, 11, 0.655933, 121, 7.21527, 147, 8.76565, 158, 9.42159, '2024-04-04 08:15:20', '2024-04-04 09:30:47'),
(29, 'bf09b638-7820-4a27-bd21-e1089f9d0fe7', 'admin1', 'Biila', '2024-04-04', '1', '02', '0', '08:35:00', 1500, 1.7, 1.65, 'DWD', 'Marel Stork', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-04-04 08:20:01', '2024-04-04 08:20:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plant`
--
ALTER TABLE `plant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_mortem`
--
ALTER TABLE `post_mortem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `plant`
--
ALTER TABLE `plant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post_mortem`
--
ALTER TABLE `post_mortem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
