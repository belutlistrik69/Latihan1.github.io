-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Feb 2023 pada 15.01
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pra_usk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin`
--

CREATE TABLE `t_admin` (
  `f_id` int(11) NOT NULL,
  `f_nama` varchar(200) NOT NULL,
  `f_username` varchar(200) NOT NULL,
  `f_password` varchar(200) NOT NULL,
  `f_level` enum('Admin','Pustakawan') NOT NULL,
  `f_status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`f_id`, `f_nama`, `f_username`, `f_password`, `f_level`, `f_status`) VALUES
(1, 'Ilham Maulana', 'iam', '202cb962ac59075b964b07152d234b70', 'Admin', 'Aktif'),
(16, 'William Sinaga', 'willi', '202cb962ac59075b964b07152d234b70', 'Pustakawan', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_anggota`
--

CREATE TABLE `t_anggota` (
  `f_id` int(11) NOT NULL,
  `f_nama` varchar(200) NOT NULL,
  `f_username` varchar(200) NOT NULL,
  `f_password` varchar(200) NOT NULL,
  `f_tempatlahir` varchar(100) NOT NULL,
  `f_tanggallahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_anggota`
--

INSERT INTO `t_anggota` (`f_id`, `f_nama`, `f_username`, `f_password`, `f_tempatlahir`, `f_tanggallahir`) VALUES
(6, 'Daffasril', 'daffa', '202cb962ac59075b964b07152d234b70', 'Jakarta', '2023-02-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_buku`
--

CREATE TABLE `t_buku` (
  `f_id` int(11) NOT NULL,
  `f_idkategori` int(11) NOT NULL,
  `f_judul` varchar(200) NOT NULL,
  `f_pengarang` varchar(200) NOT NULL,
  `f_penerbit` varchar(200) NOT NULL,
  `f_deskripsi` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_buku`
--

INSERT INTO `t_buku` (`f_id`, `f_idkategori`, `f_judul`, `f_pengarang`, `f_penerbit`, `f_deskripsi`) VALUES
(2, 2, 'Penelitian Cangkang', 'Fadil', 'Trans', 'Teliti aja'),
(3, 2, 'Perjalanan Bukit', 'Frank', 'Biston Center', 'Mendaki'),
(4, 4, 'Kerajaan Awan', 'Ibnu', 'Trans', 'Petualangan'),
(8, 5, 'ARUL', 'frre', 'Trans', 'fder');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_detailbuku`
--

CREATE TABLE `t_detailbuku` (
  `f_id` int(11) NOT NULL,
  `f_idbuku` int(11) NOT NULL,
  `f_status` enum('Tersedia','Tidak Tersedia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_detailbuku`
--

INSERT INTO `t_detailbuku` (`f_id`, `f_idbuku`, `f_status`) VALUES
(1, 2, 'Tersedia'),
(2, 2, 'Tersedia'),
(3, 2, 'Tersedia'),
(4, 2, 'Tersedia'),
(5, 2, 'Tersedia'),
(6, 2, 'Tersedia'),
(7, 3, 'Tersedia'),
(8, 3, 'Tersedia'),
(9, 3, 'Tersedia'),
(10, 3, 'Tersedia'),
(11, 3, 'Tersedia'),
(14, 4, 'Tersedia'),
(15, 4, 'Tersedia'),
(16, 4, 'Tersedia'),
(17, 4, 'Tersedia'),
(18, 4, 'Tersedia'),
(19, 4, 'Tersedia'),
(20, 4, 'Tersedia'),
(21, 4, 'Tersedia'),
(22, 4, 'Tersedia'),
(23, 4, 'Tersedia'),
(24, 4, 'Tersedia'),
(37, 8, 'Tersedia'),
(38, 8, 'Tersedia'),
(39, 8, 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_detailpeminjaman`
--

CREATE TABLE `t_detailpeminjaman` (
  `f_id` int(11) NOT NULL,
  `f_idpeminjaman` int(11) NOT NULL,
  `f_iddetailbuku` int(11) NOT NULL,
  `f_tanggalkembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kategori`
--

CREATE TABLE `t_kategori` (
  `f_id` int(11) NOT NULL,
  `f_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_kategori`
--

INSERT INTO `t_kategori` (`f_id`, `f_kategori`) VALUES
(2, 'Fiksi'),
(4, 'Non Fiksi'),
(5, 'HAHA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_peminjaman`
--

CREATE TABLE `t_peminjaman` (
  `f_id` int(11) NOT NULL,
  `f_idadmin` int(11) NOT NULL,
  `f_idanggota` int(11) NOT NULL,
  `f_tanggalpeminjaman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`f_id`);

--
-- Indeks untuk tabel `t_anggota`
--
ALTER TABLE `t_anggota`
  ADD PRIMARY KEY (`f_id`);

--
-- Indeks untuk tabel `t_buku`
--
ALTER TABLE `t_buku`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `t_buku_ibfk_1` (`f_idkategori`);

--
-- Indeks untuk tabel `t_detailbuku`
--
ALTER TABLE `t_detailbuku`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `t_detailbuku_ibfk_1` (`f_idbuku`);

--
-- Indeks untuk tabel `t_detailpeminjaman`
--
ALTER TABLE `t_detailpeminjaman`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `t_detailpeminjaman_ibfk_1` (`f_idpeminjaman`),
  ADD KEY `t_detailpeminjaman_ibfk_2` (`f_iddetailbuku`);

--
-- Indeks untuk tabel `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`f_id`);

--
-- Indeks untuk tabel `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `t_peminjaman_ibfk_3` (`f_idadmin`),
  ADD KEY `t_peminjaman_ibfk_4` (`f_idanggota`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `t_anggota`
--
ALTER TABLE `t_anggota`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_buku`
--
ALTER TABLE `t_buku`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `t_detailbuku`
--
ALTER TABLE `t_detailbuku`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `t_detailpeminjaman`
--
ALTER TABLE `t_detailpeminjaman`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_buku`
--
ALTER TABLE `t_buku`
  ADD CONSTRAINT `t_buku_ibfk_1` FOREIGN KEY (`f_idkategori`) REFERENCES `t_kategori` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_detailbuku`
--
ALTER TABLE `t_detailbuku`
  ADD CONSTRAINT `t_detailbuku_ibfk_1` FOREIGN KEY (`f_idbuku`) REFERENCES `t_buku` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_detailpeminjaman`
--
ALTER TABLE `t_detailpeminjaman`
  ADD CONSTRAINT `t_detailpeminjaman_ibfk_1` FOREIGN KEY (`f_idpeminjaman`) REFERENCES `t_peminjaman` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_detailpeminjaman_ibfk_2` FOREIGN KEY (`f_iddetailbuku`) REFERENCES `t_detailbuku` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD CONSTRAINT `t_peminjaman_ibfk_3` FOREIGN KEY (`f_idadmin`) REFERENCES `t_admin` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_peminjaman_ibfk_4` FOREIGN KEY (`f_idanggota`) REFERENCES `t_anggota` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
