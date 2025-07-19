/*
Navicat MySQL Data Transfer

Source Server         : localhost3307
Source Server Version : 50505
Source Host           : localhost:3307
Source Database       : membership

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2025-07-19 17:47:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_payment`
-- ----------------------------
DROP TABLE IF EXISTS `tb_payment`;
CREATE TABLE `tb_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user` varchar(200) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `amount` varchar(50) DEFAULT NULL,
  `method` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tb_payment
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_payment_callback`
-- ----------------------------
DROP TABLE IF EXISTS `tb_payment_callback`;
CREATE TABLE `tb_payment_callback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(100) DEFAULT NULL,
  `transaction_time` datetime DEFAULT NULL,
  `transaction_status` varchar(100) DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `gross_amount` varchar(40) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `fraud_status` varchar(50) DEFAULT NULL,
  `settlement_time` datetime DEFAULT NULL,
  `status_code` varchar(10) DEFAULT NULL,
  `status_message` text DEFAULT NULL,
  `va_number` varchar(100) DEFAULT NULL,
  `bank` varchar(20) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tb_payment_callback
-- ----------------------------
