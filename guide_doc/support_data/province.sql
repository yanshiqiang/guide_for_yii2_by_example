
--
-- ±íµÄ½á¹¹ `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `id` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `province` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- ×ª´æ±íÖÐµÄÊý¾Ý `province`
--

INSERT INTO `province` (`id`, `no`, `province`) VALUES
(1, 11, '北京'),
(2, 12, '天津'),
(3, 13, '河北'),
(4, 14, '山西'),
(5, 15, '内蒙'),
(6, 21, '辽宁'),
(7, 22, '吉林'),
(8, 23, '黑龙江'),
(9, 31, '上海'),
(10, 32, '江苏'),
(11, 33, '浙江'),
(12, 34, '安徽'),
(13, 35, '福建'),
(14, 36, '江西'),
(15, 37, '山东'),
(16, 41, '河南'),
(17, 42, '湖北'),
(18, 43, '湖南'),
(19, 44, '广东'),
(20, 45, '广西'),
(21, 46, '海南'),
(22, 51, '四川'),
(23, 51, '重庆'),
(24, 52, '贵州'),
(25, 53, '云南'),
(26, 54, '西藏'),
(27, 61, '陕西'),
(28, 62, '甘肃'),
(29, 63, '青海'),
(30, 64, '宁夏'),
(31, 65, '新疆');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);
