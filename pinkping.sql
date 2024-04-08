-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 24-04-08 07:43
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
  `delivery_free` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 덤프된 테이블의 인덱스
--

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
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 테이블의 AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
