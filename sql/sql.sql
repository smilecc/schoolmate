/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : schoolmate

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-03-30 15:57:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for activity
-- ----------------------------
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `activitytitle` varchar(80) NOT NULL,
  `activitycontent` text NOT NULL,
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `checkidetifier` char(1) DEFAULT NULL,
  `checker` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of activity
-- ----------------------------
INSERT INTO `activity` VALUES ('1', '1', '1', 'test', '&lt;p&gt;test&lt;/p&gt;', '2016-03-22 13:05:35', '0', null);
INSERT INTO `activity` VALUES ('2', '1', '1', '233', '&lt;p&gt;233333&lt;/p&gt;', '2016-03-24 17:45:31', '0', null);

-- ----------------------------
-- Table structure for album
-- ----------------------------
DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `albumsize_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `albumname` varchar(50) NOT NULL,
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of album
-- ----------------------------

-- ----------------------------
-- Table structure for albumphoto
-- ----------------------------
DROP TABLE IF EXISTS `albumphoto`;
CREATE TABLE `albumphoto` (
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

-- ----------------------------
-- Records of albumphoto
-- ----------------------------

-- ----------------------------
-- Table structure for albumsize
-- ----------------------------
DROP TABLE IF EXISTS `albumsize`;
CREATE TABLE `albumsize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sizename` varchar(50) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of albumsize
-- ----------------------------

-- ----------------------------
-- Table structure for alumnus
-- ----------------------------
DROP TABLE IF EXISTS `alumnus`;
CREATE TABLE `alumnus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Relationship_1` (`class_id`),
  KEY `FK_Relationship_27` (`user_id`),
  CONSTRAINT `FK_Relationship_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  CONSTRAINT `FK_Relationship_27` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alumnus
-- ----------------------------
INSERT INTO `alumnus` VALUES ('7', '1', '1');
INSERT INTO `alumnus` VALUES ('8', '1', '7');
INSERT INTO `alumnus` VALUES ('9', '1', '8');
INSERT INTO `alumnus` VALUES ('10', '1', '9');
INSERT INTO `alumnus` VALUES ('11', '1', '10');
INSERT INTO `alumnus` VALUES ('12', '1', '11');
INSERT INTO `alumnus` VALUES ('13', '1', '12');
INSERT INTO `alumnus` VALUES ('14', '1', '13');
INSERT INTO `alumnus` VALUES ('15', '1', '14');
INSERT INTO `alumnus` VALUES ('16', '1', '15');
INSERT INTO `alumnus` VALUES ('17', '1', '16');
INSERT INTO `alumnus` VALUES ('18', '1', '17');
INSERT INTO `alumnus` VALUES ('19', '1', '18');
INSERT INTO `alumnus` VALUES ('20', '1', '19');
INSERT INTO `alumnus` VALUES ('21', '1', '20');
INSERT INTO `alumnus` VALUES ('22', '1', '21');

-- ----------------------------
-- Table structure for alumnus_branch
-- ----------------------------
DROP TABLE IF EXISTS `alumnus_branch`;
CREATE TABLE `alumnus_branch` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `status` char(2) DEFAULT NULL,
  PRIMARY KEY (`id`,`branch_id`),
  KEY `FK_Relationship_6` (`branch_id`),
  CONSTRAINT `FK_Relationship_5` FOREIGN KEY (`id`) REFERENCES `alumnus` (`id`),
  CONSTRAINT `FK_Relationship_6` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alumnus_branch
-- ----------------------------

