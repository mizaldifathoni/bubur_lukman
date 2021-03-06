-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Bulan Mei 2020 pada 04.29
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bubur_lukman`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `isi_log` varchar(240) NOT NULL,
  `tanggal_log` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_toko`
--

CREATE TABLE `menu_toko` (
  `id_menu_toko` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_tipe_menu` int(11) NOT NULL,
  `nama_menu` varchar(32) NOT NULL,
  `deskripsi_menu` varchar(240) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `diskon_menu` int(11) NOT NULL,
  `nama_thumbnail_menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu_toko`
--

INSERT INTO `menu_toko` (`id_menu_toko`, `id_toko`, `id_tipe_menu`, `nama_menu`, `deskripsi_menu`, `harga_menu`, `diskon_menu`, `nama_thumbnail_menu`) VALUES
(1, 1, 4, 'Bubur Ayam', 'Ketika nasi sudah menjadi bubur, tinggal tambahkan ayam, telur, kecap dan kerupuk.', 10000, 20, '5e7082d1890a3.jpg'),
(3, 1, 4, 'Bubur Ketan Hitam', 'Ketan Hitam dengan kuah santan yang nikmat.', 10500, 0, '5e8de85f47559.jpg'),
(6, 1, 5, 'Kopi Hitam', 'Skuy santuy kopi nax senja.', 6000, 0, '5e7085a5014e7.jpg'),
(8, 1, 5, 'Es Teh Manis', 'Teh Manis made with ❤ plus ice.', 5000, 0, '5e7095668a61b.jpg'),
(9, 1, 5, 'Jus Jambu', 'Jambu segar yang diblend dengan es menghasilkan Jus Jambu yang segar dan menyehatkan!', 8000, 0, '5e8de387bd5e0.jpg'),
(21, 2, 4, 'Bubur Kacang Ijo', 'Kacang hijau yang diberi santan yang wuenak.', 9000, 0, '5e7827cbf0670.jpg'),
(23, 1, 4, 'Bubur Kacang Hijau', 'Bubur kacang hijau dengan santan enak bed', 12000, 0, '5e8568d675d1e.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `variabel` varchar(32) NOT NULL,
  `value` varchar(480) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `variabel`, `value`) VALUES
(1, 'judul_web', 'Bubur Lukman'),
(2, 'logo', 'assets/picture/base/logo_Bubur_Lukman_5e96ca0d8859f.png'),
(3, 'pesan_selamat_datang', 'Welcome to <br> Bubur Lukman'),
(4, 'deskripsi_pesan_selamat_datang', 'See how your users experience your website in realtime or view <br>\r\ntrends to see any changes in performance over time.'),
(5, 'foto_toko', 'assets/picture/base/foto_Bubur_Lukman_5e9fc61606981.jpg'),
(6, 'sejarah_toko', 'Bubur Lukman berdiri sejak tahun 1997, dan didirikan oleh bapak abubakar yang mana bermula bapak abubakar yang menyukai bubur ayam kemudian beliau akhirnya membuat suatu usaha keluarga, dan nama usaha tersebut terinspirasi oleh nama anak pertama beliau. Ez'),
(7, 'nomor_hp', '+6281234567890'),
(8, 'email', 'admin@buburlukman.com'),
(9, 'lokasi', 'Jl. Pulau Legundi No.202'),
(10, 'waktu_buka', 'Senin-Minggu : 06.30 WIB - 18.00 WIB'),
(11, 'link_facebook', 'https://web.facebook.com/pages/Bubur-Ayam-Lukman-Sukarame/380607452022961?_rdc=1'),
(12, 'link_instagram', 'https://www.instagram.com/waroengbuburlukman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `id_tipe_pengguna` int(11) NOT NULL,
  `username_pengguna` varchar(32) NOT NULL,
  `password_pengguna` varchar(32) NOT NULL,
  `nama_pengguna` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id_tipe_pengguna`, `username_pengguna`, `password_pengguna`, `nama_pengguna`) VALUES
