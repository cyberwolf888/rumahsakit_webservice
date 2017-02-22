-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Feb 2017 pada 03.03
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_rumahsakit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `rumahsakit_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id`, `rumahsakit_id`, `name`, `jenis`, `created_at`, `updated_at`) VALUES
(2, 1, 'Nyoman Siki Wijaya', 'Spesialis - Urologi', '2017-02-21 00:43:09', '2017-02-21 18:01:21'),
(7, 1, 'Kadek Bledor', 'Spesialis - Gigi', '2017-02-21 02:19:53', '2017-02-21 18:01:11'),
(8, 4, 'Wayan Nengah Sukadana', 'Spesialis - Urologi', '2017-02-21 17:39:13', '2017-02-21 17:39:13'),
(9, 3, 'Dr. Ida Komang Upeksa', 'Spesialis - Orthopedi', '2017-02-21 17:50:30', '2017-02-21 17:50:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `id` int(11) NOT NULL,
  `rumahsakit_id` int(11) DEFAULT NULL,
  `dokter_id` int(11) DEFAULT NULL,
  `hari` varchar(255) DEFAULT NULL,
  `waktu` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`id`, `rumahsakit_id`, `dokter_id`, `hari`, `waktu`, `created_at`, `updated_at`) VALUES
(8, 1, 2, 'Senin', '18:30 WITA  - 21:00 WITA', '2017-02-21 02:18:33', '2017-02-21 02:18:33'),
(9, 1, 2, 'Selasa', 'closed', '2017-02-21 02:18:33', '2017-02-21 02:18:33'),
(10, 1, 2, 'Rabu', '12:00 WITA  - 18:00 WITA', '2017-02-21 02:18:33', '2017-02-21 02:18:33'),
(11, 1, 2, 'Kamis', '15:00 WITA  - 19:00 WITA', '2017-02-21 02:18:33', '2017-02-21 02:18:33'),
(12, 1, 2, 'Jumat', '19:00 WITA  - 22:00 WITA', '2017-02-21 02:18:33', '2017-02-21 02:18:33'),
(13, 1, 2, 'Sabtu', 'closed', '2017-02-21 02:18:33', '2017-02-21 02:18:33'),
(14, 1, 2, 'Minggu', 'closed', '2017-02-21 02:18:33', '2017-02-21 02:18:33'),
(15, 4, 8, 'Senin', '14:00 WITA  - 18:00 WITA', '2017-02-21 17:43:30', '2017-02-21 17:43:30'),
(16, 4, 8, 'Selasa', '17:00 WITA  - 21:00 WITA', '2017-02-21 17:43:30', '2017-02-21 17:43:30'),
(17, 4, 8, 'Rabu', '16:00 WITA  - 22:00 WITA', '2017-02-21 17:43:30', '2017-02-21 17:43:30'),
(18, 4, 8, 'Kamis', '15:00 WITA  - 19:00 WITA', '2017-02-21 17:43:30', '2017-02-21 17:43:30'),
(19, 4, 8, 'Jumat', 'closed', '2017-02-21 17:43:30', '2017-02-21 17:43:30'),
(20, 4, 8, 'Sabtu', 'closed', '2017-02-21 17:43:30', '2017-02-21 17:43:30'),
(21, 4, 8, 'Minggu', 'closed', '2017-02-21 17:43:30', '2017-02-21 17:43:30'),
(22, 3, 9, 'Senin', 'closed', '2017-02-21 17:51:21', '2017-02-21 17:51:21'),
(23, 3, 9, 'Selasa', 'closed', '2017-02-21 17:51:21', '2017-02-21 17:51:21'),
(24, 3, 9, 'Rabu', '09:00 WITA  - 14:00 WITA', '2017-02-21 17:51:21', '2017-02-21 17:51:21'),
(25, 3, 9, 'Kamis', '10:00 WITA  - 15:00 WITA', '2017-02-21 17:51:21', '2017-02-21 17:51:21'),
(26, 3, 9, 'Jumat', '10:00 WITA  - 15:00 WITA', '2017-02-21 17:51:21', '2017-02-21 17:51:21'),
(27, 3, 9, 'Sabtu', '15:00 WITA  - 18:00 WITA', '2017-02-21 17:51:21', '2017-02-21 17:51:21'),
(28, 3, 9, 'Minggu', 'closed', '2017-02-21 17:51:21', '2017-02-21 17:51:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `no_id` varchar(50) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `user_id`, `name`, `no_id`, `telp`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 'Member Bedebah', '32760613126600069', '086474837', 'Jalan Bedebah', 1, '2017-01-30 21:57:40', '2017-02-07 00:26:54'),
(2, 6, 'New  Bedebah', '074746473837373', '0857373649', 'Jalan Raya Bedebah 888', 1, '2017-02-10 00:13:08', '2017-02-10 00:13:08'),
(3, 7, 'Bedebah', '074749748374859', '0857373546', 'Jalan Raya Edan', 1, '2017-02-10 00:18:01', '2017-02-18 00:54:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_01_29_045516_entrust_setup_tables', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `rumahsakit_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `duration` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reservation`
--

INSERT INTO `reservation` (`id`, `rumahsakit_id`, `room_id`, `member_id`, `checkin`, `duration`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, '2017-02-18', 5, 9975000, 0, '2017-02-16 03:34:50', '2017-02-19 03:53:04'),
(2, 1, 2, 3, '2017-02-18', 4, 6260000, 3, '2017-02-16 19:13:08', '2017-02-19 03:56:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'User Administrator', 'User is allowed to manage and edit other users', '2017-01-28 20:59:32', '2017-01-28 20:59:32'),
(2, 'hospital', 'Hospital Administrator', 'User is allowed to manage and edit Hospital', '2017-01-28 21:00:33', '2017-01-28 21:00:33'),
(3, 'member', 'Member', 'User is the member', '2017-01-29 21:38:28', '2017-01-29 21:38:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(3, 2),
(5, 3),
(6, 3),
(7, 3),
(8, 2),
(9, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `rumahsakit_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `description` text,
  `total_room` int(11) DEFAULT NULL,
  `akomodasi` int(11) DEFAULT NULL,
  `perawatan` int(11) DEFAULT NULL,
  `visit_dokter` int(11) DEFAULT NULL,
  `administrasi` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `room`
--

INSERT INTO `room` (`id`, `rumahsakit_id`, `name`, `image`, `description`, `total_room`, `akomodasi`, `perawatan`, `visit_dokter`, `administrasi`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 'SVVIP', '763e70425f5f4efb74c7f138764cd650.jpg', 'Room dengan keamanan tingkat tinggi', 12, 1365000, 300000, 250000, 80000, 1995000, '2017-02-01 23:38:12', '2017-02-21 17:59:53'),
(2, 1, 'VVIP', '2a43570ed3dc9e888384e0afd14004a0.jpg', 'Ruangan paling mantap', 15, 1035000, 250000, 200000, 80000, 1565000, '2017-02-01 23:43:05', '2017-02-21 17:57:08'),
(3, 4, 'VIP A', 'f269e4feb8c3cd29e20de083889bb826.jpg', 'Ruangan dengan fasilitas VIP Kelas A', 8, 705000, 200000, 150000, 80000, 1135000, '2017-02-21 17:36:39', '2017-02-21 17:36:39'),
(4, 3, 'VIP B', 'af9ec1e72149620be2a1a0aa361b89c7.jpg', 'Kamar dengan fasilitas VIP kelas B', 5, 518000, 175000, 125000, 80000, 898000, '2017-02-21 17:49:56', '2017-02-21 17:49:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumahsakit`
--

CREATE TABLE `rumahsakit` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `description` text,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rumahsakit`
--

INSERT INTO `rumahsakit` (`id`, `user_id`, `name`, `telp`, `address`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Rumah Sakit Ari Canti', '0361974573', 'Jl. Raya Mas, MAS, Ubud, Kabupaten Gianyar, Bali 80571', '71278672e6a8280b6aae3f78b4504e87.jpg', 'Rumah sakit yang paling awesome yang ada di muka bumi ini.', 1, '2017-01-30 03:28:12', '2017-02-21 17:56:15'),
(3, 8, 'Rumah Sakit Ganesha', '0361298233', 'Jalan Raya Celuk Sukawati', 'bc4e2afcb67664eae9e61ef8e4d884ea.jpg', 'Rumah Sakit Ganesha adalah rumah sakit swasta kelas D. Rumah sakit ini bersifat transisi dengan kemampuan hanya memberikan pelayanan kedokteran umum dan gigi. Rumah sakit ini juga menampung rujukan yang berasal dari puskesmas.', 1, '2017-02-21 17:23:53', '2017-02-21 17:47:40'),
(4, 9, 'Kasih Ibu General Hospital Saba', '03613003333', 'Saba, Blahbatuh, Gianyar, Bali 80581', '2396c3f75450d63cb8812af26989bef1.jpg', 'Menjadi rumah sakit keluarga pilihan utama di Bali, dengan menyediakan pelayanan kesehatan yang lengkap, canggih, berkualitas dan mengedepankan keamanan pasien, serta pelayanan yang tulus dengan sentuhan kasih.', 1, '2017-02-21 17:25:36', '2017-02-21 17:31:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `type`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', '$2y$10$NrWi/y3MUOnPcbU4uESLfOHbNKmYbVTtv.P2gBK18H0PZnFbm6Q9K', 'db7Q4ibnSG33HxuKRLPv9T2B74IoEtV8FmXvDWeXzbSdfSpp1EzRkC07BFnU', 1, '2017-01-28 21:02:19', '2017-01-28 21:02:19'),
(3, 'Rumah Sakit Ari Canti', 'hospital@mail.com', '$2y$10$0K59Sp/2OB0251HUd7BQv.aBVJMCnj2IcnwtrJVMkDur9Rqs9B0YO', 'AioUHDF6BGEda1qHo9wv9vKU6eudhFnDCW0L9lXt3SJB7PiGpUlTYgHUW9ye', 2, '2017-01-30 03:28:12', '2017-02-21 17:53:53'),
(5, 'Member Bedebah', 'member@mail.com', '$2y$10$tWIZhH/0DtWtbVaYXy.jjeu3gVC7oMFZzjxjJkysw6Vx7FQxJl5gy', NULL, 3, '2017-01-30 21:57:40', '2017-02-07 00:26:54'),
(6, 'New  Bedebah', 'bedebah888@mail.com', '$2y$10$bhsU9gmS2196AXBtUBgEne8Qh8MrjPBu/Js3GMbHjLyLQLQzmiTjO', NULL, 3, '2017-02-10 00:13:08', '2017-02-10 00:13:08'),
(7, 'Bedebah', 'edan@mail.com', '$2y$10$RMJRyGo9ZC5wi8SvpoGixukmM0N29YiqeB.nF3vbp8uFSzshsO9Fu', NULL, 3, '2017-02-10 00:18:01', '2017-02-18 00:54:32'),
(8, 'Rumah Sakit Ganesha', 'ganesha@mail.com', '$2y$10$A1C42foxnIeaTZO8/0xHFekjTk/2MKpQ4OxisR9977d/yzaQqK1IS', 'onTLGWAvP2trAzXBn1M8FJ5N4AKAa4K8wCFuyoJEJggdFSbCHWHMXxs6E2u5', 2, '2017-02-21 17:23:53', '2017-02-21 17:23:53'),
(9, 'Kasih Ibu General Hospital Saba', 'saba@mail.com', '$2y$10$vP1TiTLcwKPFYEhuoPwUdudF.u63UVFSCoQJDPhNWba7knqPfUZGW', 'grSDdIqOBjSmnMRlXRZxNtjSw97lIyZsm9iyqLVnX769qH2kqF0SZUSSagcB', 2, '2017-02-21 17:25:36', '2017-02-21 17:25:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rumahsakit`
--
ALTER TABLE `rumahsakit`
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
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rumahsakit`
--
ALTER TABLE `rumahsakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
