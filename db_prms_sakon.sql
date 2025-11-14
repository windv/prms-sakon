/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50744 (5.7.44)
 Source Host           : localhost:3306
 Source Schema         : db_prms_sakon

 Target Server Type    : MySQL
 Target Server Version : 50744 (5.7.44)
 File Encoding         : 65001

 Date: 14/11/2025 08:27:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for durable
-- ----------------------------
DROP TABLE IF EXISTS `durable`;
CREATE TABLE `durable` (
  `dura_id` int(10) NOT NULL AUTO_INCREMENT,
  `equip_id` int(10) DEFAULT NULL,
  `dura_key` varchar(255) DEFAULT NULL,
  `dura_status` int(1) DEFAULT '1',
  `dura_booked` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`dura_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of durable
-- ----------------------------
BEGIN;
INSERT INTO `durable` (`dura_id`, `equip_id`, `dura_key`, `dura_status`, `dura_booked`) VALUES (1, 3, '282-67-0001', 1, NULL);
INSERT INTO `durable` (`dura_id`, `equip_id`, `dura_key`, `dura_status`, `dura_booked`) VALUES (2, 3, '282-67-0002', 1, NULL);
COMMIT;

-- ----------------------------
-- Table structure for equipment
-- ----------------------------
DROP TABLE IF EXISTS `equipment`;
CREATE TABLE `equipment` (
  `equip_id` int(11) NOT NULL AUTO_INCREMENT,
  `equip_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`equip_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of equipment
-- ----------------------------
BEGIN;
INSERT INTO `equipment` (`equip_id`, `equip_name`) VALUES (1, 'รถเข็น');
INSERT INTO `equipment` (`equip_id`, `equip_name`) VALUES (2, 'เครื่องผลิตออกซิเจน');
INSERT INTO `equipment` (`equip_id`, `equip_name`) VALUES (3, 'เตียงนอน 3 ไกร์');
COMMIT;

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `u_email` varchar(100) DEFAULT NULL,
  `u_password` varchar(100) DEFAULT NULL,
  `prefix_id` varchar(255) DEFAULT NULL,
  `u_fname` varchar(255) DEFAULT NULL,
  `u_lname` varchar(255) DEFAULT NULL,
  `u_address` varchar(1000) DEFAULT NULL,
  `u_road` varchar(50) DEFAULT NULL,
  `u_district` varchar(50) DEFAULT NULL,
  `u_aumphor` varchar(50) DEFAULT NULL,
  `u_province` varchar(50) DEFAULT NULL,
  `u_tel` varchar(50) DEFAULT NULL,
  `u_type` int(1) DEFAULT '0',
  `u_status` int(1) DEFAULT '2',
  `u_regis_date` varchar(20) DEFAULT NULL,
  `workgroup_id` varchar(255) DEFAULT NULL,
  `u_admin` varchar(255) DEFAULT '0',
  `last_active` varchar(20) DEFAULT NULL,
  `sid_booking` varchar(255) DEFAULT NULL,
  `admin_booking` varchar(1) DEFAULT NULL,
  `u_po_id` varchar(255) DEFAULT NULL,
  `u_agen_id` varchar(255) DEFAULT NULL,
  `u_update` varchar(20) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `prefix_name` varchar(255) DEFAULT NULL,
  `academic_id` int(2) DEFAULT NULL,
  `department_id` int(4) DEFAULT NULL,
  `education_id` int(2) DEFAULT NULL,
  `dete_approve` datetime DEFAULT NULL,
  `student_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`u_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
BEGIN;
INSERT INTO `tbl_user` (`u_id`, `username`, `u_email`, `u_password`, `prefix_id`, `u_fname`, `u_lname`, `u_address`, `u_road`, `u_district`, `u_aumphor`, `u_province`, `u_tel`, `u_type`, `u_status`, `u_regis_date`, `workgroup_id`, `u_admin`, `last_active`, `sid_booking`, `admin_booking`, `u_po_id`, `u_agen_id`, `u_update`, `token`, `prefix_name`, `academic_id`, `department_id`, `education_id`, `dete_approve`, `student_id`) VALUES (1, 'admin', 'admin@localhost.com', '$2y$10$gYlWV1yU80DDrzucfDBoA.1itsBVuAV.f.2yjLEo4zmk3hw/SRtLG', 'นาย', 'อบจ', 'สกลนคร', NULL, NULL, NULL, NULL, NULL, '0850008511', 1, 1, NULL, '1', '1', '2025-11-13 15:52:27', '966998926131137718849df7f7ce6c15', 'Y', '1', '1', NULL, '4e7e86e49f7d5ed3386036e4e87ef89b5027bdb54cbe9201efa45ba0864929e9', NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
