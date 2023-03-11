-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-04-20 15:59:21
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `52web02`
--

-- --------------------------------------------------------

--
-- 資料表結構 `utodo`
--

CREATE TABLE `utodo` (
  `id` int(30) NOT NULL,
  `workname` varchar(30) DEFAULT NULL,
  `process` varchar(30) NOT NULL,
  `priority` varchar(30) NOT NULL,
  `starttime` int(30) NOT NULL,
  `endtime` int(30) NOT NULL,
  `workcontent` varchar(30) DEFAULT NULL,
  `ymd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `utodo`
--

INSERT INTO `utodo` (`id`, `workname`, `process`, `priority`, `starttime`, `endtime`, `workcontent`, `ymd`) VALUES
(1, 'work', '處理中', '速件', 1, 3, 'work', '2022-04-17'),
(3, 'word', '處理中', '普通件', 4, 12, '00000', '2022-04-19'),
(4, 'workN', '處理中', '最速件', 3, 5, '考試', '2022-04-23');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `utodo`
--
ALTER TABLE `utodo`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `utodo`
--
ALTER TABLE `utodo`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
