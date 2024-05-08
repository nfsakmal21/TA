-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 09:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas-akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkn`
--

CREATE TABLE `kkn` (
  `id` int(20) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `tahun` varchar(20) DEFAULT NULL,
  `semester` int(11) NOT NULL COMMENT 'ket: 0=ganjil 1=genap',
  `lokasi` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT 'ket: 0=belum selesai 1= selesai',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kkn`
--

INSERT INTO `kkn` (`id`, `name`, `nim`, `tahun`, `semester`, `lokasi`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Mochamad Nafis Akmalussyifa', '119140135', '2022', 0, 'Desa Pahmungan, Pesisir Barat, Lampung', 0, '2024-05-04', '2024-05-04'),
(7, 'Mahasiswa', '123456789', '2022', 1, 'Desa Pahmungan, Pesisir Barat, Lampung', 0, '2024-05-07', '2024-05-07'),
(8, 'Ilham Nofri Yandra', '119140133', '2022', 1, 'sgsgdh', 0, '2024-05-07', '2024-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `kp`
--

CREATE TABLE `kp` (
  `id` int(20) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `tahun` varchar(20) DEFAULT NULL,
  `semester` int(20) NOT NULL COMMENT '0 = gasal, 1 = genap',
  `lokasi` varchar(250) DEFAULT NULL,
  `status` int(20) NOT NULL COMMENT '0 = selesai, 1 = belum selesai',
  `sertifikat` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kp`
--

INSERT INTO `kp` (`id`, `name`, `nim`, `tahun`, `semester`, `lokasi`, `status`, `sertifikat`, `created_at`, `updated_at`) VALUES
(1, 'Mochamad Nafis Akmalussyifa', '119140135', '2023', 0, 'BPKAD Bandar Lampung', 0, 'btyjlt6etit5hmumqrvm.jpg', '2024-05-04', '2024-05-04'),
(6, 'Ilham Nofri Yandra', '119140133', '2023', 0, 'dhzhdhdr', 0, 'r0taekjlwgjevhuhnjit.pdf', '2024-05-07', '2024-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `lomba`
--

CREATE TABLE `lomba` (
  `id` int(20) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `nim` int(20) DEFAULT NULL,
  `nama_lomba` varchar(250) DEFAULT NULL,
  `penyelenggara` varchar(250) DEFAULT NULL,
  `tingkat` int(10) NOT NULL COMMENT '0=nasional 1=internasional',
  `capaian` varchar(250) DEFAULT NULL,
  `tahun` int(20) DEFAULT NULL,
  `sertifikat` varchar(250) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lomba`
--

INSERT INTO `lomba` (`id`, `name`, `nim`, `nama_lomba`, `penyelenggara`, `tingkat`, `capaian`, `tahun`, `sertifikat`, `created_at`, `updated_at`) VALUES
(1, 'Mochamad Nafis Akmalussyifa', 119140135, 'fkeofkeokdskfndisfmn', 'rggadfsgerdg', 0, 'Juara 1', 2022, 'zeaveokhdn9akopzsscq.jpg', '2024-05-05', '2024-05-05'),
(5, 'Ilham Nofri Yandra', 119140133, 'dhdhdfdh', 'dhdhdfgdh', 0, 'Juara 1', 2023, 'rjfl6an7k3e8ng7bi3jz.pdf', '2024-05-07', '2024-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `mbkm`
--

CREATE TABLE `mbkm` (
  `id` int(20) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `program` int(11) DEFAULT NULL,
  `tahun` int(20) DEFAULT NULL,
  `sertifikat` varchar(250) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mbkm`
--

INSERT INTO `mbkm` (`id`, `name`, `nim`, `program`, `tahun`, `sertifikat`, `created_at`, `updated_at`) VALUES
(1, 'Mochamad Nafis Akmalussyifa', '119140135', 0, 2021, 'uv9at6a9eukhdh2itttf.jpg', '2024-05-05', '2024-05-05'),
(4, 'Mochamad Nafis Akmalussyifa', '119140135', 0, 2021, '8scnyhylkyt6azlg3lpx.pdf', '2024-05-05', '2024-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perwalian`
--

CREATE TABLE `perwalian` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0:nonaktif 1:aktif 2:lulus',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perwalian`
--

INSERT INTO `perwalian` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test', 2, '2024-05-02 12:47:32', '2024-05-08 12:57:07'),
(3, 'Mahasiswa', 0, '2024-05-02 13:47:43', '2024-05-08 14:29:33'),
(4, 'test', 0, NULL, '2024-05-08 14:29:30'),
(5, 'Mario', 1, '2024-05-08 14:03:48', '2024-05-08 14:33:23'),
(6, 'Mochamad Nafis Akmalussyifa', 0, '2024-05-08 14:23:35', '2024-05-08 14:23:35'),
(7, 'Ilham Nofri Yandra', 0, '2024-05-08 14:23:58', '2024-05-08 14:23:58'),
(8, 'Bintang Yosafat Putra', 0, '2024-05-08 14:24:48', '2024-05-08 14:24:48'),
(9, 'Dwi Pangga Sinurat', 1, '2024-05-08 14:25:37', '2024-05-08 14:33:22'),
(10, 'Yovan Mayliano Gultom', 0, '2024-05-08 14:26:17', '2024-05-08 14:26:17'),
(11, 'Muhammad Yahya Ayyashy', 1, '2024-05-08 14:26:49', '2024-05-08 14:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `pkm`
--

CREATE TABLE `pkm` (
  `id` int(20) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `nim` int(20) DEFAULT NULL,
  `program` int(20) NOT NULL,
  `tahun` int(20) DEFAULT NULL,
  `sertifikat` varchar(250) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pkm`
--

INSERT INTO `pkm` (`id`, `name`, `nim`, `program`, `tahun`, `sertifikat`, `created_at`, `updated_at`) VALUES
(1, 'Mochamad Nafis Akmalussyifa', 119140135, 0, 2024, '7rpkqelsh1jqy8tq8uux.png', '2024-05-05', '2024-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `ta`
--

CREATE TABLE `ta` (
  `id` int(20) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `judul` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = Sempro, 1 = Sidang Akhir 3=selesai',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ta`
--

INSERT INTO `ta` (`id`, `name`, `nim`, `judul`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mochamad Nafis Akmalussyifa', '119140135', 'sgfshfgjosunofn', 0, '2024-05-04', '2024-05-04'),
(5, 'Ilham Nofri Yandra', '119140133', 'dhdhdhdfd', 2, '2024-05-07', '2024-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nip` int(20) DEFAULT NULL,
  `nim` varchar(50) DEFAULT NULL,
  `perwalian` int(11) DEFAULT NULL,
  `profil_picture` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1:admin, 2:dosen, 3:mahasiswa',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nip`, `nim`, `perwalian`, `profil_picture`, `email`, `email_verified_at`, `password`, `remember_token`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL, NULL, NULL, 'admin@gmail.com', NULL, '$2y$12$gUx2UWkUMOjs1PatgKBYNekiUHq6nPhPzFlF1ZHbhqgJTkM1OLMy6', NULL, 1, '2024-05-01 12:21:25', '2024-05-01 12:23:21'),
(2, 'Dosen', 123, NULL, NULL, NULL, 'dosen@gmail.com', NULL, '$2y$12$gUx2UWkUMOjs1PatgKBYNekiUHq6nPhPzFlF1ZHbhqgJTkM1OLMy6', NULL, 2, '2024-05-01 04:50:22', '2024-05-01 04:50:22'),
(10, 'Test Admin', NULL, NULL, NULL, NULL, 'testadmin@gmail.com', NULL, '$2y$12$CM5fdqy3tU/LtVKn/4rLSeKnuXNlIPUlhDFZZNGS3kuzv3vbh60Le', NULL, 1, '2024-05-02 00:45:40', '2024-05-02 00:45:40'),
(20, 'Test Dosen', 121212121, NULL, NULL, 'lmkyhvcicqkwuhmxl5nn.jpg', 'testdosen@gmail.com', NULL, '$2y$12$4pDxm7vRYRRpBCuHgTVkse0Bt10h.B7VM7PA1fbPxmc7Xx1Y9tIaG', NULL, 2, '2024-05-03 02:19:03', '2024-05-03 02:19:03'),
(23, 'Tes Admin', 123456789, NULL, NULL, NULL, 'tesadmin@gmail.com', NULL, '$2y$12$yLKCQoeIvq3UNFjE6pbZYuTYjjmg6U5bnZGLNC8umC/u4CKfCSaLG', NULL, 1, '2024-05-03 02:42:26', '2024-05-03 02:42:26'),
(25, 'Mahasiswa', NULL, '123456789', 2, 'qca2a5cbq1ixmuyiuzzp.jpg', 'mahasiswa@gmail.com', NULL, '$2y$12$zF6Cdm9Wji2z64YWK..G.e3oOUP3pp192YJ2ZGMQ.9KGFzffpzmHW', NULL, 3, '2024-05-03 04:05:46', '2024-05-03 04:05:46'),
(29, 'test', NULL, '123123123', 2, NULL, 'test@gmail.com', NULL, '$2y$12$oAgdtJUMKhVCbS6mhzmJ8e7ie3VEYv3FHnythi28Uj9/rizH7W7iu', NULL, 3, '2024-05-06 21:22:25', '2024-05-07 15:41:59'),
(30, 'Andi Muhammad Gabriel', 123123123, NULL, NULL, NULL, 'andi@gmail.com', NULL, '$2y$12$WQ.CfcmOatJp45MMml1SYeNe7q4RI522FbbkbMIkSZ9NWCj0/zmd6', NULL, 2, '2024-05-07 15:34:22', '2024-05-07 15:34:22'),
(38, 'Mario', NULL, '119140179', 30, NULL, 'mario.119140179@gmail.com', NULL, '$2y$12$8vCYcINmfUIU5hhajymjlOiH0MUfagquRTZXtbHNlHlRQhjzO7Jp6', NULL, 3, '2024-05-08 07:03:48', '2024-05-08 07:03:48'),
(39, 'Mochamad Nafis Akmalussyifa', NULL, '119140135', 2, NULL, 'mochamad.119140135@gmail.com', NULL, '$2y$12$gBoaGkqXC.rSenwrwUSuuOxk6Q1qnhPGluVSztgGE66Gt0AXHqLLu', NULL, 3, '2024-05-08 07:23:35', '2024-05-08 07:23:35'),
(40, 'Ilham Nofri Yandra', NULL, '119140133', 20, NULL, 'ilham.119140133@gmail.com', NULL, '$2y$12$pgSRaTGPceC58fmHsFUwoOg4qZ8/7DWVxzty16EsJyafAqp/YciHK', NULL, 3, '2024-05-08 07:23:58', '2024-05-08 07:23:58'),
(41, 'Bintang Yosafat Putra', NULL, '119140185', 20, NULL, 'bintang.119140185@gmail.com', NULL, '$2y$12$gX1OtzI3MzHs4XhH/pIxtex.YFubJOM6Ox2dRhQPjJ/90A3KwScCS', NULL, 3, '2024-05-08 07:24:48', '2024-05-08 07:24:48'),
(42, 'Dwi Pangga Sinurat', NULL, '119140132', 30, NULL, 'dwi.119140132@gmail.com', NULL, '$2y$12$IGefLL2d0wTaWznDDknIl.cq86XF6YTzdr9//K8PNknsZmIj0eaze', NULL, 3, '2024-05-08 07:25:37', '2024-05-08 07:25:37'),
(43, 'Yovan Mayliano Gultom', NULL, '119140136', 20, NULL, 'yovan.119140136@gmail.com', NULL, '$2y$12$KhxH7xG83kmdqHwjnIuX..qiJtcGnHYQL1Fr8qFyuvhRII8/7Fnla', NULL, 3, '2024-05-08 07:26:17', '2024-05-08 07:26:17'),
(44, 'Muhammad Yahya Ayyashy', NULL, '119140134', 30, NULL, 'muhammad.119140134@gmail.com', NULL, '$2y$12$coUKKWPceHtayeXTQfcO/..UKFl6xrxC4agxw0SA8MHEBYIYhUiMy', NULL, 3, '2024-05-08 07:26:49', '2024-05-08 07:26:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kkn`
--
ALTER TABLE `kkn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kp`
--
ALTER TABLE `kp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lomba`
--
ALTER TABLE `lomba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mbkm`
--
ALTER TABLE `mbkm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `perwalian`
--
ALTER TABLE `perwalian`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `pkm`
--
ALTER TABLE `pkm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta`
--
ALTER TABLE `ta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kkn`
--
ALTER TABLE `kkn`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kp`
--
ALTER TABLE `kp`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lomba`
--
ALTER TABLE `lomba`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mbkm`
--
ALTER TABLE `mbkm`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perwalian`
--
ALTER TABLE `perwalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pkm`
--
ALTER TABLE `pkm`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ta`
--
ALTER TABLE `ta`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
