-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2022 at 02:59 PM
-- Server version: 5.7.35-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vartvald`
--

-- --------------------------------------------------------

--
-- Table structure for table `paslaugos`
--

CREATE TABLE `paslaugos` (
  `id` int(11) NOT NULL,
  `paslauga` text CHARACTER SET utf8 NOT NULL,
  `kaina` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paslaugos`
--

INSERT INTO `paslaugos` (`id`, `paslauga`, `kaina`) VALUES
(9, 'Kondicionierių Pildymas', 60.5),
(10, 'Lempų remontas', 50.4),
(12, 'Šarnyrų keitimas', 70.5),
(13, 'Svirčių įvorių keitimas', 80.2),
(14, 'Amortizatorių ir spyruoklių keitimas', 110.5),
(15, 'Lakštinių lingių keitimas', 90.2),
(16, 'Rato guolių keitimas', 60.8),
(18, 'Ratų suvedimas', 70.5),
(19, 'Vairo kolonėlių remontas', 70.3),
(20, 'Stabdžių diskų ir trinkelių keitimas', 50.6),
(21, 'Stabdžių vakuuminės sistemos remontas', 140.2);

-- --------------------------------------------------------

--
-- Table structure for table `registracijos`
--

CREATE TABLE `registracijos` (
  `id` int(11) NOT NULL,
  `vartotojo_id` varchar(32) CHARACTER SET utf8 NOT NULL,
  `meistro_id` varchar(32) CHARACTER SET utf8 NOT NULL,
  `registracijoslaikas` datetime NOT NULL,
  `kaina` float NOT NULL,
  `busena` varchar(20) CHARACTER SET utf8 NOT NULL,
  `darbolaikas` datetime NOT NULL,
  `paslaugos` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registracijos`
--

INSERT INTO `registracijos` (`id`, `vartotojo_id`, `meistro_id`, `registracijoslaikas`, `kaina`, `busena`, `darbolaikas`, `paslaugos`) VALUES
(25, 'ef3a56093028f7d90e6752b498eda86a', 'dc90597486262c52d4d27923aad263cb', '2022-11-18 12:19:27', 110.5, 'BAIGTA', '2022-11-20 09:00:00', 'Amortizatorių ir spyruoklių keitimas'),
(26, 'ef3a56093028f7d90e6752b498eda86a', '23241c1ee0b19f22955729c4afde02a6', '2022-11-18 12:21:00', 90.2, 'BAIGTA', '2022-11-21 13:00:00', 'Lakštinių lingių keitimas'),
(27, 'ef3a56093028f7d90e6752b498eda86a', 'dc90597486262c52d4d27923aad263cb', '2022-11-18 12:21:53', 110.5, 'PATVIRTINTA', '2022-11-24 13:00:00', 'Amortizatorių ir spyruoklių keitimas'),
(28, 'ef3a56093028f7d90e6752b498eda86a', 'dc90597486262c52d4d27923aad263cb', '2022-11-18 12:22:16', 110.5, 'PATVIRTINTA', '2022-11-20 15:00:00', 'Amortizatorių ir spyruoklių keitimas'),
(29, 'ef3a56093028f7d90e6752b498eda86a', '92cbe90b587c1ee99a54d965da55041f', '2022-11-18 12:23:02', 110.5, 'PATVIRTINTA', '2022-11-22 13:00:00', 'Amortizatorių ir spyruoklių keitimas'),
(30, 'ef3a56093028f7d90e6752b498eda86a', '23241c1ee0b19f22955729c4afde02a6', '2022-11-18 12:32:39', 90.2, 'PATVIRTINTA', '2022-11-23 09:00:00', 'Lakštinių lingių keitimas'),
(31, 'ef3a56093028f7d90e6752b498eda86a', '23241c1ee0b19f22955729c4afde02a6', '2022-11-18 12:32:55', 70.3, 'PATVIRTINTA', '2022-11-20 09:00:00', 'Vairo kolonėlių remontas'),
(32, 'ef3a56093028f7d90e6752b498eda86a', '23241c1ee0b19f22955729c4afde02a6', '2022-11-18 12:41:09', 110.5, 'BAIGTA', '2022-11-18 09:00:00', 'Amortizatorių ir spyruoklių keitimas'),
(33, 'ef3a56093028f7d90e6752b498eda86a', '23241c1ee0b19f22955729c4afde02a6', '2022-11-18 12:41:34', 110.5, 'BAIGTA', '2022-11-19 11:00:00', 'Amortizatorių ir spyruoklių keitimas'),
(34, 'ef3a56093028f7d90e6752b498eda86a', '23241c1ee0b19f22955729c4afde02a6', '2022-11-18 12:42:08', 50.6, 'PATVIRTINTA', '2022-11-20 15:00:00', 'Stabdžių diskų ir trinkelių keitimas'),
(35, 'b330bc81a468fbd088353d1d7021499f', '92cbe90b587c1ee99a54d965da55041f', '2022-11-18 12:48:47', 80.2, 'PATVIRTINTA', '2022-11-18 09:00:00', 'Svirčių įvorių keitimas'),
(36, 'b330bc81a468fbd088353d1d7021499f', '92cbe90b587c1ee99a54d965da55041f', '2022-11-18 12:48:56', 110.5, 'PATVIRTINTA', '2022-11-19 09:00:00', 'Amortizatorių ir spyruoklių keitimas'),
(37, 'b330bc81a468fbd088353d1d7021499f', '92cbe90b587c1ee99a54d965da55041f', '2022-11-18 12:49:10', 80.2, 'PATVIRTINTA', '2022-11-20 09:00:00', 'Svirčių įvorių keitimas'),
(38, 'b330bc81a468fbd088353d1d7021499f', '92cbe90b587c1ee99a54d965da55041f', '2022-11-18 12:49:24', 110.5, 'PATVIRTINTA', '2022-11-21 09:00:00', 'Amortizatorių ir spyruoklių keitimas'),
(39, 'b330bc81a468fbd088353d1d7021499f', '92cbe90b587c1ee99a54d965da55041f', '2022-11-18 12:50:04', 80.2, 'PATVIRTINTA', '2022-11-22 09:00:00', 'Svirčių įvorių keitimas'),
(40, 'b330bc81a468fbd088353d1d7021499f', '92cbe90b587c1ee99a54d965da55041f', '2022-11-18 12:50:19', 80.2, 'PATVIRTINTA', '2022-11-23 15:00:00', 'Svirčių įvorių keitimas'),
(41, 'ebceba43e6b516d86759acd3fc0157e1', '23241c1ee0b19f22955729c4afde02a6', '2022-11-18 12:51:28', 90.2, 'PATVIRTINTA', '2022-11-18 13:00:00', 'Lakštinių lingių keitimas'),
(42, 'ebceba43e6b516d86759acd3fc0157e1', '92cbe90b587c1ee99a54d965da55041f', '2022-11-18 12:51:50', 110.5, 'PATVIRTINTA', '2022-11-25 13:00:00', 'Amortizatorių ir spyruoklių keitimas'),
(43, 'ebceba43e6b516d86759acd3fc0157e1', '92cbe90b587c1ee99a54d965da55041f', '2022-11-18 12:52:14', 80.2, 'BAIGTA', '2022-11-21 13:00:00', 'Svirčių įvorių keitimas'),
(44, '23241c1ee0b19f22955729c4afde02a6', '23241c1ee0b19f22955729c4afde02a6', '2022-11-18 12:55:14', 0, 'UŽDARYTA', '2022-11-18 15:00:00', '-'),
(45, '23241c1ee0b19f22955729c4afde02a6', '23241c1ee0b19f22955729c4afde02a6', '2022-11-18 12:56:45', 0, 'UŽDARYTA', '2022-11-20 11:00:00', '-'),
(46, '23241c1ee0b19f22955729c4afde02a6', '23241c1ee0b19f22955729c4afde02a6', '2022-11-18 12:59:09', 0, 'UŽDARYTA', '2022-11-22 09:00:00', '-'),
(47, '6f1b6c26439ed2aab4772105ead0571f', '3363f2e40150f34b8e729203caae3f6d', '2022-11-18 13:02:26', 50.4, 'PATVIRTINTA', '2022-11-18 11:00:00', 'Lempų remontas'),
(48, '6f1b6c26439ed2aab4772105ead0571f', '3363f2e40150f34b8e729203caae3f6d', '2022-11-18 13:02:36', 60.5, 'PATVIRTINTA', '2022-11-21 09:00:00', 'Kondicionierių Pildymas'),
(49, '6f1b6c26439ed2aab4772105ead0571f', '3363f2e40150f34b8e729203caae3f6d', '2022-11-18 13:04:11', 70.5, 'PATVIRTINTA', '2022-11-22 11:00:00', 'Šarnyrų keitimas'),
(50, '6f1b6c26439ed2aab4772105ead0571f', '3363f2e40150f34b8e729203caae3f6d', '2022-11-18 13:04:17', 70.5, 'BAIGTA', '2022-11-22 09:00:00', 'Šarnyrų keitimas'),
(51, '6f1b6c26439ed2aab4772105ead0571f', '3363f2e40150f34b8e729203caae3f6d', '2022-11-18 13:04:36', 70.3, 'PATVIRTINTA', '2022-11-20 13:00:00', 'Vairo kolonėlių remontas'),
(52, '6f1b6c26439ed2aab4772105ead0571f', '3363f2e40150f34b8e729203caae3f6d', '2022-11-18 13:04:45', 50.4, 'PATVIRTINTA', '2022-11-21 13:00:00', 'Lempų remontas'),
(53, '6f1b6c26439ed2aab4772105ead0571f', '3363f2e40150f34b8e729203caae3f6d', '2022-11-18 13:05:06', 60.5, 'BAIGTA', '2022-11-18 13:00:00', 'Kondicionierių Pildymas'),
(54, 'b330bc81a468fbd088353d1d7021499f', 'dc90597486262c52d4d27923aad263cb', '2022-11-18 13:16:19', 110.5, 'PATVIRTINTA', '2022-11-18 09:00:00', 'Amortizatorių ir spyruoklių keitimas'),
(55, 'b330bc81a468fbd088353d1d7021499f', 'dc90597486262c52d4d27923aad263cb', '2022-11-18 13:16:26', 50.6, 'PATVIRTINTA', '2022-11-19 15:00:00', 'Stabdžių diskų ir trinkelių keitimas'),
(56, 'b330bc81a468fbd088353d1d7021499f', 'dc90597486262c52d4d27923aad263cb', '2022-11-18 13:16:40', 60.5, 'PATVIRTINTA', '2022-11-20 09:00:00', 'Kondicionierių Pildymas'),
(57, 'b330bc81a468fbd088353d1d7021499f', '3363f2e40150f34b8e729203caae3f6d', '2022-11-18 13:17:14', 140.2, 'PATVIRTINTA', '2022-11-18 13:00:00', 'Stabdžių vakuuminės sistemos remontas'),
(58, 'b330bc81a468fbd088353d1d7021499f', '3363f2e40150f34b8e729203caae3f6d', '2022-11-18 13:17:26', 70.5, 'PATVIRTINTA', '2022-11-20 09:00:00', 'Šarnyrų keitimas'),
(59, 'b330bc81a468fbd088353d1d7021499f', '3363f2e40150f34b8e729203caae3f6d', '2022-11-18 13:17:34', 50.4, 'PATVIRTINTA', '2022-11-26 13:00:00', 'Lempų remontas');

-- --------------------------------------------------------

--
-- Table structure for table `Teikia`
--

CREATE TABLE `Teikia` (
  `id` int(11) NOT NULL,
  `meistro_id` varchar(32) CHARACTER SET utf8 NOT NULL,
  `paslaugos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Teikia`
--

INSERT INTO `Teikia` (`id`, `meistro_id`, `paslaugos_id`) VALUES
(1, 'dc90597486262c52d4d27923aad263cb', 9),
(2, 'dc90597486262c52d4d27923aad263cb', 14),
(3, 'dc90597486262c52d4d27923aad263cb', 19),
(4, 'dc90597486262c52d4d27923aad263cb', 20),
(5, '23241c1ee0b19f22955729c4afde02a6', 13),
(6, '23241c1ee0b19f22955729c4afde02a6', 14),
(7, '23241c1ee0b19f22955729c4afde02a6', 15),
(8, '23241c1ee0b19f22955729c4afde02a6', 19),
(9, '23241c1ee0b19f22955729c4afde02a6', 20),
(10, '3363f2e40150f34b8e729203caae3f6d', 9),
(11, '3363f2e40150f34b8e729203caae3f6d', 10),
(12, '3363f2e40150f34b8e729203caae3f6d', 12),
(13, '3363f2e40150f34b8e729203caae3f6d', 19),
(14, '3363f2e40150f34b8e729203caae3f6d', 20),
(15, '3363f2e40150f34b8e729203caae3f6d', 21),
(16, '92cbe90b587c1ee99a54d965da55041f', 12),
(17, '92cbe90b587c1ee99a54d965da55041f', 13),
(18, '92cbe90b587c1ee99a54d965da55041f', 14),
(19, '92cbe90b587c1ee99a54d965da55041f', 18),
(20, '92cbe90b587c1ee99a54d965da55041f', 19);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `userid` varchar(32) NOT NULL,
  `userlevel` tinyint(1) UNSIGNED DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `userid`, `userlevel`, `email`, `timestamp`) VALUES
('juonis', 'c2acd92812ef99acd3dcdbb746b9a434', '23241c1ee0b19f22955729c4afde02a6', 3, 'juonis@gmail.com', '2022-11-18 11:08:47'),
('marija', 'c2acd92812ef99acd3dcdbb746b9a434', '3363f2e40150f34b8e729203caae3f6d', 3, 'marija@gmail.com', '2022-11-18 11:12:50'),
('petras', 'db5c34a252f7c1a1206a594da810584c', '47ec195139c620ce42d22d09fd2bd19f', 4, 'petras@gmail.com', '2022-11-18 09:18:33'),
('rimas', 'c2acd92812ef99acd3dcdbb746b9a434', '689e5b2971577d707becb97405ede951', 9, 'rimas@litnet.lt', '2022-11-18 11:27:38'),
('karolis2', 'c2acd92812ef99acd3dcdbb746b9a434', '6f1b6c26439ed2aab4772105ead0571f', 4, 'karolis@gmail.com', '2022-11-18 11:30:39'),
('sonata', 'c2acd92812ef99acd3dcdbb746b9a434', '92cbe90b587c1ee99a54d965da55041f', 3, 'sonata@gmail.com', '2022-11-18 11:13:27'),
('Administratorius', '16c354b68848cdbd8f54a226a0a55b21', 'a2fe399900de341c39c632244eaf8483', 9, 'demo@ktu.lt', '2018-02-16 16:51:21'),
('pranas', '16c354b68848cdbd8f54a226a0a55b21', 'aa69001f0ba493bed7dddfd1cdb06591', 4, 'pranas@ltu.ee', '2018-02-16 16:03:41'),
('jonas1', 'c2acd92812ef99acd3dcdbb746b9a434', 'b330bc81a468fbd088353d1d7021499f', 4, 'jonas1@gmail.com', '2022-11-18 11:15:59'),
('karolis', 'c2acd92812ef99acd3dcdbb746b9a434', 'dc90597486262c52d4d27923aad263cb', 3, 'karolis@gmail.com', '2022-11-18 11:24:48'),
('temp', 'c2acd92812ef99acd3dcdbb746b9a434', 'ebceba43e6b516d86759acd3fc0157e1', 4, 'temp@gmail.com', '2022-11-18 10:51:15'),
('stasys', 'c2acd92812ef99acd3dcdbb746b9a434', 'ef3a56093028f7d90e6752b498eda86a', 4, 'stasys@gmail.com', '2022-11-18 11:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `vertinimai`
--

CREATE TABLE `vertinimai` (
  `id` int(11) NOT NULL,
  `vartotojo_id` varchar(32) CHARACTER SET utf8 NOT NULL,
  `meistro_id` varchar(32) CHARACTER SET utf8 NOT NULL,
  `vertinimas` int(11) NOT NULL,
  `komentaras` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vertinimai`
--

INSERT INTO `vertinimai` (`id`, `vartotojo_id`, `meistro_id`, `vertinimas`, `komentaras`) VALUES
(1, '6f1b6c26439ed2aab4772105ead0571f', 'dc90597486262c52d4d27923aad263cb', 1, 'fxfzxg'),
(2, '6f1b6c26439ed2aab4772105ead0571f', 'dc90597486262c52d4d27923aad263cb', 4, 'bhbh'),
(3, '6f1b6c26439ed2aab4772105ead0571f', 'dc90597486262c52d4d27923aad263cb', 3, 'dgdgdt'),
(5, '6f1b6c26439ed2aab4772105ead0571f', 'dc90597486262c52d4d27923aad263cb', 1, 'Labas'),
(6, '6f1b6c26439ed2aab4772105ead0571f', 'dc90597486262c52d4d27923aad263cb', 3, 'gdxgx'),
(7, 'ef3a56093028f7d90e6752b498eda86a', '23241c1ee0b19f22955729c4afde02a6', 4, 'Puikus aptarnavimas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paslaugos`
--
ALTER TABLE `paslaugos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registracijos`
--
ALTER TABLE `registracijos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reg_meistras` (`meistro_id`),
  ADD KEY `reg_vartotojas` (`vartotojo_id`);

--
-- Indexes for table `Teikia`
--
ALTER TABLE `Teikia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Paslauga` (`paslaugos_id`),
  ADD KEY `Meistras` (`meistro_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `vertinimai`
--
ALTER TABLE `vertinimai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ver_meistras` (`meistro_id`),
  ADD KEY `ver_vartotojas` (`vartotojo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paslaugos`
--
ALTER TABLE `paslaugos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `registracijos`
--
ALTER TABLE `registracijos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `Teikia`
--
ALTER TABLE `Teikia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `vertinimai`
--
ALTER TABLE `vertinimai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `registracijos`
--
ALTER TABLE `registracijos`
  ADD CONSTRAINT `reg_meistras` FOREIGN KEY (`meistro_id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reg_vartotojas` FOREIGN KEY (`vartotojo_id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Teikia`
--
ALTER TABLE `Teikia`
  ADD CONSTRAINT `Meistras` FOREIGN KEY (`meistro_id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Paslauga` FOREIGN KEY (`paslaugos_id`) REFERENCES `paslaugos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vertinimai`
--
ALTER TABLE `vertinimai`
  ADD CONSTRAINT `ver_meistras` FOREIGN KEY (`meistro_id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ver_vartotojas` FOREIGN KEY (`vartotojo_id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
