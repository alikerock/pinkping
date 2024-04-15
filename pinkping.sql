-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 24-04-12 11:14
-- 서버 버전: 10.4.32-MariaDB
-- PHP 버전: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `pinkping`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `admins`
--

CREATE TABLE `admins` (
  `idx` int(11) NOT NULL,
  `userid` varchar(145) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `username` varchar(145) DEFAULT NULL,
  `passwd` varchar(200) DEFAULT NULL,
  `regdate` datetime DEFAULT current_timestamp(),
  `level` tinyint(4) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `end_login_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `admins`
--

INSERT INTO `admins` (`idx`, `userid`, `email`, `username`, `passwd`, `regdate`, `level`, `last_login`, `end_login_date`) VALUES
(4, 'admin', 'admin@pinkping.com', '관리자', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-08 14:59:11', 100, '2024-04-12 09:32:12', NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `pcode` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `step` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `category`
--

INSERT INTO `category` (`cid`, `code`, `pcode`, `name`, `step`) VALUES
(1, 'A0001', '', '컴퓨터', 1),
(2, 'B0001', 'A0001', '노트북', 2),
(3, 'C0001', 'B0001', '게임용', 3),
(14, 'A0002', '', '태블릿', 1),
(15, 'B0002', 'A0001', '삼성', 2),
(16, 'C0003', 'B0001', 'LG', 3),
(17, 'A0003', '', '테스트', 1);

-- --------------------------------------------------------

--
-- 테이블 구조 `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cate` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `sale_price` double DEFAULT NULL,
  `sale_ratio` double DEFAULT NULL,
  `cnt` int(11) DEFAULT NULL,
  `sale_cnt` int(11) DEFAULT NULL,
  `ismain` tinyint(4) DEFAULT NULL,
  `isnew` tinyint(4) DEFAULT NULL,
  `isbest` tinyint(4) DEFAULT NULL,
  `isrecom` tinyint(4) DEFAULT NULL,
  `locate` tinyint(4) DEFAULT NULL,
  `userid` varchar(100) DEFAULT NULL,
  `sale_end_date` datetime DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `delivery_fee` double DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `products`
--

INSERT INTO `products` (`pid`, `name`, `cate`, `content`, `thumbnail`, `price`, `sale_price`, `sale_ratio`, `cnt`, `sale_cnt`, `ismain`, `isnew`, `isbest`, `isrecom`, `locate`, `userid`, `sale_end_date`, `reg_date`, `status`, `delivery_fee`, `product_image`) VALUES
(1, '상품명1', 'A0001B0001C0001', '\r\n설명 1\r\n\r\n', '/pinkping/admin/upload/20240411094455109948.jpg', 100000, 0, 0, 0, 0, 1, 1, 0, 0, 1, 'admin', '2024-04-11 00:00:00', '2024-04-11 16:45:40', 1, 0, NULL),
(2, '상품명2', 'A0001B0001C0001', '<p>설명2</p>', '/pinkping/admin/upload/20240411102030943193.jpg', 15000, 0, 0, 0, 0, 1, 1, 0, 0, 2, 'admin', '2024-04-18 00:00:00', '2024-04-11 17:20:30', 0, 0, NULL),
(3, '상품명3', 'A0002', '<p>설명3</p>', '/pinkping/admin/upload/20240412053356156422.jpg', 5000, 0, 0, 0, 0, 1, 1, 0, 0, 2, 'admin', '2024-06-01 00:00:00', '2024-04-12 12:33:56', 1, 0, NULL),
(9, '상품명1', 'A0001B0001C0001', '\r\n설명 1\r\n\r\n', '/pinkping/admin/upload/20240411094455109948.jpg', 100000, 0, 0, 0, 0, 1, 1, 0, 0, 1, 'admin', '2024-04-11 00:00:00', '2024-04-11 16:45:40', 1, 0, NULL),
(10, '상품명2', 'A0001B0001C0001', '<p>설명2</p>', '/pinkping/admin/upload/20240411102030943193.jpg', 15000, 0, 0, 0, 0, 1, 1, 0, 0, 2, 'admin', '2024-04-18 00:00:00', '2024-04-11 17:20:30', 0, 0, NULL),
(11, '상품명3', 'A0002', '<p>설명3</p>', '/pinkping/admin/upload/20240412053356156422.jpg', 5000, 0, 0, 0, 0, 1, 1, 0, 0, 2, 'admin', '2024-06-01 00:00:00', '2024-04-12 12:33:56', 1, 0, NULL),
(12, '상품명1', 'A0001B0001C0001', '\r\n설명 1\r\n\r\n', '/pinkping/admin/upload/20240411094455109948.jpg', 100000, 0, 0, 0, 0, 1, 1, 0, 0, 1, 'admin', '2024-04-11 00:00:00', '2024-04-11 16:45:40', 1, 0, NULL),
(13, '상품명2', 'A0001B0001C0001', '<p>설명2</p>', '/pinkping/admin/upload/20240411102030943193.jpg', 15000, 0, 0, 0, 0, 1, 1, 0, 0, 2, 'admin', '2024-04-18 00:00:00', '2024-04-11 17:20:30', 0, 0, NULL),
(14, '상품명3', 'A0002', '<p>설명3</p>', '/pinkping/admin/upload/20240412053356156422.jpg', 5000, 0, 0, 0, 0, 1, 1, 0, 0, 2, 'admin', '2024-06-01 00:00:00', '2024-04-12 12:33:56', 1, 0, NULL),
(15, '상품명1', 'A0001B0001C0001', '\r\n설명 1\r\n\r\n', '/pinkping/admin/upload/20240411094455109948.jpg', 100000, 0, 0, 0, 0, 1, 1, 0, 0, 1, 'admin', '2024-04-11 00:00:00', '2024-04-11 16:45:40', 1, 0, NULL),
(16, '상품명2', 'A0001B0001C0001', '<p>설명2</p>', '/pinkping/admin/upload/20240411102030943193.jpg', 15000, 0, 0, 0, 0, 1, 1, 0, 0, 2, 'admin', '2024-04-18 00:00:00', '2024-04-11 17:20:30', 0, 0, NULL),
(17, '상품명3', 'A0002', '<p>설명3</p>', '/pinkping/admin/upload/20240412053356156422.jpg', 5000, 0, 0, 0, 0, 1, 1, 0, 0, 2, 'admin', '2024-06-01 00:00:00', '2024-04-12 12:33:56', 1, 0, NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `product_image_table`
--

CREATE TABLE `product_image_table` (
  `imgid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `userid` varchar(100) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `regdate` datetime DEFAULT current_timestamp(),
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `product_image_table`
--

INSERT INTO `product_image_table` (`imgid`, `pid`, `userid`, `filename`, `regdate`, `status`) VALUES
(8, NULL, 'admin', '20240411073607928959.jpg', '2024-04-11 14:36:07', 1),
(9, NULL, 'admin', '20240411073607153251.jpg', '2024-04-11 14:36:07', 0),
(10, NULL, 'admin', '20240411100220182195.jpg', '2024-04-11 17:02:20', 1),
(11, NULL, 'admin', '20240411100220879936.jpg', '2024-04-11 17:02:20', 1),
(12, NULL, 'admin', '20240411101513709015.jpg', '2024-04-11 17:15:13', 1),
(13, NULL, 'admin', '20240411101513158209.jpg', '2024-04-11 17:15:13', 1),
(14, 2, 'admin', '20240411102025195246.jpg', '2024-04-11 17:20:25', 1),
(15, 2, 'admin', '20240411102025611566.jpg', '2024-04-11 17:20:25', 1),
(16, NULL, 'admin', '20240412053122130407.jpg', '2024-04-12 12:31:22', 1),
(17, NULL, 'admin', '20240412053122183024.jpg', '2024-04-12 12:31:22', 1);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- 테이블의 인덱스 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- 테이블의 인덱스 `product_image_table`
--
ALTER TABLE `product_image_table`
  ADD PRIMARY KEY (`imgid`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 테이블의 AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 테이블의 AUTO_INCREMENT `product_image_table`
--
ALTER TABLE `product_image_table`
  MODIFY `imgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
