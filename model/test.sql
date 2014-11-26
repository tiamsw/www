/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2013-08-10 23:34:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin_users`
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL auto_increment,
  `user_name` varchar(255) default NULL,
  `mobile` varchar(255) default NULL,
  `real_name` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  `login_time` timestamp NULL default NULL,
  `login_ip` varchar(255) default NULL,
  `passwd` varchar(255) default NULL,
  `user_desc` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES ('1', 'a', 'a', 'a', 'a', null, 'a', 'a', 'a');
INSERT INTO `admin_users` VALUES ('2', 'aaa', '11111111111', 'a', '111@dd', null, null, '4124bc0a9335c27f086f24ba207a4912', 'd');
INSERT INTO `admin_users` VALUES ('3', 'admin', '11111111111', 'admin', 'super@f.com', null, null, '21232f297a57a5a743894a0e4a801fc3', 'sss');

-- ----------------------------
-- Table structure for `vipuser_loginlog`
-- ----------------------------
DROP TABLE IF EXISTS `vipuser_loginlog`;
CREATE TABLE `vipuser_loginlog` (
  `id` int(11) NOT NULL default '0',
  `cardno` varchar(12) default NULL,
  `login_type` int(11) default NULL,
  `login_time` timestamp NULL default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of vipuser_loginlog
-- ----------------------------
INSERT INTO `vipuser_loginlog` VALUES ('0', '00522746', '1', '2013-08-07 00:00:00');

-- ----------------------------
-- Table structure for `vip_param`
-- ----------------------------
DROP TABLE IF EXISTS `vip_param`;
CREATE TABLE `vip_param` (
  `id` int(11) NOT NULL auto_increment,
  `paramname` varchar(1024) default NULL,
  `paramvalue` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of vip_param
-- ----------------------------
INSERT INTO `vip_param` VALUES ('1', 'rights', 'rights的内容');
INSERT INTO `vip_param` VALUES ('2', 'faq', 'faq内容');
INSERT INTO `vip_param` VALUES ('3', 'google', 'google统计的代码');

-- ----------------------------
-- Table structure for `vip_users`
-- ----------------------------
DROP TABLE IF EXISTS `vip_users`;
CREATE TABLE `vip_users` (
  `id` int(16) NOT NULL auto_increment,
  `cardid` varchar(12) default NULL,
  `cardno` varchar(12) default NULL,
  `tel` varchar(11) default NULL,
  `pwd` varchar(32) default NULL,
  `status` int(1) default NULL,
  `dtsstate` int(10) default NULL,
  `processtime` timestamp NULL default NULL on update CURRENT_TIMESTAMP,
  `remark` varchar(400) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of vip_users
-- ----------------------------
INSERT INTO `vip_users` VALUES ('1', '00522744', '00522744', '18600590400', '96e79218965eb72c92a549dd5a330112', '0', '7705502', '2013-08-06 23:00:33', null);
INSERT INTO `vip_users` VALUES ('2', '00522745', '00522745', '18600590400', '96e79218965eb72c92a549dd5a330112', '0', '7705502', '2013-08-06 23:08:43', null);
INSERT INTO `vip_users` VALUES ('3', '00522746', '00522746', '18888888888', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', '0', '7705502', '2013-08-07 23:50:50', null);
