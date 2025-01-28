-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jan 2025 pada 20.02
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imigrasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengungsi`
--

CREATE TABLE `pengungsi` (
  `id_pengungsi` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kewarganegaraan` varchar(255) NOT NULL,
  `masa_berlaku_kartu` date NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengungsi`
--

INSERT INTO `pengungsi` (`id_pengungsi`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `kewarganegaraan`, `masa_berlaku_kartu`, `alamat`, `no_tlp`, `foto`) VALUES
(10328532, 'Alexander', 'Laki-laki', 'California', '1999-12-03', 'United States', '2002-12-12', 'Jalan Kemanggisan, Depok Jawa Barat.', '1111111111', 'pic.png'),
(10356245, 'Mia Hovert', 'Perempuan', 'California', '1999-12-12', 'United States', '2002-12-12', 'Jalan Kemanggisan, Depok Jawa Barat.', '222222222', 'pic2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pengungsi`
--
ALTER TABLE `pengungsi`
  ADD PRIMARY KEY (`id_pengungsi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengungsi`
--
ALTER TABLE `pengungsi`
  MODIFY `id_pengungsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10356246;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
