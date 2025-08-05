/*
Navicat MySQL Data Transfer

Source Server         : localhost3307
Source Server Version : 50505
Source Host           : localhost:3307
Source Database       : membership

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2025-08-05 20:26:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_payment_success_member`
-- ----------------------------
DROP TABLE IF EXISTS `tb_payment_success_member`;
CREATE TABLE `tb_payment_success_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` int(11) DEFAULT 0 COMMENT ' 0:iuran anggota; 1:bpjs',
  `user_id` int(11) DEFAULT NULL,
  `jenis_transaksi` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `transaction_status` varchar(100) DEFAULT NULL,
  `gross_amount` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tb_payment_success_member
-- ----------------------------
