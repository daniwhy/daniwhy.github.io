-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2021 pada 17.27
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datacuaca`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data1`
--

CREATE TABLE `data1` (
  `id_aws` varchar(30) NOT NULL DEFAULT 'PPNS-1',
  `Latitude` varchar(30) NOT NULL DEFAULT '-7.27290841905742',
  `Longitude` varchar(30) NOT NULL DEFAULT '112.78687834739686',
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `hujan` varchar(30) NOT NULL,
  `suhu` varchar(30) NOT NULL,
  `kelembaban` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data1`
--

INSERT INTO `data1` (`id_aws`, `Latitude`, `Longitude`, `time`, `hujan`, `suhu`, `kelembaban`) VALUES
('PPNS-1', '-7.27290841905742', '112.78687834739686', '2021-06-17 12:00:19', '1.3', '27.5', '83'),
('PPNS-1', '-7.27290841905742', '112.78687834739686', '2021-06-17 13:08:14', '0', '30', '60'),
('PPNS-1', '-7.27290841905742', '112.78687834739686', '2021-06-17 13:54:22', '10', '25', '88'),
('PPNS-1', '-7.27290841905742', '112.78687834739686', '2021-06-25 09:02:21', '0', '30', '60'),
('PPNS-1', '-7.27290841905742', '112.78687834739686', '2021-06-25 09:03:20', '10', '25', '89'),
('PPNS-1', '-7.27290841905742', '112.78687834739686', '2021-06-25 09:54:35', '7', '30', '70'),
('PPNS-1', '-7.27290841905742', '112.78687834739686', '2021-06-25 10:33:51', '25', '21', '90'),
('PPNS-1', '-7.27290841905742', '112.78687834739686', '2021-07-08 08:53:04', '25', '21', '90'),
('PPNS-1', '-7.27290841905742', '112.78687834739686', '2021-07-11 08:42:08', '0', '30', '60'),
('PPNS-1', '-7.27290841905742', '112.78687834739686', '2021-07-11 09:20:08', '21', '20', '99'),
('PPNS-1', '-7.27290841905742', '112.78687834739686', '2021-07-12 13:13:06', '0', '31', '70'),
('PPNS-1', '-7.27290841905742', '112.78687834739686', '2021-07-12 15:06:45', '21', '20', '89');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data2`
--

CREATE TABLE `data2` (
  `id_aws` varchar(30) NOT NULL DEFAULT 'GSI-1 ',
  `Latitude` varchar(30) NOT NULL DEFAULT '-7.318881730366743',
  `Longitude` varchar(30) NOT NULL DEFAULT '112.70312637090684',
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `hujan` varchar(30) NOT NULL,
  `suhu` varchar(30) NOT NULL,
  `kelembaban` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data2`
--

INSERT INTO `data2` (`id_aws`, `Latitude`, `Longitude`, `time`, `hujan`, `suhu`, `kelembaban`) VALUES
('GSI-1 ', '-7.318881730366743', '112.70312637090684', '2021-06-17 14:44:24', '10', '29', '80'),
('GSI-1 ', '-7.318881730366743', '112.70312637090684', '2021-06-25 09:17:46', '0', '30', '60');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data3`
--

CREATE TABLE `data3` (
  `id_aws` varchar(30) NOT NULL DEFAULT 'WN-1',
  `Latitude` varchar(30) NOT NULL DEFAULT '-7.262691487236968',
  `Longitude` varchar(30) NOT NULL DEFAULT '112.74155974388124',
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `hujan` varchar(30) NOT NULL,
  `suhu` varchar(30) NOT NULL,
  `kelembaban` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data3`
--

INSERT INTO `data3` (`id_aws`, `Latitude`, `Longitude`, `time`, `hujan`, `suhu`, `kelembaban`) VALUES
('WN-1', '-7.262691487236968', '112.74155974388124', '0000-00-00 00:00:00', '29', '33', '12'),
('WN-1', '-7.262691487236968', '112.74155974388124', '0000-00-00 00:00:00', '22', '33', '44'),
('WN-1', '-7.262691487236968', '112.74155974388124', '2021-06-25 10:11:03', '10', '22', '88');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasiaws`
--

CREATE TABLE `lokasiaws` (
  `id_aws` varchar(30) NOT NULL,
  `Latitude` varchar(30) NOT NULL,
  `Longitude` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lokasiaws`
--

INSERT INTO `lokasiaws` (`id_aws`, `Latitude`, `Longitude`) VALUES
('GSI-1', '-7.318881730366743', '112.70312637090684'),
('PPNS-1', '-7.27290841905742', '112.78687834739686'),
('WN-1', '-7.262691487236968', '112.74155974388124');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nm_pengguna` varchar(20) NOT NULL,
  `kt_sandi` varchar(150) NOT NULL,
  `level` enum('Admin','User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nm_pengguna`, `kt_sandi`, `level`) VALUES
(1, 'admin', '$2y$10$oNX.X8jgLhNclHBeI8ytT.1vODlml8.AN1Ieb.rSIChhCa1e7cS0S', 'Admin'),
(2, 'user', '$2y$10$oNX.X8jgLhNclHBeI8ytT.1vODlml8.AN1Ieb.rSIChhCa1e7cS0S', 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perintah`
--

CREATE TABLE `perintah` (
  `id_perintah` int(11) NOT NULL,
  `data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perintah`
--

INSERT INTO `perintah` (`id_perintah`, `data`) VALUES
(1, 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data1`
--
ALTER TABLE `data1`
  ADD KEY `id_aws` (`id_aws`) USING BTREE,
  ADD KEY `Latitude` (`Latitude`) USING BTREE,
  ADD KEY `Longitude` (`Longitude`) USING BTREE;

--
-- Indeks untuk tabel `data2`
--
ALTER TABLE `data2`
  ADD KEY `id_aws` (`id_aws`) USING BTREE,
  ADD KEY `Latitude` (`Latitude`) USING BTREE,
  ADD KEY `Longitude` (`Longitude`) USING BTREE;

--
-- Indeks untuk tabel `data3`
--
ALTER TABLE `data3`
  ADD KEY `id_aws` (`id_aws`) USING BTREE,
  ADD KEY `Latitude` (`Latitude`) USING BTREE,
  ADD KEY `Longitude` (`Longitude`) USING BTREE;

--
-- Indeks untuk tabel `lokasiaws`
--
ALTER TABLE `lokasiaws`
  ADD PRIMARY KEY (`id_aws`),
  ADD KEY `Latitude` (`Latitude`) USING BTREE,
  ADD KEY `Longitude` (`Longitude`) USING BTREE;

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `perintah`
--
ALTER TABLE `perintah`
  ADD PRIMARY KEY (`id_perintah`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `perintah`
--
ALTER TABLE `perintah`
  MODIFY `id_perintah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
