-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-09-17 11:04:05
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
-- 資料庫: `52web01`
--

-- --------------------------------------------------------

--
-- 資料表結構 `utodo`
--

CREATE TABLE `utodo` (
  `id` int(30) NOT NULL,
  `workname` varchar(30) DEFAULT NULL,
  `process` varchar(30) DEFAULT NULL,
  `priority` varchar(30) DEFAULT NULL,
  `starttime` int(2) DEFAULT NULL,
  `endtime` int(2) DEFAULT NULL,
  `workcontent` varchar(30) DEFAULT NULL,
  `ymd` date DEFAULT NULL,
  `starttime2` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `endtime2` int(4) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `utodo`
--

INSERT INTO `utodo` (`id`, `workname`, `process`, `priority`, `starttime`, `endtime`, `workcontent`, `ymd`, `starttime2`, `endtime2`) VALUES
(8, 'abc', '處理中', '普通件', 12, 14, 'abc         ', '2022-09-17', 1230, 1400),
(9, '工作1', '未處理', '最速件', 1, 6, 'XD', '2022-09-22', 0130, 0600),
(10, 'work2', '己完成', '最速件', 6, 10, ':D', '2022-09-27', 0630, 1000),
(11, 'work3', '未處理', '普通件', 9, 18, 'XDDDDDDDDDDDDDDDDDDDDDDDDDDDDD', '0000-00-00', 0930, 1800);

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
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