(1, 1, 'administreita', '25d55ad283aa400af464c76d713c07ad', 'Abu Bakar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posting`
--

CREATE TABLE `posting` (
  `id_posting` int(11) NOT NULL,
  `id_tipe_posting` int(11) NOT NULL,
  `judul_posting` int(11) NOT NULL,
  `isi_posting` int(11) NOT NULL,
  `tanggal_posting` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_kamus`
--

CREATE TABLE `set_kamus` (
  `id_set_kamus` int(11) NOT NULL,
  `id_set_kategori` int(11) NOT NULL,
  `isi_set_kamus` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `set_kamus`
--

INSERT INTO `set_kamus` (`id_set_kamus`, `id_set_kategori`, `isi_set_kamus`) VALUES
(1, 1, 'admin'),
(2, 1, 'operator'),
(3, 1, 'owner'),
(4, 2, 'makanan'),
(5, 2, 'minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_kategori`
--

CREATE TABLE `set_kategori` (
  `id_set_kategori` int(11) NOT NULL,
  `nama_set_kategori` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `set_kategori`
--

INSERT INTO `set_kategori` (`id_set_kategori`, `nama_set_kategori`) VALUES
(1, 'tipe_pengguna'),
(2, 'tipe_menu_toko'),
(3, 'web');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statistik`
--

CREATE TABLE `statistik` (
  `id` int(11) NOT NULL,
  `uri` varchar(64) NOT NULL,
  `ip` varchar(64) NOT NULL,
  `negara` varchar(64) NOT NULL,
  `kota` varchar(64) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `statistik`
--

INSERT INTO `statistik` (`id`, `uri`, `ip`, `negara`, `kota`, `tanggal`) VALUES
(5, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-22 18:32:27'),
(6, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-22 18:32:27'),
(7, 'http://localhost/bubur_lukman/About', 'Unknown', 'Indonesia', 'Palembang', '2020-04-22 18:32:27'),
(8, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Palembang', '2020-04-22 18:32:27'),
(9, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Jambi City', '2020-04-22 18:32:27'),
(10, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Jambi City', '2020-04-22 18:32:27'),
(11, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-04-22 18:32:27'),
(12, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-04-22 20:50:48'),
(13, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Jambi City', '2020-04-22 22:57:16'),
(14, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-04-23 09:56:20'),
(15, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Jambi City', '2020-04-23 10:02:17'),
(16, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-04-23 10:02:50'),
(17, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-04-23 10:04:43'),
(18, 'http://localhost/bubur_lukman/About', 'Unknown', 'Indonesia', 'Medan', '2020-04-23 10:04:46'),
(19, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-04-23 10:04:51'),
(20, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Jambi City', '2020-04-23 10:21:54'),
(21, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-04-23 10:36:42'),
(22, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Jambi City', '2020-04-23 10:47:11'),
(23, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Jambi City', '2020-04-23 10:51:12'),
(24, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Jambi City', '2020-04-23 11:08:10'),
(25, 'http://localhost/bubur_lukman/About', 'Unknown', 'Indonesia', 'Medan', '2020-04-23 11:10:29'),
(26, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Jambi City', '2020-04-23 11:12:11'),
(27, 'http://localhost/bubur_lukman/About', 'Unknown', 'Indonesia', 'Jambi City', '2020-04-23 11:38:26'),
(28, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-04-23 11:38:31'),
(29, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Jambi City', '2020-04-23 11:38:33'),
(30, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-29 06:59:36'),
(31, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-29 08:02:09'),
(32, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-29 08:20:09'),
(33, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-29 08:33:38'),
(34, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-29 08:36:50'),
(35, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-29 08:47:29'),
(36, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-29 08:47:54'),
(37, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-29 08:48:20'),
(38, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-29 15:56:18'),
(39, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-29 15:58:05'),
(40, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-29 15:59:10'),
(41, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-29 15:59:50'),
(42, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-29 16:20:12'),
(43, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-29 16:26:13'),
(44, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-29 16:26:19'),
(45, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-29 16:32:07'),
(46, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 08:34:37'),
(47, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 08:52:53'),
(48, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 08:57:20'),
(49, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:00:10'),
(50, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:15:18'),
(51, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:22:19'),
(52, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:22:32'),
(53, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:23:47'),
(54, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:24:11'),
(55, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:24:25'),
(56, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:24:42'),
(57, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:37:31'),
(58, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:39:31'),
(59, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:39:45'),
(60, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:40:02'),
(61, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:42:21'),
(62, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:42:39'),
(63, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:43:12'),
(64, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:45:28'),
(65, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:46:06'),
(66, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:46:40'),
(67, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:48:40'),
(68, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:49:08'),
(69, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:51:26'),
(70, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:53:15'),
(71, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:53:31'),
(72, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:53:54'),
(73, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:54:16'),
(74, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:54:31'),
(75, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:55:42'),
(76, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:58:15'),
(77, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 09:59:55'),
(78, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 10:02:30'),
(79, 'http://localhost/bubur_lukman/About', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 10:04:15'),
(80, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 10:08:43'),
(81, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 10:32:27'),
(82, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Palembang', '2020-04-30 10:35:20'),
(83, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 10:32:29'),
(84, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 10:56:02'),
(85, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 10:56:03'),
(86, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 10:56:33'),
(87, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 10:59:56'),
(88, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 11:00:38'),
(89, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 11:02:01'),
(90, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 11:03:02'),
(91, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 11:06:38'),
(92, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 11:07:12'),
(93, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 11:07:53'),
(94, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 11:08:12'),
(95, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 11:09:21'),
(96, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 11:09:50'),
(97, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 11:15:53'),
(98, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 11:17:02'),
(99, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 11:28:32'),
(100, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 11:29:03'),
(101, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 11:29:45'),
(102, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 11:29:58'),
(103, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 11:32:14'),
(104, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Palembang', '2020-05-04 11:32:38'),
(105, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 06:59:04'),
(106, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 07:05:33'),
(107, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Jambi City', '2020-05-05 07:06:56'),
(108, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 07:15:32'),
(109, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 07:27:38'),
(110, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 07:28:50'),
(111, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 07:30:10'),
(112, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 07:30:17'),
(113, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 07:30:36'),
(114, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 07:30:39'),
(115, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 07:31:37'),
(116, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 07:34:17'),
(117, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 07:34:54'),
(118, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 07:35:07'),
(119, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 07:36:03'),
(120, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 07:41:05'),
(121, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 07:41:22'),
(122, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 07:44:36'),
(123, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:00:25'),
(124, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Jambi City', '2020-05-05 08:01:17'),
(125, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:04:02'),
(126, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:04:31'),
(127, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:05:06'),
(128, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:08:36'),
(129, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:09:12'),
(130, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:10:12'),
(131, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:11:12'),
(132, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:11:28'),
(133, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:12:32'),
(134, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:14:33'),
(135, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:15:37'),
(136, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:17:06'),
(137, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:18:12'),
(138, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:20:20'),
(139, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:21:14'),
(140, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:23:50'),
(141, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:26:12'),
(142, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:28:15'),
(143, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:28:27'),
(144, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Jambi City', '2020-05-05 08:29:21'),
(145, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:36:38'),
(146, 'http://localhost/bubur_lukman/About', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:36:54'),
(147, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:40:58'),
(148, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:49:11'),
(149, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:49:23'),
(150, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 08:50:07'),
(151, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 09:01:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(32) NOT NULL,
  `lokasi_toko` varchar(128) NOT NULL,
  `foto_toko` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `lokasi_toko`, `foto_toko`) VALUES
(1, 'Bubur Lukman 1', 'Jl. Pulau Legundi No.202, Sukarame, Kota Bandar Lampung', 'assets/picture/toko/foto_Bubur_Lukman_1_5e95434682e44.jpg'),
(2, 'Bubur Lukman 2', 'Jl. Al Hikmah, Sukabumi Indah, Sukabumi, Kota Bandar Lampung', 'assets/picture/toko/foto_Bubur_Lukman_2_5e95434d95563.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan_menu_toko`
--

CREATE TABLE `ulasan_menu_toko` (
  `id_ulasan_menu_toko` int(11) NOT NULL,
  `id_menu_toko` int(11) NOT NULL,
  `nama_pengulas` varchar(128) NOT NULL,
  `rating_menu_toko` enum('1','2','3','4','5') NOT NULL,
  `isi_ulasan_menu_toko` varchar(240) NOT NULL,
  `no_telepon_pengulas` varchar(32) NOT NULL,
  `token_ulasan_menu_toko` varchar(128) NOT NULL,
  `tanggal_ulasan_menu_toko` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ulasan_menu_toko`
--

INSERT INTO `ulasan_menu_toko` (`id_ulasan_menu_toko`, `id_menu_toko`, `nama_pengulas`, `rating_menu_toko`, `isi_ulasan_menu_toko`, `no_telepon_pengulas`, `token_ulasan_menu_toko`, `tanggal_ulasan_menu_toko`) VALUES
(1, 1, 'Yusuf Rizaldo', '5', 'Bubur ayamnya mantappsss', '081273201616', '5eb0b049c191c', '2020-05-05 02:16:09'),
(2, 3, 'Mang Saswi', '4', 'Mantab, tapi kurang asin', '081233331111', '5eb0bbb914892', '2020-05-05 03:04:57'),
(3, 3, 'Mang Ucup', '5', 'Mantap kang, passs', '081237320171', '5eb0bf6cdb08d', '2020-05-05 03:20:44'),
(4, 23, 'Mang Ucup', '5', 'Buburnya ijo gan mantapppp', '081233331111', '5eb0c18d05d8e', '2020-05-05 03:29:49'),
(5, 23, 'Pecinta Bubur Ayam', '1', 'KOK BUBURNYA IJO? KAN SAYA PESEN BUBUR AYAM!!!', '081288889999', '5eb0c1cd4a66a', '2020-05-05 03:30:53'),
(6, 6, 'Gogogoy', '2', 'Kopinya ko abu abu bukan item?', '081289891212', '5eb0c996b18a1', '2020-05-05 04:04:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan_toko`
--

CREATE TABLE `ulasan_toko` (
  `id_ulasan_toko` int(11) NOT NULL,
  `nama_pengulas` varchar(64) NOT NULL,
  `rating_toko` enum('1','2','3','4','5') NOT NULL,
  `isi_ulasan_toko` varchar(240) NOT NULL,
  `no_telepon_pengulas` varchar(32) NOT NULL,
  `token_ulasan_toko` varchar(128) NOT NULL,
  `tanggal_ulasan_toko` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ulasan_toko`
--

INSERT INTO `ulasan_toko` (`id_ulasan_toko`, `nama_pengulas`, `rating_toko`, `isi_ulasan_toko`, `no_telepon_pengulas`, `token_ulasan_toko`, `tanggal_ulasan_toko`) VALUES
(1, 'Joni Walker', '4', 'Pelayanan baik, tapi buburnya kurang banyak, porsi saya 3 mangkok :(', '081273201616', '5e9fbafa79c77', '2020-04-22 05:33:14'),
(2, 'Abdurrahman Ichi', '5', 'Tempatnya cozy, makanannya enak-enak ege', '081273201616', '5e9fbd439d223', '2020-04-22 05:42:59'),
(3, 'Rojali', '5', 'Oke gan buburnya, apalagi yang bubur yang terlanjur jadi nasi.', '081273201616', '5e9fc5c9327c6', '2020-04-22 06:19:21'),
(4, 'Yusuf Rizaldi', '5', 'Mantap gan', '08123456788', '5ea114d946e4d', '2020-04-23 06:08:57'),
(5, 'Angga Sasono', '5', 'Mantagg sogg', '081299991234', '5ea8d99bc47fd', '2020-04-29 03:34:19'),
(6, 'Maman Atep', '5', 'Gokilll masa bubur sama es tehnya panas :v', '081322221234', '5ea8d9fb4297d', '2020-04-29 03:35:55'),
(7, 'Pierre Njanka', '3', 'Masa buburnya kayak nasi !!!?!', '089912348888', '5ea8da8611ab1', '2020-04-29 03:38:14'),
(8, 'Hendro Kartiko', '5', 'Rojali kecebur makan lemper, Ini bubur apaan ko bikin laper?!', '087712341111', '5ea8db84943ac', '2020-04-29 03:42:28'),
(9, 'Yusuf Rizaldi', '5', 'asdasdasd', 'asdsadasdasdas', '5ea8dd57ce5a5', '2020-04-29 03:50:15'),
(10, 'Yusuf Rizaldi', '5', 'Halo', '081234777777', '5eaa476281806', '2020-04-30 05:34:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `visi_misi_toko`
--

CREATE TABLE `visi_misi_toko` (
  `id_visi_misi_toko` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `visi_toko` varchar(240) NOT NULL,
  `misi_toko` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu_buka_toko`
--

CREATE TABLE `waktu_buka_toko` (
  `id_waktu_buka_toko` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `hari_buka` varchar(12) NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `menu_toko`
--
ALTER TABLE `menu_toko`
  ADD PRIMARY KEY (`id_menu_toko`),
  ADD KEY `id_tipe_menu` (`id_tipe_menu`),
  ADD KEY `tokoid` (`id_toko`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_tipe_pengguna` (`id_tipe_pengguna`);

--
-- Indeks untuk tabel `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`id_posting`),
  ADD KEY `id_tipe_posting` (`id_tipe_posting`);

--
-- Indeks untuk tabel `set_kamus`
--
ALTER TABLE `set_kamus`
  ADD PRIMARY KEY (`id_set_kamus`),
  ADD KEY `id_set_kategori` (`id_set_kategori`);

--
-- Indeks untuk tabel `set_kategori`
--
ALTER TABLE `set_kategori`
  ADD PRIMARY KEY (`id_set_kategori`);

--
-- Indeks untuk tabel `statistik`
--
ALTER TABLE `statistik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indeks untuk tabel `ulasan_menu_toko`
--
ALTER TABLE `ulasan_menu_toko`
  ADD PRIMARY KEY (`id_ulasan_menu_toko`),
  ADD KEY `ulasan_menu_toko` (`id_menu_toko`);

--
-- Indeks untuk tabel `ulasan_toko`
--
ALTER TABLE `ulasan_toko`
  ADD PRIMARY KEY (`id_ulasan_toko`);

--
-- Indeks untuk tabel `visi_misi_toko`
--
ALTER TABLE `visi_misi_toko`
  ADD PRIMARY KEY (`id_visi_misi_toko`),
  ADD KEY `id_toko` (`id_toko`);

--
-- Indeks untuk tabel `waktu_buka_toko`
--
ALTER TABLE `waktu_buka_toko`
  ADD PRIMARY KEY (`id_waktu_buka_toko`),
  ADD KEY `idtoko` (`id_toko`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu_toko`
--
ALTER TABLE `menu_toko`
  MODIFY `id_menu_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `posting`
--
ALTER TABLE `posting`
  MODIFY `id_posting` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `set_kamus`
--
ALTER TABLE `set_kamus`
  MODIFY `id_set_kamus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `set_kategori`
--
ALTER TABLE `set_kategori`
  MODIFY `id_set_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `statistik`
--
ALTER TABLE `statistik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ulasan_menu_toko`
--
ALTER TABLE `ulasan_menu_toko`
  MODIFY `id_ulasan_menu_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ulasan_toko`
--
ALTER TABLE `ulasan_toko`
  MODIFY `id_ulasan_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `visi_misi_toko`
--
ALTER TABLE `visi_misi_toko`
  MODIFY `id_visi_misi_toko` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `waktu_buka_toko`
--
ALTER TABLE `waktu_buka_toko`
  MODIFY `id_waktu_buka_toko` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `menu_toko`
--
ALTER TABLE `menu_toko`
  ADD CONSTRAINT `id_tipe_menu` FOREIGN KEY (`id_tipe_menu`) REFERENCES `set_kamus` (`id_set_kamus`),
  ADD CONSTRAINT `tokoid` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `id_tipe_pengguna` FOREIGN KEY (`id_tipe_pengguna`) REFERENCES `set_kamus` (`id_set_kamus`);

--
-- Ketidakleluasaan untuk tabel `posting`
--
ALTER TABLE `posting`
  ADD CONSTRAINT `id_tipe_posting` FOREIGN KEY (`id_tipe_posting`) REFERENCES `set_kamus` (`id_set_kamus`);

--
-- Ketidakleluasaan untuk tabel `set_kamus`
--
ALTER TABLE `set_kamus`
  ADD CONSTRAINT `id_set_kategori` FOREIGN KEY (`id_set_kategori`) REFERENCES `set_kategori` (`id_set_kategori`);

--
-- Ketidakleluasaan untuk tabel `ulasan_menu_toko`
--
ALTER TABLE `ulasan_menu_toko`
  ADD CONSTRAINT `ulasan_menu_toko` FOREIGN KEY (`id_menu_toko`) REFERENCES `menu_toko` (`id_menu_toko`);

--
-- Ketidakleluasaan untuk tabel `visi_misi_toko`
--
ALTER TABLE `visi_misi_toko`
  ADD CONSTRAINT `id_toko` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`);

--
-- Ketidakleluasaan untuk tabel `waktu_buka_toko`
--
ALTER TABLE `waktu_buka_toko`
  ADD CONSTRAINT `idtoko` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
