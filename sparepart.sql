-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2020 pada 06.47
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparepart`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(100) DEFAULT NULL,
  `no_transaksi` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `pembayaran` int(20) DEFAULT NULL,
  `kembali` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`id`, `id_transaksi`, `no_transaksi`, `tanggal`, `pembayaran`, `kembali`) VALUES
(20, 'INV-073110', 'INV-073110', '2020-06-22', 200000, 50000),
(21, 'INV-073749', 'INV-073749', '2020-06-22', 300000, 0),
(22, 'INV-074129', 'INV-074129', '2020-06-22', 110000, 5000),
(23, 'INV-081535', 'INV-081535', '2020-06-22', 300000, 0),
(24, 'INV-023641', 'INV-023641', '2020-06-29', 50000, 15000),
(25, 'INV-041231', 'INV-041231', '2020-06-29', 600000, 0),
(26, 'INV-045754', 'INV-045754', '2020-06-29', 300000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lajur_stock`
--

CREATE TABLE `lajur_stock` (
  `id` int(11) NOT NULL,
  `no_transaksi` varchar(150) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `kode_barang` int(4) DEFAULT NULL,
  `barang_masuk` int(9) DEFAULT NULL,
  `barang_keluar` int(9) DEFAULT NULL,
  `label` varchar(60) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `kode_supplier` varchar(255) DEFAULT NULL,
  `nilai` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lajur_stock`
--

INSERT INTO `lajur_stock` (`id`, `no_transaksi`, `nama_barang`, `kode_barang`, `barang_masuk`, `barang_keluar`, `label`, `tanggal`, `supplier`, `kode_supplier`, `nilai`) VALUES
(15024, 'INV-072134', 'Gearbox', 2089, 5, 0, 'masuk', '2020-06-22', 'Indofood', '34AO', 600000),
(15025, 'INV-073110', 'Gearbox', 2089, 0, 1, 'keluar', '2020-06-22', 'Dasep', NULL, 150000),
(15026, 'INV-073749', 'Gearbox', 2089, 0, 2, 'keluar', '2020-06-22', 'Dasep', NULL, 150000),
(15028, 'INV-074059', 'Ban Dalam', 2090, 25, 0, 'masuk', '2020-06-22', 'PT Autotech Jaya', 'FH11', 850000),
(15029, 'INV-074129', 'Ban Dalam', 2090, 0, 3, 'keluar', '2020-06-22', 'Eka', NULL, 35000),
(15030, 'INV-081535', 'Gearbox', 2089, 0, 2, 'keluar', '2020-06-22', 'Dasep', NULL, 150000),
(15031, 'INV-023641', 'Ban Dalam', 2090, 0, 1, 'keluar', '2020-06-29', 'Dasep', NULL, 35000),
(15032, 'INV-031704', 'Gearbox', 2089, 25, 0, 'masuk', '2020-06-29', 'Indofood', '34AO', 2250000),
(15033, 'INV-041201', 'Velg', 1990, 7, 0, 'masuk', '2020-06-29', 'PT Prima Adiwijaya', 'DF80', 1750000),
(15034, 'INV-041228', 'Helm', 2566, 2, 0, 'masuk', '2020-06-29', 'PT Autotech Jaya', 'FH11', 1200000),
(15035, 'INV-041231', 'Helm', 2566, 0, 1, 'keluar', '2020-06-29', 'Dasep', NULL, 600000),
(15036, 'INV-045754', 'Gearbox', 2089, 0, 2, 'keluar', '2020-06-29', 'Eka', NULL, 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(150) DEFAULT NULL,
  `kode_supplier` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supplier`, `kode_supplier`) VALUES
(1, 'PT Autotech Jaya', 'FH11'),
(2, 'PT Prima Wijaya Kusuma', '1A4W'),
(3, 'Sinar Mentari', '34AO'),
(6, 'PT Prima Adiwijaya', 'DF80'),
(7, 'Indofood', 'IND0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(12) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `harga_satuan` varchar(9) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `kode_supplier` varchar(40) DEFAULT NULL,
  `satuan` varchar(60) DEFAULT NULL,
  `nama_supplier` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `kode_barang`, `nama_barang`, `harga_satuan`, `deskripsi`, `kode_supplier`, `satuan`, `nama_supplier`) VALUES
(1, '2089', 'Gearbox', '150000', '', '34AO', 'PCS', 'Indofood'),
(2, '2090', 'Ban Dalam', '35000', '', 'FH11', 'PCS', 'PT Autotech Jaya'),
(3, '1990', 'Velg', '250000', '', 'DF80', 'PCS', 'PT Prima Adiwijaya'),
(4, '2566', 'Helm', '600000', '', 'FH11', 'PCS', 'PT Autotech Jaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `no_transaksi` varchar(100) DEFAULT NULL,
  `qty` int(9) DEFAULT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `kode_barang` varchar(100) DEFAULT NULL,
  `harga_satuan` int(12) DEFAULT NULL,
  `harga_bayar` varchar(100) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `no_transaksi`, `qty`, `nama_pelanggan`, `kode_barang`, `harga_satuan`, `harga_bayar`, `nama_barang`) VALUES
(28, 'INV-073110', 1, 'Dasep', '2089', 150000, '150000', 'Gearbox'),
(29, 'INV-073749', 2, 'Dasep', '2089', 150000, '300000', 'Gearbox'),
(30, 'INV-074129', 3, 'Eka', '2090', 35000, '105000', 'Ban Dalam'),
(31, 'INV-081535', 2, 'Dasep', '2089', 150000, '300000', 'Gearbox'),
(32, 'INV-023641', 1, 'Dasep', '2090', 35000, '35000', 'Ban Dalam'),
(33, 'INV-041231', 1, 'Dasep', '2566', 600000, '600000', 'Helm'),
(34, 'INV-045754', 2, 'Eka', '2089', 150000, '300000', 'Gearbox');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lajur_stock`
--
ALTER TABLE `lajur_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `lajur_stock`
--
ALTER TABLE `lajur_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15037;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