-- ----------------------------
-- Table structure for attachment
-- ----------------------------
DROP TABLE IF EXISTS `attachment`;
CREATE TABLE `attachment` (
  `id` int(11) NOT NULL,
  `content_id` int(11) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `attachmentname` varchar(50) NOT NULL,
  `attachmenturl` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of attachment
-- ----------------------------

-- ----------------------------
-- Table structure for attendandate
-- ----------------------------
DROP TABLE IF EXISTS `attendandate`;
CREATE TABLE `attendandate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attendan` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of attendandate
-- ----------------------------
INSERT INTO `attendandate` VALUES ('1', '1970');
INSERT INTO `attendandate` VALUES ('2', '1971');
INSERT INTO `attendandate` VALUES ('3', '1972');
INSERT INTO `attendandate` VALUES ('4', '1973');
INSERT INTO `attendandate` VALUES ('5', '1974');
INSERT INTO `attendandate` VALUES ('6', '1975');
INSERT INTO `attendandate` VALUES ('7', '1976');
INSERT INTO `attendandate` VALUES ('8', '1977');
INSERT INTO `attendandate` VALUES ('9', '1978');
INSERT INTO `attendandate` VALUES ('10', '1979');
INSERT INTO `attendandate` VALUES ('11', '1980');
INSERT INTO `attendandate` VALUES ('12', '1981');
INSERT INTO `attendandate` VALUES ('13', '1982');
INSERT INTO `attendandate` VALUES ('14', '1983');
INSERT INTO `attendandate` VALUES ('15', '1984');
INSERT INTO `attendandate` VALUES ('16', '1985');
INSERT INTO `attendandate` VALUES ('17', '1986');
INSERT INTO `attendandate` VALUES ('18', '1987');
INSERT INTO `attendandate` VALUES ('19', '1988');
INSERT INTO `attendandate` VALUES ('20', '1989');
INSERT INTO `attendandate` VALUES ('21', '1990');
INSERT INTO `attendandate` VALUES ('22', '1991');
INSERT INTO `attendandate` VALUES ('23', '1992');
INSERT INTO `attendandate` VALUES ('24', '1993');
INSERT INTO `attendandate` VALUES ('25', '1994');
INSERT INTO `attendandate` VALUES ('26', '1995');
INSERT INTO `attendandate` VALUES ('27', '1996');
INSERT INTO `attendandate` VALUES ('28', '1997');
INSERT INTO `attendandate` VALUES ('29', '1998');
INSERT INTO `attendandate` VALUES ('30', '1999');
INSERT INTO `attendandate` VALUES ('31', '2000');
INSERT INTO `attendandate` VALUES ('32', '2001');
INSERT INTO `attendandate` VALUES ('33', '2002');
INSERT INTO `attendandate` VALUES ('34', '2003');
INSERT INTO `attendandate` VALUES ('35', '2004');
INSERT INTO `attendandate` VALUES ('36', '2005');
INSERT INTO `attendandate` VALUES ('37', '2006');
INSERT INTO `attendandate` VALUES ('38', '2007');
INSERT INTO `attendandate` VALUES ('39', '2008');
INSERT INTO `attendandate` VALUES ('40', '2009');
INSERT INTO `attendandate` VALUES ('41', '2010');
INSERT INTO `attendandate` VALUES ('42', '2011');
INSERT INTO `attendandate` VALUES ('43', '2012');
INSERT INTO `attendandate` VALUES ('44', '2013');
INSERT INTO `attendandate` VALUES ('45', '2014');
INSERT INTO `attendandate` VALUES ('46', '2015');

-- ----------------------------
-- Table structure for branch
-- ----------------------------
DROP TABLE IF EXISTS `branch`;
CREATE TABLE `branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(50) NOT NULL,
  `organizion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of branch
-- ----------------------------

-- ----------------------------
-- Table structure for branch_alumnus_role
-- ----------------------------
DROP TABLE IF EXISTS `branch_alumnus_role`;
CREATE TABLE `branch_alumnus_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `r_id` int(11) NOT NULL,
  `a_id` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Relationship_34` (`branch_id`),
  CONSTRAINT `FK_Relationship_34` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of branch_alumnus_role
-- ----------------------------

-- ----------------------------
-- Table structure for class
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attendandate_id` int(11) DEFAULT NULL,
  `classname` varchar(50) NOT NULL,
  `headmaster` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Relationship_17` (`attendandate_id`),
  CONSTRAINT `FK_Relationship_17` FOREIGN KEY (`attendandate_id`) REFERENCES `attendandate` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES ('1', '21', '挖掘机修理1班', 'test233');

-- ----------------------------
-- Table structure for content
-- ----------------------------
DROP TABLE IF EXISTS `content`;
CREATE TABLE `content` (
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
  KEY `FK_Relationship_25` (`contenttype_id`),
  CONSTRAINT `FK_Relationship_24` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_Relationship_25` FOREIGN KEY (`contenttype_id`) REFERENCES `contenttype` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of content
-- ----------------------------

-- ----------------------------
-- Table structure for contenttype
-- ----------------------------
DROP TABLE IF EXISTS `contenttype`;
CREATE TABLE `contenttype` (
  `id` int(11) NOT NULL,
  `contenttype_id` int(11) DEFAULT NULL,
  `contenttypename` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Relationship_23` (`contenttype_id`),
  CONSTRAINT `FK_Relationship_23` FOREIGN KEY (`contenttype_id`) REFERENCES `contenttype` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contenttype
-- ----------------------------

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department
-- ----------------------------

-- ----------------------------
-- Table structure for donation
-- ----------------------------
DROP TABLE IF EXISTS `donation`;
CREATE TABLE `donation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donationproject_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `alumnus_id` int(11) DEFAULT NULL,
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `donationcompany` varchar(100) DEFAULT NULL,
  `enter_uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of donation
-- ----------------------------

-- ----------------------------
-- Table structure for donationpersondetail
-- ----------------------------
DROP TABLE IF EXISTS `donationpersondetail`;
CREATE TABLE `donationpersondetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donation_id` int(11) DEFAULT NULL,
  `donationcash` float DEFAULT NULL,
  `donationgoods` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Relationship_3` (`donation_id`),
  CONSTRAINT `FK_Relationship_3` FOREIGN KEY (`donation_id`) REFERENCES `donation` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of donationpersondetail
-- ----------------------------

-- ----------------------------
-- Table structure for donationproject
-- ----------------------------
DROP TABLE IF EXISTS `donationproject`;
CREATE TABLE `donationproject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donationname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of donationproject
-- ----------------------------

-- ----------------------------
-- Table structure for enployee
-- ----------------------------
DROP TABLE IF EXISTS `enployee`;
CREATE TABLE `enployee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `employ_num` varchar(10) NOT NULL,
  `department` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Relationship_21` (`user_id`),
  KEY `FK_Relationship_31` (`department_id`),
  CONSTRAINT `FK_Relationship_21` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_Relationship_31` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of enployee
-- ----------------------------

-- ----------------------------
-- Table structure for think_access
-- ----------------------------
DROP TABLE IF EXISTS `think_access`;
CREATE TABLE `think_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_access
-- ----------------------------
INSERT INTO `think_access` VALUES ('1', '2', '0', null);
INSERT INTO `think_access` VALUES ('1', '5', '0', null);
INSERT INTO `think_access` VALUES ('2', '6', '0', null);
INSERT INTO `think_access` VALUES ('1', '7', '0', null);
INSERT INTO `think_access` VALUES ('1', '8', '0', null);
INSERT INTO `think_access` VALUES ('1', '9', '0', null);
INSERT INTO `think_access` VALUES ('1', '10', '0', null);
INSERT INTO `think_access` VALUES ('3', '1', '0', null);
INSERT INTO `think_access` VALUES ('3', '27', '0', null);
INSERT INTO `think_access` VALUES ('3', '26', '0', null);
INSERT INTO `think_access` VALUES ('3', '25', '0', null);
INSERT INTO `think_access` VALUES ('3', '24', '0', null);
INSERT INTO `think_access` VALUES ('3', '23', '0', null);
INSERT INTO `think_access` VALUES ('3', '22', '0', null);
INSERT INTO `think_access` VALUES ('3', '21', '0', null);
INSERT INTO `think_access` VALUES ('3', '20', '0', null);
INSERT INTO `think_access` VALUES ('3', '19', '0', null);
INSERT INTO `think_access` VALUES ('3', '18', '0', null);
INSERT INTO `think_access` VALUES ('3', '17', '0', null);
INSERT INTO `think_access` VALUES ('3', '16', '0', null);
INSERT INTO `think_access` VALUES ('3', '15', '0', null);
INSERT INTO `think_access` VALUES ('3', '14', '0', null);
INSERT INTO `think_access` VALUES ('3', '13', '0', null);
INSERT INTO `think_access` VALUES ('3', '12', '0', null);
INSERT INTO `think_access` VALUES ('3', '11', '0', null);

-- ----------------------------
-- Table structure for think_node
-- ----------------------------
DROP TABLE IF EXISTS `think_node`;
CREATE TABLE `think_node` (
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
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_node
-- ----------------------------
INSERT INTO `think_node` VALUES ('1', 'Admin', '管理模块', '1', null, '50', '0', '1');
INSERT INTO `think_node` VALUES ('2', 'Home', '前台模块', '1', null, '50', '0', '1');
INSERT INTO `think_node` VALUES ('4', 'User', '用户模块', '1', null, '50', '0', '1');
INSERT INTO `think_node` VALUES ('5', 'Class', '班级控制器', '1', null, '50', '2', '2');
INSERT INTO `think_node` VALUES ('6', 'activitycg', '活动增改方法', '1', null, '50', '5', '3');
INSERT INTO `think_node` VALUES ('7', 'index', '概述方法', '1', null, '50', '5', '3');
INSERT INTO `think_node` VALUES ('8', 'member', '班级成员方法', '1', null, '50', '5', '3');
INSERT INTO `think_node` VALUES ('9', 'activity', '班级活动方法', '1', null, '50', '5', '3');
INSERT INTO `think_node` VALUES ('10', 'album', '班级相册方法', '1', null, '50', '5', '3');
INSERT INTO `think_node` VALUES ('11', 'Api', 'Api控制器', '1', null, '50', '1', '2');
INSERT INTO `think_node` VALUES ('12', 'Class', 'Class控制器', '1', null, '50', '1', '2');
INSERT INTO `think_node` VALUES ('13', 'Excel', 'Excel控制器', '1', null, '50', '1', '2');
INSERT INTO `think_node` VALUES ('14', 'Index', 'Index控制器', '1', null, '50', '1', '2');
INSERT INTO `think_node` VALUES ('15', 'User', 'User控制器', '1', null, '50', '1', '2');
INSERT INTO `think_node` VALUES ('16', 'ClassCreate', 'ClassCreate方法', '1', null, '50', '11', '3');
INSERT INTO `think_node` VALUES ('17', 'ClassDelete', 'ClassDelete方法', '1', null, '50', '11', '3');
INSERT INTO `think_node` VALUES ('18', 'ClassChange', 'ClassChange方法', '1', null, '50', '11', '3');
INSERT INTO `think_node` VALUES ('19', 'index', 'index方法', '1', null, '50', '12', '3');
INSERT INTO `think_node` VALUES ('20', 'lists', 'lists方法', '1', null, '50', '12', '3');
INSERT INTO `think_node` VALUES ('21', 'upload', '文件上传方法', '1', null, '50', '13', '3');
INSERT INTO `think_node` VALUES ('22', 'index', '首页入口方法', '1', null, '50', '14', '3');
INSERT INTO `think_node` VALUES ('23', 'index', 'Excel上传入口方法', '1', null, '50', '15', '3');
INSERT INTO `think_node` VALUES ('24', 'Donation', '捐赠控制器', '1', null, '50', '1', '2');
INSERT INTO `think_node` VALUES ('25', 'index', '捐赠index方法', '1', null, '50', '24', '3');
INSERT INTO `think_node` VALUES ('26', 'role', '权限管理方法', '1', null, '50', '15', '3');
INSERT INTO `think_node` VALUES ('27', 'rolelists', '权限管理列表方法', '1', null, '50', '15', '3');

-- ----------------------------
-- Table structure for think_role
-- ----------------------------
DROP TABLE IF EXISTS `think_role`;
CREATE TABLE `think_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_role
-- ----------------------------
INSERT INTO `think_role` VALUES ('1', '普通用户', '0', '1', null);
INSERT INTO `think_role` VALUES ('2', '班级管理员', '1', '1', null);
INSERT INTO `think_role` VALUES ('3', '网站管理员', '1', '1', null);

-- ----------------------------
-- Table structure for think_role_user
-- ----------------------------
DROP TABLE IF EXISTS `think_role_user`;
CREATE TABLE `think_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_role_user
-- ----------------------------
INSERT INTO `think_role_user` VALUES ('3', '1');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='此表包含职工信息和注册用户信息';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'smilec', '5774400129ae437a46cb8d457933841b', '1', null, 'sxcuican@163.com', '0000-00-00 00:00:00', '璨', null, null, null, null, '2016-03-22 12:39:38', null, null, null, null, null);
INSERT INTO `user` VALUES ('2', '', '', '0', null, null, '0000-00-00 00:00:00', '张三', '男', null, '123456789012345678', null, '2016-03-24 18:03:35', null, null, null, null, null);
INSERT INTO `user` VALUES ('3', '', '', '0', null, null, '0000-00-00 00:00:00', '张三', '女', null, null, null, '2016-03-24 18:03:35', null, null, null, null, null);
INSERT INTO `user` VALUES ('4', '', '', '0', null, null, '0000-00-00 00:00:00', '李四', '男', null, null, null, '2016-03-24 18:03:35', null, null, null, null, null);
INSERT INTO `user` VALUES ('5', '', '', '0', null, null, '0000-00-00 00:00:00', '李四', '男', null, null, null, '2016-03-24 18:03:35', null, null, null, null, null);
INSERT INTO `user` VALUES ('6', '', '', '0', null, null, '0000-00-00 00:00:00', '王五', '男', null, '123456789012345678', null, '2016-03-24 18:03:35', null, null, null, null, null);
INSERT INTO `user` VALUES ('7', '', '', '0', null, null, '0000-00-00 00:00:00', '张三', '男', null, '123456789012345678', null, '2016-03-24 22:48:09', null, null, null, null, null);
INSERT INTO `user` VALUES ('8', '', '', '0', null, null, '0000-00-00 00:00:00', '张三', '女', null, null, null, '2016-03-24 22:48:09', null, null, null, null, null);
INSERT INTO `user` VALUES ('9', '', '', '0', null, null, '0000-00-00 00:00:00', '李四', '男', null, null, null, '2016-03-24 22:48:10', null, null, null, null, null);
INSERT INTO `user` VALUES ('10', '', '', '0', null, null, '0000-00-00 00:00:00', '李四', '男', null, null, null, '2016-03-24 22:48:10', null, null, null, null, null);
INSERT INTO `user` VALUES ('11', '', '', '0', null, null, '0000-00-00 00:00:00', '王五', '男', null, '123456789012345678', null, '2016-03-24 22:48:10', null, null, null, null, null);
INSERT INTO `user` VALUES ('12', '', '', '0', null, null, '0000-00-00 00:00:00', '张三', '男', null, '123456789012345678', null, '2016-03-25 22:59:08', null, null, null, null, null);
INSERT INTO `user` VALUES ('13', '', '', '0', null, null, '0000-00-00 00:00:00', '张三', '女', null, null, null, '2016-03-25 22:59:08', null, null, null, null, null);
INSERT INTO `user` VALUES ('14', '', '', '0', null, null, '0000-00-00 00:00:00', '李四', '男', null, null, null, '2016-03-25 22:59:08', null, null, null, null, null);
INSERT INTO `user` VALUES ('15', '', '', '0', null, null, '0000-00-00 00:00:00', '李四', '男', null, null, null, '2016-03-25 22:59:08', null, null, null, null, null);
INSERT INTO `user` VALUES ('16', '', '', '0', null, null, '0000-00-00 00:00:00', '王五', '男', null, '123456789012345678', null, '2016-03-25 22:59:08', null, null, null, null, null);
INSERT INTO `user` VALUES ('17', '', '', '0', null, null, '0000-00-00 00:00:00', '张三', '男', null, '123456789012345678', null, '2016-03-25 23:10:40', null, null, null, null, null);
INSERT INTO `user` VALUES ('18', '', '', '0', null, null, '0000-00-00 00:00:00', '张三', '女', null, null, null, '2016-03-25 23:10:40', null, null, null, null, null);
INSERT INTO `user` VALUES ('19', '', '', '0', null, null, '0000-00-00 00:00:00', '李四', '男', null, null, null, '2016-03-25 23:10:40', null, null, null, null, null);
INSERT INTO `user` VALUES ('20', '', '', '0', null, null, '0000-00-00 00:00:00', '李四', '男', null, null, null, '2016-03-25 23:10:40', null, null, null, null, null);
INSERT INTO `user` VALUES ('21', '', '', '0', null, null, '0000-00-00 00:00:00', '王五', '男', null, '123456789012345678', null, '2016-03-25 23:10:40', null, null, null, null, null);

-- ----------------------------
-- Table structure for user_salt
-- ----------------------------
DROP TABLE IF EXISTS `user_salt`;
CREATE TABLE `user_salt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `random` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_Relationship_41` (`user_id`),
  CONSTRAINT `FK_Relationship_41` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_salt
-- ----------------------------
INSERT INTO `user_salt` VALUES ('1', '1', '795', '0', '2016-03-22 12:39:38');
INSERT INTO `user_salt` VALUES ('8', '1', '262', '1', '2016-03-22 17:54:23');
INSERT INTO `user_salt` VALUES ('9', '1', '30014', '1', '2016-03-24 17:45:15');
INSERT INTO `user_salt` VALUES ('10', '1', '19109', '1', '2016-03-24 22:00:40');
INSERT INTO `user_salt` VALUES ('34', '1', '16115', '1', '2016-03-26 21:33:31');
INSERT INTO `user_salt` VALUES ('35', '1', '24832', '1', '2016-03-26 21:36:26');
INSERT INTO `user_salt` VALUES ('45', '1', '25480', '1', '2016-03-26 22:35:33');
INSERT INTO `user_salt` VALUES ('49', '1', '23157', '1', '2016-03-27 20:08:54');
INSERT INTO `user_salt` VALUES ('50', '1', '30937', '1', '2016-03-28 16:30:57');
