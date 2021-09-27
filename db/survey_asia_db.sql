-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2021 at 07:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey_asia_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Mengontrol website'),
(2, 'creator', 'Creator adalah actor yang bisa membuat survey dan template yang disimpan di question bank'),
(3, 'responden', 'Responden adalah actor yang mengisi survey dan mendapatkan komisi'),
(4, 'fadil', 'contoh deskripsi');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(2, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'fa', NULL, '2021-09-22 23:31:24', 0),
(2, '::1', 'fahlevi@gmail.com', NULL, '2021-09-22 23:42:37', 0),
(3, '::1', 'tes@gmail.com', 1, '2021-09-22 23:44:05', 1),
(4, '::1', 'tes@gmail.com', NULL, '2021-09-23 22:09:26', 0),
(5, '::1', 'tes@gmail.com', NULL, '2021-09-23 22:09:37', 0),
(6, '::1', 'contoh@gmail.com', 2, '2021-09-23 22:09:54', 1),
(7, '::1', 'contoh@gmail.com', 2, '2021-09-24 02:17:20', 1),
(8, '::1', 'contoh@gmail.com', 2, '2021-09-26 02:08:51', 1),
(9, '::1', 'contoh@gmail.com', 2, '2021-09-26 02:26:37', 1),
(10, '::1', 'contoh@gmail.com', 2, '2021-09-26 22:11:28', 1),
(11, '::1', 'creator1@gmail.com', 4, '2021-09-27 01:12:44', 1),
(12, '::1', 'responden1@gmail.com', 3, '2021-09-27 01:36:15', 1),
(13, '::1', 'responden1@gmail.com', 3, '2021-09-27 01:45:18', 1),
(14, '::1', 'creator1@gmail.com', 4, '2021-09-27 01:45:53', 1),
(15, '::1', 'responden1@gmail.com', 3, '2021-09-27 01:47:06', 1),
(16, '::1', 'creator1@gmail.com', 4, '2021-09-27 01:52:37', 1),
(17, '::1', 'creator1@gmail.com', 4, '2021-09-27 02:09:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage_survey', 'Memperbolehkan user untuk membuat, mengakses, mengubah, dan menghapus survey.'),
(2, 'isi_survey', 'Memperbolehkan user untuk mengisi survey.');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_users_permissions`
--

INSERT INTO `auth_users_permissions` (`user_id`, `permission_id`) VALUES
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `creators`
--

CREATE TABLE `creators` (
  `id_creator` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `id_user` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `creators`
--

INSERT INTO `creators` (`id_creator`, `firstname`, `lastname`, `phone_number`, `no_rekening`, `ktp`, `id_user`) VALUES
(1, 'fadhil', 'munif', '09888213', '231231', '213131213', 1);

-- --------------------------------------------------------

--
-- Table structure for table `komisi`
--

CREATE TABLE `komisi` (
  `id_komisi` int(100) NOT NULL,
  `saldo` int(100) NOT NULL,
  `waktu` date NOT NULL,
  `id_studi` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1632297078, 1),
(2, '2017-11-20-223112', 'App\\Database\\Migrations\\CreateAuthTables', 'default', 'App', 1632727594, 2),
(3, '2021-09-22-065421', 'App\\Database\\Migrations\\Survey', 'default', 'App', 1632727594, 2),
(4, '2021-09-27-071947', 'App\\Database\\Migrations\\CreateTabelUserProfile', 'default', 'App', 1632727595, 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(100) NOT NULL,
  `id_creator` int(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(100) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `fitur` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  `opsi_pembayaran` varchar(100) NOT NULL,
  `no_pembayaran` varchar(100) NOT NULL,
  `bills` int(100) NOT NULL,
  `status_pembayaran` int(10) NOT NULL,
  `id_creator` int(100) NOT NULL,
  `id_paket` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pencairan_dana`
--

