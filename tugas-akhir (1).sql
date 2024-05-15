-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 01:44 PM
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
  `dosen` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kkn`
--

INSERT INTO `kkn` (`id`, `name`, `nim`, `tahun`, `semester`, `lokasi`, `status`, `dosen`, `created_at`, `updated_at`) VALUES
(9, 'Aprian Yusuf Nugroho', '118140144', '2022', 0, 'Desa Pahmungan, Pesisir Barat, Lampung', 1, 'Andi Muhammad Gabriel', '2024-05-15', '2024-05-15');

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
  `dosen` int(5) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kp`
--

INSERT INTO `kp` (`id`, `name`, `nim`, `tahun`, `semester`, `lokasi`, `status`, `sertifikat`, `dosen`, `created_at`, `updated_at`) VALUES
(9, 'Aprian Yusuf Nugroho', '118140144', '2024', 0, 'PT Sukamaju', 0, 'unk4hzosmd1ygqlgbty1.png', 53, '2024-05-15', '2024-05-15');

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
  `dosen` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lomba`
--

INSERT INTO `lomba` (`id`, `name`, `nim`, `nama_lomba`, `penyelenggara`, `tingkat`, `capaian`, `tahun`, `sertifikat`, `dosen`, `created_at`, `updated_at`) VALUES
(7, 'Aprian Yusuf Nugroho', 118140144, 'Alphaseismic', 'PT SUKAMAJU', 1, 'Juara 1', 2022, 'd0ytholowvpvbim49k4k.docx', 'Andi Muhammad Gabriel', '2024-05-15', '2024-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `mbkm`
--

CREATE TABLE `mbkm` (
  `id` int(20) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `program` varchar(250) DEFAULT NULL,
  `tahun` int(20) DEFAULT NULL,
  `sertifikat` varchar(250) DEFAULT NULL,
  `dosen` varchar(250) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mbkm`
--

INSERT INTO `mbkm` (`id`, `name`, `nim`, `program`, `tahun`, `sertifikat`, `dosen`, `created_at`, `updated_at`) VALUES
(5, 'Aprian Yusuf Nugroho', '118140144', 'Kampus Merdeka', 2022, 'njk6dgbyxbdvvkirk0h2.docx', 'Andi Muhammad Gabriel', '2024-05-15', '2024-05-15');

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
  `name` varchar(255) DEFAULT NULL,
  `nim` int(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0:nonaktif 1:aktif 2:lulus',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perwalian`
--

INSERT INTO `perwalian` (`id`, `name`, `nim`, `status`, `created_at`, `updated_at`) VALUES
(16, 'Aprian Yusuf Nugroho', 118140144, 1, '2024-05-15 15:24:36', '2024-05-15 16:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `dosen_id` int(20) NOT NULL,
  `pesan` longtext NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `dosen_id`, `pesan`, `created_at`, `updated_at`) VALUES
(3, 53, 'Perwalian di ruang prodi hari senin', '2024-05-15', '2024-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `pkm`
--

CREATE TABLE `pkm` (
  `id` int(20) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `nim` int(20) DEFAULT NULL,
  `program` varchar(250) NOT NULL,
  `tahun` int(20) DEFAULT NULL,
  `sertifikat` varchar(250) DEFAULT NULL,
  `dosen` varchar(250) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pkm`
--

INSERT INTO `pkm` (`id`, `name`, `nim`, `program`, `tahun`, `sertifikat`, `dosen`, `created_at`, `updated_at`) VALUES
(5, 'Aprian Yusuf Nugroho', 118140144, 'PKM-R', 2023, 'puat0neacy42zmn0d48l.docx', 'Andi Muhammad Gabriel', '2024-05-15', '2024-05-15');

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
  `pem1` varchar(255) NOT NULL,
  `pem2` varchar(255) NOT NULL,
  `peng1` varchar(255) NOT NULL,
  `peng2` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ta`
--

INSERT INTO `ta` (`id`, `name`, `nim`, `judul`, `status`, `pem1`, `pem2`, `peng1`, `peng2`, `created_at`, `updated_at`) VALUES
(12, 'Aprian Yusuf Nugroho', '118140144', 'Rancang Bangun', 0, 'Andika Setiawan, S.Kom., M.Cs.', 'Khabib Nurmagomedov', 'Imam Eko Wicaksono, S.Si., M.Si.', 'Aryogi Aziz', '2024-05-15', '2024-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `nim` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `perwalian` int(11) DEFAULT NULL,
  `profil_picture` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1:admin, 2:dosen, 3:mahasiswa',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nip`, `nim`, `perwalian`, `profil_picture`, `username`, `password`, `remember_token`, `user_type`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Admin', NULL, NULL, NULL, NULL, 'admin@gmail.com', '$2y$12$gUx2UWkUMOjs1PatgKBYNekiUHq6nPhPzFlF1ZHbhqgJTkM1OLMy6', NULL, 1, '2024-05-01 12:21:25', '2024-05-01 12:23:21', NULL),
(53, 'Andika Setiawan, S.Kom., M.Cs.', '199111272022031007', NULL, NULL, NULL, 'Andika', '$2y$12$UuBaUj4jiupnAjNHFHL3veNy.G43gETizFP.68kBJxyOkVB/7XqsG', NULL, 2, '2024-05-15 08:19:23', '2024-05-15 08:19:23', 'Aktif'),
(54, 'Arief Ichwani, S.Kom., M.Cs', '199008112019031011', NULL, NULL, NULL, 'Arief', '$2y$12$kCnwO0Z36tmniU43U6aei.C7dPWwj.otDVr6MfD7w1yWqAkI1eU2e', NULL, 2, '2024-05-15 08:20:41', '2024-05-15 08:23:18', 'Tugas Belajar'),
(55, 'Imam Eko Wicaksono, S.Si., M.Si.', '198905172019031013', NULL, NULL, NULL, 'Imam', '$2y$12$flfzWqC/r1dvpTFgmYOezuvOXf5PKVYvvvf2Bj9z8FJDOzk4WY0Ji', NULL, 2, '2024-05-15 08:21:55', '2024-05-15 08:23:25', 'Tugas Belajar'),
(56, 'Aprian Yusuf Nugroho', NULL, '118140144', 53, NULL, 'Aprian.118140144', '$2y$12$xj53T6qdKUXAuv5XDsE6ZugwArtEeU5ppN0KxFggAo50BlPR00hfi', NULL, 3, '2024-05-15 08:24:36', '2024-05-15 09:23:18', 'Aktif');

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
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kp`
--
ALTER TABLE `kp`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lomba`
--
ALTER TABLE `lomba`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mbkm`
--
ALTER TABLE `mbkm`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pkm`
--
ALTER TABLE `pkm`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ta`
--
ALTER TABLE `ta`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
