-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2020 pada 02.21
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_harga`
--

CREATE TABLE `riwayat_harga` (
  `id` int(11) NOT NULL,
  `harga` int(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `riwayat_harga`
--

INSERT INTO `riwayat_harga` (`id`, `harga`, `waktu`) VALUES
(1, 953000, '2020-12-08 12:28:11'),
(2, 966000, '2020-12-08 12:55:33'),
(3, 968000, '2020-12-09 00:54:03'),
(4, 966000, '2020-12-09 00:57:25'),
(5, 953000, '2020-12-09 01:01:19'),
(6, 968000, '2020-12-09 01:01:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_login`
--

CREATE TABLE `riwayat_login` (
  `id` int(10) NOT NULL,
  `id_user` int(6) NOT NULL,
  `ua` varchar(255) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `riwayat_login`
--

INSERT INTO `riwayat_login` (`id`, `id_user`, `ua`, `ip`, `time`) VALUES
(1, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36	', '::1', '2020-12-07 08:23:37'),
(2, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36	', '::1', '2020-12-07 08:36:29'),
(3, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36	', '::1', '2020-12-07 08:38:16'),
(4, 6, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36	', '::1', '2020-12-08 11:21:45'),
(5, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36	', '::1', '2020-12-08 11:33:41'),
(6, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36	', '::1', '2020-12-08 12:44:45'),
(7, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36	', '::1', '2020-12-08 15:09:22'),
(8, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36	', '::1', '2020-12-08 15:37:23'),
(9, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36	', '::1', '2020-12-08 18:52:41'),
(10, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '::1', '2020-12-08 18:53:26'),
(11, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', '::1', '2020-12-08 18:54:41'),
(12, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '::1', '2020-12-08 22:46:56'),
(13, 4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '::1', '2020-12-08 22:54:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(6) NOT NULL,
  `id_user` int(6) NOT NULL,
  `tipe` varchar(30) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `tipe`, `deskripsi`, `jumlah`, `time`) VALUES
(1, 1, 'Deposit', 'via BCA VA', 10000000, '2020-12-08 12:05:38'),
(2, 1, 'Deposit', 'via BCA VA', 100000, '2020-12-08 12:07:13'),
(3, 1, 'Deposit', 'via BCA VA', 10000, '2020-12-08 23:08:13'),
(4, 1, 'Deposit', 'via BCA TRF', 250000, '2020-12-08 23:44:38'),
(5, 1, 'Withdraw (Rupiah)', 'ke BCA 7135260801', 9000000, '2020-12-08 23:46:25'),
(46, 1, 'Deposit', 'via BCA VA', 560000, '2020-12-09 00:09:55'),
(47, 1, 'Deposit', 'via BCA TRF', 90000, '2020-12-09 00:11:27'),
(48, 1, 'Withdraw (Fisik)', 'Penerima:  Lokasi: bpp', 1932000, '2020-12-09 00:21:23'),
(49, 1, 'Deposit', 'via BCA VA', 3400000, '2020-12-09 00:22:11'),
(50, 1, 'Withdraw (Fisik)', 'Penerima: Fariz Rifqi Lokasi: ach', 966000, '2020-12-09 00:25:30'),
(51, 1, 'Withdraw (Fisik)', 'Penerima: Fariz Rifqi Lokasi: ach', 966000, '2020-12-09 00:26:06'),
(52, 1, 'Withdraw (Fisik)', 'Penerima: Fariz Rifqi Lokasi: ach', 966000, '2020-12-09 00:25:43'),
(53, 1, 'Deposit', 'via BCA VA', 200000, '2020-12-09 01:20:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_depan` varchar(30) NOT NULL,
  `nama_belakang` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `aset` int(20) NOT NULL,
  `register_date` date NOT NULL,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `nama_depan`, `nama_belakang`, `no_hp`, `tanggal_lahir`, `alamat`, `aset`, `register_date`, `last_login`) VALUES
(1, 'farizrifqi26@gmail.com', 'OTBUVVpwblV0cEZlSnBYVA==', 'Fariz', 'Rifqi', 'Fariz', '2020-11-07', 'asdf', 781201, '2020-12-07', '2020-12-09 06:46:56'),
(2, 'refrira@gmail.com', 'PT1RUDljMllzcFZiakJuU1lsRmVKcFhU', 'Refri', 'Rizky', '085155094006', '2020-11-07', 'asdf', 0, '2020-12-07', '2020-12-07 15:38:06'),
(3, 'zeranel@gmail.com', 'PT1RUDljV1pzcEVXWlZuVkhKR2VKcFhU', 'Zere', 'Nale', '082190450269', '2020-11-07', 'Jl Kaliurang', 0, '2020-12-07', '2020-12-07 15:43:49'),
(4, 'agastian@gmail.com', 'PT1RUDlFVld1WmtNamhYUzYxRWVKcFhU', 'Agastian', 'Rizki', '085155094006', '2020-11-07', 'Jl Concat', 0, '2020-12-07', '2020-12-09 06:54:19'),
(5, 'rafiq@gmail.com', 'NGxrZU5oWFM2MUVlSnBYVA==', 'Rafiq', 'Ezza', '082142312324', '2020-11-07', 'sadfasdf', 0, '2020-12-07', '2020-12-07 15:47:30'),
(6, 'ansellma@gmail.com', 'NGxrZU5oWFM2MUVlSnBYVA==', 'Ansellma', 'Putri', '082190450269', '2020-11-08', 'Jl Kaliurang', 0, '2020-12-08', '2020-12-08 19:19:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `riwayat_harga`
--
ALTER TABLE `riwayat_harga`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat_login`
--
ALTER TABLE `riwayat_login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `riwayat_harga`
--
ALTER TABLE `riwayat_harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `riwayat_login`
--
ALTER TABLE `riwayat_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
