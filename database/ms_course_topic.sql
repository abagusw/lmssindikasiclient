/*
Navicat MySQL Data Transfer

Source Server         : localhost3307
Source Server Version : 50505
Source Host           : localhost:3307
Source Database       : membership

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2025-06-24 20:47:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ms_course_topic`
-- ----------------------------
DROP TABLE IF EXISTS `ms_course_topic`;
CREATE TABLE `ms_course_topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of ms_course_topic
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_payment_callback`
-- ----------------------------
DROP TABLE IF EXISTS `tb_payment_callback`;
CREATE TABLE `tb_payment_callback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_status` varchar(100) DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `gross_amount` varchar(40) DEFAULT NULL,
  `va_number` varchar(100) DEFAULT NULL,
  `bank` varchar(20) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tb_payment_callback
-- ----------------------------
INSERT INTO `tb_payment_callback` VALUES ('1', 'settlement', 'bank_transfer', 'ORDER-123456', '150000.00', '1234567890', 'bca', 'https://testing.com/midtrans/callback', 'c883f6f7-0f2b-4bbf-9f6a-ec1b5e5e58d1', '2025-06-24 20:36:04');
