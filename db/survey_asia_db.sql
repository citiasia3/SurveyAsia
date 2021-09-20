-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2021 at 08:44 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

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
(2, 'test', 'test', 0, '2021-09-19 01:43:39', '2021-09-19 01:43:39');

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
(2, 1, 'bagaimana pendapat anda?', 0);

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
  `first_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(15) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `first_name`, `last_name`, `created_at`, `updated_at`, `email`, `role_id`, `is_active`) VALUES
(14, 'test', '$2y$10$qItTNvNe/T7Aj7fTnfnPtuLLwmLGkLfM.cW6iRpNxi0UF4grUd7Va', 'iam', 'legend', '2021-09-19 01:43:39', '2021-09-19 01:43:39', NULL, 1, 1);

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
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id_report` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id_survey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `survey_jawaban`
--
ALTER TABLE `survey_jawaban`
  MODIFY `id_survey_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `survey_pertanyaan`
--
ALTER TABLE `survey_pertanyaan`
  MODIFY `id_survey_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

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
