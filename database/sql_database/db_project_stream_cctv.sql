-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 28 Jun 2025 pada 08.15
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project_stream_cctv`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` text NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL,
  `perangkat_models_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id`, `keterangan`, `jam`, `tanggal`, `perangkat_models_id`, `created_at`, `updated_at`) VALUES
(1, 'ini adalah contoh history', '03:47:00', '2025-06-17', 1, '2025-06-14 10:44:00', '2025-06-14 10:46:22'),
(2, 'tes', '16:13:00', '2025-06-05', 1, '2025-06-27 02:10:47', '2025-06-27 02:10:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_14_100456_create_history_table', 1),
(5, '2025_06_14_100755_create_ruangan_table', 1),
(6, '2025_06_14_100848_create_perangkat_table', 1),
(7, '2025_06_14_101433_create_pegawai_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `ruangan_models_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama_pegawai`, `jenis_kelamin`, `ruangan_models_id`, `created_at`, `updated_at`) VALUES
(1, '12346', 'Fulan Bin Fulan', 'L', 2, '2025-06-14 06:54:25', '2025-06-14 07:40:04'),
(2, '3312', 'Fulan bin Fulanah', 'P', 8, '2025-06-27 02:16:38', '2025-06-27 02:16:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perangkat`
--

CREATE TABLE `perangkat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label_cctv` varchar(255) NOT NULL,
  `kategori` enum('CCTV','ACCESS DOOR') NOT NULL DEFAULT 'CCTV',
  `model` varchar(255) NOT NULL,
  `channel` varchar(255) NOT NULL,
  `sumbu_x` double NOT NULL,
  `sumbu_y` double NOT NULL,
  `keterangan` text NOT NULL,
  `ruangan_models_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perangkat`
--

INSERT INTO `perangkat` (`id`, `label_cctv`, `kategori`, `model`, `channel`, `sumbu_x`, `sumbu_y`, `keterangan`, `ruangan_models_id`, `created_at`, `updated_at`) VALUES
(1, 'Gudang Meteran', 'CCTV', 'Hikvison', '3', 292, 230, 'aktif', 3, '2025-06-14 09:48:36', '2025-06-27 01:51:56'),
(2, 'Penampakan Jalan Raya depan kantor dan Rumah dinas', 'CCTV', 'Hikvison', '17', 1444, 598, 'aktif', 8, '2025-06-27 00:24:56', '2025-06-27 02:07:17'),
(3, 'Penampakan Depan sisi kanan Kantor', 'CCTV', 'Hikvison', '4', 636, 160, 'aktif', 8, '2025-06-27 00:27:33', '2025-06-27 01:56:35'),
(4, 'Gudang Distribusi', 'CCTV', 'Hikvison', '2', 396, 145, 'aktif', 3, '2025-06-27 00:29:21', '2025-06-27 01:55:30'),
(5, 'Ruang Dispatcher', 'CCTV', 'Hikvison', '5', 527, 578, 'aktif', 7, '2025-06-27 00:32:03', '2025-06-27 02:08:02'),
(6, 'Ruang Milenial', 'CCTV', 'Hikvison', '6', 864, 221, 'aktif', 9, '2025-06-27 00:35:23', '2025-06-27 01:56:25'),
(7, 'Gedung Olahara', 'CCTV', 'Hikvison', '7', 599, 819, 'aktif', 4, '2025-06-27 01:03:55', '2025-06-27 01:57:11'),
(8, 'Penampakan Parkiran Depan (Motor)', 'CCTV', 'Hikvison', '16', 398, 483, 'aktif', 8, '2025-06-27 01:07:54', '2025-06-27 23:12:37'),
(9, 'Lobby Ruang Logistik', 'CCTV', 'Hikvison', '9', 147, 272, 'aktif', 5, '2025-06-27 01:12:00', '2025-06-27 01:58:23'),
(10, 'Penampakan Depan Sisi kiri Kantor', 'CCTV', 'Hikvison', '15', 218, 396, 'aktif', 8, '2025-06-27 01:15:18', '2025-06-27 02:00:01'),
(11, 'Lobby Ruang Tamu', 'CCTV', 'Hikvison', '11', 768, 209, 'aktif', 5, '2025-06-27 01:19:18', '2025-06-27 01:58:40'),
(12, 'Ruang Sekretaris Manager', 'CCTV', 'Hikvison', '8', 549, 365, 'aktif', 6, '2025-06-27 01:20:32', '2025-06-27 01:58:04'),
(13, 'Ruang Depan Gedung Olahraga dan Masjid', 'CCTV', 'Hikvison', '14', 1232, 232, 'aktif', 4, '2025-06-27 01:22:35', '2025-06-27 02:08:50'),
(14, 'Ruang Rapat OPI', 'CCTV', 'Hikvison', '12', 1054, 429, 'aktif', 2, '2025-06-27 01:23:03', '2025-06-27 02:06:09'),
(15, 'Penampakan Atas Tangga Menuju LT.2', 'CCTV', 'Hikvison', '13', 734, 321, 'aktif', 10, '2025-06-27 01:25:49', '2025-06-27 01:59:26'),
(16, 'Gedung Olahraga', 'CCTV', 'Hikvison', '18', 1366, 469, 'aktif', 4, '2025-06-27 02:03:43', '2025-06-27 02:03:43'),
(17, 'Penampakan Belakang sisi Kiri Kantor', 'CCTV', 'Hikvison', '20', 923, 639, 'aktif', 8, '2025-06-27 02:04:21', '2025-06-27 02:04:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id`, `nama_ruangan`, `created_at`, `updated_at`) VALUES
(2, 'Rapat', '2025-06-14 05:50:10', '2025-06-14 10:35:06'),
(3, 'Gudang', '2025-06-14 05:52:14', '2025-06-14 10:36:10'),
(4, 'Gedung Olahraga', '2025-06-27 01:53:49', '2025-06-27 01:54:38'),
(5, 'Lobby', '2025-06-27 01:54:01', '2025-06-27 01:54:01'),
(6, 'Ruang Sekretariat', '2025-06-27 01:54:15', '2025-06-27 01:54:15'),
(7, 'Ruang Dispatcher', '2025-06-27 01:54:32', '2025-06-27 01:54:32'),
(8, 'Luar Kantor', '2025-06-27 01:55:01', '2025-06-27 01:55:01'),
(9, 'Ruang Milenial', '2025-06-27 01:56:15', '2025-06-27 01:56:15'),
(10, 'Gedung', '2025-06-27 01:59:14', '2025-06-27 01:59:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('A1dtYk6vgxZyczv91YdtsqW0C2fbpAbX5if8xwTl', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQmwySnNpQnVUYTltWTZid0M5V2V0VVpnTDQ1WVFSRElTZUp0cmxYMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1751026466),
('TssdsiNXKBhwCe6NIwQvv6I0NWg3lslLUo3fTbVk', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidXgwYThXRWxtcVMxWktRSFdJbWU5bUhxQlNmQnFVbmdVREIwVmdBciI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1751091161);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('Admin','User') NOT NULL,
  `pegawai_models_id` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `role`, `pegawai_models_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'fulan@gmail.com', 'Admin', 1, NULL, '$2y$12$oL.vt5RM/ZgmvRuuRM38ueM5VHme9KzcvatW5gkwk9OWceKyyRAFq', NULL, '2025-06-14 07:42:17', '2025-06-27 02:20:02'),
(2, 'user', 'user@gmail.com', 'User', 2, NULL, '$2y$12$m1AHbJp9NRy3vMLIyduSIemCA/9uyi09YrepKjnRdqtYvNF.G.1JS', NULL, '2025-06-27 02:19:40', '2025-06-27 02:19:40');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perangkat`
--
ALTER TABLE `perangkat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `perangkat`
--
ALTER TABLE `perangkat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
