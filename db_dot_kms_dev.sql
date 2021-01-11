/*
 Navicat Premium Data Transfer

 Source Server         : MAC LOCALHOST
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : db_dot_kms_dev

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 11/01/2021 19:37:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for t_kms_branch
-- ----------------------------
DROP TABLE IF EXISTS `t_kms_branch`;
CREATE TABLE `t_kms_branch` (
  `c_branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_branch_code` varchar(5) NOT NULL,
  `c_branch_name` varchar(40) NOT NULL,
  `c_branch_update_by` varchar(10) NOT NULL,
  `c_branch_update_time` datetime NOT NULL,
  `c_branch_softdelete` int(11) NOT NULL,
  PRIMARY KEY (`c_branch_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_kms_branch
-- ----------------------------
BEGIN;
INSERT INTO `t_kms_branch` VALUES (1, 'RSP', 'RS Pusat', '1', '2021-01-09 07:03:16', 0);
INSERT INTO `t_kms_branch` VALUES (2, 'RSB', 'RS Bandung', '1', '2021-01-09 07:03:22', 0);
INSERT INTO `t_kms_branch` VALUES (3, 'RSJB', 'RS Jakarta Barat', '1', '2021-01-09 07:03:37', 0);
COMMIT;

-- ----------------------------
-- Table structure for t_kms_chat
-- ----------------------------
DROP TABLE IF EXISTS `t_kms_chat`;
CREATE TABLE `t_kms_chat` (
  `c_chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_chat_from` varchar(5) NOT NULL,
  `c_chat_to` varchar(255) NOT NULL,
  `c_chat_chat` varchar(40) NOT NULL,
  `c_chat_datetime` datetime NOT NULL,
  PRIMARY KEY (`c_chat_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_kms_chat
-- ----------------------------
BEGIN;
INSERT INTO `t_kms_chat` VALUES (1, '1', '2', 'hai gaes ..', '2021-01-11 06:52:14');
INSERT INTO `t_kms_chat` VALUES (2, '1', '2', 'oy ..', '2021-01-11 06:55:28');
INSERT INTO `t_kms_chat` VALUES (3, '1', '2', 'hehe', '2021-01-11 06:55:44');
INSERT INTO `t_kms_chat` VALUES (4, '1', '2', 'hehe', '2021-01-11 06:56:47');
INSERT INTO `t_kms_chat` VALUES (5, '1', '2', 'gan', '2021-01-11 06:59:36');
INSERT INTO `t_kms_chat` VALUES (6, '1', '2', 'hehe', '2021-01-11 07:02:57');
INSERT INTO `t_kms_chat` VALUES (7, '2', '1', 'hae gaes ..', '2021-01-11 07:19:11');
COMMIT;

-- ----------------------------
-- Table structure for t_kms_comment
-- ----------------------------
DROP TABLE IF EXISTS `t_kms_comment`;
CREATE TABLE `t_kms_comment` (
  `c_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_comment_forum` int(11) NOT NULL,
  `c_comment_comment` varchar(200) NOT NULL,
  `c_comment_update_by` varchar(10) NOT NULL,
  `c_comment_update_time` datetime NOT NULL,
  PRIMARY KEY (`c_comment_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_kms_comment
-- ----------------------------
BEGIN;
INSERT INTO `t_kms_comment` VALUES (1, 1, 'diberi es batu', '1', '2021-01-09 07:30:18');
INSERT INTO `t_kms_comment` VALUES (2, 1, 'diberi balsem', '1', '2021-01-09 07:40:32');
INSERT INTO `t_kms_comment` VALUES (3, 5, 'ke tukang urut', '1', '2021-01-09 14:04:20');
INSERT INTO `t_kms_comment` VALUES (4, 4, 'diperiksa ke tukang urut', '1', '2021-01-10 00:44:27');
COMMIT;

-- ----------------------------
-- Table structure for t_kms_forum
-- ----------------------------
DROP TABLE IF EXISTS `t_kms_forum`;
CREATE TABLE `t_kms_forum` (
  `c_forum_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_forum_issue` varchar(500) NOT NULL,
  `c_forum_tags` varchar(100) NOT NULL,
  `c_forum_status` int(11) NOT NULL,
  `c_forum_update_by` varchar(10) NOT NULL,
  `c_forum_update_time` datetime NOT NULL,
  `c_forum_softdelete` int(11) NOT NULL,
  PRIMARY KEY (`c_forum_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_kms_forum
-- ----------------------------
BEGIN;
INSERT INTO `t_kms_forum` VALUES (1, 'bagaimana jika kepala terbentur sesuatu ?', 'Head', 2, '1', '2021-01-09 07:30:18', 0);
INSERT INTO `t_kms_forum` VALUES (2, 'bagaimana cara mengobati sariawan ?', 'Head', 2, '1', '2021-01-10 00:57:26', 0);
INSERT INTO `t_kms_forum` VALUES (3, 'bagaimana jika badan terkena pukul ?', 'Body', 2, '1', '2021-01-09 08:21:54', 0);
INSERT INTO `t_kms_forum` VALUES (4, 'bagaimana jika kaki keseleo ?', 'Torso', 2, '2', '2021-01-09 13:33:03', 0);
INSERT INTO `t_kms_forum` VALUES (5, 'bagaimana jika tangan salah urat ?', 'Body', 2, '2', '2021-01-09 13:40:33', 0);
INSERT INTO `t_kms_forum` VALUES (6, 'Kepala suka pusing ..', 'Head', 1, '1', '2021-01-11 03:09:27', 0);
COMMIT;

-- ----------------------------
-- Table structure for t_kms_knowledge_base
-- ----------------------------
DROP TABLE IF EXISTS `t_kms_knowledge_base`;
CREATE TABLE `t_kms_knowledge_base` (
  `c_knowledge_base_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_knowledge_base_title` varchar(50) NOT NULL,
  `c_knowledge_base_content` varchar(2000) NOT NULL,
  `c_knowledge_base_tags` varchar(100) NOT NULL,
  `c_knowledge_base_update_by` varchar(10) NOT NULL,
  `c_knowledge_base_update_time` datetime NOT NULL,
  `c_knowledge_base_softdelete` int(11) NOT NULL,
  PRIMARY KEY (`c_knowledge_base_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_kms_knowledge_base
-- ----------------------------
BEGIN;
INSERT INTO `t_kms_knowledge_base` VALUES (1, 'Test Title', '<p>Content</p>', 'Head', '1', '2021-01-09 14:12:50', 0);
INSERT INTO `t_kms_knowledge_base` VALUES (2, 'Tangan Salah Urat', '<p>Content</p>', 'Body', '1', '2021-01-09 14:05:27', 0);
INSERT INTO `t_kms_knowledge_base` VALUES (3, 'Jika kaki keseleo', '<p>Content</p>', 'Torso', '2', '2021-01-10 01:14:07', 0);
INSERT INTO `t_kms_knowledge_base` VALUES (4, 'Pengobatan Sariawan', '<p>Contents</p>', 'Head', '1', '2021-01-11 04:03:37', 0);
COMMIT;

-- ----------------------------
-- Table structure for t_kms_knowledge_document
-- ----------------------------
DROP TABLE IF EXISTS `t_kms_knowledge_document`;
CREATE TABLE `t_kms_knowledge_document` (
  `c_knowledge_document_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_knowledge_document_title` varchar(50) NOT NULL,
  `c_knowledge_document_document` varchar(2000) NOT NULL,
  `c_knowledge_document_tags` varchar(100) NOT NULL,
  `c_knowledge_document_update_by` varchar(10) NOT NULL,
  `c_knowledge_document_update_time` datetime NOT NULL,
  `c_knowledge_document_softdelete` int(11) NOT NULL,
  PRIMARY KEY (`c_knowledge_document_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_kms_knowledge_document
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for t_kms_permission
-- ----------------------------
DROP TABLE IF EXISTS `t_kms_permission`;
CREATE TABLE `t_kms_permission` (
  `c_permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_permission_name` varchar(30) NOT NULL,
  `c_permission_display` varchar(50) NOT NULL,
  `c_permission_description` varchar(255) NOT NULL,
  `c_permission_update_by` varchar(10) NOT NULL,
  `c_permission_update_time` datetime NOT NULL,
  `c_permission_softdelete` int(11) NOT NULL,
  PRIMARY KEY (`c_permission_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_kms_permission
-- ----------------------------
BEGIN;
INSERT INTO `t_kms_permission` VALUES (1, 'dashboard', 'Index Dashboard', 'Access to Index Dashboard', '2', '2021-01-10 01:50:13', 0);
INSERT INTO `t_kms_permission` VALUES (2, 'kbase', 'Index Kbase', 'Access to Index Kbase', '2', '2021-01-10 01:50:23', 0);
INSERT INTO `t_kms_permission` VALUES (3, 'forum', 'Index Forum', 'Access to Index Forum', '2', '2021-01-10 01:50:29', 0);
INSERT INTO `t_kms_permission` VALUES (4, 'reward', 'Index Reward', 'Access to Index Reward', '2', '2021-01-10 01:50:35', 0);
INSERT INTO `t_kms_permission` VALUES (5, 'users', 'Index Users', 'Access to Index Users', '2', '2021-01-10 01:51:14', 0);
INSERT INTO `t_kms_permission` VALUES (6, 'role', 'Index Role', 'Access to Index Role', '2', '2021-01-10 01:51:09', 0);
INSERT INTO `t_kms_permission` VALUES (7, 'branch', 'Index Branch', 'Access to Index Branch', '2', '2021-01-10 01:50:57', 0);
INSERT INTO `t_kms_permission` VALUES (8, 'position', 'Index Position', 'Access to Index Position', '2', '2021-01-10 01:51:04', 0);
COMMIT;

-- ----------------------------
-- Table structure for t_kms_position
-- ----------------------------
DROP TABLE IF EXISTS `t_kms_position`;
CREATE TABLE `t_kms_position` (
  `c_position_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_position_abbr` varchar(5) NOT NULL,
  `c_position_name` varchar(70) NOT NULL,
  `c_position_branch` varchar(10) NOT NULL,
  `c_position_position_level` varchar(10) NOT NULL,
  `c_position_update_by` varchar(10) NOT NULL,
  `c_position_update_time` datetime NOT NULL,
  `c_position_softdelete` int(11) NOT NULL,
  PRIMARY KEY (`c_position_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_kms_position
-- ----------------------------
BEGIN;
INSERT INTO `t_kms_position` VALUES (1, 'DRSP1', 'Dokter RS Pusat 1', '1', '', '1', '2021-01-09 07:12:52', 0);
INSERT INTO `t_kms_position` VALUES (2, 'ARSP1', 'Admin RS Pusat 1', '1', '', '1', '2021-01-09 07:12:14', 0);
INSERT INTO `t_kms_position` VALUES (3, 'DRSB1', 'Dokter RS Bandung 1', '2', '', '1', '2021-01-09 07:11:06', 0);
INSERT INTO `t_kms_position` VALUES (4, 'DRSJB', 'Dokter RS Jakarta Barat 1', '3', '', '1', '2021-01-09 07:11:20', 0);
COMMIT;

-- ----------------------------
-- Table structure for t_kms_reward
-- ----------------------------
DROP TABLE IF EXISTS `t_kms_reward`;
CREATE TABLE `t_kms_reward` (
  `c_reward_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_reward_forum` int(11) NOT NULL,
  `c_reward_point` int(11) NOT NULL,
  `c_reward_receiver` int(11) NOT NULL,
  `c_reward_update_by` varchar(10) NOT NULL,
  `c_reward_update_time` datetime NOT NULL,
  `c_reward_softdelete` int(11) NOT NULL,
  PRIMARY KEY (`c_reward_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_kms_reward
-- ----------------------------
BEGIN;
INSERT INTO `t_kms_reward` VALUES (1, 1, 1, 1, '1', '2021-01-09 12:47:28', 0);
INSERT INTO `t_kms_reward` VALUES (2, 5, 1, 2, '1', '2021-01-09 14:05:27', 0);
INSERT INTO `t_kms_reward` VALUES (3, 4, 1, 2, '2', '2021-01-10 01:14:07', 0);
INSERT INTO `t_kms_reward` VALUES (4, 2, 1, 1, '1', '2021-01-11 03:07:10', 0);
COMMIT;

-- ----------------------------
-- Table structure for t_kms_role
-- ----------------------------
DROP TABLE IF EXISTS `t_kms_role`;
CREATE TABLE `t_kms_role` (
  `c_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_role_name` varchar(40) NOT NULL,
  `c_role_display` varchar(50) NOT NULL,
  `c_role_description` varchar(255) NOT NULL,
  `c_role_update_by` varchar(10) NOT NULL,
  `c_role_update_time` datetime NOT NULL,
  `c_role_softdelete` int(11) NOT NULL,
  PRIMARY KEY (`c_role_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_kms_role
-- ----------------------------
BEGIN;
INSERT INTO `t_kms_role` VALUES (1, 'administrator', 'Administrator', 'As Administrator', '1', '2020-12-18 07:49:42', 0);
INSERT INTO `t_kms_role` VALUES (2, 'regular', 'Regular User', 'As Regular User', '1', '2020-12-10 12:42:58', 0);
COMMIT;

-- ----------------------------
-- Table structure for t_kms_role_permission
-- ----------------------------
DROP TABLE IF EXISTS `t_kms_role_permission`;
CREATE TABLE `t_kms_role_permission` (
  `c_role_id` int(11) DEFAULT NULL,
  `c_permission_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_kms_role_permission
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for t_kms_users
-- ----------------------------
DROP TABLE IF EXISTS `t_kms_users`;
CREATE TABLE `t_kms_users` (
  `c_users_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_users_nip` varchar(20) NOT NULL DEFAULT '',
  `c_users_fullname` varchar(50) NOT NULL,
  `c_users_email` varchar(50) NOT NULL,
  `c_users_password` varchar(100) NOT NULL,
  `c_users_position` varchar(10) DEFAULT NULL,
  `c_users_role` varchar(10) NOT NULL,
  `c_users_status` varchar(1) NOT NULL,
  `c_users_update_by` varchar(10) NOT NULL,
  `c_users_update_time` datetime NOT NULL,
  `c_users_last_login_ip` varchar(20) DEFAULT NULL,
  `c_users_last_login_date` datetime DEFAULT NULL,
  `c_users_softdelete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`c_users_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_kms_users
-- ----------------------------
BEGIN;
INSERT INTO `t_kms_users` VALUES (1, '11111', 'Eko Prasetyo', 'ekkoprasetyo@gmail.com', '$2y$10$l1MW5VuYKqQUCpGnPH.Nj.duvoltPuexhbTagBGkRFMHQPmO9v5Gi', '2', '1', '1', '1', '2020-12-10 07:07:35', '127.0.0.1', '2021-01-11 03:17:53', 0);
INSERT INTO `t_kms_users` VALUES (2, '12345', 'Christiano Ronaldo', 'christiano.ronaldo@gmail.com', '$2y$10$5xElodeyczJStZ.qc/9rgu4I.SI13P7XSlbYxB.sqGldVaIvHzOGK', '3', '2', '1', '1', '2021-01-09 11:50:33', '127.0.0.1', '2021-01-11 07:18:53', 0);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
