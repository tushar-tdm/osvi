-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2019 at 11:39 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osvi`
--

-- --------------------------------------------------------

--
-- Table structure for table `curl`
--

CREATE TABLE `curl` (
  `id` int(5) NOT NULL,
  `time_s` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curl`
--

INSERT INTO `curl` (`id`, `time_s`) VALUES
(10, 11589294),
(11, 1544092167),
(12, 1544191051),
(13, 1544291394),
(14, 1544291394),
(15, 1544967243),
(16, 1544967243),
(17, 1544967243),
(18, 1546341079),
(19, 1546342310),
(20, 1546346559),
(21, 1546346559),
(22, 1546346559),
(23, 1546346559),
(24, 1546346559),
(25, 1547723326),
(26, 1547723462),
(27, 1547723462),
(28, 1547725987),
(29, 1547726482),
(30, 1547726578);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `user_id` varchar(15) DEFAULT NULL,
  `stat` int(11) DEFAULT NULL,
  `format` varchar(10) DEFAULT NULL,
  `num` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`user_id`, `stat`, `format`, `num`) VALUES
('tdm', 1, 'jpg', 1),
('166434', 1, 'jpg', 1),
('tt', 1, 'jpg', 1),
('sp', 1, 'jpg', 1),
(' dkumar', 1, 'jpg', 1),
('spatil', 1, 'jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ppics`
--

CREATE TABLE `ppics` (
  `id` int(11) NOT NULL,
  `u_id` varchar(20) DEFAULT NULL,
  `picnum` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppics`
--

INSERT INTO `ppics` (`id`, `u_id`, `picnum`) VALUES
(3, 'slc', 1),
(4, 'slc', 2),
(5, 'sp', 1),
(6, 'sp', 2),
(7, 'sp', 3);

-- --------------------------------------------------------

--
-- Table structure for table `recent`
--

CREATE TABLE `recent` (
  `id` int(11) NOT NULL,
  `user_id` varchar(15) DEFAULT NULL,
  `exp` varchar(35) DEFAULT NULL,
  `doe` date DEFAULT NULL,
  `picnum` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recent`
--

INSERT INTO `recent` (`id`, `user_id`, `exp`, `doe`, `picnum`) VALUES
(21, 'slc', 'plotter', '2018-11-30', 1),
(22, 'slc', 'plotter', '2018-11-30', 2),
(23, 'sp', 'plotter', '2018-11-30', 1),
(24, 'sp', 'plotter', '2018-11-30', 2),
(25, 'sp', 'plotter', '2018-12-02', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rtoken`
--

CREATE TABLE `rtoken` (
  `u_id` varchar(20) DEFAULT NULL,
  `ttoken` int(11) DEFAULT NULL,
  `token_num` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(6) NOT NULL,
  `text` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `u_id` varchar(20) DEFAULT NULL,
  `ttoken` int(11) DEFAULT NULL,
  `token_num` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users4`
--

CREATE TABLE `users4` (
  `id` int(7) NOT NULL,
  `fname` varchar(15) DEFAULT NULL,
  `lname` varchar(15) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `u_id` varchar(15) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `tech` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users4`
--

INSERT INTO `users4` (`id`, `fname`, `lname`, `email`, `u_id`, `pass`, `phone`, `tech`) VALUES
(2, 'sagar', 'dm', 's@gmail.com', 'sdm', NULL, '9611587304', 0),
(3, 'siddesh', 'lc', 'slc@gmail.com', 'slc', '$2y$10$slSsfaDaKYEVU8QCAXljBe/Wp1wGjLpAgg.1vhsvEPFdPtDkglmFy', '9611587304', 0),
(4, 'praveen', 'naik', 'pn@gmail.com', 'pn', '$2y$10$Z2M6L5Exc90cnk84VqYuL.QzUCeBEC6DZjK9SfPTi3cDldBxpbVm.', '9611587304', 0),
(10, 'bidyadhar', 'm', 'bm@gmail.com', 'bm', '$2y$10$DmDSYA8lazvGGT63a36AvOmRrilys5dPxp/W2p949GV47Ja5sgdNS', '9611597854', 0),
(11, 'tdm', 'sdm', 'tdmbarca91011@gmail.com', 'tushar', '$2y$10$t0AC96woLLdhiyqVgbcJWOjR0Al/R4dQPPpSrYLebUVW9fOfcsaOa', '9611587304', 1),
(12, 'tushar', 'dm', 'tdmb91011@gmail.com', 'tdm', '$2y$10$.s31JzJJ2eNnRi/0a.O3a.8qS8iM8TxCSeYP48RNAtlck4KTK5NQe', '9611587304', 1),
(14, 'sachin', 'km', 'skm@gmail.com', 'skm', '$2y$10$ndDMfnAc6WrldCdaFDe.2uOXOqAmFGe3aD7kIkUezZoaoHEFzoL3K', '9622384764', 0),
(15, 'shreyas', 'p', 'sp@gmail.com', 'sp', '$2y$10$Xasl3xBZ2GQklIBodhzZp.RBxP0H5QwlOEKfG.Hhao2BlJ70ukoXe', '9622384764', 0),
(16, 'darshan', 'kumar', 'dk@gmail.com', ' dkumar', '$2y$10$0hhgLfsYPjpMVksYgowLUud0hGnBZK/NUHP3RuwdvXFhjZEnFdbeS', '9611587309', 0),
(17, 'tushar', 'dm', 'tdm@gmail.com', 'tdm', '$2y$10$8RSTR/s/2ZnY/KikZ8rF1uN9Sj19jybZu6ly5BBp3TVUwibr4Vh8i', '9611587304', 0),
(18, 'soham', 'patil', 'spatil@gmail.com', 'spatil', '$2y$10$MkLqGZ4vNMc.nwnWQVcMVuqNYZ7s8gpZDiyaqPDjripiQAyefSyD6', '9611587304', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `curl`
--
ALTER TABLE `curl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppics`
--
ALTER TABLE `ppics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recent`
--
ALTER TABLE `recent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`token_num`);

--
-- Indexes for table `users4`
--
ALTER TABLE `users4`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `curl`
--
ALTER TABLE `curl`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ppics`
--
ALTER TABLE `ppics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `recent`
--
ALTER TABLE `recent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users4`
--
ALTER TABLE `users4`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
