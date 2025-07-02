/*
Navicat MySQL Data Transfer

Source Server         : localhost3307
Source Server Version : 50505
Source Host           : localhost:3307
Source Database       : membership

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2025-06-09 14:35:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_course`
-- ----------------------------
DROP TABLE IF EXISTS `tb_course`;
CREATE TABLE `tb_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cover` varchar(255) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `kategori` int(11) DEFAULT 0 COMMENT '0:foundational; 1:advance',
  `deskripsi` text DEFAULT NULL,
  `status` int(11) DEFAULT 0 COMMENT '0:draft,1:published;2:withdrawn',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `create_user` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tb_course
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_course_lesson`
-- ----------------------------
DROP TABLE IF EXISTS `tb_course_lesson`;
CREATE TABLE `tb_course_lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `lesson` varchar(255) DEFAULT NULL,
  `flag` int(11) DEFAULT 0 COMMENT '0:archived;1:active',
  `created_at` datetime DEFAULT NULL,
  `create_user` varchar(200) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tb_course_lesson
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_course_participant`
-- ----------------------------
DROP TABLE IF EXISTS `tb_course_participant`;
CREATE TABLE `tb_course_participant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tb_course_participant
-- ----------------------------
