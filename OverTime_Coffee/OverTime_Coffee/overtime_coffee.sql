-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 11:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `overtime_coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `cake`
--

CREATE TABLE `cake` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cake`
--

INSERT INTO `cake` (`id`, `name`, `price`, `img_name`) VALUES
(1, 'bánh cookie', 20, './assets/cake/cookie.png'),
(2, 'bánh pound', 20, './assets/cake/pound.png'),
(3, 'bánh toasted', 20, './assets/cake/toasted.png'),
(4, 'bánh muffin', 20, './assets/cake/muffin.png'),
(5, 'bánh croissant', 20, './assets/cake/croissant.png');

-- --------------------------------------------------------

--
-- Table structure for table `coffee`
--

CREATE TABLE `coffee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coffee`
--

INSERT INTO `coffee` (`id`, `name`, `price`, `img_name`) VALUES
(1, 'cappuccino', 20, './assets/coffee/cappuccino.png'),
(2, 'chailatte', 20, './assets/coffee/chailattle.png'),
(3, 'macchiato', 20, './assets/coffee/macchiato.png'),
(4, 'expresso', 20, './assets/coffee/expresso.png'),
(5, 'cà phê cốt dừa', 20, './assets/coffee/caphecotdua.png'),
(6, 'cà phê trứng', 20, './assets/coffee/caphetrung.png'),
(7, 'cà phê muối', 20, './assets/coffee/caphemuoi.png'),
(8, 'bạc xĩu', 20, './assets/coffee/bacxiu.png'),
(9, 'cà phê đen', 20, './assets/coffee/capheden.png'),
(10, 'cà phê sữa', 20, './assets/coffee/caphesua.png');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `food` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `tong_gia` int(11) NOT NULL,
  `thoi_gian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `username`, `food`, `type`, `so_luong`, `tong_gia`, `thoi_gian`) VALUES
(15, 'test1', 'cappuccino', 'coffee', 1, 20, '2024-11-20 11:02:47'),
(16, 'test1', 'cappuccino', 'coffee', 15, 300, '2024-11-20 11:02:47'),
(17, 'test1', 'cappuccino', 'coffee', 1, 20, '2024-11-20 05:04:54'),
(18, 'test1', 'cappuccino', 'coffee', 1, 20, '2024-11-20 05:13:22'),
(19, 'test11', 'cappuccino', 'coffee', 12, 240, '2024-11-20 08:24:39'),
(20, 'test11', 'bánh cookie', 'cake', 1, 20, '2024-11-20 08:32:05'),
(21, 'test1', 'bánh croissant', 'cake', 16, 320, '2024-11-20 09:39:24'),
(22, 'test1', 'bánh toasted', 'cake', 14, 280, '2024-11-20 10:30:57'),
(23, 'test1', 'macchiato', 'coffee', 1, 20, '2024-11-20 10:31:35'),
(24, 'test1', 'bánh muffin', 'cake', 15, 300, '2024-11-20 10:32:53'),
(25, 'test1', 'chailatte', 'coffee', 1, 20, '2024-11-20 10:37:46'),
(26, 'test1', 'bánh pound', 'cake', 1, 20, '2024-11-20 10:38:13'),
(27, 'test1', 'cà phê sữa', 'coffee', 1, 20, '2024-11-20 10:38:34'),
(28, 'test1', 'cà phê sữa', 'coffee', 1, 20, '2024-11-20 10:40:16'),
(29, 'test1', 'cà phê cốt dừa', 'coffee', 15, 300, '2024-11-20 10:40:28'),
(30, 'test1', 'bánh toasted', 'cake', 16, 320, '2024-11-20 10:40:48'),
(31, 'test20', 'chailatte', 'coffee', 14, 280, '2024-11-20 11:38:53'),
(32, 'test20', 'bánh pound', 'cake', 14, 280, '2024-11-20 11:39:00'),
(33, 'test20', 'cappuccino', 'coffee', 1, 20, '2024-11-20 11:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `token_login`
--

CREATE TABLE `token_login` (
  `id` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `selector_hash` varchar(255) NOT NULL,
  `is_expired` int(11) NOT NULL,
  `expiry_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `token_login`
--

