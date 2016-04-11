-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-04-11 13:06:47
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `schoolmate`
--
CREATE DATABASE IF NOT EXISTS `schoolmate` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `schoolmate`;

-- --------------------------------------------------------

--
-- 表的结构 `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `activitytitle` varchar(80) NOT NULL,
  `activitycontent` text NOT NULL,
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `checkidetifier` char(1) DEFAULT NULL,
  `checker` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `activity`
--

INSERT INTO `activity` (`id`, `user_id`, `class_id`, `activitytitle`, `activitycontent`, `createddate`, `checkidetifier`, `checker`) VALUES
(1, 1, 1, 'test', '&lt;p&gt;test&lt;/p&gt;', '2016-03-22 05:05:35', '0', NULL),
(2, 1, 1, '233', '&lt;p&gt;233333&lt;/p&gt;', '2016-03-24 09:45:31', '0', NULL),
(4, 42, 11, '23', '&lt;p&gt;23&lt;/p&gt;', '2016-04-11 09:58:39', '0', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `albumsize_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `albumname` varchar(50) NOT NULL,
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `album`
--

INSERT INTO `album` (`id`, `albumsize_id`, `class_id`, `branch_id`, `albumname`, `createddate`, `created`) VALUES
(1, NULL, 1, NULL, 'TestAlbum', '2016-04-07 06:46:42', NULL),
(2, NULL, 11, NULL, '挖掘机1班', '2016-04-08 08:36:41', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `albumphoto`
--

CREATE TABLE IF NOT EXISTS `albumphoto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `photourl` varchar(80) NOT NULL,
  `checkidetifier` char(1) DEFAULT NULL,
  `photodescription` varchar(200) DEFAULT NULL,
  `checker` int(11) DEFAULT NULL,
  `code1` char(32) DEFAULT NULL,
  `code2` char(32) DEFAULT NULL,
  `code3` char(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `albumphoto`
--

INSERT INTO `albumphoto` (`id`, `user_id`, `album_id`, `photourl`, `checkidetifier`, `photodescription`, `checker`, `code1`, `code2`, `code3`) VALUES
(9, 1, 1, './Public/Uploads/2016-04-07/570660049c494.png', NULL, NULL, NULL, './Public/Uploads/2016-04-07/', '570660049c494.png', NULL),
(10, 1, 1, './Public/Uploads/2016-04-07/5706600f7aafb.jpg', NULL, NULL, NULL, './Public/Uploads/2016-04-07/', '5706600f7aafb.jpg', NULL),
(12, 1, 1, './Public/Uploads/2016-04-07/5706610731e92.jpg', NULL, NULL, NULL, './Public/Uploads/2016-04-07/', '5706610731e92.jpg', NULL),
(13, 1, 1, './Public/Uploads/2016-04-07/5706612b01432.jpg', NULL, NULL, NULL, './Public/Uploads/2016-04-07/', '5706612b01432.jpg', NULL),
(14, 1, 1, './Public/Uploads/2016-04-07/57066534d2961.jpg', NULL, '', NULL, './Public/Uploads/2016-04-07/', '57066534d2961.jpg', NULL),
(15, 1, 1, './Public/Uploads/2016-04-07/5706653e332a7.jpg', NULL, '虫师', NULL, './Public/Uploads/2016-04-07/', '5706653e332a7.jpg', NULL),
(16, 1, 1, './Public/Uploads/2016-04-07/570667bbc8393.jpg', NULL, '我点不到桌面上的东西我点不到桌面上的东西', NULL, './Public/Uploads/2016-04-07/', '570667bbc8393.jpg', NULL),
(17, 1, 1, './Public/Uploads/2016-04-07/57067947aa7e3.jpg', NULL, '这是虫师', NULL, './Public/Uploads/2016-04-07/', '57067947aa7e3.jpg', NULL),
(18, 42, 2, './Public/Uploads/2016-04-08/570784b091a51.jpg', NULL, '', NULL, './Public/Uploads/2016-04-08/', '570784b091a51.jpg', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `albumsize`
--

CREATE TABLE IF NOT EXISTS `albumsize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sizename` varchar(50) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `alumnus`
--

CREATE TABLE IF NOT EXISTS `alumnus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Relationship_1` (`class_id`),
  KEY `FK_Relationship_27` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- 转存表中的数据 `alumnus`
--

INSERT INTO `alumnus` (`id`, `class_id`, `user_id`) VALUES
(7, 1, 1),
(41, 11, 40),
(42, 11, 41),
(43, 11, 42);

-- --------------------------------------------------------

--
-- 表的结构 `alumnus_branch`
--

CREATE TABLE IF NOT EXISTS `alumnus_branch` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `status` char(2) DEFAULT NULL,
  PRIMARY KEY (`id`,`branch_id`),
  KEY `FK_Relationship_6` (`branch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `attachment`
--

CREATE TABLE IF NOT EXISTS `attachment` (
  `id` int(11) NOT NULL,
  `content_id` int(11) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `attachmentname` varchar(50) NOT NULL,
  `attachmenturl` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `attendandate`
--

CREATE TABLE IF NOT EXISTS `attendandate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attendan` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- 转存表中的数据 `attendandate`
--

INSERT INTO `attendandate` (`id`, `attendan`) VALUES
(1, '1970'),
(2, '1971'),
(3, '1972'),
(4, '1973'),
(5, '1974'),
(6, '1975'),
(7, '1976'),
(8, '1977'),
(9, '1978'),
(10, '1979'),
(11, '1980'),
(12, '1981'),
(13, '1982'),
(14, '1983'),
(15, '1984'),
(16, '1985'),
(17, '1986'),
(18, '1987'),
(19, '1988'),
(20, '1989'),
(21, '1990'),
(22, '1991'),
(23, '1992'),
(24, '1993'),
(25, '1994'),
(26, '1995'),
(27, '1996'),
(28, '1997'),
(29, '1998'),
(30, '1999'),
(31, '2000'),
(32, '2001'),
(33, '2002'),
(34, '2003'),
(35, '2004'),
(36, '2005'),
(37, '2006'),
(38, '2007'),
(39, '2008'),
(40, '2009'),
(41, '2010'),
(42, '2011'),
(43, '2012'),
(44, '2013'),
(45, '2014'),
(46, '2015');

-- --------------------------------------------------------

--
-- 表的结构 `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(50) NOT NULL,
  `organizion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `branch`
--

INSERT INTO `branch` (`id`, `branch_name`, `organizion`) VALUES
(1, '六安分会', NULL),
(3, '北京分会', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `branch_alumnus_role`
--

CREATE TABLE IF NOT EXISTS `branch_alumnus_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `r_id` int(11) NOT NULL,
  `a_id` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Relationship_34` (`branch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attendandate_id` int(11) DEFAULT NULL,
  `classname` varchar(50) NOT NULL,
  `headmaster` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Relationship_17` (`attendandate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `class`
--

INSERT INTO `class` (`id`, `attendandate_id`, `classname`, `headmaster`) VALUES
(1, 21, '挖掘机修理1班', 'test233'),
(5, 21, '挖掘机2班', '王三辊'),
(10, 42, '233', '4444'),
(11, 45, '挖掘机1班', '无所谓');

-- --------------------------------------------------------

--
-- 表的结构 `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `contenttype_id` int(11) DEFAULT NULL,
  `newscontent` text NOT NULL,
  `newstitle` varchar(255) NOT NULL,
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `checkidetifier` char(1) DEFAULT NULL,
  `hasmainphoto` tinyint(1) DEFAULT NULL,
  `checker` int(11) DEFAULT NULL,
  `nid` int(11) DEFAULT NULL,
  `vid` int(11) DEFAULT NULL,
  `code1` char(10) DEFAULT NULL,
  `code2` char(10) DEFAULT NULL,
  `code3` char(10) DEFAULT NULL,
  `code4` char(10) DEFAULT NULL,
  `code5` char(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Relationship_24` (`user_id`),
  KEY `FK_Relationship_25` (`contenttype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `contenttype`
--

CREATE TABLE IF NOT EXISTS `contenttype` (
  `id` int(11) NOT NULL,
  `contenttype_id` int(11) DEFAULT NULL,
  `contenttypename` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Relationship_23` (`contenttype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `donation`
--

CREATE TABLE IF NOT EXISTS `donation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donation_source` varchar(2) DEFAULT NULL,
  `donationproject_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `alumnus_id` int(11) DEFAULT NULL,
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `donationcompany` varchar(100) DEFAULT NULL,
  `enter_uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `donation`
--

INSERT INTO `donation` (`id`, `donation_source`, `donationproject_id`, `branch_id`, `alumnus_id`, `createddate`, `donationcompany`, `enter_uid`) VALUES
(3, '3', 1, NULL, NULL, '2016-04-10 09:50:18', '大江信息公司', 1),
(4, '2', 3, NULL, 42, '2016-04-10 10:07:46', NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `donation_person_detail`
--

CREATE TABLE IF NOT EXISTS `donation_person_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donation_id` int(11) DEFAULT NULL,
  `donationcash` float DEFAULT NULL,
  `donationgoods` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Relationship_3` (`donation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `donation_person_detail`
--

INSERT INTO `donation_person_detail` (`id`, `donation_id`, `donationcash`, `donationgoods`) VALUES
(4, 3, 0, '电脑一台'),
(5, 4, 3000, '');

-- --------------------------------------------------------

--
-- 表的结构 `donation_project`
--

CREATE TABLE IF NOT EXISTS `donation_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donationname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `donation_project`
--

INSERT INTO `donation_project` (`id`, `donationname`) VALUES
(1, '测试项目'),
(3, '不知道哪儿来的基金会');

-- --------------------------------------------------------

--
-- 表的结构 `enployee`
--

CREATE TABLE IF NOT EXISTS `enployee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `employ_num` varchar(10) NOT NULL,
  `department` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Relationship_21` (`user_id`),
  KEY `FK_Relationship_31` (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `think_access`
--

CREATE TABLE IF NOT EXISTS `think_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_access`
--

INSERT INTO `think_access` (`role_id`, `node_id`, `level`, `module`) VALUES
(1, 2, 0, NULL),
(1, 5, 0, NULL),
(2, 6, 0, NULL),
(1, 7, 0, NULL),
(1, 8, 0, NULL),
(1, 9, 0, NULL),
(1, 10, 0, NULL),
(3, 1, 0, NULL),
(3, 27, 0, NULL),
(3, 26, 0, NULL),
(3, 25, 0, NULL),
(3, 24, 0, NULL),
(3, 23, 0, NULL),
(3, 22, 0, NULL),
(3, 21, 0, NULL),
(3, 20, 0, NULL),
(3, 19, 0, NULL),
(3, 18, 0, NULL),
(3, 17, 0, NULL),
(3, 16, 0, NULL),
(3, 15, 0, NULL),
(3, 14, 0, NULL),
(3, 13, 0, NULL),
(3, 12, 0, NULL),
(3, 11, 0, NULL),
(3, 28, 0, NULL),
(1, 29, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `think_node`
--

CREATE TABLE IF NOT EXISTS `think_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `think_node`
--

INSERT INTO `think_node` (`id`, `name`, `title`, `status`, `remark`, `sort`, `pid`, `level`) VALUES
(1, 'Admin', '管理模块', 1, NULL, 50, 0, 1),
(2, 'Home', '前台模块', 1, NULL, 50, 0, 1),
(4, 'User', '用户模块', 1, NULL, 50, 0, 1),
(5, 'Class', '班级控制器', 1, NULL, 50, 2, 2),
(6, 'activitycg', '活动增改方法', 1, NULL, 50, 5, 3),
(7, 'index', '概述方法', 1, NULL, 50, 5, 3),
(8, 'member', '班级成员方法', 1, NULL, 50, 5, 3),
(9, 'activity', '班级活动方法', 1, NULL, 50, 5, 3),
(10, 'album', '班级相册方法', 1, NULL, 50, 5, 3),
(11, 'Api', 'Api控制器', 1, NULL, 50, 1, 2),
(12, 'Class', 'Class控制器', 1, NULL, 50, 1, 2),
(13, 'Excel', 'Excel控制器', 1, NULL, 50, 1, 2),
(14, 'Index', 'Index控制器', 1, NULL, 50, 1, 2),
(15, 'User', 'User控制器', 1, NULL, 50, 1, 2),
(16, 'ClassCreate', 'ClassCreate方法', 1, NULL, 50, 11, 3),
(17, 'ClassDelete', 'ClassDelete方法', 1, NULL, 50, 11, 3),
(18, 'ClassChange', 'ClassChange方法', 1, NULL, 50, 11, 3),
(19, 'index', 'index方法', 1, NULL, 50, 12, 3),
(20, 'lists', 'lists方法', 1, NULL, 50, 12, 3),
(21, 'upload', '文件上传方法', 1, NULL, 50, 13, 3),
(22, 'index', '首页入口方法', 1, NULL, 50, 14, 3),
(23, 'index', 'Excel上传入口方法', 1, NULL, 50, 15, 3),
(24, 'Donation', '捐赠控制器', 1, NULL, 50, 1, 2),
(25, 'index', '捐赠index方法', 1, NULL, 50, 24, 3),
(26, 'role', '权限管理方法', 1, NULL, 50, 15, 3),
(27, 'rolelists', '权限管理列表方法', 1, NULL, 50, 15, 3),
(28, 'import', '班级导入方法', 1, NULL, 50, 12, 3),
(29, 'activitydetail', '活动详情方法', 1, NULL, 50, 5, 3);

-- --------------------------------------------------------

--
-- 表的结构 `think_role`
--

CREATE TABLE IF NOT EXISTS `think_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `think_role`
--

INSERT INTO `think_role` (`id`, `name`, `pid`, `status`, `remark`) VALUES
(1, '普通用户', 0, 1, NULL),
(2, '班级管理员', 1, 1, NULL),
(3, '网站管理员', 1, 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `think_role_user`
--

CREATE TABLE IF NOT EXISTS `think_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_role_user`
--

INSERT INTO `think_role_user` (`role_id`, `user_id`) VALUES
(3, '1'),
(2, '1'),
(1, '40'),
(1, '41'),
(2, '42');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `userstatus` char(5) NOT NULL COMMENT '包含用户认证失败、活动状态、锁定状态等',
  `userphoto` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `realname` varchar(50) NOT NULL,
  `sex` char(2) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `IDcardNo` varchar(20) DEFAULT NULL,
  `openID` varchar(100) DEFAULT NULL,
  `register_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `code1` char(10) DEFAULT NULL,
  `code2` char(10) DEFAULT NULL,
  `code3` char(10) DEFAULT NULL,
  `code4` char(10) DEFAULT NULL,
  `code5` char(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='此表包含职工信息和注册用户信息' AUTO_INCREMENT=43 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `userstatus`, `userphoto`, `email`, `birthday`, `realname`, `sex`, `phone`, `IDcardNo`, `openID`, `register_time`, `code1`, `code2`, `code3`, `code4`, `code5`) VALUES
(1, 'smilec', '5774400129ae437a46cb8d457933841b', '1', NULL, 'sxcuican@163.com', '0000-00-00', '璨', '0', NULL, NULL, NULL, '2016-03-22 04:39:38', NULL, NULL, NULL, NULL, NULL),
(40, '', '', '0', NULL, NULL, '0000-00-00', '崔璨', '1', NULL, '123456789012345678', NULL, '2016-04-08 08:36:48', NULL, NULL, NULL, NULL, NULL),
(41, '', '', '0', NULL, NULL, '0000-00-00', '张三', '2', NULL, NULL, NULL, '2016-04-08 08:36:48', NULL, NULL, NULL, NULL, NULL),
(42, 'ceshi', 'cc4455eba664e375edd4351597b42e5d', '1', NULL, 'ceshi@163.com', '0000-00-00', '测试', '1', NULL, NULL, NULL, '2016-04-08 08:36:48', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `user_salt`
--

CREATE TABLE IF NOT EXISTS `user_salt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `random` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_Relationship_41` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=84 ;

--
-- 转存表中的数据 `user_salt`
--

INSERT INTO `user_salt` (`id`, `user_id`, `random`, `type`, `time`) VALUES
(1, 1, 795, 0, '2016-03-22 04:39:38'),
(8, 1, 262, 1, '2016-03-22 09:54:23'),
(9, 1, 30014, 1, '2016-03-24 09:45:15'),
(10, 1, 19109, 1, '2016-03-24 14:00:40'),
(34, 1, 16115, 1, '2016-03-26 13:33:31'),
(35, 1, 24832, 1, '2016-03-26 13:36:26'),
(45, 1, 25480, 1, '2016-03-26 14:35:33'),
(53, 1, 29355, 1, '2016-04-06 16:31:36'),
(54, 1, 19690, 1, '2016-04-07 04:56:20'),
(55, 1, 9397, 1, '2016-04-07 13:11:53'),
(70, 42, 4636, 0, '2016-04-08 08:37:18'),
(83, 1, 15641, 1, '2016-04-11 10:02:27');

--
-- 限制导出的表
--

--
-- 限制表 `alumnus`
--
ALTER TABLE `alumnus`
  ADD CONSTRAINT `FK_Relationship_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `FK_Relationship_27` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- 限制表 `alumnus_branch`
--
ALTER TABLE `alumnus_branch`
  ADD CONSTRAINT `FK_Relationship_5` FOREIGN KEY (`id`) REFERENCES `alumnus` (`id`),
  ADD CONSTRAINT `FK_Relationship_6` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`);

--
-- 限制表 `branch_alumnus_role`
--
ALTER TABLE `branch_alumnus_role`
  ADD CONSTRAINT `FK_Relationship_34` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`);

--
-- 限制表 `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `FK_Relationship_17` FOREIGN KEY (`attendandate_id`) REFERENCES `attendandate` (`id`);

--
-- 限制表 `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `FK_Relationship_24` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_Relationship_25` FOREIGN KEY (`contenttype_id`) REFERENCES `contenttype` (`id`);

--
-- 限制表 `contenttype`
--
ALTER TABLE `contenttype`
  ADD CONSTRAINT `FK_Relationship_23` FOREIGN KEY (`contenttype_id`) REFERENCES `contenttype` (`id`);

--
-- 限制表 `donation_person_detail`
--
ALTER TABLE `donation_person_detail`
  ADD CONSTRAINT `FK_Relationship_3` FOREIGN KEY (`donation_id`) REFERENCES `donation` (`id`);

--
-- 限制表 `enployee`
--
ALTER TABLE `enployee`
  ADD CONSTRAINT `FK_Relationship_21` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_Relationship_31` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`);

--
-- 限制表 `user_salt`
--
ALTER TABLE `user_salt`
  ADD CONSTRAINT `FK_Relationship_41` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
