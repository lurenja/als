-- phpMyAdmin SQL Dump
-- version 4.0.10.11
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015-11-20 17:20:37
-- 服务器版本: 5.1.73-community
-- PHP 版本: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `als_dev`
--

-- --------------------------------------------------------

--
-- 表的结构 `tbl_book_type`
--

DROP TABLE IF EXISTS `tbl_book_type`;
CREATE TABLE IF NOT EXISTS `tbl_book_type` (
  `t_no` varchar(6) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`t_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `tbl_book_type`
--

TRUNCATE TABLE `tbl_book_type`;
--
-- 转存表中的数据 `tbl_book_type`
--

INSERT INTO `tbl_book_type` (`t_no`, `description`) VALUES
('a1', '测试更新1'),
('i1', '小说'),
('j1', '书法'),
('j2', '绘画'),
('k1', '传记'),
('k2', '诗集'),
('k3', '地理');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
