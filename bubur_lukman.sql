-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Mar 2020 pada 17.55
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

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_tipe_pengguna` (`id_tipe_pengguna`);

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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `id_tipe_pengguna` FOREIGN KEY (`id_tipe_pengguna`) REFERENCES `set_kamus` (`id_set_kamus`);

--
-- Ketidakleluasaan untuk tabel `set_kamus`
--
ALTER TABLE `set_kamus`
  ADD CONSTRAINT `id_set_kategori` FOREIGN KEY (`id_set_kategori`) REFERENCES `set_kategori` (`id_set_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
