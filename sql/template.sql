-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-03-10 06:21:06
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `53web02`
--

-- --------------------------------------------------------

--
-- 資料表結構 `template`
--

CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `layout` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `color` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `template`
--

INSERT INTO `template` (`id`, `layout`, `color`) VALUES
(3, '[\"date\",\"name\",\"link\",\"price\",\"udesc\",\"image\"]', '#bfaa'),
(11, '[\"image\",\"date\",\"price\",\"name\",\"udesc\",\"link\"]', '#bba'),
(12, '[\"link\",\"image\",\"date\",\"price\",\"udesc\",\"name\"]', '#faa'),
(13, '[\"link\",\"name\",\"date\",\"price\",\"image\",\"udesc\"]', '#fea'),
(14, '[\"link\",\"udesc\",\"image\",\"price\",\"name\",\"date\"]', '#5d9b84'),
(15, '[\"name\",\"link\",\"image\",\"price\",\"udesc\",\"date\"]', '#ba6699'),
(16, '[\"image\",\"date\",\"price\",\"name\",\"udesc\",\"link\"]', '#099b'),
(17, '[\"image\",\"link\",\"date\",\"udesc\",\"price\",\"name\"]', '#d019');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
