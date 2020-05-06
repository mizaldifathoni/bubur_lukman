-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Bulan Mei 2020 pada 04.18
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
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `judul_foto` varchar(128) NOT NULL,
  `path_foto` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id_foto`, `judul_foto`, `path_foto`) VALUES
(2, 'Bubur Ketan Hitam', 'assets/picture/gallery/Bubur_Ketan_Hitam_5eb2135e22343.jpg'),
(3, 'Bubur Kacang Campur', 'assets/picture/gallery/Bubur_Kacang_Campur_5eb213c899a01.jpg');

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
(2, 'logo', 'assets/picture/base/logo_Bubur_Lukman_5eb201f787e48.png'),
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
  `foto_posting` varchar(256) NOT NULL,
  `judul_posting` varchar(128) NOT NULL,
  `isi_posting` varchar(2048) NOT NULL,
  `tanggal_posting` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `posting`
--

INSERT INTO `posting` (`id_posting`, `id_tipe_posting`, `foto_posting`, `judul_posting`, `isi_posting`, `tanggal_posting`) VALUES
(1, 7, 'assets/picture/posts/Lebaran_Ya_Balapan_5eb1127ba6c41.jpg', 'Lebaran Ya Balapan', '<p>AZAYAKA MAMA</p>\r\n', '2020-05-05 10:01:36'),
(3, 6, 'assets/picture/posts/Pembukaan_Cabang_Baru_Bubur_Lukman_di_Sukarame_5eb1379ecc932.jpg', 'Pembukaan Cabang Baru Bubur Lukman di Sukarame', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The ', '2020-05-05 16:53:34');

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
(5, 2, 'minuman'),
(6, 4, 'berita'),
(7, 4, 'promo');

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
(3, 'web'),
(4, 'tipe_posting');

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
(151, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 09:01:38'),
(152, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 09:30:35'),
(153, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 09:32:06'),
(154, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 09:32:10'),
(155, 'http://localhost/bubur_lukman/About', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:31:11'),
(156, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Jambi City', '2020-05-05 14:31:13'),
(157, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:31:17'),
(158, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:35:32'),
(159, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:35:47'),
(160, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:35:56'),
(161, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:36:16'),
(162, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:36:41'),
(163, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:37:20'),
(164, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:38:17'),
(165, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:38:38'),
(166, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:39:02'),
(167, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:39:09'),
(168, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:39:27'),
(169, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:39:43'),
(170, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:40:41'),
(171, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:42:37'),
(172, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:43:34'),
(173, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:44:10'),
(174, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:44:32'),
(175, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:46:55'),
(176, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:47:23'),
(177, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Jambi City', '2020-05-05 14:48:01'),
(178, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:48:18'),
(179, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:48:50'),
(180, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:49:29'),
(181, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:50:12'),
(182, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:50:26'),
(183, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:50:38'),
(184, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:50:51'),
(185, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:52:01'),
(186, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 14:52:13'),
(187, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 15:30:20'),
(188, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 15:31:58'),
(189, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 15:33:13'),
(190, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Jambi City', '2020-05-05 15:52:01'),
(191, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 15:52:33'),
(192, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 15:55:46'),
(193, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:01:19'),
(194, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:02:25'),
(195, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:02:35'),
(196, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:03:30'),
(197, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:03:43'),
(198, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:04:43'),
(199, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:05:03'),
(200, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:05:58'),
(201, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:06:50'),
(202, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:06:57'),
(203, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:08:16'),
(204, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:11:35'),
(205, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:11:43'),
(206, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:12:06'),
(207, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:14:01'),
(208, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:15:15'),
(209, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Jambi City', '2020-05-05 16:15:28'),
(210, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:16:36'),
(211, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Jambi City', '2020-05-05 16:17:34'),
(212, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:18:15'),
(213, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:18:23'),
(214, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:18:37'),
(215, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:19:39'),
(216, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:20:45'),
(217, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:31:04'),
(218, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:39:33'),
(219, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:40:48'),
(220, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:41:15'),
(221, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:42:28'),
(222, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Jambi City', '2020-05-05 16:42:38'),
(223, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:43:00'),
(224, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:43:27'),
(225, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Jambi City', '2020-05-05 16:51:40'),
(226, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:53:44'),
(227, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:54:46'),
(228, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:55:11'),
(229, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:55:22'),
(230, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:55:30'),
(231, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:55:42'),
(232, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:55:53'),
(233, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:56:09'),
(234, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Jambi City', '2020-05-05 16:56:41'),
(235, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 16:57:18'),
(236, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 17:00:37'),
(237, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 17:00:59'),
(238, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 17:02:33'),
(239, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 17:09:18'),
(240, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 17:12:14'),
(241, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 17:30:52'),
(242, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 17:31:04'),
(243, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 17:31:25'),
(244, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 17:31:58'),
(245, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 17:32:16'),
(246, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Jambi City', '2020-05-05 17:32:35'),
(247, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 17:32:54'),
(248, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 17:33:26'),
(249, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 17:34:14'),
(250, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 17:34:23'),
(251, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 17:34:26'),
(252, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 17:34:43'),
(253, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 17:35:10'),
(254, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 17:35:34'),
(255, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 17:35:46'),
(256, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 19:33:51'),
(257, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 19:34:08'),
(258, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 19:34:25'),
(259, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 19:35:03'),
(260, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 19:35:57'),
(261, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Jambi City', '2020-05-05 19:36:24'),
(262, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 19:37:14'),
(263, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 19:37:22'),
(264, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Jambi City', '2020-05-05 19:37:46'),
(265, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 19:37:50'),
(266, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 19:40:26'),
(267, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 19:44:33'),
(268, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 19:45:23'),
(269, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Jambi City', '2020-05-05 19:45:35'),
(270, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 19:46:33'),
(271, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 19:46:51'),
(272, 'http://localhost/bubur_lukman/About', 'Unknown', 'Indonesia', 'Medan', '2020-05-05 20:16:42'),
(273, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 06:55:03'),
(274, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 06:56:13'),
(275, 'http://localhost/bubur_lukman/About', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 06:56:16'),
(276, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 06:56:19'),
(277, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 06:56:25'),
(278, 'http://localhost/bubur_lukman/About', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 06:56:34'),
(279, 'http://localhost/bubur_lukman/About', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 06:56:53'),
(280, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 06:57:19'),
(281, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 06:57:44'),
(282, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 06:57:48'),
(283, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 06:58:13'),
(284, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 06:58:17'),
(285, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 07:01:00'),
(286, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Jambi City', '2020-05-06 07:01:48'),
(287, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 07:02:13'),
(288, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 07:02:24'),
(289, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Jambi City', '2020-05-06 07:02:34'),
(290, 'http://localhost/bubur_lukman/About', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 07:03:13'),
(291, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 07:03:33'),
(292, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 07:03:59'),
(293, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 07:05:38'),
(294, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 07:17:00'),
(295, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 07:17:42'),
(296, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 07:18:19'),
(297, 'http://localhost/bubur_lukman/Berita', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 07:22:37'),
(298, 'http://localhost/bubur_lukman/About', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 07:23:11'),
(299, 'http://localhost/bubur_lukman/Menu', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 07:23:13'),
(300, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Jambi City', '2020-05-06 07:23:16'),
(301, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 09:10:23'),
(302, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 09:11:06'),
(303, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 09:13:05'),
(304, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 09:13:51'),
(305, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 09:14:01'),
(306, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 09:14:40'),
(307, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 09:15:24'),
(308, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 09:16:12'),
(309, 'http://localhost/bubur_lukman/Home', 'Unknown', 'Indonesia', 'Medan', '2020-05-06 09:16:39');

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
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

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
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id_posting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `set_kamus`
--
ALTER TABLE `set_kamus`
  MODIFY `id_set_kamus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `set_kategori`
--
ALTER TABLE `set_kategori`
  MODIFY `id_set_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `statistik`
--
ALTER TABLE `statistik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

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
