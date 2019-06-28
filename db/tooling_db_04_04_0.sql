-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2019 at 11:11 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `h_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `t_id` int(10) NOT NULL,
  `h_tanggal` datetime NOT NULL,
  `h_action` enum('1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `toolboxes`
--

CREATE TABLE `toolboxes` (
  `b_id` int(10) NOT NULL,
  `b_nama` text NOT NULL,
  `b_background` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toolboxes`
--

INSERT INTO `toolboxes` (`b_id`, `b_nama`, `b_background`) VALUES
(1, 'lemari 1-3', 'background1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `t_id` int(10) NOT NULL,
  `t_nama` text NOT NULL,
  `b_id` int(10) NOT NULL,
  `t_gambar` text NOT NULL,
  `t_status` enum('1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`t_id`, `t_nama`, `b_id`, `t_gambar`, `t_status`) VALUES
(1, '', 1, '1-1.png', '4'),
(2, '', 1, '1-2.png', '4'),
(3, '', 1, '1-3.png', '4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(10) NOT NULL,
  `u_nama` text NOT NULL,
  `u_password` text NOT NULL,
  `u_created` datetime NOT NULL,
  `u_last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_nama`, `u_password`, `u_created`, `u_last_login`) VALUES
(1, 'admin', '$2y$10$LGk/nJvxm9UZs4DzDvPrUewFwiHyvcjhcmdqMaqXTIKDxZA4Hl3WG', '2019-04-02 15:27:58', '2019-04-03 15:20:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `toolboxes`
--
ALTER TABLE `toolboxes`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `h_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `toolboxes`
--
ALTER TABLE `toolboxes`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `t_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
