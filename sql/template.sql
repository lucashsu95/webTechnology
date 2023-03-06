-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-03-03 10:00:49
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
  `one` varchar(30) NOT NULL,
  `two` varchar(30) NOT NULL,
  `three` varchar(30) NOT NULL,
  `four` varchar(30) NOT NULL,
  `fire` varchar(30) NOT NULL,
  `six` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `template`
--

INSERT INTO `template` (`id`, `one`, `two`, `three`, `four`, `fire`, `six`) VALUES
(1, 'name', 'image', 'udesc', 'price', 'link', 'date'),
(2, 'date', 'price', 'link', 'udesc', 'image', 'name'),
(7, 'image', 'name', 'udesc', 'price', 'link', 'date'),
(8, 'date', 'name', 'udesc', 'price', 'link', 'image');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
