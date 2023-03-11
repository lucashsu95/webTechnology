-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-09-17 11:03:43
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
-- 資料表結構 `record`
--

CREATE TABLE `record` (
  `id` varchar(30) DEFAULT NULL,
  `account` varchar(30) DEFAULT NULL,
  `loginTime` datetime DEFAULT NULL,
  `logoutTime` datetime DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `record`
--

INSERT INTO `record` (`id`, `account`, `loginTime`, `logoutTime`, `type`) VALUES
('a001', 'admin', '2022-08-20 12:45:39', NULL, '登入成功'),
('a001', 'admin', NULL, '2022-08-20 12:45:41', '登出'),
('a001', 'admin', '2022-08-20 12:45:45', NULL, '登入失敗'),
('a001', 'admin', '2022-08-20 12:45:50', NULL, '登入成功'),
('a001', 'admin', NULL, '2022-08-20 13:29:22', '登出'),
('a1', 'admin', '2022-08-20 13:29:28', NULL, '登入成功'),
('a1', 'admin', '2022-08-28 08:29:45', NULL, '登入成功'),
('a1', 'admin', NULL, '2022-08-28 09:31:40', '登出'),
('u6', '', '2022-08-28 09:31:47', NULL, '登入成功'),
('u6', '', '2022-08-28 09:31:56', NULL, '登入成功'),
('a1', 'admin', '2022-08-28 09:32:15', NULL, '登入成功'),
('a1', 'admin', NULL, '2022-08-28 13:13:59', '登出'),
('u6', '', '2022-08-28 15:02:09', NULL, '登入成功'),
('u6', '', NULL, '2022-08-28 15:02:13', '登出'),
('a1', 'admin', '2022-08-28 15:02:23', NULL, '登入成功'),
('a1', 'admin', '2022-09-04 13:12:20', NULL, '登入成功'),
('a1', 'admin', NULL, '2022-09-17 10:38:26', '登出'),
('a1', 'admin', '2022-09-17 10:38:52', NULL, '登入成功');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
