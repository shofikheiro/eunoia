-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Des 2022 pada 03.38
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eunoia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'eunoia', '37c08592d50a29e9f3ae4e3ac967a2df');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tgl_isi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `info`
--

INSERT INTO `info` (`id`, `judul`, `isi`, `tgl_isi`) VALUES
(1, 'Eunoia', '<p>\r\nSmart Energy Company<br>\r\nJl. Rawamangun Muka, RT.11/RW.14,<br>\r\nRawamangun, Pulo Gadung, Kota Jakarta Timur,<br>\r\nDaerah Khusus Ibukota Jakarta 13220<br>\r\n</p>', '2022-12-23 02:37:25'),
(2, 'Contact\r\n', '<strong>Phone:</strong> (021) 4898486<br>\r\n                            <strong>Email:</strong> eunoia_jkt@gmail.com<br>', '2022-12-23 02:38:39'),
(3, 'Our Social Networks', '<p><b>Instagram: </b>Eunoia.jkt</p>\r\n<p><b>Youtube: </b>Eunoia.jkt</p>\r\n<p><b>LinkedIn: </b>Eunoia.jkt</p>\r\n', '2022-12-23 02:41:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `message`
--

CREATE TABLE `message` (
  `id` int(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` varchar(10) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `details` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `message`
--

INSERT INTO `message` (`id`, `nama_lengkap`, `email`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jk`, `no_telepon`, `details`) VALUES
(15, 'Ananda Shadrina', 'ananda.shadrina04@gmail.com', 'Jl. Buaran III, Duren Sawit, Jakarta Timur', 'Jakarta', '2003-04-08', 'Perempuan ', '085161159306', 'interdum velit euismod in pellentesque massa placerat duis ultricies lacus sed turpis tincidunt id aliquet risus feugiat in ante metus dictum at tempor commodo ullamcorper a lacus vestibulum sed arcu non odio euismod lacinia at quis risus sed vulputate odio ut enim blandit volutpat maecenas volutpat'),
(16, 'Marsyanda Razita', 'marsyandarz@gmail.com', 'Jl. Bungur Besar V No. 4', 'Jakarta', '2003-05-05', 'Perempuan ', '087888056110', 'Test Messages');

-- --------------------------------------------------------

--
-- Struktur dari tabel `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tgl_isi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `partners`
--

INSERT INTO `partners` (`id`, `nama`, `foto`, `isi`, `tgl_isi`) VALUES
(1, 'Universitas Negeri Jakarta', 'UNJ.png', '<p>Universitas Negeri Jakarta<br></p>', '2021-04-04 00:37:32'),
(2, 'BEMFT', 'BEMFT.png', '<p>BEM Fakultas Teknik</p>', '2021-04-04 00:37:56'),
(3, 'BEMP STI', 'BEMPSTI.png', '<p>BEM Prodi Sistem dan Teknologi Informasi</p>', '2021-04-04 00:38:09'),
(4, 'STI 21', 'partners_1671895854_logo STI 21.png', '<p>STI 21</p>', '2022-12-24 15:30:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
