-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.1.40-MariaDB
-- PHP 版本： 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `jq_sample`
--

CREATE DATABASE IF NOT EXISTS `jq_sample` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `jq_sample`;

--
-- 資料表結構 `ajax_animal`
--

CREATE TABLE `ajax_animal` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `ajax_animal`
--

INSERT INTO `ajax_animal` (`id`, `name`, `weight`, `info`, `date`) VALUES
(1, '藪貓', 9, '食肉目 貓科 藪貓屬', '2020-12-20 08:21:08'),
(2, '耳廓狐', 17, '食肉目 犬科 狐屬', '2020-12-19 15:57:56'),
(3, '河馬', 120, '鯨偶蹄目 河馬科 河馬屬', '2020-11-07 08:52:06'),
(4, '印度象', 1258, '長鼻目 象科 象屬', '2020-11-07 08:52:06'),
(5, '浣熊', 30, '食肉目 浣熊科 浣熊屬', '2020-11-07 09:13:58'),
(6, '斑馬', 53, '奇蹄目 馬科 馬屬', '2020-11-07 08:52:06'),
(7, '瞪羚', 32, '鯨偶蹄目 牛科 瞪羚屬', '2020-11-07 08:52:06'),
(8, '土狼', 32, '食肉目 鬣狗科 土狼屬', '2020-11-07 08:52:06'),
(9, '水獺', 32, '食肉目 鼬科 小爪水獺屬', '2020-11-07 08:52:06'),
(10, '美洲豹', 999999, '食肉目 貓科 豹屬', '2020-11-07 08:52:06'),
(11, '山貓', 999999999, '食肉目 貓科 虎貓屬', '2020-11-07 08:52:06'),
(12, '馬來貘', 80, '奇蹄目 貘科 貘屬', '2020-11-07 09:13:33'),
(13, '馬島獴', 17, '食肉目 食蟻狸科 馬島獴屬', '2020-11-07 08:52:06'),
(14, '花鹿', 120, '鯨偶蹄目 鹿科 花鹿屬', '2020-11-07 08:52:06'),
(15, '眼鏡王蛇', 1258, '有鱗目 眼鏡蛇科 眼鏡王蛇屬', '2020-11-07 08:52:06'),
(16, '食蟻獸', 40, '披毛目 食蟻獸科 小食蟻獸屬', '2020-11-07 09:13:58'),
(17, '孔雀', 532, '雞形目 雉科 孔雀屬', '2020-11-07 10:54:58'),
(18, '袋獾', 32, '袋鼬目 袋鼬科 袋獾屬', '2020-11-07 10:55:05'),
(19, '傘蜥蜴', 555, '有鱗目 飛蜥科 傘蜥蜴屬', '2020-11-07 10:55:26'),
(20, '朱䴉', 32, '鵜形目 䴉科 朱䴉屬', '2020-11-07 08:52:06'),
(21, '羊駝', 999999, '鯨偶蹄目 駱駝科 小羊駝屬', '2020-11-07 08:52:06'),
(22, '美洲紅䴉', 55, '鵜形目 䴉科 美洲䴉屬', '2020-11-07 09:22:04'),
(23, '美洲河狸', 55, '嚙齒目 河狸科 河狸屬', '2020-11-07 09:24:31'),
(24, '黑尾土撥鼠', 999999999, '嚙齒目 松鼠科 草原犬鼠屬', '2020-11-07 08:52:06'),
(25, '獅子', 55, '食肉目 貓科 豹屬', '2020-12-20 09:38:19'),
(26, '原牛', 120, '鯨偶蹄目 牛科 牛屬', '2020-12-20 09:39:03'),
(27, '阿拉伯大羚羊', 2223, '鯨偶蹄目 牛科 長角羚屬', '2020-12-20 09:40:53'),
(28, '日本黑熊', 222, '食肉目 熊科 熊屬', '2020-12-20 09:49:00'),
(29, '駝鹿', 22, '鯨偶蹄目 鹿科 駝鹿屬', '2020-12-20 09:50:23');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `ajax_animal`
--
ALTER TABLE `ajax_animal`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動增長 (AUTO_INCREMENT)
--

--
-- 使用資料表自動增長 (AUTO_INCREMENT) `ajax_animal`
--
ALTER TABLE `ajax_animal`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
