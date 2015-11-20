-- phpMyAdmin SQL Dump
-- version 4.0.10.11
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015-11-20 17:19:52
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
-- 表的结构 `tbl_book`
--

DROP TABLE IF EXISTS `tbl_book`;
CREATE TABLE IF NOT EXISTS `tbl_book` (
  `bid` varchar(20) NOT NULL DEFAULT '',
  `b_name` varchar(128) NOT NULL DEFAULT '',
  `author` varchar(128) DEFAULT NULL,
  `country` varchar(32) DEFAULT NULL,
  `age` varchar(32) DEFAULT NULL,
  `pub_date` date DEFAULT NULL,
  `pub_house` varchar(128) DEFAULT NULL,
  `type` varchar(4) DEFAULT NULL,
  `rectime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `serial_no` int(11) DEFAULT '1',
  `remarks` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_book`
--

INSERT INTO `tbl_book` (`bid`, `b_name`, `author`, `country`, `age`, `pub_date`, `pub_house`, `type`, `rectime`, `serial_no`, `remarks`) VALUES
('1439883823437751', '史记', '司马迁', '中国', '汉', '1950-10-01', '测试出版社更新', 'k1', '2015-08-18 07:43:43', 1, '少一册');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
