-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-04-12 12:30:36
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
(1, 29, 0, NULL),
(1, 31, 0, NULL),
(1, 32, 0, NULL),
(1, 33, 0, NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

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
(29, 'activitydetail', '活动详情方法', 1, NULL, 50, 5, 3),
(31, 'User', 'Home用户控制器', 1, NULL, 50, 2, 2),
(32, 'setting', '用户设置方法', 1, NULL, 50, 31, 3),
(33, 'update_setting', '用户设置接口', 1, NULL, 50, 31, 3);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `think_role`
--

INSERT INTO `think_role` (`id`, `name`, `pid`, `status`, `remark`) VALUES
(1, '普通用户', 0, 1, NULL),
(2, '班级管理员', 1, 1, NULL),
(3, '网站管理员', 0, 1, NULL),
(4, '教师', 0, 1, NULL);

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
(1, '40'),
(1, '41'),
(2, '42');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
