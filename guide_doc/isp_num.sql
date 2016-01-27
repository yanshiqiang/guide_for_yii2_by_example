-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-01-27 02:52:15
-- 服务器版本： 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2basic`
--

-- --------------------------------------------------------

--
-- 表的结构 `isp_num`
--

CREATE TABLE `isp_num` (
  `isp` varchar(10) NOT NULL,
  `num` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `isp_num`
--

INSERT INTO `isp_num` (`isp`, `num`) VALUES
('中国移动', 134),
('中国移动', 135),
('中国移动', 136),
('中国移动', 137),
('中国移动', 138),
('中国移动', 139),
('中国移动', 150),
('中国移动', 151),
('中国移动', 152),
('中国移动', 157),
('中国移动', 158),
('中国移动', 159),
('中国移动', 182),
('中国移动', 183),
('中国移动', 184),
('中国移动', 187),
('中国移动', 178),
('中国移动', 188),
('中国移动', 147),
('中国联通', 130),
('中国联通', 131),
('中国联通', 132),
('中国联通', 155),
('中国联通', 156),
('中国联通', 185),
('中国联通', 186),
('中国联通', 145),
('中国联通', 176),
('中国联通', 185),
('中国联通', 1709),
('中国移动', 1705),
('中国电信', 1700),
('中国电信', 177),
('中国电信', 133),
('中国电信', 153),
('中国电信', 180),
('中国电信', 181),
('中国电信', 189);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
