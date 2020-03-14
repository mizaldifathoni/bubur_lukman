-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Mar 2020 pada 04.43
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
-- Struktur dari tabel `foto_toko`
--

CREATE TABLE `foto_toko` (
  `id_foto_toko` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama_foto` varchar(64) NOT NULL,
  `deskripsi_foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak_toko`
--

CREATE TABLE `kontak_toko` (
  `id_kontak_toko` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_tipe_kontak` int(11) NOT NULL,
  `kontak` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `harga_menu` int(11) NOT NULL,
  `diskon_menu` int(11) NOT NULL,
  `nama_thumbnail_menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 1, 'admin');

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
(1, 'tipe_pengguna');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(32) NOT NULL,
  `lokasi_toko` varchar(128) NOT NULL,
  `sejarah_toko` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `lokasi_toko`, `sejarah_toko`) VALUES
(1, 'Bubur Lukman 2', 'Jalan Pulau Sebesi (Ambon), Sukarame, Kota Bandar Lampung, Lampung 35131, Indonesia', 'Tidak terdefinisi.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan_menu_toko`
--

CREATE TABLE `ulasan_menu_toko` (
  `id_ulasan_menu_toko` int(11) NOT NULL,
  `id_menu_toko` int(11) NOT NULL,
  `rating_ulasan_menu_toko` enum('1','2','3','4','5') NOT NULL,
  `isi_ulasan_menu_toko` varchar(240) NOT NULL,
  `no_telepon_pengulas` varchar(32) NOT NULL,
  `token_ulasan_menu_toko` varchar(128) NOT NULL,
  `tanggal_ulasan_menu_toko` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan_toko`
--

CREATE TABLE `ulasan_toko` (
  `id_ulasan_toko` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `rating_toko` enum('1','2','3','4','5') NOT NULL,
  `isi_ulasan_toko` varchar(240) NOT NULL,
  `no_telepon_pengulas` varchar(32) NOT NULL,
  `token_ulasan_toko` varchar(128) NOT NULL,
  `tanggal_ulasan_toko` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indeks untuk tabel `foto_toko`
--
ALTER TABLE `foto_toko`
  ADD PRIMARY KEY (`id_foto_toko`),
  ADD KEY `toko_id` (`id_toko`);

--
-- Indeks untuk tabel `kontak_toko`
--
ALTER TABLE `kontak_toko`
  ADD PRIMARY KEY (`id_kontak_toko`),
  ADD KEY `kontak_toko` (`id_toko`),
  ADD KEY `id_tipe_kontak` (`id_tipe_kontak`);

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
  ADD KEY `tokoid` (`id_toko`),
  ADD KEY `id_tipe_menu` (`id_tipe_menu`);

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
  ADD PRIMARY KEY (`id_ulasan_toko`),
  ADD KEY `ulasan_toko` (`id_toko`);

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
-- AUTO_INCREMENT untuk tabel `foto_toko`
--
ALTER TABLE `foto_toko`
  MODIFY `id_foto_toko` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kontak_toko`
--
ALTER TABLE `kontak_toko`
  MODIFY `id_kontak_toko` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu_toko`
--
ALTER TABLE `menu_toko`
  MODIFY `id_menu_toko` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_set_kamus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `set_kategori`
--
ALTER TABLE `set_kategori`
  MODIFY `id_set_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ulasan_menu_toko`
--
ALTER TABLE `ulasan_menu_toko`
  MODIFY `id_ulasan_menu_toko` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ulasan_toko`
--
ALTER TABLE `ulasan_toko`
  MODIFY `id_ulasan_toko` int(11) NOT NULL AUTO_INCREMENT;

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
-- Ketidakleluasaan untuk tabel `foto_toko`
--
ALTER TABLE `foto_toko`
  ADD CONSTRAINT `toko_id` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`);

--
-- Ketidakleluasaan untuk tabel `kontak_toko`
--
ALTER TABLE `kontak_toko`
  ADD CONSTRAINT `id_tipe_kontak` FOREIGN KEY (`id_tipe_kontak`) REFERENCES `set_kamus` (`id_set_kamus`),
  ADD CONSTRAINT `kontak_toko` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`);

--
-- Ketidakleluasaan untuk tabel `menu_toko`
--
ALTER TABLE `menu_toko`
  ADD CONSTRAINT `id_tipe_menu` FOREIGN KEY (`id_tipe_menu`) REFERENCES `set_kamus` (`id_set_kamus`),
  ADD CONSTRAINT `tokoid` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`);

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
-- Ketidakleluasaan untuk tabel `ulasan_toko`
--
ALTER TABLE `ulasan_toko`
  ADD CONSTRAINT `ulasan_toko` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`);

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