INSERT INTO `token_login` (`id`, `username`, `password_hash`, `selector_hash`, `is_expired`, `expiry_date`) VALUES
(NULL, 'test1', '$2y$10$tifrujkSmj4HY7aCx2dJIOnwuvbFxiM5XIi2s6knXiYFzM3QISE.K', '$2y$10$183OiDauRbd0qCxUR0EAMu8v8cf3ODwGCVVDRcmFZfv2oLkdpbbre', 0, '2024-12-18 09:40:12'),
(NULL, 'test1', '$2y$10$/eGy1kxiUxy.4jk2RTmvsekGxOLW4rPgRWHy9ROTaisU9huuwQ0Ay', '$2y$10$MWbW4u/OJqkP8jNzpbkv5OsfgTjZny14C4PqQ5hk2Sa5WaRVDeATe', 0, '2024-12-18 09:46:36'),
(NULL, 'test1', '$2y$10$Q8pCo8CmHLfCHCqo/9/TE.ry9/iCIigUCzrmQAHCyWVkvUUuG6AAO', '$2y$10$JtEqRwkke5sj3Lq6PkiZheQrmNicHwOUOS0tqficfjTBDF3SszIAW', 0, '2024-12-18 10:46:41'),
(NULL, 'test1', '$2y$10$2c3yW3z8d.EnYql/C0dmZuCiLjkz1MHNcyc8Fbvnwq0UBAXQifK5q', '$2y$10$JDKdbsJvTQYsk9UoPXIJR.TAhFgCOvz3ffjz2hvVoR0QNnxRxGJCe', 0, '2024-12-18 10:47:17'),
(NULL, 'test1', '$2y$10$8hPOLuuh0ecvoKmnfpSMq.iYz/6npoaLM.5zZEl6G02z10ft2UhmG', '$2y$10$uS8gmhEUlHp16Xm3.p9HxOpExY/Uvcdb8DFXLY.a4aZES23XvMA3a', 0, '2024-12-18 10:49:33'),
(NULL, 'test1', '$2y$10$n734tnL5Wbxs3Kl99CneB.4ai3hQyIc70qp5rxR4RycmxXEqZBXpe', '$2y$10$t7MzypA2vo15yUY0bixKte0Z/11HzavW7syvzSdtkKTIJK/sd2Yni', 0, '2024-12-18 10:50:28'),
(NULL, 'test1', '$2y$10$50x2WJZbw1gtUKbFTC/BkOh0f04FazjwaYPAqOiQbuVO2t9Esi2Ua', '$2y$10$WM8HZFfqE9nVoiPFDSJbwOKUC/jy/89.G4Uy5hUP/cdLeBvufJR2O', 0, '2024-12-18 11:39:15'),
(NULL, 'test1', '$2y$10$gpo6autraB0lc6QRDOoOn.SJd4ssg6XkjyFswD0nSui0SlX.VcEHW', '$2y$10$wfUJeVclU69fW7.uv3uKqeHrFTBQnmlYoeJJQx5gqME1E5oWOPNzK', 0, '2024-12-18 21:45:13'),
(NULL, 'test1', '$2y$10$5EUY3yHJiKI3JYX7eWRiGupbRsd16MWktqju8I5KJg.N7Oy1r5lmO', '$2y$10$gZcKrbBtAxnF7V5NClRBAO0afL8sawtUbmM5CxWKY4dqY4Wibk7oS', 0, '2024-12-18 23:05:23'),
(NULL, 'test1', '$2y$10$fRjisWC9TGM/gkq7kN.EU.ERaD71IjkFrOXg8XTJ3pf.kYKSfsWJW', '$2y$10$KUnymA30ozfnbrVAH.OKKuTMkKyZF.BlRxTlDBFCWAYjUej1b/W4e', 0, '2024-12-19 01:21:17'),
(NULL, 'test1', '$2y$10$S.fRrp9ACOci7opfrl1DPePl2A0sM.zEYbGk4cIxnIHaM7SVXnzUW', '$2y$10$yxnY6AYr9Y8A8c.xa9FC9OmrJ83PFJeiI7nnLG9/PeRnmmKexirA2', 0, '2024-12-19 12:27:45'),
(NULL, 'test1', '$2y$10$Vht943kROguoNfUyyYa5We.R2ZfganhXEo1hTBA0KN/sYenyURBSm', '$2y$10$aqVO1PEhzaQPxMzrYiTvzOtPITYusPEQeY9NdElx9ANoz1W65qiDW', 0, '2024-12-19 23:43:51'),
(NULL, 'test1', '$2y$10$9TvGy7h6Z/35n6ZHjhiKu.99TLbxqsIvuiKeRyyhcV043WecO7fYe', '$2y$10$7w9qY.GQXHMnXUijsUc9eurEIl1cLN1.f9TT6zGxPhW0tYX8HYW3u', 0, '2024-12-19 23:44:06'),
(NULL, 'test2', '$2y$10$YU8q9liR4VsBOOLOKgxVoOl2oFhQ3LI.AygB.4dxSUXWaYdsTSvq2', '$2y$10$yUs4kVVThhdpOMYFTyMXMuDlP.Fw9VZTDjb4OfTsrNzvUxwH8RvMS', 0, '2024-12-20 00:53:58'),
(NULL, 'test3', '$2y$10$rKj.NE6zyF13/Do8mevAOu2rcAP9dvQsPwT.fC3ukU26FH7CG87/2', '$2y$10$lzvhq.GBYEv9shWdlTAYDOZ6vG8NGFgvn5PfWO4CqikB1m0H.cJne', 0, '2024-12-20 00:57:45'),
(NULL, 'test4', '$2y$10$kL28t8.uKM2Tlra2v7ZLj.b9nd48dTZ4/Ya11ZC6cSZauX8as50tW', '$2y$10$NUtGIJYIvqMHlDs0XbBq6ubv5hRCMPN6ygoZgSx9TIYOuwZucfPQe', 0, '2024-12-20 01:02:15'),
(NULL, 'test5', '$2y$10$DlALipZjggZV7fEHaZs0oOwKd3i3p9YKkLCGCkv5a6u3mmR39HIMe', '$2y$10$QovemijWELjz.EQG4tkCfurv1E.nvf5UTo4g2wwZDcl1NyiTMXqby', 0, '2024-12-20 01:04:33'),
(NULL, 'test6', '$2y$10$/YuKlgBirNdnXmevWXL8h.mK.cqC74q7.0bSYjZxUgVCnsm7KJRau', '$2y$10$rIj/aDBhRtd005FY6MiU9.0CEfLgN590/iwWsLGkxcNMoVznN.npO', 0, '2024-12-20 01:07:33'),
(NULL, 'test10', '$2y$10$2asgXI1mA1.o02FUyop0U.icW.i.Th06HxhXsTpPdrJSyN2/M8PqK', '$2y$10$ulEOzdTb4y0U0maQFX/sAeppbo/4rgK6rSsPClQ6GuKf/vMdPhvrq', 0, '2024-12-20 01:13:20'),
(NULL, 'test11', '$2y$10$E6tqdKPEpX/vrPog6UZpde/brQYJWwahzfy0.2QajPJocvdKnvPdC', '$2y$10$cYcsis8jEk2cVQYoHrG0deyy6lQRDlbmfb.DqM84s4Bt40c1/7Go2', 0, '2024-12-20 01:22:23'),
(NULL, 'test20', '$2y$10$vxxX8j2GrFaEVFPNLgXOwO2oytrk7W8FOMlbnYjOyzEnaK3Wr3EoK', '$2y$10$l7cpcbStNdPxIdlWSDe2ru/jQeBSilmD8cjv83nogAn1wIBH38N2e', 0, '2024-12-20 04:34:43'),
(NULL, 'test20', '$2y$10$QqqwpgE/pDmOjKtKoy.b9.xV6j5cNzweLtCDBs.eaLsdqxbqgsuuW', '$2y$10$plah/w9rEylsl8118ep.LOkUzQZd.IHNJNq7T6dSE8x1Zroc0fFzO', 0, '2024-12-20 04:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(22) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `email`, `phone`, `address`, `password`) VALUES
(1, 'test1', 'Cao Phi', 'test1@gmail.com', '0000000000', 'hcm city, quận 111111111', '$2y$10$N9Yoc7x0SlmJ4CE6xvVKcOepO8ry3tYV.GPOLHNzsKXdYLtrk3uZW'),
(3, 'test2', '', 'test2@gmail.com', '0000000000', '', '$2y$10$rm8DLtgRCOEB8OExtb1QjODSNw9odW89lmKZN/2hMWqifhPeuIYQC'),
(4, 'test3', '', 'test3@gmail.com', '1111111111', '', '$2y$10$hMcFIo.ft/J4nKqO4zwiR.BjbXToRHtR58/gHVXzcTQSPBW9pSVk2'),
(5, 'test4', 'C', 'test4@gmail.com', '1111111111', '', '$2y$10$B5DFiaB.hFJA6uIsAlx3kus.5MWRAnRjB00sTBkqJOXc0o98heg/a'),
(6, 'test5', 'f', 'test5@gmail.com', '1111111111', '', '$2y$10$Gz5O/bAmo4ejIzONZsyAB.JM87fceH322f49cYe5D95o0dUVaLWbu'),
(7, 'test6', 's', 'test6@gmail.com', '1111111111', '', '$2y$10$QVWubb.fw2a651/83nHfDeffum8Gsar0k7k3f6t0gYb9UZ308W6.G'),
(8, 'test10', '1', 'test10@gmail.com', '1111111111', '', '$2y$10$CiAvHWm50q8IrxVK0AMBsu8S7HA5/xyscUwZzzovwAMCPd.KaeGNq'),
(9, 'test11', 'cao phi', 'test11@gmail.com', '1111111111', '', '$2y$10$X298ClUQ9ea82UnJAL.c5.X1WHjujFhtIaxoJ8uHA9F.QuSvan2su'),
(10, 'test20', 'Cao Phi 123', 'test20@gmail.com', '0000000000', 'TP.HCM', '$2y$10$t.ty/UU/Tt0YF4TzKSPEreQqP9wHOmHOUHslFs1VseNzIvE4wU6v2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cake`
--
ALTER TABLE `cake`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coffee`
--
ALTER TABLE `coffee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cake`
--
ALTER TABLE `cake`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coffee`
--
ALTER TABLE `coffee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
