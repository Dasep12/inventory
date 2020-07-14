-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2020 pada 13.42
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
-- Database: `barang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `id_nik` int(11) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `role_id` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `id_nik`, `pass`, `role_id`) VALUES
(3, 3030, '123', 2),
(4, 2015, '123', 1),
(5, 2012, '123', 2);

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
  `kembali` int(20) DEFAULT NULL,
  `id_costumer` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`id`, `id_transaksi`, `no_transaksi`, `tanggal`, `pembayaran`, `kembali`, `id_costumer`) VALUES
(40, 'INV-064613', 'INV-064613', '2020-07-13', 250000, 30000, NULL),
(41, 'INV-062925', 'INV-062925', '2020-07-14', 500000, 50000, NULL);

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
  `nilai` int(20) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `nik` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lajur_stock`
--

INSERT INTO `lajur_stock` (`id`, `no_transaksi`, `nama_barang`, `kode_barang`, `barang_masuk`, `barang_keluar`, `label`, `tanggal`, `supplier`, `kode_supplier`, `nilai`, `user`, `nik`) VALUES
(15066, 'INV-064105', 'Gearbox', 2089, 20, 0, 'masuk', '2020-07-13', 'Indofood', '34AO', 2800000, 'Dasep', '2015'),
(15067, 'INV-064217', 'Ban Dalam', 2090, 20, 0, 'masuk', '2020-07-13', 'PT Autotech Jaya', 'FH11', 640000, 'Dasep', '2015'),
(15068, 'INV-064240', 'Velg', 1990, 5, 0, 'masuk', '2020-07-13', 'PT Prima Adiwijaya', 'DF80', 1150000, 'Dasep', '2015'),
(15069, 'INV-064304', 'Helm', 2566, 5, 0, 'masuk', '2020-07-13', 'PT Autotech Jaya', 'FH11', 2500000, 'Dasep', '2015'),
(15070, 'INV-064613', 'Gearbox', 2089, 0, 1, 'keluar', '2020-07-13', 'Dasep', NULL, 150000, 'Sinta', '3030'),
(15071, 'INV-064613', 'Ban Dalam', 2090, 0, 2, 'keluar', '2020-07-13', 'Dasep', NULL, 70000, 'Sinta', '3030'),
(15072, 'INV-062925', 'Gearbox', 2089, 0, 3, 'keluar', '2020-07-14', 'Eka', NULL, 450000, 'Dasep', '2015');

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
(7, 'Indofood', 'IND0'),
(8, 'PT Inticakra', 'PICK');

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
(1, '2089', 'Gearbox', '150000', 'Barang Baru', 'DF80', 'PCS', 'Indofood'),
(2, '2090', 'Ban Dalam', '35000', '', '34AO', 'PCS', 'Sinar Mentari'),
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
  `no_telp` varchar(15) DEFAULT NULL,
  `kode_barang` varchar(100) DEFAULT NULL,
  `harga_satuan` int(12) DEFAULT NULL,
  `harga_bayar` varchar(100) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `nik` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `no_transaksi`, `qty`, `nama_pelanggan`, `no_telp`, `kode_barang`, `harga_satuan`, `harga_bayar`, `nama_barang`, `user`, `nik`) VALUES
(51, 'INV-064613', 1, 'Dasep', NULL, '2089', 150000, '150000', 'Gearbox', 'Sinta', '3030'),
(52, 'INV-064613', 2, 'Dasep', NULL, '2090', 35000, '70000', 'Ban Dalam', 'Sinta', '3030'),
(53, 'INV-062925', 3, 'Eka', NULL, '2089', 150000, '450000', 'Gearbox', 'Dasep', '2015');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nik` int(10) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nik`, `nama`) VALUES
(7, 3030, 'Sinta'),
(8, 2015, 'Dasep'),
(9, 2012, 'EDI WIBOWO');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `lajur_stock`
--
ALTER TABLE `lajur_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15073;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
