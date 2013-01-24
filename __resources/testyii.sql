-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2013 at 05:50 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testyii`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `product_category`
--


-- --------------------------------------------------------

--
-- Table structure for table `product_item`
--

CREATE TABLE IF NOT EXISTS `product_item` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(20) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `brief` text NOT NULL,
  `description` text NOT NULL,
  `related_url` varchar(255) NOT NULL,
  `price` int(20) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `created_dt` datetime NOT NULL,
  `last_modified_dt` datetime NOT NULL,
  `created_user_id` int(10) NOT NULL,
  `last_modified_user_id` int(20) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `product_item`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group_id` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `group_id`) VALUES
(2, 'thaolt', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(11, 'tab87vn', 'e10adc3949ba59abbe56e057f20f883e', 1),
(12, 'duong', 'e10adc3949ba59abbe56e057f20f883e', 2),
(13, 'hqm871', 'e10adc3949ba59abbe56e057f20f883e', 1),
(14, 'luant', 'e10adc3949ba59abbe56e057f20f883e', 2),
(15, 'user0010', 'e10adc3949ba59abbe56e057f20f883e', 1),
(16, 'user001', 'e10adc3949ba59abbe56e057f20f883e', 1),
(18, 'user003_1', 'e10adc3949ba59abbe56e057f20f883e', 1),
(20, 'hung01', 'd41d8cd98f00b204e9800998ecf8427e', 1),
(21, 'user005', 'e10adc3949ba59abbe56e057f20f883e', 1),
(22, 'tuanhung', '87cfe89dd6e63c2ae0a206cecc4c3b64', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `name`, `code`, `description`) VALUES
(1, 'Quản trị', 'admin', 'Quản trị hệ thống'),
(2, 'Thành viên', 'member', 'Nhóm này dành cho thành viên'),
(3, 'Kinh doanh', 'sale', 'Nhóm dành cho nhân viên kinh doanh');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `note` text,
  `avatar` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `full_name`, `dob`, `gender`, `email`, `phone`, `note`, `avatar`, `is_active`) VALUES
(2, 2, 'Lê Thị Thảo', '1990-10-10', 0, 'thaolt@yahoo.com', '12121212', '212121', '8c74ee6af83b1a0873cdfa4f7b7f03df.jpg', 0),
(9, 11, 'Bùi Tuấn Anh', '1987-12-02', 1, 'tuananh.hufs@gmail.com', '+84902288002', 'TA là siêu nhân', '', 1),
(10, 12, 'Đỗ Bình Dương', '1991-12-01', 0, 'duong@gmail.com', '12345522', 'Ta là siêu nhân', '', 1),
(11, 13, 'Hà Quang Minh', '1987-09-12', 1, 'hqm87@gmail.com', '121212121', 'heheh', 'b3f67f1ae4b4baf2f48f991e2028031a', 1),
(12, 14, 'Nguyen Thi Lua', '1987-02-12', 0, 'hqm87@gmail.com', '3232433', 'cong dong xa hoi chu nghia viet nam', '4.png', 1),
(13, 15, 'Test User 0010', '1989-12-03', 0, 'hello0010@gmail.com', '12112121111', 'fsdfasdf (da sua)', '2.jpg', 1),
(14, 16, 'User 002', '1987-12-14', 1, 'duong@gmail.com', '121212121', 'fsafasd', '1.png', 1),
(15, 18, 'Ai chẳng đc (1)', '1988-02-12', 1, 'huhu@hihi.vn (1)', '0123456789', '2121 (đã sửa)', '2a82371579f796083a66844737ee50bf.jpg', 1),
(16, 20, 'Bùi Tuấn Hùng', '1970-01-01', 0, 'duong@gmail.com', '1231212', 'ghi chú ở đây', '6b40ccbc81c83930e72fa64f6bd72269jpg', 1),
(17, 21, 'Tuan Anh Bui', '1987-12-02', 1, 'f@vn.vn', '121212', 'fasdfasdfa', '0bee8b3b6d832b57589a37eca66980b1.jpg', 1),
(18, 22, 'Bùi Tuấn Hùng', '1970-01-01', 0, 'hung@vnn.vn', '12311212', 'á à', '', 1);
