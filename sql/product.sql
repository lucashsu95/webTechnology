-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-03-06 13:40:24
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
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `udesc` varchar(255) DEFAULT NULL,
  `price` int(30) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `template_index` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`id`, `name`, `udesc`, `price`, `link`, `image`, `date`, `template_index`) VALUES
(5, 'ababa', 'babab', 123, 'ababa', 'img/20230304074251', '2023-03-03', 2),
(6, 'tests', 'abc', 87, 'ababab', 'img/20230304074418', '2023-02-28', 0),
(9, 'abc', '123', 123, 'bc', 'img/20230306103306', '2023-03-06', 1),
(10, 'test2', 'test11', 199, 'abc', 'img/20230306103349', '2023-03-06', 3);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
