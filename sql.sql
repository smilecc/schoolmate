-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-01-10 10:09:19
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `code1` char(10) DEFAULT NULL,
  `code2` char(10) DEFAULT NULL,
  `code3` char(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(50) NOT NULL,
  `organizion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `donation`
--

CREATE TABLE IF NOT EXISTS `donation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donationproject_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `alumnus_id` int(11) DEFAULT NULL,
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `donationcompany` varchar(100) DEFAULT NULL,
  `enter_uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `donationpersondetail`
--

CREATE TABLE IF NOT EXISTS `donationpersondetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donation_id` int(11) DEFAULT NULL,
  `donationcash` float DEFAULT NULL,
  `donationgoods` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Relationship_3` (`donation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `donationproject`
--

CREATE TABLE IF NOT EXISTS `donationproject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donationname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `think_access`
--

CREATE TABLE IF NOT EXISTS `think_access` (
  `id` int(11) DEFAULT NULL,
  `think_role_id` int(11) DEFAULT NULL,
  `module` varchar(50) DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL,
  KEY `FK_Relationship_38` (`id`),
  KEY `FK_Relationship_39` (`think_role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `think_node`
--

CREATE TABLE IF NOT EXISTS `think_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `think_node_id` int(11) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `stauts` tinyint(4) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) DEFAULT '50',
  `level` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Relationship_40` (`think_node_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `think_role`
--

CREATE TABLE IF NOT EXISTS `think_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `think_role_id` int(11) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `stauts` tinyint(4) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Relationship_37` (`think_role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `think_role_user`
--

CREATE TABLE IF NOT EXISTS `think_role_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user_id`),
  KEY `FK_Relationship_9` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `birthday` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='此表包含职工信息和注册用户信息';

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- 限制表 `donationpersondetail`
--
ALTER TABLE `donationpersondetail`
  ADD CONSTRAINT `FK_Relationship_3` FOREIGN KEY (`donation_id`) REFERENCES `donation` (`id`);

--
-- 限制表 `enployee`
--
ALTER TABLE `enployee`
  ADD CONSTRAINT `FK_Relationship_21` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_Relationship_31` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`);

--
-- 限制表 `think_access`
--
ALTER TABLE `think_access`
  ADD CONSTRAINT `FK_Relationship_38` FOREIGN KEY (`id`) REFERENCES `think_node` (`id`),
  ADD CONSTRAINT `FK_Relationship_39` FOREIGN KEY (`think_role_id`) REFERENCES `think_role` (`id`);

--
-- 限制表 `think_node`
--
ALTER TABLE `think_node`
  ADD CONSTRAINT `FK_Relationship_40` FOREIGN KEY (`think_node_id`) REFERENCES `think_node` (`id`);

--
-- 限制表 `think_role`
--
ALTER TABLE `think_role`
  ADD CONSTRAINT `FK_Relationship_37` FOREIGN KEY (`think_role_id`) REFERENCES `think_role` (`id`);

--
-- 限制表 `think_role_user`
--
ALTER TABLE `think_role_user`
  ADD CONSTRAINT `FK_Relationship_8` FOREIGN KEY (`id`) REFERENCES `think_role` (`id`),
  ADD CONSTRAINT `FK_Relationship_9` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- 限制表 `user_salt`
--
ALTER TABLE `user_salt`
  ADD CONSTRAINT `FK_Relationship_41` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
