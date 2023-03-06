-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-03-03 10:00:44
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
-- 資料表結構 `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `account` varchar(303) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `action` varchar(30) NOT NULL,
  `utype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `record`
--

INSERT INTO `record` (`id`, `account`, `time`, `action`, `utype`) VALUES
(1, 'admin', '2023-02-24 09:27:24', '登出', '成功'),
(2, '', '2023-02-24 09:27:54', '登入', '失敗'),
(3, 'admin', '2023-02-24 09:31:38', '登入', '成功'),
(4, 'admin', '2023-02-24 09:31:43', '登出', '成功'),
(5, 'admin', '2023-02-24 09:31:49', '登入', '成功'),
(6, 'admin', '2023-03-02 05:13:16', '登出', '成功'),
(7, 'admin', '2023-03-02 05:13:19', '登入', '成功'),
(8, 'admin', '2023-03-02 08:18:26', '登入', '成功'),
(9, 'admin', '2023-03-03 01:23:40', '登入', '成功'),
(10, 'admin', '2023-03-03 01:29:29', '登出', '成功'),
(11, 'admin', '2023-03-03 01:29:31', '登入', '成功'),
(12, 'admin', '2023-03-03 07:09:45', '登出', '成功'),
(13, 'admin', '2023-03-03 07:21:45', '登入', '成功'),
(14, 'admin', '2023-03-03 07:22:10', '登入', '成功'),
(15, 'admin', '2023-03-03 07:27:31', '登入', '成功'),
(16, 'admin', '2023-03-03 07:29:07', '登出', '成功'),
(17, 'admin', '2023-03-03 07:33:50', '登入', '成功');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
