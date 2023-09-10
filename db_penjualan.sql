-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jul 2022 pada 14.56
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `kd_barang` varchar(5) NOT NULL,
  `nm_barang` varchar(20) NOT NULL,
  `stok` int(10) NOT NULL,
  `harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`kd_barang`, `nm_barang`, `stok`, `harga`) VALUES
('B-001', 'Printer', 23, 8500000),
('B-002', 'Scanner Fujitsu', 8, 4000000),
('B-003', 'Televisi Samsung', 13, 8000000),
('B-004', 'Realme 5i', 4, 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(1) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `owner` varchar(30) DEFAULT NULL,
  `desc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `nama`, `alamat`, `telp`, `email`, `website`, `owner`, `desc`) VALUES
(1, 'CV. Rizki Teknik', 'DKI JAKARTA,karang tengah', '08776678899', 'Rizkikiki15@gmail.com', 'http://instagram/rizki13/', 'Muhamad Rizki Pratama', 'Supplier Barang Elektronik ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `kd_pegawai` varchar(5) NOT NULL DEFAULT '0',
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `level` enum('pegawai','admin') DEFAULT 'pegawai'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`kd_pegawai`, `username`, `password`, `nama`, `level`) VALUES
('K-001', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Rizki Pratama', 'admin'),
('K-002', 'Rizkip', '9592638716b04b52fe6e041429822a79', 'Rizki Pratama', 'pegawai'),
('K-003', 'wahyu123', '8cbbdc3fff847eee79abadc7b693b60e', 'Wahyu Iskandar', 'pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `kd_pelanggan` varchar(5) NOT NULL,
  `nm_pelanggan` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`kd_pelanggan`, `nm_pelanggan`, `alamat`, `email`) VALUES
('P-001', 'RS. Sardjito', 'Kompleks UGM', 'mail@sardjito.com'),
('P-002', 'Hotel Ibis', 'Malioboro', 'mail@ibis-hotel.com'),
('P-003', 'Wahyu', 'Jl karang tengah taman sari 2 ', 'fahrinizar0@gmail.com'),
('P-004', 'Tekko Ajaib', 'Karang Tengah', 'Tekkoajaib@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan_detail`
--

CREATE TABLE `tbl_penjualan_detail` (
  `kd_penjualan` varchar(5) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penjualan_detail`
--

INSERT INTO `tbl_penjualan_detail` (`kd_penjualan`, `kd_barang`, `qty`) VALUES
('O-001', 'B-001', 2),
('O-001', 'B-003', 2),
('O-001', 'B-004', 1),
('O-002', 'B-002', 2),
('O-003', 'B-004', 5),
('O-004', 'B-002', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan_header`
--

CREATE TABLE `tbl_penjualan_header` (
  `kd_penjualan` varchar(5) NOT NULL,
  `kd_pelanggan` varchar(10) NOT NULL,
  `total_harga` int(20) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `kd_pegawai` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penjualan_header`
--

INSERT INTO `tbl_penjualan_header` (`kd_penjualan`, `kd_pelanggan`, `total_harga`, `tanggal_penjualan`, `kd_pegawai`) VALUES
('O-001', 'P-003', 35000000, '2022-06-22', 'K-002'),
('O-002', 'P-004', 8000000, '2022-06-22', 'K-002'),
('O-003', 'P-001', 10000000, '2022-06-23', 'K-001'),
('O-004', 'P-003', 20000000, '2022-07-07', 'K-001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_promo`
--

CREATE TABLE `tbl_promo` (
  `kd_promo` varchar(30) NOT NULL,
  `nama_promo` varchar(100) NOT NULL,
  `give_promo` varchar(100) NOT NULL,
  `pertanggal` varchar(100) NOT NULL,
  `Target_value` varchar(100) NOT NULL,
  `file_promo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_promo`
--

INSERT INTO `tbl_promo` (`kd_promo`, `nama_promo`, `give_promo`, `pertanggal`, `Target_value`, `file_promo`) VALUES
('PRM-003', 'Lebaran', 'Habiskan Stock yaa guys!!!', '1 Juni - 1 Agustus 2021', '10.000.000', 'images (1).jpeg'),
('PRM-004', 'Libur Panjang', 'Stock tahun 2021 habiskan terlebih dahulu', '1 September - 1 Oktober 2022', '11.500.000', 'Folder_Pilem.png'),
('PRM-005', 'Untung Sale', 'Habiskan Stock yaa guys!!!', '1 Agustus 2022', '10.000.000', 'folder-icon-psd.zip'),
('PRM-006', 'Libur Panjang', 'borong borong', '1 Juni - 1 Agustus 2021', '10.000.000', 'uhamkaaa.jpg'),
('PRM-007', 'Untung Sale', 'Habiskan Stock yaa guys!!!', '1 Agustus 2022', '3.000.000', 'Step 1.jpg'),
('PRM-008', 'Lebaran', 'Stock tahun 2021 habiskan terlebih dahulu', '1 September - 1 Oktober 2022', '3.000.000', 'Use Case Document Scanner Application.pdf'),
('PRM-009', 'Untung Sale', 'borong borong', '1 Juni - 1 Agustus 2022', '15.000.000', 'Step 3.jpg'),
('PRM-010', 'ramadhan sale', 'Stock tahun 2021 habiskan terlebih dahulu', '1 Juni - 1 Agustus 2021', '11.500.000', 'Use Case Document Scanner Application.pdf'),
('PRM-011', 'Untung Sale', 'Habiskan Stock yaa guys!!!', '1 Juni - 1 Agustus 2021', '10.000.000', 'Prototype Interface Document Scanner Application.pdf'),
('PRM-012', 'Coba1', 'Stock tahun 2021 habiskan terlebih dahulu', '1 September - 1 Oktober 2022', '10.000.000', 'UTS_Simulasi&Pemodelan7E_Rizki(1803015229).pdf'),
('PRM-013', 'Cuci Gudang', 'Habiskan Stock!!!', '1 Juni 2022 - 1 Agustus 2022', '60.000.000,00', 'Laporan Harian 7 Juni 2022.pdf'),
('PRM-014', 'Cuci Gudang', 'Habiskan Stock!!!', '1 Juni 2022 - 1 Agustus 2022', '60.000.000,00', 'Laporan Harian 8 Juni 2022.pdf');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indeks untuk tabel `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`kd_pegawai`);

--
-- Indeks untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`kd_pelanggan`);

--
-- Indeks untuk tabel `tbl_penjualan_header`
--
ALTER TABLE `tbl_penjualan_header`
  ADD PRIMARY KEY (`kd_penjualan`);

--
-- Indeks untuk tabel `tbl_promo`
--
ALTER TABLE `tbl_promo`
  ADD PRIMARY KEY (`kd_promo`(20));

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
