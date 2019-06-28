-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Apr 2019 pada 11.36
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tooling_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `h_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `t_id` int(10) NOT NULL,
  `b_id` int(10) NOT NULL,
  `t_kondisi` enum('0','1') NOT NULL,
  `h_tanggal` datetime NOT NULL,
  `h_action` enum('1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`h_id`, `u_id`, `t_id`, `b_id`, `t_kondisi`, `h_tanggal`, `h_action`) VALUES
(17, 1, 1, 1, '0', '2019-04-04 13:46:30', '2'),
(18, 1, 2, 1, '0', '2019-04-04 13:50:41', '2'),
(19, 1, 1, 1, '0', '2019-04-04 13:51:15', '4'),
(20, 1, 2, 1, '0', '2019-04-04 13:51:41', '4'),
(21, 1, 4, 1, '0', '2019-04-04 14:13:40', '4'),
(22, 1, 8, 1, '0', '2019-04-04 14:14:19', '4'),
(23, 1, 14, 1, '0', '2019-04-04 14:16:43', '4'),
(24, 1, 1, 1, '0', '2019-04-04 14:17:02', '2'),
(25, 1, 2, 1, '0', '2019-04-04 14:17:09', '2'),
(26, 1, 3, 1, '0', '2019-04-04 14:17:28', '2'),
(27, 1, 1, 1, '0', '2019-04-04 14:23:25', '4'),
(28, 1, 2, 1, '0', '2019-04-04 14:23:34', '4'),
(29, 1, 3, 1, '0', '2019-04-04 14:23:59', '4'),
(30, 1, 10, 1, '0', '2019-04-04 14:57:59', '2'),
(31, 1, 10, 1, '0', '2019-04-04 15:03:13', '4'),
(32, 1, 9, 1, '0', '2019-04-04 15:13:22', '2'),
(33, 1, 2, 1, '0', '2019-04-04 16:29:04', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toolboxes`
--

CREATE TABLE `toolboxes` (
  `b_id` int(10) NOT NULL,
  `b_nama` text NOT NULL,
  `b_background` text NOT NULL,
  `b_status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `toolboxes`
--

INSERT INTO `toolboxes` (`b_id`, `b_nama`, `b_background`, `b_status`) VALUES
(1, 'lemari 1-3', 'background1.jpg', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tools`
--

CREATE TABLE `tools` (
  `t_id` int(10) NOT NULL,
  `t_nama` text NOT NULL,
  `b_id` int(10) NOT NULL,
  `t_gambar` text NOT NULL,
  `t_status` enum('1','2','3','4') NOT NULL,
  `t_kondisi` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tools`
--

INSERT INTO `tools` (`t_id`, `t_nama`, `b_id`, `t_gambar`, `t_status`, `t_kondisi`) VALUES
(1, 'Alat 1', 1, '1-1.png', '2', '0'),
(2, 'Alat 2', 1, '1-2.png', '2', '0'),
(3, 'Alat 3', 1, '1-3.png', '4', '0'),
(4, 'Alat 4', 1, '1-4.png', '4', '0'),
(5, 'Alat 5', 1, '1-5.png', '4', '0'),
(6, 'Alat 6', 1, '1-6.png', '4', '0'),
(7, 'Alat 7', 1, '1-7.png', '4', '0'),
(8, 'Alat 8', 1, '1-8.png', '4', '0'),
(9, 'Alat 9', 1, '1-9.png', '2', '0'),
(10, 'Alat 10', 1, '1-10.png', '4', '0'),
(11, 'Alat 11', 1, '1-11.png', '4', '0'),
(12, 'Alat 12', 1, '1-12.png', '4', '0'),
(13, 'Alat 13', 1, '1-13.png', '4', '0'),
(14, 'Alat 14', 1, '1-14.png', '4', '0'),
(15, 'Alat 15', 1, '1-15.png', '4', '0'),
(16, 'Alat 16', 1, '1-16.png', '4', '0'),
(17, 'Alat 17', 1, '1-17.png', '4', '0'),
(18, 'Alat 18', 1, '1-18.png', '4', '0'),
(19, 'Alat 19', 1, '1-19.png', '4', '0'),
(20, 'Alat 20', 1, '1-20.png', '4', '0'),
(21, 'Alat 21', 1, '1-21.png', '4', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `u_id` int(10) NOT NULL,
  `u_nama` text NOT NULL,
  `u_password` text NOT NULL,
  `u_created` datetime NOT NULL,
  `u_last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`u_id`, `u_nama`, `u_password`, `u_created`, `u_last_login`) VALUES
(1, 'admin', '$2y$10$LGk/nJvxm9UZs4DzDvPrUewFwiHyvcjhcmdqMaqXTIKDxZA4Hl3WG', '2019-04-02 15:27:58', '2019-04-04 16:25:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`h_id`);

--
-- Indeks untuk tabel `toolboxes`
--
ALTER TABLE `toolboxes`
  ADD PRIMARY KEY (`b_id`);

--
-- Indeks untuk tabel `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`t_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `h_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `toolboxes`
--
ALTER TABLE `toolboxes`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tools`
--
ALTER TABLE `tools`
  MODIFY `t_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
