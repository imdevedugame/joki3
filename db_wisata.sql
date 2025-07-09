-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2025 pada 15.40
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `isi`, `tanggal`, `gambar`) VALUES
(1, 'Viral, Gen Z tertantang tiktok', 'semua orang menginginkan rapling karena sangar bisa terbalik haha', '2025-06-27', '1751048745_a03eb12dfcd6b947def7.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail` int(11) NOT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail`, `id_pesanan`, `id_paket`, `qty`, `subtotal`) VALUES
(3, 8, 7, 2, 1000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `file_gambar` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `judul`, `file_gambar`, `deskripsi`) VALUES
(1, 'hhhhhhhhhhhhh', '1751035031_1dd95dcbea4b3b113cd8.jpg', 'asd'),
(3, 'halo', '1751660529_49c06e9d3046558ce43f.png', 'halogais sdfghjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjhgfdfghgfdsdfghfdsasdfghgfdsasdfghjkl;lkjhgfdszxcvbnmnbvcxcvbnmdsqwertyuioyfcvbnh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `homestay`
--

CREATE TABLE `homestay` (
  `id_homestay` int(11) NOT NULL,
  `nama_homestay` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `homestay`
--

INSERT INTO `homestay` (`id_homestay`, `nama_homestay`, `deskripsi`, `harga`, `kapasitas`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Prima Asri', 'nyaman dan bersih', 400000, 3, '1751455512_9af4f4438c059941f8d3.webp', '2025-07-02 18:25:12', '2025-07-02 18:46:01'),
(3, 'Asri Segar', 'sejuk dan indah', 500000, 4, '1751456375_9b127530e30ee8a8f25e.webp', '2025-07-02 18:39:35', '2025-07-02 18:45:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama`, `email`, `password`, `no_hp`, `alamat`, `foto`) VALUES
(3, 'Angga Wijaya', 'angga@example.com', '$2y$10$jEioMRnQ4e3AsfLISZ3xJOL0QaLXCCcUjv89WSUpItWM.D57GZOgq', '08123456789', 'Jl. Merdeka No. 1', 'default.jpg'),
(4, 'TATACHERDA SEMBARA', '111202314910@mhs.dinus.ac.id', '$2y$10$fqjFEUAdGLMW9CK4bxRYkOpFtEkaerRDdrZuOluiiR9rcnB/hztzW', '-', '-', 'https://lh3.googleusercontent.com/a/ACg8ocI65c6x9fcMnDaz1BHVqTzNKz5M3Kjvczg0MVRfeItj1Smx=s96-c'),
(5, 'tompel', 'tatassembara@gmail.com', '$2y$10$S4V9OdsbACihrRHyk6vQnOuPjJ3jMBY/ds0rolrSUmE.OYJUNdjlS', '08297262772', 'jajjajkask', 'default.jpg'),
(6, 'tompel', 'kelasatas24@gmail.com', '$2y$10$OngQvp0LyVLE7UDh0eznQO.B3e4dJ.1ioAQ.Bh7a0GPEmP4IYQt4i', '082972627788', 'jhsakkhas', 'default.jpg'),
(7, 'lampukakak', 'lampukakak@gmail.com', '$2y$10$sQE0GBkesEgc3UYkxVKpOOG/jy/fpKqudbX4uyGf73xUlm8goJ6su', '9829273383', 'akkkkkkkkk', 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_wisata`
--

CREATE TABLE `paket_wisata` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `paket_wisata`
--

INSERT INTO `paket_wisata` (`id_paket`, `nama_paket`, `deskripsi`, `harga`, `kapasitas`, `gambar`) VALUES
(1, 'Tubing', 'Mengarungi sungai dengan ban, bayar perorang', 80000, 1, '1750935968_c33ce77669f56a84f877.jpeg'),
(2, 'Rafting', 'mengarungi sungai menggunakan prahu karet per perahu 4 orang', 400000, 4, '1750935990_a7042fcab79a2a64b91b.jpeg'),
(3, 'Repling', 'menuruni air terjun dengan tali', 250000, 1, '1750935998_6375a58ae07e70dd82f3.jpeg'),
(7, 'Jeep Offroad', 'berkeliling enggunakan jeep melalui lumpur dan adventure', 500000, 5, '1751010699_92d7e9c9556f5f98b7eb.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_homestay`
--

CREATE TABLE `pemesanan_homestay` (
  `id_pemesanan_homestay` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_homestay` int(11) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `status` varchar(50) DEFAULT 'Belum Bayar',
  `file_bukti` varchar(255) DEFAULT NULL,
  `tanggal_upload` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan_homestay`
--

INSERT INTO `pemesanan_homestay` (`id_pemesanan_homestay`, `id_member`, `id_homestay`, `tanggal_pesan`, `status`, `file_bukti`, `tanggal_upload`) VALUES
(1, 3, 1, '2025-07-02', 'Sudah Dikonfirmasi', NULL, NULL),
(2, 3, 1, '2025-07-02', 'Sudah Dikonfirmasi', NULL, NULL),
(3, 3, 3, '2025-07-02', 'Sudah Dikonfirmasi', NULL, NULL),
(4, 3, 1, '2025-07-02', 'Sudah Dikonfirmasi', NULL, NULL),
(5, 3, 1, '2025-07-02', 'Sudah Dikonfirmasi', NULL, NULL),
(6, 3, 1, '2025-07-02', 'Sudah Dikonfirmasi', NULL, NULL),
(7, 3, 1, '2025-07-02', 'Sudah Dikonfirmasi', NULL, NULL),
(8, 3, 1, '2025-07-02', 'Sudah Dikonfirmasi', NULL, NULL),
(9, 3, 1, '2025-07-02', 'Sudah Dikonfirmasi', NULL, NULL),
(10, 3, 1, '2025-07-02', 'Sudah Dikonfirmasi', NULL, NULL),
(11, 3, 1, '2025-07-02', 'Sudah Dikonfirmasi', NULL, NULL),
(12, 3, 1, '2025-07-02', 'Sudah Dikonfirmasi', NULL, NULL),
(13, 3, 1, '2025-07-02', 'Sudah Dikonfirmasi', NULL, NULL),
(14, 3, 1, '2025-07-02', 'Sudah Dikonfirmasi', NULL, NULL),
(15, 3, 1, '2025-07-02', 'Sudah Dikonfirmasi', NULL, NULL),
(16, 3, 1, '2025-07-02', 'Sudah Dikonfirmasi', NULL, NULL),
(17, 3, 1, '2025-07-02', 'Sudah Dikonfirmasi', NULL, NULL),
(18, 3, 1, '2025-07-02', 'Sudah Dikonfirmasi', NULL, NULL),
(19, 3, 1, '2025-07-02', 'Sudah Dikonfirmasi', NULL, NULL),
(20, 3, 1, '2025-07-02', 'Sudah Dikonfirmasi', NULL, NULL),
(21, 3, 1, '2025-07-02', 'Sudah Dikonfirmasi', NULL, NULL),
(22, 3, 1, '2025-07-03', 'Sudah Dikonfirmasi', NULL, NULL),
(23, 3, 1, '2025-07-03', 'Sudah Dikonfirmasi', NULL, NULL),
(24, 3, 1, '2025-07-03', 'Sudah Dikonfirmasi', NULL, NULL),
(25, 3, 1, '2025-07-04', 'Sudah Dikonfirmasi', NULL, NULL),
(26, 3, 1, '2025-07-04', 'Sudah Dikonfirmasi', NULL, NULL),
(27, 3, 1, '2025-07-04', 'Sudah Dikonfirmasi', NULL, NULL),
(28, 3, 3, '2025-07-04', 'Sudah Dikonfirmasi', '1751713325_34ddd278d3ae39428d85.png', '2025-07-05 11:02:05'),
(29, 3, 1, '2025-07-04', 'Sudah Dikonfirmasi', NULL, NULL),
(30, 3, 1, '2025-07-05', 'Sudah Dikonfirmasi', NULL, NULL),
(31, 3, 1, '2025-07-05', 'Sudah Dikonfirmasi', '1751714470_ab842f7d738b8a6ad0d2.png', '2025-07-05 11:21:10'),
(32, 3, 3, '2025-07-05', 'Sudah Dikonfirmasi', NULL, NULL),
(33, 3, 1, '2025-07-06', 'Sudah Dikonfirmasi', '1751794170_f3b327ec996e48e6f609.png', '2025-07-06 09:29:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `tanggal_pesan` date DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `status_pembayaran` varchar(50) DEFAULT 'Belum Bayar',
  `status_pengiriman` varchar(50) DEFAULT '-',
  `file_bukti` varchar(255) DEFAULT NULL,
  `tanggal_upload` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_member`, `id_paket`, `tanggal_pesan`, `total_harga`, `status_pembayaran`, `status_pengiriman`, `file_bukti`, `tanggal_upload`) VALUES
(4, 4, NULL, '2025-07-01', 80000, '', '', NULL, NULL),
(5, 4, NULL, '2025-07-01', 80000, '', '', '1751361293_3e96c4428a5b67477d05.png', '2025-07-01 09:14:53'),
(6, NULL, NULL, '2025-07-02', 80000, '', '', NULL, NULL),
(8, 3, NULL, '2025-07-03', NULL, 'belum', 'menunggu', NULL, NULL),
(9, 3, NULL, '2025-07-05', 250000, '', '', NULL, NULL),
(10, 3, NULL, '2025-07-05', 400000, '', '', NULL, NULL),
(11, 3, NULL, '2025-07-05', 80000, '', '', NULL, NULL),
(12, 3, NULL, '2025-07-05', 80000, '', '', NULL, NULL),
(13, 3, NULL, '2025-07-05', 80000, '', '', NULL, NULL),
(14, 3, NULL, '2025-07-05', 80000, '', '', NULL, NULL),
(15, 3, NULL, '2025-07-05', 80000, '', '', NULL, NULL),
(16, 3, NULL, '2025-07-05', 80000, '', '', NULL, NULL),
(17, 3, NULL, '2025-07-05', 80000, '', '', NULL, NULL),
(18, 3, NULL, '2025-07-05', 80000, '', '', NULL, NULL),
(19, 3, NULL, '2025-07-05', 80000, '', '', NULL, NULL),
(20, 3, NULL, '2025-07-05', 80000, '', '', NULL, NULL),
(21, 3, NULL, '2025-07-05', 80000, '', '', NULL, NULL),
(22, 3, NULL, '2025-07-05', 80000, '', '', NULL, NULL),
(23, 3, NULL, '2025-07-05', 80000, '', '', NULL, NULL),
(24, 3, NULL, '2025-07-05', 80000, '', '', NULL, NULL),
(25, 3, NULL, '2025-07-05', 80000, '', '', NULL, NULL),
(26, 3, NULL, '2025-07-05', 400000, '', '', NULL, NULL),
(27, 3, NULL, '2025-07-05', 400000, '', '', NULL, NULL),
(28, 3, NULL, '2025-07-05', 400000, '', '', NULL, NULL),
(29, 3, 1, '2025-07-05', 80000, 'Lunas', 'Sedang Diproses', '1751718347_8083e2380f4e4f6db56e.png', '2025-07-05 12:25:47'),
(30, 3, 3, '2025-07-05', 250000, 'Lunas', 'Sedang Diproses', '1751718389_badd93e176a0a36f5165.png', '2025-07-05 12:26:29'),
(31, 3, 2, '2025-07-05', 400000, 'Lunas', 'Sedang Diproses', '1751718650_1bff1124c2edca9c9d56.png', '2025-07-05 12:30:50'),
(32, 3, 1, '2025-07-06', 80000, 'Lunas', 'Sedang Diproses', NULL, NULL),
(33, 3, 1, '2025-07-06', 80000, 'Lunas', 'Sedang Diproses', NULL, NULL),
(34, 3, 1, '2025-07-06', 80000, 'Lunas', 'Sedang Diproses', NULL, NULL),
(35, 3, 1, '2025-07-06', 80000, 'Lunas', 'Sedang Diproses', NULL, NULL),
(36, 3, 1, '2025-07-06', 80000, 'Lunas', 'Sedang Diproses', NULL, NULL),
(37, 3, 1, '2025-07-06', 80000, 'Lunas', 'Sedang Diproses', NULL, NULL),
(38, 3, 3, '2025-07-06', 250000, 'Lunas', 'Sedang Diproses', NULL, NULL),
(39, 3, 1, '2025-07-06', 80000, 'Lunas', 'Sedang Diproses', '1751790224_80669147cda6a0605fea.png', '2025-07-06 08:23:44'),
(40, 3, 1, '2025-07-06', 80000, 'Lunas', 'Sedang Diproses', NULL, NULL),
(41, 3, 7, '2025-07-06', 500000, 'Lunas', 'Sedang Diproses', '1751802748_2bad85dcdc765cf3ffa6.png', '2025-07-06 11:52:28'),
(42, 3, 2, '2025-07-06', 400000, 'Lunas', 'Sedang Diproses', '1751804327_99f31e6d121d3434cc58.png', '2025-07-06 12:18:47'),
(43, 3, 2, '2025-07-06', 400000, 'Lunas', 'Sedang Diproses', NULL, NULL),
(44, 3, 2, '2025-07-06', 400000, 'Lunas', 'Sedang Diproses', '1751805201_0ef4ebd9cae3bdc6fa1d.png', '2025-07-06 12:33:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `level` enum('admin') DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `level`) VALUES
(3, 'adminbaru', '$2y$10$cGm2NGZ7v.Met24K.nrdaOzTbO1MBCXVoibJ/R1fvIUQS19H0G0EK', 'Admin Baru', 'admin'),
(4, 'Ze', '81dc9bdb52d04dc20036dbd8313ed055', 'Ze', ''),
(5, 'Zeblanov', 'fcea920f7412b5da7be0cf42b8c93759', 'Zeblanov', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `link_youtube` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `video`
--

INSERT INTO `video` (`id_video`, `judul`, `link_youtube`, `deskripsi`) VALUES
(2, 'asek', 'https://www.youtube.com/watch?v=mwefSpxXMPQ', 'coba'),
(3, 'kita bermain tubing', 'https://www.youtube.com/watch?v=mwefSpxXMPQ', 'ini video link nya'),
(4, 'JANGAN DI KLIK', 'https://www.youtube.com/watch?v=H2U7cpuJ97I', 'joget dulu ga sih');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `homestay`
--
ALTER TABLE `homestay`
  ADD PRIMARY KEY (`id_homestay`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket_wisata`
--
ALTER TABLE `paket_wisata`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `pemesanan_homestay`
--
ALTER TABLE `pemesanan_homestay`
  ADD PRIMARY KEY (`id_pemesanan_homestay`),
  ADD KEY `fk_member` (`id_member`),
  ADD KEY `fk_homestay` (`id_homestay`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_member` (`id_member`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `homestay`
--
ALTER TABLE `homestay`
  MODIFY `id_homestay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `paket_wisata`
--
ALTER TABLE `paket_wisata`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_homestay`
--
ALTER TABLE `pemesanan_homestay`
  MODIFY `id_pemesanan_homestay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket_wisata` (`id_paket`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanan_homestay`
--
ALTER TABLE `pemesanan_homestay`
  ADD CONSTRAINT `fk_homestay` FOREIGN KEY (`id_homestay`) REFERENCES `homestay` (`id_homestay`),
  ADD CONSTRAINT `fk_member` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