CREATE TABLE `pencairan_dana` (
  `id_pencairan_dana` int(100) NOT NULL,
  `metode_penarikan` int(10) NOT NULL,
  `jumlah_penarikan` int(100) NOT NULL,
  `saldo` int(100) NOT NULL,
  `id_responden` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id_report` int(100) NOT NULL,
  `tabel` varchar(100) NOT NULL,
  `cutomize_report` varchar(100) NOT NULL,
  `id_result` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `responden`
--

CREATE TABLE `responden` (
  `id_responden` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `id_user` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id_result` int(100) NOT NULL,
  `diagram` varchar(100) NOT NULL,
  `tabel` varchar(100) NOT NULL,
  `id_survey` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pemasukkan`
--

CREATE TABLE `riwayat_pemasukkan` (
  `id_riwayat_pemasukkan` int(100) NOT NULL,
  `jumlah_saldo` int(100) NOT NULL,
  `jumlah_studi` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pencairan_dana` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_penarikan`
--

CREATE TABLE `riwayat_penarikan` (
  `id_riwayat_penarikan` int(100) NOT NULL,
  `jumlah_penarikan` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pencairan_dana` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studi`
--

CREATE TABLE `studi` (
  `id_studi` int(100) NOT NULL,
  `saldo_diterima` int(100) NOT NULL,
  `waktu` date NOT NULL,
  `id_responden` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id_survey` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `jumlah_responden` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id_survey`, `judul`, `deskripsi`, `jumlah_responden`, `created_at`, `updated_at`) VALUES
(1, 'membuat survey', 'ini adalah deskripsi', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Survey Kedua', 'test', 0, '2021-09-19 01:43:39', '2021-09-19 01:43:39');

-- --------------------------------------------------------

--
-- Table structure for table `survey_detail`
--

CREATE TABLE `survey_detail` (
  `id_survey_detail` int(100) NOT NULL,
  `id_survey` int(100) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `survey_jawaban`
--

CREATE TABLE `survey_jawaban` (
  `id_survey_jawaban` int(11) NOT NULL,
  `id_survey_pertanyaan` int(11) NOT NULL,
  `isi_jawaban` varchar(255) NOT NULL,
  `id_responden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_jawaban`
--

INSERT INTO `survey_jawaban` (`id_survey_jawaban`, `id_survey_pertanyaan`, `isi_jawaban`, `id_responden`) VALUES
(1, 1, 'ya', 1),
(2, 2, 'pendpat saya bla bla', 1),
(3, 1, 'tidak', 2);

-- --------------------------------------------------------

--
-- Table structure for table `survey_pertanyaan`
--

CREATE TABLE `survey_pertanyaan` (
  `id_survey_pertanyaan` int(11) NOT NULL,
  `id_survey` int(11) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `tipe` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_pertanyaan`
--

INSERT INTO `survey_pertanyaan` (`id_survey_pertanyaan`, `id_survey`, `pertanyaan`, `tipe`) VALUES
(1, 1, 'apakah anda tinggi?', 1),
(2, 1, 'bagaimana pendapat anda?', 0),
(3, 6, 'Berapa umur anda?', 1),
(4, 6, 'Punya uang berapa?', 1),
(5, 2, 'Apakah anda sehat?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id_template` int(100) NOT NULL,
  `id_survey` int(100) NOT NULL,
  `question_bank` text NOT NULL,
  `nama_template` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `first_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(15) DEFAULT NULL,
  `nomor_hp` varchar(15) DEFAULT '0',
  `file_ktp` varchar(100) DEFAULT NULL,
  `file_profile` varchar(100) DEFAULT NULL,
  `nomor_rekening` varchar(100) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `alamat`, `first_name`, `last_name`, `created_at`, `updated_at`, `email`, `nomor_hp`, `file_ktp`, `file_profile`, `nomor_rekening`, `role_id`, `is_active`) VALUES
(0, 'test1', '$2y$10$UeEkHDjQ5dCXzCNBg5oFR.24HUGKJmh8KEMCqbbYPWdSjZomOc.hm', NULL, 'iam1', 'legend1', '2021-09-21 01:30:07', '2021-09-21 01:35:16', 'test1', '0', NULL, NULL, NULL, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `id_user_profile` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`, `id_user_profile`) VALUES
(1, 'tes@gmail.com', 'tes', '$2y$10$ehdOWkIj4.Dj4/OO.3UPdO38IpEDCezap/h3CPT83E10tAV6eFijW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-22 23:43:50', '2021-09-22 23:43:50', NULL, NULL),
(2, 'contoh@gmail.com', 'contoh', '$2y$10$wA39TdQVy/qVZqWNBkUDZesIaOya1kmjU1BQeO.uHA5WzV50EN4la', 'b3a0d7930cfe0a2c94b97794a8a24e3e', NULL, '2021-09-24 03:05:34', NULL, NULL, NULL, 1, 0, '2021-09-23 22:09:05', '2021-09-24 02:05:34', NULL, NULL),
(3, 'responden1@gmail.com', 'responden1', '$2y$10$TBw7vRA9rWiMx41SWD4D7ebzdYiG.s2txsYeuec47SNt5WmjVsJXG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-27 01:11:52', '2021-09-27 01:11:52', NULL, NULL),
(4, 'creator1@gmail.com', 'creator1', '$2y$10$l9MoaiMPufurB23Uih.kFOSaFeY2.0kflKTQ/Mm6JCLgQJYC/gWda', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-27 01:12:11', '2021-09-27 01:12:11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id_user_profile` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `nomor_hp` varchar(13) DEFAULT NULL,
  `file_ktp` varchar(100) DEFAULT NULL,
  `nomor_rekening` varchar(16) DEFAULT NULL,
  `foto_profile` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `role_id` int(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`role_id`, `role`) VALUES
(1, 'creator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `creators`
--
ALTER TABLE `creators`
  ADD PRIMARY KEY (`id_creator`);

--
-- Indexes for table `komisi`
--
ALTER TABLE `komisi`
  ADD PRIMARY KEY (`id_komisi`),
  ADD KEY `id_studi` (`id_studi`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`),
  ADD KEY `id_creator` (`id_creator`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `id_creator` (`id_creator`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `pencairan_dana`
--
ALTER TABLE `pencairan_dana`
  ADD PRIMARY KEY (`id_pencairan_dana`),
  ADD KEY `id_responden` (`id_responden`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id_report`),
  ADD KEY `id_result` (`id_result`);

--
-- Indexes for table `responden`
--
ALTER TABLE `responden`
  ADD PRIMARY KEY (`id_responden`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id_result`),
  ADD KEY `id_survey` (`id_survey`);

--
-- Indexes for table `riwayat_pemasukkan`
--
ALTER TABLE `riwayat_pemasukkan`
  ADD PRIMARY KEY (`id_riwayat_pemasukkan`),
  ADD KEY `id_pencairan_dana` (`id_pencairan_dana`);

--
-- Indexes for table `riwayat_penarikan`
--
ALTER TABLE `riwayat_penarikan`
  ADD PRIMARY KEY (`id_riwayat_penarikan`),
  ADD KEY `id_pencairan_dana` (`id_pencairan_dana`);

--
-- Indexes for table `studi`
--
ALTER TABLE `studi`
  ADD PRIMARY KEY (`id_studi`),
  ADD KEY `id_responden` (`id_responden`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id_survey`);

--
-- Indexes for table `survey_detail`
--
ALTER TABLE `survey_detail`
  ADD PRIMARY KEY (`id_survey_detail`);

--
-- Indexes for table `survey_jawaban`
--
ALTER TABLE `survey_jawaban`
  ADD PRIMARY KEY (`id_survey_jawaban`);

--
-- Indexes for table `survey_pertanyaan`
--
ALTER TABLE `survey_pertanyaan`
  ADD PRIMARY KEY (`id_survey_pertanyaan`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id_template`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id_user_profile` (`id_user_profile`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id_user_profile`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id_report` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id_survey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `survey_jawaban`
--
ALTER TABLE `survey_jawaban`
  MODIFY `id_survey_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `survey_pertanyaan`
--
ALTER TABLE `survey_pertanyaan`
  MODIFY `id_survey_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id_user_profile` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `komisi`
--
ALTER TABLE `komisi`
  ADD CONSTRAINT `komisi_ibfk_1` FOREIGN KEY (`id_studi`) REFERENCES `studi` (`id_studi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id_creator`) REFERENCES `creators` (`id_creator`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`id_creator`) REFERENCES `creators` (`id_creator`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pencairan_dana`
--
ALTER TABLE `pencairan_dana`
  ADD CONSTRAINT `pencairan_dana_ibfk_1` FOREIGN KEY (`id_responden`) REFERENCES `responden` (`id_responden`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`id_result`) REFERENCES `results` (`id_result`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_pemasukkan`
--
ALTER TABLE `riwayat_pemasukkan`
  ADD CONSTRAINT `riwayat_pemasukkan_ibfk_1` FOREIGN KEY (`id_pencairan_dana`) REFERENCES `pencairan_dana` (`id_pencairan_dana`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_penarikan`
--
ALTER TABLE `riwayat_penarikan`
  ADD CONSTRAINT `riwayat_penarikan_ibfk_1` FOREIGN KEY (`id_pencairan_dana`) REFERENCES `pencairan_dana` (`id_pencairan_dana`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studi`
--
ALTER TABLE `studi`
  ADD CONSTRAINT `studi_ibfk_1` FOREIGN KEY (`id_responden`) REFERENCES `responden` (`id_responden`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
