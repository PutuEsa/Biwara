-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Des 2019 pada 12.15
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biwara`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(5, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi` (
  `id_donasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `alat_pembayaran` varchar(255) NOT NULL,
  `status` enum('Menunggu Pembayaran','Donasi Sukses') NOT NULL,
  `foto_bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `donasi`
--

INSERT INTO `donasi` (`id_donasi`, `id_user`, `tanggal`, `id_laporan`, `nominal`, `alat_pembayaran`, `status`, `foto_bukti`) VALUES
(7, 2, '2019-12-12', 1, 150000, 'BNI', '', 'bukti-transfer-beli-alat-sostel.jpg'),
(9, 2, '2019-12-12', 9, 150000, 'BNI', '', '5.jpg'),
(11, 1, '2019-12-13', 10, 25000, 'BRI', 'Donasi Sukses', '3.jpg'),
(12, 3, '2019-12-13', 3, 13500, 'BCA', '', '6.jpg'),
(13, 3, '2019-12-13', 1, 20500, 'BRI', 'Menunggu Pembayaran', ''),
(14, 1, '2019-12-13', 2, 45000, 'BNI', 'Menunggu Pembayaran', ''),
(18, 1, '2019-12-13', 15, 13500, 'BCA', 'Menunggu Pembayaran', ''),
(19, 1, '2019-12-13', 16, 20000, 'BCA', 'Donasi Sukses', '2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(8) NOT NULL,
  `bencana` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` blob NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `bencana`, `lokasi`, `deskripsi`, `gambar`, `tanggal`) VALUES
(1, 'Banjir', 'Malang', 'Banjir bandang', 0x32312d35362d30312d62616e6a69722d646f6d70752e6a7067, '2019-12-05'),
(2, 'Tsunami', 'Aceh', 'Tsunami setinggi 3 meter', 0x67656d70612d746f686f6b752d64692d6a6570616e672d79616e672d6d656e67616b696261746b616e2d67656c6f6d62616e672d7473756e616d692d5f3135313132363130323735312d3130342e6a7067, '2019-12-05'),
(3, 'Kebakaran', 'Riau', 'Kebakaran hutan', 0x62672d6c6f67696e2e6a706567, '2019-12-04'),
(9, 'Gunung Meletus', 'Bali', 'Gunung Agung meletus', 0x47756e756e672d4167756e672d4d656c657475732e6a7067, '2019-12-06'),
(10, 'Gempa', 'Solo', 'Gempa tektonik', 0x3039323535353230305f313533323835313331322d32303138303732392d44616d70616b2d47656d70612d42756d692d64692d4c6f6d626f6b2d41502d322e6a7067, '2019-12-10'),
(12, 'Kekeringan', 'NTB', 'Kekeringan lahan akibat musim kemarau', 0x4b656b6572696e67616e2e6a7067, '2019-12-10'),
(14, 'Badai', 'Malang', 'Badai', 0x322e6a7067, '2019-12-24'),
(15, 'Tanah longsor', 'Tulungagung', 'Tanah longsor', 0x312e6a7067, '2019-12-26'),
(16, 'Puting beliung', 'Blitar', 'Puting beliung', 0x3039323535353230305f313533323835313331322d32303138303732392d44616d70616b2d47656d70612d42756d692d64692d4c6f6d626f6b2d41502d322e6a7067, '2019-12-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `id_donasi` int(11) NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_laporan`, `id_donasi`, `total`) VALUES
(1, 1, 3, '1000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `password`) VALUES
(1, 'Alfian', 'alfian@gmail.com', 'alfian'),
(2, 'Rizky', 'rizky@gmail.com', 'rizky'),
(3, 'Punjung', 'punjung@gmail.com', 'punjung');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id_donasi`),
  ADD KEY `id_laporan` (`id_laporan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_laporan` (`id_laporan`),
  ADD KEY `id_donasi` (`id_donasi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD CONSTRAINT `donasi_ibfk_1` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `donasi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
